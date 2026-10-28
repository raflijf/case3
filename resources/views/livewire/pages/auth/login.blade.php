<div class=" w-[70%]  md:w-[60%]">
    <h1 class="text-center text-3xl text-emerald-500 font-bold mb-5 ">Login</h1>
    <form class="flex flex-col gap-5">  
        <flux:field>
            <flux:label>Username:</flux:label>
            <flux:input icon="user" placeholder="Masukkan Username"/>
            <flux:error name="username" />
        </flux:field>
        <flux:field>
            <flux:label>Password:</flux:label>
            <flux:input icon="key" placeholder="" type="password" viewable  placeholder="••••••••••"/>
            <flux:error name="password" />
        </flux:field>
        <div class="flex justify-end">
            <div>

            </div>
            <flux:button color="emerald" variant="primary">Login</flux:button>
        </div>
    </form>
    <div class="flex justify-center text-sm mt-5">
        <p class="opacity-80">Belum punya akun ? <a href="/register" wire:navigate  class="text-blue-600" >Register</a></p>
    </div>
</div>
