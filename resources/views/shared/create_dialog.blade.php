<!-- Button to trigger modal -->
@auth()
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createIdeaModal">
        Share Your Ideas
    </button>
@endauth
@guest()
    <h4> Sign In to Your Ideas</h4>
@endguest

<!-- Modal -->
<div class="modal fade" id="createIdeaModal" tabindex="-1" role="dialog" aria-labelledby="createIdeaModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                @include('shared.submit_idea')

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<link href="https://bootswatch.com/5/sketchy/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>
