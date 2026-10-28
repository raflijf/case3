<div class=" w-[70%]  md:w-[60%]">
    <h1 class="text-center text-3xl text-emerald-500 font-bold mb-5 ">Register</h1>
    <form class="flex flex-col gap-5"  wire:submit="register"    >  
        <flux:field>
            <flux:label>Username:</flux:label>
            <flux:input  wire:model="username" icon="user" placeholder="Masukkan Username"/>
            <flux:error name="username" />
        </flux:field>
        <flux:field>
            <flux:label>Buat Password:</flux:label>
            <flux:input wire:model="makePassword"  icon="key" type="Password" placeholder="••••••••••"   x-bind:type="showPassword ? 'text' : 'password'" />
            <flux:error name="makePassword" />
        </flux:field>
        <flux:field>
            <flux:label>Konfirmasi Password:</flux:label>
            <flux:input wire:model="confirmPassword" icon="key" type="Password"   placeholder="••••••••••"/>
            <flux:error name="confirmPassword" />
        </flux:field>
        {{-- <flux:checkbox label="Tampilkan Password" x-model="showPassword" /> --}}
        <div class="flex justify-end">
            <flux:button  color="emerald" variant="primary" type="submit">Register</flux:button>
        </div>
    </form>
    <div class="flex justify-center text-sm mt-5">
        <p class="opacity-80">Sudah punya akun ? <a href="/login" wire:navigate  class="text-blue-600" >Login</a></p>
    </div>
</div>
