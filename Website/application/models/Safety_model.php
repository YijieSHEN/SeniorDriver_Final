 <?php
class Safety_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

	public function get_make(){
        $query = $this->db->query("SELECT DISTINCT Make FROM Vehicle_Safety");
		return $query->result();
	}

	public function get_model_by_make($input_make){
        $query = $this->db->query("SELECT DISTINCT Model FROM Vehicle_Safety WHERE Make = '$input_make'");

		return $query->result();
	}

	public function get_band($input_make, $input_model, $input_year){
        $query = $this->db->query("SELECT * FROM Vehicle_Safety WHERE Make = '$input_make' AND Model = '$input_model' AND Start_Year <= $input_year AND End_Year >= $input_year");
		return $query->result();
	}

	public function get_crash_make($input_make){
        $query = $this->db->query("SELECT (SELECT COUNT(vehicle_id) FROM Vehicle WHERE Make='$input_make')/ (SELECT COUNT(VEHICLE_ID) FROM Vehicle) * 100 as get_crash_make_result;");
		return $query->row();
	}

	public function get_reg_make($input_make){
        $query = $this->db->query("SELECT (SELECT COUNT(Registration_id) FROM Registration WHERE Make='$input_make')/ (SELECT COUNT(Registration_id) FROM Registration) * 100 as get_reg_make_result;");
		return $query->row();
	}
}

