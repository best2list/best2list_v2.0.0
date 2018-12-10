@extends('admin.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">create business</div>
    <div class="card-body">
      <form method="POST" action="{{ route('updateCategory', $category->id) }}" aria-label="{{ __('update_category') }}">
          @csrf
          {{ method_field('put') }}
            <div class="form-group row">
                <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('title') }}</label>

                <div class="col-md-6">
                    <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" autofocus value="{{ $category->title }}">
                    <!-- @if ($errors->has('image_path'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('image_path') }}</strong>
                    </span>
                    @endif -->
                </div>
            </div>


            <div class="form-group row">
                <label for="parent_id" class="col-sm-4 col-form-label text-md-right">{{ __('parent_id') }}</label>

                <div class="col-md-6">
                    <select id="parent_id" type="text" class="form-control{{ $errors->has('parent_id') ? ' is-invalid' : '' }}" name="parent_id" autofocus>
                        <option value="">root</option>
                        @foreach($selectCategories as $selectCategory)
                            <option value="{{ $selectCategory->id }}" @if($selectCategory->id == $category->parent_id) selected @endif>{{ $selectCategory->title }}</option>
                            @foreach($selectCategory->children as $selectCategoryChild)
                                <option value="{{ $selectCategoryChild->id }}" @if($selectCategoryChild->id == $category->parent_id) selected @endif>{{ $selectCategoryChild->title }}</option>
                            @endforeach
                        @endforeach
                    </select>
                <!-- @if ($errors->has('image_path'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('image_path') }}</strong>
                    </span>
                    @endif -->
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
