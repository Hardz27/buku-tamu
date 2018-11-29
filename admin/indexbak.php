<!DOCTYPE html>
<html>
<head>
<title>Login Form</title>
<meta charset="utf-8">
<style type="text/css">
    .login {
        margin: 250px auto;
        width: 400px;
        height: 160px;
        padding: 10px;
        border: 1px solid #ccc;
        background: lavender;
    }
    img{
        width: 200px;
        height: 200px;

    }
    input[type=text], input[type=password] {
        margin: 5px auto;
        width: 94%;
        padding: 10px;
    }
    input[type=submit] {
        margin : 20px auto;
        float: right;
        padding: 10px;
        width: 400px;
        border: 1px solid #fff;
        color: #fff;
        background: grey;
        cursor: pointer;
    }

</style>
</head>
<body>
<img src="aiba.png">
<div class="login">

<form method="post" action="cek_login.php">
    <input name="id_user"
	type="text" id="id_user" placeholder="Username"><br>
    <input name="password" type="password"
		id="password" placeholder="Password"><br>
    <input type="submit" name="kirim" value="Submit">
</form>
</div>
</body>
</html>
