@props([
    'categories' => []
])

<div class="mt-4 flex flex-row px-5">
    <span class="px-5 p-2 cursor-pointer rounded-2xl text-sm font-semibold mr-4 bg-danger-500 text-white hover:bg-gray-500/5 focus:bg-gray-500/5">
        All items
    </span>
    @foreach ($categories as $category)
        <span class="px-5 p-2 border cursor-pointer shadow-lg rounded-2xl text-sm font-semibold mr-4 hover:bg-gray-500/5 focus:bg-gray-500/5">
            {{ $category->name }}
        </span>
    @endforeach
</div>