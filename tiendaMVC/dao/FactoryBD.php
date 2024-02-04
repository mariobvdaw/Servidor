<?php

class FactoryBD
{
    public static function realizaConsulta($sql, $arr_parametros)
    {
        try {
            $conn = new PDO("mysql:host=" . IP . ";dbname=" . BBDD, USER, PASS);
            $stmt = $conn->prepare($sql);
            $stmt->execute($arr_parametros);

        } catch (PDOException $e) {
            switch ($e->getCode()) {
                case '1049':
                    crearBase();
                    break;
            }
            $stmt = null;
            echo $e->getMessage();
            unset($conn);
        }
        return $stmt;
    }
}
