@extends('dash.blanck-page')
@section('custom-style')
@endsection
@section('body-content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>{{$title}}</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Students</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">{{$title}}</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Basic Info</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{$to}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if ($title == 'Modifier éleve')
                                @method('PUT')
                            @endif
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Prenom </label>
                                        <input type="text" class="form-control"  value="{{(isset($user))? $user->prenom : ''}}" name="prenom">
                                        @if($errors->has('prenom'))
                                        <span class="error" style="color:red">{{ $errors->first('prenom') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Nom</label>
                                        <input type="text" class="form-control" value="{{(isset($user))? $user->nom : ''}}" name="nom">
                                        @if($errors->has('nom'))
                                        <span class="error" style="color:red">{{ $errors->first('nom') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">CIN</label>
                                        <input type="text" class="form-control" value="{{(isset($user))? $user->cin : ''}}" name="cin">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" value="{{(isset($user))? $user->email : ''}}" name="email">
                                    </div>
                                </div>
                             <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Classe</label>
                                        <select class="form-control" name="class" id="">
                                            <option value="">Select Classe ...</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id}}">{{$class->nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Genre</label>
                                        <select class="form-control" value="{{(isset($user))? $user->gender : ''}}" name="gender">
                                            <option value="" hidden selected>Genre</option>
                                            <option value="Male">Homme</option>
                                            <option value="Female">Femme</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Mobile Number</label>
                                        <input type="text" class="form-control" value="{{(isset($user))? $user->tel : ''}}" name="tel">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Parents Name</label>
                                        <select class="form-control" name="parent" id="">
                                            <option value="">Select parent ...</option>
                                            @foreach ($families as $family)
                                                <option value="{{ $family->id}}">{{ $family->user->prenom . " " . $family->user->nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Date de Naissance</label>
                                        <input type="date" class="datepicker-default form-control" value="{{(isset($user))? $user->dateNaissance : ''}}" id="datepicker1" name="dateNaissance">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Address</label>
                                        <input type="adress" class="form-control" value="{{(isset($user))? $user->adresse : ''}}" name="adresse">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group fallback w-100">
                                        <input type="file" class="dropify" data-default-file="" name="image">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="submit" class="btn btn-light">Cencel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

