    <form method="POST" action="{{ route('store') }}" aria-label="{{ __('store') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="multi_line" value="{{ old('number') }}">

        <div class="form-group row">
            <label for="label" class="col-sm-4 col-form-label text-md-right">{{ __('label') }}</label>

            <div class="col-md-6">
                <input id="label" type="text" class="form-control{{ $errors->has('label') ? ' is-invalid' : '' }}" name="label" value="{{ old('label') }}" required autofocus>

                @if ($errors->has('label'))
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('label') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="mandatory" class="col-sm-4 col-form-label text-md-right">{{ __('mandatory') }}</label>
            <div class="col-md-6" id="mandatory">
                <div class="form-check">
                    <input class="form-check-input form-check{{ $errors->has('mandatory') ? ' is-invalid' : '' }}" type="radio" name="mandatory" id="mandatory-not-null" value="null" checked autofocus>
                    <label class="form-check-label" for="mandatory-not-null">null</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input form-check{{ $errors->has('mandatory') ? ' is-invalid' : '' }}" type="radio" name="mandatory" id="mandatory-null" value="not-null" autofocus>
                    <label class="form-check-label" for="mandatory-null">not null</label>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="duplicate-1" class="col-sm-4 col-form-label text-md-right">{{ __('duplicate') }}</label>
            <div class="col-md-6" id="duplicate-1">
                <div class="form-check">
                    <input class="form-check-input form-check{{ $errors->has('duplicate') ? ' is-invalid' : '' }}" type="radio" name="duplicate" id="duplicate" value="duplicate" checked autofocus>
                    <label class="form-check-label" for="duplicate">duplicate</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input form-check{{ $errors->has('duplicate') ? ' is-invalid' : '' }}" type="radio" name="duplicate" id="unique" value="unique" autofocus>
                    <label class="form-check-label" for="unique">unique</label>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="visibility" class="col-sm-4 col-form-label text-md-right">{{ __('visibility') }}</label>
            <div class="col-md-6" id="visibility">
                <div class="form-check">
                    <input class="form-check-input form-check{{ $errors->has('enable') ? ' is-invalid' : '' }}" type="radio" name="visibility" id="enable" value="enable" checked autofocus>
                    <label class="form-check-label" for="enable">enable</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input form-check{{ $errors->has('disable') ? ' is-invalid' : '' }}" type="radio" name="visibility" id="disable" value="disable" autofocus>
                    <label class="form-check-label" for="disable">disable</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input form-check{{ $errors->has('hidden') ? ' is-invalid' : '' }}" type="radio" name="visibility" id="hidden" value="hidden" autofocus>
                    <label class="form-check-label" for="hidden">hidden</label>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="security" class="col-sm-4 col-form-label text-md-right">{{ __('security') }}</label>
            <div class="col-md-6" id="security">
                <div class="form-check">
                    <input class="form-check-input form-check{{ $errors->has('encrypt') ? ' is-invalid' : '' }}" type="checkbox" name="encrypt" id="encrypt" value="encrypt" autofocus>
                    <label class="form-check-label" for="enable">encrypt</label>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="initial" class="col-sm-4 col-form-label text-md-right">{{ __('initial') }}</label>

            <div class="col-md-6">
                <input id="initial" type="text" class="form-control{{ $errors->has('label') ? ' is-invalid' : '' }}" name="label" value="{{ old('label') }}" required autofocus>
                @if ($errors->has('label'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('label') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="format" class="col-sm-4 col-form-label text-md-right">{{ __('format') }}</label>

            <div class="col-md-6">
                <select id="format" class="form-control{{ $errors->has('format') ? ' is-invalid' : '' }}" name="format" autofocus>
                    <option value="character" selected>character</option>
                    <option value="word">word</option>
                </select>
                @if ($errors->has('format'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('format') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="min" class="col-sm-4 col-form-label text-md-right">{{ __('min') }}</label>

            <div class="col-md-2">
                <input id="min" type="text" class="form-control{{ $errors->has('min') ? ' is-invalid' : '' }}" name="min" value="{{ old('min') }}" required autofocus>
                @if ($errors->has('min'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('min') }}</strong>
                    </span>
                @endif
            </div>

            <label for="max" class="col-md-2 col-form-label text-md-right">{{ __('max') }}</label>
            <div class="col-md-2">
                <input id="max" type="text" class="form-control{{ $errors->has('max') ? ' is-invalid' : '' }}" name="max" value="{{ old('max') }}" required autofocus>

                @if ($errors->has('max'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('max') }}</strong>
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
