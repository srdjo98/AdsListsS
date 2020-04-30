<?php require_once("includes/header.php"); ?>
<?php 

    if(!$session->is_signed_in()){

        redirect('index.php');

    }elseif(isset($_GET['id'])){


        $job = new Job();

        $job->id = $_GET['id'];

        if($job->delete()){

        redirect("make_job.php");

        }

    }

?>
<?php require_once("includes/footer.php"); ?>