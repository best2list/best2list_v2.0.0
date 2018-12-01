@extends('admin.layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">create category</div>

        <div class="card-body">
            <form method="POST" action="{{ route('updateMenu', $menu->id) }}" aria-label="{{ __('updateMenu') }}">
                {{ method_field('put') }}
                @csrf
                <div class="form-group row">
                    <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('title') }}</label>

                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $menu->title }}" required autofocus>

                        @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="text" class="col-sm-4 col-form-label text-md-right">{{ __('text') }}</label>

                    <div class="col-md-6">
                        <input id="text" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="text" value="{{ $menu->text }}" autofocus>

                        @if ($errors->has('text'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('text') }}</strong>
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

@endsection