@extends('admin.layouts.main')
@section('title', 'Change Password')
@section('content')
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Change Password</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('updateadminpassword') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Old Password</label>
                            <input type="password" name="old_password" class="form-control" placeholder="Old Password">
                            @error('old_password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="">New Password</label>
                            <input type="password" name="new_password" class="form-control" placeholder="New Passowrd">
                            @error('new_password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
                            @error('confirm_password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button class="btn btn-primary" type="submit">Change Password</button>
                    </form>
                </div>
            </div>
        </div>

    @endsection
