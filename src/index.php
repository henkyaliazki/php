<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="data/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <title>Login Form</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a href="#" class="navbar-brand">
            <img src="" alt="" class="d-inline-block align-text-top" width="30" height="24">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="nav-link active">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Login/Register
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Login</a></li>
                        <li><a class="dropdown-item" href="register.php">Register</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--end nav-->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header m-auto p-0">
                    <img src="data/asset/user-login.jpeg" class="img-fluid " alt="user-login" width="100">
                </div>
                <div class="card-body">
                    <form action="components/login.php" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"
              ><svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="16"
                          height="16"
                          fill="currentColor"
                          class="bi bi-person"
                          viewBox="0 0 16 16"
                  >
                  <path
                          d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1
                          1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68
                          10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z"
                  /></svg
                  ></span>

                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"
              ><svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="16"
                          height="16"
                          fill="currentColor"
                          class="bi bi-person"
                          viewBox="0 0 16 16"
                  >
                  <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="16"
                          height="16"
                          fill="currentColor"
                          class="bi bi-lock"
                          viewBox="0 0 16 16"
                  >
                    <path
                            d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2
                             2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1
                             1 0 0 1 1-1"
                    />
                  </svg></svg
                  ></span>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>
                        <input type="submit" name="login" value="Login" class="btn btn-primary col-md-12 my-2"></input>
                        <a href="register.php" class="btn btn-warning col-md-12">Register</a>
                    </form>
                </div>
            </div>
            <p class="text-center my-2">copyright&copy; 2023</p>
        </div>
    </div>
</div>

<script src="data/bootstrap-5.3.2-dist/js/bootstrap.bundle.js"></script>
</body>
</html>