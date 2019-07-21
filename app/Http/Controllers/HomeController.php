<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class HomeController extends BaseController
{
    public function homeDemo(){
        return 'Home Demo Controller';
    }
    public function homeVariable($id){
        return "Home at $id";
    }
}
