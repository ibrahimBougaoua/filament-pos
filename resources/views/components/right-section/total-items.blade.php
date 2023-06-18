@props([
    'currency' => null,
    'subtotal' => 0,
    'discount' => 0,
    'tax' => 0,
    'total' => 0
])

<div class="px-5 mt-5">
    <div class="py-4 rounded-md shadow">
        <div class=" px-4 flex justify-between ">
            <span class="font-semibold text-sm">Subtotal</span>
            <span class="font-bold">{{ $subtotal }} {{ $currency }}</span>
        </div>
        <div class=" px-4 flex justify-between ">
            <span class="font-semibold text-sm">Discount</span>
            <span class="font-bold">- {{ $discount }} {{ $currency }}</span>
        </div>
        <div class=" px-4 flex justify-between ">
            <span class="font-semibold text-sm">Sales Tax</span>
            <span class="font-bold">{{ $tax }} {{ $currency }}</span>
        </div>
        <div class="border-t-2 mt-3 py-2 px-4 flex items-center justify-between">
            <span class="font-semibold text-2xl">Total</span>
            <span class="font-bold text-2xl">{{ $total }} {{ $currency }}</span>
        </div>
    </div>
</div>