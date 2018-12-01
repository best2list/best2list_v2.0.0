@extends('layouts.two-col.two-col')
@section('sidebar')
    @include('business.my_account_menu')
    @parent
@endsection
@section('content')

                <div class="card">
                    <div class="card-header">All businesses</div>


                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr class="table-active">
                                <td>business ID</td>
                                <td>my business title</td>
                                <td>status</td>
                                <td>edit</td>
                                <td>delete</td>
                            </tr>

                    @foreach($businesses as $business)
                            <tr @if($business->type=='active') class="alert alert-success" @endif>
                                <td>{{ $business->id }}</td>
                                <td><a href="{{ route('show', $business->id) }}"> {{ $business->title }}</a></td>
                                <td>{{ $business->type }} |
                                    <form action="{{ route('businessStatus', $business->id) }}/mybusiness/{{ $business->id }}/status" method="post">
                                        {{ method_field('put') }}
                                        {{csrf_field()}}
                                        <input type="submit" value="change">
                                    </form>
                                </td>
                                <td><a href="{{ route('edit', $business->id) }}" >edit</a> </td>
                                <td>
                                    <form action="{{ route('destroy',$business->id) }}" method="post">
                                        {{method_field('delete')}}
                                        @csrf
                                        <input type="submit" value="delete">
                                    </form>
                                </td>

                            </tr>
                    @endforeach
                        </table>
                    </div>
                </div>
@endsection
