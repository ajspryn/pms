@extends('layouts.main')
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="fw-semibold mb-4">Roles List</h4>

        <!-- Role cards -->

        <div class="row g-4">
            @foreach ($roles as $key => $role)
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h6 class="fw-normal mb-2">Permission </h6>
                                <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Vinnie Mostowy" class="avatar avatar-sm pull-up">
                                        <img class="rounded-circle" src="../../assets/img/avatars/5.png" alt="Avatar">
                                    </li>
                                </ul>
                            </div>
                            <div class="d-flex justify-content-between align-items-end mt-1 text-sm">
                                <h4 class="mb-1">{{ $role->name }}</h4>
                                <div class="role-heading">
                                    @can('role-edit')
                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn submit-btn"><i class=" ti ti-edit ti-ms"></i></a>
                                    @endcan
                                    @can('role-delete')
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                        <a class="text-muted" onclick="return Swal.fire({title:'Apakah Anda yakin ingin menghapus data ini?',icon:'warning',showCancelButton:true,confirmButtonText:'Ya',cancelButtonText:'Tidak',reverseButtons:true}).then((result) => {if (result.isConfirmed) {this.closest('form').submit();} else {return false;}});"><i class="ti ti-trash"></i></a>
                                        {!! Form::close() !!}
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card h-100">
                    <div class="row h-100">
                        <div class="col-sm-5">
                            <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-3">
                                <img src="../../assets/img/illustrations/add-new-roles.png" class="img-fluid mt-sm-4 mt-md-0" alt="add-new-roles" width="83">
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="card-body text-sm-end text-center ps-sm-0">
                                @can('role-create')
                                    {{-- <a href="{{ route('roles.create') }}" class="btn btn-primary mb-2 text-nowrap add-new-role">Add New Role</a> --}}
                                    <button data-bs-target="#addRoleModal" data-bs-toggle="modal" class="btn btn-primary mb-2 text-nowrap add-new-role">Add New Role</button>
                                @endcan
                                <p class="mb-0 mt-1">Add role, if it does not exist</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- {!! $roles->render() !!} --}}

    <!-- Add Role Modal -->
    <div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
            <div class="modal-content p-3 p-md-5">
                <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <h3 class="role-title mb-2">Add New Role</h3>
                        <p class="text-muted">Set role permissions</p>
                    </div>
                    <!-- Add role form -->
                    <form id="addRoleForm" class="row g-3" action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        <div class="col-12 mb-4">
                            <label class="form-label" for="modalRoleName">Role Name</label>
                            <input type="text" id="modalRoleName" name="name" class="form-control" placeholder="Enter a role name" tabindex="-1" />
                        </div>
                        <div class="col-12">
                            <h5>Role Permissions</h5>
                            {{-- {{ $permissions[0] }} --}}
                            <!-- Permission table -->
                            <div class="table-responsive">
                                <table class="table table-flush-spacing">
                                    <tbody>
                                        <tr>
                                            <td class="text-nowrap fw-semibold">Session </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md mb-md-0 mb-2">
                                                        <div class="form-check custom-option custom-option-basic">
                                                            <label class="form-check-label custom-option-content" for="customRadioTemp1">
                                                                <input name="customRadioTemp" class="form-check-input" type="radio" id="customRadioTemp1" value="{{ $permissions[0]->id }}" name="permission[]" />
                                                                <span class="custom-option-header">
                                                                    <span class="h6 mb-0">{{ $permissions[0]->name }}</span>
                                                                    {{-- <span class="text-muted">Free</span> --}}
                                                                </span>
                                                                <span class="custom-option-body">
                                                                    {{-- <small>Get 1 project with 1 teams members.</small> --}}
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-check custom-option custom-option-basic">
                                                            <label class="form-check-label custom-option-content" for="customRadioTemp2">
                                                                <input name="customRadioTemp" class="form-check-input" type="radio" id="customRadioTemp2" value="{{ $permissions[0]->id }}" name="permission[]" />
                                                                <span class="custom-option-header">
                                                                    <span class="h6 mb-0">{{ $permissions[1]->name }}</span>
                                                                    {{-- <span class="text-muted">$ 5.00</span> --}}
                                                                </span>
                                                                <span class="custom-option-body">
                                                                    {{-- <small>Get 5 projects with 5 team members.</small> --}}
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap fw-semibold">{{ $permissions[2]->name }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[2]->id }}" name="permission[]" type="checkbox" id="userManagementRead" />
                                                        <label class="form-check-label" for="userManagementRead">
                                                            Read
                                                        </label>
                                                    </div>
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[3]->id }}" name="permission[]" type="checkbox" id="userManagementCreate" />
                                                        <label class="form-check-label" for="userManagementCreate">
                                                            Create
                                                        </label>
                                                    </div>
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[4]->id }}" name="permission[]" type="checkbox" id="userManagementUpdate" />
                                                        <label class="form-check-label" for="userManagementUpdate">
                                                            Update
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" value="{{ $permissions[5]->id }}" name="permission[]" type="checkbox" id="userManagementDelete" />
                                                        <label class="form-check-label" for="userManagementDelete">
                                                            Delete
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap fw-semibold">{{ $permissions[6]->name }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[6]->id }}" name="permission[]" type="checkbox" id="contentManagementRead1" />
                                                        <label class="form-check-label" for="contentManagementRead1">
                                                            Read
                                                        </label>
                                                    </div>
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[7]->id }}" name="permission[]" type="checkbox" id="contentManagementCreate1" />
                                                        <label class="form-check-label" for="contentManagementCreate1">
                                                            Create
                                                        </label>
                                                    </div>
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[8]->id }}" name="permission[]" type="checkbox" id="contentManagementUpdate1" />
                                                        <label class="form-check-label" for="contentManagementUpdate1">
                                                            Update
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" value="{{ $permissions[9]->id }}" name="permission[]" type="checkbox" id="contentManagementDelete1" />
                                                        <label class="form-check-label" for="contentManagementDelete1">
                                                            Delete
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap fw-semibold">{{ $permissions[10]->name }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[10]->id }}" name="permission[]" type="checkbox" id="contentManagementRead2" />
                                                        <label class="form-check-label" for="contentManagementRead2">
                                                            Read
                                                        </label>
                                                    </div>
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[11]->id }}" name="permission[]" type="checkbox" id="contentManagementCreate2" />
                                                        <label class="form-check-label" for="contentManagementCreate2">
                                                            Create
                                                        </label>
                                                    </div>
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[12]->id }}" name="permission[]" type="checkbox" id="contentManagementUpdate2" />
                                                        <label class="form-check-label" for="contentManagementUpdate2">
                                                            Update
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" value="{{ $permissions[13]->id }}" name="permission[]" type="checkbox" id="contentManagementDelete2" />
                                                        <label class="form-check-label" for="contentManagementDelete2">
                                                            Delete
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap fw-semibold">{{ $permissions[14]->name }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[14]->id }}" name="permission[]" type="checkbox" id="contentManagementRead3" />
                                                        <label class="form-check-label" for="contentManagementRead3">
                                                            Read
                                                        </label>
                                                    </div>
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[15]->id }}" name="permission[]" type="checkbox" id="contentManagementCreate3" />
                                                        <label class="form-check-label" for="contentManagementCreate3">
                                                            Create
                                                        </label>
                                                    </div>
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[16]->id }}" name="permission[]" type="checkbox" id="contentManagementUpdate3" />
                                                        <label class="form-check-label" for="contentManagementUpdate3">
                                                            Update
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" value="{{ $permissions[17]->id }}" name="permission[]" type="checkbox" id="contentManagementDelete3" />
                                                        <label class="form-check-label" for="contentManagementDelete3">
                                                            Delete
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap fw-semibold">{{ $permissions[18]->name }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[18]->id }}" name="permission[]" type="checkbox" id="contentManagementRead4" />
                                                        <label class="form-check-label" for="contentManagementRead4">
                                                            Read
                                                        </label>
                                                    </div>
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[19]->id }}" name="permission[]" type="checkbox" id="contentManagementCreate4" />
                                                        <label class="form-check-label" for="contentManagementCreate4">
                                                            Create
                                                        </label>
                                                    </div>
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[20]->id }}" name="permission[]" type="checkbox" id="contentManagementUpdate4" />
                                                        <label class="form-check-label" for="contentManagementUpdate4">
                                                            Update
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" value="{{ $permissions[21]->id }}" name="permission[]" type="checkbox" id="contentManagementDelete4" />
                                                        <label class="form-check-label" for="contentManagementDelete4">
                                                            Delete
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap fw-semibold">{{ $permissions[22]->name }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[22]->id }}" name="permission[]" type="checkbox" id="contentManagementRead5" />
                                                        <label class="form-check-label" for="contentManagementRead5">
                                                            Read
                                                        </label>
                                                    </div>
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[23]->id }}" name="permission[]" type="checkbox" id="contentManagementCreate5" />
                                                        <label class="form-check-label" for="contentManagementCreate5">
                                                            Create
                                                        </label>
                                                    </div>
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[24]->id }}" name="permission[]" type="checkbox" id="contentManagementUpdate5" />
                                                        <label class="form-check-label" for="contentManagementUpdate5">
                                                            Update
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" value="{{ $permissions[25]->id }}" name="permission[]" type="checkbox" id="contentManagementDelete5" />
                                                        <label class="form-check-label" for="contentManagementDelete5">
                                                            Delete
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap fw-semibold">{{ $permissions[26]->name }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[26]->id }}" name="permission[]" type="checkbox" id="contentManagementRead6" />
                                                        <label class="form-check-label" for="contentManagementRead6">
                                                            Read
                                                        </label>
                                                    </div>
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[27]->id }}" name="permission[]" type="checkbox" id="contentManagementCreate6" />
                                                        <label class="form-check-label" for="contentManagementCreate6">
                                                            Create
                                                        </label>
                                                    </div>
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[28]->id }}" name="permission[]" type="checkbox" id="contentManagementUpdate6" />
                                                        <label class="form-check-label" for="contentManagementUpdate6">
                                                            Update
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" value="{{ $permissions[29]->id }}" name="permission[]" type="checkbox" id="contentManagementDelete6" />
                                                        <label class="form-check-label" for="contentManagementDelete6">
                                                            Delete
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap fw-semibold">{{ $permissions[30]->name }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[30]->id }}" name="permission[]" type="checkbox" id="contentManagementRead7" />
                                                        <label class="form-check-label" for="contentManagementRead7">
                                                            Read
                                                        </label>
                                                    </div>
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[31]->id }}" name="permission[]" type="checkbox" id="contentManagementCreate7" />
                                                        <label class="form-check-label" for="contentManagementCreate7">
                                                            Create
                                                        </label>
                                                    </div>
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[32]->id }}" name="permission[]" type="checkbox" id="contentManagementUpdate7" />
                                                        <label class="form-check-label" for="contentManagementUpdate7">
                                                            Update
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" value="{{ $permissions[33]->id }}" name="permission[]" type="checkbox" id="contentManagementDelete7" />
                                                        <label class="form-check-label" for="contentManagementDelete7">
                                                            Delete
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap fw-semibold">{{ $permissions[34]->name }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[34]->id }}" name="permission[]" type="checkbox" id="contentManagementRead8" />
                                                        <label class="form-check-label" for="contentManagementRead8">
                                                            Read
                                                        </label>
                                                    </div>
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[35]->id }}" name="permission[]" type="checkbox" id="contentManagementCreate8" />
                                                        <label class="form-check-label" for="contentManagementCreate8">
                                                            Create
                                                        </label>
                                                    </div>
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[36]->id }}" name="permission[]" type="checkbox" id="contentManagementUpdate8" />
                                                        <label class="form-check-label" for="contentManagementUpdate8">
                                                            Update
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" value="{{ $permissions[37]->id }}" name="permission[]" type="checkbox" id="contentManagementDelete8" />
                                                        <label class="form-check-label" for="contentManagementDelete8">
                                                            Delete
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap fw-semibold">{{ $permissions[38]->name }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[38]->id }}" name="permission[]" type="checkbox" id="contentManagementRead9" />
                                                        <label class="form-check-label" for="contentManagementRead9">
                                                            Read
                                                        </label>
                                                    </div>
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[39]->id }}" name="permission[]" type="checkbox" id="contentManagementCreate9" />
                                                        <label class="form-check-label" for="contentManagementCreate9">
                                                            Create
                                                        </label>
                                                    </div>
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[40]->id }}" name="permission[]" type="checkbox" id="contentManagementUpdate9" />
                                                        <label class="form-check-label" for="contentManagementUpdate9">
                                                            Update
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" value="{{ $permissions[41]->id }}" name="permission[]" type="checkbox" id="contentManagementDelete9" />
                                                        <label class="form-check-label" for="contentManagementDelete9">
                                                            Delete
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-nowrap fw-semibold">{{ $permissions[39]->name }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[39]->id }}" name="permission[]" type="checkbox" id="contentManagementRead10" />
                                                        <label class="form-check-label" for="contentManagementRead10">
                                                            Read
                                                        </label>
                                                    </div>
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[40]->id }}" name="permission[]" type="checkbox" id="contentManagementCreate10" />
                                                        <label class="form-check-label" for="contentManagementCreate10">
                                                            Create
                                                        </label>
                                                    </div>
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[41]->id }}" name="permission[]" type="checkbox" id="contentManagementUpdate10" />
                                                        <label class="form-check-label" for="contentManagementUpdate10">
                                                            Update
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" value="{{ $permissions[42]->id }}" name="permission[]" type="checkbox" id="contentManagementDelete10" />
                                                        <label class="form-check-label" for="contentManagementDelete10">
                                                            Delete
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        {{-- <tr>
                                            <td class="text-nowrap fw-semibold">{{ $permissions[43]->name }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[43]->id }}" name="permission[]" type="checkbox" id="contentManagementRead11" />
                                                        <label class="form-check-label" for="contentManagementRead11">
                                                            Read
                                                        </label>
                                                    </div>
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[44]->id }}" name="permission[]" type="checkbox" id="contentManagementCreate11" />
                                                        <label class="form-check-label" for="contentManagementCreate11">
                                                            Create
                                                        </label>
                                                    </div>
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" value="{{ $permissions[45]->id }}" name="permission[]" type="checkbox" id="contentManagementUpdate11" />
                                                        <label class="form-check-label" for="contentManagementUpdate11">
                                                            Update
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" value="{{ $permissions[46]->id }}" name="permission[]" type="checkbox" id="contentManagementDelete11" />
                                                        <label class="form-check-label" for="contentManagementDelete11">
                                                            Delete
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                            <!-- Permission table -->
                        </div>
                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                        </div>
                    </form>
                    <!--/ Add role form -->
                </div>
            </div>
        </div>
    </div>
    <!--/ Add Role Modal -->
    <!--/ Role cards -->
    <!--/ Content -->
@endsection
