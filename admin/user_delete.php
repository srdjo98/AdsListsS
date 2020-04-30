<?php require_once("includes/header.php"); ?>
<?php 

    if(!$session->is_signed_in()){

        redirect('index.php');

    }elseif(isset($_GET['id'])){


        $user = new user();

        $user->id = $_GET['id'];

        if($user->delete()){

        redirect("index.php");

        }

    }

?>
<?php require_once("includes/footer.php"); ?>