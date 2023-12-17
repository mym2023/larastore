<?php

namespace App\Http\Livewire;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Collection;
use App\Models\Category;
use App\Models\Product;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Illuminate\Database\Eloquent\Builder;

class ViewProducts extends Component
{use WithPagination;

    public string $searchProduct = "";
    public ?int $maxPrice = null;
    public int $searchCategory = 0;

    public Collection $categories;

    public function mount(): void {

        $this->sub_category = Category::whereNotNull('parent_id')->pluck('name', 'id');
        $this->main_category = Category::where('parent_id',null)->pluck('name', 'id');
   //dd($this->sub_category);
        
    }


    

    public function render()
    {
        // $products = Product::with('Category')->when($this->searchBook !== '', fn(Builder $query) => $query->where('name', 'like', '%'. $this->searchProduct .'%')) 
        // ->when($this->searchCategory > 0, fn(Builder $query) => $query->where('category_id', $this->searchCategory)) 
        //         ->paginate(10);
                //dd($products);
                $query = Product::with('category');

    if ($this->searchProduct) {
        $query->where('name', 'like', '%' . $this->searchProduct . '%');
    }

    if ($this->searchCategory > 0) {
        $query->whereHas('category', function (Builder $query) {
            $query->where('id', $this->searchCategory);
        });
    }
    if ($this->maxPrice) {
        $query->where('price', '<=', $this->maxPrice);
    }

    $products = $query->paginate(10);
        return view('livewire.view-products', [
            'products' => $products,
        ]);
        
    }
}
