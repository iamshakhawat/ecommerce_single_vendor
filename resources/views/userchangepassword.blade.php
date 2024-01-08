@extends('layouts.user_panel')
@section('content')
    <h2>Change Password</h2>
    <div class="row">
        <div class="col-md-8 ">
            <form action="{{ route('userupdatepassword') }}" method="POST" class="border p-3">
                <h4>Change Password</h4>
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <input type="password" placeholder="Old Password" name="old_password" class="form-control mb-2">
                <input type="password" placeholder="New Password" name="new_password" class="form-control mb-2">
                <input type="password" placeholder="Confirm Password" name="confirm_password" class="form-control mb-2">
                <button class="btn btn-primary form-control" type="submit">Save</button>
            </form>
        </div>
    </div>
@endsection
