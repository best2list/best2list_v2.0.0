@extends('admin.layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">upload images</div>

        <div class="card-body">
            <form method="POST" action="{{ route("updateSocialNetwork",$socialnetwork->id) }}" aria-label="{{ __('updateSocialNetwork') }}">
                @csrf
                {{ method_field('put') }}

                <div class="form-group row">
                    <label for="icon" class="col-sm-4 col-form-label text-md-right">{{ __('icon *') }}</label>



                    <div class="col-md-6">
                        <input id="slideImage" type="text" class="form-control{{ $errors->has('icon') ? ' is-invalid' : '' }}" name="icon" autofocus required value="{{ __($socialnetwork->icon) }}">
                        @if ($errors->has('icon'))
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('icon') }}</strong>
                                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="color" class="col-sm-4 col-form-label text-md-right">{{ __('color ') }}</label>

                    <div class="col-md-6">
                        <input style="display: inline; height: 45px" id="color" type="color" class="form-control{{ $errors->has('color') ? ' is-invalid' : '' }}" name="color" value="{{ __($socialnetwork->color) }}" autofocus>

                        @if ($errors->has('altTag'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('color') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="address" class="col-sm-4 col-form-label text-md-right">{{ __('address (URL)') }}</label>

                    <div class="col-md-6">
                        <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ __($socialnetwork->address) }}" autofocus>

                        @if ($errors->has('address'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
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
<br>


@endsection
