@extends('layouts/layout')
@section('tittle', $user->name)



@section('dashboard-content')
    <div class="row">
        <div class="col-3">
            @include('shared.side_bar')
        </div>
        <div class="col-6">
            @include('shared.success_message')
            <div class="mt-3">
                @include('shared.user_card')
            </div>
            <hr>
            <h6>All ideas</h6>
            @forelse ($ideas as $idea)
                <div class="mt-3">
                    @include('ideas.shared.idea_card')
                </div>
            @empty
                <p class="text-center mt-4">No results Found.</p>
            @endforelse
            <div class= "mt-3">
                {{ $ideas->withQueryString()->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('shared.search_bar')
            @include('shared.follow_box')
        </div>
    </div>
@endsection
