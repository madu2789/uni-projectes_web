<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Madu
 * Date: 26/02/12
 * Time: 17:59
 * To change this template use File | Settings | File Templates.
 */
class InsereixVideosController extends Controller
{
    public function build()
    {
        // Cargo el template de insertar videos
        $this->setLayout('InsereixVideos/InsereixVideos.tpl');
    }

    public function loadModules()
    {
        $modules['head'] = 'SharedHeadController';
        $modules['footer'] = 'SharedFooterController';
        //moduls nostres
        $modules['alain'] = 'InsereixVideosAlainController';
        $modules['xavi'] = 'InsereixVideosXaviController';
        $modules['madu'] = 'InsereixVideosMaduController';

        return $modules;
    }

}

?>

