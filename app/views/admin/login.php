<!-- app/views/admin/login.php -->
<div class="login-container">
  <div class="login-card">
    <div class="login-header">
      <h1>Admin Login</h1>
      <p>Please sign in to continue</p>
    </div>
    
    <?php if(!empty($error)): ?>
      <div class="alert alert-error">
        <?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>
    
    <form action="<?= BASE_URL ?>/admin/login" method="POST" class="login-form">
      <div class="form-group">
        <label for="username">Username</label>
        <input 
          type="text" 
          id="username" 
          name="username" 
          placeholder="Enter your username" 
          required
          class="form-input"
        >
        <i class="icon fas fa-user"></i>
      </div>
      
      <div class="form-group">
        <label for="password">Password</label>
        <input 
          type="password" 
          id="password" 
          name="password" 
          placeholder="Enter your password" 
          required
          class="form-input"
        >
        <i class="icon fas fa-lock"></i>
      </div>
      
      <button type="submit" class="login-button">
        <span>Log In</span>
        <i class="fas fa-arrow-right"></i>
      </button>
    </form>
    
    <div class="login-footer">
      <a href="<?= BASE_URL ?>/admin/forgot-password" class="forgot-password">Forgot password?</a>
    </div>
  </div>
</div>

<style>
  :root {
    --primary-color: #4361ee;
    --error-color: #f72585;
    --text-color: #2b2d42;
    --light-gray: #f8f9fa;
    --white: #ffffff;
    --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    --transition: all 0.3s ease;
  }
  
  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }
  
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f0f2f5;
    color: var(--text-color);
    line-height: 1.6;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 20px;
    background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
  }
  
  .login-container {
    width: 100%;
    max-width: 420px;
  }
  
  .login-card {
    background: var(--white);
    border-radius: 12px;
    box-shadow: var(--shadow);
    padding: 40px;
    transition: var(--transition);
  }
  
  .login-card:hover {
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
  }
  
  .login-header {
    text-align: center;
    margin-bottom: 30px;
  }
  
  .login-header h1 {
    font-size: 24px;
    font-weight: 600;
    color: var(--primary-color);
    margin-bottom: 8px;
  }
  
  .login-header p {
    color: #6c757d;
    font-size: 14px;
  }
  
  .alert {
    padding: 12px 16px;
    border-radius: 8px;
    margin-bottom: 20px;
    font-size: 14px;
  }
  
  .alert-error {
    background-color: #ffebee;
    color: var(--error-color);
    border-left: 4px solid var(--error-color);
  }
  
  .form-group {
    position: relative;
    margin-bottom: 20px;
  }
  
  .form-group label {
    display: block;
    margin-bottom: 8px;
    font-size: 14px;
    font-weight: 500;
    color: #495057;
  }
  
  .form-input {
    width: 100%;
    padding: 12px 16px 12px 40px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 14px;
    transition: var(--transition);
    background-color: var(--light-gray);
  }
  
  .form-input:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
  }
  
  .icon {
    position: absolute;
    left: 15px;
    bottom: 12px;
    color: #6c757d;
    font-size: 16px;
  }
  
  .login-button {
    width: 100%;
    padding: 12px;
    background-color: var(--primary-color);
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 500;
    cursor: pointer;
    transition: var(--transition);
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
  }
  
  .login-button:hover {
    background-color: #3a56d4;
    transform: translateY(-2px);
  }
  
  .login-button:active {
    transform: translateY(0);
  }
  
  .login-footer {
    text-align: center;
    margin-top: 20px;
    font-size: 14px;
  }
  
  .forgot-password {
    color: #6c757d;
    text-decoration: none;
    transition: var(--transition);
  }
  
  .forgot-password:hover {
    color: var(--primary-color);
    text-decoration: underline;
  }
</style>

<!-- Include Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">