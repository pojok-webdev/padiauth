<html>
    <head>
    </head>
    <body>
        <form action="/login/changepasswordhandler" method="post">
        <div>
        <label for="email">Email</label>
            <input type="text" name="email" id="email" value="<?php echo $email?>">
        </div>
        <div>
        <label for="password">Password</label>
            <input type="password" name="password" id="password" value="<?php echo $password?>">
        </div>
        <div>
            <input type="submit" value="Change password">
        </div>
        </form>
    </body>
</html>