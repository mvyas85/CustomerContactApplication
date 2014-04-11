<!DOCTYPE html>
<html>
    <head>
        <title>Add Contact</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
        <?php
        $dbc = mysqli_connect('localhost', 'root'  , 'aeroplane105', 'customerdb') or die('Error  connecting to MySQL');
        
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        
        $query = "Insert into Contacts (first_name,last_name,email_address) values ('$firstname','$lastname','$email')";
        mysqli_query($dbc, $query) or die('Error Quering Database');
        
        echo 'Contact Added Sucessfully';
        mysqli_close($dbc);
        ?>
    </body>
</html>
