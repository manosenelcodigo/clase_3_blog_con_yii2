<?php

use yii\db\Migration;

class m161020_011251_create_tipo extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ( $this->db->driverName === 'mysql' ) {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_spanish_ci ENGINE=innodb';
        }
        
        $this->createTable('{{%tipo}}', [
            'id'            => $this->primarykey(),
            'tipo'          => $this->string(50)->notNull(),
            'created_by'    => $this->integer()->notNull(),
            'created_at'    => $this->dateTime()->notNull(),
            'updated_by'    => $this->integer()->notNull(),
            'updated_at'    => $this->dateTime()->notNull()
        ], $tableOptions);
        
        $this->addForeignKey(
            'usercreatetipo', 'tipo', 'created_by', 'user', 'id', 'no action', 'no action'
        );
        
        $this->addForeignKey(
            'userupdatetipo', 'tipo', 'updated_by', 'user', 'id', 'no action', 'no action'
        );
    }

    public function down()
    {
        $this->dropForeignKey('usercreatetipo', 'tipo');
        $this->dropForeignKey('userupdatetipo', 'tipo');
        $this->dropTable('{{%tipo}}');
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
