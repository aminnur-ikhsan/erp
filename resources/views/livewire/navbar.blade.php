<nav class="navbar navbar-dark bg-primary">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-default text-light" type="button" wire:click="toggleSidebar" title="Menu">
                <i class="fas fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ url('/beranda') }}">
                LOGO APP
            </a>
        </div>
        <a href="{{ url('/logout') }}" type="submit" class="btn btn-link text-light" title="Keluar">
            <i class="fas fa-sign-out-alt"></i>
        </a>
    </div>
</nav>
