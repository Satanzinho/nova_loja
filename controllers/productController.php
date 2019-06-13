<?php
class productController extends controller {

	private $user;

    public function __construct() {
        parent::__construct();
    }

    public function index() {
    }
    public function open($id){
    	 $dados = array();

        $products = new Products();
        $categories = new Categories();
        $f = new Filters();
        $filters = array();

        $dados['categories'] = $categories->getList();
        $dados['filters'] = $f->getFilters($filters);
        $dados['filters_selected'] = array();

        $this->loadTemplate('product', $dados);
        }
    }