<?php

use yii\db\Migration;

class m161020_010540_create_transmision extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ( $this->db->driverName === 'mysql' ) {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_spanish_ci ENGINE=innodb';
        }
        
        $this->createTable('{{%transmision}}', [
            'id'            => $this->primarykey(),
            'titulo'        => $this->string(100)->notNull(),
            'descripcion'   => $this->text(),
            'embed'         => $this->string(255),
            'created_by'    => $this->integer()->notNull(),
            'created_at'    => $this->dateTime()->notNull(),
            'updated_by'    => $this->integer()->notNull(),
            'updated_at'    => $this->dateTime()->notNull()
        ], $tableOptions);
        
        $this->addForeignKey(
            'usercreatetransmision', 'transmision', 'created_by', 'user', 'id', 'no action', 'no action'
        );
        
        $this->addForeignKey(
            'userupdatetransmision', 'transmision', 'updated_by', 'user', 'id', 'no action', 'no action'
        );
    }

    public function down()
    {
        $this->dropTable('{{%transmision}}');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
