<x-app-layout :auth="false">
    <x-slot name="title">
        Signup
    </x-slot>
    <x-slot name="subpage">
        Pages
    </x-slot>
    <x-slot name="sub_subpage">
        Signup
    </x-slot>
    <x-form :action="route('register')" method="POST">
        <x-slot name="page">
            Signup
        </x-slot>
        <x-text-input type="text" class="py-[13px] px-5" name="name" :value="old('name')" required placeholder="Your Full Name"/>
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
        <x-text-input type="email" class="py-[13px] px-5" name="email" :value="old('email')" required placeholder="Your Email Address"/>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
        <x-text-input type="password" class="py-[13px] px-5" name="password" required placeholder="Set Your Password"/>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </x-form>
</x-app-layout>

