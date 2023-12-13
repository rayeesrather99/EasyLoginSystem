<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple and Secure Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="form-container" id="login-form">
          <h1>Login</h1>
          <form action="signInForm.php" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <input class="submit-btn" type="submit" value="Submit"></input>
          </form>
          <p>Don't have an account? <a href="#" id="signup-link">Sign up</a></p>
        </div>
    
        <div class="form-container" id="signup-form" style="display: none;">
          <h1>Sign Up</h1>
          <form action="signupform.php" method="post">
            <label for="new-username">Username</label>
            <input type="text" id="new-username" name="new-username" required>
            <label for="new-email">Email</label>
            <input type="email" id="new-email" name="new-email" required>
            <label for="new-password">Password</label>
            <input type="password" id="new-password" name="new-password" required>
            <input class="submit-btn" type="submit" value="Submit"></input>
          </form>
          <p>Already have an account? <a href="#" id="login-link">Login</a></p>
        </div>
    </div>
    <script>
        const loginForm = document.getElementById('login-form');
        const signupForm = document.getElementById('signup-form');
        const loginLink = document.getElementById('login-link');
        const signupLink = document.getElementById('signup-link');

        loginLink.addEventListener('click', (event) => {
          event.preventDefault();
          signupForm.style.display = 'none';
          loginForm.style.display = 'block';
        
          setTimeout(() => {
            signupForm.style.opacity = 0;
            loginForm.style.opacity = 1;
          }, 10);
        });

        signupLink.addEventListener('click', (event) => {
          event.preventDefault();
          loginForm.style.display = 'none';
          signupForm.style.display = 'block';
        
          setTimeout(() => {
            loginForm.style.opacity = 0;
            signupForm.style.opacity = 1;
          }, 10);
        });
    </script>
</body>
</html>