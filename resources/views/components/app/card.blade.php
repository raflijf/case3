@props(['article', 'trash' => false])


<div class="md:w-[65%]  lg:w-full max-w-3xl ">
    <flux:card class="rounded-none border-x-0 border-t-0 bg-transparent p-0">
        <a  href="{{ $trash ? '' : 'article/'.$article->slug ;}}" wire:navigate class="flex flex-col gap-4 py-4 sm:flex-row sm:items-center sm:justify-between sm:gap-6">
            <div class="order-first w-full shrink-0 overflow-hidden sm:order-last sm:w-48 md:w-60  ">
                @if ($article->img)
                    <img
                        src="{{ $article->img }}"
                        alt="{{ $article->title }} }}"
                        loading="lazy"
                        class="aspect-video w-full object-cover rounded"
                    >
                @else 
                    <img class="aspect-video w-full h-full object-cover rounded " src="{{ asset('images/blank.png') }}"></img>
                @endif
            </div>

            <div class="flex min-w-0 flex-1 flex-col gap-3 mx-2">
                <div class="flex items-center gap-2">
                    <flux:avatar size="xs" :name="$article->user->username"/>
                    <p class="text-xs text-zinc-500">
                        {{ $article->user->username }} • <span>{{ $article->created_at->diffForHumans()  }}</span>
                    </p>
                </div>

                <div>
                    <flux:card.heading class="line-clamp-3 text-lg sm:text-xl">
                            {{ $article->title }}
                    </flux:card.heading>
                    <flux:card.subheading class="line-clamp-2 text-sm">
                            {{ $article->subtitle }}
                    </flux:card.subheading>
                </div>
            </div>
        </a>
    </flux:card>
</div>