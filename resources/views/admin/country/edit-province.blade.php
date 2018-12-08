@extends('admin.layouts.app')
@section('content')

                <div class="card">
                    <div class="card-header">create business</div>

                    <div class="card-body">
                      <form method="POST" action="{{ route('updateProvince', $province->id) }}" aria-label="{{ __('update_province') }}">

                          @csrf
                          {{ method_field('put') }}

                            <div class="form-group row">
                                <label for="province" class="col-sm-4 col-form-label text-md-right">{{ __('province') }}</label>

                                <div class="col-md-6">
                                    <input id="v" type="text" class="form-control{{ $errors->has('province') ? ' is-invalid' : '' }}" name="province" autofocus value="{{ $province->name }}">
                                    <!-- @if ($errors->has('province'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('province') }}</strong>
                                    </span>
                                    @endif -->
                                </div>
                            </div>

                          <div class="form-group row">
                              <label for="country" class="col-sm-4 col-form-label text-md-right">{{ __('form-label.country') }}</label>

                              <div class="col-md-6">
                                  <select id="country"  class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" >
                                      @foreach($countries as $country)
                                          <option value="{{ $country->id }}" @if($province->country_id == $country->id) selected @endif>{{ $country->name }}</option>
                                      @endforeach
                                  </select>
                                  @if ($errors->has('country'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('country') }}</strong>
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
