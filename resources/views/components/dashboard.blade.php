@props([
    'orders' => [],
    'currency' => 'DA',
    'hold_selected_products' => null,
    'count_items' => 0
])
<div x-data="{ openDashboard: false }">
    <button class="mr-2 cursor-pointer rounded-full bg-primary text-white" @click="openDashboard = ! openDashboard">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="40" height="40">
            <path fill="#0078d4" d="M20,28H8c-1.105,0-2-0.895-2-2V8c0-1.105,0.895-2,2-2h12c1.105,0,2,0.895,2,2v18C22,27.105,21.105,28,20,28z" />
            <path fill="#35c1f1" d="M40,16H28c-1.105,0-2-0.895-2-2V8c0-1.105,0.895-2,2-2h12c1.105,0,2,0.895,2,2v6C42,15.105,41.105,16,40,16z" />
            <path fill="#35c1f1" d="M20,42H8c-1.105,0-2-0.895-2-2v-6c0-1.105,0.895-2,2-2h12c1.105,0,2,0.895,2,2v6C22,41.105,21.105,42,20,42z" />
            <path fill="#0078d4" d="M40,42H28c-1.105,0-2-0.895-2-2V22c0-1.105,0.895-2,2-2h12c1.105,0,2,0.895,2,2v18C42,41.105,41.105,42,40,42z" />
        </svg>
    </button>
    <div x-show="openDashboard" class="dashboard w-full h-full shadow-lg" x-transition:enter="transition transform ease-in-out duration-300"
        x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transition transform ease-in-out duration-300" x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full">
        <!-- Sidebar content goes here -->
      <div class="mb-4">
        <div class="flex flex-row justify-between items-center p-2 rounded mt-5 shadow">
            <a class="cursor-pointer" @click="openDashboard = ! openDashboard">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="40" height="40">
                    <path fill="#f44336" d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z" />
                    <path fill="#fff" d="M29.656,15.516l2.828,2.828l-14.14,14.14l-2.828-2.828L29.656,15.516z" />
                    <path fill="#fff" d="M32.484,29.656l-2.828,2.828l-14.14-14.14l2.828-2.828L32.484,29.656z" />
                </svg>
            </a>
            <span class="px-4 py-2 rounded-md cursor-pointer text-gray-500">Dashboard</span>
        </div>
      </div>
      <div class="p-3">

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
.dashboard {
  position: absolute;
  top: 0;
  left: 0;
  background-color: #ffffff;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  transition: transform 0.3s ease;
  z-index: 9999;
}

.dashboard.show {
  transform: translateX(-300px);
  right: 0;
}
</style>

