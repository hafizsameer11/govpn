@extends('admin.layouts.main')

@section('content')
<div class="wrapper">
    <div class="page-wrapper">
        <div class="page-content-wrapper">
            <div class="page-content">
                <!-- Breadcrumb -->
                <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                    <div class="breadcrumb-title pr-3">{{ isset($ovpnFile) ? 'Edit OVPN File' : 'Add New OVPN File' }}</div>
                    <div class="ml-auto">
                        <a href="{{ route('admin.ovpn-files.index') }}" class="btn btn-primary">Back to List</a>
                    </div>
                </div>
                <!-- End Breadcrumb -->

                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ isset($ovpnFile) ? route('admin.ovpn-files.update', $ovpnFile->id) : route('admin.ovpn-files.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($ovpnFile))
                                @method('PUT')
                            @endif

                            <!-- Server Selection -->
                            <div class="form-group">
                                <label for="serverId">Server</label>
                                <select class="form-control" id="serverId" name="server_id" required>
                                    <option value="" disabled selected>Select Server</option>
                                    @foreach($servers as $server)
                                        <option value="{{ $server->id }}" {{ isset($ovpnFile) && $ovpnFile->server_id == $server->id ? 'selected' : '' }}>{{ $server->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- OVPN File Upload -->
                            <div class="form-group">
                                <label for="ovpnFile">OVPN File</label>
                                <input type="file" class="form-control" id="ovpnFile" name="ovpn_file" {{ isset($ovpnFile) ? '' : 'required' }}>
                                @if(isset($ovpnFile))
                                    <small>Leave blank if you don't want to change the file.</small>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">{{ isset($ovpnFile) ? 'Update OVPN File' : 'Add OVPN File' }}</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
