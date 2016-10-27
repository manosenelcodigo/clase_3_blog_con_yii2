<?php

use yii\db\Migration;

class m161020_011447_create_curso extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ( $this->db->driverName === 'mysql' ) {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_spanish_ci ENGINE=innodb';
        }
        
        $this->createTable('{{%curso}}', [
            'id'            => $this->primarykey(),
            'curso'         => $this->string(100)->notNull(),
            'slug'          => $this->string(100)->notNull(),
            'descripcion'   => $this->text()->notNull(),
            'imagen'        => $this->string(50)->notNull(),
            'created_by'    => $this->integer()->notNull(),
            'created_at'    => $this->dateTime()->notNull(),
            'updated_by'    => $this->integer()->notNull(),
            'updated_at'    => $this->dateTime()->notNull()
        ], $tableOptions);
        
        $this->addForeignKey(
            'usercreatecurso', 'curso', 'created_by', 'user', 'id', 'no action', 'no action'
        );
        
        $this->addForeignKey(
            'userupdatecurso', 'curso', 'updated_by', 'user', 'id', 'no action', 'no action'
        );
    }

    public function down()
    {
        $this->dropForeignKey('usercreatecurso', 'curso');
        $this->dropForeignKey('userupdatecurso', 'curso');
        $this->dropTable('{{%curso}}');
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
