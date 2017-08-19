<?php

use yii\db\Migration;

class m170819_151903_pic extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%pic}}', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string()->notNull()->unique(),
            'ip_encendido' => $this->string(260)->notNull(),
            'ip_apagado' => $this->string(260)->notNull(),
            'fecha_alta' => $this->datetime(),
            'fecha_actualizacion' => $this->datetime(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%pic}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170819_151903_pic cannot be reverted.\n";

        return false;
    }
    */
}
