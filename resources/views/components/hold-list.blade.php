@props([
  'currency' => 'DA',
  'hold_selected_products' => null,
  'count_items' => 0
])
<div x-data="{ open: false }">
    <button class="mr-2 cursor-pointer rounded-full bg-primary text-white" @click="open = ! open">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="40" height="40">
        <path fill="#FF9800" d="M40,42H8c-1.1,0-2-0.9-2-2V8c0-1.1,0.9-2,2-2h32c1.1,0,2,0.9,2,2v32C42,41.1,41.1,42,40,42z" />
        <path fill="#FFB74D" d="M21 6H27V13H21z" />
        <path fill="#B86D00" d="M29 37H38V38H29zM35 32H37V36H35z" />
        <path fill="#B86D00" d="M36 30L34 33 38 33zM30 32H32V36H30z" />
        <path fill="#B86D00" d="M31 30L29 33 33 33z" />
      </svg>
    </button>
    <div x-show="open" class="sidebar w-2/5 shadow-lg" x-transition:enter="transition transform ease-in-out duration-300"
        x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transition transform ease-in-out duration-300" x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full">
        <!-- Sidebar content goes here -->
      <div class="mb-4">
        <div class="flex flex-row justify-between items-center p-2 rounded mt-5 shadow">
            <a class="cursor-pointer" @click="open = ! open">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="40" height="40">
                <path fill="#f44336" d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z" />
                <path fill="#fff" d="M29.656,15.516l2.828,2.828l-14.14,14.14l-2.828-2.828L29.656,15.516z" />
                <path fill="#fff" d="M32.484,29.656l-2.828,2.828l-14.14-14.14l2.828-2.828L32.484,29.656z" />
              </svg>
            </a>
            <span class="px-4 py-2 rounded-md cursor-pointer text-gray-500">Hold List</span>
        </div>
      </div>
      <div class="p-3">
        @forelse ($hold_selected_products as $key => $selected_products)
          <div class="flex flex-row justify-between items-center p-2 px-2 rounded mt-5 shadow bg-primary-500">
              <div class="font-bold text-white">
                Customer N#{{ $key }}
              </div>
              <div wire:click="removeHoldList({{ $key }})" class="px-2 py-1 cursor-pointer rounded-md shadow-lg bg-white text-center text-white">
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

          <div class="py-4 mt-5">
            <div class="p-2 rounded-md shadow">
                @forelse ($selected_products as $_key => $prduct)
                        <x-filament-pos::right-section.hold-order-list 
                            :key="$key"
                            :index="$_key"
                            :name="$prduct['name']"
                            :image="$prduct['image']"
                            :description="$prduct['description']"
                            :currency="$currency"
                            :price="$prduct['price']"
                            :variations="$prduct['variations']"
                            wire:key="$_key"
                            />
                @empty
                    <div class="filament-tables-empty-state mx-auto flex flex-1 flex-col items-center justify-center space-y-6 bg-white p-6">
                        <div class="flex h-50 w-50 p-3 items-center justify-center text-center rounded-full bg-primary-50 text-primary-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="100" height="100">
                                <path fill="#009688" d="M18,32c-1.1,0-2-0.9-2-2l0-10l-4,0l0,10c0,3.3,2.7,6,6,6h19v-4H18z" />
                                <path fill="#009688" d="M12.8,10l-0.4-1.3C11.8,7.1,10.3,6,8.6,6H5v4h3.6l5.5,16.6c0.3,0.8,1,1.4,1.9,1.4h19c0.8,0,1.5-0.5,1.8-1.2L44.4,10H12.8z" />
                                <path fill="#00695C" d="M5 6A2 2 0 1 0 5 10A2 2 0 1 0 5 6Z" />
                                <path fill="#37474F" d="M34 36A3 3 0 1 0 34 42 3 3 0 1 0 34 36zM19 36A3 3 0 1 0 19 42 3 3 0 1 0 19 36z" />
                                <g>
                                    <path fill="#607D8B" d="M34 38A1 1 0 1 0 34 40 1 1 0 1 0 34 38zM19 38A1 1 0 1 0 19 40 1 1 0 1 0 19 38z" />
                                </g>
                            </svg>
                        </div>
                        <p class="text-center p-6 text-xl ordinal slashed-zero tabular-nums">
                            No Item selected
                        </p>
                    </div>
                @endforelse
            </div>
          </div>
          <div class="my-2">
            <div class="px-4 py-4 cursor-pointer rounded-md shadow-lg text-center bg-success-500 text-white font-semibold" wire:click="hold_out_from_hold_list({{ $key }})">
                Hold Out
            </div>
          </div>
        @empty
            <div class="filament-tables-empty-state mx-auto flex flex-1 flex-col items-center justify-center space-y-6 bg-white p-6">
                <div class="flex h-50 w-50 p-3 items-center justify-center text-center rounded-full bg-primary-50 text-primary-500">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="100" height="100">
                        <path fill="#009688" d="M18,32c-1.1,0-2-0.9-2-2l0-10l-4,0l0,10c0,3.3,2.7,6,6,6h19v-4H18z" />
                        <path fill="#009688" d="M12.8,10l-0.4-1.3C11.8,7.1,10.3,6,8.6,6H5v4h3.6l5.5,16.6c0.3,0.8,1,1.4,1.9,1.4h19c0.8,0,1.5-0.5,1.8-1.2L44.4,10H12.8z" />
                        <path fill="#00695C" d="M5 6A2 2 0 1 0 5 10A2 2 0 1 0 5 6Z" />
                        <path fill="#37474F" d="M34 36A3 3 0 1 0 34 42 3 3 0 1 0 34 36zM19 36A3 3 0 1 0 19 42 3 3 0 1 0 19 36z" />
                        <g>
                            <path fill="#607D8B" d="M34 38A1 1 0 1 0 34 40 1 1 0 1 0 34 38zM19 38A1 1 0 1 0 19 40 1 1 0 1 0 19 38z" />
                        </g>
                    </svg>
                </div>
                <p class="text-center p-6 text-xl ordinal slashed-zero tabular-nums">
                    No Item selected
                </p>
            </div>
        @endforelse
    </div>
  </div>
</div>

<style>
.sidebar {
  position: absolute;
  top: 0;
  right: 0;
  background-color: #ffffff;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  transition: transform 0.3s ease;
  z-index: 9999;
}

.sidebar.show {
  transform: translateX(-300px);
  right: 0;
}
</style>

