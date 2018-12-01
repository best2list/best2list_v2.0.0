@extends('admin.layouts.app')
@section('content')

                    <div class="card">
                        <div class="card-header">create country</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('storeCountry') }}" aria-label="{{ __('storeCountry') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="country" class="col-sm-4 col-form-label text-md-right">{{ __('country') }}</label>

                                    <div class="col-md-6">
                                        <input id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}" required autofocus>

                                        @if ($errors->has('country'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="flag" class="col-sm-4 col-form-label text-md-right">{{ __('flag') }}</label>

                                    <div class="col-md-6">
                                        <input id="flag" type="file" class="form-control{{ $errors->has('flag') ? ' is-invalid' : '' }}" name="flag" value="{{ old('flag') }}" required autofocus>

                                        @if ($errors->has('flag'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('flag') }}</strong>
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
                                <td>country ID</td>
                                <td>country name</td>
                                <td>flag</td>
                                <td>edit</td>
                                <td>delete</td>
                            </tr>
                            @foreach($countries as $country)
                                <tr>
                                    <td>{{ $country->id }}</td>
                                    <td>{{ $country->country }}</td>
                                    <td><img class="col-md-3" src="/{{ $country->flag }}" alt="{{$country->country}}"></td>
                                    <td><a class="btn btn-warning" href="{{ route("editCountry",$country->id) }}">edit</a> </td>
                                    <td><form action="{{ route('countryDestroy', $country->id) }}" method="post">
                                            {{ method_field('delete') }}
                                            @csrf
                                            <input type="submit" value="delete" class="btn btn-danger">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>


                    <br/>

@endsection
