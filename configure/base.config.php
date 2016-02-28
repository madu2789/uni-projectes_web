<?php

/* Engine */
$config['factory'] = PATH_ENGINE . 'factory.class.php';
$config['mail'] = PATH_ENGINE . 'mail.class.php';
$config['session'] = PATH_ENGINE . 'session.class.php';
$config['sql'] = PATH_ENGINE . 'sql.class.php';
$config['user'] = PATH_ENGINE . 'user.class.php';
$config['dispatcher'] = PATH_ENGINE . 'dispatcher.class.php';
$config['url'] = PATH_ENGINE . 'url.class.php';
$config['uploader'] = PATH_ENGINE . 'uploader.class.php';

/* Controllers and models */
$config['ErrorError404Controller'] = PATH_CONTROLLERS . 'error/error404.ctrl.php';
$config['SharedHeadController'] = PATH_CONTROLLERS . 'shared/head.ctrl.php';
$config['SharedFooterController'] = PATH_CONTROLLERS . 'shared/footer.ctrl.php';

$config['HomeHomeController'] = PATH_CONTROLLERS . 'home/home.ctrl.php';
$config['HomeHomeModel'] = PATH_MODELS . 'home/home.model.php';

/* Controllers de videos */
/*controlador mostra pare*/
$config['MostraVideosController'] = PATH_CONTROLLERS . 'MostraVideos/MostraVideos.ctrl.php';
$config['MostraVideosPareController'] = PATH_CONTROLLERS . 'MostraVideos/MostraVideosPare.ctrl.php';
/*controlador mostra fills*/
$config['MostraVideosAlainController'] = PATH_CONTROLLERS . 'MostraVideos/MostraVideosAlain.ctrl.php';
$config['MostraVideosXaviController'] = PATH_CONTROLLERS . 'MostraVideos/MostraVideosXavi.ctrl.php';
$config['MostraVideosMaduController'] = PATH_CONTROLLERS . 'MostraVideos/MostraVideosMadu.ctrl.php';

/*controlador insereix pare*/
$config['InsereixVideosController'] = PATH_CONTROLLERS . 'InsereixVideos/InsereixVideos.ctrl.php';
$config['InsereixVideosPareController'] = PATH_CONTROLLERS . 'InsereixVideos/InsereixVideosPare.ctrl.php';
/*controlador insereix fills*/
$config['InsereixVideosAlainController'] = PATH_CONTROLLERS . 'InsereixVideos/InsereixVideosAlain.ctrl.php';
$config['InsereixVideosXaviController'] = PATH_CONTROLLERS . 'InsereixVideos/InsereixVideosXavi.ctrl.php';
$config['InsereixVideosMaduController'] = PATH_CONTROLLERS . 'InsereixVideos/InsereixVideosMadu.ctrl.php';

/* Controllers de indexs */
$config['IndexController'] = PATH_CONTROLLERS . 'index/indexGeneral.ctrl.php';
$config['VideoIndexController'] = PATH_CONTROLLERS . 'videoindex/videoindex.ctrl.php';

/* Models de videos */
$config['MostraVideosModel'] = PATH_MODELS . 'MostraVideos/MostraVideos.model.php';
$config['InsereixVideosModel'] = PATH_MODELS . 'InsereixVideos/InsereixVideos.model.php';

/*controllers SocialSecondHand*/

$config['SSHHomeController'] = PATH_CONTROLLERS . 'SocialSecondHand/Home.ctrl.php';
$config['RegistreController'] = PATH_CONTROLLERS . 'SocialSecondHand/Registre.ctrl.php';
$config['LoginController'] = PATH_CONTROLLERS . 'SocialSecondHand/Login.ctrl.php';
$config['MostraController'] = PATH_CONTROLLERS . 'SocialSecondHand/Mostra.ctrl.php';
$config['LlistaController'] = PATH_CONTROLLERS . 'SocialSecondHand/Llista.ctrl.php';
$config['CercadorController'] = PATH_CONTROLLERS . 'SocialSecondHand/Cercador.ctrl.php';

/*herència del projecte*/
$config['InsereixPareController'] = PATH_CONTROLLERS . 'SocialSecondHand/InsereixPare.ctrl.php';
$config['CreaFillController'] = PATH_CONTROLLERS . 'SocialSecondHand/CreaFill.ctrl.php';
$config['EditaFillController'] = PATH_CONTROLLERS . 'SocialSecondHand/Editafill.ctrl.php';

/*model SSH*/
$config['SSHModel'] = PATH_MODELS . 'SSHModel/SSH.model.php';

?>