@extends('layouts.layout')

@section('dashboard-content')
    <div class="row">
        <div class="col-3">
            @include('shared.side_bar')
        </div>
        <div class="col-6">
            @include('shared.success_message')

            <div class="mt-3">
                @auth()
                    @if (auth()->id() === $idea->user_id)
                        <a type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createIdeaModal"
                            id="#edit">
                            Edit Idea
                        </a>
                    @endif
                @endauth
                <div class="modal fade" id="createIdeaModal" tabindex="-1" role="dialog"
                    aria-labelledby="createIdeaModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            </div>
                            <div class="modal-body">
                                <h4> Go wild ! </h4>
                                <div class="row">
                                    <form action="{{ route('ideas.update', $idea->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <textarea class="form-control" id="content" rows="3" name="content">{{ $idea->content }}</textarea>
                                            <label for="image" class="form-label">Image URL</label>
                                            <input type="file" class="form-control" id="image" name="image"
                                                placeholder="Enter image URL">
                                            @error('idea')
                                                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                            @enderror
                                            @error('image')
                                                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="">
                                            <button class="btn btn-dark" type="submit"> Share </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                @include('shared.idea_card')
            </div>

            <div class= "mt-3"></div>
        </div>
        <div class="col-3">
            @include('shared.search_bar')
            @include('shared.follow_box')
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<link href="https://bootswatch.com/5/sketchy/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>
