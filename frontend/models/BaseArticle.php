<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "base_article".
 *
 * @property integer $id
 * @property string $article
 * @property integer $created_at
 * @property integer $updated_at
 */
class BaseArticle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'base_article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['article'], 'string', 'max' => 5000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article' => 'Article',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
