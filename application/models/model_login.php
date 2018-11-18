<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_login extends CI_Model {

  function __construct(){
    parent::__construct();
  }

  public function consultaUser($user,$contra){
    $sql="SELECT u.usuario,u.contrasena, r.nombre_rol
    FROM usuario u, roles r
    WHERE u.rol= r.id
    AND u.usuario='$user'
    AND u.contrasena='$contra'";
    $query=$this->db->query($sql);
    
    return $query->row();
    //return $query->result();
  }
}
