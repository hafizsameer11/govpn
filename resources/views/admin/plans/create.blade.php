@extends('admin.layouts.main')

@section('content')



            <div class="page-wrapper">
                <div class="page-content-wrapper">
                    <div class="page-content">
                        <!--breadcrumb-->
                        <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                            <div class="breadcrumb-title pr-3">VPN Plans Management</div>
                            <div class="pl-3">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0 p-0">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class='bx bx-home-alt'></i></a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Add Plan </li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="ml-auto">
                                <a href="{{ route('plans.index') }}" class="btn btn-primary">All Plans</a>
                            </div>
                        </div>
                        <!--end breadcrumb-->

                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex justify-content-between align-items-center">
                                    <h4 class="mb-0">Add Plan </h4>
                                    <a href="{{ route('plans.index') }}" class="btn btn-primary">
                                        <i class="fas fa-server"></i> View All PLans
                                    </a>
                                </div>
                                <hr />
                                <form action="{{ route('plans.store') }}" method="POST">
                                    @csrf
                                    <!-- Server Name -->
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="serverName">Title</label>
                                            <input type="text" class="form-control" id="serverName" name="title" placeholder="Title" required>
                                        </div>
                                        <!-- IP Address -->
                                        <div class="col-md-6 mb-3">
                                            <label for="ipAddress">Duration</label>
                                            <input type="text" class="form-control" id="ipAddress" name="duration" placeholder="Duration" required>
                                        </div>
                                    </div>

                                    <!-- Country Selection -->
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="country">Price</label>
                                            <input type="text" class="form-control" name="price">
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <button class="btn btn-primary" type="submit">Add Plan</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>




    @endsection
