@extends('admin.layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">upload images</div>

        <div class="card-body">
            <form method="POST" action="{{ route("storeSocialNetwork") }}" aria-label="{{ __('social_network') }}">
                @csrf
                <div class="form-group row">
                    <label for="icon" class="col-sm-4 col-form-label text-md-right">{{ __('icon *') }}</label>



                    <div class="col-md-6">
                        <input id="slideImage" type="text" class="form-control{{ $errors->has('icon') ? ' is-invalid' : '' }}" name="icon" autofocus required>
                        @if ($errors->has('icon'))
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('icon') }}</strong>
                                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="color" class="col-sm-4 col-form-label text-md-right">{{ __('color ') }}</label>

                    <div class="col-md-6">
                        <input style="display: inline; height: 45px" id="color" type="color" class="form-control{{ $errors->has('color') ? ' is-invalid' : '' }}" name="color" value="{{ old('color') }}" autofocus>

                        @if ($errors->has('altTag'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('color') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="address" class="col-sm-4 col-form-label text-md-right">{{ __('address (URL)') }}</label>

                    <div class="col-md-6">
                        <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" autofocus>

                        @if ($errors->has('address'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
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
<br>
    <table class="table table-bordered" >
        <tr class="table-active">
            <td>icon</td>
            <td>address (URL)</td>
            <td>edit</td>
            <td>delete</td>
        </tr>
    @foreach($socialNetworks as $socialNetwork)
            <tr class="text-center">
                <td ><a  href="{{ $socialNetwork->address }}" style="color: {{ $socialNetwork->color }}; font-size: 35px ">

                        {!! $socialNetwork->icon !!}
                    </a></td>
                <td>{{ $socialNetwork->address }}</td>
                <td><a href="{{ route('editSocialNetwork', $socialNetwork->id) }}">edit</a></td>
                <td> <form method="post" action="{{ route("deleteSocialNetwork",$socialNetwork->id) }}" aria-label="{{ __('deleteSocialNetwork') }}">
                        {{method_field('delete')}}
                        @csrf
                        <input type="submit" value="delete" class="btn btn-danger"/>
                    </form></td>
            </tr>


    @endforeach
    </table>

@endsection
