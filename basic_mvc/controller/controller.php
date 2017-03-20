<?php

/**
*  Controller class - MVC
*/
class Controller
{
	protected $model;

	public function __construct()
	{
		$this->model = new Model();	
	}

	public function main()
	{
		if(!isset($_SESSION['role'])||empty($_SESSION['role'])||is_null($_SESSION['role']))
		{
			// Set SESSION 'role' if there is none
			$_SESSION['role'] = 'guest';
			// Retrieve html page
			include('view/login.php');
			// Display template of the page
			$this->templateDisplay($content);
			// Call function to authenticate user
			$this->signIn();
		}
		elseif($_SESSION['role']=='guest')
		{
			include('view/login.php');
			$this->templateDisplay($content);
			$this->signIn();
		}
		elseif($_SESSION['role']=='regular'||$_SESSION['role']=='admin')
		{
			include('view/main.php');
			$this->templateDisplay($content);
		}
	}

	// Function to display template header and footer
	public function templateDisplay($content)
	{
		include('view/template.php');
	}

	// Function to authenticate user
	public function signIn()
	{
		if(isset($_POST['submit_login']))
		{
			$users = file_get_contents('data/users.json');
			$users = json_decode($users, true);
			foreach ($users as $key => $user) 
			{
				if($user['username']==$_POST['username']&&$user['password']==sha1($_POST['password']))
				{
					$_SESSION['username'] = $user['username'];
					$_SESSION['role'] = $user['role'];
					echo "<script>window.href.location='view/main.php';</script>";
				}
				else
				{
					header("Refresh:0");
				}
			}
		}
	}





}




?>