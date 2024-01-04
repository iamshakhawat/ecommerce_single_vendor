@extends('admin.layouts.main')
@section('title', 'All Sub Category')
@section('content')
    <div class="card">
        <div class="d-flex justify-content-between mx-4 align-items-center">
            <h5 class="card-header">All Sub Category</h5>
            <a href="{{ route('addsubcategory') }}" class="btn btn-sm btn-primary">Add New</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>SubCategory Name</th>
                        <th>Slug</th>
                        <th>Main Category</th>
                        <th>Products</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($subcategories as $subcategory)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $subcategory->subcategory_name }}</td>
                            <td>{{ $subcategory->slug }}</td>
                            <td>{{ $subcategory->category_name }}</td>
                            <td>{{ $subcategory->total_product }}</td>
                            <td>
                                <a href="{{ route('editsubcategory',['id' => $subcategory->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                <button onclick="deletesubcategory({{ $subcategory->id }})" class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
