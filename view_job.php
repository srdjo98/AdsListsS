<?php require_once("includes/header.php"); ?>
<?php 

    if(!$session->is_signed_in()){

        redirect('index.php');

    }
    

    if(isset($_POST['update'])){

        $updatejob = new Job();

        $id = $updatejob->id = $_POST['id'];
        $updatejob->id_category = $_POST['id_category'];
        $updatejob->id_user = $_POST['id_user'];
        $updatejob->company = $_POST['company'];
        $updatejob->job_title = $_POST['job_title'];
        $updatejob->description = $_POST['description'];
        $updatejob->salery = (int)$_POST['salery'];
        $updatejob->location = $_POST['location'];
        $updatejob->contact_user = $_POST['contact_user'];
        $updatejob->contact_email = $_POST['contact_email'];
        $updatejob->created_at = date("Y-m-d H:i:s");

        if($updatejob->update()){
            
            redirect('view_job.php?id='. $id);

        }else{

            $message = "Something went wrong";

        }


    }else{
        

        $message = "";
        $id_category = "";
        $id_user = "";
        $company = "";
        $job_title = "";
        $description = "";
        $salery = "";
        $location = "";
        $contact_user = "";
        $contact_email = "";


        

    }



?>
<?php 
        $categorys = Category::find_all();

    ?>
    <?php $jobs = Job::find_by_id($_GET['id']); ?>
    <?php  foreach($jobs as $job): ?>
    <div class="container" style="margin-top : 50px;">
    <div class="row col-md-6 col-xl-6 col-12">
    <?php echo $message; ?>
    <form  action="view_job.php" method="post">
        
        <h1>Update</h1>
        <div class="form-group">
        <select name="id_category" class="form-control">
        <option  value="<?php echo $job->id_category; ?>">Choose categorty</option>
        <?php foreach($categorys as $category): ?>
        <option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
        
        <?php endforeach; ?>
    </select></div><br>
        
        
        <div class="form-group">
        <input type="hidden" name="id" value="<?php echo $job->id; ?>"> 
        <input type="hidden" name="id_user" value="<?php echo $session->user_id; ?>"> 
        <lable>Company name</lable>
        <input type="text" name="company" value="<?php echo $job->company; ?>" class="form-control "><br>
        <lable>Job title</lable>
        <input type="text" name="job_title" value="<?php echo $job->job_title; ?>" class="form-control"><br>
        <lable>Description</lable>
        <textarea name="description"  class="form-control"><?php echo $job->description; ?></textarea> <br>
        <lable>Salery</lable>
        <input type="text" name="salery" value="<?php echo $job->salery; ?>" class="form-control"><br>
        <lable>Location</lable>
        <input type="text" name="location" value="<?php echo $job->location; ?>" class="form-control"><br>
        <lable>Contact user</lable>
        <input type="text" name="contact_user" value="<?php echo $job->contact_user; ?>" class="form-control"><br>
        <lable>Contact email</lable>
        <input type="email" name="contact_email" value="<?php echo $job->contact_email; ?>" class="form-control"><br>
        <input type="submit" name="update" value="Update" class="btn btn  btn-primary mb-2">
        </div>
        <?php endforeach;  ?>
    </form>    
    

</div>

</div>
   <?php require_once("includes/footer.php"); ?>
