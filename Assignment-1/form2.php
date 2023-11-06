<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href = "form2.css">
<body>
    <div class="container">
        <div class="text">
            Contact us Form
        </div>
        <form action="form2.php" method = "post"> 
   <!-- <form action="#"> -->
      <div class="form-row">
         <div class="input-data">
            <input type="text" id = "name" required>
            <div class="underline"></div>
            <label for="">Name</label>
         </div>
      </div>
      <div class="form-row">
         <div class="input-data">
            <input type="text"  id = "email" required>
            <div class="underline"></div>
            <label for="">Email Address</label>
         </div>   

         <label for="">City :</label>
        <select name="country">
            <option value="country" selected>Russia</option>
            <option value="country" selected>United States</option>
            <option value="country" selected>France</option>
            <option value="country" selected>India</option>
        </select><br><br>

       
        <label for="">Gender :</label>
        <input type="radio" name="male" value="Male" />Male
        <input type="radio" name="female" value="Female" />Female
        <input type="radio" name="other" value="Other" />Other<br><br>

         <!-- <div class="input-data">
            <input type="text" required>
            <div class="underline"></div>
            <label for="">Website Name</label>
         </div> -->
      </div>
   
            <div class="form-row submit-btn">
               <div class="input-data">
                  <div class="inner"></div>
                  <input type="submit" value="submit">
               
   </form>

   <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $city = $_POST['city'];
        
      
      // Connecting to the Database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "userdata";

      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
      // Die if connection was not successful
      if (!$conn){
          die("Sorry we failed to connect: ". mysqli_connect_error());
      }
      else{ 
        // Submit these to a database
        // Sql query to be executed 
       $sql = "INSERT INTO `user info.` (`Name`, `Email`, `City`, `Gender`, `Date`) VALUES ( '$name', '$email', '$city', '$gender', current_timestamp()) ";
        $result = mysqli_query($conn, $sql);
 
        if($result){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your entry has been submitted successfully!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }
        else{
            // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }

      }

    }
?>

</div>
</body>
</html>