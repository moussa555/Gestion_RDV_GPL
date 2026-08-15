        <?php
            $hostname="localhost"; // Host name 
            $Mysqlusername="root"; // Mysql username 
            $Mysqlpassword=""; // Mysql password 
            $db_name="rdvgpl"; // Database name 

            $con = mysqli_connect("$hostname", "$Mysqlusername", "$Mysqlpassword");
            mysqli_select_db($con, "$db_name");
        ?>