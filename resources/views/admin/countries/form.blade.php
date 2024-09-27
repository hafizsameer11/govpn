@extends('admin.layouts.main')

@section('content')

    <body class="bg-theme bg-theme1">
        <div class="wrapper">
            <div class="page-wrapper">
                <div class="page-content-wrapper">
                    <div class="page-content">
                        <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                            <div class="breadcrumb-title pr-3">{{ isset($country) ? 'Edit Country' : 'Add New Country' }}
                            </div>
                            <div class="pl-3">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0 p-0">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                                    class='bx bx-home-alt'></i></a></li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            {{ isset($country) ? 'Edit Country' : 'Add New Country' }}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form
                                    action="{{ isset($country) ? route('admin.countries.update', $country->id) : route('admin.countries.store') }}"
                                    method="POST">
                                    @csrf
                                    @if (isset($country))
                                        @method('PUT')
                                    @endif

                                    <div class="form-group">
                                        <label for="countryName">Country Name</label>
                                        <input type="text" class="form-control" id="countryName" name="name"
                                            placeholder="Enter country name"
                                            value="{{ isset($country) ? $country->name : '' }}" required>
                                    </div>

                                    <button type="submit"
                                        class="btn btn-primary">{{ isset($country) ? 'Update Country' : 'Add Country' }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overlay toggle-btn-mobile"></div>
            <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        </div>
    </body>
@endsection