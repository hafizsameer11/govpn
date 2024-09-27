@extends('admin.layouts.main')

@section('content')

    <body class="bg-theme bg-theme1">
        <!-- wrapper -->
        <div class="wrapper">
            <!--sidebar-wrapper-->

            <!--end sidebar-wrapper-->
            <!--header-->

            <!--end header-->
            <!--page-wrapper-->
            <div class="page-wrapper">
                <!--page-content-wrapper-->
                <div class="page-content-wrapper">
                    <div class="page-content">
                        <!--breadcrumb-->
                        <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                            <div class="breadcrumb-title pr-3">Forms</div>
                            <div class="pl-3">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0 p-0">
                                        <li class="breadcrumb-item"><a href="javascript:;"><i
                                                    class='bx bx-home-alt'></i></a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Validations</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="ml-auto">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-light">Settings</button>
                                    <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split"
                                        data-toggle="dropdown"> <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left"> <a
                                            class="dropdown-item" href="javascript:;">Action</a>
                                        <a class="dropdown-item" href="javascript:;">Another action</a>
                                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                                        <div class="dropdown-divider"></div> <a class="dropdown-item"
                                            href="javascript:;">Separated link</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end breadcrumb-->

                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex justify-content-between align-items-center">
                                    <h4 class="mb-0">Add VPN Server</h4>
                                    <a href="{{ route('servers.index') }}" class="btn btn-primary">
                                        <i class="fas fa-server"></i> All Servers
                                    </a>
                                </div>
                                <hr />
                                <form action="{{ route('servers.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <!-- Server Name -->
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="serverName">Server Name</label>
                                            <input type="text" class="form-control" id="serverName" name="name"
                                                placeholder="Server Name" required>
                                        </div>
                                        <!-- IP Address -->
                                        <div class="col-md-6 mb-3">
                                            <label for="ipAddress">IP Address</label>
                                            <input type="text" class="form-control" id="ipAddress" name="ip_address"
                                                placeholder="IP Address" required>
                                        </div>
                                    </div>

                                    <!-- City and Country -->
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" id="city" name="city"
                                                placeholder="City" required>
                                        </div>
                                        {{-- <div class="col-md-6 mb-3">
                                            <label for="country">Country</label>
                                            <select class="custom-select" id="country" name="country_id" required>
                                                <option selected disabled value="">Choose Country...</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div> --}}
                                    </div>

                                    <!-- VPN Configuration Files -->
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="caCert">CA Certificate (.crt)</label>
                                            <input type="file" class="form-control" id="caCert" name="ca_cert"
                                                accept=".crt" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="tlsAuth">TLS Auth Key</label>
                                            <input type="file" class="form-control" id="tlsAuth" name="tls_auth"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="dhFile">DH Parameter File (.pem)</label>
                                            <input type="file" class="form-control" id="dhFile" name="dh_file"
                                                accept=".pem" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="sshKey">SSH Key File (.pem)</label>
                                            <input type="file" class="form-control" id="sshKey" name="ssh_key"
                                                accept=".pem" required>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </form>
                            </div>
                        </div>



                    </div>
                </div>

            </div>

            <div class="overlay toggle-btn-mobile"></div>
            <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>

        </div>
    @endsection
