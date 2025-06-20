<?php session_start();
include '../dbconnect.php';
//select all posts (published)
$stmt = $pdo->query("SELECT * FROM posts WHERE status = 'published' ORDER BY id DESC");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

function getFirstWords($content, $limit = 20) {
    // Strip HTML tags if needed
    $text = strip_tags($content);
    
    // Convert to array of words
    $words = preg_split('/\s+/', $text, -1, PREG_SPLIT_NO_EMPTY);
    
    // Get the first $limit words
    $firstWords = array_slice($words, 0, $limit);
    
    // Return as string
    return implode(' ', $firstWords) . (count($words) > $limit ? '...' : '');
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
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Welcome to Blog Home!</h1>
                    <p class="lead mb-0">A Bootstrap 5 starter layout for your next blog homepage</p>
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <!-- <div class="card mb-4">
                        <a href="#!"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..." /></a>
                        <div class="card-body">
                            <div class="small text-muted">January 1, 2023</div>
                            <h2 class="card-title">Featured Post Title</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                            <a class="btn btn-primary" href="#!">Read more →</a>
                        </div>
                    </div> -->
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">
                        <?php foreach($posts as $post): ?>
                            <?php $timestamp = strtotime($post['published_at']); ?>
                        <div class="col-lg-6">
                            <!-- Blog post-->                           
                            <div class="card mb-4">
                                <!-- <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a> -->
                                <div class="card-body">
                                    <div class="small text-muted"><?= date('F j, Y', $timestamp);?></div>
                                    <h2 class="card-title h4"><?= $post['title']; ?></h2>
                                    <p class="card-text"><?= getFirstWords($post['content']);20 ?></p>
                                    <a class="btn btn-primary" href="post.php?id=<?=$post['id']?>">Read more →</a>
                                </div>                                 
                            </div>                          
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- Pagination-->
                    <nav aria-label="Pagination">
                        <hr class="my-0" />
                        <ul class="pagination justify-content-center my-4">
                            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                            <li class="page-item"><a class="page-link" href="#!">2</a></li>
                            <li class="page-item"><a class="page-link" href="#!">3</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                            <li class="page-item"><a class="page-link" href="#!">15</a></li>
                            <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- Side widgets-->
                <?php include('siderbar.php') ?>
            </div>
        </div>
        <!-- Footer-->
        <?php include('footer.php') ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
