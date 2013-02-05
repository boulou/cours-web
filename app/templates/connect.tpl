<?php
include 'common-header.tpl';
?>
</head>
<body>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
<label for="login">Login</label> <input type="text" id="login" name="login"/><br/>
<label for="password">Password</label> <input type="password" id="password" name="password"/><br/>
<input type="submit" value="Login" name="action-login"/>
<input type="submit" value="Register" name="action-register"/>
</form>
</body>
</html>