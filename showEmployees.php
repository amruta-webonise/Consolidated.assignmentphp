<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 24/9/12
 * Time: 2:55 PM
 * To change this template use File | Settings | File Templates.
 */
class Show
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
          //  echo 'Connected successfully';
            $db = mysql_select_db('test', $link);
        }
        else
        {
        //    echo 'connection failed';
        }
    }

    function display()
    {
     //   echo 'inside display';
        $sql = "SELECT * FROM employees";

        /*** run the query ***/
        $result = mysql_query($sql);

        if(mysql_num_rows($result) !== 0)
        {
            echo '<a href = "registrationForm.php">Add User</a><br/>';
            echo "emp_id \t name \t email \t address <br/>";
$i=0;
            while($row=mysql_fetch_array($result))
            {
                echo '<tr>
                    <td>'.$row['emp_id'].'</td>|
                    <td>'.$row['name'].'</td>|
                    <td>'.$row['email'].'</td>|
                    <td>'.$row['age'].'</td>|
                    <td>'.$row['gender'].'</td>|
                    <td>'.$row['address'].'</td>|
                    <td>'.$row['pincode'].'</td>|
                    <td>'.$row['description'].'</td>|
                    <td>'.$row['photo']."</td>
                    <td><img src = 'http://spikefour.webonise.com/photos/".$row['photo']."'width=100 height=100></td>";

                    echo '<form name="edit" action="http://spikefour.webonise.com/edit.php" method="get">
                <input type="hidden" name="id" value="'.$row['emp_id'].'" />
             <input type="submit" value="edit" />
              </form>';
                echo '<form name="delete" action="http://spikefour.webonise.com/delete.php" method="get">
                <input type="hidden" name="id" value="'.$row['emp_id'].'" />
             <input type="submit" value="delete" />
              </form>';


            }
            


        }
    }
}

$data = new Show();
$data->ConnectToDatabase();
$data->display();

?>