@extends('admin.layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">ticket category</div>
        <div class="card-body">
            <form method="POST" action="{{ route('updateTicketCategory', $ticketCategory->id) }}" aria-label="{{ __('storeTicketCategory') }}">
                @csrf

                <div class="form-group row">
                    <label for="ticketCategory" class="col-sm-4 col-form-label text-md-right">{{ __('ticketCategory') }}</label>

                    <div class="col-md-6">
                        <input id="ticketCategory" type="text" class="form-control{{ $errors->has('ticketCategory') ? ' is-invalid' : '' }}" name="ticketCategory" value="{{ $ticketCategory->name }}" required autofocus>

                        @if ($errors->has('ticketCategory'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ticketCategory') }}</strong>
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