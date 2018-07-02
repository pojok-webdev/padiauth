<html>
    <head>
        <title>
            Hello <?php echo $username;?>
        </title>
    </head>
    <body>
    welcome <?php echo $username;?>, 
    <a href="/login/register">Register</a>
    <a href="/login/logout">Logout</a>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user){?>
                <tr>
                    <td><?php echo $user->username?></td>
                    <td><?php echo $user->email?></td>
                    <td><a href="/login/changepassword/<?php echo $user->email?>">Ganti password</a></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </body>
</html>