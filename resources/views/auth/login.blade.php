<x-app-layout :auth="false">
    <x-slot name="title">
        Login
    </x-slot>
    <x-slot name="subpage">
        Pages
    </x-slot>
    <x-slot name="sub_subpage">
        Login
    </x-slot>
    <x-form :action="route('login')" method="POST">
        <x-slot name="page">
            Login
        </x-slot>
        <x-text-input type="email" name="email" :value="old('email')" required class="py-[13px] px-5" placeholder="Your Email Address"/>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
        <x-text-input type="password" name="password" required class="py-[13px] px-5" placeholder="Your Password"/>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </x-form>
</x-app-layout>


