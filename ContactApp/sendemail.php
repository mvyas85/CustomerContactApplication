<!DOCTYPE html>
<html>
    <head>
        <title>Send mail</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
        <?php
            require_once 'Mail.php'; 
            require_once 'Mail/RFC822.php'; 

            $dbc = mysqli_connect('localhost','root','aeroplane105','customerdb') or die('Error connecting to MySQL server.'); 

            $from = 'ken@mycompany.com'; 
            $subject =$_POST['subject'];
            $text= $_POST['messege']; 

            $smtp = array(); 
            $smtp['host'] = 'ssl://smtp.gmail.com'; 
            $smtp['port'] = 465; 
            $smtp['auth'] = true; 
            $smtp['username'] = 'mvyas85@gmail.com'; 
            $smtp['password'] = 'aeroplane100'; 

            $mailer = Mail::factory('smtp', $smtp); 
            $recipients = array(); 

            // Set the headers 
            $headers = array(); 
            $headers['From'] = 'ken@mycompany.com'; 
            
            $query = "SELECT * FROM contacts"; 
            $result = mysqli_query($dbc, $query) or die('Error querying database.'); 

            while ($row = mysqli_fetch_array($result)) { 

            $to = $row['email_address']; 
            $first_name = $row['first_name']; 
            $last_name = $row['last_name']; 
            $msg = "Dear $first_name $last_name,\n$text"; 
            $headers['To'] = $to; 
            $headers['Subject'] = $subject; 

            $mailer->send($to, $headers, $msg); 

            echo 'Email sent to: ' . $to . '<br />'; 
            }   
            mysqli_close($dbc);
        ?>
    </body>
</html>
