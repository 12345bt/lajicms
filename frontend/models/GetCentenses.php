<?php

namespace frontend\models;
use yii\base\Model;
use frontend\models\Centenses;
class GetCentenses extends Model
{
    public function getArticle(){
    return (new \yii\db\Query())
            ->select(['id','article'])
            ->from('base_article')
            ->one();
    }

    public function getCentense(){
        $article_data = $this->getArticle();
        if($article_data['article']==""){
            $this->delArticleById((int)$article_data['id']);
            $this->getCentense();
        }
        $article = (string) $article_data['article'];
        $this->saveCentense($article,(int)$article_data['id']);
        $this->getCentense();
    }


    public function saveCentense( $article,$article_id){
        $model =  new Centenses();
        if(strlen($article)<40){
            $model->centense = trim($article);
            if($model->save()){
             $this->delArticleById($article_id);
            }
          $this->delArticleById($article_id);
        }
        $centense_arr =  $this->splitString('。',$article);
        foreach($centense_arr as $val){
            $val = (string)$val;
            $model->centense = trim($val);
            if(trim($val)==''){
                $this->delArticleById($article_id);
            }
           if(! $model->insert()){
               $this->delArticleById($article_id);
           }
        }

        $this->delArticleById($article_id);
    }

    public function delArticleById($article_id){
        $connection = \Yii::$app->db;
        $sql = 'Delete from base_article WHERE id='.$article_id;
        $command = $connection->createCommand($sql);
        $command->execute();
    }

    public function splitString($sign,$string){
        $new_data = explode($sign,$string);
        return  $new_data ;
    }
}