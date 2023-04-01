@extends('welcome')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">

                <h4 class="page-title">Add New Category</h4>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/category/save/0">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="category_name" class="form-label">{{ __('Category Name') }}</label>

                                <input id="category_name" type="text" placeholder="name" class="form-control @error('category_name') is-invalid @enderror" name="category_name" value="{{ old('category_name') }}" required autocomplete="category_name" autofocus>

                                @error('category_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="parent" class="form-label">{{ __('Parent') }}</label>
                                <select class="form-control" id="selectcategory" name="selected_parent" required focus>
                                    <option value="" disabled selected>Please select parent</option>
                                    <option value=""> No Parent </option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{ $category->name }}</option>
                                    @if(count($category->subcategory))
                                    @include('categories.subcategory_select',['subcategories' => $category->subcategory, 'id' => 0,'test'=>false, 'dataLevel' => 1 ])
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="description" class="form-label">{{ __('Description') }}</label>

                                <textarea id="description" type="text" placeholder="description" class="form-control @error('description') is-invalid @enderror" name="description" required rows="3">{{ old('description') }}</textarea>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>



                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
