@extends('admin.layouts.app')
@section('content')

                <div class="card">
                    <div class="card-header">create business</div>

                    <div class="card-body">
                      <form method="POST" action="{{ route('updateCountry', $country->id) }}" aria-label="{{ __('update_country') }}" enctype="multipart/form-data">

                          @csrf
                          {{ method_field('put') }}

                            <div class="form-group row">
                                <label for="country" class="col-sm-4 col-form-label text-md-right">{{ __('country') }}</label>

                                <div class="col-md-6">
                                    <input id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" autofocus value="{{ $country->country }}">
                                    <!-- @if ($errors->has('country'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image_path') }}</strong>
                                    </span>
                                    @endif -->
                                </div>
                            </div>


                            <div class="form-group row">
                                  <label for="flag" class="col-sm-4 col-form-label text-md-right">{{ __('flag') }}</label>

                                  <div class="col-md-6">
                                      <input id="flag" type="file" class="form-control{{ $errors->has('flag') ? ' is-invalid' : '' }}" name="flag" autofocus required>
                                      @if ($errors->has('flag'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('flag') }}</strong>
                                          </span>
                                      @endif
                              </div>

                                    {{--<!-- @if ($errors->has('image_path'))--}}
                                        {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('image_path') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif -->--}}
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
