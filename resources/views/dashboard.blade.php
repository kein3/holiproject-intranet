@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="mb-4 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($apps as $app)
                        <a href="{{ route($app['route']) }}"
                           class="block p-4 border rounded hover:bg-gray-50">
                            {{ $app['name'] }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
