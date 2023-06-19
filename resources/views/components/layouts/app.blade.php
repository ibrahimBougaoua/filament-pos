@props([
    'maxContentWidth' => null,
])

<x-filament::layouts.base :title="$title">
    <div class="filament-app-layout h-full w-full overflow-x-clip">
        <div
            x-data="{}"
            x-cloak
            x-show="$store.sidebar.isOpen"
            x-transition.opacity.500ms
            x-on:click="$store.sidebar.close()"
            class="filament-sidebar-close-overlay fixed inset-0 z-20 h-full w-full bg-gray-900/50 lg:hidden"
        ></div>

        @if(config('filament-pos.showSidebar'))
            <x-filament::layouts.app.sidebar />
        @endif

        <div
            @if(config('filament-pos.showTopbar'))
                @if (config('filament.layout.sidebar.is_collapsible_on_desktop'))
                    x-data="{}"
                    x-bind:class="{
                        'lg:pl-[var(--collapsed-sidebar-width)] rtl:lg:pr-[var(--collapsed-sidebar-width)]': ! $store.sidebar.isOpen,
                        'filament-main-sidebar-open lg:pl-[var(--sidebar-width)] rtl:lg:pr-[var(--sidebar-width)]': $store.sidebar.isOpen,
                    }"
                    x-bind:style="'display: flex'" {{-- Mimics `x-cloak`, as using `x-cloak` causes visual issues with chart widgets --}}
                @endif
                @class([
                    'filament-main w-screen flex-1 flex-col gap-y-6 rtl:lg:pl-0',
                    'hidden h-full transition-all' => config('filament.layout.sidebar.is_collapsible_on_desktop'),
                    'flex lg:pl-[var(--sidebar-width)] rtl:lg:pr-[var(--sidebar-width)]' => ! config('filament.layout.sidebar.is_collapsible_on_desktop'),
                ])
            @endif
        >
            @if(config('filament-pos.showTopbar'))
                <x-filament::topbar :breadcrumbs="$breadcrumbs" />
            @endif

            <div
                @class([
                    'filament-main-content mx-auto w-full flex-1',
                    match ($maxContentWidth ??= config('filament.layout.max_content_width')) {
                        null, '7xl', '' => 'max-w-7xl',
                        'xl' => 'max-w-xl',
                        '2xl' => 'max-w-2xl',
                        '3xl' => 'max-w-3xl',
                        '4xl' => 'max-w-4xl',
                        '5xl' => 'max-w-5xl',
                        '6xl' => 'max-w-6xl',
                        'full' => 'max-w-full',
                        default => $maxContentWidth,
                    },
                ])
            >
                {{ \Filament\Facades\Filament::renderHook('content.start') }}

                {{ $slot }}

                {{ \Filament\Facades\Filament::renderHook('content.end') }}
            </div>

            @if(config('filament-pos.showFooter'))
                <div class="filament-main-footer shrink-0 py-4">
                    <x-filament::footer />
                </div>
            @endif
        </div>
    </div>
</x-filament::layouts.base>
