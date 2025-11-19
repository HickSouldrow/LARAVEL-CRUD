<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white dark:bg-lime-900 text-lime-900 dark:text-lime-100">

    <!-- HEADER -->
    <flux:header 
        container 
        class="border-b border-lime-300/60 dark:border-lime-700/60 
               bg-lime-50/80 dark:bg-lime-900/80
               backdrop-blur-md shadow-sm">

        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <!-- Logo -->
        <a href="{{ route('dashboard') }}" 
           class="ms-2 me-5 flex items-center space-x-2 rtl:space-x-reverse lg:ms-0 transition-opacity hover:opacity-80"
           wire:navigate>
            <x-app-logo />
        </a>

        <!-- NAVBAR DESKTOP -->
        <flux:navbar class="-mb-px max-lg:hidden space-x-1">
            <flux:navbar.item 
                icon="layout-grid"
                :href="route('dashboard')"
                :current="request()->routeIs('dashboard')"
                class="hover:bg-lime-200/40 dark:hover:bg-lime-500 rounded-lg transition"
                wire:navigate>
                {{ __('Dashboard') }}
            </flux:navbar.item>

            <flux:navlist.item 
                icon="home" 
                :href="route('notes')" 
                :current="request()->routeIs('notes')"
                class="hover:bg-lime-200/40 dark:hover:bg-lime-700/40 rounded-lg transition"
                wire:navigate>
                {{ __('Notas') }}
            </flux:navlist.item>
        </flux:navbar>

        <flux:spacer />

        <!-- Ícones do lado direito -->
        <flux:navbar class="me-1.5 space-x-1 py-0!">

            <flux:tooltip content="Search" position="bottom">
                <flux:navbar.item 
                    class="!h-10 hover:bg-lime-200/40 dark:hover:bg-lime-700/40 rounded-lg transition [&>div>svg]:size-5" 
                    icon="magnifying-glass"
                />
            </flux:tooltip>

            <flux:tooltip content="Repository" position="bottom">
                <flux:navbar.item 
                    class="!h-10 max-lg:hidden hover:bg-lime-200/40 dark:hover:bg-lime-700/40 rounded-lg transition [&>div>svg]:size-5"
                    icon="folder-git-2"
                    href="https://github.com/laravel/livewire-starter-kit"
                    target="_blank"
                />
            </flux:tooltip>

            <flux:tooltip content="Documentation" position="bottom">
                <flux:navbar.item 
                    class="!h-10 max-lg:hidden hover:bg-lime-200/40 dark:hover:bg-lime-700/40 rounded-lg transition [&>div>svg]:size-5"
                    icon="book-open-text"
                    href="https://laravel.com/docs/starter-kits#livewire"
                    target="_blank"
                />
            </flux:tooltip>
        </flux:navbar>

        <!-- MENU DO USUÁRIO -->
        <flux:dropdown position="top" align="end">
            <flux:profile 
                class="cursor-pointer hover:opacity-80 transition"
                :initials="auth()->user()->initials()"
            />

            <flux:menu class="rounded-xl overflow-hidden shadow-lg border border-lime-300/40 dark:border-lime-700/40 bg-white/90 dark:bg-lime-800/90 backdrop-blur-xl">

                <flux:menu.radio.group>
                    <div class="p-3 flex items-center gap-3 text-sm">
                        <div class="h-10 w-10 rounded-lg bg-lime-200 dark:bg-lime-700 grid place-items-center font-semibold">
                            {{ auth()->user()->initials() }}
                        </div>

                        <div class="flex flex-col">
                            <span class="font-semibold">{{ auth()->user()->name }}</span>
                            <span class="text-xs opacity-70">{{ auth()->user()->email }}</span>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.item 
                    :href="route('profile.edit')" 
                    icon="cog"
                    class="hover:bg-lime-200/50 dark:hover:bg-lime-700/50 transition"
                    wire:navigate>
                    {{ __('Settings') }}
                </flux:menu.item>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item 
                        as="button" 
                        type="submit" 
                        icon="arrow-right-start-on-rectangle" 
                        class="w-full hover:bg-red-500/20 dark:hover:bg-red-500/30 text-red-600 dark:text-red-400 font-semibold transition">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>

            </flux:menu>
        </flux:dropdown>
    </flux:header>

    <!-- SIDEBAR MOBILE -->
    <flux:sidebar 
        stashable 
        sticky 
        class="lg:hidden border-e border-lime-300/60 dark:border-lime-700/60 bg-lime-50/80 dark:bg-lime-900/80 backdrop-blur-md">

        <flux:sidebar.toggle icon="x-mark" />

        <a href="{{ route('dashboard') }}" 
           class="ms-1 flex items-center space-x-2 rtl:space-x-reverse hover:opacity-80 transition"
           wire:navigate>
            <x-app-logo />
        </a>

        <flux:navlist variant="outline" class="mt-4">
            <flux:navlist.group heading="Platform">

                <flux:navlist.item 
                    icon="layout-grid" 
                    :href="route('dashboard')" 
                    :current="request()->routeIs('dashboard')"
                    class="hover:bg-lime-500/40 dark:hover:bg-lime-500/40 transition rounded-lg"
                    wire:navigate>
                    {{ __('Dashboard') }}
                </flux:navlist.item>

                <flux:navlist.item 
                    icon="home" 
                    :href="route('notes')" 
                    :current="request()->routeIs('notes')"
                    class="hover:bg-lime-200/40 dark:hover:bg-lime-700/40 transition rounded-lg"
                    wire:navigate>
                    {{ __('Notas') }}
                </flux:navlist.item>

            </flux:navlist.group>
        </flux:navlist>

        <flux:spacer />

        <flux:navlist variant="outline">
            <flux:navlist.item icon="folder-git-2" target="_blank">
                {{ __('Repository') }}
            </flux:navlist.item>

            <flux:navlist.item icon="book-open-text" target="_blank">
                {{ __('Documentation') }}
            </flux:navlist.item>
        </flux:navlist>

    </flux:sidebar>

    {{ $slot }}

    @fluxScripts
</body>
</html>
