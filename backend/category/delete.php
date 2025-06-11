<?php 
  include '../config.php';
  include '../../dbconnect.php';

  if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM categories WHERE id = :id");
    $stmt->execute([
      'id' => $id
    ]);
  }
  header('Location: list.php');
?>