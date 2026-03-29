<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Bookly</title>

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
            margin-bottom: 18px;
            position: relative;
        }

        .form-group label {
            margin-bottom: 6px;
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

        .input-icon {
            position: absolute;
            right: 15px;
            top: 42px;
            color: #999;
        }

        .error-message {
            color: #dc3545;
            font-size: 12px;
            margin-top: 4px;
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

        .register-link {
            text-align: center;
            margin-top: 25px;
            font-size: 14px;
            color: #666;
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
        }
    </style>
</head>

<body>

<div class="login-container">
    <div class="login-image">
        <i class="fas fa-user-plus"></i>
    </div>

    <div class="login-form">
        <h2>Create Account</h2>
        <p>Join Bookly and start reading 📚</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required placeholder="Your full name">
                <i class="fas fa-user input-icon"></i>
                @error('name') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required placeholder="example@email.com">
                <i class="fas fa-envelope input-icon"></i>
                @error('email') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" value="{{ old('phone') }}" required placeholder="07xxxxxxxx">
                <i class="fas fa-phone input-icon"></i>
                @error('phone') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required placeholder="Create password">
                <i class="fas fa-lock input-icon"></i>
                @error('password') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" required placeholder="Confirm password">
                <i class="fas fa-lock input-icon"></i>
            </div>

            <button class="btn-login">
                <i class="fas fa-user-plus"></i> Register
            </button>

            <div class="register-link">
                Already have an account?
                <a href="{{ route('login') }}">Login here</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
