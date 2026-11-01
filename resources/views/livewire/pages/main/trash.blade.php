<div class="flex justify-center mt-3">
    <div class="max-w-3xl w-full">
        <flux:button variant="ghost" size="sm" icon="arrow-left" onclick="window.history.back()"  wire:navigate ></flux:button>
        @foreach ($this->getAllTrashed as $article )
            <div class="my-12" >
                <div >
                    <div class="flex justify-end gap-5">
                        <div>
                            <flux:modal.trigger name="deletePermanent">
                                <flux:button  variant="ghost" size="sm" color="red">Hapus Permanen</flux:button>
                            </flux:modal.trigger>
                            <flux:modal name="deletePermanent" class="min-w-[22rem]">
                                <div class="space-y-6">
                                    <div>
                                        <flux:heading size="lg">Hapus Permanen ?</flux:heading>
                                        <flux:text class="mt-2">
                                            Artikel ini tidak bisa dipulihkan jika kamu menghapusnya secara permanan
                                        </flux:text>
                                    </div>
                                    <div class="flex gap-2">
                                        <flux:spacer />
                                        <flux:modal.close>
                                            <flux:button variant="ghost">Cancel</flux:button>
                                        </flux:modal.close>
                                        <flux:button  x-on:click="$flux.modal('deletePermanent').close()" variant="danger" wire:click="permanentDelete({{ $article->id }})">Hapus Permanen</flux:button>
                                    </div>
                                </div>
                            </flux:modal>
                        </div>
                        <flux:button wire:click="restore({{ $article->id }})" variant="ghost" size="sm" color="green">Pulihkan</flux:button>
                    </div>
                    <x-app.card :article="$article" :trash="true"/>
                </div>
            </div>
        @endforeach
    </div>
    
</div>
