<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use Smarty;


class BaseController extends Controller
{
    protected $helpers = [];
    protected $_data = [];
    protected $_smarty;
    protected $session;

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
        $this->session = session();

        //------------------------------------------
        // Preload any models, libraries, etc, here.
        //------------------------------------------
        require_once(APPPATH.'ThirdParty/smarty/Smarty.class.php');
        $this->_smarty = new Smarty();

        $this->_smarty->setTemplateDir(APPPATH.'/Views/');
        $this->_smarty->setCompileDir(WRITEPATH.'cache');
        $this->_smarty->setCompileDir(WRITEPATH.'/cache/templates_c/');
        $this->_smarty->setConfigDir(WRITEPATH.'/cache/configs/');
        $this->_smarty->setCacheDir(WRITEPATH.'/cache/cache/');
    }

    public function display($strTemplate = 'default.tpl'){
        // Assignation de toutes les variables au template

        foreach($this->_data as $key=>$value){
            $this->_smarty->assign($key, $value);
        }
        //$this->_smarty->debugging = true;
        $this->_smarty->display($strTemplate);
    }
}
