@extends('admin.layouts.main')
@section('title', 'All product')
@section('content')
    <div class="card">
        <div class="mx-3 d-flex justify-content-between align-items-center">

        <h5 class="card-header">All product</h5>
        <a href="{{ route('addproduct') }}" class="btn btn-sm btn-primary">Add New</a>
        </div>
        <div class="table-responsive text-nowrap">


            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>Action</th>


                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td><img src="{{ asset('upload/products/') }}/{{ $product->photo }}" height="50" alt=""></td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->category_name }}</td>
                            <td>{{ $product->subcategory_name }}</td>
                            <td>
                                <a href="" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('editproduct',['id' => $product->id]) }}" class="btn btn-sm btn-primary">Edit</a>

                                <button onclick="deleteproduct({{ $product->id }})" class="btn btn-sm btn-danger" >Delete</button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $products->appends($_GET)->links('pagination::bootstrap-4') }}
        </div>
    </div>


@endsection
