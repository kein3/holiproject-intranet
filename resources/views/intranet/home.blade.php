@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Intranet HoliProject') }}
    </h2>
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Bienvenue sur l’intranet</h3>
            <p>Cette page sera le point de départ de tous tes modules internes (actualités, documents, équipe, etc.).</p>
        </div>
    </div>
</div>
@endsection
