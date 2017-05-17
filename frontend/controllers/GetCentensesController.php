<?php

namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\GetCentenses;
class GetCentensesController extends Controller
{
    public function actionIndex(){
        $GetCentenses = new GetCentenses();

        echo   $GetCentenses->getCentense();


    }
}