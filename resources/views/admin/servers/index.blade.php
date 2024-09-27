@extends('admin.layouts.main')

@section('content')

<body class="bg-theme bg-theme1">
    <div class="wrapper">
        <div class="page-wrapper">
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                        <div class="breadcrumb-title pr-3">Servers</div>
                        <div class="pl-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class='bx bx-home-alt'></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Servers List</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="ml-auto">
                            <div class="btn-group">
                                <!-- Redirect to Add New Server Form -->
                                <a href="{{ route('admin.servers.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Add New Server
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Server Name</th>
                                            <th>IP Address</th>
                                            <th>Country</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($servers as $index => $server)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $server->name }}</td>
                                            <td>{{ $server->ip_address }}</td>
                                            <td>{{ $server->country->name }}</td>
                                            <td>
                                                <!-- Redirect to Edit Server Form -->
                                                <a href="{{ route('admin.servers.edit', $server->id) }}" class="btn btn-primary">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <!-- Delete Server Button -->
                                                <a href="javascript:void(0)" class="btn btn-danger deleteBtn" data-id="{{ $server->id }}">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="overlay toggle-btn-mobile"></div>
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script>
$(document).ready(function() {
    // Delete button handler
    $('.deleteBtn').on('click', function() {
        let serverId = $(this).data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '{{ route("admin.servers.destroy", ":id") }}'.replace(':id', serverId),
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire('Deleted!', 'Server has been deleted.', 'success').then(() => {
                                location.reload(); // Reload page on success
                            });
                        } else {
                            Swal.fire('Error', response.message, 'error');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("An error occurred:", xhr.responseText);
                        Swal.fire('Error', 'An error occurred. Check console for details.', 'error');
                    }
                });
            }
        });
    });
});
</script>

@endsection
