    <?php
    require "Model/login.php";
    require "View/login.php";

        if (isset($_POST['login_button'])){}
            $username = !empty($_POST["username"])?$_POST["username"]:null;
            $password = !empty($_POST["password"])?$_POST["password"]:null;

            if (!empty($username) && !empty($password)){
                $username = cleanString($username);
                $password = cleanString($password);

                $user = getUser($pdo, $username);
                var_dump($user);
            }
