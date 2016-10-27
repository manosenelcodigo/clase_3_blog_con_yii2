<?php

use yii\db\Migration;

class m161020_011719_create_noticia extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ( $this->db->driverName === 'mysql' ) {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_spanish_ci ENGINE=innodb';
        }
        
        $this->createTable('{{%noticia}}', [
            'id'            => $this->primarykey(),
            'numero'        => $this->smallInteger(),
            'titulo'        => $this->string(150)->notNull()->unique(),
            'slug'          => $this->string(150)->notNull(),
            'asunto'        => $this->string(100),
            'descripcion'   => $this->text()->notNull(),
            'resumen'       => $this->string(300)->notNull(),
            'video'         => $this->string(300)->notNull(),
            'tipo_id'       => $this->integer()->notNull(),
            'descarga'      => $this->string(100),
            'categoria_id'  => $this->integer(),
            'etiquetas'     => $this->string(255),
            'stado'         => $this->boolean(),
            'cont_visitas'  => $this->integer()->defaultValue(0)->notNull(),
            'cont_descargas'  => $this->integer()->defaultValue(0)->notNull(),
            'curso_id'      => $this->integer(),
            'created_by'    => $this->integer()->notNull(),
            'created_at'    => $this->dateTime()->notNull(),
            'updated_by'    => $this->integer()->notNull(),
            'updated_at'    => $this->dateTime()->notNull()
        ], $tableOptions);
        
        $this->addForeignKey(
            'categorianoticia', 'noticia', 'categoria_id', 'categoria', 'id', 'no action', 'no action'
        );
        
        $this->addForeignKey(
            'cursonoticia', 'noticia', 'curso_id', 'curso', 'id', 'no action', 'no action'
        );
        
        $this->addForeignKey(
            'tiponoticia', 'noticia', 'tipo_id', 'tipo', 'id', 'no action', 'no action'
        );
        
        $this->addForeignKey(
            'usercreatenoticia', 'noticia', 'created_by', 'user', 'id', 'no action', 'no action'
        );
        
        $this->addForeignKey(
            'userupdatenoticia', 'noticia', 'updated_by', 'user', 'id', 'no action', 'no action'
        );
    }

    public function down()
    {
        $this->dropForeignKey('categorianoticia', 'noticia');
        $this->dropForeignKey('cursonoticia', 'noticia');
        $this->dropForeignKey('tiponoticia', 'noticia');
        $this->dropForeignKey('usercreatenoticia', 'noticia');
        $this->dropForeignKey('userupdatenoticia', 'noticia');
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
