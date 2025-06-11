<?php 
include '../config.php'; 
include '../../dbconnect.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM students WHERE id = :id");
    $stmt->execute([
        'id' => $id
    ]);
    $student = $stmt->fetch(PDO::FETCH_ASSOC);
    // print_r($student);

    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = htmlspecialchars($_POST['studentName']);
        $stmt = $pdo->prepare("UPDATE students SET name = :name WHERE id = :id");
        $stmt->execute([
            'name' => $name,
            'id' => $_GET['id']
        ]);
        header('Location: list.php');
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Blank</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include '../sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include '../navbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Student Edit Page</h1>
                    <a href="list.php" class="btn btn-primary">Back</a>
                    
                    <form action="#" method="post">
                        <div class="form-group">  
                            <label for="name">Name</label>
                            <input type="text" placeholder="Enter Category Name" class="form-control w-50" name="studentName" id="name" required value="<?= $student['name'] ?>">
                        </div>
                        <div class="form-group">  
                            <label for="name">Age</label>
                            <input type="number" placeholder="Enter Student Age" class="form-control w-50" name="studentAge" id="name" required value="<?= $student['age'] ?>">
                        </div>
                        <div class="form-group">  
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="studentGender" id="male" <?php if($student['gender'] == 'male') { echo 'checked'; } ?>>
                              <label class="form-check-label" for="male">
                                  Male
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="studentGender" id="female" <?php if($student['gender'] == 'female') { echo 'checked'; } ?>>
                              <label class="form-check-label" for="female">
                                  Female
                              </label>
                            </div>
                        </div>
                        <div class="form-group">  
                            <label for="address">Address</label>
                            <textarea placeholder="Enter Student Address" class="form-control w-50" name="studentAddress" id="address" required><?= $student['address'] ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include '../footer.php'; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>