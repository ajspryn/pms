@extends('layouts.main')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-semibold mb-4">Edit Role</h4>
        <div class="row">
            <div class="col-xl-4 mb-4">
                <div class="card">
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
                        {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id]]) !!}
                        <div class="form-floating">
                            {!! Form::text('name', null, ['placeholder' => ' ', 'class' => 'form-control', 'aria-describedby' => 'floatingInputHelp']) !!}
                            <label for="floatingInput">Name Role</label>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md mb-md-0 mb-2">
                                    <a href="{{ route('roles.index') }}" class="btn btn-danger">Back</a>
                                </div>
                                <div class="col-md text-sm-end">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mb-4 col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title mb-0">Permission</h5>
                        <small class="text-muted"></small>
                    </div>
                    <div class="card-body pt-2">
                        <div class="row gy-3">
                            @foreach ($permission as $perm)
                                <?php
                                $per_found = null;

                                if (isset($role)) {
                                    $per_found = $role->hasPermissionTo($perm->name);
                                }

                                if (isset($user)) {
                                    $per_found = $user->hasDirectPermission($perm->name);
                                }

                                $labelName = Str::of($perm->name)->replace('-', ' ');
                                ?>
                                <div class="col-md-3 col-6">
                                    <div class="d-flex align-items-center">
                                        <p>{{ Form::checkbox('permission[]', $perm->id, in_array($perm->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                                            {{-- <input class="form-check-input" type="checkbox" name="permissions[]" id="{{ $perm->id }}" value="{{ $perm->name }}" {{  ($per_found == true ? ' checked' : '') }} {{ $disabled ?? '' }} /> --}}
                                            <label class="form-check-label {{ Str::contains($perm->name, 'delete') ? 'text-danger' : '' }}" for="{{ $perm->id }}">
                                                {{ $labelName }}
                                            </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {!! Form::close() !!}
    @endsection
