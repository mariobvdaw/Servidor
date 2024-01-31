<?php
require('./dao/InstitutoDAO.php');
class InstitutoController extends Base
{
    public static function institutos()
    {
        $metodo = $_SERVER['REQUEST_METHOD'];
        $recursos = self::divideURI();
        $filtros = self::condiciones();
        switch ($metodo) {
            case 'GET':
                if (count($recursos) === 2 && count($filtros) === 0) { // buscar todos
                    $datos = InstitutoDAO::findAll();
                } else if (count($recursos) === 2 && count($filtros) > 0) { // buscar con filtros
                    $datos = self::buscaConFiltros();
                } else if (count($recursos) === 3) {
                    $datos = InstitutoDAO::findById($recursos[2]); // buscar por id
                } else {
                    Base::response("HTTP/1.0 400 Direccion incorrecta");
                }
                $datos = json_encode($datos);
                self::response('HTTP/1.0 200 OK', $datos);
                break;

            case 'POST':
                $datos = json_decode(file_get_contents('php://input'), true);
                if (isset($datos['nombre']) && isset($datos['localidad']) && isset($datos['telefono'])) {
                    $instituto = new Instituo(null, $datos['nombre'], $datos['localidad'], $datos['telefono']);
                    if (InstitutoDAO::insert($instituto)) {
                        $instituto = InstitutoDAO::findLast();
                        $instituto = json_encode($instituto);
                        self::response("HTTP/1.0 201 Insertado correctamente", $instituto);
                    }
                } else {
                    self::response("HTTP/1.0 400 No esta introduciendo los atributos de instituto (nombre, localidad, telefono)");
                }
                break;

            case 'PUT':
                self::put();
                break;

            case 'DELETE':

                break;

            default:
                self::response("HTTP/1.0 400 No permite el metodo utilizado");
                break;
        }
    }

    public static function buscaConFiltros()
    {
        // comprobar si el nombre del filtro está permitido
        $permitimos = ['nombre', 'localidad'];
        $filtros = self::condiciones();
        foreach ($filtros as $key => $value) {
            if (!in_array($key, $permitimos)) {
                self::response("HTTP/1.0 400 No permite el parametro " . $key);
            }
        }
        return InstitutoDAO::findByFiltros($filtros);

    }
    public static function put()
    {
        $recursos = self::divideURI();
        if (count($recursos) == 3) {
            $datos = json_decode(file_get_contents('php://input'), true);
            $id = $recursos[2];

            $permitimos = ['nombre', 'localidad', "telefono"];
            foreach ($datos as $key => $value) {
                if (!in_array($key, $permitimos)) {
                    self::response("HTTP/1.0 400 No permite el parametro " . $key);
                }
            }
            $instituto = InstitutoDAO::findById($id);
            if (count($instituto) == 1) {
                $instituto = (object)$instituto[0];
                $instituto = new Instituo($id, $datos['nombre'], $datos['localidad'], $datos['telefono']);
                if (InstitutoDAO::update($instituto)) {
                    $instituto = json_encode($instituto);
                    self::response("HTTP/1.0 201 Modificado correctamente", $instituto);
                }
            }else{
                self::response("HTTP/1.0 400 Estas intentando modificar un instituto que no existe");
            }
        } else {
            self::response("HTTP/1.0 400 No se ha indicado el id");

        }
    }

}
