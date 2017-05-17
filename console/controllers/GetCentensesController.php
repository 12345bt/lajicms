<?php

namespace console\controllers;
use yii\console\Controller;
use console\models\GetCentenses;
class GetCentensesController extends Controller
{
    public function actionIndex(){
        set_time_limit(0);
        $GetCentenses = new GetCentenses();
        $GetCentenses->getCentense();
    }
}