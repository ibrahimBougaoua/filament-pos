<div class="shadow bg-white">
    <div class="h-16 mx-auto px-5 flex items-center justify-between">
        <a class="text-2xl hover:text-cyan-500 transition-colors cursor-pointer">
            <img class="w-auto h-16" src="https://img.freepik.com/premium-vector/restaurant-logo-design-template_79169-56.jpg" alt="Logo" />
        </a>
        <div class="flex items-center">
            <ul class="flex">
                <li>
                    <x-filament-pos::hold-list :hold_selected_products="$hold_selected_products" :count_items="count($hold_selected_products)"/>
                </li>
            </ul>
            <div>
                <x-filament::layouts.app.topbar.user-menu />
            </div>
        </div>
    </div>
</div>