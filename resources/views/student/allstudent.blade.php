@extends('dash.blanck-page')
@section('custom-style')
    {{-- <link rel="stylesheet" href="{{asset('admin\vendor\sweetalert2\dist\sweetalert2.min.css')}}"> --}}
@endsection
@section('body-content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>All Students</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('allprof')}}">Students</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">All Students</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-pills mb-3">
                        <li class="nav-item"><a href="#list-view" data-toggle="tab" class="nav-link btn-primary mr-1 show active">List View</a></li>
                        <li class="nav-item"><a href="#grid-view" data-toggle="tab" class="nav-link btn-primary">Grid View</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">All Students  </h4>
                                    <a href="{{route('createstudent')}}" class="btn btn-primary">+ Add new</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example3" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Nom Complet</th>
                                                    <th>Genre</th>
                                                    <th>Tel</th>
                                                    <th>Email</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($students as $student)
                                                    <tr>
                                                        <td><img class="rounded-circle" width="35" src="{{asset('storage/'.$student->user->image)}}" alt=""></td>
                                                        <td>{{$student->user->prenom.' '.$student->user->nom}}</td>
                                                        <td>{{$student->user->gender}}</td>
                                                        <td><a href="javascript:void(0);"><strong>{{$student->user->tel}}</strong></a></td>
                                                        <td><a href="javascript:void(0);"><strong>{{$student->user->email}}</strong></a></td>
                                                        <td>
                                                            <a href="{{route('profilestudent',['id' => $student->user->id])}}" class="btn btn-sm btn-success">
                                                                <i class="la la-eye">
                                                                </i>
                                                            </a>
                                                            <a href="{{route('editstudent',['id' => $student->user->id])}}" class="btn btn-sm btn-primary">
                                                                <i class="la la-pencil">
                                                                </i>
                                                            </a>
                                                            <form method="POST" action="{{ route('deletestudent', ['id' => $student->user->id]) }}" id="delete_form{{$loop->iteration}}" class="d-none">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                            <button class="btn btn-sm btn-danger sweet-confirm" form="delete_form{{$loop->iteration}}">
                                                                <i class="la la-trash-o">
                                                                </i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="grid-view" class="tab-pane fade col-lg-12">
                            <div class="row">
                                @foreach ($students as $student)
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="card card-profile">
                                            <div class="card-header justify-content-end pb-0">
                                                <div class="dropdown">
                                                    <button class="btn btn-link" type="button" data-toggle="dropdown">
                                                        <span class="dropdown-dots fs--1"></span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right border py-0">
                                                        <div class="py-2">
                                                            <a class="dropdown-item" href="{{route('editstudent',['id' => $student->user->id])}}">Edit</a>
                                                            <form method="POST" action="{{ route('deletestudent', ['id' => $student->user->id]) }}" id="delete_form{{$loop->iteration}}" class="d-none">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                            <button class="btn btn-sm btn-danger sweet-confirm" form="delete_form{{$loop->iteration}}">
                                                                Delete
                                                            </button>
                                                            {{-- <a class="dropdown-item" href="{{route('editstudent',['id' => $student->user->id])}}">Edit</a>
                                                            <form class="dropdown-item text-danger" method="POST" action="{{ route('deletestudent', ['id' => $student->id]) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="submit" value="Delete">
                                                            </form> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="card-body pt-2">
                                                    <div class="text-center">
                                                        <div class="profile-photo">
                                                            <img src="{{asset('storage/'.$student->user->image)}}" width="100" class="img-fluid rounded-circle" alt="">
                                                        </div>
                                                        <h3 class="mt-4 mb-1">{{$student->user->prenom.' '.$student->user->nom}}</h3>
                                                        <ul class="list-group mb-3 list-group-flush">
                                                            <li class="list-group-item px-0 d-flex justify-content-between">
                                                                <span class="mb-0">Genre :</span><strong>{{$student->user->gender}}</strong></li>
                                                            <li class="list-group-item px-0 d-flex justify-content-between">
                                                                <span class="mb-0">Tel :</span><strong>{{$student->user->tel}}</strong></li>
                                                            <li class="list-group-item px-0 d-flex justify-content-between">
                                                                <span class="mb-0">Email:</span><strong>{{$student->user->email}}</strong></li>
                                                            <li class="list-group-item px-0 d-flex justify-content-between">
                                                                <span class="mb-0">Address:</span><strong>{{$student->user->adresse}}</strong></li>
                                                        </ul>
                                                        <a class="btn btn-outline-primary btn-rounded mt-3 px-4" href="{{route('profilestudent', ['id' => $student->user->id])}}">Read More</a>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('custom-scripts')
    {{-- <script src="{{asset('admin\vendor\sweetalert2\dist\sweetalert2.min.js')}}" ></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
