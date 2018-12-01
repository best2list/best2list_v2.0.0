@extends('admin.layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">ticket subjects</div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <tr>
                    <td>id</td>
                    <td>subject</td>
                    <td>last message status</td>
                    <td>status</td>
                    <td>category</td>
                    <td>created at</td>
                    <td>updated at</td>
                    <td>last update</td>
                </tr>
                @foreach($ticketSubjects as $ticketSubject)
                    <tr>
                        <td>{{ $ticketSubject->id }}</td>
                        <td><a class="text-primary" href="{{ route('adminTicketSubject', $ticketSubject->id) }}">{{ $ticketSubject->subject }}
                                <span class="badge badge-secondary">{{ $ticketSubject->tickets()->count() }}</span>
                                @if($ticketSubject->tickets()->where('message_status', 'unseen')->whereNotNull('user_id')->count() > 0)<span class="badge badge-danger">new  {{ $ticketSubject->tickets()->where('message_status', 'unseen')->count() }} </span>@endif
                            </a>
                        </td>
                        <td> @if($ticketSubject->tickets()->latest()->value('user_id')!= null) <span class="text-danger">must reply </span>@else <span class="text-success">replied </span> @endif</td>
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
                    {{--{{ dd($ticketSubject->tickets()) }}--}}
                @endforeach
            </table>
        </div>
    </div>
@endsection