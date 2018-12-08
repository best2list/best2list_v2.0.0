@extends('admin.layouts.app')
@section('content')

                    <div class="card">
                        <div class="card-header">{{ $country->name }} provinces</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('storeProvince', $country->id) }}" aria-label="{{ __('storeProvince') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="province" class="col-sm-4 col-form-label text-md-right">{{ __('province') }}</label>

                                    <div class="col-md-6">
                                        <input id="province" type="text" class="form-control{{ $errors->has('province') ? ' is-invalid' : '' }}" name="province" value="{{ old('province') }}" required autofocus>

                                        @if ($errors->has('province'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('province') }}</strong>
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
                                <td>province ID</td>
                                <td>province name</td>
                                <td>cities</td>
                                <td>edit</td>
                                <td>delete</td>
                            </tr>
                            @foreach($country->provinces()->get() as $province)
                                <tr>
                                    <td>{{ $province->id }}</td>
                                    <td>{{ $province->name }}</td>
                                    <td><a href="{{ route('city', $province->id) }}">{{ $province->name }} cites <span class="badge badge-dark">{{ $province->cities()->count() }}</span></a></td>
                                    <td><a class="btn btn-warning" href="{{ route("editProvince",$province->id) }}"><i class="fas fa-edit"></i></a> </td>
                                    <td><form action="{{ route('countryDestroy', $country->id) }}" method="post">
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
