@php
    $activeTab = request('tab', 'info');
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex flex-wrap gap-2 rounded-lg bg-white p-3 shadow sm:rounded-lg">
                <a href="{{ route('profile.edit', ['tab' => 'info']) }}"
                   class="rounded-md px-4 py-2 text-sm font-medium {{ $activeTab === 'info' ? 'bg-gray-900 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                    Informasi Profil
                </a>
                <a href="{{ route('keluarga.index') }}"
                   class="rounded-md px-4 py-2 text-sm font-medium {{ request()->routeIs('keluarga.*') ? 'bg-gray-900 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                    Keluarga
                </a>
                <a href="{{ route('profile.edit', ['tab' => 'keamanan']) }}"
                   class="rounded-md px-4 py-2 text-sm font-medium {{ $activeTab === 'keamanan' ? 'bg-gray-900 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                    Password & Akun
                </a>
            </div>

            @if ($activeTab === 'info')
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            @elseif ($activeTab === 'keamanan')
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
