<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Madu
 * Date: 26/02/12
 * Time: 17:59
 * To change this template use File | Settings | File Templates.
 */
class IndexController extends Controller
{
    /*copiat tal cual de power */

    public function build()
    {
        // It's the way to use a Smarty template.   //hauria de ser el template de videos...
        $this->setLayout('index/index.tpl');
    }

}

?>

