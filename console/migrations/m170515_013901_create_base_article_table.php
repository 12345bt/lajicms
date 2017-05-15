<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation of table `base_article`.
 */
class m170515_013901_create_base_article_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        //����ԭʼ���±�
        if(!(Yii::$app->db->getTableSchema('base_article'))){
            $this->createTable('base_article', [
                'id' => "int NOT NULL AUTO_INCREMENT PRIMARY KEY",
                'article' => "varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ԭʼ�ĵ�'",
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
      //  $this->dropTable('base_article');
    }
}
