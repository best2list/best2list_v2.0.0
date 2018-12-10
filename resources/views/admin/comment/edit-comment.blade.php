@extends('admin.layouts.app')
@section('content')
                    <div class="card">
                        <div class="card-header">comments</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('commentUpdate',$comment->id) }}" aria-label="{{ __('addComment') }}">
                                @csrf
                                {{ method_field('put') }}
                                <div class="form-group row">
                                    <label for="comment" class="col-md-2 col-form-label text-md-right">{{ __('comment') }}</label>

                                    <div class="col-md-10">
                                        <textarea id="comment" class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" name="comment" required placeholder="add your comment ...">{{ $comment->comment }}</textarea>
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
                        </div>
                    </div>
@endsection