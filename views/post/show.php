<?php 
//$this->title = "Одна статья";
//$this->registerMetaTag  и т.д.
use app\components\MyWidget;
?>

<?php 

?>

<?php 
$this->beginBlock('block1');  // передавать данные из вида в шаблон
?>
<h1>Заголовок страницы</h1>
<?php 
$this->endBlock();
?>


<h1>SHOW ACTION</h1>

<?php
//echo MyWidget::widget(['name'=>'Вася']); // виджету передаем параметры

MyWidget::begin(); // между этими методами выыодим контент
?>

<h1>привет мир!!!! </h1>

<?php MyWidget::end();


//foreach($cats as $cat){
//    echo $cat->title."<br>";
//}
?>
<?php
//debug($cats);
//echo count($cats->products); // ленивая загрузка, SQL запрос к продактс идет только когда мы обращаемся к свойству products
//debug($cats);//

//echo count($cats[0]->products); // жадная загрузка,
//debug($cats);//

//foreach ($cats as $cat){
//    echo '<ul>';
//        echo '<li>'. $cat->title .'</li>';
//        $products = $cat->products;
//        foreach($products as $product){
//            echo '<ul>';
//                echo '<li>' .$product->title. '</li>';
//            echo '</ul>';
//        }
//    echo '</ul>';
//}

?>
<button class="btn btn-success" id="btn">Click me...</button>
<?php //$this->registerJsFile("@web/js/scripts.js", ["depends" => 'yii\web\YiiAsset']) ?>
<!--если кода мало , то необязательно подключать целый файл-->
<?php //$this->registerJs("$('.container').append('<p>SHOW!!!</p>');", \yii\web\View::POS_LOAD) ?>

<!--похожие методы используются для регистрации css файлов или css кода-->
<!--registerCss() и registerCssFile() соответственно-->

<?php //$this->registerCss('.container{background: #ccc;}') ?>

<?php
$js = <<<JS
    $('#btn').on('click', function(){
        $.ajax({
            url: 'index.php?r=post/index',
            data: {test:'123'},
            type: 'POST',
            succes:function(res){
                console.log(res);
            },
            error: function(){
                alert('Error!');
            }
        });
        
    })

JS;

$this->registerJs($js);



?>