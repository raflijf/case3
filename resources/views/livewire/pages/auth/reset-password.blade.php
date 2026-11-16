<div class="w-[85%] sm:w-[60%]">
    @if ($this->validToken)
        <form action="" class="w-full flex flex-col gap-5 " wire:submit="resetPw"> 
            <flux:input type="password" label="Password Baru" wire:model="newPassword"   viewable  placeholder="••••••••••••"/>
            <flux:input type="password" label="Konfirmasi Password Baru" wire:model="confirmNewPassword"   viewable placeholder="••••••••••••"/>
            <div class="flex justify-end">
                <flux:button  variant="primary" color="emerald" class="w-fit" type="submit">Reset Password</flux:button>
            </div>
        </form>
    @else
        <div class="text-center">Invalid Reset Token</div>
    @endif
</div>
