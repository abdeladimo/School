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
                        <h4>Tous les administrateurs</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('alladmin')}}">admins</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Tous les administrateurs</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-pills mb-3">
                        <li class="nav-item"><a href="#list-view" data-toggle="tab" class="nav-link btn-primary mr-1 show active">Affichage de liste</a></li>
                        <li class="nav-item"><a href="#grid-view" data-toggle="tab" class="nav-link btn-primary">Vue Grille</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tous les administrateurs  </h4>
                                    <a href="{{route('createadmin')}}" class="btn btn-primary">+ Ajouter nouveau</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example3" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>image</th>
                                                    <th>Nom Complet</th>
                                                    <th>Role</th>
                                                    <th>Genre</th>
                                                    <th>Tel</th>
                                                    <th>Email</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($admins as $admin)
                                                    <tr>
                                                        <td><img class="rounded-circle" width="35" src="{{asset('storage/'.$admin->user->image)}}" alt=""></td>
                                                        <td>{{$admin->user->prenom.' '.$admin->user->nom}}</td>
                                                        <td>{{$admin->user->role->role_nom}}</td>
                                                        <td>{{$admin->user->gender}}</td>
                                                        <td>{{$admin->user->tel}}</td>
                                                        <td>{{$admin->user->email}}</td>
                                                        <td class="td_actions">
                                                            <a href="{{route('profileadmin',['id' => $admin->user->id])}}" class="btn btn-sm btn-info">
                                                                <i class="la la-eye">
                                                                </i>
                                                            </a>
                                                            <a href="{{route('editadmin',['admin' => $admin->id])}}" class="btn btn-sm btn-success">
                                                                <i class="la la-pencil">
                                                                </i>
                                                            </a>
                                                            <form method="POST" action="{{ route('deleteadmin', ['id' => $admin->user->id]) }}" id="delete_form{{$loop->iteration}}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-sm btn-danger sweet-confirm" form="delete_form{{$loop->iteration}}">
                                                                    <i class="la la-trash-o">
                                                                    </i>
                                                                </button>
                                                            </form>
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
                                @foreach ($admins as $admin)
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="card card-profile">
                                            <div class="card-header justify-content-end pb-0">
                                                <div class="dropdown">
                                                    <button class="btn btn-link" type="button" data-toggle="dropdown">
                                                        <span class="dropdown-dots fs--1"></span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right border py-0">
                                                        <div class="py-2 btn_crud_admin_grid_view">
                                                            <a href="{{route('createadmin')}}" class="btn btn-sm btn-primary"><i class="la la-plus"></i></a>
                                                            <a href="{{route('editadmin',['admin' => $admin->id])}}" class="btn btn-sm btn-success">
                                                                <i class="la la-pencil">
                                                                </i>
                                                            </a>
                                                            <form class="" method="POST" action="{{ route('deleteadmin', ['id' => $admin->user->id]) }}" id="delete_form{{$loop->iteration}}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger sweet-confirm"  form="delete_form{{$loop->iteration}}">
                                                                    <i class="la la-trash-o">
                                                                    </i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="card-body pt-2">
                                                    <div class="text-center">
                                                        <div class="profile-photo">
                                                            <img src="{{asset('storage/'.$admin->user->image)}}" width="100" class="img-fluid rounded-circle" alt="">
                                                        </div>
                                                        <h3 class="mt-4 mb-1">{{$admin->user->prenom.' '.$admin->user->nom}}</h3>
                                                        <ul class="list-group mb-3 list-group-flush">
                                                            <li class="list-group-item px-0 d-flex justify-content-between">
                                                                <span class="mb-0">Genre :</span><strong>{{$admin->user->gender}}</strong></li>
                                                            <li class="list-group-item px-0 d-flex justify-content-between">
                                                                <span class="mb-0">Tel :</span><strong>{{$admin->user->tel}}</strong></li>
                                                            <li class="list-group-item px-0 d-flex justify-content-between">
                                                                <span class="mb-0">Email:</span><strong>{{$admin->user->email}}</strong></li>
                                                            <li class="list-group-item px-0 d-flex justify-content-between">
                                                                <span class="mb-0">Address:</span><strong>{{$admin->user->adresse}}</strong></li>
                                                        </ul>
                                                        <a class="btn btn-info btn-rounded mt-3 px-4" href="{{route('profileadmin', ['id' => $admin->user->id])}}">Read More</a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script type="text/javascript">
        $('.sweet-confirm').click(function(event){
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: "Are you sure you want to delete this record?",
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                type: "warning",
                buttons: ["Cancel","Yes!"],
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
