<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 24/9/12
 * Time: 12:06 PM
 * To change this template use File | Settings | File Templates.
 */

$hostname = 'localhost';
$username = 'root';
$password = 'root';

class Form
{

    function ConnectToDatabase()
    {
        $hostname = 'localhost';
        $username = 'root';
        $password = 'root';
        $link = @mysql_connect($hostname, $username, $password);
        if(is_resource($link))
        {
            /*** if we are successful ***/
            echo 'Connected successfully';
            $db = mysql_select_db('test', $link);
        }
        else
        {
            echo 'connection failed';
        }
    }

    function EditUser($emp_name,$emp_age,$emp_gender,$emp_email,$emp_address,$emp_pincode,$emp_description,$emp_id)
    {
        $uploaddir = '/home/webonise/Projects/php/app2012/ConsolidatedAssignment/photos/';
        $uploadfile = $uploaddir . basename($_FILES['photo']['name']);
        $file= $_FILES['photo']['name'];
        echo $uploadfile;
        echo '<pre>';
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile))
        {
            echo "File is valid, and was successfully uploaded.\n";
            $sql = 'UPDATE employees SET name="'.$emp_name.'",age='.$emp_age.',gender="'.$emp_gender.'",email="'.$emp_email.'",address="'.$emp_address.'",pincode='.$emp_pincode.',description="'.$emp_description.'",photo="'.$file.'" WHERE emp_id='.$emp_id.' ';
            echo $sql;
            echo $emp_name;
            echo $emp_id;

            if(mysql_query($sql))
            {
                echo'<br/>values inserted';
            }


        }
        else {
            echo "file upload error\n";
            print_r($_FILES);
        }
    }

}

$formObject = new Form();
$formObject->ConnectToDatabase();
$emp_name = $_POST['name'];
$emp_id = $_POST['id'];
$emp_age = $_POST['age'];
$emp_gender = $_POST['gender'];
$emp_email = $_POST['email'];
$emp_address = $_POST['address'];
$emp_pincode = $_POST['pincode'];
$emp_description = $_POST['description'];
$emp_photo = $_POST['photo'];

$formObject->EditUser($emp_name,$emp_age,$emp_gender,$emp_email,$emp_address,$emp_pincode,$emp_description,$emp_id);

?>
