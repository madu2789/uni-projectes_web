<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Madu
 * Date: 17/04/12
 * Time: 17:59
 * To change this template use File | Settings | File Templates.
 */
class RegistreController extends Controller
{
    private $dades;

    public function build()
    {
        session_start();

        /*Comprobo sestat sessio esta oberta*/
        if ($_SESSION['EstatSessio'] == 'Iniciat') {
            echo "sessio ja iniciada!";
        }else if ($_SESSION['EstatSessio'] == 'Log'){
            echo "sessio iniciada i log!";
            $this->assign('error', "Ja estàs Loggejat!");

            /*Elimino les variables a sessio de l'usuari per registrar, aixi no es reomplira el usuari */
            unset($_SESSION['nom']);
            unset($_SESSION['cognom']);
            unset($_SESSION['login']);
            unset($_SESSION['password']);
            unset($_SESSION['mail']);

        }else{
            session_start();
            echo "iniciem sessio!";
            $_SESSION['EstatSessio'] = 'Iniciat';
        }


        $info = $this->getParams();

        if (isset($info['url_arguments'][0])) {
            $aux = $info['url_arguments'][0];
        }else{
            $aux = "";
        }

        if ($aux == "benvinguda") {
            $this->setLayout('SocialSecondHand/welcome.tpl');
            // Inicialitzar la classe model
            $dades = $this->getClass('SSHModel');
            /* insereixo a usuaris finals*/
            $dades->InsertUsuari($_SESSION['nom'], $_SESSION['cognom'], $_SESSION['login'], $_SESSION['password'], $_SESSION['mail']);

            /*Elimino les variables a sessio de l'usuari per registrar, aixi no es reomplira el usuari */
            unset($_SESSION['nom']);
            unset($_SESSION['cognom']);
            unset($_SESSION['login']);
            unset($_SESSION['password']);
            unset($_SESSION['mail']);

            /*Elimino l'usuari de la taula temporal*/
            $dades->DeleteTempUserByMail($_SESSION['mail']);

        } else {
            $this->setLayout('SocialSecondHand/registre.tpl');
        }
        // Inicialitzare la classe model
        $this->dades = $this->getClass('SSHModel');

        /* rebre dades del tpl*/
        $ErrorMessage = "Falta dada";
        $FaltaDada = false;
        $error = false;
        $ErrorMail = "";
        $ErrorLogin = "";
        $ErrorNom = "";
        $ErrorPassword = "";

        if (Filter::getString('Enviar')) {
            if (Filter::getString('Nom') != "") {
                $this->Nom = Filter::getString('Nom');
                $Nom = Filter::getString('Nom');
                $_SESSION['nom'] = $Nom;
                if ($this->ComprovaNom($Nom) == false) {
                    $error = true;
                    $ErrorNom = "Nom ja insertat";
                }
            } else {
                $FaltaDada = true;
            }
            if (Filter::getString('Cognom') != "") {
                $this->Cognom = Filter::getString('Cognom');
                $Cognom = Filter::getString('Cognom');
                $_SESSION['cognom'] = $Cognom;
            } else {
                $FaltaDada = true;
            }
            if (Filter::getString('Login') != "") {
                $Login = Filter::getString('Login');
                $_SESSION['login'] = $Login;
                $ErrorLogin = $this->ComprovaLogin($Login);
                if ($ErrorLogin != "Correcte") {
                    $error = true;
                }
            } else {
                $FaltaDada = true;
            }
            if (Filter::getString('Password') != "") {
                $this->Password = Filter::getString('Password');
                $Password = Filter::getString('Password');
                $_SESSION['password'] = $Password;
                if (strlen($Password) < 6 || strlen($Password) > 20) {
                    $ErrorPassword = "Password entre 6 i buit caracters!";
                    $error = true;
                }
            } else {
                $FaltaDada = true;
            }
            if (Filter::getString('Mail') != "") {
                $this->Mail = Filter::getString('Mail');
                $Mail = Filter::getString('Mail');
                $_SESSION['mail'] = $Mail;
                $ErrorMail = $this->ComprovaMail($Mail);
                if ($ErrorMail != "Correcte") {
                    $error = true;
                }
            } else {
                $FaltaDada = true;
            }
            if ($FaltaDada == false && $error == false) {
                $this->dades->InsertTempUsuari($_SESSION['nom'], $_SESSION['cognom'], $_SESSION['login'], $_SESSION['password'], $_SESSION['mail']);
                echo "Inserit!";
                $ErrorMessage = "Usuari inserit correctament, falta validació!";
                /* link per validar el registre*/
                $this->assign('link', "Clica aqui per validar el registre!");
            } else {
                // falta actualitzar la pagina sense canviar formulari
                if ($ErrorMail == "Correcte") $ErrorMail = "";
                if ($ErrorLogin == "Correcte") $ErrorLogin = "";
                if ($FaltaDada == True) {
                    $ErrorMessage = "Camps incomplerts!";
                }else{
                    $ErrorMessage = $ErrorLogin ." ". $ErrorNom ." ". $ErrorPassword ." ". $ErrorMail;
                }
            }
            $this->assign('error', $ErrorMessage);
        }

    }

    //podria aplicar...
    public function ComprovaMail($Mail)
    {
        /* Recupero les dades de la BD */
        $dades = $this->getClass('SSHModel');
        $numU = $dades->ComprovaMail($Mail);
        $numTU = $dades->ComprovaTempMail($Mail);
        $num = (int)$numU[0]['Count(Mail)'] + (int)$numTU[0]['Count(Mail)'];

        /* Miro per expressio regular si cumleix el format o si ja esta a la BD*/
        $patro = '#^[a-z0-9.!\#$%&\'*+-/=?^_`{|}~]+@([0-9.]+|([^\s]+\.+[a-z]{2,6}))$#si';

        if (preg_match($patro, $Mail) && $num == 0) {
            $ok = "Correcte";
        } elseif ($num != 0) {
            $ok = "Mail ja insertat!";
        } else {
            $ok = "Mail no cumpleix el format requerit!";
        }
        return $ok;
    }

    public function ComprovaLogin($Login)
    {
        $dades = $this->getClass('SSHModel');
        $numU = $dades->ComprovaLogin($Login);
        $numTU = $dades->ComprovaTempLogin($Login);
        $num = (int)$numU[0]['Count(Login)'] + (int)$numTU[0]['Count(Login)'];

        $patro = "/^[a-z]{2}[0-9]{5}$/";

        if ($num == 0 && preg_match($patro, $Login)) {
            $ok = "Correcte";
        } elseif ($num != 0) {
            $ok = "Login ja insertat!";
        } else {
            $ok = " Login no cumpleix el format requerit!";
        }
        return $ok;
    }

    public function ComprovaNom($Nom)
    {
        $dades = $this->getClass('SSHModel');
        $numU = $dades->ComprovaNom($Nom);
        $numTU = $dades->ComprovaTempNom($Nom);
        $num = (int)$numU[0]['Count(Nom)'] + (int)$numTU[0]['Nom'];
        //print_r($num) ;
        //echo $num[0]['Count(Nom)'];
        if ($num == 0) {
            $ok = true;
        } else {
            $ok = false;
        }
        return $ok;
    }

    public function loadModules()
    {
        $modules['head'] = 'SharedHeadController';
        $modules['footer'] = 'SharedFooterController';

        return $modules;
    }
}

?>

