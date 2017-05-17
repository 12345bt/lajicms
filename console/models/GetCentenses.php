<?php

namespace console\models;
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
        $centense_arr = $this->splitString( '。', $article);
        $this->saveCentense($centense_arr,(int)$article_data['id']);
        $this->getCentense();
    }


    public function saveCentense( $centense_arr,$article_id){
        $centense_arr_len = count($centense_arr);
        if( $centense_arr_len<=0){
            $this->getCentense();
        }
        $model =  new Centenses();
        foreach($centense_arr as $val){
            $val = trim((string)$val);
            $centense_len = strlen($val);
            $model->centense = $val;
            if( $centense_len<1){
                $this->delArticleById($article_id);
                $this->getCentense();
            }
            if( $centense_len>150&& strpos($val,'!')){
                $centense_arr =  $this->splitString( '!', $val);
                $this->saveCentense( $centense_arr,$article_id);
            }
            if( $centense_len>150&& strpos($val,'？')){
                $centense_arr =  $this->splitString( '？', $val);
                $this->saveCentense( $centense_arr,$article_id);
            }
            if( $centense_len>150&& strpos($val,'；')){
                $centense_arr =  $this->splitString( '；', $val);
                $this->saveCentense( $centense_arr,$article_id);
            }
            if(! $model->insert()){
                $this->delArticleById($article_id);
                $this->getCentense();
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
        return  explode($sign,$string);
    }
}