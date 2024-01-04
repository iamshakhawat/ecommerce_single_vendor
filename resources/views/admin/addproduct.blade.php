@extends('admin.layouts.main')
@section('title', 'Add Product')
@section('content')
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add Product</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('storeproduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Product Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="product_name" value="{{ old('product_name') }}" class="form-control"
                                    placeholder="Ex: Iphone 14 Pro Max" />
                                @error('product_name')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Short Description</label>
                            <div class="col-sm-10">
                                <input type="text" name="short_description" value="{{ old('short_description') }}" class="form-control"
                                    placeholder="Shortly describe about your product" />
                                @error('short_description')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Long Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="long_description"rows="3" placeholder="Brifly Describe about your product">{{ old('long_description') }}</textarea>
                                @error('long_description')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Price <small>(tk)</small></label>
                            <div class="col-sm-10">
                                <input type="number" placeholder="Price" value="{{ old('price') }}" name="price" class="form-control">
                                @error('price')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Quantity</label>
                            <div class="col-sm-10">
                                <input type="number" placeholder="Quantity" value="{{ old('quantity') }}" name="quantity" class="form-control">
                                @error('quantity')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Select Category</label>
                            <div class="col-sm-10">
                                <select class="form-select" required name="category_id" id="category">
                                    <option value=""  selected>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option  value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Select SubCategory</label>
                            <div class="col-sm-10">
                                <select class="form-select" required name="subcategory_id" id="subcategory">
                                    <option value="">Select SubCategory</option>
                                </select>
                                @error('subcategory_id')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Photo</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="formFile" name="photo" />
                                @error('photo')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </div>
                        </div>
                </div>

                </form>
            </div>
        </div>
    </div>

@endsection
