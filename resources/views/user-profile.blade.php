@extends('layouts.user_panel')
@section('content')
    <h2>Profile</h2>
    <div class="row">
        <div class="col-md-7">
            @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <form action="{{ route('udpateprofile') }}" method="POST" class="border p-3">
                @csrf
                <label for="">Name:</label>
                <input type="text" placeholder="Full Name" name="name" value="{{ Auth::user()->name }}"
                    class="form-control mb-2">
                <label for="">Email:</label>
                <input type="email" placeholder="Email Address" name="email" value="{{ Auth::user()->email }}"
                    class="form-control mb-2">
                <button class="btn btn-primary" type="submit">Save</button>
            </form>
        </div>
    </div>
@endsection
