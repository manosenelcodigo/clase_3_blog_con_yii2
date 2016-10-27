<?php

use yii\db\Migration;

class m161013_014512_create_auth_item extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ( $this->db->driverName === 'mysql' ) {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_spanish_ci ENGINE=innodb';
        }
        
        $this->createTable('{{%auth_item}}', [
            'name'  => $this->string(64)->notNull(),
            'type'  => $this->integer()->notNull(),
            'description'  => $this->text(),
            'rule_name' => $this->string(64),
            'data'  => $this->text(),
            'created_at'    => $this->dateTime(),
            'updated_at'    => $this->dateTime(),
        ], $tableOptions);
        
        $this->addPrimaryKey('auth_item_name', 'auth_item', 'name');
        
        $this->addForeignKey(
            'auth_item_rule_name_name', 'auth_item', 'rule_name', 'auth_rule','name', 'set null', 'cascade'
        );
        
        $this->createIndex('type_auth_item', 'auth_item', 'type');
    }

    public function down()
    {
        $this->dropTable('{{%auth_item}}');
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
