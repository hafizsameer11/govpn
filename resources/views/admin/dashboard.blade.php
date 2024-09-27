@extends('admin.layouts.main')

@section('content')
<div class="wrapper">
    <div class="page-wrapper">
        <div class="page-content-wrapper">
            <div class="page-content">
                <!-- Breadcrumb -->
                <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                    <div class="breadcrumb-title pr-3">Dashboard</div>
                </div>
                <!-- End Breadcrumb -->

                <!-- Server, Connections, and Load Count Section in One Line -->
                <div class="row">
                    <!-- Total Servers Card -->
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="card-title">Total Servers</h5>
                                        <h3>{{ $totalServers }}</h3>
                                    </div>
                                    <div class="icon-circle bg-primary">
                                        <i class="bx bx-server text-white" style="font-size: 2.5rem;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Connections Card -->
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="card-title">Total Connections</h5>
                                        <h3>{{ $totalConnections }}</h3>
                                    </div>
                                    <div class="icon-circle bg-success">
                                        <i class="bx bx-link-alt text-white" style="font-size: 2.5rem;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Load Card -->
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="card-title">Total Load</h5>
                                        <h3>{{ $totalLoad }}%</h3>
                                    </div>
                                    <div class="icon-circle bg-warning">
                                        <i class="bx bx-pie-chart-alt-2 text-white" style="font-size: 2.5rem;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End of Row -->
            </div>
        </div>
    </div>
</div>
@endsection
