<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class billing extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('model14');
	}

	public function index()
	{	
		$this->data['title'] = 'Billing';
		
		$this->load->view('billing', $this->data);
	}
	
	public function save_order()
	{

		$order = array(
			'date' 			=> date('Y-m-d'),
			'customerid' 	=> $this->input->post('idp')
		);		

		$ord_id = $this->model14->insert_order($order);
		
		if ($cart = $this->cart->contents()):
			foreach ($cart as $item):
				$order_detail = array(
					'orderid' 		=> $ord_id,
					'productid' 	=> $item['id'],
					'quantity' 		=> $item['qty'],
					'price' 		=> $item['price']
				);		

				$cust_id = $this->model14->insert_order_detail($order_detail);
			endforeach;
		endif;
		
		echo "Thank You! your order has been placed!<br />";
		echo "<a href=".base_url()."products>Go back</a>";
	}
}