@props([
    'key' => null,
    'name' => 'Product Name',
    'description' => 'Product Description',
    'image' => null,
    'currency' => null,
    'price' => 999.00,
    'qty' => 1,
    'variations' => [],
])

<div class="flex flex-row justify-between items-center overflow-y-auto h-32 mb-4 p-1 cursor-pointer rounded-xl  hover:bg-gray-500/5 focus:bg-gray-500/5">
    @if( ! count($variations) )
        <div class="flex flex-row items-center w-2/5">
            <img src="storage/{{ $image }}"
                class="w-10 h-10 object-cover rounded-md" alt="{{ $name }}">
            <span class="ml-4 font-semibold text-sm">{{ $name }}</span>
        </div>
        <div class="flex justify-between">
            <span class="px-3 py-1 rounded-md bg-gray-300" wire:click="qtyDec({{ $key }})">-</span>
            <span class="font-semibold mx-4">{{ $qty }}</span>
            <span class="px-3 py-1 rounded-md bg-gray-300" wire:click="qtyInc({{ $key }})">+</span>
        </div>
        <div class="font-semibold text-lg w-16 text-center">
            {{ number_format($price,2) }} {{ $currency }}
        </div>
        <div wire:click="removeProduct({{ $key }})" class="px-2 py-1 cursor-pointer rounded-md shadow-lg text-center text-white">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="30" height="30">
                <linearGradient id="WxWrlTsssL_WlnpfbClFCa" x1="24" x2="24" y1="592.908" y2="650.553" gradientTransform="matrix(1 0 0 -1 0 662)" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#f44f5a" />
                <stop offset=".443" stop-color="#ee3d4a" />
                <stop offset="1" stop-color="#e52030" />
                </linearGradient>
                <path fill="url(#WxWrlTsssL_WlnpfbClFCa)" d="M39,10v31c0,1.105-0.895,2-2,2H11c-1.105,0-2-0.895-2-2V10H39z" />
                <linearGradient id="WxWrlTsssL_WlnpfbClFCb" x1="24" x2="24" y1="657.947" y2="648.199" gradientTransform="matrix(1 0 0 -1 0 662)" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#f44f5a" />
                <stop offset=".443" stop-color="#ee3d4a" />
                <stop offset="1" stop-color="#e52030" />
                </linearGradient>
                <path fill="url(#WxWrlTsssL_WlnpfbClFCb)" d="M28,4h-8c-1.105,0-2,0.895-2,2v2h12V6C30,4.895,29.105,4,28,4z" />
                <path fill="#ffa8a8" d="M8,11v-1c0-1.657,1.343-3,3-3h26c1.657,0,3,1.343,3,3v1H8z" />
                <path d="M32.395,30.153L28.243,26l4.191-4.191c0.781-0.781,0.781-2.047,0-2.828 l-1.414-1.414c-0.781-0.781-2.047-0.781-2.828,0L24,21.757l-4.191-4.191c-0.781-0.781-2.047-0.781-2.828,0l-1.414,1.414 c-0.781,0.781-0.781,2.047,0,2.828l4.191,4.191l-4.192,4.192c-0.781,0.781-0.781,2.047,0,2.828l1.414,1.414 c0.781,0.781,2.047,0.781,2.828,0L24,30.241l4.153,4.153c0.781,0.781,2.047,0.781,2.828,0l1.414-1.414 C33.176,32.2,33.176,30.934,32.395,30.153z" opacity=".05" />
                <path d="M32.042,30.506L27.536,26l4.544-4.544c0.586-0.586,0.586-1.536,0-2.121 l-1.414-1.414c-0.586-0.586-1.536-0.586-2.121,0L24,22.464l-4.544-4.544c-0.586-0.586-1.536-0.586-2.121,0l-1.414,1.414 c-0.586,0.586-0.586,1.536,0,2.121L20.464,26l-4.545,4.545c-0.586,0.586-0.586,1.536,0,2.121l1.414,1.414 c0.586,0.586,1.536,0.586,2.121,0L24,29.536l4.506,4.506c0.586,0.586,1.536,0.586,2.121,0l1.414-1.414 C32.628,32.042,32.628,31.092,32.042,30.506z" opacity=".07" />
                <path fill="#fff" d="M26.828,26l4.898-4.898c0.391-0.39,0.391-1.023,0-1.414l-1.414-1.414 c-0.39-0.391-1.024-0.391-1.414,0L24,23.172l-4.898-4.898c-0.39-0.391-1.023-0.391-1.414,0l-1.414,1.414 c-0.391,0.39-0.391,1.023,0,1.414L21.172,26l-4.899,4.899c-0.391,0.39-0.391,1.023,0,1.414l1.414,1.414 c0.39,0.391,1.023,0.391,1.414,0L24,28.828l4.86,4.86c0.39,0.391,1.023,0.391,1.414,0l1.414-1.414c0.391-0.39,0.391-1.024,0-1.414 L26.828,26z" />
            </svg>
        </div>
    @else
        <div class="flex flex-row items-center w-2/5">
            <img src="storage/{{ $image }}"
                class="w-10 h-10 object-cover rounded-md" alt="{{ $name }}">
            <span class="ml-4 font-semibold text-sm">{{ $name }}</span>
        </div>
        <div class="font-semibold text-lg w-16 text-center">
            Total {{ number_format($price,2) }} {{ $currency }}
        </div>
        <div wire:click="removeProduct({{ $key }})" class="px-2 py-1 cursor-pointer rounded-md shadow-lg text-center text-white">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="30" height="30">
                <linearGradient id="WxWrlTsssL_WlnpfbClFCa" x1="24" x2="24" y1="592.908" y2="650.553" gradientTransform="matrix(1 0 0 -1 0 662)" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#f44f5a" />
                <stop offset=".443" stop-color="#ee3d4a" />
                <stop offset="1" stop-color="#e52030" />
                </linearGradient>
                <path fill="url(#WxWrlTsssL_WlnpfbClFCa)" d="M39,10v31c0,1.105-0.895,2-2,2H11c-1.105,0-2-0.895-2-2V10H39z" />
                <linearGradient id="WxWrlTsssL_WlnpfbClFCb" x1="24" x2="24" y1="657.947" y2="648.199" gradientTransform="matrix(1 0 0 -1 0 662)" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#f44f5a" />
                <stop offset=".443" stop-color="#ee3d4a" />
                <stop offset="1" stop-color="#e52030" />
                </linearGradient>
                <path fill="url(#WxWrlTsssL_WlnpfbClFCb)" d="M28,4h-8c-1.105,0-2,0.895-2,2v2h12V6C30,4.895,29.105,4,28,4z" />
                <path fill="#ffa8a8" d="M8,11v-1c0-1.657,1.343-3,3-3h26c1.657,0,3,1.343,3,3v1H8z" />
                <path d="M32.395,30.153L28.243,26l4.191-4.191c0.781-0.781,0.781-2.047,0-2.828 l-1.414-1.414c-0.781-0.781-2.047-0.781-2.828,0L24,21.757l-4.191-4.191c-0.781-0.781-2.047-0.781-2.828,0l-1.414,1.414 c-0.781,0.781-0.781,2.047,0,2.828l4.191,4.191l-4.192,4.192c-0.781,0.781-0.781,2.047,0,2.828l1.414,1.414 c0.781,0.781,2.047,0.781,2.828,0L24,30.241l4.153,4.153c0.781,0.781,2.047,0.781,2.828,0l1.414-1.414 C33.176,32.2,33.176,30.934,32.395,30.153z" opacity=".05" />
                <path d="M32.042,30.506L27.536,26l4.544-4.544c0.586-0.586,0.586-1.536,0-2.121 l-1.414-1.414c-0.586-0.586-1.536-0.586-2.121,0L24,22.464l-4.544-4.544c-0.586-0.586-1.536-0.586-2.121,0l-1.414,1.414 c-0.586,0.586-0.586,1.536,0,2.121L20.464,26l-4.545,4.545c-0.586,0.586-0.586,1.536,0,2.121l1.414,1.414 c0.586,0.586,1.536,0.586,2.121,0L24,29.536l4.506,4.506c0.586,0.586,1.536,0.586,2.121,0l1.414-1.414 C32.628,32.042,32.628,31.092,32.042,30.506z" opacity=".07" />
                <path fill="#fff" d="M26.828,26l4.898-4.898c0.391-0.39,0.391-1.023,0-1.414l-1.414-1.414 c-0.39-0.391-1.024-0.391-1.414,0L24,23.172l-4.898-4.898c-0.39-0.391-1.023-0.391-1.414,0l-1.414,1.414 c-0.391,0.39-0.391,1.023,0,1.414L21.172,26l-4.899,4.899c-0.391,0.39-0.391,1.023,0,1.414l1.414,1.414 c0.39,0.391,1.023,0.391,1.414,0L24,28.828l4.86,4.86c0.39,0.391,1.023,0.391,1.414,0l1.414-1.414c0.391-0.39,0.391-1.024,0-1.414 L26.828,26z" />
            </svg>
        </div>
    @endif
