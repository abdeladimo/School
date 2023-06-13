@extends('dash.blanck-page')
@section('body-content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Tous les chauffeurs</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Tous les chauffeurs</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tous les chauffeurs</h4>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addnew" data-bs-whatever="@mdo">+ Ajouter chauffeur</button>
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
                                                    <th>Nom complet</th>
                                                    <th>CIN</th>
                                                    <th>Tel</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- <tr>
                                                    <td>
                                                        <button type="button" data-chauffeur-id="{{ $chauffeur->id }}" class="btn btn-sm btnedit btn-success btn-edit"
                                                            data-bs-toggle="modal" data-bs-target="#addnew" data-bs-whatever="@mdo">
                                                            <i class="la la-pencil">
                                                            </i>
                                                        </button>
                                                        <form method="POST" action="{{ route('deletechauffeur', ['id' => $chauffeur->id]) }}"
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
                                                </tr> --}}
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
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter chauffeur</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nom" class="col-form-label">Nom </label>
                        <input type="text" id="nom" class="form-control" name="nom" min="1">
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="col-form-label">Prénom </label>
                        <input type="text" id="prenom" class="form-control" name="prenom" min="1">
                    </div>
                    <div class="mb-3">
                        <label for="cin" class="col-form-label">CIN </label>
                        <input type="text" id="cin" class="form-control" name="cin" min="1">
                    </div>
                    <div class="mb-3">
                        <label for="date-naissance" class="col-form-label">Date naissance </label>
                        <input type="date" id="date-naissance" class="form-control" name="date-naissance" min="1">
                    </div>
                    <div class="mb-3">
                        <label for="adress" class="col-form-label">Adresse </label>
                        <input type="text" id="adress" class="form-control" name="adress" min="1">
                    </div>
                    <div class="mb-3">
                        <label for="tel" class="col-form-label">Tel </label>
                        <input type="text" id="tel" class="form-control" name="tel" min="1">
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="col-form-label">Sexe </label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="" hidden selected>Sexe</option>
                            <option value="Male">Homme</option>
                            <option value="Female">Femme</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="col-form-label">Description </label>
                        <textarea class="form-control" id="description" name="description" style="resize: none">
                        </textarea>
                    </div>
                    <div class="mb-3">
                        <label for="avatar" class="col-form-label">Image </label>
                        <input type="file" class="dropify" data-default-file="" name="image" id="avatar">
                    </div>
                    <div class="mb-3">
                        <label for="salaire" class="col-form-label">Salaire </label>
                        <input type="number" id="salaire" class="form-control" name="salaire" min="1">
                    </div>
                    <div class="mb-3">
                        <label for="date-embauche" class="col-form-label">Date naissance </label>
                        <input type="date" id="date-embauche" class="form-control" name="date-embauche" min="1">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-add">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal add --}}
@endsection
@section('custom-scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/api/driver/add-driver.js') }}"></script>
@endsection
