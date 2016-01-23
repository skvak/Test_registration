<?php
class Index extends CI_Controller 
{
	public function __construct()
    {
        parent::__construct();     
    }

	public function index()
	{
		$this->load->helper('form');
		$this->load->model('register_model');
		$data['country_city'] = $this->register_model->get_all_countries_cities();
		$this->load->view('register', $data);
	}

	public function add_user()
	{
		$data = new stdClass();

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('login', 'Логин', 'trim|required|alpha_numeric|min_length[5]|max_length[20]|is_unique[users.login]', array('is_unique' => 'Пользователь уже существует.'));
		$this->form_validation->set_rules('tel', 'Телефон', 'trim|required|min_length[10]|max_length[15]');
		$this->form_validation->set_rules('password', 'Пароль', 'trim|required|min_length[5]|max_length[20]');
		$this->form_validation->set_rules('password_confirm', 'Повторите пароль', 'trim|required|min_length[5]|max_length[20]|matches[password]');
		$this->form_validation->set_rules('invite', 'Инвайт', 'trim|required|alpha_numeric|min_length[6]|max_length[6]');

		if ($this->form_validation->run() === false) 
		{
			// validation not ok, send validation errors to the view
			
			$this->load->view('register', $data);
				
		}

		else 
		{
			$login = $this->input->post('login');
			$password = $this->input->post('password');
			$phone = $this->input->post('tel');
			$phone = preg_replace('~[^0-9]+~','',$phone);
			$id_city = $this->input->post('cityname');
			$invite = $this->input->post('invite');
			
			$data1['login'] = $login;
			$data1['password'] = $password;
			$data1['phone'] = $phone;
			$data1['id_city'] = $id_city;
			$data1['invite'] = $invite;

			$this->load->model('register_model');
			$this->register_model->add_user($data1);
			$this->load->view('user_added_view');
		}
	}

	public function get_users()
	{
		$this->load->model('register_model');
		$data['users'] = $this->register_model->get_users();
		$this->load->view('all_users', $data);
	}

	public function get_invites()
	{
		$this->load->model('register_model');
		$data['invites'] = $this->register_model->get_invites();
		$this->load->view('all_invites', $data);
	}
}