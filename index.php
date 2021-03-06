<?php require_once("includes/header.php"); ?>
    <div class="container " style="margin-top : 50px;" ">
    <div  class="row" >
    <div class="col-md-4 col-xl-4 col-12" style="margin-left: 25%;margin-top:3%;">
    <form action="job_list.php" method="post"   >
    <div  class="row">
    <div >
    <h1>Find A Job</h1>
    <?php 
        $categorys = Category::find_all();

    ?>
    <div class="form-group">
    <select name="id_category" class="form-control">
        <option>Choose categorty</option>
        <?php foreach($categorys as $category): ?>
        <option value="<?php echo $category->id ?>"><?php echo $category->name ?>(
        <?php $jobs = new Job(); 
           
           echo $jobs->count_all_by_id($category->id);
        
        ?>)</option>
        
        <?php endforeach; ?>
    </select>
    </div>
    <input type="submit" name="submit" value="Search" class="btn btn-secondary">
    
    
    </div>
    </div>
    </form>
    </div>
    </div>
    <div  class="row" >
    <div class="col-md-7 col-xl-7 col-12" style="margin-left: 21%;margin-top:3%;" id="ads">

    <?php $jobs = Job::find_all_limit(); ?>
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
    </div>
    <button class="btn btn-primary col-xl-3 " style="margin-left:250px">Show more Ads</button>
    </div>
   
    </div>
    
</div>
    <?php require_once("includes/footer.php"); ?>


<script>
    
$(document).ready(function(){

    var adsCount  = 2;
    $("button").click(function(){

        adsCount = adsCount + 2;

        $("#ads").load("load_ads.php", {

            adsNewCount: adsCount
                
        });
    })
})

    
</script>