<div class="py-2 px-2">
    <form class="flex flex-col gap-7" wire:submit="publishArticle">
        <div class="flex justify-between items-center ">
            <flux:button variant="ghost" size="sm" icon="arrow-left" onclick="window.history.back()"  wire:navigate ></flux:button>
            <flux:button variant="primary" color="" type="submit" >Publikasi</flux:button>
        </div>
        <div x-data="{
                preview: null,
                displayImage(event) {
                    const file = event.target.files[0];

                    if (!file) return;

                    if (this.preview) {
                        URL.revokeObjectURL(this.preview);
                    }

                    this.preview = URL.createObjectURL(file);
                },
                clear() {
                    this.preview = null;
                    $wire.set('img', null);
                }
                
            }"
        >
            <div class="w-fit flex flex-col gap-3">
                <label for="img" class="cursor-pointer">
                    <div class="w-60 h-30  md:w-80 md:h-50   dark:bg-[#18181b]  grid place-items-center rounded-md overflow-hidden">

                        <template x-if="!preview">
                            <div class="flex flex-col items-center text-zinc-400">
                                <flux:icon.photo class="size-15"/>
                                <span class="text-center">Tambahkan gambar <br> Jpg, jpeg, Png, Webp</span>
                            </div>
                        </template>

                        <template x-if="preview">
                            <img :src="preview" class="w-full h-full object-cover" alt="Preview gambar">
                        </template>
                    </div>
                </label>
                <template x-if="preview">
                    <flux:button  x-on:click="clear()" icon="x-mark" size="sm" variant="ghost">Hapus gambar</flux:button>
                </template>

                <input wire:model="img" type="file" id="img" accept="image/jpeg,image/png" accept="image/*" class="hidden" @change="displayImage($event)">
            </div>
        </div>
        <div>
            <flux:textarea  wire:model="title" rows="auto" maxlength="50" class="!border-none  !bg-transparent !resize-none focus:!outline-none !text-2xl sm:!text-3xl !font-extrabold" placeholder="Judul Artikel"/></div>
        <div>
            <flux:textarea wire:model="subtitle" rows="auto" maxlength="150" class="!border-none !bg-transparent !resize-none focus:!outline-none !text-lg sm:!text-xl !font-medium" placeholder="Subjudul"/></div>
        <div>
            <flux:textarea wire:model="content" rows="auto" class="!border-none !bg-transparent !resize-none focus:!outline-none !text-sm sm:!text-md md:!text-base" placeholder="Konten"/>
        </div>
    </form>


</div>