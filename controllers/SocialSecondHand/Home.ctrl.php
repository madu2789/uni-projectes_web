<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Madu
 * Date: 17/04/12
 * Time: 17:59
 * To change this template use File | Settings | File Templates.
 */
class SSHHomeController extends Controller
{
    public function build()
    {
        session_start();

        /*Comprobo sestat sessio esta oberta*/
        if ($_SESSION['EstatSessio'] == 'Iniciat') {
            echo "sessio ja iniciada!";
        } else if ($_SESSION['EstatSessio'] == 'Log') {
            echo "sessio iniciada i log!";
        } else {
            session_start();
            echo "iniciem sessio!";
            $_SESSION['EstatSessio'] = 'Iniciat';
        }

        // Inicialitzare la classe model
        $dades = $this->getClass('SSHModel');

        $this->setLayout('SocialSecondHand/home.tpl');

        /* Mostra últim producte venut*/
        $Producte = $dades->GetLastSoldProducte();

        if (Count($Producte) == 0) {
            //error!
            $this->assign('Error', "Encara no hem venut cap producte!");

            $this->assign('TitolProducte', "----");
            $this->assign('Descripcio', "----");
            $this->assign('Preu', "----");
            $this->assign('Estat', "----");
        } else {
            $this->assign('TitolProducte', $Producte[0]['TitolProducte']);
            $this->assign('Descripcio', $Producte[0]['Descripcio']);
            $this->assign('Preu', $Producte[0]['Preu']);
            $this->assign('Estat', $Producte[0]['Estat']);
        }

        /* Mostra 10 ultims productes posats a la venda*/
        $Productes = $dades->GetLastForSaleProductes();
        $this->assign('Productes', $Productes);

    }

    public
    function loadModules()
    {
        $modules['head'] = 'SharedHeadController';
        $modules['footer'] = 'SharedFooterController';

        return $modules;
    }
}

?>

