@extends('dash.blanck-page')
@section('body-content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Tous les Divers</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Tous les Divers</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tous les Divers</h4>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addnew" data-bs-whatever="@mdo">+ Ajouter Diver</button>
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
                                                    <th>Type</th>
                                                    <th>Montant</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($divers as $diver)
                                                    <tr>
                                                        <td>{{ $diver->type }}</td>
                                                        <td>{{ $diver->montant }}</td>
                                                        <td>{{ $diver->date }}</td>
                                                        <td>
                                                            <button type="button" value="{{ $diver->id }}" class="btn btn-sm btnedit btn-success">
                                                                <i class="la la-pencil">
                                                                </i>
                                                            </button>
                                                            <form method="POST" action="{{ route('deletesalle', ['id' => $diver->id]) }}"
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
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter Diver</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('add_diver')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Type </label>
                            <input type="text" class="form-control" id="recipient-name" name="type" min="1">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Montant </label>
                            <input type="number" class="form-control" id="recipient-name" name="montant" min="1">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Date </label>
                            <input type="date" class="form-control" id="recipient-name" name="date" min="1">
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
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Number : </label>
                            <input type="number" min="1" class="form-control" id="nom" name="salle_number">
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
                var to = "/editSalle/update/";
                $('#update').modal('show');
                $('#form_update').prop("action", to + id);
                $.ajax({
                    type: "GET",
                    url: "/edit_salle/" + id,
                    success: function(salle) {
                        $('#nom').val(salle.salle_number);
                    }
                })
            });
        });
    </script>
@endsection
@section('custom-scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
