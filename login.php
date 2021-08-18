<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="login/style.css">
  <title>Login Form Demo</title>
</head>
<body>
  <div class="login-wrapper">
    <form action="proses/cek_login.php"  method="post" class="form">
      <img src="login/img/avatar.png" alt="">
      <h2>Login Perpustakaan</h2>
      <div class="input-group">
        <input type="text" name="username" id="username" required>
        <label for="username">Username</label>
      </div>
      <div class="input-group">
        <input type="password" name="password" id="password" required>
        <label for="password">Password</label>
      </div>
      <button type="submit" name="login" id="login" class="submit-btn"> Login</button>
    </form>
  </div>
</body>
</html>