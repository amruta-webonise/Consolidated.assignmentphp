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

class FormTest
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

    function AddUser($emp_name,$emp_age,$emp_gender,$emp_email,$emp_address,$emp_pincode,$emp_description)
    {
        $uploaddir = '/home/webonise/Projects/php/app2012/ConsolidatedAssignment/photos/';
        $uploadfile = $uploaddir . basename($_FILES['photo']['name']);
    echo $uploadfile;
        echo '<pre>';
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
            echo "File is valid, and was successfully uploaded.\n";
            $sql = "INSERT
                INTO
                employees(
                name,
                age,
                gender,
                email,
                address,
                pincode,
                description,
                photo)
                VALUES (
                '{$emp_name}',
                '{$emp_age}',
                '{$emp_gender}',
                '{$emp_email}',
                '{$emp_address}',
                '{$emp_pincode}',
                '{$emp_description}',
                '{$_FILES['photo']['name']}')";

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

$formObject = new FormTest();
$formObject->ConnectToDatabase();
$emp_name = $_POST['name'];
$emp_age = $_POST['age'];
$emp_gender = $_POST['gender'];
$emp_email = $_POST['email'];
$emp_address = $_POST['address'];
$emp_pincode = $_POST['pincode'];
$emp_description = $_POST['description'];
$emp_photo = $_POST['photo'];

$formObject->AddUser($emp_name,$emp_age,$emp_gender,$emp_email,$emp_address,$emp_pincode,$emp_description);

?>
