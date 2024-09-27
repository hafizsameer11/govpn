<!DOCTYPE html>
<html lang="en">
    @include('admin.layouts.head')
<body>
    @include('admin.layouts.sidebar')
    @include('admin.layouts.header')


    <div class="main">
        @yield('content')
    </div>

    @include('admin.layouts.footer')
    @include('admin.layouts.script')
    {{-- @yield('additional-script')     --}}

</body>
</html>
