<!-- File: app/Views/login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
        }
        body {
            background-color: #2f2a3d;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 400px;
            background-color: #3a3456;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.4);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type="email"],
        input[type="password"] {
            background-color: #2f2a3d;
            border: 1px solid #666;
            border-radius: 6px;
            padding: 12px 15px;
            color: #fff;
            margin-bottom: 15px;
        }
        .btn {
            background-color: #8c71f2;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
        }
        .login-options {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .login-options button {
            flex: 1;
            padding: 10px;
            background-color: #fff;
            color: #333;
            border: none;
            border-radius: 6px;
            margin-right: 10px;
        }
        .login-options button:last-child {
            margin-right: 0;
        }
        .bottom-text {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }
        .bottom-text a {
            color: #bbb;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome Back</h2>
        <form action="/auth/cek_login" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="btn">Login</button>
        </form>
        <div class="login-options">
            <button>Google</button>
            <button>Apple</button>
        </div>
        <div class="bottom-text">
            Don't have an account? <a href="/register">Create one</a>
        </div>
    </div>
</body>
</html>
