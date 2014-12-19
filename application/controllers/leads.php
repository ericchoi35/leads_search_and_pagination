<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leads extends CI_Controller {

	public function index()
	{
		$all_leads = $this->Lead->get_all_leads();
		$pages = ceil(count($all_leads)/5);

		$leads = $this->Lead->get_all_leads();
		$this->load->view('index', array('leads' => $leads, 'pages' => $pages));
	}

	public function search()
	{
		$name = $this->input->post('name') . '%';
		$email = $this->input->post('email') . '%';
		$date_from = $this->input->post('date_from') . '%';

		if(trim($this->input->post('date_to')) == '')
		{
			$date_to = date("Y/m/d");
		}
		else
		{
			$date_to = $this->input->post('date_to');
		}
		
		$info = array(
			'name' => $name,
			'email' => $email,
			'date_from' => $date_from,
			'date_to' => $date_to
			);

		$leads = $this->Lead->search_leads($info);

		$all_leads = $this->Lead->get_all_leads();
		$pages = ceil(count($all_leads)/5);

		$this->load->view('partial_html', array('leads' => $leads, 'pages' => $pages));
	}

	public function pages($num)
	{
		$limit = $num * 5;
		$size = 5;

		$info = array('limit' => $limit, 'size' => $size);
		$leads = $this->Lead->get_leads($info);

		$all_leads = $this->Lead->get_all_leads();
		$pages = ceil(count($all_leads)/5);

		$this->load->view('partial_html', array('leads' => $leads, 'pages' => $pages));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */