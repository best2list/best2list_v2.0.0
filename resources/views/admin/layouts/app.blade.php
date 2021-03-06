<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('admin.layouts.head-tag')
<body>
<div id="app">
    @include('admin.layouts.navbar')

    <main class="py-0">

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-md-2 pt-2 bg-dark">
                    @include('admin.layouts.side-bar')
                </div>
                <div class="col pt-2">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>
