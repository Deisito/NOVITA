<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'novita'
) or die(mysqli_erro($mysqli));

?>