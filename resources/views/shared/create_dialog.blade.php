<!-- Button to trigger modal -->
@auth()
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createIdeaModal">
        Share Your Ideas
    </button>
@endauth
@guest()
    <h4>{{ __('ideas.login_to_share') }}</h4>
@endguest

<!-- Modal -->
<div class="modal fade" id="createIdeaModal" tabindex="-1" role="dialog" aria-labelledby="createIdeaModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                @include('ideas.shared.submit_idea')

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Bootstrap JavaScript -->
