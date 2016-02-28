<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Madu
 * Date: 17/04/12
 * Time: 17:59
 * To change this template use File | Settings | File Templates.
 */

class CercadorController extends Controller
{
    private $dades;

    public function build()
    {
        session_start();

        /*Comprobo sestat sessio esta oberta*/
        if ($_SESSION['EstatSessio'] == 'Iniciat') {
            echo "sessio ja iniciada!";

        } else if ($_SESSION['EstatSessio'] == 'Log') {
            echo "sessio iniciada i log!";
            $this->setLayout('SocialSecondHand/llista.tpl');
        } else {
            session_start();
            echo "iniciem sessio!";
            $_SESSION['EstatSessio'] = 'Iniciat';
        }

        $this->setLayout('SocialSecondHand/cercador.tpl');

        // Inicialitzar la classe model
        $dades = $this->getClass('SSHModel');

        if (Filter::getString('Enviar')) {

            if (Filter::getString('Cerca') != "") {

                $Descripcio = Filter::getString('Cerca');

                /* Mostra productes que coincideixen resultats*/
                $Producte = $dades->GetProductesBySearch($Descripcio);

                if (Count($Producte) > 0) {
                    /*per requeriments de la practica tallo la descripcio a 50 caracters*/
                    for ($i = 0; $i <= Count($Producte); $i++) {
                        if (strlen($Producte [$i]['Descripcio']) > 50) {
                            $Producte [$i]['Descripcio'] = substr($Producte [$i]['Descripcio'], 0, 50) . "...";
                        }
                    }
                } else {
                    $this->assign('Error', "Error, no hi ha resultats per la teva cerca!");
                }
                /*Li passo al template tot el array*/
                $this->assign('Productes', $Producte);
            }else{
                $this->assign('Error', "Error, camp buit!");
            }
        }
    }

    public function loadModules()
    {
        $modules['head'] = 'SharedHeadController';
        $modules['footer'] = 'SharedFooterController';

        return $modules;
    }
}

?>