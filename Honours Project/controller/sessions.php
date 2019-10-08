<?php 

session_start();
unset($_SESSION["questions"]);
unset($_SESSION["answers"]);
unset($_SESSION["user_score"]);
unset($_SESSION['complete']);
unset($_SESSION['question_number']);

header("Location: ../view/test.php");

?>