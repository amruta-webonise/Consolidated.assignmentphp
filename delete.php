<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 24/9/12
 * Time: 6:34 PM
 * To change this template use File | Settings | File Templates.
 */

class Delete
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

}

$delete = new Delete();
$delete->ConnectToDatabase();


?>