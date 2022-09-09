<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="Css.css">
<title>Page Title</title>
</head>
<body>
<form action="loginc.php" method="post">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center">
      <div class="col-20 col-md-8 col-lg-12 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
          <?php
                    // Your message code
                    if(isset($_SESSION['fail']))
                    {
                        echo '<h4 class="alert alert-warning">'.$_SESSION['fail'].'</h4>';
                        unset($_SESSION['fail']);
                    } // Your message code
                ?>
            <h3 class="mb-5">Sign in</h3>

            <div class="form-outline mb-4">
              <input type="text" name="username" class="form-control form-control-lg" />
              <label class="form-label" for="username">Username</label>

            </div>

            <div class="form-outline mb-4">
              <input type="password" name="password" class="form-control form-control-lg" />
              <label class="form-label" for="password">Password</label>
            </div>

            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-start mb-4">
              <input
                class="form-check-input"
                type="checkbox"
                value=""
                id="form1Example3"
              />
              <label class="form-check-label" for="form1Example3"> Remember password </label>
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit" name="sub">Login</button>
            </form>
            <hr class="my-4">

          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
    
