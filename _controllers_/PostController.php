<?php
    
namespace app\controllers;

//use yii\web\Controller;  импортировать уже не нужно т.к. наш app находится на том же уровне

class PostController extends AppController{
    public function actionTest(){
        
        $names = ["Ivanov", "Petrov", "Sidorov"];
        print_r($names);
        var_dump($names);
        
        return $this->render("test");
    }
}