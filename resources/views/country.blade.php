@extends('layouts.two-col.two-col')
@section('sidebar')
    @parent
@endsection
@section('content')
    @foreach($branches as $branch)
        <div class="media border-bottom mt-1">
            <img class="align-self-start mr-3 col-2 " src="@if($branch->hasBusiness($branch->business_id)->logo){{ url($branch->hasBusiness($branch->business_id)->logo) }} @else /image/download.png @endif" alt="Generic placeholder image">
            <div class="media-body">
                <h4 class="mt-0 pt-1" style="font-size: 16px;"><a class="card-link text-primary" href="">{{ $branch->hasBusiness($branch->business_id)->name }}</a></h4>
                @auth()
                    <form method="post" action="{{ route('addToFavorite', $branch->hasBusiness($branch->business_id)->id) }}">
                        {{ method_field('put') }}

                        @csrf
                        @if($branch->hasBusiness($branch->business_id)->countFavorite($branch->hasBusiness($branch->business_id)->id)==0)
                            <input type="submit" value="add to favorite" class="btn-sm btn-warning float-right">
                        @else
                            <input type="submit" value="remove favorite" class="btn-sm btn-danger float-right">
                        @endif
                    </form>
                @endauth
                {{--<div class="text-muted mt-3" style="font-size: 13px;"><i class="fas fa-map-marker-alt"></i> {{ $business->hasCountry($business->country)->country }} , {{ $business->city }}</div>--}}
                {{--<div class="mb-0 text-muted" style="font-size: 13px;"><i class="fas fa-phone"></i> {{ $business->phone }} - <i class="fas fa-fax"></i> {{ $business->fax }} </div>--}}
                {{--<p class="mb-0 text-muted" style="font-size: 12px;"><i class="fas fa-clipboard"></i> {{ str_limit($business->summary,150) }} </p>--}}
            </div>
        </div>
    @endforeach
    <div class="media justify-content-center mt-3">
        {{ $branches->links() }}
    </div>
@endsection
