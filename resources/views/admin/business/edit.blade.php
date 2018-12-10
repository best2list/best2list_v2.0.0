@extends('admin.layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">create business</div>

        <div class="card-body">
            <form method="POST" action="{{ route('adminUpdateBusiness', $business->id) }}" aria-label="{{ __('admin update business') }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('put') }}
                <div class="form-group row">
                    <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('form-label.name') }}</label>

                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $business->name }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-4 col-form-label text-md-right">{{ __('form-label.description') }}</label>

                    <div class="col-md-6">
                        <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ $business->description }}" required autofocus>

                        @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="offset-md-4 col-md-2">
                        <img src="{{ url($business->logo) }}" alt="{{ $business->name }}" class="img-fluid">
                    </div>
                </div>
                <div class="form-group row">

                    <label for="logo" class="col-sm-4 col-form-label text-md-right">{{ __('form-label.business_logo') }}</label>

                    <div class="col-md-6">
                        <input id="logo" type="file" class="form-control{{ $errors->has('logo') ? ' is-invalid' : '' }}" name="logo" autofocus>
                        @if ($errors->has('logo'))
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('logo') }}</strong>
                    </span>
                        @endif
                    </div>
                </div>



                <div class="form-group row">
                    <label for="categories" class="col-sm-4 col-form-label text-md-right">{{ __('form-label.categories') }}</label>

                    <div class="col-md-6">
                        <select id="categories"  class="form-control{{ $errors->has('categories') ? ' is-invalid' : '' }}" name="categories[]" multiple>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if($business->hasCategory($category->id)) selected @endif>{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('categories'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('categories') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


                <hr/>

                @foreach($business->branches()->get() as $branch)
                    <div class="form-group row">
                        <label for="branch" class="col-sm-4 col-form-label text-md-right">{{ __('form-label.branch') }}</label>

                        <div class="col-md-6">
                            <input id="branch" type="text" class="form-control{{ $errors->has('branch') ? ' is-invalid' : '' }}" name="branch" value="{{ $branch->branch }}" required autofocus>

                            @if ($errors->has('branch'))
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('branch') }}</strong>
                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="country" class="col-sm-4 col-form-label text-md-right">{{ __('form-label.country') }}</label>

                        <div class="col-md-6">
                            <select id="country"  class="form-control{{ $errors->has('categories') ? ' is-invalid' : '' }}" name="country" >
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}" @if($branch->country_id == $country->id) selected @endif>{{ $country->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('categories'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('categories') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="province" class="col-sm-4 col-form-label text-md-right">{{ __('form-label.province') }}</label>

                        <div class="col-md-6">
                            <select id="province"  class="form-control{{ $errors->has('province') ? ' is-invalid' : '' }}" name="province">
                                @foreach($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('categories'))
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('categories') }}</strong>
                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="city" class="col-sm-4 col-form-label text-md-right">{{ __('form-label.city') }}</label>

                        <div class="col-md-6">
                            <select id="city"  class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city">
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('city'))
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('city') }}</strong>
                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-sm-4 col-form-label text-md-right">{{ __('form-label.address') }}</label>

                        <div class="col-md-6">
                            <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $branch->address }}" required autofocus>

                            @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="zip_code" class="col-sm-4 col-form-label text-md-right">{{ __('form-label.zip_code') }}</label>

                        <div class="col-md-6">
                            <input id="zip_code" type="text" class="form-control{{ $errors->has('zip_code') ? ' is-invalid' : '' }}" name="zip_code" value="{{ $branch->zip_code }}" required autofocus>

                            @if ($errors->has('zip_code'))
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('zip_code') }}</strong>
                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="gmap_canvas" class="col-sm-4 col-form-label text-md-right">{{ __('form-label.location') }}</label>

                        <div class="col-md-6">
                            <iframe class="rounded" style="width: 100% ;" height="200" id="gmap_canvas" src="https://maps.google.com/maps?q=university%20of%20san%20francisco&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        </div>
                    </div>

                    <hr/>


                    <div class="form-group row">
                        @foreach($business->contactNumbers()->get() as $contactNumber)
                            @if($contactNumber->branch_id == $branch->id)
                                <label for="contact_number" class="col-sm-4 col-form-label text-md-right">{{ __('form-label.contact_number') }}</label>
                                <div class="col-md-2">
                                    <input id="contact_number" type="text" class="form-control{{ $errors->has('contact_number') ? ' is-invalid' : '' }}" name="contact_number" value="{{ $contactNumber->number }}" required autofocus>
                                    @if ($errors->has('contact_number'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('contact_number') }}</strong>
                                </span>
                                    @endif
                                </div>
                            @endif
                        @endforeach

                        @foreach($business->websites()->get() as $website)
                            @if($website->branch_id == $branch->id)
                                <label for="website" class="col-md-2 col-form-label text-md-right">{{ __('form-label.website') }}</label>
                                <div class="col-md-2">
                                    <input id="website" type="text" class="form-control{{ $errors->has('website') ? ' is-invalid' : '' }}" name="website" value="{{ $website->website }}" required autofocus>
                                    @if ($errors->has('website'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('website') }}</strong>
                                </span>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="form-group row">
                        @foreach($business->emails()->get() as $email)
                            @if($email->branch_id == $branch->id)
                                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('form-label.email_address') }}</label>
                                <div class="col-md-2">
                                    <input id="email" type="text" class="form-control{{ $errors->has('min') ? ' is-invalid' : '' }}" name="email" value="{{ $email->email }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                    @endif
                                </div>
                            @endif
                        @endforeach

                        @foreach($business->socialNetworks()->get() as $socialNetwork)
                            @if($socialNetwork->branch_id == $branch->id)
                                <label for="social_network" class="col-md-2 col-form-label text-md-right">{{ __('form-label.social_network') }}</label>
                                <div class="col-md-2">
                                    <input id="social_network" type="text" class="form-control{{ $errors->has('social_network') ? ' is-invalid' : '' }}" name="social_network" value="{{ $socialNetwork->url }}" required autofocus>
                                    @if ($errors->has('social_network'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('social_network') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            @endif
                        @endforeach

                    </div>

                @endforeach

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
