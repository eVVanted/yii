<?php
    
namespace app\controllers;

//use yii\web\Controller;  импортировать уже не нужно т.к. наш app находится на том же уровне

class MyController extends AppController{
    public function actionIndex($id=null){
        $hi = "Hello World!";
        $names = ["Ivanov", "Petrov", "Sidorov"];
        //return $this->render("index", ['hello' => $hi, "names"=> $names]);
        return $this->render("index", compact("hi", "names", "id"));
    }
    public function actionBlogPost(){
        // my/blog-post  адрес обращения к контроллеру , пишем через дефис
        return "Blog Post";
    }
}