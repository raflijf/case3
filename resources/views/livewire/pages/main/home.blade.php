<div>
    <div class="mx-2">
        <p class="text-xl font-semibold mb-5 mt-2">Today's Quotes</p>
        <p class="text-center my-5 font-light text-sm">"{{ $quotes['words'] }}" <br/> -- {{ $quotes['by']}} -- </p>
    </div>
    <flux:separator class="my-5"/>
    <livewire:article-list/>
</div>