<?php

use yii\db\Migration;

class m180227_155340_create_table_product_link extends Migration
{
    public function safeUp() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%product_link}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'url' => $this->string()->notNull(),
            'title' => $this->string(),
        ], $tableOptions);

        $this->addForeignKey("{product_link}_product_id_fkey", '{{%product_link}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function safeDown() {
        $this->dropForeignKey('{product_link}_product_id_fkey', '{{%product_link}}');

        $this->dropTable('{{%product_link}}');
    }
}
