@extends('admin.layouts.app')
@section('content')

                    <div class="card">
                        <div class="card-header">{{ $province->name }} cities</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('storeCity', $province->id) }}" aria-label="{{ __('storeCity') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="city" class="col-sm-4 col-form-label text-md-right">{{ __('city') }}</label>

                                    <div class="col-md-6">
                                        <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" required autofocus>

                                        @if ($errors->has('city'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
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

                        <table class="table table-bordered table-responsive-md">
                            <tr class="table-active">
                                <td>city ID</td>
                                <td>city name</td>
                                <td>edit</td>
                                <td>delete</td>
                            </tr>
                            @foreach($province->cities()->get() as $city)
                                <tr>
                                    <td>{{ $city->id }}</td>
                                    <td>{{ $city->name }}</td>
                                    <td><a class="btn btn-warning" href="{{ route("editCity",$city->id) }}"><i class="fas fa-edit"></i></a> </td>
                                    <td><form action="{{ route('countryDestroy', $city->id) }}" method="post">
                                            {{ method_field('delete') }}
                                            @csrf
                                            <button type="submit" class="btn-sm btn-danger text-dark"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>


                    <br/>

@endsection
