<x-guest-layout>
    @if(session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif
 ovxwby-codex/créer-formulaire-dans-l-application


 main
    <form method="POST" action="{{ route('contact.store') }}" class="space-y-4">
        @csrf
        <div>
            <label class="block font-medium text-sm text-gray-700" for="name">Nom</label>
            <input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus />
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700" for="email">Email</label>
            <input id="email" name="email" type="email" class="mt-1 block w-full" required />
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700" for="message">Message</label>
            <textarea id="message" name="message" class="mt-1 block w-full" rows="4" required></textarea>
        </div>
        <div class="flex items-center justify-end">
            <button type="submit" class="ms-4 px-4 py-2 bg-blue-600 text-white rounded-md">Envoyer</button>
        </div>
    </form>
</x-guest-layout>
ovxwby-codex/créer-formulaire-dans-l-application

@extends('layouts.guest')

@section('content')
<div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0 bg-gray-100">
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        @if(session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('contact.store') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block font-medium text-sm text-gray-700" for="name">Nom</label>
                <input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus />
            </div>
            <div>
                <label class="block font-medium text-sm text-gray-700" for="email">Email</label>
                <input id="email" name="email" type="email" class="mt-1 block w-full" required />
            </div>
            <div>
                <label class="block font-medium text-sm text-gray-700" for="message">Message</label>
                <textarea id="message" name="message" class="mt-1 block w-full" rows="4" required></textarea>
            </div>
            <div class="flex items-center justify-end">
                <button type="submit" class="ms-4 px-4 py-2 bg-blue-600 text-white rounded-md">Envoyer</button>
            </div>
        </form>
    </div>
</div>
@endsection

 main
