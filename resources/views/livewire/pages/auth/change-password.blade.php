<div class="w-[85%] sm:w-[60%]">
    <form action="" class="w-full flex flex-col gap-5 " wire:submit="change"> 
        <flux:input type="password" label="Password Lama" wire:model="oldPassword"  viewable placeholder="••••••••••••" />
        <flux:input type="password" label="Password Baru" wire:model="newPassword"   viewable  placeholder="••••••••••••"/>
        <flux:input type="password" label="Konfirmasi Password Baru" wire:model="confirmNewPassword"   viewable placeholder="••••••••••••"/>
        <div class="flex justify-between items-center">
            <flux:button  variant="ghost" size="sm" class="w-fit" href="/auth/password/forgot">Lupa Password?</flux:button>
            <flux:button  variant="primary" color="emerald" class="w-fit" type="submit">Ganti Password</flux:button>
        </div>
    </form>
</div>
