<nav class="navbar navbar-inverse navbar-fixed-top ">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      <li>
        <a href="index.php">Admin</a>
         </li>
             <?php 
                   
            if($session->is_signed_in()){

                 include("loged.php"); 
        
            }else{

            include("notloged.php");      
                        
            }
            ?>
    </div>
  </div>
</nav>
                