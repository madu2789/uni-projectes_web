<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Madu
 * Date: 17/04/12
 * Time: 17:59
 * To change this template use File | Settings | File Templates.
 */

class InsereixPareController extends Controller
{
    protected $tipus;
    private $dades;

    public function build()
    {
        session_start();

        $this->assign('Tipus', $this->tipus);

        /*Comprobo sestat sessio esta oberta*/
        if ($_SESSION['EstatSessio'] == 'Iniciat') {
            echo "sessio ja iniciada!";
            $this->setLayout('SocialSecondHand/error403.tpl');
        } else if ($_SESSION['EstatSessio'] == 'Log') {
            echo "sessio iniciada i log!";
            $this->setLayout('SocialSecondHand/crea.tpl');
        } else {
            session_start();
            echo "iniciem sessio!";
            $_SESSION['EstatSessio'] = 'Iniciat';
        }

        // Inicialitzar la classe model
        $dades = $this->getClass('SSHModel');

        /*si editar, carregar dades del producte que edito*/
        $info = $this->getParams();
        // print_r($info['url_arguments'][0]);

        if ($info['url_arguments'][0] == "edita") {
            $IdProducteBD = $info['url_arguments'][1];
            $Producte = $dades->GetProductesById($IdProducteBD);

            $_SESSION['TitolProducte'] = $Producte[0]['TitolProducte'];
            $_SESSION['Descripcio'] = $Producte[0]['Descripcio'];
            $_SESSION['Preu'] = $Producte[0]['Preu'];
            $_SESSION['Estat'] = $Producte[0]['Estat'];
            $_SESSION['IdProducte'] = $IdProducteBD;

            // of images directory:
            $directori = "/imag/" . $IdProducteBD . "_1.jpeg";

            $this->assign('DireImatge', $directori);
            $this->assign('Imatge', $IdProducteBD);
        }

        /* rebre dades del tpl*/
        $ErrorMessage = "Falten dades";
        $FaltaDada = false;
        $error = false;
        $ErrorTitol = "";
        $ErrorEstat = "";
        $ErrorPreu = "";

        if (Filter::getString('Enviar')) {

            if (Filter::getString('TitolProducte') != "") {
                $TitolProducte = Filter::getString('TitolProducte');
                $_SESSION['TitolProducte'] = $TitolProducte;
                if (strlen($TitolProducte) > 100) {
                    $error = true;
                    $ErrorTitol = "Mida excesiva, màxim 100 caràcters!";
                }
            } else {
                $FaltaDada = true;
            }

            if (Filter::getString('Descripcio') != "") {
                $Descripcio = Filter::getString('Descripcio');
                $_SESSION['Descripcio'] = $Descripcio;
            } else {
                $FaltaDada = true;
            }

            if (Filter::getString('Preu') != "") {
                $Preu = Filter::getString('Preu');
                $_SESSION['Preu'] = $Preu;
                $float = floatval($Preu);
                if ($float == "") {
                    $error = true;
                    $ErrorPreu = "Preu introduit incorrecte!";
                }
            } else {
                $FaltaDada = true;
            }

            if (Filter::getString('Estat') != "") {
                $Estat = Filter::getString('Estat');
                $_SESSION['Estat'] = $Estat;
                if ($Estat == "nou" || $Estat == "bon estat" || $Estat == "podria estar millor" || $Estat == "fet pols") {
                    //correcte
                } else {
                    $error = true;
                    $ErrorEstat = "Estat incorrecte!";
                }
            } else {
                $FaltaDada = true;
            }

            //agafes l'imatge i la redimensiona a 100x 100 i 705 x ...
            if (Filter::getString('Estat') != "") {

                if ($this->tipus == "crea") {
                    $IdProducte = $dades->GetLastIdImage();
                    $IdImatge = $IdProducte[0]['MAX(IdProducte)'] + 1;
                    $this->PujaImatge($IdImatge);
                } else {
                    //print_r($_FILES["upfile"]);
                    if (isset($_FILES["upfile"]["tmp_name"])) {
                        $IdImatge = $_SESSION['IdProducte'];
                        print_r($IdImatge);
                        $this->PujaImatge($IdImatge);
                    }

                }

            }

            if ($FaltaDada == false && $error == false) {
                //inserta o edita tot el producte
                $dades->SetProducte($_SESSION['TitolProducte'], $_SESSION['Descripcio'], $_SESSION['Preu'], $_SESSION['Estat'], $_SESSION['IdUsuari'], $_SESSION['IdProducte'], $this->tipus);
                $ErrorMessage = "Producte Inserit!";

                /*Elimino les variables de sessio del producte pk no es reeompli el formulari*/
                unset($_SESSION['TitolProducte']);
                unset($_SESSION['Descripcio']);
                unset($_SESSION['Preu']);
                unset($_SESSION['Estat']);
                unset($_SESSION['IdProducte']);

                echo " <script language='JavaScript'>
            alert('Producte inserit!');
            </script>";

                //  header('refresh:1; url=/SocialSecondHand');
            } else {
                if ($FaltaDada == true) {
                    $ErrorMessage = "Falten dades";
                } else {
                    $ErrorMessage = $ErrorTitol . $ErrorPreu . $ErrorEstat;
                }
            }
            $this->assign('error', $ErrorMessage);
        }


    }

