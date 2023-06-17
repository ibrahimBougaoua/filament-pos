<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>
            Pos
        </title>

        <link href="{{ asset("filament-pos/css/soft-ui-dashboard-tailwind.css") }}" rel="stylesheet" />    
        @livewireStyles
    </head>

    <body>

        {{ $slot }}

        @livewireScripts

        @stack('scripts')

    </body>
</html>
