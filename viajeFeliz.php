<?php

//CLASE
class Viaje {

    //ATRIBUTOS
    private $codigo;
    private $destino;
    private $cantMaxPas;

    //METODO CONSTRUCTOR
    public function __construct($codigo, $destino,$cantMaxPas)
    {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->cantMaxPas = $cantMaxPas;
    }

    //METODO ACCESOR GET
    public function getCodigo () {
        return $this->codigo;
    }

    public function getDestino () {
        return $this->destino;
    }

    public function getCantMaxPas () {
        return $this->cantMaxPas;
    }

    //METODO ACCESOR SET

    public function setCodigo($nuevoCodigo) {
        $this-> codigo = $nuevoCodigo;
    }

    public function setDestino($nuevoDestino) {
        $this-> destino = $nuevoDestino;
    }

    public function setCantMaxPas($nuevoCantMaxPas) {
        $this-> cantMaxPas = $nuevoCantMaxPas;
    }

    //METODOS 
    public function viajes ($codigoViaje, $destinoViaje, $cantMaxPasajeros) {

        $viaje = ["codigoViaje" => $codigoViaje, "destinoViaje"=> $destinoViaje, "cantMaxPas"=> $cantMaxPasajeros];
         return $viaje;
    }

    public function pasajeros ($cantMaxPas) {

        $n = 1;
        echo "Debe ingresar los datos de todos los pasajeros \n";
            for ($i = 0; $i < $cantMaxPas; $i++){
            echo "Ingrese los datos del pasajero numero ". $n . " \n";
            echo "Nombre: ";
            $nombre = trim(fgets(STDIN));
            echo "Apellido: ";
            $apellido = trim(fgets(STDIN));
            echo "DNI: ";
            $dni = trim(fgets(STDIN));
            $pasajeros[$i] = ["nombre" => $nombre, "apellido" => $apellido,"dni" => $dni];
            $n++;
         return $pasajeros;
    }}

    public function datos($codigo, $arrayViaje, $arrayPas) {
        
        $i = 0;
        do{
           if ($arrayViaje[$i]["codigoViaje"] == $codigo) {
            echo "Codigo del viaje: ". $arrayViaje[$i]["codigoViaje"];
            echo "Destino del viaje: ". $arrayViaje[$i]["destinoViaje"];
            echo "Cantidad maxima de pasajeros: ". $arrayViaje[$i]["cantMaxPas"];
            echo "Datos de los pasajeros: ";
            $n = 0;
           foreach ($arrayPas[$i][$n]["nombre"] as $key => $value) {
            echo $key ." : ". $value;
            $n++;
           } 
           foreach ($arrayPas[$i][$n]["apellido"] as $key => $value) {
            echo $key ." : ". $value;
            $n++;
           }
           foreach ($arrayPas[$i][$n]["dni"] as $key => $value) {
            echo $key ." : ". $value;
            $n++;
           }
           
           }

        }while($i < count($arrayViaje) && $arrayViaje[$i]["codigoViaje"] == $codigo);
    }

    public function modificar ($codigo, $arrayViaje, $arrayPas) {

        $i = 0;
        echo "¿Que datos desea modificar? (destino, cantidad maxima de pasajeros, pasajeros)";
        $dato = trim(fgets(STDIN));
        do{
           if ($dato == "destino" && $arrayViaje[$i]["codigoViaje"] == $codigo) {
            echo "Modificar destino del viaje: ";
            $modificar = trim(fgets(STDIN));
            $arrayViaje[$i]["destino"] = $modificar;
           } elseif ($dato == "cantidad maxima de pasajeros" && $arrayViaje[$i]["codigoViaje"] == $codigo) {
            echo "Modificar la cantidad maxima de pasajeros: "; 
            $modificar = trim(fgets(STDIN));
            $arrayViaje[$i]["cantMaxPas"] = $modificar;
           }elseif ($dato == "pasajeros" && $arrayViaje[$i]["codigoViaje"] == $codigo) {
            echo "¿Que dato del pasajero desea modificar? (nombre, apellido, dni)";
            $datoPas = trim(fgets(STDIN));
            if ($datoPas == "nombre") {
                echo "Ingrese el numero de pasajero a modificar: ";
                $numPas = trim(fgets(STDIN));
                echo "Modificar nombre del pasajero: ";
                $modificarPas = trim(fgets(STDIN));
                $arrayPas[$i][$numPas]["nombre"] = $modificarPas;
            } elseif ($datoPas == "apellido") {
                echo "Ingrese el numero de pasajero a modificar: ";
                $numPas = trim(fgets(STDIN));
                echo "Modificar apellido del pasajero: ";
                $modificarPas = trim(fgets(STDIN));
                $arrayPas[$i][$numPas]["apellido"] = $modificarPas;
            } elseif ($datoPas == "dni") {
                echo "Ingrese el numero de pasajero a modificar: ";
                $numPas = trim(fgets(STDIN));
                echo "Modificar dni del pasajero: ";
                $modificarPas = trim(fgets(STDIN));
                $arrayPas[$i][$numPas]["dni"] = $modificarPas;
            }
           }
        } while ($i < count($arrayViaje) && $arrayViaje[$i]["codigoViaje"] != $codigo);
    }
}

?>