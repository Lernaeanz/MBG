<!DOCTYPE html>
<html lang="id">
<head>
    <title>Login | MBG Multi User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #74ebd5, #ACB6E5);
        }
        .card {
            box-shadow: 0 8px 16px rgba(0,0,0,.15);
        }
    </style>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center" style="height:100vh;">
    <div class="card p-4" style="width: 350px;">
            <a href="/" class="text-black text-decoration-none">
                <h4 class="text-center mb-4">MBG Login</h4>
            </a>

        <?= session()->getFlashdata('error') ? '<div class="alert alert-danger">'.session()->getFlashdata('error').'</div>' : '' ?>
        <form action="<?= base_url('login') ?>" method="post">
            <input type="text" class="form-control mb-3" placeholder="Username" name="username" required>
            <input type="password" class="form-control mb-3" placeholder="Password" name="password" required>
            <button type="submit" class="btn btn-primary w-100">Login</button>
            <p class="mt-3 text-center">
                Belum punya akun? 
                <a href="<?= base_url('register') ?>" class="text-decoration-none text-primary fw-bold">Registrasi</a>
            </p>
        </form>
    </div>
</div>
</body>
</html>
