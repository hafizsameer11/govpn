@extends('admin.layouts.main')

@section('content')


            <div class="page-wrapper">
                <div class="page-content-wrapper">
                    <div class="page-content">
                        <!--breadcrumb-->
                        <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                            <div class="breadcrumb-title pr-3">VPN Server Management</div>
                            <div class="pl-3">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0 p-0">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class='bx bx-home-alt'></i></a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit VPN Server</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="ml-auto">
                                <a href="{{ route('admin.servers.index') }}" class="btn btn-primary">All Servers</a>
                            </div>
                        </div>
                        <!--end breadcrumb-->

                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex justify-content-between align-items-center">
                                    <h4 class="mb-0">Edit VPN Server</h4>
                                    <a href="{{ route('admin.servers.index') }}" class="btn btn-primary">
                                        <i class="fas fa-server"></i> View All Servers
                                    </a>
                                </div>
                                <hr />
                                <form action="{{ route('admin.servers.update', $server->id) }}" method="POST">
                                    @csrf
                                    @method('PUT') <!-- For updating an existing server -->
                                    <!-- Server Name -->
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="serverName">Server Name</label>
                                            <input type="text" class="form-control" id="serverName" name="name" value="{{ $server->name }}" required>
                                        </div>
                                        <!-- IP Address -->
                                        <div class="col-md-6 mb-3">
                                            <label for="ipAddress">IP Address</label>
                                            <input type="text" class="form-control" id="ipAddress" name="ip_address" value="{{ $server->ip_address }}" required>
                                        </div>
                                    </div>

                                    <!-- Country Selection -->
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="country">Country</label>
                                            <select class="custom-select" id="country" name="country_id" required>
                                                <option selected disabled value="">Choose Country...</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}" {{ $server->country_id == $country->id ? 'selected' : '' }}>
                                                        {{ $country->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <button class="btn btn-primary" type="submit">Update Server</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


    @endsection
