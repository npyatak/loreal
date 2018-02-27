<?php

use yii\db\Migration;

/**
 * Class m180220_100248_create_table_product
 */
class m180221_100248_create_table_product extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/candidates/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'image' => $this->string(255),
            'description' => $this->text(),
            'show_on_main' => $this->integer(1)->notNull()->defaultValue(1),
            'test' => $this->integer(),
        ], $tableOptions);
        
        $this->batchInsert('{{%product}}', ['title', 'description', 'image'], [
            ['Paradise extatic', 'Intense volume', '/images/pi-1-222eb0d235.png'],
            ['Paradise extatic', 'Intense volume', '/images/pi-2-c281b9262e.png'],
            ['Paradise extatic', 'Intense volume', '/images/pi-3-45b91b004e.png'],
            ['Paradise extatic', 'Intense volume', '/images/pi-4-06fc00346c.png'],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}