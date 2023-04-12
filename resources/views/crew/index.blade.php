@extends('layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Crew /</span> Crew List
        </h4>
        <!-- Users List Table -->
        <div class="card">
            <div class="card-datatable table-responsive">
                <table class="datatables-basic table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Foto</th>
                            <th>Roles</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($crews->crew as $crew)
                            @if ($crew->user)
                                <tr>
                                    <td></td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $crew->user->name }}</td>
                                    <td>{{ $crew->user->email }}</td>
                                    <td>{{ $crew->user->username }}</td>
                                    <td>{{ $crew->user->avatar }}</td>
                                    <td>
                                        @if (!empty($crew->user->getRoleNames()))
                                            @foreach ($crew->user->getRoleNames() as $role)
                                                <span class="badge rounded-pill bg-dark">{{ $role }}</span>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        @can('users-edit')
                                            <a class="btn submit-btn" href="{{ route('users.edit', $crew->user->id) }}"><i class=" ti ti-edit ti-ms"></i></a>
                                        @endcan

                                        @can('users-delete')
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $crew->user->id], 'style' => 'display:inline']) !!}
                                            {{ Form::button('<i class="ti ti-trash"></i>', ['type' => 'submit', 'class' => 'submit-btn']) }}
                                            {!! Form::close() !!}
                                        @endcan

                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Modal to add new record -->
        <div class="offcanvas offcanvas-end" id="add-new-record">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title" id="exampleModalLabel">New Ship</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body flex-grow-1">
                <form class="needs-validation pt-0 row g-2" novalidate id="form-add-new-record" method="POST" action="/crew" enctype="multipart/form-data">
                    @csrf
                    <div class="col-sm-12">
                        <label class="form-label" for="bs-validation-name">Name</label>
                        <input type="text" class="form-control" id="bs-validation-name" name="name" placeholder="Crew Name" required />
                        <div class="valid-feedback"> Ok! </div>
                        <div class="invalid-feedback"> Required. </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="bs-validation-username">Username</label>
                        <input type="username" class="form-control" id="bs-validation-username" name="username" placeholder="Crew Username" required />
                        <div class="valid-feedback"> Ok! </div>
                        <div class="invalid-feedback"> Required. </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="bs-validation-email">Email</label>
                        <input type="email" class="form-control" id="bs-validation-email" name="email" placeholder="Crew Email" required />
                        <div class="valid-feedback"> Ok! </div>
                        <div class="invalid-feedback"> Required. </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="bs-validation-password">Password</label>
                        <input type="password" class="form-control" id="bs-validation-password" name="password" placeholder="Account Password" required />
                        <div class="valid-feedback"> Ok! </div>
                        <div class="invalid-feedback"> Required. </div>
                    </div>
                    {{-- <div class="col-sm-12">
                        <label class="form-label" for="bs-validation-categori">Role</label>
                        <select class="form-select" id="bs-validation-categori" name="roles[]" required>
                            <option value="">Select Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        <div class="valid-feedback"> Ok! </div>
                        <div class="invalid-feedback"> Required. </div>
                    </div> --}}
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    </div>
                </form>

            </div>
        </div>
        <!--/ DataTable with Buttons -->
    </div>
@endsection
