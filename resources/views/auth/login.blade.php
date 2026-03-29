<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Bookly</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
            max-width: 900px;
            width: 100%;
            display: flex;
        }
        .login-image {
            flex: 1;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            color: white;
        }
        .login-image i {
            font-size: 120px;
            opacity: 0.9;
        }
        .login-form {
            flex: 1;
            padding: 50px 40px;
        }
        .login-form h2 {
            margin-bottom: 10px;
            color: #333;
            font-weight: 700;
        }
        .login-form p {
            color: #666;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
            font-size: 14px;
        }
        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s;
        }
        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        .form-group .input-icon {
            position: absolute;
            right: 15px;
            top: 43px;
            color: #999;
        }
        .error-message {
            color: #dc3545;
            font-size: 12px;
            margin-top: 5px;
        }
        .success-message {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        .checkbox-group {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .checkbox-group input {
            width: auto;
            margin-right: 8px;
        }
        .checkbox-group label {
            margin: 0;
            color: #666;
            font-size: 14px;
            font-weight: 400;
        }
        .btn-login {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        .forgot-password {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #667eea;
            text-decoration: none;
            font-size: 14px;
        }
        .forgot-password:hover {
            text-decoration: underline;
        }
        .register-link {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
            color: #666;
            font-size: 14px;
        }
        .register-link a {
            color: #667eea;
            font-weight: 600;
            text-decoration: none;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }
            .login-image {
                display: none;
            }
            .login-form {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-image">
            <i class="fas fa-book-reader"></i>
        </div>
        <div class="login-form">
            <h2>Welcome Back!</h2>
            <p>Please login to your account</p>
            @if (session('success'))
            <div class="success-message">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="Enter your email">
                    <i class="fas fa-envelope input-icon"></i>
                    @error('email')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Enter your password">
                    <i class="fas fa-lock input-icon"></i>
                    @error('password')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="checkbox-group">
                    <input id="remember_me" type="checkbox" name="remember">
                    <label for="remember_me">Remember me</label>
                </div>
                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i> Log In
                </button>
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="forgot-password">
                    Forgot your password?
                </a>
                @endif
                <div class="register-link">
                    Don't have an account? <a href="{{ route('register') }}">Register here</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>