@props([
    'categories' => []
])

<div x-data="{ active: 'all_items' }" class="mt-4 flex flex-row px-5">
    <span x-on:click="$wire.getProductsByCategory()" 
        :class="{ 'bg-danger-500 text-white hover:bg-danger-500 hover:text-black': active === 'all_items' }" 
        @click="active = 'all_items'" 
        class="px-5 p-2 border cursor-pointer shadow-lg rounded-2xl text-sm font-semibold mr-4 hover:bg-gray-500/5 focus:bg-gray-500/5">
        All items
    </span>
    @foreach ($categories as $key => $category)
        <span x-on:click="$wire.getProductsByCategory({{ $category->id }})" 
            :class="{ 'bg-danger-500 text-white hover:bg-danger-500 hover:text-black': active === 'item{{ $key }}' }" 
            @click="active = 'item{{ $key }}'" 
            class="px-5 p-2 border cursor-pointer shadow-lg rounded-2xl text-sm font-semibold mr-4 hover:bg-gray-500/5 focus:bg-gray-500/5">
            {{ $category->name }}
        </span>
    @endforeach
</div>