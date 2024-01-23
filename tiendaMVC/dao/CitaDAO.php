<?php

class CitaDAO
{
    public static function findAll()
    {
        $sql = "SELECT * FROM Cita";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql, $parametros);

        $arr_citas = array();

        while ($citaStd = $result->fetchObject()) {
            $cita = new Cita(
                $citaStd->id,
                $citaStd->especialista,
                $citaStd->motivo,
                $citaStd->fecha,
                $citaStd->paciente,
                $citaStd->activo
            );

            array_push($arr_citas, $cita);
        }
        return $arr_citas;
    }

    public static function findById($id)
    {
        $sql = "SELECT * FROM Cita WHERE id = ?";
        $parametros = array($id);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {

            $citaStd = $result->fetchObject();
            $cita = new Cita(
                $citaStd->id,
                $citaStd->especialista,
                $citaStd->motivo,
                $citaStd->fecha,
                $citaStd->paciente,
                $citaStd->activo
            );
            return $cita;
        }
    }

    public static function insert($cita)
    {
        $sql = "INSERT INTO Cita (especialista, motivo, fecha, paciente, activo) VALUES (?,?,?,?,?)";
        $parametros = array(
            $cita->especialista,
            $cita->motivo,
            $cita->fecha,
            $cita->paciente,
            $cita->activo
        );
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() > 0) {
            return true;
        }
        return false;

    }

    public static function update($cita)
    {
        $sql = "UPDATE Cita SET especialista = ?, motivo = ?, fecha = ?, paciente = ?, activo = ? WHERE id = ?";
        $parametros = array(
            $cita->especialista,
            $cita->motivo,
            $cita->fecha,
            $cita->activo,
            $cita->paciente,
            $cita->id
        );

        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() > 0)
            return true;
        return false;
    }

    public static function delete($cita)
    {
        $sql = "UPDATE Cita SET activo = false WHERE id = ?";

        $parametros = array($cita->id);

        $result = FactoryBD::realizaConsulta($sql, $parametros);
        return true;
    }

    public static function activar($cita)
    {
        $sql = "UPDATE Cita SET activo = TRUE WHERE id = ?";

        $parametros = array($cita->id);

        $result = FactoryBD::realizaConsulta($sql, $parametros);
        return true;

    }
    public static function findByPaciente($paciente)
    {
        $sql = "SELECT * FROM Cita WHERE paciente = ? AND activo = 1 AND fecha > now() ORDER BY fecha";
        $parametros = array($paciente->codUsuario);
        $result = FactoryBD::realizaConsulta($sql, $parametros);

        $arr_citas = array();

        while ($citaStd = $result->fetchObject()) {
            $cita = new Cita(
                $citaStd->id,
                $citaStd->especialista,
                $citaStd->motivo,
                $citaStd->fecha,
                $citaStd->paciente,
                $citaStd->activo
            );

            array_push($arr_citas, $cita);
        }
        return $arr_citas;

    }
    public static function findByPacienteH($paciente)
    {
        $sql = "SELECT * FROM Cita WHERE paciente = ? AND activo = 1 AND fecha < now() ORDER BY fecha";
        $parametros = array($paciente->codUsuario);
        $result = FactoryBD::realizaConsulta($sql, $parametros);

        $arr_citas = array();

        while ($citaStd = $result->fetchObject()) {
            $cita = new Cita(
                $citaStd->id,
                $citaStd->especialista,
                $citaStd->motivo,
                $citaStd->fecha,
                $citaStd->paciente,
                $citaStd->activo
            );

            array_push($arr_citas, $cita);
        }
        return $arr_citas;

    }
}
?>