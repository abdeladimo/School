@extends('dash.blanck-page')
@section('body-content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
        
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Professor Profile</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('allprof')}}">Professors</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Professor Profile</a></li>
                    </ol>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xl-3 col-xxl-4 col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="text-center p-3 overlay-box" style="background-image: url();">
                                    <div class="profile-photo">
                                        <img src="{{asset('storage/'.$user->image)}}" width="100" class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <h3 class="mt-3 mb-1 text-white">Deangelo Sena</h3>
                                    <p class="text-white mb-0">Senior Manager</p>
                                </div>
                                <div class="card-footer text-center border-0 mt-0">								
                                    <a href="javascript:void(0);" class="btn btn-warning btn-rounded px-4">Message</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="card-title">about me</h2>
                                </div>
                                <div class="card-footer pt-0 pb-0 text-center">
                                    <div class="row">
                                        <div class="col-4 pt-3 pb-3 border-right">
                                            <h3 class="mb-1 text-primary">150</h3>
                                            <span>Level</span>
                                        </div>
                                        <div class="col-4 pt-3 pb-3 border-right">
                                            <h3 class="mb-1 text-primary">140</h3>
                                            <span>Students</span>
                                        </div>
                                        <div class="col-4 pt-3 pb-3">
                                            <h3 class="mb-1 text-primary">45</h3>
                                            <span>Classes</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-xxl-8 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link active show">About Me</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="about-me" class="tab-pane fade active show">
                                            <div class="profile-about-me">
                                                <div class="pt-4 border-bottom-1 pb-4">
                                                    <p>{{$user->description}}</p>
                                                </div>
                                            </div>
                                            <div class="profile-personal-info">
                                                <h4 class="text-primary mb-4">Personal Information</h4>
                                                <div class="row mb-4">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Name <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6"><span>{{$user->nom .' '. $user->prenom}}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6"><span>{{($user->email)? $user->email : ''}}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Age <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6"><span>{{($age)}}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Location <span class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6"><span>{{($user->adresse)? $user->adresse : ''}}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Gender <span class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6"><span>{{($user->gender)? $user->gender : ''}}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Phone <span class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6"><span>{{($user->tel)? $user->tel : ''}}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Cin <span class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-lg-9 col-md-8 col-sm-6 col-6"><span>{{($user->cin)? $user->cin : ''}}</span>
                                                    </div>
                                                </div>
                                                <x-employee-infos-profile-format :salaire="($user->prof)? ($user->prof->employee ? $user->prof->employee->salaire : '') : ''" :date-embauche="($user->prof)? ($user->prof->employee ? $user->prof->employee->date_embauche : '') : ''" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection