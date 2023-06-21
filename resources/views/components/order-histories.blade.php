@props([
    'search' => null,
    'orders' => [],
    'currency' => 'DA',
    'hold_selected_products' => null,
    'count_items' => 0
])
<div x-data="{ openOrderHistory: false }">
    <button class="mr-2 cursor-pointer rounded-full bg-primary text-white" @click="openOrderHistory = ! openOrderHistory">
        <svg xmlns="http://www.w3.org/2000/svg" baseProfile="basic" viewBox="0 0 48 48" width="40" height="40">
            <path fill="#50e6ff" d="M39,16v25c0,1.105-0.895,2-2,2H11c-1.105,0-2-0.895-2-2V7c0-1.105,0.895-2,2-2h17L39,16z" />
            <linearGradient id="scXuHPPH38xPkLPu1xF6na" x1="28.529" x2="33.6" y1="-582.528" y2="-587.6" gradientTransform="translate(0 598)" gradientUnits="userSpaceOnUse">
              <stop offset="0" stop-color="#3079d6" />
              <stop offset="1" stop-color="#297cd2" />
            </linearGradient>
            <path fill="url(#scXuHPPH38xPkLPu1xF6na)" d="M28,5v9c0,1.105,0.895,2,2,2h9L28,5z" />
            <path fill="#057093" d="M35.5,21h-23c-0.276,0-0.5-0.224-0.5-0.5v-1c0-0.276,0.224-0.5,0.5-0.5h23c0.276,0,0.5,0.224,0.5,0.5v1C36,20.776,35.776,21,35.5,21z" />
            <path fill="#057093" d="M14.5,27h-2c-0.276,0-0.5-0.224-0.5-0.5v-1c0-0.276,0.224-0.5,0.5-0.5h2c0.276,0,0.5,0.224,0.5,0.5v1C15,26.776,14.776,27,14.5,27z" />
            <path fill="#057093" d="M35.5,27h-18c-0.276,0-0.5-0.224-0.5-0.5v-1c0-0.276,0.224-0.5,0.5-0.5h18c0.276,0,0.5,0.224,0.5,0.5v1C36,26.776,35.776,27,35.5,27z" />
            <path fill="#057093" d="M35.5,35h-18c-0.276,0-0.5-0.224-0.5-0.5v-1c0-0.276,0.224-0.5,0.5-0.5h18c0.276,0,0.5,0.224,0.5,0.5v1C36,34.776,35.776,35,35.5,35z" />
            <path fill="#057093" d="M35.5,31h-18c-0.276,0-0.5-0.224-0.5-0.5v-1c0-0.276,0.224-0.5,0.5-0.5h18c0.276,0,0.5,0.224,0.5,0.5v1C36,30.776,35.776,31,35.5,31z" />
            <radialGradient id="scXuHPPH38xPkLPu1xF6nb" cx="37.649" cy="-509.947" r="11.868" gradientTransform="matrix(1 0 0 -1 0 -472)" gradientUnits="userSpaceOnUse">
              <stop offset="0" />
              <stop offset="1" stop-opacity="0" />
            </radialGradient>
            <path fill="url(#scXuHPPH38xPkLPu1xF6nb)" d="M38,26c-6.617,0-12,5.383-12,12c0,1.786,0.403,3.476,1.105,5H37c1.105,0,2-0.895,2-2V26.051C38.669,26.023,38.338,26,38,26z" />
            <path fill="#057093" d="M14.5,31h-2c-0.276,0-0.5-0.224-0.5-0.5v-1c0-0.276,0.224-0.5,0.5-0.5h2c0.276,0,0.5,0.224,0.5,0.5v1C15,30.776,14.776,31,14.5,31z" />
            <path fill="#057093" d="M14.5,35h-2c-0.276,0-0.5-0.224-0.5-0.5v-1c0-0.276,0.224-0.5,0.5-0.5h2c0.276,0,0.5,0.224,0.5,0.5v1C15,34.776,14.776,35,14.5,35z" />
            <linearGradient id="scXuHPPH38xPkLPu1xF6nc" x1="30.929" x2="45.071" y1="-1880.929" y2="-1895.071" gradientTransform="matrix(1 0 0 -1 0 -1850)" gradientUnits="userSpaceOnUse">
              <stop offset="0" stop-color="#21ad64" />
              <stop offset="1" stop-color="#088242" />
            </linearGradient>
            <path fill="url(#scXuHPPH38xPkLPu1xF6nc)" d="M48,38c0,5.522-4.478,10-10,10s-10-4.478-10-10s4.478-10,10-10S48,32.478,48,38z" />
            <path fill="#fff" d="M36.646,42.354l-4-4c-0.195-0.195-0.195-0.512,0-0.707l0.707-0.707c0.195-0.195,0.512-0.195,0.707,0L37,39.879l5.439-5.439c0.195-0.195,0.512-0.195,0.707,0l0.707,0.707c0.195,0.195,0.195,0.512,0,0.707l-6.5,6.5C37.158,42.549,36.842,42.549,36.646,42.354z" />
          </svg>
    </button>
    <div x-show="openOrderHistory" class="order-history w-full h-full shadow-lg" x-transition:enter="transition transform ease-in-out duration-300"
        x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transition transform ease-in-out duration-300" x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full">
        <!-- Sidebar content goes here -->
      <div class="mb-4">
        <div class="flex flex-row justify-between items-center p-2 rounded mt-5 shadow">
            <a class="cursor-pointer" @click="openOrderHistory = ! openOrderHistory">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="40" height="40">
                    <path fill="#f44336" d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z" />
                    <path fill="#fff" d="M29.656,15.516l2.828,2.828l-14.14,14.14l-2.828-2.828L29.656,15.516z" />
                    <path fill="#fff" d="M32.484,29.656l-2.828,2.828l-14.14-14.14l2.828-2.828L32.484,29.656z" />
                </svg>
            </a>
            <span class="px-4 py-2 rounded-md cursor-pointer text-gray-500">Order Completed History</span>
        </div>
      </div>
      <div class="p-3">
        <!-- search -->
        <x-filament-pos::left-section.search :search="$search"/>
        <!-- end search -->


        @if ($orders)
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Product name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Color
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $key => $order)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Apple MacBook Pro 17"
                            </th>
                            <td class="px-6 py-4">
                                Silver
                            </td>
                            <td class="px-6 py-4">
                                Laptop
                            </td>
                            <td class="px-6 py-4">
                                $2999
                            </td>
                            <td class="px-6 py-4">
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
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
                    </tbody>
                </table>
            </div>
        @else
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
        @endif
    </div>
  </div>
</div>

<style>
.order-history {
  position: absolute;
  top: 0;
  left: 0;
  background-color: #ffffff;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  transition: transform 0.3s ease;
  z-index: 9999;
}

.order-history.show {
  transform: translateX(-300px);
  right: 0;
}
</style>

