@extends('layouts.main')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Form Repeater</h5>
                <div class="card-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
                    {{-- <form class="form-repeater"> --}}
                    <div data-repeater-list="group-a">
                        <div data-repeater-item>
                            <div class="row">
                                <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                    <label class="form-label" for="form-repeater-1-1">Name</label>
                                    {!! Form::text('name', null, ['placeholder' => 'Name', 'id' => 'form-repeater-1-1', 'class' => 'form-control']) !!}
                                    {{-- <input type="text" id="form-repeater-1-1" class="form-control" placeholder="john.doe" /> --}}
                                </div>
                                <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                    <label class="form-label" for="form-repeater-1-2">UserName</label>
                                    {!! Form::text('username', null, ['placeholder' => 'Name', 'id' => 'form-repeater-1-2', 'class' => 'form-control']) !!}
                                    {{-- <input type="text" id="form-repeater-1-2" class="form-control" placeholder="john.doe" /> --}}
                                </div>
                                <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                    <label class="form-label" for="form-repeater-1-3">Email</label>
                                    {!! Form::text('email', null, ['placeholder' => 'Email', 'id' => 'form-repeater-1-3', 'class' => 'form-control']) !!}
                                    {{-- <input type="text" id="form-repeater-1-5" class="form-control" placeholder="john.doe" /> --}}
                                </div>
                                <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0">
                                    <label class="form-label" for="form-repeater-1-4">Roles</label>
                                    {!! Form::select('roles[]', $roles, [], ['class' => 'form-select', 'form-repeater-1-4']) !!}
                                    {{-- <select id="form-repeater-1-6" class="form-select">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option> --}}
                                    </select>
                                </div>
                                <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                    <label class="form-label" for="form-repeater-1-5">Password</label>
                                    {!! Form::password('password', ['placeholder' => 'Password', 'form-repeater-1-5', 'class' => 'form-control']) !!}
                                    {{-- <input type="password" id="form-repeater-1-3" class="form-control" /> --}}
                                </div>
                                <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                                    <label class="form-label" for="form-repeater-1-6">Confirm Password</label>
                                    {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'form-repeater-1-6', 'class' => 'form-control']) !!}
                                    {{-- <input type="password" id="form-repeater-1-4" class="form-control" /> --}}
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="mb-0">
                        <a href="{{ route('users.index') }}" class="btn btn-danger">Back</a>
                        <button class="btn btn-success" type="submit">
                            <i class="ti ti-plus me-1"></i>
                            <span class="align-middle">Tambah</span>
                        </button>
                        {{-- <button class="btn btn-primary" data-repeater-create>
                  <i class="ti ti-plus me-1"></i>
                  <span class="align-middle">Add</span>
                </button> --}}
                    </div>
                    {!! Form::close() !!}
                    {{-- </form> --}}
                </div>
            </div>
        </div>
        <!-- /Form Repeater -->
    @endsection
