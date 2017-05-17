<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "centenses".
 *
 * @property integer $id
 * @property string $centense
 * @property integer $created_at
 * @property integer $updated_at
 */
class Centenses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'centenses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['centense'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'centense' => 'Centense',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
