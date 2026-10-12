<?php
include "db.php";
session_start();

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $sql=$conn->prepare("select * from proprety where id =? ");
  $sql->bind_param("i", $id);
  $sql->execute();
  $result=$sql->get_result();
  $users = $result->fetch_assoc();
}
?>