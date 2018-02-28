<?php

use yii\db\Migration;

/**
 * Class m180220_100248_create_table_video
 */
class m180220_120248_create_table_video extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/candidates/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%video}}', [
            'id' => $this->primaryKey(),
            'status' => $this->integer(1)->notNull()->defaultValue(1),
            'key' => $this->string()->notNull(),
            'gallery' => $this->integer(1)->notNull()->defaultValue(1),
            'image' => $this->string(),
        ], $tableOptions);
        
        $this->batchInsert('{{%video}}', ['key'], [
            ['zFw3lUtfU5g'],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%video}}');
    }
}
 
 
 
