@extends('admin.layouts.app')
@section('content')

                <div class="card">
                    <div class="card-header">create business</div>

                    <div class="card-body">
                      <form method="POST" action="{{ route('updateCity', $city->id) }}" aria-label="{{ __('update_city') }}">
                          @csrf
                          {{ method_field('put') }}

                            <div class="form-group row">
                                <label for="city" class="col-sm-4 col-form-label text-md-right">{{ __('city') }}</label>

                                <div class="col-md-6">
                                    <input id="country" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" autofocus value="{{ $city->name }}">
                                    @if ($errors->has('city'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                          <div class="form-group row">
                              <label for="country" class="col-sm-4 col-form-label text-md-right">{{ __('form-label.country') }}</label>

                              <div class="col-md-6">
                                  <select id="country"  class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" >
                                      @foreach($countries as $country)
                                          <option value="{{ $country->id }}" @if($city->country_id == $country->id) selected @endif>{{ $country->name }}</option>
                                      @endforeach
                                  </select>
                                  @if ($errors->has('country'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('country') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="province" class="col-sm-4 col-form-label text-md-right">{{ __('form-label.country') }}</label>

                              <div class="col-md-6">
                                  <select id="province"  class="form-control{{ $errors->has('province') ? ' is-invalid' : '' }}" name="province" >
                                      @foreach($provinces as $province)
                                          <option value="{{ $province->id }}" @if($city->province_id == $province->id) selected @endif>{{ $province->name }}</option>
                                      @endforeach
                                  </select>
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


@endsection
