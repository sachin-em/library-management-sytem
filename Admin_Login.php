
<html>
<title>
	Library Management System
</title>
<head>
<style>

span.psw{
float: right;
}

.div1{
	margin-right:50px;
	display: inline-block;
}

</style>
</head>
<body>
<Center><strong><h1>ADMIN LOGIN</h1></strong><center>

<pre>
<form action="demo_page.php" method="post">

<label for="usr" ><b>Username : </b></label><input type="text" placeholder="Enter Username" id="usr" name="username">

<label for="pwd"><b>Password : </b></label><input type="password" placeholder="Enter Password" id="pwd" name="password">

<button type="submit">Login</button>
<div class="div1">
<label>        <input type="checkbox" name="remember"> Remember me </label>     <span class="psw">Forgot <a href="#">password?</a></span>
</div>

</pre>

</form>
</body>
</html>
