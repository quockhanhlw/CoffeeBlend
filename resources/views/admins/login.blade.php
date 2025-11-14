<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login - CoffeeBlend</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      overflow: hidden;
    }
    
    body::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
      background-size: 50px 50px;
      animation: moveBackground 20s linear infinite;
    }
    
    @keyframes moveBackground {
      0% { transform: translate(0, 0); }
      100% { transform: translate(50px, 50px); }
    }
    
    .login-container {
      position: relative;
      z-index: 1;
      width: 100%;
      max-width: 950px;
      display: flex;
      background: white;
      border-radius: 20px;
      box-shadow: 0 30px 80px rgba(0,0,0,0.3);
      overflow: hidden;
      margin: 20px;
    }
    
    .login-left {
      flex: 1;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      padding: 60px 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      color: white;
      position: relative;
    }
    
    .login-left::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="rgba(255,255,255,0.1)" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,138.7C960,139,1056,117,1152,106.7C1248,96,1344,96,1392,96L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
      background-size: cover;
      background-position: bottom;
      opacity: 0.3;
    }
    
    .coffee-icon {
      font-size: 80px;
      margin-bottom: 30px;
      animation: float 3s ease-in-out infinite;
    }
    
    @keyframes float {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-20px); }
    }
    
    .login-left h1 {
      font-size: 42px;
      font-weight: 700;
      margin-bottom: 15px;
      text-align: center;
    }
    
    .login-left p {
      font-size: 16px;
      opacity: 0.9;
      text-align: center;
      line-height: 1.6;
    }
    
    .admin-badge {
      background: rgba(255,255,255,0.2);
      padding: 8px 20px;
      border-radius: 20px;
      margin-top: 20px;
      backdrop-filter: blur(10px);
    }
    
    .login-right {
      flex: 1;
      padding: 60px 50px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }
    
    .login-header {
      text-align: center;
      margin-bottom: 40px;
    }
    
    .login-header h2 {
      font-size: 32px;
      color: #2c3e50;
      font-weight: 700;
      margin-bottom: 10px;
    }
    
    .login-header p {
      color: #7f8c8d;
      font-size: 14px;
    }
    
    .alert {
      background: #fee;
      color: #c33;
      padding: 12px 15px;
      border-radius: 10px;
      margin-bottom: 25px;
      font-size: 14px;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    
    .form-group {
      margin-bottom: 25px;
      position: relative;
    }
    
    .form-group label {
      display: block;
      margin-bottom: 8px;
      color: #2c3e50;
      font-weight: 500;
      font-size: 14px;
    }
    
    .input-wrapper {
      position: relative;
    }
    
    .input-wrapper i {
      position: absolute;
      left: 18px;
      top: 50%;
      transform: translateY(-50%);
      color: #667eea;
      font-size: 16px;
    }
    
    .form-group input {
      width: 100%;
      padding: 15px 15px 15px 50px;
      border: 2px solid #e0e0e0;
      border-radius: 12px;
      font-size: 15px;
      font-family: 'Poppins', sans-serif;
      transition: all 0.3s ease;
      background: #f8f9fa;
    }
    
    .form-group input:focus {
      outline: none;
      border-color: #667eea;
      background: white;
      box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    }
    
    .form-group input::placeholder {
      color: #95a5a6;
    }
    
    .login-btn {
      width: 100%;
      padding: 16px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      border: none;
      border-radius: 12px;
      color: white;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      margin-top: 10px;
      font-family: 'Poppins', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
    }
    
    .login-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
    }
    
    .login-btn:active {
      transform: translateY(0);
    }
    
    @media (max-width: 768px) {
      .login-container {
        flex-direction: column;
      }
      
      .login-left {
        padding: 40px 30px;
      }
      
      .login-right {
        padding: 40px 30px;
      }
      
      .login-left h1 {
        font-size: 32px;
      }
      
      .coffee-icon {
        font-size: 60px;
      }
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="login-left">
      <div class="coffee-icon">
        <i class="fas fa-mug-hot"></i>
      </div>
      <h1>CoffeeBlend</h1>
      <p>Admin Management System</p>
      <div class="admin-badge">
        <i class="fas fa-shield-alt"></i> Admin Portal
      </div>
    </div>
    
    <div class="login-right">
      <div class="login-header">
        <h2>Welcome Back!</h2>
        <p>Please login to access admin panel</p>
      </div>
      
      @if(session('error'))
        <div class="alert">
          <i class="fas fa-exclamation-circle"></i>
          <span>{{ session('error') }}</span>
        </div>
      @endif
      
      <form method="POST" action="{{ route('check.login.admin') }}">
        @csrf
        
        <div class="form-group">
          <label for="email">Email Address</label>
          <div class="input-wrapper">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
          </div>
        </div>
        
        <div class="form-group">
          <label for="password">Password</label>
          <div class="input-wrapper">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" id="password" placeholder="Enter your password" required style="padding-right: 45px;">
            <button type="button" onclick="togglePassword()" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: #667eea; font-size: 18px; z-index: 2;">
              <i class="fas fa-eye" id="password-toggle-icon"></i>
            </button>
          </div>
        </div>
        
        <button type="submit" class="login-btn">
          <i class="fas fa-sign-in-alt"></i>
          <span>Login to Dashboard</span>
        </button>
      </form>
    </div>
  </div>

  <script>
  function togglePassword() {
    const input = document.getElementById('password');
    const icon = document.getElementById('password-toggle-icon');
    
    if (input.type === 'password') {
      input.type = 'text';
      icon.classList.remove('fa-eye');
      icon.classList.add('fa-eye-slash');
    } else {
      input.type = 'password';
      icon.classList.remove('fa-eye-slash');
      icon.classList.add('fa-eye');
    }
  }
  </script>
</body>
</html>
