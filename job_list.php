<?php require_once("includes/header.php"); ?>
<?php 

    if(isset($_POST['submit']) ){

        if(is_numeric($_POST['id_category'])){
        $id_category = $_POST['id_category'];
        
        $jobs = Job::find_by_id_category($id_category);
        
        }else{

            redirect("index.php");

        }

    }




?>

<div class="container " style="margin-top : 50px;" >
        <div  class="row" >
        <div class="col-md-7 col-xl-7 col-12" style="margin-left: 16%;margin-top:3%;">
        <?php foreach($jobs as $job): ?>
        <div  style=";border-radius: 25px;background: #e0e2db;padding: 20px;margin-top:20px;"  >
        <h2 class="text-primary">Company</h2>
        <h3><?php echo $job->company; ?></h3>
        <h2 class="text-primary">Job tittle</h2>
        <h4><?php echo $job->job_title; ?></h4>
        <h2 class="text-primary"">Job description</h2>
        <p ><?php echo $job->description; ?></p>
        <h2 class="text-primary">Salery</h2>
        <p class="btn btn-danger"><?php echo $job->salery; ?> $</p>
        <h2 class="text-primary">Location</h2>
        <h4><?php echo $job->location; ?></h4>
        <h2 class="text-primary">Contact phone</h2>
        <h4><?php echo $job->contact_user; ?></h4>
        <h2 class="text-primary">Contact email</h2>
        <h4><?php echo $job->contact_email; ?></h4>
        </div>
        <?php endforeach; ?>
        </div>
        </div>
</div>
<?php require_once("includes/footer.php"); ?>