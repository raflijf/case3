<article class="max-w-3xl  mx-auto px-5 mt-5">
    <div class="flex flex-col gap-3 ">
        <div class="flex justify-between items-center">
            <flux:button variant="ghost" size="sm" icon="arrow-left" onclick="window.history.back()"  wire:navigate ></flux:button>
            <div class="flex gap-5">
                @if (me()->id == $this->read->user->id)
                    <div>
                        <flux:modal.trigger name="delete-profile">
                            <flux:button size="sm" variant="ghost" color="red" icon="trash">Hapus</flux:button>
                        </flux:modal.trigger>
                        <flux:modal name="delete-profile" class="min-w-[22rem]">
                            <div class="space-y-6">
                                <div>
                                    <flux:heading size="lg">Hapus Artikel ini?</flux:heading>
                                </div>
                                <div class="flex gap-2">
                                    <flux:spacer />
                                    <flux:modal.close>
                                        <flux:button variant="ghost">Batal</flux:button>
                                    </flux:modal.close>
                                    <flux:button wire:click="delete('{{ $this->read->slug }}')"  variant="danger">Hapus</flux:button>
                                </div>
                            </div>
                        </flux:modal>
                    </div>
                    <flux:button size="sm" href="/update/{{ $this->read->slug }}" wire:navigate variant="ghost" color="emerald" icon="pencil" >Edit</flux:button>
                @endif
            </div>
        </div>
        <h1 class=" text-xl sm:text-3xl lg:text-4xl font-bold">{{ $this->read->title }}</h1>
        <h2 class="text-lg sm:text-xl lg:text-xl font-normal opacity-75">{{ $this->read->subtitle }}</h2>
        <div class="mt-5 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <flux:avatar name="{{ $this->read->user->username }}" size="sm" />
                <div class="">{{ $this->read->user->username }}</div>
            </div>
            <div class="opacity-70 text-sm">{{ $this->read->created_at->format('d M Y') }}</div>
        </div>
    </div>
    <flux:separator text="Selemat Membaca"  class="my-7"/>
    <div class="flex justify-center"> 
        <img  class="w-sm md:w-md lg:w-xl" src="{{ $this->read->img }}" alt="" class="src">
        {{-- <img class="w-xs sm:w-lg lg:w-xl" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQSvlpZDU1Xhtt4O6J3t9dVtRCI8gOF9oyvAKjByYeJ0u93eacVwmpLJ4kC&s=10" alt="" class="src"> --}}
    </div>
    <div class="text-md sm:text-lg mt-7">
        {!! \Illuminate\Support\Str::markdown($this->read->content) !!}   
    </div>
    <flux:separator text="Selesai" class="my-10"/>


</article>
