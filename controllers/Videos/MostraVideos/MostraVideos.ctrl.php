<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Madu
 * Date: 26/02/12
 * Time: 17:59
 * To change this template use File | Settings | File Templates.
 */
class MostraVideosController extends Controller
{
    public function build()
    {
        $info = $this->getParams();

        // echo '<pre>';print_r( $info );echo '</pre>';
        $aux = $info['url_arguments'][0];

        $this->assign('id', $aux);

        /*  $mostra = $this->getClass( 'MostraVideosModel' );

                //per saber quantes pagines puc mostrar
                $pagines = 0;
                $conta = $this->getClass( 'MostraVideosMadu' );
                $pagines = $conta->ContaVideos($aux);

                $conta = $this->getClass( 'MostraVideosAlain' );
                $pagines = $conta->ContaVideos($aux);

                $this->assign( 'pags', $pagines/3 + $pagines%3);
        */
        // crido el template mostravideos
        $this->setLayout('MostraVideos/MostraVideos.tpl');
    }

    public function loadModules()
    {
        $modules['head'] = 'SharedHeadController';
        $modules['footer'] = 'SharedFooterController';
        //carrega el modul de cadascu
        $modules['alain'] = 'MostraVideosAlainController';
        $modules['xavi'] = 'MostraVideosXaviController';
        $modules['madu'] = 'MostraVideosMaduController';

        return $modules;
    }
}

?>

