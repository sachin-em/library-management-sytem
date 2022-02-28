<html>
<head>
<title>Library Management System</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div id="frm">
	<h1>ADMIN LOGIN</h1>
	<form name="f1" action="XXX.php" onsubmit="return validation()">
		<p>
			<label> UserName:</label>
			<input type="text" id = "user" name="user"/>
		</p>
		<p>
			<label>Password:</label>
			<input type="password" id="pass" name ="pass"/>
		</p>
		<p>
			<pre><input type="checkbox" id="rm" name="rm">Remember Me </input>			forget password?</pre>
		</p>
		<p>	
			<input type="submit" id="btn" value="LoGiN"/>
		</p>
	</form>
</div>


<script>
	function validation()
	{
		var id = document.f1.user.value;
		var ps = document.f1.pass.value;
		if(id.length=="" && ps.length=="")
		{
			alert("UserName and password field are empty");
			return false;
		}
		else
		{
			if(id.length=="")
			{
				alert("Username is empty");
				return false;
			}
			if(ps.length="")
			{
				alert("Password field is empty");
				return false;
			}
		}
	}	

</script>


</body>
</html>