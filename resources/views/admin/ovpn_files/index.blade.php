@extends('admin.layouts.main')

@section('content')

    <div class="page-wrapper">
        <div class="page-content-wrapper">
            <div class="page-content">
                <!-- Breadcrumb -->
                <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                    <div class="breadcrumb-title pr-3">OVPN Files</div>
                    <div class="ml-auto">
                        <a href="{{ route('admin.ovpn-files.create') }}" class="btn btn-primary">Add New OVPN File</a>
                    </div>
                </div>
                <!-- End Breadcrumb -->

                <div class="card">
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>File Name</th>
                                        <th>Server</th>
                                        <th>Usage Count</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ovpnFiles as $ovpnFile)
                                    <tr>
                                        <td>{{ $ovpnFile->id }}</td>
                                        <td>{{ $ovpnFile->file_name }}</td>
                                        <td>{{ $ovpnFile->server->name }}</td>
                                        <td>{{ $ovpnFile->usage_count }}</td>
                                        <td>
                                            <a href="{{ route('admin.ovpn-files.edit', $ovpnFile->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('admin.ovpn-files.destroy', $ovpnFile->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this OVPN file?');">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @if($ovpnFiles->isEmpty())
                                    <tr>
                                        <td colspan="5" class="text-center">No OVPN files found.</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
