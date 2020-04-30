<?php require_once("includes/header.php"); ?>
<?php 

    if($session->is_signed_in()){

    redirect("index.php");

    }elseif(isset($_POST['submit'])){

        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        $user_found = User::verify_user($username,$password);
        
        if($user_found){

            $session->login($user_found);
            redirect('make_job.php');

        }elseif($user_found = User::check_admin($username,$password)){

            $session->login($user_found);
            redirect('admin/index.php');

        }else{

            $message = "Your username or password is incorrect!";

        }

    }else{

        $message = "";
        $username = "";
    }


?>
<div class="container " style="margin-top : 100px;" >
<div  class="row" >
    <div class="col-md-4 col-xl-4 col-12" style="margin-left: 25%;">
    <h4 class="bg-danger"><?php echo $message; ?></h4>
    <form method="post" action="login.php" class="form-group">
        <lable>Username</lable>
        <input type="text" name="username" class="form-control">
        <lable>Password</lable>
        <input type="password" name="password" class="form-control"><br>
        <input type="submit" name="submit" class="btn btn-primary" value="Login">
        <a href="register.php" class="btn btn-info float-right" style="margin-left:217px">Register</a>
    </form>
    
    </div>
</div>
</div>
    <?php require_once("includes/footer.php"); ?>