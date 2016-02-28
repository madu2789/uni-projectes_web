<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Madu
 * Date: 17/04/12
 * Time: 17:59
 * To change this template use File | Settings | File Templates.
 */
class MostraController extends Controller
{
    public function build()
    {
        /*Comprobo si la sessio esta oberta, sino la obro*/
        if (!isset($_SESSION)) {
            session_start();
            $_SESSION['Loguejat'] = False;
        }

        $info = $this->getParams();

        // echo '<pre>';print_r( $info );echo '</pre>';
        $producteBD = $info['url_arguments'][0];
        //per controlar si hi ha mes d'un!
        $Idproducte = $info['url_arguments'][1];


        // Inicialitzare la classe model
        $dades = $this->getClass('SSHModel');

        $producte = $dades->GetProducteByName($producteBD);

        if (Count($producte) == 0) {
            //error!
            $this->assign('Error', "Error! no hi ha cap producte amb aquest titol!");

            $this->assign('TitolProducte', "----");
            $this->assign('Descripcio', "----");
            $this->assign('Preu', "----");
            $this->assign('Estat', "----");
            $this->assign('NomPropietari', "----");
            $this->assign('Venut', "----");
            $this->assign('DataCreacio', "----");
            $this->assign('NomVenedor', "----");
            $this->assign('LoginVenedor', "----");

        } else {
            //esta bé!
            /*acabo d'apendre a passar arrays... ;( refactory?? xD*/
            $TitolProducte = $producte[0]['TitolProducte'];
            $IdProducte = $producte[0]['IdProducte'];
            $_SESSION['IdProductePerComprar'] = $producte[0]['IdProducte'];
            $Descripcio = $producte[0]['Descripcio'];
            $Preu = $producte[0]['Preu'];
            $Estat = $producte[0]['Estat'];
            $NomPropietari = $producte[0]['IdUsuari'];
            if ($producte[0]['Venut'] == 0) {
                $Venut = "No";
            } else {
                $Venut = "Si";
            }
            $DataCreacio = $producte[0]['DataCreacio'];

            $this->assign('TitolProducte', $TitolProducte);
            $this->assign('IdProducte', $IdProducte);
            $this->assign('Descripcio', $Descripcio);
            $this->assign('Preu', $Preu);
            $this->assign('Estat', $Estat);
            $this->assign('NomPropietari', $NomPropietari);
            $this->assign('Venut', $Venut);
            $this->assign('DataCreacio', $DataCreacio);

            $Venedor = $dades->GetNomILoginById($producte[0]['IdUsuari']);

            $this->assign('NomVenedor', $Venedor[0]['Nom']);
            $this->assign('LoginVenedor', $Venedor[0]['Login']);
        }

        if ($info['url_arguments'][1] == "confirmacio") {

            if ($_SESSION['EstatSessio'] == 'Log') {

                if ($_SESSION['Confirma'] == true) {
                    /*Confirma venta!*/
                    //fer update a la taula de la base de dades
                    $dades->CompraProducte($_SESSION['IdProductePerComprar'], date(DATE_ATOM, time()));
                    $_SESSION['Confirma'] = false;

                    /*destruir variable de sessio que guarda el id del producte comprat*/
                    unset($_SESSION['IdProductePerComprar']);

                    echo " <script language='JavaScript'>
                    alert('Gracies per la teva compra!');
                    </script>";

                    header('refresh:0; url=/SocialSecondHand');
                } else {
                    $this->assign('Mode', "Confirma la compra! ");
                    $this->assign('Confirma', "Confirma! ");
                    $_SESSION['Confirma'] = true;
                }
            } else {

                echo " <script language='JavaScript'>
            alert('Has de logejar-te per intentar comprar!');
            </script>";

                header('refresh:0; url=/login');
            }
        } else {
            $this->assign('Mode', "Visualització de productes");
            $this->assign('Confirma', "Compra aquest producte! ");
            /*Mostra normal*/
        }
        $this->setLayout('SocialSecondHand/mostra.tpl');


    }

    public function loadModules()
    {
        $modules['head'] = 'SharedHeadController';
        $modules['footer'] = 'SharedFooterController';

        return $modules;
    }
}

?>

