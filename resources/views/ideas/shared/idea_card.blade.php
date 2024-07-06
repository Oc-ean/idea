<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle" src="{{ $idea->user->getImageUrl() }}"
                    alt="Mario Avatar">
                <div>
                    <h5 class="card-title mb-0"><a href="{{ route('users.show', $idea->user->id) }}">
                            {{ $idea->user->name }}
                        </a></h5>
                </div>
            </div>
            <div>
                <form action={{ route('ideas.destroy', $idea->id) }} method="POST">
                    @csrf
                    @method('delete')
                    {{-- <a href="{{ route('ideas.edit', $idea->id) }}" class="btn btn-sm mr-1"
                        data-bs-target="#createIdeaModal" id="edit">Edit</a> --}}
                    <a href="{{ route('ideas.show', $idea->id) }}" class="btn btn-sm mr-1">View</a>
                    @if (auth()->id() === $idea->user_id)
                        <button class="btn btn-danger btn-sm">Delete</button>
                    @endif

                </form>
                {{-- <button class="btn btn-sm">view</button> --}}

            </div>

        </div>
    </div>

    <div class="card-body">
        @if ($idea->image)
            <img src="{{ asset('storage/' . $idea->image) }}" alt="Idea Image" style="max-width: 100%; height: 200px; "
                onclick="showLargeImage('{{ asset('storage/' . $idea->image) }}')">
        @endif
        @if ($editing ?? false)
            <form action="{{ route('ideas.update', $idea->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea class="form-control" id="idea" rows="3" name="idea">{{ $idea->content }}</textarea>
                    <label for="image" class="form-label mt-1">Add image</label>
                    <input type="file" class="form-control" id="image" name="image"
                        placeholder="Enter image URL">
                    @error('content')
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
        @else
            <p class="fs-6 fw-light text-muted mt-1">
                {{ $idea->content }}
            </p>
        @endif
        <div class="d-flex justify-content-between">
            @include('ideas.shared.like_button')
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $idea->created_at->diffForHumans() }} </span>
            </div>
        </div>
        @include('shared.comment_box')
    </div>
</div>
<script>
    function showLargeImage(imageUrl) {
        const largeImage = document.createElement('img');
        largeImage.src = imageUrl;
        largeImage.style.maxWidth = '80%';
        largeImage.style.maxHeight = '80%';
        // largeImage.style.width = '50%';

        const container = document.createElement('div');
        container.style.position = 'fixed';
        container.style.top = 0;
        container.style.left = 0;
        container.style.width = '100vw';
        container.style.height = '100vh';
        container.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
        container.style.display = 'flex';
        container.style.justifyContent = 'center';
        container.style.alignItems = 'center';
        container.onclick = function() {
            container.remove();
        };

        container.appendChild(largeImage);

        document.body.appendChild(container);
    }
</script>
{{-- <script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('#edit').click(function(e) {
            e.preventDefault(); // Prevent default link behavior
            $('#createIdeaModal').modal('show');
        });
    }); --}}
</script>


{{-- <form action="{{ route('ideas.update', $idea->id) }}" method="POST">
    @csrf
    @method('put')
    <div class="mb-3">
        <textarea class="form-control" id="idea" rows="3" name="idea">{{ $idea->content }}</textarea>
        <label for="image" class="form-label mt-1">Add image</label>
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
</form> --}}
