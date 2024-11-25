<div>
    <div>
        <label for="category_id" class="fw-bold mb-2">Select A Category To Your Product</label>
        <select class="form-control mb-1" name="category_id" wire:model.live="selectedCategory">
            <option value="">Select A Category</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->category_name}}</option>
            @endforeach
        </select>

        <label for="subcategory_id" class="fw-bold mb-2">Select A Sub-Category To Your Product</label>
        <select class="form-control" name="subcategory_id">
            <option>Select A Subcategory</option>
            @foreach($subcategories as $subcategory)
                <option value="{{$subcategory->id}}">{{$subcategory->subcategory_name}}</option>
            @endforeach
        </select>
    </div>
</div>
