<div class="flex flex-col  gap-3 mb-4">
    @for ($i = 1; $i <= $count; $i++) 
        <x-app.card/>
    @endfor
    <div class="">
        <flux:button class="w-full max-w-3xl text-emerald-500 px-3" wire:click="getOtherPost">Other</flux:button>
</div>