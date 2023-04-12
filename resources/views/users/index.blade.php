@extends('layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-semibold mb-4">User List</h4>
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-3">Search Filter</h5>
                <div class="card-datatable text-nowrap">
                    <div class="card-datatable table-responsive">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        @can('users-create')
                            <a href="{{ route('users.create') }}" class="btn btn-primary mb-4">Add New User</a>
                        @endcan
                        <table class="dt-complex-header table table-bordered">
                            <thead>
                                <tr>
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
                                @foreach ($data as $key => $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->avatar }}</td>
                                        <td>
                                            @if (!empty($user->getRoleNames()))
                                                @foreach ($user->getRoleNames() as $v)
                                                    <span class="badge rounded-pill bg-dark">{{ $v }}</span>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @can('users-edit')
                                                <a class="btn submit-btn" href="{{ route('users.edit', $user->id) }}"><i class=" ti ti-edit ti-ms"></i></a>
                                            @endcan

                                            @can('users-delete')
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                                                {{ Form::button('<i class="ti ti-trash"></i>', ['type' => 'submit', 'class' => 'submit-btn']) }}
                                                {!! Form::close() !!}
                                            @endcan

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {!! $data->render() !!}
    @endsection
