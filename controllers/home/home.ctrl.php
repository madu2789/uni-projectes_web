<?php

/**
 * Home controller: That's a controller example. You can see here an Smarty asignation and one model request.
 *
 */
class HomeHomeController extends Controller
{

    /**
     * It's mandatory implements this method in each controller. It's the first thing executed.
     *
     */
    public function build()
    {
        // It's the way to use a Smarty template.
        $this->setLayout('home/home.tpl');

        // If you need a model, first of all you shoul get the object. It's forbidden the use of "$a = new ClassName();"
        $home_model = $this->getClass('HomeHomeModel');
        $content_documents = $home_model->getContentDocuments();

        // To assign variables to Smarty template you should use the method "assign".
        $this->assign('content_documents_smarty_variable', $content_documents);

        // To catch GET/POST variable you should use the Filter class.
        if (Filter::getString('test')) {
            $this->assign('sended_variable', Filter::getString('test'));
        }
    }

    /**
     * With this method you can load other modules that we will need in our page. You will have these modules availables in your template inside the "modules" array (example: {$modules.head}).
     * The sintax is the following:
     * $modules['name_in_the_modules_array_of_Smarty_template'] = Controller_name_to_load;
     *
     * @return array
     */
    public function loadModules()
    {
        $modules['head'] = 'SharedHeadController';
        $modules['footer'] = 'SharedFooterController';

        return $modules;
    }
}

?>