<?php

namespace app\models;

//use Yii;
//use yii\base\Model; отключим т.к. будем использовать ActiveRecord
use yii\db\ActiveRecord;

//class TestForm extends Model{ // расширяем класс model если работает с формами
class TestForm extends ActiveRecord{ //
    public static function tableName(){
        return 'posts';
    }

//    public $name;       // если работаем с классом Model то нужно объявлять свойства
//    public $email;      // если же расширим класс ActiveRecord то эти поля объявлять будет не обязательно, это сделает Yii
//    public $text;
    
    public function attributeLabels(){
        return [
            'name' => 'Имя',
            'email' => 'E-mail',
            'text' => 'Текст сообщения',
        ];
        
        
    }
    // правила валидации в полях ввода можно перечислать для каждого поля отдельно, можно поляперечислить массивом
    public function rules(){
        return [
            [['name','text'], 'required', 'message' => 'Поле обязательно для ввода'],
//            ['email', 'required'],
            ['email', 'email'], // проверка email поля на email
//            ['name', 'string', 'min' => 2, 'tooShort' => 'Слишком короткое имя'],
//            ['name', 'string', 'max' => 5, 'tooLong' => 'Слишком длинное имя'],
//            ['name', 'string', 'length' => [2,5]], // одной строкой минимум и максимум
//            ['name', 'myRule'], // валидаторы, которые мы пишем самостоятельно валидацию проходт только на сервере
//            ['text', 'trim'],
        ];// если для атрибутов формы мв не указали валидационные правила, тогда данные не будут загружены,
        // ['text', 'safe'] можем указать валидатор safe который не валидирует а делает поле безопасным, ну или мы считаем его безопасным
    }
    
//    public function myRule($attr){   // наш валидатор
//        if (!in_array($this->$attr, ['hello', 'world'])){
//            $this->addError($attr, 'Wrong!');
//        }
//    }
    
    
}