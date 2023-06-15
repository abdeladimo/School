@extends('dash.blanck-page')
@section('body-content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>All Events</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">All Events</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">All Events</h4>
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
                                                    <th>Type</th>
                                                    <th>Date</th>
                                                    <th>Heur</th>
                                                    <th>Prix</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($events as $event)
                                                    <tr>
                                                        <td>{{ $event->type }}</td>
                                                        <td>{{ $event->date }}</td>
                                                        <td>{{ $event->heur }}</td>
                                                        <td>{{ $event->prix }}</td>
                                                        <td>
                                                            <button type="button" value="{{ $event->id }}" class="btn btn-sm btnedit btn-success">
                                                                <i class="la la-pencil">
                                                                </i>
                                                            </button>
                                                            <form method="POST" action="{{ route('deleteevent', ['id' => $event->id]) }}"
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
                    <h5 class="modal-title" id="exampleModalLabel">New Event</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('storeevent') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="update_type" class="col-form-label">Type : </label>
                            <input type="text" min="1" class="form-control" id="update_type" name="type">
                        </div>
                        <div class="mb-3">
                            <label for="update_date" class="col-form-label">Date : </label>
                            <input type="date" min="1" class="form-control" id="update_date" name="date">
                        </div>
                        <div class="mb-3">
                            <label for="update_heur" class="col-form-label">Heur : </label>
                            <input heur="time" min="1" class="form-control" id="update_heur" name="heur">
                        </div>
                        <div class="mb-3">
                            <label for="update_prix" class="col-form-label">Prix : </label>
                            <input type="number" min="1" class="form-control" id="update_date" name="prix">
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
                            <label for="update_type" class="col-form-label">Type : </label>
                            <input type="text" min="1" class="form-control" id="update_type" name="type">
                        </div>
                        <div class="mb-3">
                            <label for="update_date" class="col-form-label">Date : </label>
                            <input type="date" min="1" class="form-control" id="update_date" name="date">
                        </div>
                        <div class="mb-3">
                            <label for="update_heur" class="col-form-label">Heur : </label>
                            <input heur="time" min="1" class="form-control" id="update_heur" name="heur">
                        </div>
                        <div class="mb-3">
                            <label for="update_prix" class="col-form-label">Prix : </label>
                            <input type="number" min="1" class="form-control" id="update_date" name="prix">
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
                var to = "/editEvent/update/";
                $('#update').modal('show');
                $('#form_update').prop("action", to + id);
                $.ajax({
                    type: "GET",
                    url: "/edit_event/" + id,
                    success: function(event) {
                        $('#type').val(event.type);
                        $('#date').val(event.date);
                        $('#heur').val(event.heur);
                        $('#prix').val(event.prix);

                    }
                })
            });
        });
    </script>
@endsection
@section('custom-scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
