<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">IklanApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ url('/tim-pemasaran') }}">Tim Pemasaran</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/platform') }}">Platform</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/biaya-pemasaran') }}">Biaya Pemasaran</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/iklan') }}">Iklan</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/performa') }}">Performa</a></li>
            </ul>
        </div>
    </div>
</nav>
