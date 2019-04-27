<?php
?>
<!DOCTYPE html>
<html>
<body>
  <div class="container">
  <form method="post" action="../mpesa/requestcheckout.php">
    <div class="row">
          Amount:<br>
          <div class="form-group">
              <input style="width:30%;" class="form-control" type="text"  placeholder="Enter Amount" name="amount">
          </div>
          Phonenumber:<br>
          <div class="form-group">
              <input style="width:30%;" class="form-control" type="text" name="number" placeholder="Enter Phone Number 254">
          </div>
         
          Pay via MPESA:
          <button type="submit" name="checkout" ><img src="../mpesa/m.jpg"></button>
    </div>        
  </form>    
  </div> 
<p>NB: Since this sample uses a real paybill number it makes real transactions. Hence encouraged to test with the lowest amount 10/=</p>
</body>
</html>
