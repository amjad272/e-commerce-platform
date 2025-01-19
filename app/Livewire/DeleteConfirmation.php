<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DeleteConfirmation extends Component
{
//    public $authUser;
//
//    public $products = [];
//
//    public $productId;
//
//    public function updatedAuthUser()
//    {
//        $this->authUser = Auth::id();
//    }
//
//    public function mountProducts($authUser)
//    {
//        $this->products = Product::where('seller_id', $authUser)->get();
//    }
//
//    public function delete($productId)
//    {
//        Product::FindOrFail('id',$productId)->delete();
//    }

    public function render()
    {
        return view('livewire.delete-confirmation');
    }
}
