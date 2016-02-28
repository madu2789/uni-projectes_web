<?php
$config['default'] = 'IndexController';
$config['home'] = 'IndexController';

//indexs
$config['index'] = 'IndexController';
$config['videoindex'] = 'VideoIndexController';

/* practica inicial de video mash-up*/
$config['videos'] = 'MostraVideosController';
$config['insertvideos'] = 'InsereixVideosController';

/*practica final*/
/*home*/
$config['SocialSecondHand'] = 'SSHHomeController';
$config['registre'] = 'RegistreController';
$config['login'] = 'LoginController';
$config['p'] = 'MostraController';
$config['llista'] = 'LlistaController';
$config['cerca'] = 'CercadorController';
/*en principi aquesta no cal, pk o controlo al controller llista mitjançant aquest per moduls i esta fet per herencia...*/
$config['edita'] = 'EditaFillController';
$config['crea'] = 'CreaFillController';

?>