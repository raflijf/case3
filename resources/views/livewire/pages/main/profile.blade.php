
<div class=" py-6 sm:px-6 sm:py-8">
    <div class="space-y-7">

        {{-- Profile Header --}}
    <div class="flex justify-between items-center ">
            <flux:button variant="ghost" size="sm" icon="arrow-left" onclick="window.history.back()"  wire:navigate ></flux:button>
            <livewire:logout/>
        </div>
        <section class=" px-6 flex flex-col gap-3 ">
            <div class="flex min-w-0 items-center gap-4 sm:gap-5">
                <flux:avatar
                    :name=" me()->name ? me()->name : me()->username "
                    size="xl"
                    color="emerald"
                    class="!size-20 shrink-0 sm:!size-24"
                />

                <div class="min-w-0 space-y-1">
                   
                    <h1 class="truncate text-xl font-semibold tracking-tight text-zinc-900 dark:text-white sm:text-2xl">
                        {{ me()->name ? me()->name : me()->username;}}
                    </h1>
                    @if (me()->name)
                        <p class="truncate text-sm text-zinc-500 dark:text-zinc-400">
                            {{ me()->username }}                            
                        </p>
                    @endif
                    @if (me()->email)
                        <p class="break-all text-sm text-zinc-500 dark:text-zinc-400">
                           {{ me()->email }}
                        </p>                        
                    @endif
                </div>
            </div>

            <div>
                <flux:modal.trigger name="edit-profile">
                    <flux:button size="sm" variant="outline" icon="pencil-square" class="w-full sm:w-auto">Edit Profile</flux:button>
                </flux:modal.trigger>
                <flux:modal name="edit-profile" class="md:w-96">
                    <div class="space-y-6">
                        <div>
                            <flux:heading size="lg">Edit profil</flux:heading>
                        </div>
                        <flux:input label="Username" placeholder="username" wire:model="username"/>
                        <flux:input label="Email" type="email" placeholder="pigai@example.com" wire:model="email"/>
                        <flux:input label="Nama" placeholder="Nama lengkap" wire:model="name"/>
                        <div class="flex">
                            <flux:button size="sm" variant="ghost"  >Reset Password</flux:button>
                            <flux:spacer />
                            <flux:button variant="primary" wire:click="update"  x-on:click="$flux.modal('confirm').close()">Simpan</flux:button>
                        </div>
                    </div>
                </flux:modal>
            </div>
      
        </section>

        {{-- Statistics --}}
        <section class="grid grid-cols-1 gap-3 sm:gap-4">
            <div class="rounded-xl border border-zinc-200 p-4 dark:border-zinc-800 sm:p-5">
                <p class="text-sm text-zinc-500 dark:text-zinc-400">
                    Total Artikel
                </p>

                <p class="mt-1 text-2xl font-semibold text-zinc-900 dark:text-white">
                    {{ $count }}
                </p>
            </div>
        </section>

        {{-- Articles --}}
        <section class="space-y-5 border-t border-zinc-200 pt-7 dark:border-zinc-800">
            <div class="flex  items-center justify-between gap-3">
                <div>
                    <h2 class="text-lg font-semibold text-zinc-900 dark:text-white sm:text-xl">
                        Artikel Saya
                    </h2>
                </div>
                <flux:button href="/trash"  size="sm" icon="trash" variant="ghost">Sampah</flux:button>
            </div>

            <div class="space-y-3">
                @foreach ($this->getMyArticles as $article)
                    <x-app.card :article="$article"/>
                @endforeach
            </div>
        </section>

    </div>
</div>
