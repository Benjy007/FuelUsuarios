<?php
namespace Fuel\Migrations;

class Usuarios
{
    function up()
    {
        \DBUtil::create_table('usuarios', array(
            'id' => array('type' => 'int', 'constraint' => 11,'auto_incremental'=> true),
            'nombre' => array('type' => 'varchar', 'constraint' => 50),
            'pass' => array('type' => 'varchar', 'constraint' => 50)
        ), array('id'));
    }
    function down()
    {
        \DBUtil::drop_table('usuarios');
    }
}