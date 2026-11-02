[1mdiff --git a/resources/views/components/app/card.blade.php b/resources/views/components/app/card.blade.php[m
[1mindex 45f7162..21ed71b 100644[m
[1m--- a/resources/views/components/app/card.blade.php[m
[1m+++ b/resources/views/components/app/card.blade.php[m
[36m@@ -4,14 +4,16 @@[m
 <div class="md:w-[65%]  lg:w-full max-w-3xl ">[m
     <flux:card class="rounded-none border-x-0 border-t-0 bg-transparent p-0">[m
         <a  href="{{ $trash ? '' : 'article/'.$article->slug ;}}" wire:navigate class="flex flex-col gap-4 py-4 sm:flex-row sm:items-center sm:justify-between sm:gap-6">[m
[31m-            <div class="order-first w-full shrink-0 overflow-hidden sm:order-last sm:w-48 md:w-60   ">[m
[32m+[m[32m            <div class="order-first w-full shrink-0 overflow-hidden sm:order-last sm:w-48 md:w-60  ">[m
                 @if ($article->img)[m
                     <img[m
                         src="{{ $article->img }}"[m
                         alt="{{ $article->title }} }}"[m
                         loading="lazy"[m
[31m-                        class="aspect-video w-full object-cover"[m
[32m+[m[32m                        class="aspect-video w-full object-cover rounded"[m
                     >[m
[32m+[m[32m                @else[m[41m [m
[32m+[m[32m                    <img class="aspect-video w-full h-full object-cover rounded " src="{{ asset('images/blank.png') }}"></img>[m
                 @endif[m
             </div>[m
 [m
[1mdiff --git a/resources/views/livewire/pages/main/profile.blade.php b/resources/views/livewire/pages/main/profile.blade.php[m
[1mindex 9a9eeac..827bc2b 100644[m
[1m--- a/resources/views/livewire/pages/main/profile.blade.php[m
[1m+++ b/resources/views/livewire/pages/main/profile.blade.php[m
[36m@@ -35,7 +35,7 @@[m [mclass="!size-20 shrink-0 sm:!size-24"[m
             </div>[m
 [m
             <div>[m
[31m-                {{-- <flux:button variant="outline" icon="pencil-square" class="w-full sm:w-auto">Edit Profile</flux:button> --}}[m
[32m+[m[32m                <flux:button size="sm" variant="outline" icon="pencil-square" class="w-full sm:w-auto">Edit Profile</flux:button>[m
             </div>[m
       [m
         </section>[m
