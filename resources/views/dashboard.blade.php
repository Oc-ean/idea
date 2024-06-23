@extends('layouts.layout')

@section('dashboard-content')
    <div class="row">
        <div class="col-3">
            @include('shared.side_bar')
        </div>
        <div class="col-6">
            @include('shared.success_message')
            @include('shared.create_dialog')
            <hr>
            @if (count($ideas) > 0)
                @foreach ($ideas as $idea)
                    <div class="mt-3">
                        @include('shared.idea_card')
                    </div>
                @endforeach
            @else
                <p class="text-center">No Result found</p>
            @endif
            <div class= "mt-3"></div>
            {{ $ideas->withQueryString()->links() }}
        </div>
        <div class="col-3">

            @include('shared.search_bar')
            @include('shared.follow_box')
        </div>
    </div>
@endsection


{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>

                <div class="card-body"></div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
