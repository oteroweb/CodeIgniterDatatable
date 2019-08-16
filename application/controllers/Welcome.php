<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH.'/third_party/faker/autoload.php';

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
		$this->load->model('Clientes_model'); 
		$this->load->database();

		$clients_profile = $this->Clientes_model->getProfile(5); 
        $data = array( 
            'clients_data' => $clients_profile 
        ); 
        $this->load->view('welcome_message', $data); 
	}
}


/*
insertar 100 clientes
 		$this->load->database();
		$faker = Faker\Factory::create();
for ($i=0; $i < 100; $i++) { 
	$data = array(
        'nombre' => $faker->name,
		'cedulaIdentidadl' => rand(100000,999999),
    );
		// $clientes->insert($data);
		$this->db->insert('clientes', $data);

	
		*/

		// ventas


// 		$this->load->database();
// 		$faker = Faker\Factory::create();
// for ($i=0; $i < 700; $i++) { 
// 	$data = array(
//         'terminoventas_idterminoventas' => rand(1,2),
// 		'clientes_idclientes' => rand(1,101),
// 		'create_at' => date('Y-m-d',strtotime($faker->date())),
// 	);
// 		$this->db->insert('ventas', $data);
// }



// productos generacion

// $this->load->database();
// $faker = Faker\Factory::create();
// for ($i=0; $i < 180; $i++) { 
// $data = array(
// 'nombre' => $faker->sentence($nbWords = 6, $variableNbWords = true),
// 'precio' => mt_rand(0*1000000,20*1000000)/1000000,
// );
// $this->db->insert('productos', $data);
// }

// detalle venta 
// $this->load->database();
// $faker = Faker\Factory::create();
// for ($i=0; $i < 500; $i++) { 
// $data = array(
// 'ventas_idventas' => rand(1,500),
// 'productos_idproductos' => rand(1,180),
// 'precio' => mt_rand(0*1000,20*1000000)/10000,
// 'cantidad' => rand(1,200),
// 'descripcion'=>$faker->sentence($nbWords = 6, $variableNbWords = true),
// );
// $this->db->insert('detalleventas', $data);
// }
// pagos 
// $this->load->database();
// $faker = Faker\Factory::create();
// for ($i=0; $i < 1000; $i++) { 
// $data = array(
// 'clientes_idclientes' => rand(1,100),
// 'monto' => mt_rand(0*1000,20*1000000)/10000,
// 'create_at' => date('Y-m-d',strtotime($faker->date())),

// );
// $this->db->insert('pagos', $data);
// }
// comentarios adicionales


	// $clientes = $this->load->model('Clientes_model');
		// $this->load->model("Clientes_model","Clientes_model");
		// var_dump($this->Clientes_model->get_all());

		// var_dump($clientes);
		// $this->load->model('Common_model'); # Load Model
		// $result = $this->Common_model->getUser(); # Access the model function