@extends('dash.blanck-page')
@section('body-content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>All Surveillant General</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('allprof') }}">Surveillant General</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">All Surveillant General</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-pills mb-3">
                        <li class="nav-item"><a href="#list-view" data-toggle="tab"
                                class="nav-link btn-primary mr-1 show active">List View</a></li>
                        <li class="nav-item"><a href="#grid-view" data-toggle="tab" class="nav-link btn-primary">Grid
                                View</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">All Surveillant General </h4>
                                    <a href="{{ route('createSG') }}" class="btn btn-primary">+ Add new</a>
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
                                                @foreach ($SG as $S)
                                                    @if ($S->user)
                                                        <tr>
                                                            <td>
                                                                <img class="rounded-circle" width="35" src="{{ asset('storage/' . $S->user->image) }}" alt="">
                                                            </td>
                                                            <td>{{ $S->user->prenom . ' ' . $S->user->nom }}</td>
                                                            <td>{{ $S->user->gender }}</td>
                                                            <td><a
                                                                    href="javascript:void(0);"><strong>{{ $S->user->tel }}</strong></a>
                                                            </td>
                                                            <td><a
                                                                    href="javascript:void(0);"><strong>{{ $S->user->email }}</strong></a>
                                                            </td>
                                                            <td>
                                                                <a href="{{route('profileSG', ['id' => $S->user->id])}}" class="btn btn-sm btn-success">
                                                                    <i class="la la-eye">
                                                                    </i>
                                                                </a>
                                                                <a href="{{route('editSG',['surveillant_generale' => $S->id])}}" class="btn btn-sm btn-primary">
                                                                    <i class="la la-pencil">
                                                                    </i>
                                                                </a>
                                                                <form method="POST"
                                                                    action="{{ route('deleteSG', ['id' => $S->user->id]) }}"
                                                                    id="delete_form{{ $loop->iteration }}" class="d-none">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                                <button class="btn btn-sm btn-danger sweet-confirm"
                                                                    form="delete_form{{ $loop->iteration }}">
                                                                    <i class="la la-trash-o">
                                                                    </i>
                                                                </button>
                                                            </td>
                                                        </tr>   
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="grid-view" class="tab-pane fade col-lg-12">
                            <div class="row">
                                @foreach ($SG as $S)
                                    @if ($S->user)
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="card card-profile">
                                                <div class="card-header justify-content-end pb-0">
                                                    <div class="dropdown">
                                                        <button class="btn btn-link" type="button" data-toggle="dropdown">
                                                            <span class="dropdown-dots fs--1"></span>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right border py-0">
                                                            <div class="py-2">
                                                                <a class="dropdown-item"
                                                                    href="{{route('editSG',['surveillant_generale' => $S->id])}}">Edit</a>
                                                                <form method="POST"
                                                                    action="#"
                                                                    id="delete_form{{ $loop->iteration }}" class="d-none">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                                <button class="btn btn-sm btn-danger sweet-confirm"
                                                                    form="delete_form{{ $loop->iteration }}">
                                                                    Delete
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class="card-body pt-2">
                                                        <div class="text-center">
                                                            <div class="profile-photo">
                                                                <img src="{{ asset('storage/' . $S->user->image) }}" width="100"
                                                                    class="img-fluid rounded-circle" alt="">
                                                            </div>
                                                            <h3 class="mt-4 mb-1">
                                                                {{ $S->user->prenom . ' ' . $S->user->nom }}
                                                            </h3>
                                                            <ul class="list-group mb-3 list-group-flush">
                                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                                    <span class="mb-0">Genre
                                                                        :</span><strong>{{ $S->user->gender }}</strong>
                                                                </li>
                                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                                    <span class="mb-0">Tel
                                                                        :</span><strong>{{ $S->user->tel }}</strong>
                                                                </li>
                                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                                    <span
                                                                        class="mb-0">Email:</span><strong>{{ $S->user->email }}</strong>
                                                                </li>
                                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                                    <span
                                                                        class="mb-0">Address:</span><strong>{{ $S->user->adresse }}</strong>
                                                                </li>
                                                            </ul>
                                                            <a class="btn btn-outline-primary btn-rounded mt-3 px-4"
                                                                href="{{ route('profileSG', ['id' => $S->user->id]) }}">Read
                                                                More</a>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div> 
                                    @endif
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
