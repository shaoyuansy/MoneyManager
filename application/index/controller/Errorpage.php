<?php
namespace app\index\controller;
use think\Controller;
use think\Request;

class Errorpage extends Controller{

    public function index(){
        return view('index');
    }

    public function _empty(){
        return view('index');
    }

}