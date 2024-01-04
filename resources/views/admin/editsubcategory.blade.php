@extends('admin.layouts.main')
@section('title', 'Edit Sub Category')
@section('content')
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Sub Category</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('updatesubcategory') }}" method="POST">
                        @csrf
                        <input type="hidden" name="old_category_id" value="{{ $subcategory->category_id }}">
                        <input type="hidden" name="id" value="{{ $subcategory->id }}">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">SubCategory Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="subcategory_name" value="{{ $subcategory->subcategory_name }}" class="form-control"
                                    placeholder="Ex: Smartphone" />
                                @error('subcategory_name')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Select Category</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="category">
                                    <option selected value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option @if($subcategory->category_id == $category->id) selected @endif value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row justify-content-end ">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Add SubCategory</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
