<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Madu
 * Date: 17/04/12
 * Time: 17:59
 * To change this template use File | Settings | File Templates.
 */

class LlistaController extends Controller
{
    private $dades;

    public function build()
    {
        session_start();

        /*Comprobo sestat sessio esta oberta*/
        if ($_SESSION['EstatSessio'] == 'Iniciat') {
            echo "sessio ja iniciada!";
            $this->setLayout('SocialSecondHand/error403.tpl');
        } else if ($_SESSION['EstatSessio'] == 'Log') {
            echo "sessio iniciada i log!";
            $this->setLayout('SocialSecondHand/llista.tpl');
        } else {
            session_start();
            echo "iniciem sessio!";
            $_SESSION['EstatSessio'] = 'Iniciat';
        }

        // Inicialitzar la classe model
        $dades = $this->getClass('SSHModel');

        $info = $this->getParams();

        $mode = $info['url_arguments'][0];
        $IdProducteE = $info['url_arguments'][1];
        if ($mode == "elimina") {
            /*base de dades eliminar producte*/
            $dades->DeleteProducteById($IdProducteE);

        } elseif ($mode == "edita") {
            /*carregar modul de crear pero per editar*/
            $this->assign('edita', '1');

        } else {
            /*recupero tots els productes */
            $Producte = $dades->GetProductesByUser($_SESSION['IdUsuari']);
            $_SESSION['Productes'] = $Producte;
            /*Li passo al template tot el array*/
            $this->assign('Productes', $Producte);
        }

    }

    public function loadModules()
    {
        $modules['head'] = 'SharedHeadController';
        $modules['footer'] = 'SharedFooterController';
        $modules['edita'] = 'EditaFillController';

        return $modules;
    }
}

?>