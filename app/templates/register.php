<html>
    <body>
        <form action="/register" method="POST">
            <p color="red"><?php if(isset($error)) echo $error ?></p>
            <label>User name : </label><input type="text" value="<?php if(isset($userName)) echo $userName ?>" name="userName" placeholder="login.."/>
            <label>Password : </label><input type="password" name="userPassword" />
            <input type="submit" value="Register" />
        </form>
    </body>
</html>