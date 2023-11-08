<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment-1</title>
</head>
<link rel="stylesheet" href="form.css">
<body>
    
    <div class="container">
        <div class="text">
           User Information
        </div>
        <form action="form.php" method = "post">
           <div class="form-row">
              <div class="input-data">
                 <input type="text" name="name" required>
                 <div class="underline"></div>
                 <label for="">First Name</label>
              </div>
              <!-- <div class="input-data">
                 <input type="text" required>
                 <div class="underline"></div>
                 <label for="">Last Name</label>
              </div> -->
           </div>
           <div class="form-row">
              <div class="input-data">
                 <input type="email" name="email" required>
                 <div class="underline"></div>
                 <label for="">Email Address</label>
              </div>
              <!-- <div class="input-data">
                 <input type="text" required>
                 <div class="underline"></div>
                 <label for="">Website Name</label>
              </div> -->
           </div>
           <!-- <div class="form-row">
           <div class="input-data textarea">
              <textarea rows="8" cols="80" required></textarea>
              <br />
              <div class="underline"></div>
              <label for="">Write your message</label>
              <br /> -->

              <label for="">City : </label>
              <select name="city">
                  <option value="banglore" name="city" selected>Banglore</option>
                  <option value="mumbai" name="city" selected>Mumbai</option>
                  <option value="nagpur" name="city" selected>Nagpur</option>
                  <option value="las vegas" name="city" selected>Las Vegas</option>
              </select><br><br>
      
              <label for="">Gender :  </label>
              <input type="radio" name="gender" value="male" > Male
              <input type="radio" name="gender" value="female" > Female
              <input type="radio" name="gender" value="other" > Other<br><br>

              <div class="form-row submit-btn">
                 <div class="input-data">
                    <div class="inner"></div>
                    <input type="submit" value="submit">
                 </div>
              </div>
        </form>
        </div>

        <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
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
        $sql = "INSERT INTO `user info.` (`Sr. Number`, `Name`, `Email`, `City`, `Gender`, `Date`) VALUES (NULL, '$name', '$email' , '$city', '$gender', current_timestamp())";
        $result = mysqli_query($conn, $sql);
 
        if($result){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your entry has been submitted successfully!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"></span>
          </button>
        </div>';
        }
        else{
            // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"></span>
          </button>
        </div>';
        }

      }

    }

    
?>

</body>
</html>

