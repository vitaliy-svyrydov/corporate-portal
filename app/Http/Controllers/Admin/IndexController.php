<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Auth;
class IndexController extends AdminController
{
    //

    public function __construct() {

        parent::__construct();
       
        $this->template = env('THEME').'.admin.index';

    }

    public function index() {
        
        $this->title = 'Панель администратора';

        return $this->renderOutput();
    }
}