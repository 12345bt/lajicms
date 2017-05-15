<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation of table `centenses`.
 */
class m170515_012718_create_centenses_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        //创建句子库表
        if(!(Yii::$app->db->getTableSchema('centenses'))){
            $this->createTable('centenses', [
                'id' => "int NOT NULL AUTO_INCREMENT PRIMARY KEY",
                'centense' => "varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '句子'",
                'created_at' => Schema::TYPE_INTEGER . ' DEFAULT NULL COMMENT "创建时间"',
                'updated_at' => Schema::TYPE_INTEGER . ' DEFAULT NULL COMMENT "修改时间"'
            ]);
        }
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
       // $this->dropTable('centenses');
    }
}
