<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <div class="grid auto-rows-min gap-4 md:grid-cols-3">

            <!-- Card 1 -->
            <div class="relative aspect-video overflow-hidden rounded-xl 
                        border border-lime-900/40 
                        bg-zinc-900/60 
                        dark:border-lime-900/60 
                        dark:bg-zinc-950/60 
                        shadow-[0_0_20px_-5px_rgba(0,0,0,0.5)] 
                        backdrop-blur-md transition">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-lime-900/20 dark:stroke-lime-600/20" />
            </div>

            <!-- Card 2 -->
            <div class="relative aspect-video overflow-hidden rounded-xl 
                        border border-lime-900/40 
                        bg-zinc-900/60 
                        dark:border-lime-900/60 
                        dark:bg-zinc-950/60 
                        shadow-[0_0_20px_-5px_rgba(0,0,0,0.5)] 
                        backdrop-blur-md transition">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-lime-900/20 dark:stroke-lime-600/20" />
            </div>

            <!-- Card 3 -->
            <div class="relative aspect-video overflow-hidden rounded-xl 
                        border border-lime-900/40 
                        bg-zinc-900/60 
                        dark:border-lime-900/60 
                        dark:bg-zinc-950/60 
                        shadow-[0_0_20px_-5px_rgba(0,0,0,0.5)] 
                        backdrop-blur-md transition">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-lime-900/20 dark:stroke-lime-600/20" />
            </div>

        </div>

        <!-- Card grande -->
        <div class="relative h-full flex-1 overflow-hidden rounded-xl 
                    border border-lime-900/40 
                    bg-zinc-900/60 
                    dark:border-lime-900/60 
                    dark:bg-zinc-950/60 
                    shadow-[0_0_25px_-5px_rgba(0,0,0,0.6)] 
                    backdrop-blur-md transition">
            <x-placeholder-pattern class="absolute inset-0 size-full stroke-lime-900/20 dark:stroke-lime-600/20" />
        </div>

    </div>
</x-layouts.app>
