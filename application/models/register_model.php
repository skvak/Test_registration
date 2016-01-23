<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Register_model extends CI_Model 
	{
        public function get_all_countries_cities()
        {
            $this->db->select('cities.id_city as id_city, cities.city_name as city_name, 
                countries.id_country as id_country, countries.country_name');
            $this->db->from('cities');
            $this->db->join('countries', 'cities.id_country = countries.id_country');
            $query = $this->db->get();
            
            return $query->result_array();      
        }

        public function add_user($data)
        {
            $this->db->insert('users', $data);
        }

        public function get_users()
        {
            $this->db->select('users.login, users.password, users.phone, cities.city_name as city_name, users.invite');
            $this->db->from('users');
            $this->db->join('cities', 'users.id_city = cities.id_city');
            $query = $this->db->get();
            
            return $query->result_array();
        }

        public function get_invites()
        {
            $this->db->select('*');
            $this->db->from('invites');
            $query = $this->db->get();
            
            return $query->result_array();
        }
	}