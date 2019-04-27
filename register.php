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
$admins = 'CREATE TABLE IF NOT EXISTS admins (
   id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   firstname VARCHAR(100) NOT NULL,
         password VARCHAR(100) NOT NULL,
         email VARCHAR(100) NOT NULL,
         lastname VARCHAR(100) DEFAULT "",
         description VARCHAR(1000) DEFAULT "",
   date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
   date_modified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
   )';
   try{
    $response = $bdd->execute($admins);  
 } catch (Exception $e) {
 echo 'Caught exception: ',  $e->getMessage(), "\n";
 }
   //members
   $members = 'CREATE TABLE IF NOT EXISTS members (
      id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
      firstname VARCHAR(100) NOT NULL,
      group_id INT NOT NULL,
      nationalid VARCHAR(100) NOT NULL,
          password VARCHAR(100) NOT NULL,
          email VARCHAR(100) NOT NULL,
          lastname VARCHAR(100) DEFAULT "",
          phonenumber VARCHAR(100) NOT NULL,
          description VARCHAR(1000) DEFAULT "",
          FOREIGN KEY (group_id) REFERENCES admins(id) ON DELETE CASCADE,
      date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
      date_modified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      )';
      try{
       $response = $bdd->execute($members);  
    } catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

    //comments
$comments = 'CREATE TABLE IF NOT EXISTS comments (
   id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   comments VARCHAR(1000) NOT NULL,
   group_id INT NOT NULL,
   user_id INT NOT NULL,
   FOREIGN KEY (user_id) REFERENCES members(id) ON DELETE CASCADE,
         FOREIGN KEY (group_id) REFERENCES admins(id) ON DELETE CASCADE,
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
   FOREIGN KEY (group_id) REFERENCES admins(id) ON DELETE CASCADE,
   date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
   date_modified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)';
   try{
       $response = $bdd->execute($transations); 
        
 } catch (Exception $e) {
 echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

   if(isset($_POST['firstname'])&&isset($_POST['lastname'])&&isset($_POST['email'])&&isset($_POST['description'])&&isset($_POST['password'])&&isset($_POST['signup']))
   {
       
       $firstname = $_POST['firstname'];
       $lastname = $_POST['lastname'];
       $email = $_POST['email'];
       $password = $_POST['password'];
       $description = $_POST['description'];

       
       
       $query = "INSERT INTO admins (firstname,lastname,description,email,password) values('$firstname','$lastname','$description','$email','$password')";
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