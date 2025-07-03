<nav class="navbar navbar-expand-lg shadow-sm" style="background: linear-gradient(90deg, #0b3c91, #1976d2);">
    <div class="container">
        <a class="navbar-brand text-white fw-bold" href="{{ url('/') }}">IklanApp</a>
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/tim-pemasaran') }}">Tim Pemasaran</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/platform') }}">Platform</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/biaya-pemasaran') }}">Biaya Pemasaran</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/iklan') }}">Iklan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/performa') }}">Performa</a>
                </li>
                @auth
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link text-white px-0"
                                style="text-decoration: none;">Logout</button>
                    </form>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
