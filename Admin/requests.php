<?php
include('../db_connect.php');
Define('Title', 'Requests');
Define('PAGE', 'requests');

 if(isset($_SESSION['isadlogin']))
 {
  $adEmail = $_SESSION['aEmail'];  
 }
 else
 {
  header('location:login.php');  
 }
include('header.php');
?>

<div class="col-sm-4 mb-5">

   <?php

    $query = "SELECT * FROM user_submit";
 $res = mysqli_query($con, $query);

 if(mysqli_num_rows($res)>0)
 {

    $count = 0;
    while($row = mysqli_fetch_assoc($res))
   {
      echo '<div class="card mx-4 mt-4">';
      echo  '<div class="card-header">Request ID: '.$row["request_id"].'</div>'; 

      echo '<div class="card-body">';
      echo '<h6 class="card-title">Request Info: '.$row["request_info"].'</h6>';
      echo '<p class="card-text">'.$row["request_desc"].'</p>';
      echo '<p class="card-text">Request Date: '.$row["request_date"].'</p>';
      echo '<div class="float-right">';

      echo '<form action="" method="POST">';
      echo '<input type="hidden" name="id" value='.$row["request_id"].'>';
      echo '<input type="submit" class="btn btn-primary mr-3" value="View" name="view">';
      echo '<input type="submit" class="btn btn-secondary" value="Close" name="close">';

      echo '  </form>
              </div>
               </div>
               </div>';
               $count++;
   }  
   $_SESSION['req'] = $count; 

  
 }
 else
 {
 	echo '0 requests';
 }
  
   ?>
</div>
  
<?php
include('assignworkform.php');
?>

<?php include('footer.php'); ?>