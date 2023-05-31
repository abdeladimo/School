@extends('dash.blanck-page')
@section('body-content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>All Salles</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Absence</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Les classes</h4>
                                    <div class="filter-date d-flex">
                                        <button class="btn btn-primary btn-navigate" data-direction="-"><</button>
                                        <input type="text" class="form-control" id="selected-date">
                                        <button class="btn btn-primary btn-navigate" data-direction="+">></button>
                                    </div>
                                    <select id="classes" class="form-select" style="width: auto"></select>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        @if (session()->has('message'))
                                            <div class="alert alert-danger">
                                                {{ session()->get('message') }}
                                            </div>
                                        @endif
                                        <table id="tbl_absence" class="table table-bordered" style="min-width: 845px">
                                            <thead id="tbl_absence_header">
                                                <tr>
                                                    <th scope="col">Jours / étudient</th>
                                                    <th scope="col">Lun</th>
                                                    <th scope="col">Mar</th>
                                                    <th scope="col">Mer</th>
                                                    <th scope="col">Jeu</th>
                                                    <th scope="col">Ven</th>
                                                    <th scope="col">Sam</th>
                                                    <th scope="col">Dim</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbl_absence">
                                            </tbody>
                                        </table>
                                    </div>
                                    <button class="btn btn-primary" id="btn-add-absence">Confirmer</button>
                                </div>
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
    <script src="{{ asset('js/api/absence/add-absence.js') }}"></script>
    <script src="{{ asset('js/api/absence/list-absences.js') }}"></script>
@endsection
