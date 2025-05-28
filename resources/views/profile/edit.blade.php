@extends('layouts.app')

@section('header')
    <h2>Modifier mon profil</h2>
@endsection

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white shadow rounded">
    @if(session('status'))
        <div class="mb-4 text-green-600">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        {{-- Name --}}
        <div>
            <label for="name">Nom</label>
            <input id="name" name="name" value="{{ old('name', $user->name) }}" required>
            @error('name')<span>{{ $message }}</span>@enderror
        </div>

        {{-- Bio --}}
        <div>
            <label for="bio">Bio</label>
            <textarea id="bio" name="bio">{{ old('bio', $user->bio) }}</textarea>
            @error('bio')<span>{{ $message }}</span>@enderror
        </div>

        {{-- Avatar --}}
        <div>
            <label for="avatar">Avatar</label>
            <input id="avatar" type="file" name="avatar">
            @if($user->avatar_url)
                <img src="{{ $user->avatar_url }}" alt="Avatar" class="h-16 w-16 rounded-full mt-2">
            @endif
            @error('avatar')<span>{{ $message }}</span>@enderror
        </div>

        {{-- Password --}}
        <div>
            <label for="password">Nouveau mot de passe</label>
            <input id="password" type="password" name="password">
            @error('password')<span>{{ $message }}</span>@enderror
        </div>
        <div>
            <label for="password_confirmation">Confirmer mot de passe</label>
            <input id="password_confirmation" type="password" name="password_confirmation">
        </div>

        <button type="submit">Enregistrer</button>
    </form>
</div>
@endsection
