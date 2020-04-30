<?php require_once("includes/header.php"); ?>
<?php 

    if(isset($_POST['submit'])){


            if(!empty($_POST['username'])  AND !empty($_POST['lastname']) AND !empty($_POST['password']) AND !empty($_POST['pib']) AND !empty($_POST['ind_number']) AND !empty($_POST['postal_code']) AND !empty($_POST['country']) AND !empty($_POST['city']) AND !empty($_POST['address']) AND !empty($_POST['contact_phone']) AND !empty($_POST['contact_email'])){


                $newuser = new User();

                global $database;

                $ajdi =mt_rand(1,100);

                $newuser->id =  $ajdi;
                $newuser->username = $database->espace_string($_POST['username']);
                $newuser->lastname = trim($database->espace_string($_POST['lastname']));
                $password = trim($database->espace_string($_POST['password']));
                $newuser->password =  md5($password);
                $newuser->company = $database->espace_string($_POST['company']);
                $newuser->admin = 0;
                $newuser->pib = (int)trim($database->espace_string($_POST['pib']));
                $newuser->ind_number = (int)trim($database->espace_string($_POST['ind_number']));
                $newuser->postal_code = (int)trim($database->espace_string($_POST['postal_code']));
                $newuser->country = trim($database->espace_string($_POST['country']));
                $newuser->city = trim($database->espace_string($_POST['city']));
                $newuser->address = trim($database->espace_string($_POST['address']));
                $newuser->contact_phone = trim($database->espace_string($_POST['contact_phone']));
                $newuser->contact_email = trim($database->espace_string($_POST['contact_email']));


                if(!(strlen($_POST['pib']) == 9) AND !(strlen($_POST['postal_code'] == 9)) ){

                    $message = "Please enter  9 numbers in pib and Identification number fields !";
                  
                }elseif($newuser->create()){

                    redirect('login.php');

                }else{

                    $message = "Something went wrong please try again !";

                }



            }else{

                $message =  "Please fll in all the fields !";


            }

            

        }else{

        $message = "";
      
        }


?>
<div class="container " style="margin-top : 20px;" >
<div  class="row" >
    
    <div class="col-md-4 col-xl-4 col-12" style="margin-left: 25%;">
    <h1 class="display-2" style="margin-left:105px">Register</h1><br>
    <h4 class="bg-danger"><?php echo $message; ?></h4>
    <form method="post" action="register.php" class="form-group">
        <lable>Frist Name</lable>
        <input type="text" name="username" class="form-control"><br>
        <lable>Last Name</lable>
        <input type="text" name="lastname" class="form-control"><br>
        <lable>Company Name</lable>
        <input type="text" name="company" class="form-control"><br>
        <lable>Pib</lable>
        <input type="text" name="pib" class="form-control"><br>
        <lable>Identification number Of Company</lable>
        <input type="text" name="ind_number" class="form-control"><br>
        <lable>Postal code</lable>
        <input type="number" name="postal_code" class="form-control"><br>
        <lable>Country</lable>
        <input type="text" name="country" class="form-control"><br>
        <lable>City</lable>
        <input type="text" name="city" class="form-control"><br>
        <lable>Address</lable>
        <input type="text" name="address" class="form-control"><br>
        <lable>Phone number</lable>
        <input type="text" name="contact_phone" class="form-control"><br>
        <lable>Email</lable>
        <input type="email" name="contact_email" class="form-control"><br>
        <lable>Password</lable>
        <input type="password" name="password" class="form-control"><br>
        <input type="submit" name="submit" class="btn btn-primary" value="Register">
        
    </form> 
    
    </div>
</div>
</div>
<?php require_once("includes/footer.php"); ?>