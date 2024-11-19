<div>
    <div>
        <select class="form-control mb-1" wire:model.live="selectedCategory">
            <option value="">Select A Category</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->category_name}}</option>
            @endforeach
        </select>

        <select class="form-control">
            <option>Select A Subcategory</option>
            @foreach($subcategories as $subcategory)
                <option value="{{$subcategory->id}}">{{$subcategory->subcategory_name}}</option>
            @endforeach
        </select>
    </div>

</div>
