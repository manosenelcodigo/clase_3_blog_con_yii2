<?php

use yii\db\Migration;

class m161020_012626_create_comentario extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ( $this->db->driverName === 'mysql' ) {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_spanish_ci ENGINE=innodb';
        }
        
        $this->createTable('{{%comentario}}', [
            'id'            => $this->primarykey(),
            'nombre'        => $this->string(150)->notNull(),
            'email'         => $this->string(150)->notNull(),
            'web'          => $this->string(150),
            'rel'           => $this->string(100),
            'comentario'    => $this->text()->notNull(),
            'fecha'         => $this->dateTime()->notNull(),
            'noticia_id'    => $this->integer()->notNull(),
            'stado'         => $this->boolean()->defaultValue(false)->notNull(),
            'ip_cliente'    => $this->string(15),
            'puerto_cliente'    => $this->string(5),
            'created_by'    => $this->integer()->notNull(),
            'created_at'    => $this->dateTime()->notNull(),
            'updated_by'    => $this->integer()->notNull(),
            'updated_at'    => $this->dateTime()->notNull()
        ], $tableOptions);
        
        $this->addForeignKey(
            'noticiacomentario', 'comentario', 'noticia_id', 'noticia', 'id', 'no action', 'no action'
        );
    }

    public function down()
    {
        $this->dropForeignKey('noticiacomentario', 'noticia');
        $this->dropTable('{{%noticia}}');
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
