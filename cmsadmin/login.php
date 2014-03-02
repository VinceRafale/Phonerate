
<html>
<head>
<link rel="stylesheet" href="css/adminlogin.css" type="text/css"/>
<link rel="stylesheet" href="../css/bootstrap.css"  type="text/css"/>
</head>
<body>
<div id="login">
<div id="loginindhold">
<img src="images/phoneratelogo.png" width="250px" height="65px">

<br />
<br />
<form action="login-post.php" method="post" name="Logind">
<div class="input-group">
<div class="input-group input-group-lg">
<span class="input-group-addon">Brugernavn</span>
<input class="form-control" name="brugernavn" type="text"> 
</div>
</div>
<br>

<div class="input-group">
<div class="input-group input-group-lg">
<span class="input-group-addon">Adgangskode</span>
<input class="form-control" name="password" type="password">
</div>
</div>
<br />

<input size="400" class="btn btn-success btn-lg" type="submit" value="Log ind" width="50px" height="20px">
</form>

</div>
</div>

</body>
</html>

