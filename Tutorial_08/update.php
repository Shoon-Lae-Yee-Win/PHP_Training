<?php
include('db.php');
if(isset($_POST)){
  $id=$_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $number = $_POST['number'];
  $amount = $_POST['amount'];
  $month = $_POST['month'];
  $sql=mysqli_query($conn,"UPDATE users SET name='$name',email='$email',address='$address',number='$number'
  ,amount='$amount',month='$month' WHERE id='$id'");
  header("location:index.php");
}
