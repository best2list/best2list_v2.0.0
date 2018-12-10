@extends('admin.layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">ticket subjects</div>
        <div class="card-body">
            <form method="POST" action="{{ route('storeTicketCategory') }}" aria-label="{{ __('storeTicketCategory') }}">
                @csrf

                <div class="form-group row">
                    <label for="ticketCategory" class="col-sm-4 col-form-label text-md-right">{{ __('ticketCategory') }}</label>

                    <div class="col-md-6">
                        <input id="ticketCategory" type="text" class="form-control{{ $errors->has('ticketCategory') ? ' is-invalid' : '' }}" name="ticketCategory" value="{{ old('ticketCategory') }}" required autofocus>

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
            <hr>
            <table class="table table-bordered text-center">
                <tr>
                    <td>id</td>
                    <td>name</td>
                    <td>edit</td>
                    <td>delete</td>
                </tr>
                @foreach($ticketCategories as $ticketCategory)
                    <tr>
                        <td>{{ $ticketCategory->id }}</td>
                        <td>{{ $ticketCategory->name }}</td>
                        <td><a href="{{ route('editTicketCategory', $ticketCategory->id) }}" >edit</a> </td>
                        <td>
                            <form action="{{ route('destroyTicketCategory',$ticketCategory->id) }}" method="post">
                                {{method_field('delete')}}
                                @csrf
                                <input type="submit" value="delete">
                            </form>
                        </td>
                    </tr>
                    {{--{{ dd($ticketSubject->tickets()) }}--}}
                @endforeach
            </table>
        </div>
    </div>
@endsection