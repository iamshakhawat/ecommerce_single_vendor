@extends('admin.layouts.main')
@section('title', 'Edit Profile')
@section('content')
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">

                        <h4 class="mb-0">Edit Profile</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('updateprofile') }}" method="POST">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <td>Name:</td>
                                <td><input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}"></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}"></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center">
                                    <button class="btn btn-primary">Update</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>

    @endsection
