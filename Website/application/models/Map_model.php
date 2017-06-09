 <?php
class Map_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

	public function get_all_location($input_postcode){
        	$query = $this->db->query("select Latitude, Longitude from Accident WHERE Postcode_No = $input_postcode");
		return $query->result();
	}

}

