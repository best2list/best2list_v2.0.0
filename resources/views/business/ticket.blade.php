@extends('layouts.two-col.two-col')
@section('sidebar')
    @include('business.my_account_menu')
    @parent
@endsection
@section('content')

    <div class="card">
        <div class="card-header">create subject</div>

        <div class="card-body">
            <form method="POST" action="{{ route('storeTicketSubject') }}" aria-label="{{ __('storeTicketSubject') }}">
                @csrf

                <div class="form-group row">
                    <label for="subject" class="col-sm-4 col-form-label text-md-right">{{ __('subject') }}</label>

                    <div class="col-md-6">
                        <input id="subject" type="text" class="form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}" name="subject" value="{{ old('subject') }}" required autofocus>

                        @if ($errors->has('subject'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('subject') }}</strong>
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

                <div class="form-group row">
                    <label for="ticket_cat_id" class="col-sm-4 col-form-label text-md-right">{{ __('ticket category') }}</label>

                    <div class="col-md-6">
                        <select id="ticket_cat_id"  class="form-control{{ $errors->has('ticket_cat_id') ? ' is-invalid' : '' }}" name="ticket_cat_id">
                            @foreach($ticketCategories as $ticketCategory)
                                <option value="{{ $ticketCategory->id }}">{{ $ticketCategory->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('ticket_cat_id'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ticket_cat_id') }}</strong>
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
    <div class="card">
        <div class="card-header">ticket subjects</div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <tr>
                    <td>id</td>
                    <td>subject</td>
                    <td>status</td>
                    <td>category</td>
                    <td>created at</td>
                    <td>updated at</td>
                    <td>last update</td>
                </tr>
                @foreach($ticketSubjects as $ticketSubject)
                    <tr>
                        <td>{{ $ticketSubject->id }}</td>
                        <td><a class="text-primary" href="{{ route('ticketSubject', $ticketSubject->id) }}">{{ $ticketSubject->subject }}
                                <span class="badge badge-secondary">{{ $ticketSubject->tickets()->count() }}</span>
                                @if($ticketSubject->tickets()->where('message_status', 'unseen')->whereNotNull('admin_id')->count() > 0)<span class="badge badge-danger">new  {{ $ticketSubject->tickets()->where('message_status', 'unseen')->count() }} </span>@endif
                            </a></td>
                        <td class="@if($ticketSubject->status == 'open') text-danger @else text-success @endif">{{ $ticketSubject->status }}
                            <form action="{{ route('changeTicketStatus', $ticketSubject->id) }}" method="post">
                                {{ method_field('put') }}
                                @csrf
                                <input type="submit" class="btn-sm @if($ticketSubject->status == 'open') btn-success @else btn-danger @endif" value="@if($ticketSubject->status == 'open') close @else reopen @endif">
                            </form>
                        </td>
                        <td >{{ $ticketSubject->hasCategory($ticketSubject->ticket_cat_id) }}</td>
                        <td >{{ $ticketSubject->created_at }}</td>
                        <td >{{ $ticketSubject->tickets()->latest()->value('created_at') }}</td>
                        <td >{{ $ticketSubject->tickets()->latest()->value('created_at')->diffForHumans() }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection