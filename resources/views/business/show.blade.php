@extends('layouts.two-col.two-col')
@section('sidebar')
    @include('business.my_account_menu')
    @parent
@endsection
@section('content')

                <div class="card">
                   

                    <div class="card-body">
                        <div>{{ $business->summary }} </div>
                        {{ $business->description }} <hr/>
                        {{ $business->email }} <hr/>
                        {{ $business->zip_code }} <hr/>
                        {{ $business->phone }} <hr/>
                        {{ $business->fax }} <hr/>
                        {{ $business->website }} <hr/>
                        {{ $business->address }} <hr/>
                        {{ $business->city }} <hr/>
                        {{ $business->location }} <hr/>
                        {{ $business->type }} <hr/>
                        {{ $business->status }} <hr/>
                        {{ $business->hasCountry($business->country)->country }} <hr/>
                        <ul>
                            @foreach($business->categories as $category)
                                <li>{{ $category->title }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

@endsection
