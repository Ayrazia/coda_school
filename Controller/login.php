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

                if ($isMatchPassword && $user['enabled']){
                    $_SESSION['auth'] = true;
                    header("Location: index.php");
                } elseif (!$user['enabled'] && $isMatchPassword){
                    $errers[] = "Votre compte n'est pas activé";
                } else {
                    $errers[] = 'L\'identification a échoué';
                }
            }
    require "View/login.php";
