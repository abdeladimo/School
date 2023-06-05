<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeanceRequest;
use App\Models\Classe;
use App\Models\Prof;
use App\Models\Salle;
use App\Models\Seance;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SeanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->filter == 'classe') {
            if ($classe = Classe::find($request->classe)) {
                $seances = $classe->seances()->orderBy('time_begin', 'asc')->get();
            }else {
                $seances = [];
            }
        } else {
            $seances = Seance::all();
        }
        return response()->json(
            compact(
                'seances',
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeanceRequest $request)
    {
        $seance = new Seance;
        $seance->time_begin = $request->time_begin;
        $seance->time_end = $request->time_end;
        $seance->seance_day = $request->day;
        $seance->seance_color = $request->color;
        if ($prof = Prof::find($request->prof)) {
            if ($prof->seances()->save($seance)) {
                if ($classe = Classe::find($request->classe)) {
                    if ($classe->seances()->save($seance)) {
                        if ($salle = Salle::find($request->room)) {
                            if ($salle->seances()->save($seance)) {
                                $result = $seance;
                                $status = 200;
                                $msg = 'success';
                            } else {
                                $result = null;
                                $status = 500;
                                $msg = 'failure [room]';
                            }
                        } else {
                            $result = null;
                            $status = 404;
                            $msg = 'not found [room]';
                        }
                    } else {
                        $result = null;
                        $status = 500;
                        $msg = 'failure [classe]';
                    }
                } else {
                    $result = null;
                    $status = 404;
                    $msg = 'not found [classe]';
                }
            } else {
                $result = null;
                $status = 500;
                $msg = 'failure [prof]';
            }
        } else {
            $result = null;
            $status = 404;
            $msg = 'not found [prof]';
        }
        return response()->json(
            compact(
                'result',
                'status',
                'msg'
            ),
            $status
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seance  $seance
     * @return \Illuminate\Http\Response
     */
    public function show(Seance $seance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seance  $seance
     * @return \Illuminate\Http\Response
     */
    public function edit(Seance $seance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seance  $seance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seance $seance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seance  $seance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seance $seance)
    {
        //
    }

    public function availableProfs(Request $request)
    {
        $time_begin = $request->time_begin;
        $time_end = $request->time_end;
        $day = $request->day;
        // will return all profs that don't have seances outside given [begin time] & [end time]:
        $profs = Prof::whereDoesntHave('seances', function (Builder $query) use ($day, $time_begin, $time_end) {
            $query->where([
                ['seance_day', '=', $day],
            ])
            ->where(function (Builder $query) use ($time_begin, $time_end) {
                    $query->where([
                        ['time_begin', '>=', $time_begin],
                        ['time_begin', '<=', $time_end],
                    ])
                    ->orWhere([
                        ['time_end', '>=', $time_begin],
                        ['time_end', '<=', $time_end],
                    ]);
                });
        })
        ->get();
        // will return all profs that don't have seances inside given [begin time] & [end time]:
        $seances_query = Seance::select('prof_id')
                            ->where([
                                ['seance_day', '=', $day],
                            ])
                            ->where(function ($query) use ($time_begin, $time_end) {
                                $query->where(function ($query) use ($time_begin, $time_end) {
                                    $query->where([
                                        ['time_begin', '>=', $time_begin],
                                        ['time_begin', '<=', $time_end],
                                    ])
                                    ->orWhere([
                                        ['time_end', '>=', $time_begin],
                                        ['time_end', '<=', $time_end],
                                    ]);
                                });
                            });
        $profs->concat(Prof::whereNotIn('id', $seances_query)->get());
        return response()->json(
            compact(
                'profs',
            )
        );
    }

    public function availableClasses(Request $request)
    {
        $time_begin = $request->time_begin;
        $time_end = $request->time_end;
        $day = $request->day;
        $classes = Classe::whereDoesntHave('seances', function (Builder $query) use ($day, $time_begin, $time_end) {
            $query->where([
                ['seance_day', '=', $day],
            ])
            ->where(function (Builder $query) use ($time_begin, $time_end) {
                    $query->where([
                        ['time_begin', '>=', $time_begin],
                        ['time_begin', '<=', $time_end],
                    ])
                    ->orWhere([
                        ['time_end', '>=', $time_begin],
                        ['time_end', '<=', $time_end],
                    ]);
                });
        })
        ->get();
        $seances_query = Seance::select('classe_id')
                            ->where([
                                ['seance_day', '=', $day],
                            ])
                            ->where(function ($query) use ($time_begin, $time_end) {
                                $query->where(function ($query) use ($time_begin, $time_end) {
                                    $query->where([
                                        ['time_begin', '>=', $time_begin],
                                        ['time_begin', '<=', $time_end],
                                    ])
                                    ->orWhere([
                                        ['time_end', '>=', $time_begin],
                                        ['time_end', '<=', $time_end],
                                    ]);
                                });
                            });
        $classes->concat(Classe::whereNotIn('id', $seances_query)->get());
        return response()->json(
            compact(
                'classes',
            )
        );
    }

    public function availableSalles(Request $request)
    {
        $time_begin = $request->time_begin;
        $time_end = $request->time_end;
        $day = $request->day;
        $salles = Salle::whereDoesntHave('seances', function (Builder $query) use ($day, $time_begin, $time_end) {
            $query->where([
                ['seance_day', '=', $day],
            ])
            ->where(function (Builder $query) use ($time_begin, $time_end) {
                    $query->where([
                        ['time_begin', '>=', $time_begin],
                        ['time_begin', '<=', $time_end],
                    ])
                    ->orWhere([
                        ['time_end', '>=', $time_begin],
                        ['time_end', '<=', $time_end],
                    ]);
                });
        })
        ->get();
        $seances_query = Seance::select('salle_id')
                            ->where([
                                ['seance_day', '=', $day],
                            ])
                            ->where(function ($query) use ($time_begin, $time_end) {
                                $query->where(function ($query) use ($time_begin, $time_end) {
                                    $query->where([
                                        ['time_begin', '>=', $time_begin],
                                        ['time_begin', '<=', $time_end],
                                    ])
                                    ->orWhere([
                                        ['time_end', '>=', $time_begin],
                                        ['time_end', '<=', $time_end],
                                    ]);
                                });
                            });
        $salles->concat(Salle::whereNotIn('id', $seances_query)->get());
        return response()->json(
            compact(
                'salles',
            )
        );
    }
}
