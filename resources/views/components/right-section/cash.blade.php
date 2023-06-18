@props([
    'currency' => null,
    'total' => 0
])

<div class="px-5 my-6">
    <div class="rounded-md shadow-lg px-4 py-4">
        <div class="flex flex-row justify-between items-center">
            <div class="flex flex-col">
                <span class="uppercase text-xs font-semibold">cashless credit</span>
                <span class="text-xl font-bold text-primary-500">{{ $total }} {{ $currency }}</span>
                <span class=" text-xs text-gray-400 ">Available</span>
            </div>
            <div class="px-4 py-3 cursor-pointer bg-danger-500 text-white rounded-md font-bold" wire:click="$emit('fireCancel')"> Cancel</div>
        </div>
    </div>
</div>