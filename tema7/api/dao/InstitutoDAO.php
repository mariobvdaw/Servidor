<?
require('./modelo/Instituto.php');
require('./dao/FactoryBD.php');

class InstitutoDAO
{
    public static function findAll()
    {
        $sql = "SELECT * FROM instituto";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql, $parametros);


        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById($id)
    {
        $sql = "SELECT * FROM instituto WHERE id = ?";
        $parametros = array($id);
        $result = FactoryBD::realizaConsulta($sql, $parametros);

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findByFiltros($filtros)
    {
        $numFiltros = count($filtros);
        $parametros = array();
        $sql = "SELECT * FROM instituto WHERE ";
        foreach ($filtros as $key => $value) { // completar sql
            if ($key == 'nombre') {
                $sql .= $key . " LIKE ? ";
                $valor = '%' . $value . '%';
                array_push($parametros, $valor);
            } else {
                $sql .= $key . " = ? ";
                array_push($parametros, $value);
            }
            if ($numFiltros == 2) {
                $numFiltros--;
                $sql .= ' AND ';
            }
        }
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function insert($instituto){
        $sql = "INSERT INTO instituto (nombre, localidad, telefono) VALUES (?,?,?) ";

        $parametros = array(
            $instituto->nombre,
            $instituto->localidad,
            $instituto->telefono
        );
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount()>0) {
            return true;
        }
        return false;

    }

    public static function update($instituto)
    {
        $sql = "UPDATE instituto SET nombre = ?, localidad = ?, telefono = ? WHERE id = ?";
        $parametros = array(
            $instituto->nombre,
            $instituto->localidad,
            $instituto->telefono,
            $instituto->id
        );

        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() > 0)
            return true;
        return false;

    }

    public static function findLast()
    {
        $sql = "SELECT * FROM instituto ORDER BY id DESC LIMIT 1";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql, $parametros);

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

}
