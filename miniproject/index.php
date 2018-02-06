<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nucleus Login</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
  <?php session_start();
  include 'scripts/class.main.php';
  $obj= new MAIN();

  if(isset($_POST['username']) AND isset($_POST['password']) AND isset($_POST['login'])){
    if($obj->doLogin($_POST['username'],$_POST['password'])){
      echo '<script>alert("Logged In!");document.location.href="dash.php"</script>';
    }
    else{
      echo '<script>alert("Invalid Username or password!");document.location.href=index.php#signin</script>';
    }
  }
  elseif(isset($_POST['email']) AND isset($_POST['username']) AND isset($_POST['password']) AND isset($_POST['sex']) AND isset($_POST['signup'])){
    if($obj->register($_POST['username'],$_POST['email'],$_POST['password'], $_POST['sex'])){
      echo '<script>alert("Registered!");document.location.href=index.php#signin</script>';
    }
    else{
      echo '<script>alert("Could Not Register!Credentials already taken up!Click OK to try again.");document.location.href=index.php#signup</script>';
    }
  }

?>
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST">
              <h1>Login</h1>
              <div>
                <input type="text" class="form-control" name="username" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Password" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit" name="login">Log in</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-bolt"></i> Nucleus</h1>
                  <p>©2016 All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form method="POST">
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" name="username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" name="email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required="" />
              </div>
              <div style="font-size: 2rem">
              Gender:
                <div id="gender">

                  <label>
                    <input type="radio" name="sex" value="1"> &nbsp; Male &nbsp;
                  </label>
                  <label>
                    <input type="radio" name="sex" value="0"> &nbsp; Female
                  </label>
                </div>

              </div>
              <br>
              <div>
                <button type="submit" class="btn btn-default submit" name="signup">Sign Up</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-bolt"></i> Nucleus</h1>
                  <p>©2016 All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
