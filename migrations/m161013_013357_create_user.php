<?php

use yii\db\Migration;

class m161013_013357_create_user extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ( $this->db->driverName === 'mysql' ) {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_spanish_ci ENGINE=innodb';
        }
        
        $this->createTable('{{%user}}', [
            'id'    => $this->primaryKey(),
            'name'  => $this->string()->notNull(),
            'username'  => $this->string()->notNull()->unique(),
            'auth_key'  => $this->string(32)->notNull(),
            'password_hash' => $this->string()->unique(),
            'password_reset_token'  => $this->string()->unique(),
            'email'     => $this->string()->notNull()->unique(),
            'status'    => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at'    => $this->dateTime(),
            'updated_at'    => $this->dateTime(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
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
