<div class="flex flex-col items-center gap-3 mb-4">
    <div class="min-h-[80vh]">
        @foreach ($this->getAll as $article)
              <x-app.card :article="$article"/>
        @endforeach
    </div>
    <div class="w-full flex justify-center">
        {{ $this->getAll->links() }}

    </div>
</div>
