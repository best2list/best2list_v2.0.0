<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.head-tag')
<body>
    <div id="app" class="pt-4">
        @include('layouts.navbar')

        <main class="py-0">

            <div class="container py-4 mt-3">
                <div class="row justify-content-center">

                    <div class="col-md-8">

                        @yield('content')

                    </div>
                </div>
            </div>

        </main>

    </div>
</body>
</html>
