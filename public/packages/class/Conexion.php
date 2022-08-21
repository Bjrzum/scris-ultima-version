<?php


class Conexion
{
    // Atributos sqlite3
    private $db;
    private $ruta;
    private $error;
    private $consulta;
    private $resultado;

    // Constructor
    public function __construct($ruta)
    {
        $this->ruta = $ruta;
        $this->db = new SQLite3($this->ruta);
    }

    // Getters
    public function getError()
    {
        return $this->error;
    }
    public function getConsulta()
    {
        return $this->consulta;
    }
    public function getResultado()
    {
        return $this->resultado;
    }
    public function getRuta()
    {
        return $this->ruta;
    }
    public function getDb()
    {
        return $this->db;
    }
    public function getRegistros($consulta)
    {
        $this->consulta = $consulta;
        $this->resultado = $this->db->query($this->consulta);
        return $this->resultado;
    }

    // Setters
    public function setError($error)
    {
        $this->error = $error;
    }
    public function setConsulta($consulta)
    {
        $this->consulta = $consulta;
    }
    public function setResultado($resultado)
    {
        $this->resultado = $resultado;
    }
    public function setRuta($ruta)
    {
        $this->ruta = $ruta;
    }
    public function setDb($db)
    {
        $this->db = $db;
    }

    // Métodos
    public function crearTabla()
    {
        $this->consulta = "CREATE TABLE IF NOT EXISTS registros (id INTEGER PRIMARY KEY AUTOINCREMENT, fecha TEXT, nombre TEXT, dependencia TEXT, direccionDeCurso TEXT, asignatura TEXT, horaDeIngreso TEXT, horaDeSalida TEXT, placaDeVehiculo TEXT, observaciones TEXT, estado NUMERIC, orden NUMERIC)";
        $this->resultado = $this->db->query($this->consulta);
        if ($this->resultado) {
            return true;
        } else {
            return false;
        }
    }

    public function insertarRegistro($fecha, $nombre, $dependencia, $direccionDeCurso, $asignatura, $horaDeIngreso, $horaDeSalida, $placaDeVehiculo, $observaciones, $estado, $orden)
    {
        $this->consulta = "INSERT INTO registros (fecha, nombre, dependencia, direccionDeCurso, asignatura, horaDeIngreso, horaDeSalida, placaDeVehiculo, observaciones, estado, orden) VALUES ('$fecha', '$nombre', '$dependencia', '$direccionDeCurso', '$asignatura', '$horaDeIngreso', '$horaDeSalida', '$placaDeVehiculo', '$observaciones', '$estado', '$orden')";
        $this->resultado = $this->db->query($this->consulta);
        if ($this->resultado) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarRegistro($id, $fecha, $nombre, $dependencia, $direccionDeCurso, $asignatura, $horaDeIngreso, $horaDeSalida, $placaDeVehiculo, $observaciones, $estado, $orden)
    {
        $this->consulta = "UPDATE registros SET fecha = '$fecha', nombre = '$nombre', dependencia = '$dependencia', direccionDeCurso = '$direccionDeCurso', asignatura = '$asignatura', horaDeIngreso = '$horaDeIngreso', horaDeSalida = '$horaDeSalida', placaDeVehiculo = '$placaDeVehiculo', observaciones = '$observaciones', estado = '$estado', orden = '$orden' WHERE id = '$id'";
        $this->resultado = $this->db->query($this->consulta);
        if ($this->resultado) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarRegistro($id)
    {
        $this->consulta = "DELETE FROM registros WHERE id = '$id'";
        $this->resultado = $this->db->query($this->consulta);
        if ($this->resultado) {
            return true;
        } else {
            return false;
        }
    }

    public function mostrarRegistros($consulta)
    {
        $this->consulta = $consulta;
        $this->resultado = $this->db->query($this->consulta);
        return $this->resultado;
    }

    public function cerrarConexion()
    {
        $this->db->close();
    }
}

//realizar pruebas

$conexion = new Conexion("../server/scris.db");
/*
ejemplo de crear tabla
-----------------------
$conexion->crearTabla();


ejemplo de insertar registro
----------------------------
$conexion->insertarRegistro("2019-01-01", "Juan", "Dependencia", "Dirección de Curso", "Asignatura", "Hora de Ingreso", "Hora de Salida", "Placa de Vehiculo", "Observaciones", "Estado", "Orden");
$conexion->insertarRegistro("2019-01-02", "Juan", "Dependencia", "Dirección de Curso", "Asignatura", "Hora de Ingreso", "Hora de Salida", "Placa de Vehiculo", "Observaciones", "Estado", "Orden");
$conexion->insertarRegistro("2019-01-03", "Juan", "Dependencia", "Dirección de Curso", "Asignatura", "Hora de Ingreso", "Hora de Salida", "Placa de Vehiculo", "Observaciones", "Estado", "Orden");


ejemplo de actualizar registro
-------------------------------
$conexion->actualizarRegistro(1, "2019-01-01", "Juan", "Dependencia", "Dirección de Curso", "Asignatura", "Hora de Ingreso", "Hora de Salida", "Placa de Vehiculo", "Observaciones", "Estado", "Orden");
$conexion->actualizarRegistro(2, "2019-01-02", "Juan", "Dependencia", "Dirección de Curso", "Asignatura", "Hora de Ingreso", "Hora de Salida", "Placa de Vehiculo", "Observaciones", "Estado", "Orden");


ejemplo de eliminar registro
-------------------------------
$conexion->eliminarRegistro(1);
$conexion->eliminarRegistro(2);


ejemplo de mostrar registros
-------------------------------
$consulta = "SELECT * FROM registros";
$resultado = $conexion->mostrarRegistros($consulta);
while ($fila = $resultado->fetchArray(SQLITE3_ASSOC)) {
    echo $fila['id'] . " - " . $fila['fecha'] . " - " . $fila['nombre'] . " - " . $fila['dependencia'] . " - " . $fila['direccionDeCurso'] . " - " . $fila['asignatura'] . " - " . $fila['horaDeIngreso'] . " - " . $fila['horaDeSalida'] . " - " . $fila['placaDeVehiculo'] . " - " . $fila['observaciones'] . " - " . $fila['estado'] . " - " . $fila['orden'] . "<br>";
}


ejemplo de cerrar conexion
-------------------------------
$conexion->cerrarConexion();
*/