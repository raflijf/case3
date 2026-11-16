<div class="w-[85%] sm:w-[60%] ">
    @if ($this->hasSend)
        <div class="w-full">
            <div class="flex flex-col gap-4">
                <div class="flex justify-center">
                    <flux:icon.check-circle class="size-17 text-green-500" />
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-center">Periksa Email Kamu</h1>
                    <p class="text-sm text-center ">Permintaan Anda telah kami terima. Silakan periksa email untuk mendapatkan tautan reset password dan ikuti petunjuk yang diberikan. Jika pesan belum muncul, periksa juga folder spam.</p>
                </div>
            </div>
        </div>
    @else 
        <div class="flex flex-col gap-5 w-full">
            <div>
                <h1 class="text-2xl font-bold text-center">Lupa Password</h1>
                <p class="text-zinc-500 text-center">Pastikan Email yang dimasukkan terdaftar</p>
            </div>
            <form action="" class=" flex flex-col gap-3" wire:submit="send">
                <flux:input label="Email" placeholder="Masukkan Email" wire:model="email" />
                <div class="flex justify-end">
                    <flux:button type="submit" variant="primary" color="emerald" class="w-fit">Kirim Link Reset</flux:button>
                </div>
            </form>
        </div>
    @endif
</div>
