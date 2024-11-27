    <?php
   /**
    * @var PDO $pdo
*/

    require "Model/login.php";

        if (isset($_POST['login_button'])){}
            $username = !empty($_POST["username"])?cleanString($_POST["username"]):null;
            $password = !empty($_POST["password"])?cleanString($_POST["password"]):null;

            if (!empty($username) && !empty($password)){
                $user = getUser($pdo, $username);

                $isMatchPassword = is_array($user) && password_verify($password, $user['password']);
            }
    require "View/login.php";
