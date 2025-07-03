<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun | IklanApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #0d47a1 0%, #42a5f5 60%, #ffffff 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Roboto', sans-serif;
            color: #212529;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
            background: #ffffff;
            overflow: hidden;
            transition: transform 0.3s ease;
            width: 100%;
            max-width: 500px;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            background: linear-gradient(90deg, #0d47a1, #42a5f5);
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
            text-transform: uppercase;
        }

        .card-body {
            padding: 30px;
        }

        .form-control {
            border-radius: 50px;
            padding: 12px 20px;
            background-color: #f1f8ff;
            border: 1px solid #90caf9;
            color: #0d47a1;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background-color: #e3f2fd;
            border-color: #42a5f5;
            box-shadow: 0 0 0 0.25rem rgba(66, 165, 245, 0.25);
            color: #0d47a1;
        }

        .form-label {
            color: #0d47a1;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .btn-success {
            background-color: #0d47a1;
            border: none;
            border-radius: 50px;
            padding: 12px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            font-size: 14px;
            color: #fff;
        }

        .btn-success:hover {
            background-color: #1565c0;
            transform: scale(1.02);
        }

        .alert-danger {
            border-radius: 50px;
            background-color: rgba(220, 53, 69, 0.2);
            border: 1px solid #dc3545;
            color: #b71c1c;
            padding: 12px 20px;
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

        .divider {
            display: flex;
            align-items: center;
            margin: 20px 0;
            color: #90a4ae;
        }

        .divider::before, .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #b0bec5;
        }

        .divider::before {
            margin-right: 10px;
        }

        .divider::after {
            margin-left: 10px;
        }

        .password-hint {
            color: #546e7a;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="row justify-content-center w-100 mx-0">
        <div class="col-md-6 col-lg-5">
            <div class="card p-0">
                <div class="card-header text-center">
                    <h4>Daftar Akun</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p class="mb-0">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" 
                                   value="{{ old('name') }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" 
                                   value="{{ old('email') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <div class="password-hint">Gunakan minimal 8 karakter dengan kombinasi huruf dan angka</div>
                        </div>
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="password_confirmation" 
                                   name="password_confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100 mb-3">Daftar</button>
                    </form>
                    
                    <div class="divider">ATAU</div>
                    
                    <div class="text-center mt-3">
                        <p class="mb-0">Sudah punya akun? <a href="{{ route('login') }}">Login disini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>