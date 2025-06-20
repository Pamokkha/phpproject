<?php 
include '../config.php'; 
include '../../dbconnect.php';
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT posts.*, users.name AS author_name, categories.name AS category_name FROM posts LEFT JOIN users ON posts.author_id = users.id LEFT JOIN categories ON posts.category_id = categories.id WHERE posts.id = :id");
    $stmt->execute([
        'id' => $id
    ]);
    $post = $stmt->fetch(PDO::FETCH_ASSOC);
    // print_r($post);
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
<style>
 /* .btn1{
    float: right;
    margin-bottom: 10px;
    border-radius: 15px;
    padding: 5px 10px;
 }    */
</style>

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
                    <h1 class="h3 mb-4 text w-75">Post Detail Page</h1>

                    <div class="card mb-3"> 
                       
                        <?php if ($post['status'] == 'created'): ?>                              
                        <div class="card-header">
                            <a onclick= "return confirm('Are you sure to public?')" class="btn btn-info" href="edit.php?id=<?=$post['id']?>&key=publish">public</a>
                            <a onclick= "return confirm('Are you sure to public?')" class="btn btn-danger" href="edit.php?id=<?=$post['id']?>&key=reject">Reject</a>
                        </div>
                        <?php endif; ?>

                        <div class="card-body">
                            <h5 class="card-title"><?php echo $post['title']; ?></h5>
                             <p class="card-text"><small class="text-body-secondary">Category: <?php echo $post['category_name']; ?> </small></p>
                            <p class="card-text"><?php echo $post['content']; ?></p>
                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago <strong>By <?php echo $post['author_name']; ?></strong></small></p>
                        </div>
                    </div>
                    
                        
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