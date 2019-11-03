<?php
session_start();
if(isset($_POST['user_login']))
	{
		$username= $_POST['username'];
		$password= $_POST['pass'];

		require('connect.php');

		$user_login_query= "SELECT * from customers WHERE username = '$username' AND pass = '$password'";
        $result=mysqli_query($conn, $user_login_query);
        $count= mysqli_num_rows($result);
		if($count==1)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$_SESSION['id']= $row['customerid'];
				$_SESSION['username']= $row['name'];
				$_SESSION['contactnumber']=$row['contactnumber'];
				$_SESSION['address']= $row['address'];
                $_SESSION['login_state']=true;
			}
			header('location:../index.php?auth=true');

		}
		else
		{
			header('location:../index.php?auth=false');
		}
	}
?>