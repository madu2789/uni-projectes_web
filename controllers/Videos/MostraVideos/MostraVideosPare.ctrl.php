<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Madu
 * Date: 26/02/12
 * Time: 17:59
 * To change this template use File | Settings | File Templates.
 */
class MostraVideosPareController extends Controller
{
    protected $tipus_video;

    public function build()
    {
        $info = $this->getParams();
        $aux = $info['url_arguments'][0];

        //accedir a les dades
        $mostra = $this->getClass('MostraVideosModel');

        $video_info = $mostra->getContentDocuments($aux, $this->tipus_video);

        $videos_per_pagina = count($video_info);

        //inicialitzo a zero els links
        for ($i = 0; $i < 3; $i++) {
            $this->assign('link' . $i, "No hi ha m�s videos! ");
        }

        if ($videos_per_pagina != 0) {
            for ($i = 0; $i < $videos_per_pagina; $i++) {
                $this->assign('link' . $i, ($video_info[$i]['id_video']));
            }
        }

        $this->assign('tipus', $this->tipus_video);

        $this->setLayout('MostraVideos/MostraVideosMadu.tpl');
    }

    public function ContaVideos($aux)
    {
        $conta = $this->getClass('MostraVideosModel');

        //per saber quantes pagines puc mostrar
        $pagines = 0;
        $video_info = $conta->getContentDocuments($aux, $this->tipus_video);
        if (count($video_info) > 0) {
            $pagines = count($video_info);
        }
        return $pagines;
    }
}

?>

