@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Ship /</span> Ship List
        </h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <table class="datatables-basic table">
                    <thead>
                        <tr>
                            <th></th>
                            <th style="text-align: center">id</th>
                            <th style="text-align: center">Name</th>
                            <th style="text-align: center">Categori</th>
                            <th style="text-align: center">Status</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ships as $ship)
                            <tr>
                                <td></td>
                                <td style="text-align: center">{{ $ship->id }}</td>
                                <td>{{ $ship->name }}</td>
                                <td style="text-align: center">{{ $ship->categori }}</td>
                                <td style="text-align: center">{{ $ship->status }}</td>
                                <td style="text-align: center">
                                    @can('ship-edit')
                                        <a class="btn btn-sm btn-icon item-edit" href="javascript:void(0);"><i class="ti ti-pencil me-2"></i></a>
                                    @endcan
                                    @can('ship-delete')
                                        <form action="/ship/{{ $ship->id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <a class="btn btn-sm btn-icon item-delete" href="#" onclick="return Swal.fire({title:'Apakah Anda yakin ingin menghapus data ini?',icon:'warning',showCancelButton:true,confirmButtonText:'Ya',cancelButtonText:'Tidak',reverseButtons:true}).then((result) => {if (result.isConfirmed) {this.closest('form').submit();} else {return false;}});"><i class="ti ti-trash me-1"></i></a>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
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
                <form class="needs-validation pt-0 row g-2" novalidate id="form-add-new-record" method="POST" action="/ship" enctype="multipart/form-data">
                    @csrf
                    <div class="col-sm-12">
                        <label class="form-label" for="bs-validation-name">Name</label>
                        <input type="text" class="form-control" id="bs-validation-name" name="name" placeholder="Ship Name" required />
                        <div class="valid-feedback"> Ok! </div>
                        <div class="invalid-feedback"> Required. </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="bs-validation-categori">Categori</label>
                        <select class="form-select" id="bs-validation-categori" name="categori" required>
                            <option value="">Select Categori</option>
                            <option value="Ship">Ship</option>
                            <option value="Boat">Boat</option>
                        </select>
                        <div class="valid-feedback"> Ok! </div>
                        <div class="invalid-feedback"> Required. </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="bs-validation-status">Status</label>
                        <select class="form-select" id="bs-validation-status" name="status" required>
                            <option value="Active">Active</option>
                            <option value="Not Active">Not Active</option>
                        </select>
                        <div class="valid-feedback"> Ok! </div>
                        <div class="invalid-feedback"> Required. </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="bs-validation-name">Photo</label>
                        <input type="file" class="form-control" id="bs-validation-name" name="photo"required />
                        <div class="valid-feedback"> Ok! </div>
                        <div class="invalid-feedback"> Required. </div>
                    </div>
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    </div>
                </form>

            </div>
        </div>
        <!--/ DataTable with Buttons -->
    </div>
    <!--/ Content -->
@endsection
