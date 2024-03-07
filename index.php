<html>
<head>
<link rel="stylesheet" href="css/style.css"

<body>
<?php
include('connection.php')
?>
<h1>Post!</h1>
<form action="register.php" method ="POST">
    <input type="text" name="username" placeholder="Fill in your username">
    <input type="password" name="password" placeholder="Fill in your password">
    <input type="submit">
</form>

<h1>Get!</h1>
<form action="login.php" method ="GET">
    <input type="text" name="username" placeholder="Fill in your username">
    <input type="password" name="password" placeholder="Fill in your password">
    <input type="submit">
</form>
</body>

</head>
</html>