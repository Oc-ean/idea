<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="{{ Route::is('dashboard') ? 'text-white bg-primary rounded' : '' }} nav-link"
                    href="{{ route('dashboard') }}">
                    <span>Home</span></a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::is('feed') ? 'text-white bg-primary rounded' : '' }} nav-link"
                    href="{{ route('feed') }}">
                    <span>Feeds</span></a>
            </li>

            <li class="nav-item">
                <a class="{{ Request::is('terms') ? 'text-white bg-primary rounded' : '' }} nav-link" href="/terms">
                    <span>Terms</span></a>
            </li>
        </ul>
    </div>
    @auth()
        <div class="card-footer text-center py-2">
            <a class="btn btn-link btn-sm {{ Route::is('profile') ? 'text-white bg-primary rounded' : '' }}"
                href="/profile">View Profile </a>
        </div>
    @endauth()
</div>
