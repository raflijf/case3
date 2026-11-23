<div class="flex justify-center items-center mb-5 mt-2">
    @if ($this->hasSend)
         <div class="space-y-6 max-w-4xl lg:w-full w-[90%]">
            <flux:button icon="arrow-left" variant="ghost" size="sm" onclick="history.back()"/>

            <div class="flex flex-col items-center text-center py-12">
                <div class="rounded-full bg-emerald-100 dark:bg-emerald-500/10 p-5 mb-5">
                    <flux:icon.check class="size-12 text-emerald-600 dark:text-emerald-400"/>
                </div>

                <h1 class="text-2xl font-bold">Masukan Berhasil Dikirim!</h1>

                <p class="mt-3 text-zinc-600 dark:text-zinc-400 max-w-md">
                    Terima kasih telah meluangkan waktu untuk memberikan masukan.
                    Setiap kritik dan saran sangat berarti untuk meningkatkan kualitas Literacy.
                </p>
                <div class="flex flex-col sm:flex-row gap-3 mt-7">
                    <flux:button href="/" wire:navigate variant="primary" color="emerald">
                        Kembali ke Beranda
                    </flux:button>
                </div>
            </div>
        </div>
    @else 
        <form class="space-y-6 max-w-4xl lg:w-full w-[90%] " wire:submit="sendFeedback">
            <flux:button icon="arrow-left" variant="ghost" size="sm" onclick="history.back()"/>
            <div>
                <h1 class="text-center text-2xl font-bold">Berikan Masukan</h1>
                <p class="mt-2 text-center">Bantu kami meningkatkan kualitas Literacy dengan memberikan masukan.</p>
            </div>
                <flux:checkbox.group wire:model="reasons"  variant="cards" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
                    <flux:checkbox value="informasi-tidak-akurat" label="Informasi tidak akurat" />
                    <flux:checkbox value="fitur-berfungsi" label="Fitur tidak berfungsi" />
                    <flux:checkbox value="tampilan-kurang-menarik" label="Tampilan kurang menarik" />
                    <flux:checkbox value="performa-lambat" label="Performa lambat" />
                    <flux:checkbox value="pengalaman-pengguna-buruk" label="Pengalaman pengguna buruk" />
                    <flux:checkbox value="sering-terjadi-kesalahan" label="Sering terjadi kesalahan" />
                    <flux:checkbox value="fitur-sulit-digunakan" label="Fitur sulit digunakan" />
                    <flux:checkbox value="lainnya" label="Lainnya" />
                </flux:checkbox.group>
                <flux:input wire:model="email" label="Email (opsional)" description="Tambahkan email agar kami bisa membalas masukan anda" placeholder=""/>
                <flux:textarea resize="none" wire:model="suggestions" label="Kritik & saran" description="Berikan kritik dan saran untuk membantu kami meningkatkannya" placeholder=""/>
                <flux:error name="sending" />
            <div class="flex">
                <flux:spacer />
                <flux:button type="submit" variant="primary" color="emerald">Kirim Masukan</flux:button>
            </div>
        </form>
    @endif
</div>
