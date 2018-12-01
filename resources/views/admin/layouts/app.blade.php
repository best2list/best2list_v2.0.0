<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('admin.layouts.head-tag')
<body>
<div id="app">
    @include('admin.layouts.navbar')

    <main class="py-0">

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-2 pt-2 bg-dark">
                    @include('admin.layouts.sidebar')
                </div>
                <div class="col-md-10 pt-2">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>
