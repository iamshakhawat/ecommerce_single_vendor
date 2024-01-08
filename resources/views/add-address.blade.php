@extends('layouts.user_panel')
@section('content')
    <style>
        .form-control:focus{
            border: 1px solid #cccccc !important;
        }
    </style>
    <h2>Add Address</h2>

    <form action="{{ route('storeaddress') }}@if (request()->next)?next={{ request()->next }}@endif" method="POST">
        @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Full Name"
                aria-describedby="helpId">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Phone</label>
            <input type="number" name="phone" value="{{ old('phone') }}"  class="form-control" placeholder="Enter your phone number"
                aria-describedby="helpId">
            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="">District</label>
            <select name="district"  class="form-control">
                <option value="">Select District</option>
                <option @if(old('district') == "Dhaka") selected @endif value="Dhaka">Dhaka</option>
                <option @if(old('district') == "Faridpur") selected @endif value="Faridpur">Faridpur</option>
                <option @if(old('district') == "Gazipur") selected @endif value="Gazipur">Gazipur</option>
                <option @if(old('district') == "Gopalganj") selected @endif value="Gopalganj">Gopalganj</option>
                <option @if(old('district') == "Jamalpur") selected @endif value="Jamalpur">Jamalpur</option>
                <option @if(old('district') == "Kishoreganj") selected @endif value="Kishoreganj">Kishoreganj</option>
                <option @if(old('district') == "Madaripur") selected @endif value="Madaripur">Madaripur</option>
                <option @if(old('district') == "Manikganj") selected @endif value="Manikganj">Manikganj</option>
                <option @if(old('district') == "Munshiganj") selected @endif value="Munshiganj">Munshiganj</option>
                <option @if(old('district') == "Mymensingh") selected @endif value="Mymensingh">Mymensingh</option>
                <option @if(old('district') == "Narayanganj") selected @endif value="Narayanganj">Narayanganj</option>
                <option @if(old('district') == "Narsingdi") selected @endif value="Narsingdi">Narsingdi</option>
                <option @if(old('district') == "Netrokona") selected @endif value="Netrokona">Netrokona</option>
                <option @if(old('district') == "Rajbari") selected @endif value="Rajbari">Rajbari</option>
                <option @if(old('district') == "Shariatpur") selected @endif value="Shariatpur">Shariatpur</option>
                <option @if(old('district') == "Sherpur") selected @endif value="Sherpur">Sherpur</option>
                <option @if(old('district') == "Tangail") selected @endif value="Tangail">Tangail</option>
                <option @if(old('district') == "Bogra") selected @endif value="Bogra">Bogra</option>
                <option @if(old('district') == "Joypurhat") selected @endif value="Joypurhat">Joypurhat</option>
                <option @if(old('district') == "Naogaon") selected @endif value="Naogaon">Naogaon</option>
                <option @if(old('district') == "Natore") selected @endif value="Natore">Natore</option>
                <option @if(old('district') == "Nawabganj") selected @endif value="Nawabganj">Nawabganj</option>
                <option @if(old('district') == "Pabna") selected @endif value="Pabna">Pabna</option>
                <option @if(old('district') == "Rajshahi") selected @endif value="Rajshahi">Rajshahi</option>
                <option @if(old('district') == "Sirajgon") selected @endif value="Sirajgon">Sirajgon</option>
                <option @if(old('district') == "Dinajpu") selected @endif value="Dinajpu">Dinajpu</option>
                <option @if(old('district') == "Gaibandha") selected @endif value="Gaibandha">Gaibandha</option>
                <option @if(old('district') == "Kurigra") selected @endif value="Kurigra">Kurigra</option>
                <option @if(old('district') == "Lalmonirhat") selected @endif value="Lalmonirhat">Lalmonirhat</option>
                <option @if(old('district') == "Nilphamari") selected @endif value="Nilphamari">Nilphamari</option>
                <option @if(old('district') == "Panchagarh") selected @endif value="Panchagarh">Panchagarh</option>
                <option @if(old('district') == "Rangpur") selected @endif value="Rangpur">Rangpur</option>
                <option @if(old('district') == "Thakurgaon") selected @endif value="Thakurgaon">Thakurgaon</option>
                <option @if(old('district') == "Barguna") selected @endif value="Barguna">Barguna</option>
                <option @if(old('district') == "Barisal") selected @endif value="Barisal">Barisal</option>
                <option @if(old('district') == "Bhola") selected @endif value="Bhola">Bhola</option>
                <option @if(old('district') == "Jhalokati") selected @endif value="Jhalokati">Jhalokati</option>
                <option @if(old('district') == "Patuakhali") selected @endif value="Patuakhali">Patuakhali</option>
                <option @if(old('district') == "Pirojpur") selected @endif value="Pirojpur">Pirojpur</option>
                <option @if(old('district') == "Bandarban") selected @endif value="Bandarban">Bandarban</option>
                <option @if(old('district') == "Brahmanbaria") selected @endif value="Brahmanbaria">Brahmanbaria</option>
                <option @if(old('district') == "Chandpu") selected @endif value="Chandpu">Chandpu</option>
                <option @if(old('district') == "Chittagong") selected @endif value="Chittagong">Chittagong</option>
                <option @if(old('district') == "Comilla") selected @endif value="Comilla">Comilla</option>
                <option @if(old('district') == "CoxBazzar") selected @endif value="CoxBazzar">CoxBazzar</option>
                <option @if(old('district') == "Feni") selected @endif value="Feni">Feni</option>
                <option @if(old('district') == "Khagrachari") selected @endif value="Khagrachari">Khagrachari</option>
                <option @if(old('district') == "Lakshmipur") selected @endif value="Lakshmipur">Lakshmipur</option>
                <option @if(old('district') == "Noakhal") selected @endif value="Noakhal">Noakhal</option>
                <option @if(old('district') == "Rangamati") selected @endif value="Rangamati">Rangamati</option>
                <option @if(old('district') == "Habigan") selected @endif value="Habigan">Habigan</option>
                <option @if(old('district') == "Maulvibazar") selected @endif value="Maulvibazar">Maulvibazar</option>
                <option @if(old('district') == "Sunamganj") selected @endif value="Sunamganj">Sunamganj</option>
                <option @if(old('district') == "Sylhet") selected @endif value="Sylhet">Sylhet</option>
                <option @if(old('district') == "Bagerha") selected @endif value="Bagerha">Bagerha</option>
                <option @if(old('district') == "Chuadanga") selected @endif value="Chuadanga">Chuadanga</option>
                <option @if(old('district') == "Jessore") selected @endif value="Jessore">Jessore</option>
                <option @if(old('district') == "Jhenaidah") selected @endif value="Jhenaidah">Jhenaidah</option>
                <option @if(old('district') == "Khulna") selected @endif value="Khulna">Khulna</option>
                <option @if(old('district') == "Kushtia") selected @endif value="Kushtia">Kushtia</option>
                <option @if(old('district') == "Magura") selected @endif value="Magura">Magura</option>
                <option @if(old('district') == "Meherpu") selected @endif value="Meherpu">Meherpu</option>
                <option @if(old('district') == "Narail") selected @endif value="Narail">Narail</option>
                <option @if(old('district') == "Satkhir") selected @endif value="Satkhir">Satkhir</option>
            </select>
            @error('district')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">City</label>
            <input type="text" value="{{ old('city') }}"  name="city" class="form-control" placeholder="City Name"
                aria-describedby="helpId">
            @error('city')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Area</label>
            <input type="text" value="{{ old('area') }}"  name="area" class="form-control" placeholder="Enter your name of area"
                aria-describedby="helpId">
            @error('area')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Full Address</label>
            <textarea name="address"  class="form-control" rows="2" placeholder="Full Address">{{ old('address') }}</textarea>
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button class="btn btn-success" type="submit">Add Address</button>
    </form>
@endsection
