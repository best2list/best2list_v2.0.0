@extends('admin.layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">create form</div>

        <div class="card-body">
            <form method="POST" action="{{ route('storeForm') }}" aria-label="{{ __('storeForm') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-4 col-form-label text-md-right">{{ __('description') }}</label>

                    <div class="col-md-6">
                        <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" autofocus>

                        @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
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

    <div class="card">
        <div class="card-header">ticket subjects</div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <tr>
                    <td>id</td>
                    <td>name</td>
                    <td>description</td>
                </tr>
                @foreach($forms as $form)
                    <tr>
                        <td>{{ $form->id }}</td>
                        <td><a class="text-primary" href="{{ route('createFormItem', $form->id) }}">{{ $form->name }}</a></td>
                        <td >{{ $form->description }}</td>
                    </tr>

                @endforeach
            </table>
        </div>
    </div>
@endsection