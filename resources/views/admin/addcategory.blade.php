@extends('admin.layouts.main')
@section('title','Add Category')
@section('content')
<div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Add Category</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('storecategory') }}" method="POST">
            @csrf
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Category Name</label>
              <div class="col-sm-10">
                <input type="text" name="category_name"   class="form-control" placeholder="Ex: Smartphone" value="{{ old('category_name') }}"/>
                @error('category_name')
                    <span class=" text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Add Category</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
@endsection
