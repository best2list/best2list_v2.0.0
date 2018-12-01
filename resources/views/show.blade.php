@extends('layouts.two-col.two-col')
@section('sidebar')
    @parent
@endsection
@section('content')

    <div class="media border-bottom mt-1">
        <div class="media-body">
            <div class="bg-danger p-3 rounded-top shadow-sm">
                {{ $business->title}}
                <img class="align-self-start float-right mr-3 col-md-2 col-sm-3" src="/{{ $business->image_path }}" alt="logo"/>
            </div>
            <div class="bg-white  p-3 mt-2">
                <i class="fas fa-clipboard"></i> <strong>Sammery</strong> : {{ $business->summary }}
            </div>
            <div class="bg-white rounded-0  p-3">
                <i class="fas fa-bullhorn"></i> <strong>description</strong> : {{ $business->description }}
            </div>
            @foreach($businessImages as $businessImage)
                <img class="col-md-3" src="{{$businessImage->image_path}}" alt="business image">
                <hr/>
            @endforeach
            <div class="bg-white  p-3">
                <div class="p-2 m-0">
                    <span class=""><i class="fas fa-envelope"></i> <strong>email</strong> : <span class="rounded bg-light p-1">{{ $business->email }}</span></span>
                    <span class="ml-3"><i class="fas fa-envelope"></i> <strong>zip code</strong> : <span class="rounded bg-light p-1">{{ $business->zip_code }}</span></span>
                </div>
                <div class="p-2 m-0">
                    <span class=""><i class="fas fa-phone"></i> <strong>phone</strong> : <span class="rounded bg-light p-1">{{ $business->phone }}</span></span>
                    <span class="ml-3"><i class="fas fa-fax"></i> <strong>fax</strong> : <span class="rounded bg-light p-1">{{ $business->fax }}</span></span>
                </div>
                <div class="p-2 m-0">
                    <span class=""><i class="fas fa-laptop"></i> <strong>website</strong> : <span class="rounded bg-light p-1">{{ $business->website }}</span></span>
                    <span class="ml-3"><i class="fas fa-map-marker-alt"></i> <strong>address</strong> : <span class="rounded bg-light p-1">{{ $business->address }}</span></span>
                </div>
                <span class="p-2 m-0"><i class="fas fa-map-marker-alt"></i> <strong>country, city</strong> : <span class="rounded bg-light p-1"> {{ $business->hasCountry($business->country)->country }} , {{ $business->city }}</span></span>
            </div>
            <div class="mt-3 mb-3 rounded">
                <iframe class="rounded" style="width: 100% ;" height="350" id="gmap_canvas" src="https://maps.google.com/maps?q=university%20of%20san%20francisco&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div>
            <hr/>
            @foreach($business->comments as $comment)
                @if($comment->status == "active")
                    <strong>{{ $comment->hasUsername($comment->user_id) }} : </strong>{{ $comment->comment }}<hr/>
                @endif
            @endforeach

            @auth
                <form method="POST" action="{{ route('addComment',$business->id) }}" aria-label="{{ __('addComment') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-10">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::user()->username }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="comment" class="col-md-2 col-form-label text-md-right">{{ __('comment') }}</label>

                        <div class="col-md-10">
                            <textarea id="comment" class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" name="comment" required placeholder="add your comment ..."></textarea>
                            @if ($errors->has('comment'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-2">
                            <button type="submit" class="btn btn-success">
                                {{ __('submit') }}
                            </button>
                        </div>
                    </div>
                </form>
            @endauth


        </div>
    </div>

@endsection
