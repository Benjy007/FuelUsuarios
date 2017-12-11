<?php 

class Model_Usuarios extends Orm\Model
{
    protected static $_table_nombre = 'usuarios';
    protected static $_primary_key = array('id');
    protected static $_properties = array(
        'id', // both validation & typing observers will ignore the PK
        'nombre' => array(
            'data_type' => 'varchar'   
        ),
        'pass' => array(
        	'data_type' => 'varchar'
        )
    );
}