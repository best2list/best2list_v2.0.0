@extends('layouts.app')
@section('app')
        @include('layouts.navbar')
        <main class="py-0">

            @if(Request::is('/'))
                @include('layouts.slideshow')
            @endif

            <div class="container py-4 mt-3">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        @section('sidebar')
                            @include('layouts.category-sidebar')
                            @include('layouts.country-sidebar')

                        @show

                    </div>
                    <div class="col-md-8">

                        @yield('content')

                    </div>
                </div>
            </div>

        </main>

        @include('layouts.footer')
@endsection