@extends('admin.layouts.main')
@section('title', 'All Category')
@section('content')
    <div class="card">
        <div class="mx-3 d-flex justify-content-between align-items-center">

        <h5 class="card-header">All Category</h5>
        <a href="{{ route('addcategory') }}" class="btn btn-sm btn-primary">Add New</a>
        </div>
        <div class="table-responsive text-nowrap">

            {{-- @if (session()->has('msg'))
                <div class="alert @if(session()->get('icon') == 'error') alert-danger @else alert-success @endif" role="alert">
                  <h4 class="alert-heading">{{ session()->get('msg') }}</h4>
                </div>
            @endif --}}

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Slug</th>
                        <th>SubCategory</th>
                        <th>Products</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->total_subcategory }}</td>
                            <td>{{ $category->total_product }}</td>
                            <td>
                                <a href="{{ route('editcategory',['id' => $category->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                <button onclick="deleteCategory({{ $category->id }})" class="btn btn-sm btn-danger" >Delete</button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $categories->appends($_GET)->links('pagination::bootstrap-4') }}
        </div>
    </div>


@endsection
