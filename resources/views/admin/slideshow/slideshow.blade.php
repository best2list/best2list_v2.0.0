@extends('admin.layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">upload images</div>

        <div class="card-body">
            <form method="POST" action="{{ route('storeSlide') }}" aria-label="{{ __('storeSlide') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="slideImage" class="col-sm-4 col-form-label text-md-right">{{ __('slide show Image *') }}</label>

                    <div class="col-md-6">
                        <input id="slideImage" type="file" class="form-control{{ $errors->has('slideImage') ? ' is-invalid' : '' }}" name="slideImage" autofocus required>
                        @if ($errors->has('slideImage'))
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('slideImage') }}</strong>
                                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="altTag" class="col-sm-4 col-form-label text-md-right">{{ __('alt tag ') }}</label>

                    <div class="col-md-6">
                        <input id="altTag" type="text" class="form-control{{ $errors->has('altTag') ? ' is-invalid' : '' }}" name="altTag" value="{{ old('altTag') }}" autofocus>

                        @if ($errors->has('altTag'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('altTag') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('title') }}</label>

                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" autofocus>

                        @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('insert') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <hr/>
    @foreach($slideImages as $slideImage)
        <img class="col-md-4" src="{{$slideImage->image_path}}" alt="business image">
        <form method="post" action="{{ route('destroySlide', $slideImage->id) }}" aria-label="{{ __('slideImageDestroy') }}">
            {{method_field('delete')}}
            @csrf
            <br/>
            <input type="submit" value="delete" class="btn btn-danger"/>
        </form>
        <hr/>
    @endforeach


@endsection