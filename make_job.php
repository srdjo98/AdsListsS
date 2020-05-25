<?php require_once("includes/header.php"); ?>
<?php 



    if(!$session->is_signed_in()){

        redirect('index.php');

    }
    

    if(isset($_POST['submit'])  ){

        $id_category = $_POST['id_category'];
        if(ctype_digit($id_category)){

            if(!empty($id_category)  AND !empty($_POST['id_user']) AND !empty($_POST['company']) AND !empty($_POST['job_title']) AND !empty($_POST['description']) AND !empty($_POST['salery']) AND !empty($_POST['location']) AND !empty($_POST['contact_user']) AND !empty($_POST['contact_email'])){

                $newjob = new Job();
    
                $newjob->id_category = $_POST['id_category'];
                $newjob->id_user = $_POST['id_user'];
                $newjob->company = $_POST['company'];
                $newjob->job_title = $_POST['job_title'];
                $newjob->description = trim($_POST['description']);
                $newjob->salery = $_POST['salery'];
                $newjob->location = $_POST['location'];
                $newjob->contact_user = $_POST['contact_user'];
                $newjob->contact_email = $_POST['contact_email'];
                $newjob->created_at = date("Y-m-d H:i:s");
        
                if($newjob->create()){
        
                  
                    redirect("index.php");
        
                }else{
        
                    $message = "Something went wrong";
        
                }
    
            }else{
    
                $message = "Please fill in all fields";
    
            }




            
        }else{

            $message = "Please choose category !";

        }
        
        

    }else{
        
        $message = "";
        $id_user = "";
        $company = "";
        $job_title = "";
        $description = "";
        $salery = "";
        $location = "";
        $contact_user = "";
        $contact_email = "";
        $created_at = "";


        

    }



?>
<?php 
        $categorys = Category::find_all();

    ?>
<div class="container" style="margin-top : 50px;">
    <div class="row ">
    
    <div class="col-md-6 col-xl-6 col-3">
    <form  action="" method="post">
        
        <h1>Create new Job offer</h1>
        <h4 class="bg-danger"><?php echo $message; ?></h4>
        <div class="form-group">
        <select name="id_category" class="form-control">
        <option>Choose categorty</option>
        <?php foreach($categorys as $category): ?>
        <option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
        <?php endforeach; ?>
        </select>
        </div><br>
        <div class="form-group">
        <?php $user = User::find_by_id($session->user_id);
        
        foreach($user as $value):
        
        ?>
        <input type="hidden" name="id_user" value="<?php echo $session->user_id; ?>"> 
        <lable for="company">Company name</lable>
        <input type="text" class="form-control" value="<?php echo $value->company; ?>" name="company" ><br>
        <lable for="job_title">Job title</lable>
        <input type="text" class="form-control" name="job_title" ><br>
        <lable for="description">Description</lable>
        <textarea name="description" class="form-control" ></textarea> <br>
        <lable for="salery">Salery</lable>
        <input type="text" name="salery" class="form-control"  class="form-control"><br>
        <lable for="location">Location</lable>
        <input type="text" name="location" class="form-control"  class="form-control"><br>
        <lable for="contact_user">Contact phone</lable>
        <input type="text" name="contact_user"  class="form-control" value="<?php echo $value->contact_phone; ?>" class="form-control"><br>
        <lable for="contact_email">Contact email</lable>
        <input type="email" name="contact_email" class="form-control" value="<?php echo $value->contact_email; ?>" class="form-control"><br>
        <input type="submit" name="submit" value="Submit" class="btn btn  btn-primary mb-2">
        <?php endforeach; ?>
        </div>
    </form>
    </div>
    <div class="col-md-6 col-xl-6 col-12">
    <h1>Your job listings</h1>
    <div class="float-right">
    <?php $jobs = Job::find_by_id_user($session->user_id); ?>
 
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Company Name</th>
      <th scope="col">Job Title</th>
      <th scope="col">Description</th>
      <th scope="col">Salery</th>
      <th scope="col">Location</th>
    </tr>
  </thead>
  <?php foreach($jobs as $job): ?>
  <tbody>
    <tr>
      <th scope="row">-</th>
      <td><?php echo $job->company; ?></td>
                <td><?php echo $job->job_title; ?></td>
                <td><?php echo $job->description; ?></td>
                <td><?php echo $job->salery; ?></td>
                <td><?php echo $job->location; ?></td>
                <td>
                <a href="view_job?id=<?php echo $job->id ?>" class="btn btn-primary">Update</a>
                <a href="delete_job?id=<?php echo $job->id ?>" class="btn btn-danger">Delete</a>
                </td>
    </tr>
</tbody>
<?php endforeach; ?>
        
    </table>
    </div>
    </div>
</div>
</div>

   <?php require_once("includes/footer.php"); ?>
