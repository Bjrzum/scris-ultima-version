<?php

class Administrador
{
    // Atributos sqlite3
    private $db;
    private $ruta;
    private $consulta;
    private $nombre;
    private $dependencia;
    private $direccionDeCurso;
    private $asignatura;
    private $placaDeVehiculo;
    private $observaciones;
    private $error;

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
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getDependencia()
    {
        return $this->dependencia;
    }
    public function getDireccionDeCurso()
    {
        return $this->direccionDeCurso;
    }
    public function getAsignatura()
    {
        return $this->asignatura;
    }
    public function getPlacaDeVehiculo()
    {
        return $this->placaDeVehiculo;
    }
    public function getObservaciones()
    {
        return $this->observaciones;
    }
    public function getRuta()
    {
        return $this->ruta;
    }
    public function getDb()
    {
        return $this->db;
    }
    public function getConsulta()
    {
        return $this->consulta;
    }


    // Setters
    public function setError($error)
    {
        $this->error = $error;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setDependencia($dependencia)
    {
        $this->dependencia = $dependencia;
    }
    public function setDireccionDeCurso($direccionDeCurso)
    {
        $this->direccionDeCurso = $direccionDeCurso;
    }
    public function setAsignatura($asignatura)
    {
        $this->asignatura = $asignatura;
    }
    public function setPlacaDeVehiculo($placaDeVehiculo)
    {
        $this->placaDeVehiculo = $placaDeVehiculo;
    }
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    }
    public function setRuta($ruta)
    {
        $this->ruta = $ruta;
    }
    public function setDb($db)
    {
        $this->db = $db;
    }
    public function setConsulta($consulta)
    {
        $this->consulta = $consulta;
    }

    // Funciones
    public function insertarRegistro($nombre, $dependencia, $direccionDeCurso, $asignatura, $placaDeVehiculo, $observaciones)
    {
        $this->nombre = $nombre;
        $this->dependencia = $dependencia;
        $this->direccionDeCurso = $direccionDeCurso;
        $this->asignatura = $asignatura;
        $this->placaDeVehiculo = $placaDeVehiculo;
        $this->observaciones = $observaciones;
        $this->consulta = "INSERT INTO funcionarios (nombre, dependencia, direccionDeCurso, asignatura, placaDeVehiculo, observaciones) VALUES ('$this->nombre', '$this->dependencia', '$this->direccionDeCurso', '$this->asignatura', '$this->placaDeVehiculo', '$this->observaciones')";
        $this->resultado = $this->db->query($this->consulta);
        if ($this->resultado) {
            $this->error = "Registro insertado correctamente";
        } else {
            $this->error = "Error al insertar el registro";
        }
    }

    public function crearTablaFuncionarios()
    {
        //CREAR TABLA SI NO EXISTE
        $this->consulta = "CREATE TABLE IF NOT EXISTS funcionarios (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nombre TEXT,
            dependencia TEXT,
            direccionDeCurso TEXT,
            asignatura TEXT,
            placaDeVehiculo TEXT,
            observaciones TEXT
        )";
        $this->resultado = $this->db->query($this->consulta);
        if ($this->resultado) {
            $this->error = "Tabla creada correctamente";
        } else {
            $this->error = "Error al crear la tabla";
        }
    }

    public function mostrarRegistro($id)
    {
        $this->consulta = "SELECT * FROM funcionarios WHERE id = $id";
        $this->resultado = $this->db->query($this->consulta);
        if ($this->resultado) {
            $this->error = "Registro mostrado correctamente";
            //retornar resultado
            return $this->resultado;
        } else {
            $this->error = "Error al mostrar el registro";
            //reotnar false
            return false;
        }
    }

    public function actualizarRegistro($id, $nombre, $dependencia, $direccionDeCurso, $asignatura, $placaDeVehiculo, $observaciones)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->dependencia = $dependencia;
        $this->direccionDeCurso = $direccionDeCurso;
        $this->asignatura = $asignatura;
        $this->placaDeVehiculo = $placaDeVehiculo;
        $this->observaciones = $observaciones;
        $this->consulta = "UPDATE funcionarios SET nombre = '$this->nombre', dependencia = '$this->dependencia', direccionDeCurso = '$this->direccionDeCurso', asignatura = '$this->asignatura', placaDeVehiculo = '$this->placaDeVehiculo', observaciones = '$this->observaciones' WHERE id = $this->id";
        $this->resultado = $this->db->query($this->consulta);
        if ($this->resultado) {
            $this->error = "Registro actualizado correctamente";
        } else {
            $this->error = "Error al actualizar el registro";
        }
    }

    public function eliminarRegistro($id)
    {
        $this->id = $id;
        $this->consulta = "DELETE FROM funcionarios WHERE id = $this->id";
        $this->resultado = $this->db->query($this->consulta);
        if ($this->resultado) {
            $this->error = "Registro eliminado correctamente";
        } else {
            $this->error = "Error al eliminar el registro";
        }
    }

    public function eliminarTablaFuncionarios()
    {
        $this->consulta = "DROP TABLE funcionarios";
        $this->resultado = $this->db->query($this->consulta);
        if ($this->resultado) {
            $this->error = "Tabla eliminada correctamente";
        } else {
            $this->error = "Error al eliminar la tabla";
        }
    }

    public function mostrarError()
    {
        return $this->error;
    }

    public function mostrarResultado()
    {
        return $this->resultado;
    }

    public function mostrarConsulta()
    {
        return $this->consulta;
    }

    public function mostrarNombre($id)
    {
        $this->consulta = "SELECT nombre FROM funcionarios WHERE id = $id";
        $this->resultado = $this->db->query($this->consulta);
        if ($this->resultado) {
            $this->error = "Nombre mostrado correctamente";
        } else {
            $this->error = "Error al mostrar el nombre";
        }
    }
}
