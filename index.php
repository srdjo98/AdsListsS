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
    <div class="col-md-7 col-xl-7 col-12" style="margin-left: 21%;margin-top:3%;">

    <?php $jobs = Job::find_all(); ?>
    <?php foreach($jobs as $job): ?>
        <div  style=";border-radius: 25px;background: #e0e2db;padding: 20px;margin-top:20px;"  >

        <h1 class="text-primary"><?php echo $job->company; ?></h1>
        <h3><?php echo $job->job_title; ?></h3>
        <p><?php echo $job->description; ?></p>
        <p class="btn btn-danger float-left"><?php echo $job->salery; ?> $</p>
        
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
    </div>
    </div>
</div>
    <?php require_once("includes/footer.php"); ?>