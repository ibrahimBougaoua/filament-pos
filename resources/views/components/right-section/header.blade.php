@props([
    'currency' => null,
    'total' => 0
])

<div class="px-5 overflow-y-auto h-64">
    <div class="p-2  bg-success-500 rounded-md shadow-lg">
        <p class="text-white text-center p-6 text-xl ordinal slashed-zero tabular-nums" style="font-size: 4em;">
            {{ number_format($total,2) }} {{ $currency }}
        </p>
    </div>
</div>