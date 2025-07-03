<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
 <style>
    body {
        background: linear-gradient(135deg, #0d47a1 0%, #ffffff 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Roboto', sans-serif;
        color: #fff;
    }

    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.3);
        background: rgba(13, 71, 161, 0.9); /* transparan biru */
        backdrop-filter: blur(10px);
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-header {
        background: linear-gradient(90deg, #0d47a1 0%, #42a5f5 100%);
        border-bottom: none;
        padding: 20px;
        text-align: center;
    }

    .card-header h4 {
        font-weight: 700;
        color: #fff;
        font-family: 'Montserrat', sans-serif;
        letter-spacing: 1px;
        margin: 0;
        font-size: 24px;
    }

    .card-body {
        padding: 30px;
    }

    .form-control {
        border-radius: 50px;
        padding: 12px 20px;
        background-color: #1a237e;
        border: 1px solid #3949ab;
        color: #fff;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        background-color: #283593;
        border-color: #0d47a1;
        box-shadow: 0 0 0 0.25rem rgba(13, 71, 161, 0.25);
        color: #fff;
    }

    .form-label {
        color: #bbdefb;
        font-weight: 500;
        margin-bottom: 8px;
    }

    .btn-primary {
        background-color: #0d47a1;
        border: none;
        border-radius: 50px;
        padding: 12px;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
        text-transform: uppercase;
        font-size: 14px;
    }

    .btn-primary:hover {
        background-color: #1565c0;
        transform: scale(1.02);
    }

    .form-check-input {
        background-color: #1a237e;
        border: 1px solid #3949ab;
    }

    .form-check-input:checked {
        background-color: #0d47a1;
        border-color: #0d47a1;
    }

    .form-check-label {
        color: #bbdefb;
    }

    a {
        color: #0d47a1;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    a:hover {
        color: #1565c0;
        text-decoration: none;
    }

    .alert-danger {
        border-radius: 50px;
        background-color: rgba(220, 53, 69, 0.2);
        border: 1px solid #dc3545;
        color: #ff6b6b;
    }

    .spotify-logo {
        width: 40px;
        margin-right: 10px;
        vertical-align: middle;
    }

    .divider {
        display: flex;
        align-items: center;
        margin: 20px 0;
        color: #3949ab;
    }

    .divider::before, .divider::after {
        content: "";
        flex: 1;
        border-bottom: 1px solid #3949ab;
    }

    .divider::before {
        margin-right: 10px;
    }

    .divider::after {
        margin-left: 10px;
    }
</style>
</head>
<body>
    <div class="row justify-content-center w-100 mx-0">
        <div class="col-md-6 col-lg-5">
            <div class="card p-0">
                <div class="card-header text-center">
                    <h4>Login</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p class="mb-0">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" 
                                   value="{{ old('email') }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-4 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Ingat Saya</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mb-3">Login</button>
                    </form>
                    
                    <div class="divider">ATAU</div>
                    
                    <div class="text-center mt-3">
                        <p class="mb-0">Belum punya akun? <a href="{{ route('register') }}">Daftar disini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>