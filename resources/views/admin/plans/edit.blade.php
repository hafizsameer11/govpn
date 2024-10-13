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
                                <form action="{{ route('plans.update', $plan->id) }}" method="POST">
                                    @csrf

                                    <!-- Server Name -->
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="serverName">Title /label>
                                            <input type="text" class="form-control" id="serverName" name="title" value="{{ $plan->title }}" required>
                                        </div>
                                        <!-- IP Address -->
                                        <div class="col-md-6 mb-3">
                                            <label for="ipAddress">Duration</label>
                                            <input type="text" class="form-control" id="ipAddress" name="duration" value="{{ $plan->duration }}" required>
                                        </div>
                                    </div>

                                    <!-- Country Selection -->
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="country">Price</label>
                                           <input type="text" class="form-control" name="price" value="{{$plan->price}}">
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <button class="btn btn-primary" type="submit">Update Plan</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


    @endsection
