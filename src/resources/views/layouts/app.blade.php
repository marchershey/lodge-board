<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="themeMode">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title . ' - ' . config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles

    <script>
        if (
            localStorage.theme === "dark" ||
            (!("theme" in localStorage) &&
                window.matchMedia("(prefers-color-scheme: dark)").matches)
        ) {
            console.log('Setting theme mode to "dark"');
            localStorage.theme = "dark"
            document.documentElement.classList.add("dark");
        } else {
            console.log('Setting theme mode to "light"');
            localStorage.theme = "light"
            document.documentElement.classList.remove("dark");
        }
    </script>
</head>

<body class="h-full font-inter text-gray-700 bg-gray-100 dark:bg-gray-900 dark:text-white @env('local') pb-6 @endenv">
    <!-- Toasts -->
    <livewire:toasts />

    <!-- Main Content -->
    <div class="h-full">
        {{ $slot }}
    </div>

    @env('local')
    <!-- Development Bar -->
    <div class="fixed bottom-0 w-full h-6 text-xs bg-gray-200 border-t border-gray-300 dark:border-gray-800 dark:bg-gray-950 dark:text-white">
        <div class="flex items-center justify-center h-full space-x-6">
            {{-- Screen Size --}}
            <div class="flex">
                <span class="font-bold">Screen size:&nbsp;</span>
                <div class="flex">
                    <span class="block tablet:hidden">mobile</span>
                    <span class="hidden tablet:block laptop:hidden">tablet</span>
                    <span class="hidden laptop:block desktop:hidden">laptop</span>
                    <span class="hidden desktop:block">desktop</span>
                    <span class="block sm:hidden">(xs)</span>
                    <span class="hidden sm:block md:hidden">(sm)</span>
                    <span class="hidden md:block lg:hidden">(md)</span>
                    <span class="hidden lg:block xl:hidden">(lg)</span>
                    <span class="hidden xl:block 2xl:hidden">(xl)</span>
                    <span class="hidden 2xl:block">(2xl)</span>
                </div>
            </div>

            {{-- Theme Switcher --}}
            <div class="flex">
                <span class="font-bold">Mode:&nbsp;</span>
                <button x-button @click="changeThemeMode()">
                    {{-- Moon icon --}}
                    <svg class="hidden w-4 h-4 dark:block p-0.5" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"></path>
                    </svg>
                    {{-- Sun icon --}}
                    <svg class="w-4 h-4 dark:hidden" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M14.828 14.828a4 4 0 1 0 -5.656 -5.656a4 4 0 0 0 5.656 5.656z"></path>
                        <path d="M6.343 17.657l-1.414 1.414"></path>
                        <path d="M6.343 6.343l-1.414 -1.414"></path>
                        <path d="M17.657 6.343l1.414 -1.414"></path>
                        <path d="M17.657 17.657l1.414 1.414"></path>
                        <path d="M4 12h-2"></path>
                        <path d="M12 4v-2"></path>
                        <path d="M20 12h2"></path>
                        <path d="M12 20v2"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    @endenv

    {{-- <div id="nprogress">
        <div class="bar" role="bar" style="transform: translate3d(-60.5008%, 0px, 0px); transition: all 200ms ease 0s;">
            <div class="peg"></div>
        </div>
        <div class="spinner" role="spinner">
            <div class="spinner-icon"></div>
        </div>
    </div> --}}

    <!-- Livewire Script Config -->
    @livewireScriptConfig

    <!-- Custom Scripts -->
    @stack('scripts')

</body>

</html>
