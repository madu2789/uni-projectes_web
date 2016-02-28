<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Madu
 * Date: 26/02/12
 * Time: 17:59
 * To change this template use File | Settings | File Templates.
 */
class InsereixVideosPareController extends Controller
{
    protected $tipus_video;

    public function build()
    {
        // Inicialitzare la classe model
        $insert = $this->getClass('MostraVideosModel');

        $this->assign('tipus_video', $this->tipus_video);
        //recuperare les dades dels formularis
        $fet = 0;

        if (Filter::getString('Enviar')) {
            if (Filter::getString('url') != "") {
                $url2 = Filter::getString('url');
                $date = getdate($timestamp = time());
                $fet = $insert->setContentDocuments($url2, $date, $this->tipus_video);
            }
        }
        $this->setLayout('InsereixVideos/InsereixVideosMadu.tpl');
    }

}

?>

