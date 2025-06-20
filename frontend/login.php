<?php 
include '../dbconnect.php';
session_start();

if (isset($_SESSION['login'])) {
    header('Location: profile.php');
    exit();
}

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars ($_POST['userEmail']);
    $password = htmlspecialchars ($_POST['userPassword']);
    // echo $email .', '. $password ; 
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute([
        'email' => $email
    ]);
    $user = $stmt->fetch();
    // var_dump($user);

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            $_SESSION['login'] = true;
            header('Location: index.php');
        }else {
            header('Location: login.php');
        }       
    } else {
        header('Location: login.php');
    }   
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog Home - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <?php include 'navbar.php'; ?>
        <!-- Page header with logo and tagline-->
        <!-- <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Welcome to Blog Home!</h1>
                    <p class="lead mb-0">A Bootstrap 5 starter layout for your next blog homepage</p>
                </div>
            </div>
        </header> -->
        <!-- Register page-->
        <div class="container py-5">
            <div class="row justify-content-md-center">
               <div class="col-lg-6">
                    <h3>Login </h3>
                    <form action="#" method="post" class="p-4 p-md-5 border rounded-3 bg-light">
                        
                        <div class="form-floating mb-3">
                            <input type="text" name="userEmail" id="floatingInputname" class="form-control" placeholder="name@gmail">
                            <label for="floatingInputname">Email Address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="userPassword" id="floatingInputname" class="form-control" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>                       
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">login</button>
                        </div>
                    </form>
               </div>
            </div>
        </div>
        <!-- Footer-->
        <?php include 'footer.php'; ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>

