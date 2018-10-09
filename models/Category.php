<?php

namespace app\models;


use yii\db\ActiveRecord;

class Category extends ActiveRecord{
    public static function tableName(){
        return 'categories';
    }

    public function getProducts(){ // метод нужен чтобы связять модель категории с моделью продукта
        return $this->hasMany(Product::class,['parent' => 'id']);
    }

}