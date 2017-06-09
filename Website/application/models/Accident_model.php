 <?php
class Accident_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_accident($slug = FALSE){
        	$query = $this->db->query('SELECT * FROM Accident LIMIT 10');
		return $query->result();
	}

	public function get_accident_by_postcode($input_postcode){
        	$query = $this->db->query("Select * from Accident a, Person b, Accident_Details c where  a.ACCIDENT_NO = b.ACCIDENT_NO and a.ACCIDENT_NO = c.ACCIDENT_NO  and Postcode_No = $input_postcode and Road_User_Type='Drivers'");
		return $query->result();
	}

        public function get_accident_by_date($input_postcode, $search_date){
                $query = $this->db->query("Select * from Accident a, Person b, Accident_Details c where  a.ACCIDENT_NO = b.ACCIDENT_NO and a.ACCIDENT_NO = c.ACCIDENT_NO and a.Postcode_No = $input_postcode and c.Accident_Date LIKE '$search_date' and Road_User_Type='Drivers'");

                //echo "Select * from Accident a, Person b, Accident_Details c where  a.ACCIDENT_NO = b.ACCIDENT_NO and a.ACCIDENT_NO = c.ACCIDENT_NO and b.Age > 65 and a.Postcode_No = $input_postcode and c.Accident_Date LIKE '$search_date' and Road_User_Type='Drivers'";
                return $query->result();
        }

        public function get_query_one($input_postcode, $search_date){
                $query = $this->db->query("Select tot1/tot2 as query_one_results from (Select Count(Accident.ACCIDENT_NO) as tot1 FROM Accident JOIN Accident_Details ON Accident.ACCIDENT_NO=Accident_Details.ACCIDENT_NO Where Postcode_No=$input_postcode AND extract(year FROM Accident_Details.Accident_Date) = $search_date) as table1, (Select COUNT(Accident.ACCIDENT_NO) / COUNT(DISTINCT Postcode_No) as tot2 FROM Accident JOIN Accident_Details ON Accident.ACCIDENT_NO=Accident_Details.ACCIDENT_NO WHERE extract(year FROM Accident_Details.Accident_Date)=$search_date) as table2");
                return $query->row();
        }

        public function get_query_two($input_postcode, $search_date){
                $query = $this->db->query("SELECT countone/counttwo * 100 - 100 as query_two_results FROM (SELECT COUNT(Accident.ACCIDENT_No) AS countone FROM Accident JOIN Accident_Details ON Accident.ACCIDENT_NO=Accident_Details.ACCIDENT_NO WHERE Postcode_No=$input_postcode AND extract(year FROM Accident_Details.Accident_Date)=$search_date) AS der5, (SELECT COUNT(Accident.ACCIDENT_NO) AS counttwo FROM Accident JOIN Accident_Details ON Accident.ACCIDENT_NO=Accident_Details.ACCIDENT_NO WHERE Postcode_No=$input_postcode AND extract(year FROM Accident_Details.Accident_Date)=$search_date-1) AS der6");
                return $query->row();
        }

        public function get_query_three($input_postcode, $search_date){
                $query = $this->db->query("Select timeTemp, num_accidents, percentage, CASE WHEN timeTemp = '0' THEN '0-6' WHEN timeTemp = '1' THEN '6-12' WHEN timeTemp = '2' THEN '12-18' WHEN timeTemp = '3' THEN '18-24'END as period from(SELECT FLOOR(LEFT(Accident_Time,2)/6) as timeTemp, COUNT(*) as num_accidents, (COUNT(*)/(SELECT COUNT(*) FROM Accident_Details WHERE Accident_Date LIKE '$search_date')) * 100 AS percentage FROM Accident_Details a, Accident b WHERE a.Accident_Date LIKE '$search_date' and a.ACCIDENT_NO = b.ACCIDENT_NO and b.Postcode_No = $input_postcode GROUP BY timeTemp ORDER BY CASE 
                        WHEN timeTemp = '0-6' THEN 1 
                        WHEN timeTemp = '6-12' THEN 2 
                        WHEN timeTemp = '12-18' THEN 3 
                        
                        WHEN timeTemp = '18-24' THEN 4 END ASC) as TABLE1");
                return $query->result();
        }

        public function get_query_three_all($input_postcode){
                $query = $this->db->query("Select timeTemp, num_accidents, percentage, CASE WHEN timeTemp = '0' THEN '0-6' WHEN timeTemp = '1' THEN '6-12' WHEN timeTemp = '2' THEN '12-18' WHEN timeTemp = '3' THEN '18-24'END as period from(SELECT FLOOR(LEFT(Accident_Time,2)/6) as timeTemp, COUNT(*) as num_accidents, (COUNT(*)/(SELECT COUNT(*) FROM Accident_Details)) * 100 AS percentage FROM Accident_Details a, Accident b WHERE a.ACCIDENT_NO = b.ACCIDENT_NO and b.Postcode_No = $input_postcode GROUP BY timeTemp ORDER BY percentage DESC) as TABLE1");
                return $query->result();
        }

        public function get_query_four($input_postcode, $search_date){
                $query = $this->db->query("SELECT Speed_Zone, COUNT(*) as num_accidents, (COUNT(*) / (SELECT COUNT(*) FROM Accident_Details WHERE Accident_Date LIKE '$search_date')) * 100 AS percentage FROM Accident_Details a, Accident b WHERE a.Accident_Date LIKE '$search_date' and a.ACCIDENT_NO = b.ACCIDENT_NO and b.Postcode_No = $input_postcode GROUP BY a.speed_zone 
                        ORDER BY CASE 
                        WHEN Speed_Zone = '30' THEN 1 
                        WHEN Speed_Zone = '40' THEN 2 
                        WHEN Speed_Zone = '50' THEN 3 
                        WHEN Speed_Zone = '60' THEN 4
                        WHEN Speed_Zone = '70' THEN 5
                        WHEN Speed_Zone = '75' THEN 6 
                        WHEN Speed_Zone = '80' THEN 7 
                        WHEN Speed_Zone = '90' THEN 8 
                        WHEN Speed_Zone = '100' THEN 9 
                        WHEN Speed_Zone = '110' THEN 10 END ASC");
                return $query->result();
        }

        public function get_query_four_all($input_postcode){
                $query = $this->db->query("SELECT Speed_Zone, COUNT(*) as num_accidents, (COUNT(*) / (SELECT COUNT(*) FROM Accident_Details)) * 100 AS percentage FROM Accident_Details a, Accident b WHERE a.ACCIDENT_NO = b.ACCIDENT_NO and b.Postcode_No = $input_postcode GROUP BY a.speed_zone 
                        ORDER BY CASE 
                        WHEN Speed_Zone = '30' THEN 1 
                        WHEN Speed_Zone = '40' THEN 2 
                        WHEN Speed_Zone = '50' THEN 3 
                        WHEN Speed_Zone = '60' THEN 4
                        WHEN Speed_Zone = '70' THEN 5
                        WHEN Speed_Zone = '75' THEN 6 
                        WHEN Speed_Zone = '80' THEN 7 
                        WHEN Speed_Zone = '90' THEN 8 
                        WHEN Speed_Zone = '100' THEN 9 
                        WHEN Speed_Zone = '110' THEN 10 END ASC");
                return $query->result();
        }

        public function get_query_five($input_postcode, $search_date){
                $query = $this->db->query("SELECT Day_Week_Desc, COUNT(*) as num_accidents, (COUNT(*) / (SELECT COUNT(*) FROM Accident_Details WHERE Accident_Date LIKE '$search_date')) * 100 AS percentage FROM Accident_Details a,Accident b WHERE a.Accident_Date LIKE '$search_date' and a.ACCIDENT_NO = b.ACCIDENT_NO and b.Postcode_No = $input_postcode GROUP BY Day_Week_Desc ORDER BY CASE WHEN Day_Week_Desc = 'Sunday' THEN 7 WHEN Day_Week_Desc = 'Monday' THEN 1 WHEN Day_Week_Desc = 'Tuesday' THEN 2 WHEN Day_Week_Desc = 'Wednesday' THEN 3 WHEN Day_Week_Desc = 'Thursday' THEN 4 WHEN Day_Week_Desc = 'Friday' THEN 5 WHEN Day_Week_Desc = 'Saturday' THEN 6 END ASC;");
                return $query->result();
        }

        public function get_query_five_all($input_postcode){
                $query = $this->db->query("SELECT Day_Week_Desc, COUNT(*) as num_accidents, (COUNT(*) / (SELECT COUNT(*) FROM Accident_Details)) * 100 AS percentage FROM Accident_Details a,Accident b WHERE a.ACCIDENT_NO = b.ACCIDENT_NO and b.Postcode_No = $input_postcode GROUP BY Day_Week_Desc ORDER BY CASE WHEN Day_Week_Desc = 'Sunday' THEN 7 WHEN Day_Week_Desc = 'Monday' THEN 1 WHEN Day_Week_Desc = 'Tuesday' THEN 2 WHEN Day_Week_Desc = 'Wednesday' THEN 3 WHEN Day_Week_Desc = 'Thursday' THEN 4 WHEN Day_Week_Desc = 'Friday' THEN 5 WHEN Day_Week_Desc = 'Saturday' THEN 6 END ASC;");
                return $query->result();
        }

        public function get_query_six($input_postcode, $search_date){
                $query = $this->db->query("SELECT Road_Geometry, COUNT(*) as num_accidents, (COUNT(*) / (SELECT COUNT(*) FROM Accident_Details WHERE Accident_Date LIKE '$search_date')) * 100 AS percentage FROM Accident_Details a,Accident b WHERE a.Accident_Date LIKE '$search_date' and a.ACCIDENT_NO = b.ACCIDENT_NO and b.Postcode_No = $input_postcode GROUP BY Road_Geometry ORDER BY percentage DESC;");
                return $query->result();
        }

        public function get_query_six_all($input_postcode){
                $query = $this->db->query("SELECT Road_Geometry, COUNT(*) as num_accidents, (COUNT(*) / (SELECT COUNT(*) FROM Accident_Details )) * 100 AS percentage FROM Accident_Details a,Accident b WHERE a.ACCIDENT_NO = b.ACCIDENT_NO and b.Postcode_No = $input_postcode GROUP BY Road_Geometry ORDER BY percentage DESC;");
                return $query->result();
        }

}

