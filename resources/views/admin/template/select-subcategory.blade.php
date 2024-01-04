<option value="">Select SubCategory</option>
@foreach ($subcategories as $subcategory)
    <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
@endforeach
