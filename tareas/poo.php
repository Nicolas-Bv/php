<?php

class Persona{                  //defino el objeto 
    protected $dni;             //PROTECTED para ser visto dentro de su clase y sus hijas
    protected $nombre;
    protected $edad;
    protected $nacionalidad;

 
        public function setDni($dni){$this->dni;}       //seteo cual sera el valor de cada variable
        public function getDni(){return $this->dni;}    //es PUBLIC para poder verlo desde cualquier momento, su alcance es mayor

        public function setNombre($nombre){$this->nombre;}
        public function getNombre(){return $this->nombre;}

        public function setEdad($edad){$this->edad;}
        public function getEdad(){return $this->edad;}


        public function setNacionalidad($nacionalidad){$this->nacionalidad;}
        public function getNacionalidad(){return $this->nacionalidad;}

        public function imprimir(){}                //defino la funcion imprimir


    };
                 //es
    class Alumno extends Persona{       //agrego los datos que seran necesarios para la instancia Alumnos
        private $legajo;
        private $notaPortfolio;         //PRIVATE porque son datos sensibles, SOLO se ve desde la clase NO desde el programa
        private $notaPhp;
        private $notaProyecto;          //son las variables a las que vamos a remitir

        public function __construct()
        {
            $this->notaPortfolio=0.0;       //le doy forma 
            $this->notaPhp=0.0;
            $this->notaProyecto=0.0;
        }

        public function __get($propiedad){   //recupero las propiedades
            return $this->$propiedad;
        }

        public function __set($propiedad, $valor){ //le asigno un valor
            return $this->$propiedad=$valor;
        }

        public function imprimir(){
            echo "DNI: " .$this->dni.". <br>";        //imprimo esos valores junto con la propiedad clave:valor seria
            echo "Nombre: " .$this->nombre.". <br>";
            echo "Edad: " .$this->edad.". <br>";
            echo "Nacionalidad: " .$this->nacionalidad.". <br>";
            echo "Nota Portfolio: " .$this->notaPortfolio.". <br>";
            echo "Nota PHP: " .$this->notaPhp.". <br>";
            echo "Nota Proyecto: " .$this->notaProyecto.". <br>";
            echo "El primedio es: " .$this->calcularPromedio().". <br><br>";
        }

        public function calcularPromedio(){
            return (($this->notaPortfolio+$this->notaPhp+$this->notaProyecto)/3);  //defino las funciones
        }

        public function __destruct()
        {                                                               //libero el espacio
            echo "Destruyendo el objeto: ". $this->nombre . "<br>";
        }


    };





        class Docente extends Persona{
            private $especialidad;

            const ESPECIALIDAD_WP= "WordPress";         //constantes para no volverse loco, se definen una sola vez
            const ESPECIALIDAD_ECO="Economía Aplicada";
            const ESPECIALIDAD_BBDD="Base de Datos";

            public function __construct($dni,$nombre,$especialidad)
            {
                $this->dni=$dni;                        //el constructor o la forma de este objeto sera:
                $this->nombre=$nombre;
                $this->especialidad=$especialidad;
            }

    

        function __get($propiedad){                 //tomo los datos 
            return $this->$propiedad;
        }

        function __set($propiedad, $valor){         //los pongo en forma clave:valor
            $this->$propiedad=$valor;
        }



        function imprimir(){
            echo "DNI: ".$this->dni.". <br>";           //lo imprimo
            echo "Nombre: ".$this->nombre.". <br>";
            echo "Edad: ".$this->edad.". <br>";
            echo "Nacionalidad: ".$this->nacionalidad.". <br>";
            echo "Especialidad: ".$this->especialidad.". <br><br>";

        }

        function imprimirEspecialidadesHanilitadas(){
            echo "Las especialidades habilitadas son: <br>";
            echo self::ESPECIALIDAD_WP . ", <br>";                  //imprimo las especialidades
            echo self::ESPECIALIDAD_ECO . ", <br>";
            echo self::ESPECIALIDAD_BBDD . ", <br><br>";
        }

        
        public function __destruct()
        {
            echo "Destruyendo el objeto: ". $this->nombre . "<br>";         //libero espacio
        }                                                                   

    }



    // hacerlo correr al programa:

    $alumno1 = new Alumno();
    $alumno1->setNombre("Martin Lopez");
    $alumno1->setEdad(25);
    $alumno1->notaPortfolio=9;
    $alumno1->notaPhp=7;
    $alumno1->notaProyecto=8;
    echo "Nombre: ".$alumno1->getNombre();
    $alumno1->imprimir();

    $alumno2= new Alumno();
    $alumno2->setNombre("Julieta Fernandez");
    $alumno2->setEdad(32);
    $alumno2->notaPortfolio=5;
    $alumno2->notaPhp=10;
    $alumno2->notaProyecto=7;
    $alumno2->imprimir();

    $docente1= new Docente("30000545", "Soledad Perez", Docente::ESPECIALIDAD_ECO);
    $docente1->imprimir();

?>