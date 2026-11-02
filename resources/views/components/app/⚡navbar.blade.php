<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div class="h-15">
      <flux:header container class="bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700 flex items-center fixed w-full">
        <flux:sidebar.toggle class="md:hidden" icon="bars-2" inset="left" />
        <flux:brand href="#" logo="{{ asset('images/logo.jpg') }}" name="Literacy" class=" " />
        <flux:spacer/>
        <flux:navbar class="me-4  min-md:flex gap-3">
            <flux:navbar.item icon="home" href="{{ route('home', request()->only('page'))  }}" wire:navigate  class="max-md:hidden"/>
            <flux:button icon:trailing="pencil-square" size="sm" variant="primary" color="emerald" class="max-md:hidden" href="{{ me()->isAuthenticated ? '/create' : '/login' }}" wire:navigate >Tulis</flux:button>
        </flux:navbar>
        <flux:separator vertical class="mx-3 hidden md:inline"/>
        <div class="flex gap-3 items-center">
            <flux:button x-data x-on:click="$flux.dark = ! $flux.dark" variant="subtle" icon:trailing="moon" size="sm"></flux:button>                
            
            @if (me()->isAuthenticated)
                <a wire:navigate  href="/profile" >
                    <flux:avatar size="sm" color="emerald" :name=" me()->name ? me()->name : me()->username "  />
                </a>
            @else 
                <flux:button href="/login" size="sm" wire:navigate color="emerald" >Login</flux:button>
            @endif 
        </div>
    </flux:header>
    
    <flux:sidebar sticky collapsible="mobile" class="lg:hidden bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
        <flux:sidebar.header>
            <flux:sidebar.brand
                href="#"
                logo="{{ asset('images/logo.jpg') }}"
                name="Literacy"
            />
            <flux:sidebar.collapse class="in-data-flux-sidebar-on-desktop:not-in-data-flux-sidebar-collapsed-desktop:-mr-2" />
        </flux:sidebar.header>
        <flux:sidebar.nav class="flex flex-col gap-3">
            <flux:button icon:trailing="pencil-square" size="sm" variant="primary" color="emerald" class="" href='/create' wire:navigate >Tulis</flux:button>
            <flux:sidebar.item icon="home" href="/" current wire:navigate>Beranda</flux:sidebar.item>
        </flux:sidebar.nav>
        <flux:sidebar.spacer />
        <flux:sidebar.nav>
            <flux:sidebar.item icon="information-circle" href="#">Tentang Aplikasi</flux:sidebar.item>
        </flux:sidebar.nav>
    </flux:sidebar>
</div>