    /*Puja l'imatge*/
    public function PujaImatge($IdImatge)
    {
        /*fixem la mida a 2MB per si excedeix de la mida dona error!*/
        $max = 2000000;

        // $nuevodirectorio = "$IdImatge";
        // mkdir($nuevodirectorio);

        $filesize = $_FILES['upfile']['size'];
        $filetype = $_FILES['upfile']['type'];
        $tipus = explode("/", $filetype);

        $uploaddir = "./imag/";
        $filename = $IdImatge . "." . $tipus[1];

        if ($filesize < $max) {
            if ($filesize > 0) {
                if ($_FILES['upfile']['type'] == "image/png" || $_FILES['upfile']['type'] == "image/jpeg" || $_FILES['upfile']['type'] == "image/gif") {
                    if (is_uploaded_file($_FILES["upfile"]["tmp_name"])) {

                        $this->CanviaTamany($_FILES['upfile']['tmp_name'], 1, $filename);
                        $this->CanviaTamany($_FILES['upfile']['tmp_name'], 2, $filename);

                        print("Imatge pujada correctament");
                        $ErrorEstat = "Imatge pujada correctament";
                    } else {
                        print("Error de conexi&oacute; amb el servidor.");
                        $ErrorEstat = "Error de conexi&oacute; amb el servidor.";
                    }
                } else {
                    print("Només es permeten imatges del format jpg., gif., i .png!");
                    $ErrorEstat = "Només es permeten imatges del format jpg., gif., i .png!";
                }
            } else {
                $FaltaDada = true;
                print("<br><br>Camp buit, no has seleccionat cap imatge");
            }
        } else {
            print("<br><br>La Imatge sobrepassa la mida de màxima de 2Mb, tornar-ho a probar!");
            $error = true;
            $ErrorEstat = "La imatge sobrepassa els 2MB! ";
        }

    }


    /*Canvia el tamany de la imatge, opcio 1 = 100x100, opcio 2 = 704x528 */
    public function CanviaTamany($ruta_imagen, $opcio, $nom_imatge)
    {
        $nom_imatge = explode(".", $nom_imatge);
        print_r($nom_imatge[1]);

        if ($nom_imatge[1] == "gif") {
            //Cargo en memoria la imagen que quiero redimensionar
            $imagen_original = imagecreatefromgif($ruta_imagen);
        } elseif ($nom_imatge[1] == "png") {
            //Cargo en memoria la imagen que quiero redimensionar
            $imagen_original = imagecreatefrompng($ruta_imagen);
        } else {
            //Cargo en memoria la imagen que quiero redimensionar
            $imagen_original = imagecreatefromjpeg($ruta_imagen);
        }

        //Obtengo el ancho de la imagen que cargue
        $ancho_original = imagesx($imagen_original);

        //Obtengo el alto de la imagen que cargue
        $alto_original = imagesy($imagen_original);

        if ($opcio == 1) {
            $ancho_final = 100;
            $alto_final = 100;
        } else {
            $ancho_final = 704;
            $alto_final = 528;
        }

        //Creo una imagen vacia, con el alto y el ancho que tendrá la imagen redimensionada
        $imagen_redimensionada = imagecreatetruecolor($ancho_final, $alto_final);

        //Copio la imagen original con las nuevas dimensiones a la imagen en blanco que creamos en la linea anterior
        imagecopyresampled($imagen_redimensionada, $imagen_original, 0, 0, 0, 0, $ancho_final, $alto_final, $ancho_original, $alto_original);

        //Guardo la imatge ya redimensionada

        $ruta_imagen = "./imag/" . $nom_imatge[0] . "_" . $opcio . ".jpeg";

        imagejpeg($imagen_redimensionada, $ruta_imagen);

        //Llibero recursos, destruyendo las imágenes que estaban en memoria
        imagedestroy($imagen_original);
        imagedestroy($imagen_redimensionada);
    }


    public function loadModules()
    {
        $modules['head'] = 'SharedHeadController';
        $modules['footer'] = 'SharedFooterController';

        return $modules;
    }
}

?>