@props([
    'name' => 'Product Name',
    'image' => null,
    'brand' => 'Product Brand',
    'currency' => null,
    'price' => 999.00,
])

<div wire:click="addProduct()" class="px-3 py-3 flex flex-col border cursor-pointer rounded-md shadow-lg h-32 justify-between hover:bg-gray-500/5 focus:bg-gray-500/5">
    <div>
        <div class="font-bold text-gray-800">
            {{ $name }}
        </div>
        <span class="font-light text-sm text-gray-400 reak-keep">{{ $brand }}</span>
    </div>
    <div class="flex flex-row justify-between items-center">
        <span class="self-end font-bold text-lg text-yellow-500">{{ $price }} {{ $currency }}</span>
        <img src="storage/{{ $image }}" class=" h-14 w-14 object-cover rounded-md" alt="{{ $name }}">
    </div>
</div>