<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Madu
 * Date: 17/04/12
 * Time: 17:59
 * To change this template use File | Settings | File Templates.
 */
class LoginController extends Controller
{
    private $dades;

    public function build()
    {
        session_start();

        /*Comprobo sestat sessio esta oberta*/
        if ($_SESSION['EstatSessio'] == 'Iniciat') {
            echo "sessio ja iniciada!";
        }elseif ($_SESSION['EstatSessio'] == 'Log'){
            echo "sessio iniciada i log!";
            $this->assign('error', "Ja estàs Loggejat!");
        }else{
            session_start();
            echo "iniciem sessio!";
            $_SESSION['EstatSessio'] = 'Iniciat';
        }

        // Inicialitzar la classe model
        $dades = $this->getClass('SSHModel');

        /* rebre dades del tpl*/
        if (Filter::getString('Enviar')) {
            if (Filter::getString('Password') != "") {
                $Password = Filter::getString('Password');
                if (Filter::getString('Mail') != "") {
                    $Mail = Filter::getString('Mail');
                    $PasswordBD = $dades -> ComprovaPassword($Mail);

                    /* Comprobo si el login es corecte */
                    if($PasswordBD[0]['Password'] == $Password){
                        echo "Login correcte!";
                        /* Inicio la sessio del usuari loguejat*/
                        $_SESSION['EstatSessio'] = 'Log';
                        /*Guardem el Idusuari ala sessio per identificarlo com a usuari loguejat*/
                        $_SESSION['IdUsuari'] = $PasswordBD[0]['IdUsuari'];
                        /* redirecciono ala Home havent fet ja Login */
                        header('Location: /SocialSecondHand');
                    }else{
                        $this->assign('error', "Autentificació fallida! Torna a probar");
                    }
                } else {
                    $this->assign('error', "Camp incomplert");
                }
            } else {
                $this->assign('error', "Camp incomplert");
            }

        }
        $this->setLayout('SocialSecondHand/login.tpl');
    }


    public function loadModules()
    {
        $modules['head'] = 'SharedHeadController';
        $modules['footer'] = 'SharedFooterController';

        return $modules;
    }
}

?>

