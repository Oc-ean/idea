@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    {{-- to dismiss the alert --}}
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('.alert').alert('close');
            }, 1000);
        });
    </script>
    <script>
        setTimeout(function() {
            document.querySelector('.alert').classList.add('d-none');
        }, 1000);
    </script>
@endif
