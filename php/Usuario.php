<?php
class Usuarios
{
    private $usr_id;
    private $usr_alias;
    private $usr_nombre;
    private $usr_apellido;
    private $usr_tipo;
    private $usr_estado;
    private $usr_correo;

    public function Usuario()
    {
        //$this->usr_id=0;
        //$this->usr_alias="";
        //etc...
    }

    //metodos get y set
    public function getCodigo()
    {
        return $this->usr_id;
    }
    public function setCodigo($cod)
    {
        $this->usr_id = $cod;
    }

    public function getAlias()
    {
        return $this->usr_alias;
    }
    public function setAlias($alias)
    {
        $this->usr_alias = $alias;
    }

    public function getNombre()
    {
        return $this->usr_nombre;
    }
    public function setNombre($nombre)
    {
        $this->usr_nombre = $nombre;
    }

    public function getApellido()
    {
        return $this->usr_apellido;
    }
    public function setApellido($apellido)
    {
        $this->usr_apellido = $apellido;
    }

    public function getTipo()
    {
        return $this->usr_tipo;
    }
    public function setTipo($tipo)
    {
        $this->usr_tipo = $tipo;
    }

    public function getEstado()
    {
        return $this->usr_estado;
    }
    public function setEstado($estado)
    {
        $this->usr_estado = $estado;
    }

    public function getCorreo()
    {
        return $this->usr_correo;
    }
    public function setCorreo($mail)
    {
        $this->usr_correo = $mail;
    }

    public function getImagen()
    {
        return $this->usr_img;
    }
    public function setImagen($imagen)
    {
        $this->usr_img = $imagen;
    }

}
