<?php
session_start();
$arr = ['log' => 'admin', 'pass' => 'admin'];
require_once 'vendor/autoload.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader, array(
    'cache' => 'compilation_cache',
    'auto_reload' => true, //автоматически перекомпилировать шаблон в кэше
));
$template = $twig->loadTemplate('index.html');
$title = "PHP,HTML,CSS";
$log_empty = empty($_POST['log']); 
$pass_empty = empty($_POST['pass']);
echo $template ->render(array('title'=>$title,'result'=>$_SESSION['loginTimes'],'login'=>$_POST['log'],'password'=>$_POST['pass'],'arr'=>$arr,'log_em'=>$log_empty,'pass_em' =>$pass_empty));
if(isset($_POST['log'])and isset($_POST['pass'])){
        $login = $_POST['log'];
        $password = $_POST['pass'];
            if(($arr['log'] == $login)and($arr['pass']==$password)){
                $_SESSION['auth'] = true; 
                $_SESSION['login'] = $login;
                $_SESSION['loginTimes'][] = time();
            }else{
                        echo "Не верный логин или пароль";
                        $_SESSION['auth'] = false; 
            };
}
?>

