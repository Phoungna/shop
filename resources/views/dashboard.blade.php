<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            welcome to {{ Auth::user()->name }}

        </h2>
    </x-slot>

    <div class="py-12">
        This is home page
    </div>
</x-app-layout>
