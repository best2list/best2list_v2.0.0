<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.head-tag')
<body>
    <div id="app" class="pt-4">
        @yield('app')
    </div>
</body>
</html>
