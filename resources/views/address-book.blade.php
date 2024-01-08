@extends('layouts.user_panel')
@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h2>Address Book</h2>
    @if (count($address) > 0)
        <a href="{{ route('editaddress',$address[0]->id) }}" style="text-decoration: underline !important">Edit</a>
    @endif
</div>

    @if (count($address) > 0)
        <table class="table table-bordered">
            <tr>
                <td style="width:100px">Name:</td>
                <td>{{ $address[0]->name }}</td>
            </tr>
            <tr>
                <td style="width:100px">Phone:</td>
                <td>{{ $address[0]->phone }}</td>
            </tr>
            <tr>
                <td style="width:100px">District:</td>
                <td>{{ $address[0]->district }}</td>
            </tr>
            <tr>
                <td style="width:100px">City:</td>
                <td>{{ $address[0]->city }}</td>
            </tr>
            <tr>
                <td style="width:100px">Area:</td>
                <td>{{ $address[0]->area }}</td>
            </tr>
            <tr>
                <td style="width:150px">Detail Address:</td>
                <td>{{ $address[0]->address }}</td>
            </tr>
        </table>
    @else
        <h3 class="text-muted">No Address Found</h3>
        @if($alert == 1)
        <a href="{{ route('addaddress') }}?next={{ route('checkout') }}" style="text-decoration: underline !important">Click Here</a> to add Address
        @else
            <a href="{{ route('addaddress') }}" style="text-decoration: underline !important">Click Here</a> to add Address
        @endisset
    @endif


@endsection
