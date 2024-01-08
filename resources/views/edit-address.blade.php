@extends('layouts.user_panel')
@section('content')
    <style>
        .form-control:focus{
            border: 1px solid #cccccc !important;
        }
    </style>
    <h2>Edit Address</h2>
    <form action="{{ route('updateaddress') }}" method="POST">
        @csrf
        <input type="hidden" value="{{ $address->id }}" name="id">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" value="{{ $address->name }}" class="form-control" placeholder="Full Name"
                aria-describedby="helpId">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Phone</label>
            <input type="number" name="phone" value="{{ $address->phone }}" class="form-control" placeholder="Enter your phone number"
                aria-describedby="helpId">
            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="">District</label>
            <select name="district" class="form-control">
                <option value="">Select District</option>
                <option @if($address->district == 'Dhaka') selected @endif value="Dhaka">Dhaka</option>
                <option @if($address->district == 'Faridpur') selected @endif value="Faridpur">Faridpur</option>
                <option @if($address->district == 'Gazipur') selected @endif value="Gazipur">Gazipur</option>
                <option @if($address->district == 'Gopalganj') selected @endif value="Gopalganj">Gopalganj</option>
                <option @if($address->district == 'Jamalpur') selected @endif value="Jamalpur">Jamalpur</option>
                <option @if($address->district == 'Kishoreganj') selected @endif value="Kishoreganj">Kishoreganj</option>
                <option @if($address->district == 'Madaripur') selected @endif value="Madaripur">Madaripur</option>
                <option @if($address->district == 'Manikganj') selected @endif value="Manikganj">Manikganj</option>
                <option @if($address->district == 'Munshiganj') selected @endif value="Munshiganj">Munshiganj</option>
                <option @if($address->district == 'Mymensingh') selected @endif value="Mymensingh">Mymensingh</option>
                <option @if($address->district == 'Narayanganj') selected @endif value="Narayanganj">Narayanganj</option>
                <option @if($address->district == 'Narsingdi') selected @endif value="Narsingdi">Narsingdi</option>
                <option @if($address->district == 'Netrokona') selected @endif value="Netrokona">Netrokona</option>
                <option @if($address->district == 'Rajbari') selected @endif value="Rajbari">Rajbari</option>
                <option @if($address->district == 'Shariatpur') selected @endif value="Shariatpur">Shariatpur</option>
                <option @if($address->district == 'Sherpur') selected @endif value="Sherpur">Sherpur</option>
                <option @if($address->district == 'Tangail') selected @endif value="Tangail">Tangail</option>
                <option @if($address->district == 'Bogra') selected @endif value="Bogra">Bogra</option>
                <option @if($address->district == 'Joypurhat') selected @endif value="Joypurhat">Joypurhat</option>
                <option @if($address->district == 'Naogaon') selected @endif value="Naogaon">Naogaon</option>
                <option @if($address->district == 'Natore') selected @endif value="Natore">Natore</option>
                <option @if($address->district == 'Nawabganj') selected @endif value="Nawabganj">Nawabganj</option>
                <option @if($address->district == 'Pabna') selected @endif value="Pabna">Pabna</option>
                <option @if($address->district == 'Rajshahi') selected @endif value="Rajshahi">Rajshahi</option>
                <option @if($address->district == 'Sirajgon') selected @endif value="Sirajgon">Sirajgon</option>
                <option @if($address->district == 'Dinajpu') selected @endif value="Dinajpu">Dinajpu</option>
                <option @if($address->district == 'Gaibandha') selected @endif value="Gaibandha">Gaibandha</option>
                <option @if($address->district == 'Kurigra') selected @endif value="Kurigra">Kurigra</option>
                <option @if($address->district == 'Lalmonirhat') selected @endif value="Lalmonirhat">Lalmonirhat</option>
                <option @if($address->district == 'Nilphamari') selected @endif value="Nilphamari">Nilphamari</option>
                <option @if($address->district == 'Panchagarh') selected @endif value="Panchagarh">Panchagarh</option>
                <option @if($address->district == 'Rangpur') selected @endif value="Rangpur">Rangpur</option>
                <option @if($address->district == 'Thakurgaon') selected @endif value="Thakurgaon">Thakurgaon</option>
                <option @if($address->district == 'Barguna') selected @endif value="Barguna">Barguna</option>
                <option @if($address->district == 'Barisal') selected @endif value="Barisal">Barisal</option>
                <option @if($address->district == 'Bhola') selected @endif value="Bhola">Bhola</option>
                <option @if($address->district == 'Jhalokati') selected @endif value="Jhalokati">Jhalokati</option>
                <option @if($address->district == 'Patuakhali') selected @endif value="Patuakhali">Patuakhali</option>
                <option @if($address->district == 'Pirojpur') selected @endif value="Pirojpur">Pirojpur</option>
                <option @if($address->district == 'Bandarban') selected @endif value="Bandarban">Bandarban</option>
                <option @if($address->district == 'Brahmanbaria') selected @endif value="Brahmanbaria">Brahmanbaria</option>
                <option @if($address->district == 'Chandpu') selected @endif value="Chandpu">Chandpu</option>
                <option @if($address->district == 'Chittagong') selected @endif value="Chittagong">Chittagong</option>
                <option @if($address->district == 'Comilla') selected @endif value="Comilla">Comilla</option>
                <option @if($address->district == 'CoxBazzar') selected @endif value="CoxBazzar">CoxBazzar</option>
                <option @if($address->district == 'Feni') selected @endif value="Feni">Feni</option>
                <option @if($address->district == 'Khagrachari') selected @endif value="Khagrachari">Khagrachari</option>
                <option @if($address->district == 'Lakshmipur') selected @endif value="Lakshmipur">Lakshmipur</option>
                <option @if($address->district == 'Noakhal') selected @endif value="Noakhal">Noakhal</option>
                <option @if($address->district == 'Rangamati') selected @endif value="Rangamati">Rangamati</option>
                <option @if($address->district == 'Habigan') selected @endif value="Habigan">Habigan</option>
                <option @if($address->district == 'Maulvibazar') selected @endif value="Maulvibazar">Maulvibazar</option>
                <option @if($address->district == 'Sunamganj') selected @endif value="Sunamganj">Sunamganj</option>
                <option @if($address->district == 'Sylhet') selected @endif value="Sylhet">Sylhet</option>
                <option @if($address->district == 'Bagerha') selected @endif value="Bagerha">Bagerha</option>
                <option @if($address->district == 'Chuadanga') selected @endif value="Chuadanga">Chuadanga</option>
                <option @if($address->district == 'Jessore') selected @endif value="Jessore">Jessore</option>
                <option @if($address->district == 'Jhenaidah') selected @endif value="Jhenaidah">Jhenaidah</option>
                <option @if($address->district == 'Khulna') selected @endif value="Khulna">Khulna</option>
                <option @if($address->district == 'Kushtia') selected @endif value="Kushtia">Kushtia</option>
                <option @if($address->district == 'Magura') selected @endif value="Magura">Magura</option>
                <option @if($address->district == 'Meherpu') selected @endif value="Meherpu">Meherpu</option>
                <option @if($address->district == 'Narail') selected @endif value="Narail">Narail</option>
                <option @if($address->district == 'Satkhir') selected @endif value="Satkhir">Satkhir</option>
            </select>
            @error('district')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">City</label>
            <input type="text" name="city" value="{{ $address->city }}" class="form-control" placeholder="City Name"
                aria-describedby="helpId">
            @error('city')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Area</label>
            <input type="text" name="area" value="{{ $address->area }}" class="form-control" placeholder="Enter your name of area"
                aria-describedby="helpId">
            @error('area')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Full Address</label>
            <textarea name="address" class="form-control" rows="2" placeholder="Full Address">{{ $address->address }}</textarea>
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button class="btn btn-success" type="submit">Update</button>
    </form>
@endsection
