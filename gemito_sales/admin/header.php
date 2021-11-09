 <?php 
 session_start(); 
 if (empty($_SESSION['check'])) {
header("location:../login.php?msg=Access denied, please login to access page&type=error");
 }
 ?>

 <a href="dashboard.php">Dashboard</a> | <a href="view-user.php">View User</a> | <a href="add-product.php">Add Product</a> | <a href="view-product.php">View Product</a> | <a href="view-purchase.php">View Purchase</a> | <a href="profile.php">View Profile</a> | <a href="logout.php">Logout</a>