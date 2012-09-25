<?php
$hostname = 'localhost';
$username = 'root';
$password = 'root';

class Delete
{

    function DeleteUser($emp_id)
    {
        $hostname = 'localhost';
        $username = 'root';
        $password = 'root';
        $link = @mysql_connect($hostname, $username, $password);
        if(is_resource($link))
        {
            /*** if we are successful ***/
            echo 'Connected successfully<br/>';
            $db = mysql_select_db('test', $link);
            echo $emp_id;
            $sql= 'DELETE from employees where emp_id='.$emp_id;
            if(mysql_query($sql, $link))
            {
                echo '<br/>Record Deleted<br />';
            }
            else
            {
                echo 'error';
            }

        }


}

}
$deleteObject = new Delete();


$emp_id = $_GET['id'];


$deleteObject->DeleteUser($emp_id);


?>