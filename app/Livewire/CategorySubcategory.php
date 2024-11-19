<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;

class CategorySubcategory extends Component
{
    public $categories = [];

    public $selectedCategory;

    public $subcategories = [];

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function updatedSelectedCategory($selectedCategory)
    {
        $this->subcategories = Subcategory::where('category_id',$selectedCategory)->get();
    }
    public function render()
    {
        return view('livewire.category-subcategory');
    }
}
