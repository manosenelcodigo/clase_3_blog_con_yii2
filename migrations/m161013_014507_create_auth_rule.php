<?php

use yii\db\Migration;

class m161013_014507_create_auth_rule extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ( $this->db->driverName === 'mysql' ) {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_spanish_ci ENGINE=innodb';
        }
        
        $this->createTable('{{%auth_rule}}', [
            'name'  => $this->string(64)->notNull(),
            'data'  => $this->text(),
            'created_at'    => $this->integer(),
            'updated_at'    => $this->integer(),
        ], $tableOptions);
        
        $this->addPrimaryKey('auth_rule_name', 'auth_rule', 'name');
    }

    public function down()
    {
        $this->dropTable('{{%auth_rule}}');
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
