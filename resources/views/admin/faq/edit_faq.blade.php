@extends('admin.layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">create FAQ</div>

        <div class="card-body">
            <form method="POST" action="{{ route('updateFAQ', $faq->id) }}" aria-label="{{ __('updateFAQ') }}">
                @csrf
                {{ method_field('put') }}

                <div class="form-group row">
                    <label for="question" class="col-sm-4 col-form-label text-md-right">{{ __('question') }}</label>

                    <div class="col-md-6">
                        <input id="question" type="text" class="form-control{{ $errors->has('question') ? ' is-invalid' : '' }}" name="question" value="{{ $faq->question }}" required autofocus>

                        @if ($errors->has('question'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('question') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="parent_id" class="col-sm-4 col-form-label text-md-right">{{ __('answer') }}</label>

                    <div class="col-md-6">
                        <input id="answer" type="text" class="form-control{{ $errors->has('answer') ? ' is-invalid' : '' }}" name="answer" value="{{ $faq->answer }}" autofocus>

                        @if ($errors->has('answer'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('answer') }}</strong>
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

    <br/>

            </div>


@endsection
