@extends('admin.layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">create FAQ</div>

        <div class="card-body">
            <form method="POST" action="{{ route("storeFAQ") }}" aria-label="{{ __('storeFAQ') }}">
                @csrf
                <div class="form-group row">
                    <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('question') }}</label>

                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control{{ $errors->has('question') ? ' is-invalid' : '' }}" name="question" value="{{ old('question') }}" required autofocus>

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
                        <input id="parent_id" type="text" class="form-control{{ $errors->has('answer') ? ' is-invalid' : '' }}" name="answer" value="{{ old('answer') }}" autofocus>

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

            <div class="card-body">
                <table class="table table-bordered">
                    <tr class="table-active">
                        <td>FAQ ID</td>
                        <td>question</td>
                        <td>answer</td>
                        <td>edit</td>
                        <td>delete</td>
                    </tr>
                    @foreach($faqs as $faq)
                        <tr>
                            <td>{{ $faq->id }}</td>
                            <td>{{ $faq->question }}</td>
                            <td>{{ $faq->answer }}</td>
                            <td><a href="{{ route('editFAQ', $faq->id) }}">edit</a></td>
                            <td><form action="{{ route("destroyFAQ",$faq->id) }}" method="post">
                                    {{ method_field('delete') }}
                                    @csrf
                                    <input type="submit" value="delete" class="btn btn-danger">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>


@endsection
