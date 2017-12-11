<?php 
class Controller_Usuarios extends Controller_Rest
{

    public function post_create()
    {
        try {
            if ( ! isset($_POST['nombre'])) 
            {
                $json = $this->response(array(
                    'code' => 400,
                    'message' => 'parametro incorrecto, se necesita que el parametro se llame nombre'
                ));

                return $json;
            }

            $input = $_POST;
            $usuario = new Model_Usuarios();
            $usuario->nombre = $input['nombre'];
            $usuario->pass = $input['pass'];
            $usuario->save();

            $json = $this->response(array(
                'code' => 200,
                'message' => 'usuario creado',
                'data' => $input['nombre'],
            ));

            return $json;

        } 
        catch (Exception $e) 
        {
            $json = $this->response(array(
                'code' => 500,
                'message' => $e->getMessage(),
            ));

            return $json;
        }
        
    }

    public function get_usuarios()
    {
    	$usuarios = Model_Usuarios::find('all');

        $json = $this->response(array(
                'code' => 200,
                'message' => 'usuario creado',
                'data' => Arr::reindex($usuarios)
            ));

            return $json;
        
    }
    public function get_login(){
        $usuarios = Model_Usuarios::find('all' , array(
            'where'=> array(
                array('nombre', ($_POST['nombre'])),
                array('pass', ($_POST['pass'])),
                )
            ));
    }
    
    public function post_delete()
    {
        $usuario = Model_Usuarios::find($_POST['id']);
        $usuarioNombre = $usuario->nombre;
        $usuario->delete();

        $json = $this->response(array(
            'code' => 200,
            'message' => 'usuario borrado',
            'nombre' => $usuarioNombre
        ));

        return $json;
    }
}