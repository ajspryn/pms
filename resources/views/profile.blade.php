@extends('layouts.main')

@section('title', 'Profile')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Profile Settings /</span> Profile</h4>

        <div class="nav-align-top mb-4">
            <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                <li class="nav-item">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-profile" aria-controls="navs-pills-justified-profile" aria-selected="true"><i class="tf-icons ti ti-user ti-xs me-1"></i> Profile</button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-experience" aria-controls="navs-pills-justified-experience" aria-selected="false"><i class="tf-icons ti ti-user-star ti-xs me-1"></i> Experience</button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-education" aria-controls="navs-pills-justified-education" aria-selected="false"><i class="tf-icons ti ti-books ti-xs me-1"></i> Education</button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-history" aria-controls="navs-pills-justified-history" aria-selected="false"><i class="tf-icons ti ti-history ti-xs me-1"></i> History</button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-health" aria-controls="navs-pills-justified-health" aria-selected="false"><i class="tf-icons ti ti-empathize ti-xs me-1"></i> Health</button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-certificate" aria-controls="navs-pills-justified-certificate" aria-selected="false"><i class="tf-icons ti ti-empathize ti-xs me-1"></i> Certificate</button>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="navs-pills-justified-profile" role="tabpanel">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Account -->
                            <div class="card mb-4">
                                <form id="formAccountSettings1" method="POST" action="/profile/{{ Auth::user()->id }}" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <h5 class="card-header">Profile Details</h5>
                                    <div class="card-body">
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
                                            <div class="button-wrapper">
                                                <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                                                    <span class="d-none d-sm-block">Upload new photo</span>
                                                    <i class="ti ti-upload d-block d-sm-none"></i>
                                                    <input type="file" id="upload" class="account-file-input" name="avatar" hidden accept="image/png, image/jpeg" />
                                                    <input type="hidden" name="avatarlama" value="{{ Auth::user()->avatar }}" hidden />
                                                </label>
                                                <button type="button" class="btn btn-label-secondary account-image-reset mb-3">
                                                    <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Reset</span>
                                                </button>

                                                <div class="text-muted">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-3 col-md-12">
                                                <label for="name" class="form-label">Name</label>
                                                <input class="form-control" type="text" id="name" name="name" value="{{ Auth::user()->name }}" required />
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="username" class="form-label">Username</label>
                                                <input class="form-control" type="username" name="username" id="username" value="{{ Auth::user()->username }}" required />
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="email" class="form-label">E-mail</label>
                                                <input class="form-control" type="email" id="email" name="email" value="{{ Auth::user()->email }}" placeholder="john.doe@example.com" required />
                                            </div>
                                            <input type="hidden" name="code" value="1">
                                        </div>
                                        <div class="mt-2">
                                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                            <button type="reset" class="btn btn-label-secondary">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /Account -->
                        </div>
                        <div class="col-md-6">
                            <!-- Change Password -->
                            <div class="card mb-4">
                                <h5 class="card-header">Change Password</h5>
                                <div class="card-body">
                                    <form id="formAccountSettings" method="POST" action="/profile/{{ Auth::user()->id }}">
                                        @method('put')
                                        @csrf
                                        <div class="row">
                                            <div class="mb-3 col-md-6 form-password-toggle">
                                                <label class="form-label" for="currentPassword">Current Password</label>
                                                <div class="input-group input-group-merge">
                                                    <input class="form-control" type="password" name="currentPassword" id="currentPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6 form-password-toggle">
                                                <label class="form-label" for="newPassword">New Password</label>
                                                <div class="input-group input-group-merge">
                                                    <input class="form-control" type="password" id="newPassword" name="newPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                                </div>
                                            </div>

                                            <div class="mb-3 col-md-6 form-password-toggle">
                                                <label class="form-label" for="confirmPassword">Confirm New Password</label>
                                                <div class="input-group input-group-merge">
                                                    <input class="form-control" type="password" name="Password" id="confirmPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-4">
                                                <h6>Password Requirements:</h6>
                                                <ul class="ps-3 mb-0">
                                                    <li class="mb-1">Minimum 8 characters long - the more, the better</li>
                                                </ul>
                                            </div>
                                            <input type="hidden" name="code" value="2">
                                            <div>
                                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                                <button type="reset" class="btn btn-label-secondary">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--/ Change Password -->
                        </div>
                        <div class="col-md-12">
                            <!-- Account -->
                            <div class="card mb-4">
                                <form id="formAccountSettings1" method="POST" action="/profile" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="name" class="form-label">Name</label>
                                                <input class="form-control" type="text" id="name" name="name" value="{{ Auth::user()->name }}" required />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="username" class="form-label">Username</label>
                                                <input class="form-control" type="username" name="username" id="username" value="{{ Auth::user()->username }}" required />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="email" class="form-label">E-mail</label>
                                                <input class="form-control" type="email" id="email" name="email" value="{{ Auth::user()->email }}" placeholder="john.doe@example.com" required />
                                            </div>
                                            <input type="hidden" name="code" value="1">
                                        </div>
                                        <div class="mt-2">
                                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                            <button type="reset" class="btn btn-label-secondary">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /Account -->
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="navs-pills-justified-experience" role="tabpanel">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bg-lighter rounded p-3 mb-3 position-relative">
                                <div class="dropdown api-key-actions">
                                    <a class="btn dropdown-toggle text-muted hide-arrow p-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:;" class="dropdown-item"><i class="ti ti-pencil me-2"></i>Edit</a>
                                        <a href="javascript:;" class="dropdown-item"><i class="ti ti-trash me-2"></i>Delete</a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="mb-0 me-3">Server Key 1</h4>
                                    <span class="badge bg-label-primary">Full Access</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <p class="me-2 mb-2 fw-semibold">23eaf7f0-f4f7-495e-8b86-fad3261282ac</p>
                                    <span class="text-muted cursor-pointer"><i class="ti ti-copy ti-sm"></i></span>
                                </div>
                                <span class="text-muted">Created on 28 Apr 2021, 18:20 GTM+4:10</span>
                            </div>
                            <div class="bg-lighter rounded p-3 position-relative mb-3">
                                <div class="dropdown api-key-actions">
                                    <a class="btn dropdown-toggle text-muted hide-arrow p-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:;" class="dropdown-item"><i class="ti ti-pencil me-2"></i>Edit</a>
                                        <a href="javascript:;" class="dropdown-item"><i class="ti ti-trash me-2"></i>Delete</a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="mb-0 me-3">Server Key 2</h4>
                                    <span class="badge bg-label-primary">Read Only</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <p class="me-2 mb-2 fw-semibold">bb98e571-a2e2-4de8-90a9-2e231b5e99</p>
                                    <span class="text-muted cursor-pointer"><i class="ti ti-copy ti-sm"></i></span>
                                </div>
                                <span class="text-muted">Created on 12 Feb 2021, 10:30 GTM+2:30</span>
                            </div>
                            <div class="bg-lighter rounded p-3 position-relative">
                                <div class="dropdown api-key-actions">
                                    <a class="btn dropdown-toggle text-muted hide-arrow p-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:;" class="dropdown-item"><i class="ti ti-pencil me-2"></i>Edit</a>
                                        <a href="javascript:;" class="dropdown-item"><i class="ti ti-trash me-2"></i>Delete</a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="mb-0 me-3">Server Key 3</h4>
                                    <span class="badge bg-label-primary">Full Access</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <p class="me-2 mb-2 fw-semibold">2e915e59-3105-47f2-8838-6e46bf83b711</p>
                                    <span class="text-muted cursor-pointer"><i class="ti ti-copy ti-sm"></i></span>
                                </div>
                                <span class="text-muted">Created on 28 Dec 2020, 12:21 GTM+4:10</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="navs-pills-justified-education" role="tabpanel">
                    <p>
                        Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon gummies cupcake gummi
                        bears
                        cake chocolate.
                    </p>
                    <p class="mb-0">
                        Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple pie brownie cake. Sweet roll icing
                        sesame snaps caramels danish toffee. Brownie biscuit dessert dessert. Pudding jelly jelly-o tart brownie
                        jelly.
                    </p>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-md-6">
                <!-- Account -->
                <div class="card mb-4">
                    <form id="formAccountSettings1" method="POST" action="/profile/{{ Auth::user()->id }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <h5 class="card-header">Profile Details</h5>
                        <div class="card-body">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
                                <div class="button-wrapper">
                                    <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                                        <span class="d-none d-sm-block">Upload new photo</span>
                                        <i class="ti ti-upload d-block d-sm-none"></i>
                                        <input type="file" id="upload" class="account-file-input" name="avatar" hidden accept="image/png, image/jpeg" />
                                        <input type="hidden" name="avatarlama" value="{{ Auth::user()->avatar }}" hidden />
                                    </label>
                                    <button type="button" class="btn btn-label-secondary account-image-reset mb-3">
                                        <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Reset</span>
                                    </button>

                                    <div class="text-muted">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-0" />
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label for="name" class="form-label">Name</label>
                                    <input class="form-control" type="text" id="name" name="name" value="{{ Auth::user()->name }}" required />
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="username" class="form-label">Username</label>
                                    <input class="form-control" type="username" name="username" id="username" value="{{ Auth::user()->username }}" required />
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input class="form-control" type="email" id="email" name="email" value="{{ Auth::user()->email }}" placeholder="john.doe@example.com" required />
                                </div>
                                <input type="hidden" name="code" value="1">
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                <button type="reset" class="btn btn-label-secondary">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
            <div class="col-md-6">
                <!-- Change Password -->
                <div class="card mb-4">
                    <h5 class="card-header">Change Password</h5>
                    <div class="card-body">
                        <form id="formAccountSettings" method="POST" action="/profile/{{ Auth::user()->id }}">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6 form-password-toggle">
                                    <label class="form-label" for="currentPassword">Current Password</label>
                                    <div class="input-group input-group-merge">
                                        <input class="form-control" type="password" name="currentPassword" id="currentPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6 form-password-toggle">
                                    <label class="form-label" for="newPassword">New Password</label>
                                    <div class="input-group input-group-merge">
                                        <input class="form-control" type="password" id="newPassword" name="newPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                    </div>
                                </div>

                                <div class="mb-3 col-md-6 form-password-toggle">
                                    <label class="form-label" for="confirmPassword">Confirm New Password</label>
                                    <div class="input-group input-group-merge">
                                        <input class="form-control" type="password" name="Password" id="confirmPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                    </div>
                                </div>
                                <div class="col-12 mb-4">
                                    <h6>Password Requirements:</h6>
                                    <ul class="ps-3 mb-0">
                                        <li class="mb-1">Minimum 8 characters long - the more, the better</li>
                                    </ul>
                                </div>
                                <input type="hidden" name="code" value="2">
                                <div>
                                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                    <button type="reset" class="btn btn-label-secondary">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--/ Change Password -->
            </div>
        </div> --}}
    </div>
    <!--/ Content -->
@endsection
