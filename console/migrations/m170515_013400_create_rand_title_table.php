<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation of table `rand_title`.
 */
class m170515_013400_create_rand_title_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        //创建标题生成规则表
        if(!(Yii::$app->db->getTableSchema('rand_title'))){
            $this->createTable('rand_title', [
                'id' => "int NOT NULL AUTO_INCREMENT PRIMARY KEY",
                'rules_word' => "varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '标题生成规则'",
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
       // $this->dropTable('rand_title');
    }
}
