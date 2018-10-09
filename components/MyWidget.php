<?php
namespace app\components;
use yii\base\Widget;

class MyWidget extends Widget{
    public $name;

    public function init(){
        parent::init();
//        if($this->name === null) $this->name = 'Гость';

        ob_start(); // буыеризируем весь вывод между бегин и энд
    }
    public function run(){
//        return "<h1>{$this->name}, привет, Мир!</h1>";
//        return $this->render('my'); // ниже передадим переменные
//        return $this->render('my', ['name'=> $this->name]);

        $content = ob_get_clean();
        $content= mb_strtoupper($content, 'utf-8');
        return $this->render('my', compact('content'));

    }

}