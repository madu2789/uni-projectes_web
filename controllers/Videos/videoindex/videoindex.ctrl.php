<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Madu
 * Date: 26/02/12
 * Time: 17:59
 * To change this template use File | Settings | File Templates.
 */
class VideoIndexController extends Controller
{

    /*PENDENT:
     *  tenim dues metodologies:
    FACIL: crear una nova pagina d'edició/borrat
    DIFICIL: inserir dinamicament un formulari per borrar o editar
    */
    public function build()
    {
        $videos = 0;

        //crido capa de dades
        $dades = $this->getClass('MostraVideosModel');

        //conto elements que hi ha
        $num_videos = $dades->CountVideos('musical');
        $videos = $num_videos[0]['COUNT( id )'];
        $num_videos = $dades->CountVideos('documentals');
        $videos += $num_videos[0]['COUNT( id )'];
        $num_videos = $dades->CountVideos('humor');
        $videos += $num_videos[0]['COUNT( id )'];

        //echo $videos;

        //li passo el numero de videos al template
        $this->assign('num_videos', $videos + 1);

        for ($i = 1; $i < $videos; $i++) {
            if (Filter::getString('Eliminar' . $i)) {
                $dades->EliminaVideo($i);
                //actualitzo la pagina:
                echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=/videoindex'>";
                //escric el missatge al template
                echo " <script language='JavaScript'>
                alert('El video ha estat esborrat correctament!');
                </script>";
            }
        }

        for ($i = 1; $i < $videos; $i++) {
            if (Filter::getString('Modifica')) {
                if (Filter::getString('Modifica' . $i)) {
                    $video = Filter::getString('Modifica' . $i);
                    $dades->ActualitzaVideo($i, $video);
                }
            }
        }

        // It's the way to use a Smarty template.   //hauria de ser el template de videos...
        $this->setLayout('videoindex/videoindex.tpl');
    }

    public function loadModules()
    {
        $modules['head'] = 'SharedHeadController';
        $modules['footer'] = 'SharedFooterController';

        return $modules;
    }

}

?>

