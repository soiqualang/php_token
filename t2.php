<?php
session_start();
require('csrf.php');
$token = new Csrf(true, true, true);
echo $token->get_token_name();
echo $token->get_token_value();
echo $token->create_link('domain.com/admin.php');

?>
     
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <title>Securing forms with form token</title>
</head>
<body>
    <form action="" method="post">
    <dl>
        <dt><label for="username">Username:</label></dt>
        <dd><input type="text" name="username" id="username" /></dd>
        <dt><label for="username">Password:</label></dt>
        <dd><input type="password" name="password" id="password" /></dd>
        <dt></dt>
        <dd><input type="submit" value="Submit" /></dd>
    <dl>
    </form>
</body>
</html>