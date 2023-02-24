<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">To Do List</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>

            </ul>
            @if (auth()->check())
                <form class="d-flex" role="search">
                    <button class="btn btn-outline-danger" type="submit">Logout</button>
                </form>
            @else
                <form class="d-flex" role="search">
                    <button class="btn btn-outline-success" type="button"><a href="">Login</a></button>
                    <button class="btn btn-outline-secondary" type="button"><a href="">Register</a></button>
                </form>
            @endif
        </div>
    </div>
</nav>
