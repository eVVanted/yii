<?php 
use yii\widgets\ActiveForm; // для создания формы
use yii\helpers\Html;       // для создания формы
?>



<?php 
//$this->title = "Статьи"; // можно здесь задавать тайтл
?>
<h1>TEST ACTION</h1>
<?php
//debug($model);

?>
<?php if(Yii::$app->session->hasFlash('succes')): ?>

    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?php echo Yii::$app->session->getFlash('succes'); // из бутстрапа вытянем оформление алерта?>
    </div>
<?php endif; ?>

<?php if(Yii::$app->session->hasFlash('error')): ?>
<!--    <div class="alert alert-danger alert-dismissible" role="alert">-->
<!--        <button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
<!--            <span aria-hidden="true">&times;</span>-->
<!--        </button>-->
<!--        --><?php //echo Yii::$app->session->getFlash('error'); // из бутстрапа вытянем оформление алерта?>
<!--    </div>-->
    <div class="alert alert-danger alert-dismissible" role="alert">
        <?php echo Yii::$app->session->getFlash('error'); // из бутстрапа вытянем оформление алерта?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php $form = ActiveForm::begin(['options'=> ['id'=> 'testForm']]) // создаем форму ?>

<?= $form->field($model, 'name')/*->label('Имя') */?>
<?= $form->field($model, 'email')->input('email') ?>
<?= yii\jui\DatePicker::widget(['name' => 'attributeName']) ?>
<?= $form->field($model, 'text')/*->label('Текст сообщения')*/->textarea(['rows'=>5]) ?>
<?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>

<?php ActiveForm::end(); ?>
<?php  ?>