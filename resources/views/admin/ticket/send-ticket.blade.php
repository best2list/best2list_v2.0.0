@extends('admin.layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">ticket</div>
        <div class="card-body">
            @foreach($tickets as $ticket)
                <div class="p-0 alert @if($ticket->user_id) alert-primary @else alert-success @endif">
                    @if($ticket->user_id)
                        <div class="bg-primary text-white p-1 pl-3 mb-1 rounded-top">{{ $ticket->hasUsername($ticket->user_id) }} <span>{{ $ticket->message_status }}</span></div>
                    @else
                        <div class="bg-success text-white p-1 pl-3 mb-1 rounded-top">{{ $ticket->hasUsername($ticket->admin_id) }} <span>{{ $ticket->message_status }}</span></div>
                    @endif
                    <div class="p-3 pl-4">{{ $ticket->message }}</div>
                    <span class="@if($ticket->message_status == 'unseen') text-danger @elseif($ticket->message_status == 'seen') text-primary @else text-success @endif">{{ $ticket->status }}</span>
                    <div class="p-3 pl-4">
                        @foreach(App\Ticket::find($ticket->id)->ticketFiles()->get() as $ticketFile)
                            <a href="{{ url($ticketFile->file_path) }}">{{ $ticketFile->id }}-download</a><br>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <div class="card-body">
            <form action="{{ route('changeTicketStatus', $ticketSubject->id) }}" method="post">
                {{ method_field('put') }}
                @csrf
                <input type="submit" class="btn-sm @if($ticketSubject->status == 'open') btn-success @else btn-danger @endif" value="@if($ticketSubject->status == 'open') close subject @else reopen subject @endif">
            </form>
        </div>
        @if($ticketSubject->status == 'open')
            <div class="card-body">
                <form method="POST" action="{{ route('adminStoreTicket',$ticketSubject->id) }}" aria-label="{{ __('storeTicket') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="message" class="col-sm-4 col-form-label text-md-right">{{ __('message') }}</label>

                        <div class="col-md-6">
                            <input id="message" type="text" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" name="message" value="{{ old('message') }}" required autofocus>

                            @if ($errors->has('message'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('message') }}</strong>
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
        @endif
    </div>

@endsection