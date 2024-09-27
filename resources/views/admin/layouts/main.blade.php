<!DOCTYPE html>
<html lang="en">
    @include('admin.layouts.head')
<body class="bg-theme bg-theme1">


    <div class="wrapper">
        @include('admin.layouts.sidebar')
        @include('admin.layouts.header')
        @yield('content')
        <div class="overlay toggle-btn-mobile"></div>
        @include('admin.layouts.footer')
    </div>
    {{-- <div class="overlay toggle-btn-mobile"></div> --}}
    @include('admin.layouts.script')
    {{-- @yield('additional-script')     --}}

</body>
</html>
