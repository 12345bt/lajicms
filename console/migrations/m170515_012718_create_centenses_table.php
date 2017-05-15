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
        //�������ӿ��
        if(!(Yii::$app->db->getTableSchema('centenses'))){
            $this->createTable('centenses', [
                'id' => "int NOT NULL AUTO_INCREMENT PRIMARY KEY",
                'centense' => "varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '����'",
                'created_at' => Schema::TYPE_INTEGER . ' DEFAULT NULL COMMENT "����ʱ��"',
                'updated_at' => Schema::TYPE_INTEGER . ' DEFAULT NULL COMMENT "�޸�ʱ��"'
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
