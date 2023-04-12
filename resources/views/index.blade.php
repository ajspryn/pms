@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="user-profile-header-banner">
                        @if ($ship->photo)
                            <img src="{{ asset('storage/' . $ship->photo) }}" alt="Banner image" class="rounded-top" />
                        @else
                            <img src="{{ asset('assets/img/pages/profile-banner.png') }}" alt="Banner image" class="rounded-top" />
                        @endif
                    </div>
                    <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img" />
                        </div>
                        <div class="flex-grow-1 mt-3 mt-sm-5">
                            <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                                <div class="user-profile-info">
                                    <h4>{{ Auth::user()->name }}</h4>
                                    {{-- <p><span class="badge bg-label-primary">{{ $role }}</span></p> --}}
                                    <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                        <li class="list-inline-item"><i class="ti ti-mail"></i> {{ Auth::user()->email }}</li>
                                        <li class="list-inline-item"><i class="ti ti-user"></i> {{ Auth::user()->username }}</li>
                                        <li class="list-inline-item"><i class="ti ti-ship"></i> {{ $ship->name }}</li>
                                    </ul>
                                </div>
                                {{-- <a href="javascript:void(0)" class="btn btn-primary">
                                        <i class="ti ti-user-check me-1"></i>Connected
                                    </a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Content -->
@endsection
