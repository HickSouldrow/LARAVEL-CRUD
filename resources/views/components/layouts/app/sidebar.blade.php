<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white dark:bg-zinc-900 text-zinc-900 dark:text-zinc-100">

    <!-- SIDEBAR -->
    <flux:sidebar 
        sticky 
        stashable
        class="border-e border-zinc-200/50 dark:border-zinc-700/50 
               bg-zinc-50/80 dark:bg-zinc-900/80
               backdrop-blur-xl shadow-md">

        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <a href="{{ route('dashboard') }}" 
           class="me-5 flex items-center space-x-2 rtl:space-x-reverse 
                  px-2 py-3 hover:bg-lime-400/20 dark:hover:bg-lime-400/20
                  transition rounded-lg" 
           wire:navigate>
            <x-app-logo />
        </a>

        <!-- Menu Principal -->
        <flux:navlist variant="outline" class="mt-3">
            <flux:navlist.group :heading="__('Platform')" class="grid gap-1">

                <flux:navlist.item
                    icon="home"
                    :href="route('dashboard')"
                    :current="request()->routeIs('dashboard')"
                    class="rounded-lg hover:bg-lime-400/20 dark:hover:bg-lime-400/20 transition"
                    wire:navigate>
                    {{ __('Dashboard') }}
                </flux:navlist.item>

                <flux:navlist.item
                    icon="table-cells"
                    :href="route('messages')"
                    :current="request()->routeIs('messages')"
                    class="rounded-lg hover:bg-lime-400/20 dark:hover:bg-lime-400/20 transition"
                    wire:navigate>
                    {{ __('Recados') }}
                </flux:navlist.item>

            </flux:navlist.group>
        </flux:navlist>

        <flux:spacer />

        <!-- Rodapé da Sidebar -->
        <flux:navlist variant="outline" class="pb-3">
            <flux:navlist.item 
                icon="folder-git-2"
                href="https://github.com/laravel/livewire-starter-kit"
                target="_blank"
                class="rounded-lg hover:bg-lime-400/15 dark:hover:bg-lime-400/15 transition">
                {{ __('Repository') }}
            </flux:navlist.item>

            <flux:navlist.item 
                icon="book-open-text"
                href="https://laravel.com/docs/starter-kits#livewire"
                target="_blank"
                class="rounded-lg hover:bg-lime-400/15 dark:hover:bg-lime-400/15 transition">
                {{ __('Documentation') }}
            </flux:navlist.item>
        </flux:navlist>

        <!-- MENU DESKTOP DO USUÁRIO -->
        <flux:dropdown class="hidden lg:block px-2 py-3" position="bottom" align="start">
            
            <flux:profile
                :name="auth()->user()->name"
                :initials="auth()->user()->initials()"
                class="cursor-pointer hover:bg-lime-400/20 dark:hover:bg-lime-400/20 rounded-xl transition"
                icon:trailing="chevrons-up-down"
            />

            <flux:menu class="w-[230px] rounded-xl shadow-lg 
                           border border-lime-400/30 dark:border-lime-400/30
                           bg-white/90 dark:bg-zinc-800/90 backdrop-blur-xl">

                <flux:menu.radio.group>
                    <div class="p-3 text-sm">
                        <div class="flex items-center gap-2">
                            <div class="h-9 w-9 rounded-lg bg-lime-400 text-zinc-900 grid place-items-center font-semibold">
                                {{ auth()->user()->initials() }}
                            </div>

                            <div class="flex flex-col">
                                <span class="font-semibold">{{ auth()->user()->name }}</span>
                                <span class="text-xs opacity-70">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator class="border-lime-400/30" />

                <flux:menu.radio.group>
                    <flux:menu.item 
                        :href="route('profile.edit')" 
                        icon="cog" 
                        class="hover:bg-lime-400/20 dark:hover:bg-lime-400/20 transition"
                        wire:navigate>
                        {{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator class="border-lime-400/30" />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item 
                        as="button" 
                        type="submit" 
                        icon="arrow-right-start-on-rectangle" 
                        class="text-red-600 dark:text-red-400 font-semibold hover:bg-red-500/10 dark:hover:bg-red-500/20 transition">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:sidebar>

    <!-- HEADER MOBILE -->
    <flux:header class="lg:hidden bg-zinc-50 dark:bg-zinc-900 
                     border-b border-zinc-200/50 dark:border-zinc-700/50 
                     backdrop-blur-md shadow-sm">
        
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:spacer />

        <flux:dropdown position="top" align="end">
            <flux:profile
                :initials="auth()->user()->initials()"
                icon-trailing="chevron-down"
                class="hover:bg-lime-400/20 dark:hover:bg-lime-400/20 rounded-xl transition"
            />

            <flux:menu
                class="rounded-xl overflow-hidden shadow-lg 
                       border border-lime-400/30 dark:border-lime-400/30
                       bg-white/90 dark:bg-zinc-800/90 backdrop-blur-xl">

                <flux:menu.radio.group>
                    <div class="p-3">
                        <div class="flex items-center gap-3">
                            <div class="h-9 w-9 bg-lime-400 text-zinc-900 rounded-lg grid place-items-center">
                                {{ auth()->user()->initials() }}
                            </div>

                            <div>
                                <div class="font-semibold text-sm">{{ auth()->user()->name }}</div>
                                <div class="text-xs opacity-70">{{ auth()->user()->email }}</div>
                            </div>
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

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item 
                        as="button" 
                        type="submit" 
                        icon="arrow-right-start-on-rectangle" 
                        class="text-red-600 dark:text-red-400 font-semibold hover:bg-red-500/10 dark:hover:bg-red-500/20 transition">
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
