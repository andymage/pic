<?php

use yii\db\Migration;

class m170819_152208_horario extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%horario}}', [
            'id' => $this->primaryKey(),
            'id_pic' => $this->integer()->notNull(),
            'dia' => $this->integer()->notNull(),
            'hora' => $this->time(),
            'tipo' => $this->integer()->notNull(),
            'fecha_alta' => $this->datetime(),
            'fecha_actualizacion' => $this->datetime(),
        ], $tableOptions);

        $this->createIndex(
            'idx-id_pic',
            'horario',
            'id_pic'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-id_pic',
            'horario',
            'id_pic',
            'pic',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%horario}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170819_152208_horario cannot be reverted.\n";

        return false;
    }
    */
}
