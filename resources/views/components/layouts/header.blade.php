<div class="shadow bg-white">
    <div class="h-16 mx-auto px-5 flex items-center justify-between">
        <a class="text-2xl hover:text-cyan-500 transition-colors cursor-pointer">
            <img class="w-auto h-16" src="https://img.freepik.com/premium-vector/restaurant-logo-design-template_79169-56.jpg" alt="Logo" />
        </a>
        <div class="flex items-center">
            <ul class="flex">
               <li>
                    <a class="px-4 py-2 rounded-md cursor-pointer bg-gray-500 text-white" href="{{ route('filament.pages.dashboard') }}">
                        Dashboard
                    </a>
               </li>
            </ul>
            <div>
                <x-filament::layouts.app.topbar.user-menu />
            </div>
        </div>
    </div>
</div>