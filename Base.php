<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Base
{
    var $v;
    public function __construct()
    {
        include  APPPATH. "libraries/smarty-3.1.29/libs/Smarty.class.php";
        $view = new Smarty();
        $view->left_delimiter = '<[ ';
        $view->right_delimiter = ' ]>';
        $view->setTemplateDir(APPPATH . 'views');
        $view->setCompileDir(APPPATH . 'cache/templates_c');
        $view->setCacheDir(APPPATH . 'cache/scache');
        $view->compile_check = true;
        $view->force_compile = true;
        $view->caching = false;
        $view->cache_lifetime = 86400;
        $this->v= $view;
    }

}
?>
