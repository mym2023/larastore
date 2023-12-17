<!-- view-products.blade.php -->

<div>
    <style>
        .product-card {
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            width: 200px;
            text-align: center;
        }

        .product-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .pagination {
            margin-top: 20px;
        }
    </style>

    <div class="mb-4">
        <form class="flex items-center space-x-4">
            <input wire:model="searchProduct" type="text" class="border p-2" placeholder="Search Product">
            <select wire:model="searchCategory" class="border p-2">
                <option value="">All Categories</option>
                @foreach($main_category as $id => $category)
                    <option value="{{ $id }}">{{ $category }}</option>
                @endforeach
            </select>
            <input wire:model="maxPrice" type="number" class="border p-2" placeholder="Max Price">
        </form>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @forelse($products as $product)
            <div class="bg-white p-4 shadow-md rounded-md product-card">
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="product-image">
                <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                <p class="text-gray-600">{{ $product->category->name }}</p>
                <p class="text-gray-700">{{ $product->description }}</p>
                <p class="text-green-600 font-bold">{{ $product->price }}</p>
            </div>
        @empty
            <p>No products found.</p>
        @endforelse
    </div>

    {{ $products->links() }}
</div>
