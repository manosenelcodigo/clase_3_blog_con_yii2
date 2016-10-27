<?php

use yii\db\Migration;

class m161020_011006_create_categoria extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ( $this->db->driverName === 'mysql' ) {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_spanish_ci ENGINE=innodb';
        }
        
        $this->createTable('{{%categoria}}', [
            'id'            => $this->primarykey(),
            'categoria'     => $this->string(100)->notNull(),
            'slug'          => $this->string(100)->notNull(),
            'imagen'        => $this->string(255),
            'descripcion'   => $this->text(),
            'created_by'    => $this->integer()->notNull(),
            'created_at'    => $this->dateTime()->notNull(),
            'updated_by'    => $this->integer()->notNull(),
            'updated_at'    => $this->dateTime()->notNull()
        ], $tableOptions);
        
        $this->addForeignKey(
            'usercreatecategoria', 'categoria', 'created_by', 'user', 'id', 'no action', 'no action'
        );
        
        $this->addForeignKey(
            'userupdatecategoria', 'categoria', 'updated_by', 'user', 'id', 'no action', 'no action'
        );
    }

    public function down()
    {
        $this->dropForeignKey('usercreatecategoria', 'categoria');
        $this->dropForeignKey('userupdatecategoria', 'categoria');
        $this->dropTable('{{%categoria}}');
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
