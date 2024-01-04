@extends('admin.layouts.main')
@section('title', 'Edit Product')
@section('content')
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Product</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('updateproduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="old_category" value="{{ $product->category_name }}">
                        <input type="hidden" name="old_subcategory" value="{{ $product->subcategory_name }}">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Product Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="product_name" value="{{ $product->product_name }}"
                                    class="form-control" placeholder="Ex: Iphone 14 Pro Max" />
                                @error('product_name')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Short Description</label>
                            <div class="col-sm-10">
                                <input type="text" name="short_description" value="{{ $product->short_description }}"
                                    class="form-control" placeholder="Shortly describe about your product" />
                                @error('short_description')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Long Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="long_description"rows="3" placeholder="Brifly Describe about your product">{{ $product->long_description }}</textarea>
                                @error('long_description')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Price <small>(tk)</small></label>
                            <div class="col-sm-10">
                                <input type="number" placeholder="Price" value="{{ $product->price }}" name="price"
                                    class="form-control">
                                @error('price')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Quantity</label>
                            <div class="col-sm-10">
                                <input type="number" placeholder="Quantity" value="{{ $product->quantity }}"
                                    name="quantity" class="form-control">
                                @error('quantity')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Select Category</label>
                            <div class="col-sm-10">
                                <select class="form-select" required name="category_id" id="category">
                                    <option value="" selected>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option @if ($product->category_name == $category->category_name) selected @endif
                                            value="{{ $category->id }}">{{ $category->category_name }}</option>
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
                                    @foreach ($subcategories as $subcategory)
                                        <option @if($product->subcategory_name == $subcategory->subcategory_name) selected @endif value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                                    @endforeach
                                </select>
                                @error('subcategory_id')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Photo</label>
                            <div class="col-sm-7">
                                <input class="form-control" type="file" id="formFile" name="photo" />
                                @error('photo')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <img class="col-md-3" src="{{ asset('upload/products/') }}/{{ $product->photo }}"
                                alt="">
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Edit Product</button>
                            </div>
                        </div>
                </div>

                </form>
            </div>
        </div>
    </div>

    {{-- @push('js')
        <script>
            $(document).ready(function() {
                let id = $("#category").val();
                if (id != "") {
                    $.ajax({
                        type: "POST",
                        url: "/admin/select-subcategory",
                        data: {
                            category_id: id
                        },
                        success: function(response) {
                            $("#subcategory").html(response);
                        }
                    });
                }
            });
        </script>
    @endpush --}}


@endsection
