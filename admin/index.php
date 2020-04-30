<?php require_once("includes/header.php"); ?>
<?php 



    if(!$session->is_signed_in()){

        redirect('index.php');

    }elseif(isset($_POST['submit'])){

        
        $name = $_POST['category'];

        $category_found = Category::verify_category($name);
        
        if($category_found){

            
            $message = "Category already exists";
            

        }else{

           if(!empty($_POST['category'])){

            $newcategory = new Category();
        
            
            $newcategory->id = rand(1,100);
            $newcategory->name = $name;
        
            $newcategory->create();

            $message = "Added new category";


           }else{

            $message = "Please fill in the field!";

           }
            
        }

    }elseif(isset($_POST['delete'])){
     
        if(is_numeric($_POST['id_category'])){

            $id_category = $_POST['id_category'];
            
            $categorys = Category::find_by_id($id_category);

            foreach($categorys as $category){

                $id = $category->id;

            }

            if($category->delete()){

                $message = "Category deleted !";

            }else{
    
                redirect("index.php");
    
            }
    
        }

    }else{

        $message = "";

    }
    



?>
<?php 
        $categorys = Category::find_all();

    ?>
<div class="container" style="margin-top : 150px;">
    <div class="row ">
    
    <div class="col-md-6 col-xl-6 col-3">
    <form  action="" method="post">
        
        <h1>Add new Categoryy</h1>
        <h3 class="text-danger"><?php echo $message; ?></h3>
        <div class="form-group">
        <select name="id_category" class="form-control">
        <option>See categortys</option>
        <?php foreach($categorys as $category): ?>
        <option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
        <?php endforeach; ?>
        </select>
        </div><br>
        <div class="form-group">
        <input type="hidden" name="id_user" value="<?php echo $session->user_id; ?>"> 
        <lable for="category">Category name</lable>
        <input type="text" class="form-control" name="category"  class="form-control "><br>
        <input type="submit" name="submit" value="Submit" class="btn btn  btn-primary mb-2">
        <input type="submit" name="delete" value="Delete" class="btn btn  btn-danger mb-2 float-right">
        </div>
    </form>
    </div>
    <div class="col-md-6 col-xl-6 col-12">
    <h1>Your user list</h1>
    <div class="float-right">
    <?php $users = User::find_all(); ?>
 
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username</th>
      <th scope="col">Contact email</th>
      <th scope="col">Contact user</th>
    </tr>
  </thead>
  <?php foreach($users as $user): ?>
  <tbody>
    <tr>
      <th scope="row">-</th>
      <td><?php echo $user->username; ?></td>
                <td><?php echo $user->contact_email; ?></td>
                <td><?php echo $user->contact_phone; ?></td>
                <td>
                <a href="view_user?id=<?php echo $user->id ?>" class="btn btn-primary">view</a>
                <a href="user_delete?id=<?php echo $user->id ?>" class="btn btn-danger">Delete</a>
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
