<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Employees');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Employee'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'email:email',
            'phone',
            'designation_name',
            'salary',
            [
                'attribute'=>'status',
                'filter'=>array("1"=>"Active","0"=>"In-Active"),
                'value'=> function ($data) {
                    return $data['status']==1 ? "Acitve" : "In-Active";
                }
            ],

           [
          'class' => 'yii\grid\ActionColumn',
          'header' => 'Actions',
          'headerOptions' => ['style' => 'color:#337ab7'],
          'template' => '{view}{update}{delete}',
          'buttons' => [
            'view' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span> ', $url, [
                            'title' => Yii::t('app', 'view'),
                ]);
            },

            'update' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-pencil"></span> ', $url, [
                            'title' => Yii::t('app', 'update'),
                ]);
            },
            'delete' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-trash"></span> ', $url, [
                            'title' => Yii::t('app', 'delete'),
                ]);
            }

          ],
          'urlCreator' => function ($action, $model, $key, $index) {
            if ($action === 'view') {
                $url = Yii::$app->getUrlManager()->getBaseUrl().'/employee/view?id='.$model['id'];
                return $url;
            }

            if ($action === 'update') {
                $url = Yii::$app->getUrlManager()->getBaseUrl().'/employee/update?id='.$model['id'];
                return $url;
            }
              if ($action === 'delete') {
                $url = Yii::$app->getUrlManager()->getBaseUrl().'/employee/delete?id='.$model['id'];
                return $url;
            }
          }
          ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
