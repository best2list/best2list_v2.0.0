@extends('layouts.two-col.two-col')
@section('sidebar')
    @include('business.my_account_menu')
    @parent
@endsection
@section('content')

                <div class="card">
                    <div class="card-header">create business</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('store') }}" aria-label="{{ __('store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="summary" class="col-sm-4 col-form-label text-md-right">{{ __('summary') }}</label>

                                <div class="col-md-6">
                                    <input id="summary" type="text" class="form-control{{ $errors->has('summary') ? ' is-invalid' : '' }}" name="summary" value="{{ old('summary') }}" required autofocus>

                                    @if ($errors->has('summary'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('summary') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="description" class="col-sm-4 col-form-label text-md-right">{{ __('description') }}</label>

                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required autofocus>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="zip_code" class="col-sm-4 col-form-label text-md-right">{{ __('zip code') }}</label>

                                <div class="col-md-6">
                                    <input id="zip_code" type="text" class="form-control{{ $errors->has('zip_code') ? ' is-invalid' : '' }}" name="zip_code" value="{{ old('zip_code') }}" required autofocus>

                                    @if ($errors->has('zip_code'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('zip_code') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="phone" class="col-sm-4 col-form-label text-md-right">{{ __('phone') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus>

                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fax" class="col-sm-4 col-form-label text-md-right">{{ __('fax') }}</label>

                                <div class="col-md-6">
                                    <input id="fax" type="text" class="form-control{{ $errors->has('fax') ? ' is-invalid' : '' }}" name="fax" value="{{ old('fax') }}" required autofocus>

                                    @if ($errors->has('fax'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fax') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="website" class="col-sm-4 col-form-label text-md-right">{{ __('website') }}</label>

                                <div class="col-md-6">
                                    <input id="website" type="text" class="form-control{{ $errors->has('website') ? ' is-invalid' : '' }}" name="website" value="{{ old('website') }}" required autofocus>

                                    @if ($errors->has('website'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-sm-4 col-form-label text-md-right">{{ __('address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>

                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

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

                            <div class="form-group row">
                                <label for="location" class="col-sm-4 col-form-label text-md-right">{{ __('location') }}</label>

                                <div class="col-md-6">
                                    <input id="location" type="text" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" value="{{ old('location') }}" required autofocus>

                                    @if ($errors->has('location'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type" class="col-sm-4 col-form-label text-md-right">{{ __('type') }}</label>
                                <div class="col-md-6">
                                     <select id="type"  class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type">
                                        <option value="passive">passive</option>
                                        <option value="active">active</option>
                                     </select>
                                    @if ($errors->has('type'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country" class="col-sm-4 col-form-label text-md-right">{{ __('country') }}</label>

                                <div class="col-md-6">
                                    <select id="country"  class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country">
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->country }}</option>
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
                                <label for="parent_id" class="col-sm-4 col-form-label text-md-right">{{ __('parent') }}</label>

                                <div class="col-md-6">
                                    <select id="parent_id"  class="form-control{{ $errors->has('parent_id') ? ' is-invalid' : '' }}" name="parent_id">
                                        <option value="">root</option>
                                        @foreach($businesses as $business)
                                            <option value="{{ $business->id }}">{{ $business->title }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('parent_id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('parent_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image_path" class="col-sm-4 col-form-label text-md-right">{{ __('business image') }}</label>

                                <div class="col-md-6">
                                    <input id="image_path" type="file" class="form-control{{ $errors->has('image_path') ? ' is-invalid' : '' }}" name="image_path" autofocus>
                                    @if ($errors->has('image_path'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image_path') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="categories" class="col-sm-4 col-form-label text-md-right">{{ __('categories') }}</label>

                                <div class="col-md-6">
                                    <select id="categories"  class="form-control{{ $errors->has('categories') ? ' is-invalid' : '' }}" name="categories[]" multiple>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('categories'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('categories') }}</strong>
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
