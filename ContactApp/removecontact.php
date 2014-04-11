<!DOCTYPE html>
<html>
    <head>
        <title>Remove Contact</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php
            $dbc = mysqli_connect('localhost', 'root', 'aeroplane105', 'customerdb' ) or die ('Error in Database Connection');
            
            $email = $_POST['email'];
            
            $query = "Delete from contacts where email_address ='$email'";
            
            mysqli_query($dbc, $query) or die('Error quering database');
            
            echo '<h2> customer removed ' .$email."</h2>";
            
            mysqli_close($dbc);
        ?>
    </body>
</html>
