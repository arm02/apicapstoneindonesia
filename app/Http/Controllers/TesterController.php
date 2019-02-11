<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesterController extends Controller
{
    public function post(API $api, Request $req){
    	$api->post('login',$req->all(['email', 'password']));
    }
}
