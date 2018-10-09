<?php
    
namespace app\controllers;
use app\models\Category;
use Yii;
use app\models\TestForm;
//use yii\web\Controller;  импортировать уже не нужно т.к. наш app находится на том же уровне

class PostController extends AppController{
    
    public $layout = 'basic'; //для всех action контроллера post ставим шаблон basic, для всего контроллера целиком
    
    // отключить проверку токена, проверку того что форма была отправлена со страницы нашего сайта
//    public function beforeAction($action){ 
//        if($action->id == 'index'){
//            $this->enableCrsfValidation =false;
//        }
//        return parent::beforeAction($action);
//    }
    
    
    public function actionIndex(){

        //$names = ["Ivanov", "Petrov", "Sidorov"];
        //print_r($names);
        //var_dump(Yii::$app);
        //$this->debug(Yii::$app);
        if(Yii::$app->request->isAjax){
            //debug($_POST);
            debug(Yii::$app->request->post());

            return "test";
        }

//        $post = TestForm::findOne(2);
//        debug($post);
//        $post->email = 'best@best.com'; // обновляем данные
//        $post->save();
//        $post->delete(); // удаляем данные

        TestForm::deleteAll(['>', 'id', 7 ]); // без параметров удаляет полностью все данные

        $model = new TestForm();
//        $model->name = 'Автор';
//        $model->email = 'mail@mail.com';
//        $model->text = 'Текст сообщенитя';
//        $model->save();  // save по умолчанию вызывает валидацию





//        if($model->load(Yii::$app->request->post())){  // проверяем если данные из формы загружены, тогда мы их должны провалидировать
//            if($model->validate()){ // если модель проходит валидацию можем вывести сообщение
//                Yii::$app->session->setFlash('succes', 'Данные приняты'); // используем возможности сессии, флеш сообщение,
//                return $this->refresh();
//            }else{                                                      //одноразовые данные которые записываются в сессию, и удаляются после того как мы их запросиили
//                Yii::$app->session->setFlash('error', 'Ошибка');
//            }
//        }

        if($model->load(Yii::$app->request->post())){
            if($model->save()){ // при сохранении идет проверка на валидацию поэтому можно такое условие
                Yii::$app->session->setFlash('succes', 'Данные приняты'); // используем возможности сессии, флеш сообщение,
                return $this->refresh();
            }else{                                                      //одноразовые данные которые записываются в сессию, и удаляются после того как мы их запросиили
                Yii::$app->session->setFlash('error', 'Ошибка');
            }
        }

        $this->view->title = "Все статьи";
        return $this->render("test", compact('model'));
       //return "test";
    }
    
    public function actionShow(){
        //$this->layout = 'basic'; //здесь шаблон только для action show
        $this->view->title = "Одна статья";
        
        // таким способом мы можем регистрировать метатеги
        $this->view->registerMetaTag(["name" => "keywords", "content" => "ключевики...."]);//
        $this->view->registerMetaTag(["name" => "description", "content" => "описание страницы...."]);//

//        $cats = Category::find()->all();// хотим выбрать все категории
//        $cats = Category::find()->orderBy(['id' => SORT_DESC])->all();// выборка с сортировкой SORT_DESC SORT_ASC(по умолчанию)
//        $cats = Category::find()->asArray()->all(); //данные не ввиде объекта а ввиде массива
//        $cats = Category::find()->asArray()->where('parent=691')->all(); //данные ввиде массива все значения где поле parent=691 ввиде строки
//        $cats = Category::find()->asArray()->where(['parent'=>691])->all(); //данные ввиде массива все значения где поле parent=691 ввиде массива
//        $cats = Category::find()->asArray()->where(['like', 'title', 'pp'])->all(); //данные ввиде массива все значения где в поле title есть pp
//        $cats = Category::find()->asArray()->where(['<=', 'id', 695])->all(); //
//        $cats = Category::find()->asArray()->where('parent=691')->limit(2)->all(); // только первых 2
//        $cats = Category::find()->asArray()->where('parent=691')->limit(1)->one(); // только первую но массив будет оджномерным но рекомендуют добавлять ->limit(1)
//        $cats = Category::find()->asArray()->where('parent=691')->count(); // подсчет количества записей
//        $cats = Category::findOne(['parent'=>691]); // будет объект где только одна запись
//        $cats = Category::findAll(['parent'=>691]); // будет объект где только все записи
//        $query = "SELECT * FROM categories WHERE title LIKE '%pp%'"; // вместо этого рекомендуется использовать параметры
//        $cats = Category::findBySql($query)->all();
//        $query = "SELECT * FROM categories WHERE title LIKE :search"; // этот запрос уже безопасен
//        $cats = Category::findBySql($query, [':search' => '%pp%'])->all();

//        $cats = Category::findOne(694); // для ленивой загрузки
//        $cats = Category::find()->with('products')->where('id=694')->all(); // для жадной загрузки


//        $cats = Category::find()->all(); // ленивая или отложенная если немного объектов (2-3)
        $cats = Category::find()->with('products')->all(); // жадная если массив из десятка объектов



        return $this->render("show", compact('cats'));
    }
}