</div>

@foreach ($variations as $_key => $variation)
<div class="flex flex-row justify-between items-center overflow-y-auto h-32 mb-4 p-1 cursor-pointer rounded bg-gray-500/5  hover:bg-gray-500/5 focus:bg-gray-500/5">
      <div class="flex flex-row items-center">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="35" height="35">
            <path fill="#3F51B5" d="M44 29L30 17.3 30 40.7z" />
            <path fill="#3F51B5" d="M6,21V8h8v13c0,2.2,1.8,4,4,4h17v8H18C11.4,33,6,27.6,6,21z" />
        </svg>
      </div>
      <div class="flex flex-row items-center w-2/5">
          <img src="storage/{{ $variation['image'] }}"
              class="w-10 h-10 object-cover rounded-md" alt="{{ $variation['name'] }}">
          <span class="ml-4 font-semibold text-sm">{{ $variation['name'] }}</span>
      </div>
        <div class="flex justify-between">
            <span class="px-3 py-1 rounded-md bg-gray-300" wire:click="qtyDec({{ $key }})">-</span>
            <span class="font-semibold mx-4">{{ $qty }}</span>
            <span class="px-3 py-1 rounded-md bg-gray-300" wire:click="qtyInc({{ $key }})">+</span>
        </div>
        <div class="font-semibold text-lg w-16 text-center">
            {{ number_format($variation['price'],2) }} {{ $currency }}
        </div>
        <div wire:click="removeVariation({{ $key }},{{ $_key }})" class="px-2 py-1 cursor-pointer rounded-md shadow-lg bg-white text-center text-white">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="30" height="30">
                <linearGradient id="WxWrlTsssL_WlnpfbClFCa" x1="24" x2="24" y1="592.908" y2="650.553" gradientTransform="matrix(1 0 0 -1 0 662)" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#f44f5a" />
                <stop offset=".443" stop-color="#ee3d4a" />
                <stop offset="1" stop-color="#e52030" />
                </linearGradient>
                <path fill="url(#WxWrlTsssL_WlnpfbClFCa)" d="M39,10v31c0,1.105-0.895,2-2,2H11c-1.105,0-2-0.895-2-2V10H39z" />
                <linearGradient id="WxWrlTsssL_WlnpfbClFCb" x1="24" x2="24" y1="657.947" y2="648.199" gradientTransform="matrix(1 0 0 -1 0 662)" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#f44f5a" />
                <stop offset=".443" stop-color="#ee3d4a" />
                <stop offset="1" stop-color="#e52030" />
                </linearGradient>
                <path fill="url(#WxWrlTsssL_WlnpfbClFCb)" d="M28,4h-8c-1.105,0-2,0.895-2,2v2h12V6C30,4.895,29.105,4,28,4z" />
                <path fill="#ffa8a8" d="M8,11v-1c0-1.657,1.343-3,3-3h26c1.657,0,3,1.343,3,3v1H8z" />
                <path d="M32.395,30.153L28.243,26l4.191-4.191c0.781-0.781,0.781-2.047,0-2.828 l-1.414-1.414c-0.781-0.781-2.047-0.781-2.828,0L24,21.757l-4.191-4.191c-0.781-0.781-2.047-0.781-2.828,0l-1.414,1.414 c-0.781,0.781-0.781,2.047,0,2.828l4.191,4.191l-4.192,4.192c-0.781,0.781-0.781,2.047,0,2.828l1.414,1.414 c0.781,0.781,2.047,0.781,2.828,0L24,30.241l4.153,4.153c0.781,0.781,2.047,0.781,2.828,0l1.414-1.414 C33.176,32.2,33.176,30.934,32.395,30.153z" opacity=".05" />
                <path d="M32.042,30.506L27.536,26l4.544-4.544c0.586-0.586,0.586-1.536,0-2.121 l-1.414-1.414c-0.586-0.586-1.536-0.586-2.121,0L24,22.464l-4.544-4.544c-0.586-0.586-1.536-0.586-2.121,0l-1.414,1.414 c-0.586,0.586-0.586,1.536,0,2.121L20.464,26l-4.545,4.545c-0.586,0.586-0.586,1.536,0,2.121l1.414,1.414 c0.586,0.586,1.536,0.586,2.121,0L24,29.536l4.506,4.506c0.586,0.586,1.536,0.586,2.121,0l1.414-1.414 C32.628,32.042,32.628,31.092,32.042,30.506z" opacity=".07" />
                <path fill="#fff" d="M26.828,26l4.898-4.898c0.391-0.39,0.391-1.023,0-1.414l-1.414-1.414 c-0.39-0.391-1.024-0.391-1.414,0L24,23.172l-4.898-4.898c-0.39-0.391-1.023-0.391-1.414,0l-1.414,1.414 c-0.391,0.39-0.391,1.023,0,1.414L21.172,26l-4.899,4.899c-0.391,0.39-0.391,1.023,0,1.414l1.414,1.414 c0.39,0.391,1.023,0.391,1.414,0L24,28.828l4.86,4.86c0.39,0.391,1.023,0.391,1.414,0l1.414-1.414c0.391-0.39,0.391-1.024,0-1.414 L26.828,26z" />
            </svg>
        </div>
    </div>
@endforeach