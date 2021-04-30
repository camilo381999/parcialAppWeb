<?php
//include_once('../Usuarios.php');
include_once('Usuarios.php');

class ValidarRegistro{

    private $aviso_inicio;
    private $aviso_cierre;

    private $usuarios;

    private $nombre;
    private $cedula;
    private $correo;
    private $contrasena1;

    private $error_nombre;
    private $error_cedula;
    private $error_correo;
    private $error_contrasena;

    public function __construct($nombre,$cedula,$correo,$contrasena) {
       
        $this -> usuarios = new Usuarios();

        $this -> aviso_inicio = "<br><div class='alert alert-primary' role='alert'>";
        $this -> aviso_cierre = "</div>";
       
        $this -> nombre = "";
        $this -> cedula = "";
        $this -> correo = "";
        $this -> contrasena1 = "";

        //llama los metodos y si hay error los guarda en cada variable
        $this ->error_nombre = $this -> validar_nom($nombre);
        $this ->error_cedula = $this -> validar_cedu($cedula);
        $this ->error_correo = $this -> validar_cor($correo);
        $this ->error_contrasena = $this -> validar_cont($contrasena);

        if($this->error_contrasena === ""){
            $this -> contrasena1 = $contrasena;
        }
        
    }

    //Valida si la contraseña es null o vacia
    private function var_iniciada($var) {
      if( isset($var) && !empty($var)){
        return true;
      }else{
        return false;
      }
    }

    //llama al metodo var_iniciada y si no esta vacia le asigna el valor a la variable 
    //si está vacia devuelve el error
    private function validar_nom($nombre){
        if(!$this -> var_iniciada($nombre)){
            return "Por favor escriba su nombre";
        }else{
            $this -> nombre = $nombre;
        }

        return "";
    }

    private function validar_cedu($cedula){
        if(!$this -> var_iniciada($cedula)){
            return "Por favor escriba su cédula";
        }else{
            $this -> cedula = $cedula;
        }

        if($this -> usuarios ->existe_cedula($cedula)){
            return "Esta cédula ya está registrada";
        }

        return "";
    }

    private function validar_cor($correo){
        if(!$this -> var_iniciada($correo)){
            return "Por favor escriba su correo";
        }else{
            $this -> correo = $correo;
        }

        if($this -> usuarios ->existe_correo($correo)){
            return "Este correo ya está registrado  <a href ='#'>Recuperar contraseña</a>";
        }

        return "";
    }

    private function validar_cont($contrasena){
        if(!$this -> var_iniciada($contrasena)){
            return "Por favor escriba su contraseña";
        }

        return "";
    }

    public function getNombre(){
        return $this -> nombre;
    }
    public function getCedula(){
        return $this -> cedula;
    }
    public function getCorreo(){
        return $this -> correo;
    }
    public function getContrasena(){
        return $this -> contrasena1;
    }


    public function get_error_nombre(){
        return $this -> error_nombre;
    }
    public function get_error_cedula(){
        return $this -> error_cedula;
    }
    public function get_error_correo(){
        return $this -> error_correo;
    }
    public function get_error_contrasena(){
        return $this -> error_contrasena;
    }

    //Muestra el nombre en value cuando se ha enviado el formulario y hay un error
    public function mostrar_nombre(){
        if($this -> nombre !== ""){
            echo 'value="'.$this -> nombre .'"';
        }
    }

    //muestra el error con bootstrap
    public function mostrar_error_nombre(){
        if($this -> error_nombre !== ""){
            echo $this -> aviso_inicio . $this -> error_nombre . $this -> aviso_cierre;
        }
    }

    public function mostrar_cedula(){
        if($this -> cedula !== ""){
            echo 'value="'.$this -> cedula .'"';
        }
    }

    public function mostrar_error_cedula(){
        if($this -> error_cedula !== ""){
            echo $this -> aviso_inicio . $this -> error_cedula . $this -> aviso_cierre;
        }
    }

    public function mostrar_correo(){
        if($this -> correo !== ""){
            echo 'value="'.$this -> correo .'"';
        }
    }

    public function mostrar_error_correo(){
        if($this -> error_correo !== ""){
            echo $this -> aviso_inicio . $this -> error_correo . $this -> aviso_cierre;
        }
    }

    public function mostrar_error_contrasena(){
        if($this -> error_contrasena !== ""){
            echo $this -> aviso_inicio . $this -> error_contrasena . $this -> aviso_cierre;
        }
    }

    public function regis_valido(){
        if($this -> error_nombre === "" &&
         $this -> error_cedula === "" &&
         $this -> error_correo === "" &&
         $this -> error_contrasena === ""){
            return true;
         }else{
             return false;
         }
    }
}
?>