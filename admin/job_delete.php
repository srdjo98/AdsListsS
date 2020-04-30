<?php require_once("includes/header.php"); ?>
<?php 

    if(!$session->is_signed_in()){

        redirect('index.php');

    }elseif(isset($_GET['id'])){


        $job = new Job();

        $job->id = $_GET['id'];

        if($job->delete()){

        

        redirect("view_user.php?id={$_SESSION['ses_id_view']}");

        }

    }

?>
<?php require_once("includes/footer.php"); ?>