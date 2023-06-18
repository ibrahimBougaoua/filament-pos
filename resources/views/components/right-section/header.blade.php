
<div class="flex flex-row items-center justify-between px-5 mt-5">
    <div class="text-xl px-5 p-2 border cursor-pointer shadow-lg rounded-2xl font-semibold mr-4 hover:bg-gray-500/5 focus:bg-gray-500/5">Current Order</div>
    <div class="font-semibold">
        <span class="px-4 py-2 rounded-md cursor-pointer bg-danger-500 text-white" wire:click="$emit('fireCancel')">Clear All</span>
        <span class="px-4 py-2 rounded-md cursor-pointer bg-success-500 text-white">Setting</span>
    </div>
</div>