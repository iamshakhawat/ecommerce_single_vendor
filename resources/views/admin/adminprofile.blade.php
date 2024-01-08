@extends('admin.layouts.main')
@section('title', 'Profile')
@section('content')
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Profile</h5>
                        <a href="{{ route('editadminprofile') }}" class="btn btn-primary btn-sm"><i class="bx bx-edit-alt"></i></a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <td>Name:</td>
                            <td>{{ Auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td>{{ Auth::user()->email }}</td>
                        </tr>
                        <tr>
                            <td>Role:</td>
                            <td>Admin</td>
                        </tr>
                        <tr>
                            <td>Join:</td>
                            <td>{{ Auth::user()->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Last Login:</td>
                            <td>{{ Auth::user()->updated_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    @endsection
