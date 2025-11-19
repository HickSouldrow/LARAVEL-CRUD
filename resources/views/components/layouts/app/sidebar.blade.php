<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100">

    <!-- SIDEBAR -->
    <flux:sidebar 
        sticky 
        stashable
        class="
            border-e border-lime-400/20 
            bg-zinc-100/70 dark:bg-zinc-900/70 
            backdrop-blur-xl shadow-lg
            dark:shadow-[0_0_20px_-4px_rgba(163,230,53,0.25)]
        ">

        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <a href="{{ route('dashboard') }}" 
           class="me-5 flex items-center space-x-2 rtl:space-x-reverse 
                  px-3 py-3 rounded-lg 
                  hover:bg-lime-400/20 dark:hover:bg-lime-400/20
                  hover:border-lime-400/40 border border-transparent
                  transition shadow-sm" 
           wire:navigate>
            <x-app-logo />
        </a>

        <!-- Menu Principal -->
        <flux:navlist variant="outline" class="mt-4">
            <flux:navlist.group :heading="__('Platform')" class="grid gap-1">

                <flux:navlist.item
                    icon="home"
                    :href="route('dashboard')"
                    :current="request()->routeIs('dashboard')"
                    class="
                        rounded-lg transition
                        hover:bg-lime-400/20 dark:hover:bg-lime-400/20
                        data-[current]:bg-lime-400/25
                        data-[current]:text-lime-300
                    "
                    wire:navigate>
                    {{ __('Dashboard') }}
                </flux:navlist.item>

                <flux:navlist.item
                    icon="table-cells"
                    :href="route('messages')"
                    :current="request()->routeIs('messages')"
                    class="
                        rounded-lg transition 
                        hover:bg-lime-400/20 dark:hover:bg-lime-400/20
                        data-[current]:bg-lime-400/25
                        data-[current]:text-lime-300
                    "
                    wire:navigate>
                    {{ __('Recados') }}
                </flux:navlist.item>

            </flux:navlist.group>
        </flux:navlist>

        <flux:spacer />

        <!-- Rodapé da Sidebar -->
        <flux:navlist variant="outline" class="pb-4">
            <flux:navlist.item 
                icon="folder-git-2"
                href="https://github.com/HickSouldrow"
                target="_blank"
                class="
                    rounded-lg transition
                    hover:bg-lime-400/15
                    dark:hover:bg-lime-400/15
                ">
                {{ __('Repository') }}
            </flux:navlist.item>

            <flux:navlist.item 
                icon="book-open-text"
                href="https://laravel.com/docs/starter-kits#livewire"
                target="_blank"
                class="
                    rounded-lg transition
                    hover:bg-lime-400/15
                    dark:hover:bg-lime-400/15
                ">
                {{ __('Documentation') }}
            </flux:navlist.item>
        </flux:navlist>

        <!-- MENU DESKTOP DO USUÁRIO -->
        <flux:dropdown class="hidden lg:block px-2 py-4" position="bottom" align="start">
            
            <flux:profile
                :name="auth()->user()->name"
                :initials="auth()->user()->initials()"
                class="
                    cursor-pointer rounded-xl p-1
                    hover:bg-lime-400/20 dark:hover:bg-lime-400/20 
                    transition shadow-sm
                "
                icon:trailing="chevrons-up-down"
            />

            <flux:menu class="
                w-[230px] rounded-xl overflow-hidden 
                border border-lime-400/30 
                bg-white/90 dark:bg-zinc-900/90
                backdrop-blur-xl
                shadow-xl dark:shadow-[0_0_25px_-4px_rgba(163,230,53,0.25)]
            ">

                <flux:menu.radio.group>
                    <div class="p-4 text-sm flex items-center gap-3">
                        <div class="h-10 w-10 rounded-lg bg-lime-400 text-zinc-900 grid place-items-center font-semibold">
                            {{ auth()->user()->initials() }}
                        </div>

                        <div class="flex flex-col">
                            <span class="font-semibold">{{ auth()->user()->name }}</span>
                            <span class="text-xs opacity-70">{{ auth()->user()->email }}</span>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator class="border-lime-400/30" />

                <flux:menu.item 
                    :href="route('profile.edit')" 
                    icon="cog" 
                    class="hover:bg-lime-400/20 dark:hover:bg-lime-400/20 transition"
                    wire:navigate>
                    {{ __('Settings') }}
                </flux:menu.item>

                <flux:menu.separator class="border-lime-400/30" />

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <flux:menu.item 
                        as="button" 
                        type="submit" 
                        icon="arrow-right-start-on-rectangle"
                        class="
                            text-red-600 dark:text-red-400 
                            font-semibold
                            hover:bg-red-500/10 dark:hover:bg-red-500/20
                            transition
                        ">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>

            </flux:menu>
        </flux:dropdown>
    </flux:sidebar>

    <!-- HEADER MOBILE -->
    <flux:header class="
        lg:hidden 
        bg-zinc-100/70 dark:bg-zinc-900/70 
        border-b border-lime-400/20
        backdrop-blur-md shadow-md
    ">
        
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:spacer />

        <flux:dropdown position="top" align="end">
            <flux:profile
                :initials="auth()->user()->initials()"
                icon-trailing="chevron-down"
                class="
                    rounded-xl
                    hover:bg-lime-400/20 dark:hover:bg-lime-400/20
                    transition
                "
            />

            <flux:menu class="
                rounded-xl overflow-hidden shadow-xl
                border border-lime-400/30 
                bg-white/90 dark:bg-zinc-900/90
                backdrop-blur-xl
            ">

                <flux:menu.radio.group>
                    <div class="p-4 flex items-center gap-3">
                        <div class="h-10 w-10 bg-lime-400 text-zinc-900 rounded-lg grid place-items-center">
                            {{ auth()->user()->initials() }}
                        </div>

                        <div class="text-sm">
                            <div class="font-semibold">{{ auth()->user()->name }}</div>
                            <div class="text-xs opacity-70">{{ auth()->user()->email }}</div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator class="border-lime-400/30" />

                <flux:menu.item 
                    :href="route('profile.edit')" 
                    icon="cog" 
                    class="hover:bg-lime-400/20 dark:hover:bg-lime-400/20 transition"
                    wire:navigate>
                    {{ __('Settings') }}
                </flux:menu.item>

                <flux:menu.separator class="border-lime-400/30" />

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <flux:menu.item 
                        as="button" 
                        type="submit" 
                        icon="arrow-right-start-on-rectangle"
                        class="
                            text-red-600 dark:text-red-400 
                            font-semibold
                            hover:bg-red-500/10 dark:hover:bg-red-500/20
                        ">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>

            </flux:menu>
        </flux:dropdown>
    </flux:header>

    {{ $slot }}

    @fluxScripts
</body>
</html>
