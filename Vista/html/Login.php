<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="Vista/css/log_styler.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
  <div class="login-wrapper">
    <div class="login-card">
      <div class="user-icon">
        <i class="fas fa-user"></i>
      </div>
      <form action="index.php?accion=entrarsoft" method="post">
        <div class="input-group">
          <i class="fas fa-user"></i>
          <input type="email" placeholder="
          <?php 
            if (isset($_SESSION['MesnajeError'])){
                echo $_SESSION['MesnajeError'];
                unset($_SESSION['MesnajeError']);
            }  
            else{ 
              echo"Email";
            }
            ?>" name="usemail">
        </div>
        <div class="input-group">
          <i class="fas fa-lock"></i>
          <input type="password" placeholder="
          <?php 
            if (isset($_SESSION['MesnajeError'])){
                echo $_SESSION['MesnajeError'];
                unset($_SESSION['MesnajeError']);
            }  
            else{ 
              echo"Password";
            }
            ?>" name="usepassword">
        </div>
        <button type="submit" class="login-btn">LOGIN</button>
      </form>
    </div>
  </div>
</body>
</html>
