@extends('dash.blanck-page')
@section('body-content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>All Classes</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">All Classes</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">All Classes</h4>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addnew" data-bs-whatever="@mdo">+ Add new</button>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example3" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>Nom de Classe</th>
                                                    <th>Nb. max des étudiants</th>
                                                    <th>Niveau</th>
                                                    <th>Surveillant General</th>
                                                    <th>prof</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($class as $c)
                                                    <tr>
                                                        <td>{{ $c->nom }}</td>
                                                        <td>{{ $c->nb_max_student }}</td>
                                                        <td>{{ $c->niveau ? $c->niveau->nom : 'pas affecté' }}</td>
                                                        <td>{{ $c->surveillant_generale ? $c->surveillant_generale->user->prenom .' '.$c->surveillant_generale->user->nom : 'pas affecté' }}</td>
                                                        <td>{{  $c->prof ? $c->prof->user->prenom .' '. $c->prof->user->nom : 'pas affecté'}}</td>
                                                        <td>
                                                            <button type="button" value="{{$c->id}}" class="btn btn-sm btnedit btn-success">
                                                                <i class="la la-pencil">
                                                                </i>
                                                            </button>
                                                            <form method="POST" action="{{route('deleteclass',['id' => $c->id])}}" id="delete_form{{ $loop->iteration }}" class="d-none">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                            <button class="btn btn-sm btn-danger sweet-confirm" form="delete_form{{ $loop->iteration }}" data-form-id="delete_form{{ $loop->iteration }}">
                                                                <i class="la la-trash-o" data-form-id="delete_form{{ $loop->iteration }}">
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
                    <h5 class="modal-title" id="exampleModalLabel">New Class</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('storeclass') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nom Classe : </label>
                            <input type="text" class="form-control" id="recipient-name" name="nom">
                        </div>
                        <div class="mb-3">
                            <label for="nb-max-student" class="col-form-label">Nb. max. des étudiants : </label>
                            <input type="number" class="form-control" id="nb-max-student" value="{{ env('CLASSE_NB_MAX_STUDENT')}}" name="nb_max_student">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Niveau : </label>
                            <select class="form-control" tabindex="-98" name="nv">
                                <option value="" selected disabled>Niveau</option>
                                @foreach ($niveaux as $niveau)
                                    <option value="{{ $niveau->id }}">{{ $niveau->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Surveillant General : </label>
                            <select class="form-control" tabindex="-98" name="sg">
                                <option value="" selected disabled>Surveillant General</option>
                                @foreach ($sg as $s)
                                    @if ($s->user)
                                        <option value="{{ $s->id }}">{{ $s->user->prenom . ' ' . $s->user->nom }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Prof : </label>
                            <select class="form-control" tabindex="-98" name="prof">
                                <option value="" selected disabled>Prof</option>
                                @foreach ($profs as $prof)
                                    @if ($prof->user)
                                        <option value="{{ $prof->id }}">{{ $prof->user->prenom . ' ' . $prof->user->nom }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
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
    {{-- start modal update --}}
    <div class="modal fade" id="update-class" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Filiere</h5>
                </div>
                <div class="modal-body">
                    <form id="form_update" method="POST" action="">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nom : </label>
                            <input type="text" class="form-control" id="nom" name="nom">
                        </div>
                        <div class="mb-3">
                            <label for="nb-max-student-edit" class="col-form-label">Nb. max. des étudiants : </label>
                            <input type="number" class="form-control" id="nb-max-student-edit" value="{{ env('CLASSE_NB_MAX_STUDENT')}}" name="nb_max_student">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Niveau : </label>
                            <select class="form-control" tabindex="-98" name="niveau_id">
                                <option value="" selected disabled>Niveau</option>
                                @foreach ($niveaux as $niveau)
                                    <option value="{{ $niveau->id }}">{{ $niveau->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Surveillant General : </label>
                            <select class="form-control" tabindex="-98" name="surveillant_general_id">
                                <option value="" selected disabled>Surveillant General</option>
                                @foreach ($sg as $s)
                                    @if ($s->user)
                                        <option value="{{ $s->id }}">{{ $s->user->prenom . ' ' . $s->user->nom }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Prof : </label>
                            <select class="form-control" tabindex="-98" name="prof_id">
                                <option value="" selected disabled>Prof</option>
                                @foreach ($profs as $prof)
                                    @if ($prof->user)
                                        <option value="{{ $prof->id }}">{{ $prof->user->prenom . ' ' . $prof->user->nom }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end modal update --}}
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.btnedit', function() {
                var id = $(this).val();
                var to = "/editClass/update/";
                $('#update-class').modal('show');
                $('#form_update').prop("action", to + id);
                $.ajax({
                    type: "GET",
                    url: "/edit_class/" + id,
                    success: function(filiere) {
                        $('#nom').val(filiere.nom);
                        $("input#nb-max-student-edit").val(filiere.nb_max_student);
                    }
                })
            });
        });
    </script>
@endsection
@section('custom-scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
