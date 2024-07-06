@extends('layouts/layout')
@section('tittle', 'Edit Profile')


@section('dashboard-content')
    <div class="row">
        <div class="col-3">
            @include('shared.side_bar')
        </div>
        <div class="col-6">
            @include('shared.success_message')
            <div class="mt-3">
                @include('shared.user_edit_card')
            </div>
            <h6 class="mt-2">All ideas</h6>
            @if (count($ideas) > 0)
                @foreach ($ideas as $idea)
                    <div class="mt-3">
                        @include('ideas.shared.idea_card')
                    </div>
                @endforeach
            @else
                <p class="text-center">No Result found</p>
            @endif
            <div class= "mt-3">
                {{ $ideas->withQueryString()->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('shared.search_bar')
            @include('shared.follow_box')
        </div>
    @endsection
