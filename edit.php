
/**
* Created by JetBrains PhpStorm.
* User: webonise
* Date: 24/9/12
* Time: 3:56 PM
* To change this template use File | Settings | File Templates.
*/
<html>
<head>
    <title>Registration form</title>
    <link rel="stylesheet" href="/css/general.css" type="text/css" media="screen" />
    <script language="JavaScript" type="text/JavaScript">

        function checkForm(thisform)
        {
            var emailid = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
            var reg_age = /^[0-9]{1,2}$/;
            var reg_pin = /^[0-9]{6}$/;
            var reg_name = /^[a-zA-z ]+$/;

            //checking if name  field is left blank
            if(thisform.name.value=='')
            {
                alert("Please enter a name..");
                return false;
            }
            if (!(thisform.name.value.match(reg_name)))
            {
                alert('Invalid name!');
                return false;
            }
            //checking if age field is left blank
            if(thisform.age.value=='')
            {
                alert("age field is required. Please fill it in.");
                return false;
            }
            //validating age field is integer
            if (!(thisform.age.value.match(reg_age)))
            {
                alert('Invalid age!');
                return false;
            }
            //validating email-id as per standard form
            if(!(thisform.email.value.match(emailid)))
            {
                alert("Email field is wrong. Please fill it in.");
                return false;
            }
            //checking if address field is left blank
            if(thisform.address.value=='')
            {
                alert("Address field is required. Please fill it in.");
                return false;
            }

            //checking if pincode field is left blank
            if(thisform.pincode.value=='')
            {
                alert("pincode field is required. Please fill it in.");
                return false;
            }
            //validating pincode field is integer
            if (!(thisform.pincode.value.match(reg_pin)))
            {
                alert('Invalid pincode!');
                return false;
            }

            //checking if description field is left blank
            if(thisform.description.value=='')
            {
                alert("Description is required. Please fill it in.");
                return false;
            }

            //if all validations are successful return true
            return true;

        }
    </script>
    <?php
    $row=null;
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

    $id = $_GET['id'];
    $query= "SELECT * FROM employees WHERE emp_id=".$id;
    $result = mysql_query($query);
    $row=mysql_fetch_array($result);

    ?>
    <h1><u>Employee Registration form </u></h1>
</head>
<body>
<div id="container">
    <form  id="registration" action="editServer.php" method="post" enctype="multipart/form-data">
        <br/> <br/>

        <div>
            <label for="name">Name</label>
            <input id="name" name="name" type="text" value=<?php echo $row['name'];?> />
            <span >What's your name?</span>
        </div>

        <div>
            <label for="age">Age</label>
            <input id="age" name="age" type="text" value=<?php echo $row['age'];?> />
            <span >How old are you?</span>
        </div>

        <div >
            <label for="gender">Gender:&nbsp;Male<input type="radio" id="male" name="gender" value="male" checked="checked">
                &nbsp;Female<input type="radio" id="female" name="gender" value="female"></label>

        </div>

        <div>
            <label for="email">Email-Id</label>
            <input id="email" name="email" type="text" value=<?php echo $row['email'];?> />
            <span >Where can we mail you?</span>
        </div>

        <div>
            <label for="address">Address</label>
            <input id="address" name="address" type="text" value=<?php echo $row['address'];?> />
            <span >You put up at..?</span>
        </div>

        <div>
            <label for="pincode">Pincode</label>
            <input id="pincode" name="pincode" type="text"                     echo '<form name="edit" action="http://spikefour.webonise.com/edit.php" method="get">
            <input type="hidden" name="id" value="'.$row['emp_id'].'" />/>
            <span >Zip Code..!</span>
        </div>

        <div >
            <label for="hobbies">Hobbies:&nbsp;<input type= "checkbox" id="singing" name="hobbies" value="singing" >Singing<br/>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;<input type="checkbox" id="reading" name="hobbies" value="reading">Reading</label>

        </div>

        <div>
            <label for="description">About yourself</label>
            <textarea rows="1" cols="70" id="description" name="description"></textarea>
            <span >Help us know more about you..</span>
        </div>

        <div>
            <label for="photo">Upload photo</label>

            <input id="photo" name="photo" type="file" />
            <span ></span>
        </div>
        <div>
            <input type="hidden" name="id" value=<?php echo $row['emp_id'];?> />
        </div>

        <div>
            <input type="submit" id="submit" onclick=" return checkForm(this.form)" value="Submit" name="submit" />

        </div>

    </form>

    <form  id="fetch" action="showEmployees.php" method="get">
        <input type="submit" id="showEmployees" value="showEmployees" name="showEmployees"/>
    </form>

</div>

</body>
</html>
