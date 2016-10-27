<?php

use yii\db\Migration;

class m161013_014519_create_auth_item_child extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ( $this->db->driverName === 'mysql' ) {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_spanish_ci ENGINE=innodb';
        }
        
        $this->createTable('{{%auth_item_child}}', [
            'parent'  => $this->string(64)->notNull(),
            'child'  => $this->string(64)->notNull(),
        ], $tableOptions);
        
        $this->addPrimaryKey('parent_child_auth_item_child', 'auth_item_child', ['parent', 'child']);
        
        $this->addForeignKey(
            'parent_auth_item_child', 'auth_item_child', 'parent', 'auth_item', 'name', 'cascade', 'cascade'
        );
        
        $this->addForeignKey(
            'child_auth_item_child', 'auth_item_child', 'child', 'auth_item', 'name', 'cascade', 'cascade'
        );
    }

    public function down()
    {
        $this->dropTable('{{%auth_item_child}}');
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
