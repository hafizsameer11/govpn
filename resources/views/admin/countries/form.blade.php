@extends('admin.layouts.main')

@section('content')

<div class="page-wrapper">
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                <div class="breadcrumb-title pr-3">{{ isset($country) ? 'Edit Country' : 'Add New Country' }}</div>
                <div class="pl-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class='bx bx-home-alt'></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ isset($country) ? 'Edit Country' : 'Add New Country' }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form
                        action="{{ isset($country) ? route('admin.countries.update', $country->id) : route('admin.countries.store') }}"
                        method="POST"
                        enctype="multipart/form-data"> <!-- Add enctype for file uploads -->
                        @csrf
                        @if (isset($country))
                            @method('PUT')
                        @endif

                        <!-- Country Name Input -->
                        <div class="form-group">
                            <label for="countryName">Country Name</label>
                            <input type="text" class="form-control" id="countryName" name="name"
                                placeholder="Enter country name"
                                value="{{ isset($country) ? $country->name : '' }}" required>
                        </div>

                        <!-- Flag Image Upload Input -->
                        <div class="form-group">
                            <label for="flag">Country Flag (optional)</label>
                            <input type="file" class="form-control" id="flag" name="flag" accept="image/*">
                            @if (isset($country) && $country->flag)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $country->flag) }}" alt="Country Flag" style="width: 100px;">
                                    <p>Current Flag</p>
                                </div>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">
                            {{ isset($country) ? 'Update Country' : 'Add Country' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
