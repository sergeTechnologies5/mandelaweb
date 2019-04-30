<?php
    include('header.html');
?>
<?php
include_once("config/config.php");
session_start();
session_unset();
session_destroy();
$bdd = new db(); // create a new object, class db()


     //admins
$admins = 'CREATE TABLE IF NOT EXISTS groups (
   id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   groupname VARCHAR(100) NOT NULL,
   groupdescription VARCHAR(100) NOT NULL,
   target VARCHAR(100) NOT NULL,
   admin_id INT NOT NULL,
   date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
   date_modified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
   )';
   try{
    $response = $bdd->execute($admins); 
    $count = count($bdd->getAll("SELECT * FROM groups"));
    if($count<1){
      $groupname = "group one";
      $groupdescription = "group one";
      $target = 0;
      
      $query = "INSERT INTO groups (groupname,admin_id,groupdescription,target) VALUES ('$groupname','1','$groupdescription','$target')";
      $response = $bdd->execute($query);
      
    }else{
      
    }
    	
 } catch (Exception $e) {
 echo 'Caught exception: ',  $e->getMessage(), "\n";
 }
   //members
   $members = 'CREATE TABLE IF NOT EXISTS members (
      id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
      firstname VARCHAR(100) NOT NULL,
      group_id INT NOT NULL,
      role_id INT NOT NULL,
      nationalid VARCHAR(100) NOT NULL,
          password VARCHAR(100) NOT NULL,
          email VARCHAR(100) NOT NULL,
          lastname VARCHAR(100) DEFAULT "",
          phonenumber VARCHAR(100) NOT NULL,
          description VARCHAR(1000) DEFAULT "",
          FOREIGN KEY (group_id) REFERENCES groups(id) ON DELETE CASCADE,
      date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
      date_modified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      )';
      try{
       $response = $bdd->execute($members);  
       $count = count($bdd->getAll("SELECT * FROM members"));
       if( $count<1){
         $phonenumber = "070000";
         $nationalid = "00000";
         $lastname = "admin";
          $firstname = "admin";
          $lastname = "admin";;
          $email = "admin@gmail.com";;
          $password = "admin";
          $description = "admin";;
          $role_id = 1;
          $group_id = 1;
          
          $query = "INSERT INTO members (phonenumber,nationalid,group_id,firstname,lastname,description,email,password,role_id) values('$phonenumber','$nationalid','$group_id','$firstname','$lastname','$description','$email','$password','$role_id')";
              try {
               $response = $bdd->execute($query);
            } catch (Exception $e) {}
       }else{
         
       }
    } catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    //loans
    $loans = 'CREATE TABLE IF NOT EXISTS loans (
      id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
      description VARCHAR(1000) NOT NULL,
      status VARCHAR(1000) NOT NULL,
      amount int NOT NULL,
      group_id INT NOT NULL,
      user_id INT NOT NULL,
      FOREIGN KEY (user_id) REFERENCES members(id) ON DELETE CASCADE,
      FOREIGN KEY (group_id) REFERENCES groups(id) ON DELETE CASCADE,
      date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
      date_modified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      )';
     
   
      try {
          $response = $bdd->execute($loans);
      } catch (Exception $th) {
          echo $th->getMessage();
      }
    
    //comments
$comments = 'CREATE TABLE IF NOT EXISTS comments (
   id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   comments VARCHAR(1000) NOT NULL,
   group_id INT NOT NULL,
   user_id INT NOT NULL,
   FOREIGN KEY (user_id) REFERENCES members(id) ON DELETE CASCADE,
         FOREIGN KEY (group_id) REFERENCES groups(id) ON DELETE CASCADE,
   date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
   date_modified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
   )';
  

   try {
       $response = $bdd->execute($comments);
   } catch (Exception $th) {
       echo $th->getMessage();
   }
 
//transations
$transations = 'CREATE TABLE IF NOT EXISTS transations (
   id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   amount INT NOT NULL,
   group_id INT NOT NULL,
      user_id INT NOT NULL,
   phonenumber VARCHAR(100) NOT NULL,
      FOREIGN KEY (user_id) REFERENCES members(id) ON DELETE CASCADE,
   FOREIGN KEY (group_id) REFERENCES groups(id) ON DELETE CASCADE,
   date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
   date_modified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)';
   try{
       $response = $bdd->execute($transations); 
        
 } catch (Exception $e) {
 echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

   if(isset($_POST['nationalid'])&&isset($_POST['phonenumber'])&&isset($_POST['firstname'])&&isset($_POST['lastname'])&&isset($_POST['email'])&&isset($_POST['description'])&&isset($_POST['password'])&&isset($_POST['signup']))
   {
      $phonenumber = $_POST['phonenumber'];
      $nationalid = $_POST['nationalid'];
      $lastname = $_POST['lastname'];
       $firstname = $_POST['firstname'];
       $lastname = $_POST['lastname'];
       $email = $_POST['email'];
       $password = $_POST['password'];
       $description = $_POST['description'];
       $role_id = 1;
       $group_id = 1;
       
       $query = "INSERT INTO members (phonenumber,nationalid,group_id,firstname,lastname,description,email,password,role_id) values('$phonenumber','$nationalid','$group_id','$firstname','$lastname','$description','$email','$password','$role_id')";
           try {
            
            $response = $bdd->execute($query);	
            if($response ==1){
                echo("Account Created Successfully!!");
                header('location:dashboard/');
            }else{
                echo"Error Creating Account Try Again!!";  
            }
           } catch (Exception $e) {
              echo"The error is : ",$e->getMessage();
           }    
   }else{
      echo("FILL ALL FIELDS");
   }
?>
<div class="container">  
   <div class="row">
   <form action="register.php" method="POST" class="form-horizontal" role="form">
   <div class="form-group">
      <label for="firstname" class="col-sm-4 control-label">Phone Number</label>
      <div class="col-sm-4">
         <input type="text" class="form-control" name="phonenumber" 
            placeholder="Enter Phone Number">
      </div>
   </div>
   <div class="form-group">
      <label for="firstname" class="col-sm-4 control-label">National ID</label>
      <div class="col-sm-4">
         <input type="text" class="form-control" name="nationalid" 
            placeholder="Enter National ID">
      </div>
   </div>
   <div class="form-group">
      <label for="firstname" class="col-sm-4 control-label">First Name</label>
      <div class="col-sm-4">
         <input type="text" class="form-control" name="firstname" 
            placeholder="Enter Admin First Name">
      </div>
   </div>
   <div class="form-group">
      <label for="lastname" class="col-sm-4 control-label">Last Name</label>
      <div class="col-sm-4">
         <input type="text" class="form-control" name="lastname" 
            placeholder="Enter Admin Last Name">
      </div>
   </div>
   <div class="form-group">
      <label for="lastname" class="col-sm-4 control-label">Admin Email</label>
      <div class="col-sm-4">
         <input type="email" class="form-control" name="email" 
            placeholder="Enter Admin Email">
      </div>
   </div>
  
   <div class="form-group">
        <label for="lastname" class="col-sm-4 control-label">Description</label>
            <div class="col-sm-4">
                <textarea  class="form-control" name="description" placeholder="Describe Group"></textarea>
            </div>
   </div>
   <div class="form-group">
        <label for="lastname" class="col-sm-4 control-label">Admin Password</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" name="password" placeholder="Enter Password">
            </div>
   </div>
   <div class="form-group">
      <div class="col-sm-offset-4 col-sm-4">
         <button name="signup" type="submit" class="btn btn-default">Create Account</button>
      </div>
   </div>
</form>

   </div>

</div>

<?php
include('footer.html');
?>