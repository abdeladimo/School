@extends('dash.blanck-page')
@section('custom-style')
@endsection
@section('body-content')
<div class="content-body m-1">
    <!-- row -->
    <div class="container-fluid">

        <div class="row page-titles">
            <div class="col-sm-12 p-md-0">
                <div class="welcome-text">
                    <h3 class="fw-bold">Ajouter séance</h3>
                </div>
                <form>
                    <div class="mb-3 row">
                        <div class="col">
                            <label for="time-begin" class="form-label">Heure d'entrée</label>
                            <input type="time" class="form-control" id="time-begin" name="time_begin">
                        </div>
                        <div class="col">
                            <label for="time-end" class="form-label">Heure de sortie</label>
                            <input type="time" class="form-control" id="time-end" name="time_end">
                        </div>
                        <div class="col-auto">
                            <label for="seance-day" class="form-label">Jour</label>
                            <select class="form-select" id="seance-day" name="seance_day">
                                <option value="mon">Lundi</option>
                                <option value="tue">Mardi</option>
                                <option value="wed">Mercredi</option>
                                <option value="thu">Jeudi</option>
                                <option value="fri">Vendredi</option>
                                <option value="sat">Samedi</option>
                                <option value="sun">Dimanche</option>
                            </select>
                        </div>
                    </div>
                    <span class="alert text-danger d-none">S'il vous plaît remplir les champs des heures correctement et/ou séléctionner un jour.</span>
                    <div class="mb-3 row reste">
                        <div class="col-sm-9">
                            <label for="profs" class="form-label">Profs</label>
                            <select class="form-select" id="profs" name="profs">
                            </select>
                        </div>
                        <div class="col">
                          <label for="classes" class="form-label">Classes</label>
                          <select class="form-select" id="classes" name="classes">
                          </select>
                        </div>
                    </div>
                    <div class="mb-3  reste">
                      <label for="rooms" class="form-label">Salles</label>
                      <select class="form-select" id="rooms" name="rooms">
                      </select>
                    </div>
                    <button type="submit" id="btn-add-seance" class="btn btn-primary reste">Submit</button>
                </form>
            </div>
        </div>
        <div class="row page-titles">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h3 class="fw-bold">Emploi du Temps</h3>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('emploi')}}">Emploi</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Emploi du Temps</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col mb-2">
                <h6 class="fw-bold">CLASSE :*</h6>
                <select class="form-select" aria-label="Default select example" id="classes-filter">
                    <option selected>--Choix--</option>
                    @foreach ($classes as $classe)
                    <option value="{{ $classe->id }}">{{ $classe->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col mb-2">
                <h6 class="fw-bold">PROF :*</h6>
                <select class="form-select" aria-label="Default select example" id="profs">
                    <option selected>--Choix--</option>
                    @foreach ($profs as $prof )
                    <option value="{{ $prof->id }}">{{ $prof->user->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col mb-2">
                <h6 class="fw-bold">MATIERE :*</h6>
                <select class="form-select" aria-label="Default select example" id="matiere">
                    <option selected>--Choix--</option>
                    @foreach ($matiers as  $matiere)
                    <option value="{{ $matiere->id }}">{{ $matiere->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col mb-2">
                <h6 class="fw-bold">SALLE :*</h6>
                <select class="form-select"  id="salle">
                    <option selected>--Choix--</option>
                    @foreach ($salles as $salle)
                    <option value="{{ $salle->id }}">{{ $salle->salle_number }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card col-lg-12">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="emploi" class="display" style="min-width: 1245px">
                                        <thead>
                                            <tr class="head_emploi">
                                                <th>HEURES/JOURS</th>
                                                <th>LUNDI</th>
                                                <th>MARDI</th>
                                                <th>MERCREDI</th>
                                                <th>JEUDI</th>
                                                <th>VENDREDI</th>
                                                <th>SAMEDI</th>
                                                <th>DIMANCHE</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbl_seance">
                                            {{-- <tr>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="time" aria-label="Last name" class="form-control ms-1">
                                                        <input type="time" aria-label="Last name" class="form-control">
                                                      </div>
                                                </td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="time" aria-label="Last name" class="form-control ms-1">
                                                        <input type="time" aria-label="Last name" class="form-control">
                                                      </div>
                                                </td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="time" aria-label="Last name" class="form-control ms-1">
                                                        <input type="time" aria-label="Last name" class="form-control">
                                                      </div>
                                                </td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="time" aria-label="Last name" class="form-control ms-1">
                                                        <input type="time" aria-label="Last name" class="form-control">
                                                      </div>
                                                </td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="time" aria-label="Last name" class="form-control ms-1">
                                                        <input type="time" aria-label="Last name" class="form-control">
                                                      </div>
                                                </td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="time" aria-label="Last name" class="form-control ms-1">
                                                        <input type="time" aria-label="Last name" class="form-control">
                                                      </div>
                                                </td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="time" aria-label="Last name" class="form-control ms-1">
                                                        <input type="time" aria-label="Last name" class="form-control">
                                                      </div>
                                                </td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="time" aria-label="Last name" class="form-control ms-1">
                                                        <input type="time" aria-label="Last name" class="form-control">
                                                      </div>
                                                </td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="time" aria-label="Last name" class="form-control ms-1">
                                                        <input type="time" aria-label="Last name" class="form-control">
                                                      </div>
                                                </td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="time" aria-label="Last name" class="form-control ms-1">
                                                        <input type="time" aria-label="Last name" class="form-control">
                                                      </div>
                                                </td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="time" aria-label="Last name" class="form-control ms-1">
                                                        <input type="time" aria-label="Last name" class="form-control">
                                                      </div>
                                                </td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                                <td><div class="col mb-2">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div></td>
                                            </tr> --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-center mb-2">
                <button class="btn btn-primary me-md-2" type="button">Sauvegarde</button>
            </div>
        </div>

    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        $("#profs,#matiere,#salle,#classe").select2();
    });
</script>
<script src="{{ asset('js/api/seance/all-seances.js') }}"></script>
<script src="{{ asset('js/api/seance/seance.js') }}"></script>
@endsection