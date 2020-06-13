<?php require_once("includes/header.php"); ?>
<?php 

$adsNewCount = $_POST['adsNewCount'];

var_dump($adsNewCount);
?>

<?php $jobs = Job::find_all_new($adsNewCount); ?>
    <?php foreach($jobs as $job): ?>
        <div  style=";border-radius: 25px;background: #e0e2db;padding: 20px;margin-top:20px;"  >

        <h1 class="text-primary"><?php echo $job->company; ?></h1>
        <h3><?php echo $job->job_title; ?></h3>
        <p><?php echo $job->description; ?></p>
        <p class="btn btn-danger float-left"><?php echo $job->salery; ?> $</p>
        <p class="btn btn-warning float-right" style="margin-left:290px">Created at  <?php $date = date('d-m',strtotime($job->created_at)); echo $date ;?>  Expires in 10 days
        </p>
    
        </div>
        <?php $expired = date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s",strtotime($job->created_at)) . " + 10 day"));  ?>
        <?php if(!(date("Y-m-d H:i:s")  < $expired)){

            $del_job = new Job();

            $del_job->id = $job->id;

            $del_job->delete();

          }
        ?>
    <?php endforeach; ?>