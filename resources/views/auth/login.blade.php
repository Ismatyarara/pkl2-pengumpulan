<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #e0f7fa;
      font-family: 'Segoe UI', sans-serif;
    }
    .login-container {
      max-width: 900px;
      margin: 60px auto;
      background: white;
      border-radius: 20px;
      display: flex;
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }
    .login-image {
      background: #00bcd4;
      color: white;
      flex: 1;
      padding: 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }
    .login-image h2 {
      font-size: 28px;
      font-weight: bold;
    }
    .login-image img {
      max-width: 100%;
    }
    .login-form {
      flex: 1;
      padding: 40px;
    }
    .form-control {
      border-radius: 12px;
    }
    .btn-primary {
      background-color: #00bcd4;
      border: none;
      border-radius: 12px;
    }
    .btn-primary:hover {
      background-color: #0097a7;
    }
    .btn-outline-secondary {
      border-radius: 12px;
    }
  </style>
</head>
<body>

  <div class="login-container">
    <div class="login-image">
      <h2>Welcome Back!</h2>
      <p>Login securely to your account</p>
      <img src="https://cdn-icons-png.flaticon.com/512/747/747545.png" alt="Login Illustration" width="180">
    </div>
    <div class="login-form">
      <h3 class="mb-4">Welcome to Website</h3>

      @if ($errors->any())
        <div class="alert alert-danger">
          {{ $errors->first() }}
        </div>
      @endif

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" required />
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required />
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
          <label class="form-check-label" for="rememberMe">Remember Me</label>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
        <div class="text-center my-3">or</div>
        <button type="button" class="btn btn-outline-secondary w-100">
          Continue with Google
        </button>
      </form>
    </div>
  </div>

</body>
</html>
