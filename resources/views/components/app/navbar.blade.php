
<div class="h-15">
      <flux:header container class="bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700 flex items-center fixed w-full">
        <flux:sidebar.toggle class="md:hidden" icon="bars-2" inset="left" />
        <flux:brand href="#" logo="{{ asset('images/logo.jpg') }}" name="Literacy" class=" " />
        <flux:spacer/>
        <flux:navbar class="me-4  min-md:flex gap-3">
            <flux:navbar.item icon="home" href="/" wire:navigate  class="max-md:hidden"/>
            <flux:navbar.item icon="bookmark" href="/saved"  wire:navigate  class="max-md:hidden"/>
            <flux:input icon="magnifying-glass" size="sm" placeholder="Search orders" class="max-md:hidden"/>
            <flux:button icon:trailing="pencil-square" size="sm" variant="primary" color="emerald" class="max-md:hidden">Tulis</flux:button>
        </flux:navbar>
        <flux:separator vertical class="mx-3 hidden md:inline"/>
        <div class="flex gap-3 items-center">
            <flux:button x-data x-on:click="$flux.dark = ! $flux.dark" variant="subtle" icon:trailing="moon" size="sm"></flux:button>                

            <flux:button href="/login" wire:navigate color="emerald" variant="primary">Login</flux:button>

            {{-- <flux:dropdown position="top" align="start">
                <flux:profile avatar="https://fluxui.dev/img/demo/user.png" />
                <flux:menu>
                    <flux:menu.item icon="user">Profil</flux:menu.item>
                    <flux:menu.separator />
                    <flux:menu.item  icon="arrow-right-start-on-rectangle" variant="danger">Keluar</flux:menu.item>
                </flux:menu>
            </flux:dropdown> --}}
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
            <flux:button icon:trailing="pencil-square" size="sm" variant="primary" color="emerald" class="">Tulis</flux:button>
            <flux:sidebar.item icon="home" href="/" current>Beranda</flux:sidebar.item>
            <flux:sidebar.item icon="bookmark" href="/saved" >Disimpan</flux:sidebar.item>
        </flux:sidebar.nav>
        <flux:sidebar.spacer />
        <flux:sidebar.nav>
            <flux:sidebar.item icon="information-circle" href="#">Tentang Aplikasi</flux:sidebar.item>
        </flux:sidebar.nav>
    </flux:sidebar>

</div>