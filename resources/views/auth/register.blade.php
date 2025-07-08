<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #e0f7fa;
      font-family: 'Segoe UI', sans-serif;
    }
    .register-container {
      max-width: 900px;
      margin: 60px auto;
      background: white;
      border-radius: 20px;
      display: flex;
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }
    .register-image {
      background: #00bcd4;
      color: white;
      flex: 1;
      padding: 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }
    .register-image h2 {
      font-size: 28px;
      font-weight: bold;
    }
    .register-image img {
      max-width: 100%;
    }
    .register-form {
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

  <div class="register-container">
    <div class="register-image">
      <h2>Join Us Now!</h2>
      <p>Create your account to get started</p>
      <img src="https://cdn-icons-png.flaticon.com/512/1159/1159633.png" alt="Register Illustration" width="180">
    </div>
    <div class="register-form">
      <h3 class="mb-4">Create an Account</h3>

      @if ($errors->any())
        <div class="alert alert-danger">
          {{ $errors->first() }}
        </div>
      @endif

      <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Full Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="John Doe" required />
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required />
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Create password" required />
        </div>
        <div class="mb-3">
          <label for="password_confirmation" class="form-label">Confirm Password</label>
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Repeat password" required />
        </div>
        <button type="submit" class="btn btn-primary w-100">Register</button>
        <div class="text-center my-3">or</div>
        <button type="button" class="btn btn-outline-secondary w-100">
          Sign up with Google
        </button>
        <div class="text-center mt-3">
          Already have an account? <a href="{{ route('login') }}">Login</a>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
