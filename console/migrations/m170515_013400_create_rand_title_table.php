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
        //�����������ɹ����
        if(!(Yii::$app->db->getTableSchema('rand_title'))){
            $this->createTable('rand_title', [
                'id' => "int NOT NULL AUTO_INCREMENT PRIMARY KEY",
                'rules_word' => "varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '�������ɹ���'",
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
       // $this->dropTable('rand_title');
    }
}
