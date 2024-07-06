<h4> Go wild ! </h4>
<div class="row">
    <form action="{{ route('ideas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <textarea class="form-control" id="content" rows="3" name="content"></textarea>
            <label for="image" class="form-label">Image URL</label>
            <input type="file" class="form-control" id="image" name="image" placeholder="Enter image URL">
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
</div>
