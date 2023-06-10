@extends('dash.blanck-page')
@section('body-content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>All Inscriptions</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">All Inscriptions</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">All Inscriptions</h4>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addnew" data-bs-whatever="@mdo">+ Add new</button>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        @if (session()->has('message'))
                                            <div class="alert alert-danger">
                                                {{ session()->get('message') }}
                                            </div>
                                        @endif
                                        <table id="example3" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>Student</th>
                                                    <th>Montant</th>
                                                    <th>Versement</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($inscriptions as $inscription)
                                                    <tr>
                                                        <td>{{$inscription->student->user->nom}}</td>
                                                        <td>{{ $inscription->montant }}</td>
                                                        <td>{{ $inscription->versement }}</td>
                                                        <td>
                                                            <button type="button" value="{{ $inscription->id }}" class="btn btn-sm btnedit btn-success">
                                                                <i class="la la-pencil">
                                                                </i>
                                                            </button>
                                                            <form method="POST" action="{{ route('deleteinscription', ['id' => $inscription->id]) }}"
                                                                id="delete_form{{ $loop->iteration }}" class="d-none">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                            <button class="btn btn-sm btn-danger sweet-confirm"
                                                                form="delete_form{{ $loop->iteration }}"
                                                                data-form-id="delete_form{{ $loop->iteration }}">
                                                                <i class="la la-trash-o"
                                                                    data-form-id="delete_form{{ $loop->iteration }}">
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
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- start modal add --}}
    <div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Inscription</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('storeinscription') }}">
                        @csrf
                        <label class="col-form-label">Student : </label>
                        <select class="form-select" id="etudiant" name="etudiant">
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->user->nom }}</option>
                            @endforeach
                        </select>
                        <div class="mb-3">
                            <label for="update_montant" class="col-form-label">Montant : </label>
                            <input type="number" min="1" class="form-control" id="update_montant" name="montant">
                        </div>
                        <div class="mb-3">
                            <label for="update_versement" class="col-form-label">Versement : </label>
                            <input type="number" min="1" class="form-control" id="update_versement" name="versement">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal add --}}
    {{-- start modal update  --}}
    <div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Classe</h5>
                </div>
                <div class="modal-body">
                    <form id="form_update" method="POST" action="#">
                        @csrf
                        @method('PUT')
                        <label  class="col-form-label">Student : </label>
                        <select class="form-select" id="etudiant" name="etudiant">
                            @foreach ($students as $student)
                            <option value="{{ $student->id }}">{{ $student->user->nom }}</option>
                            @endforeach
                        </select>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Montant : </label>
                            <input type="number" class="form-control" id="montant" name="montant">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Versement : </label>
                            <input type="number" class="form-control" id="versement" name="versement">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal update --}}
    {{-- start modal update --}}
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.btnedit', function() {
                var id = $(this).val();
                var to = "/editInscription/update/";
                $('#update').modal('show');
                $('#form_update').prop("action", to + id);
                $.ajax({
                    type: "GET",
                    url: "/edit_inscription/" + id,
                    success: function(inscription) {
                        $('#montant').val(inscription.montant);
                        $('#versement').val(inscription.versement);

                    }
                })
            });
        });
    </script>
@endsection
@section('custom-scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
