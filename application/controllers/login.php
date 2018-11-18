<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	function __construct(){
    parent::__construct();
		$this->load->model('model_login');
  }

	public function index()
	{
		$this->load->view('view_login');
	}

	public function validaAcceso(){

		$user= $this->input->post('user');
		$pass= $this->input->post('pass');

		$result=$this->model_login->consultaUser($user,$pass);

		if(count($result)==1){

			$session=array(
				'USUARIO'=> $result->usuario,
				'CONTRASENA'=> $result->contrasena,
				'ROL'=> $result->nombre_rol,
				'is_logged_in'=>TRUE ,
			);
			$this->session->set_userdata($session);

			echo $result->nombre_rol;
			if ($result->nombre_rol='Admin') {
				redirect(base_url()."index.php/login/home_admin");
			}elseif ($result->nombre_rol='cliente') {
				redirect(base_url()."index.php/login/home_cliente");
			}elseif ($result->nombre_rol='camarero') {
				redirect(base_url()."index.php/login/home_camarero");
			}
		}else{
		echo "no está registrado";
		}
	}
	public function home_admin(){
		$this->load->view('view_home_admin');
	}
	public function home_cliente(){
		$this->load->view('view_home_cliente');
	}
	public function home_camarero(){
		$this->load->view('view_home_cama');
	}

}
