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
		//var_dump(mysqli_fetch_assoc($result));
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
			$customer_id=$_SESSION['id'];
			//echo $customer_id;
			$customer_id_query= "SELECT * from orders where customerid='$customer_id' ";
			$result=mysqli_query($conn,$customer_id_query);
		   // $_SESSION['cooks_query_result']=mysqli_fetch_assoc($result);
			//$_SESSION['cooks_query_result']=implode('|',$_SESSION['cooks_query_result']);
			//var_dump($_SESSION['cooks_query_result']);
			$cookids=array();
			while($row = mysqli_fetch_array($result))
			{
				array_push($cookids,$row['cookid']);
				
			}
			var_dump($cookids);

			foreach ($cookids as $key)
			{
				$cook_name='';
				$cook_id='';
				$cook_contact='';
				$cook_query="SELECT cookid, name, contactnumber from cooks where cookid = '$key'";
				$result=mysqli_query($conn,$cook_query);
				while ($row=mysqli_fetch_assoc($result))
				{
					$cook_name=$row['name'];
					$cook_id=$row['cookid'];
					$cook_contact=$row['contactnumber'];
				}

				
				$cook_card.='<div class="card">
				<i class="fa fa-user" style="font-size:100px;"></i>
				<!-- <img src="./img.jpg" alt="John" style="width:100%"> -->
				<h1>'.$cook_name.'</h1>
				<p class="title">Conmbtact Number: '.$cook_contact.'</p>
				<code>Cook Id:'.$cook_id.'</code>
				<!-- <a href="#"><i class="fa fa-dribbble"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-linkedin"></i></a>
				<a href="#"><i class="fa fa-facebook"></i></a> -->
				<br><br>
				<p><button class="btn btn-success">Mark Attendance</button></p>
			</div>'
		;
				
				 
			}
			
			$_SESSION['cooks']=$cook_card;
			echo $_SESSION['cooks'];
			header('location:../index.php?auth=true');

		}
		else
		{
			header('location:../index.php?auth=false');
		}
	}
	

?>