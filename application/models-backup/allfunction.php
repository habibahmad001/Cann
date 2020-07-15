<?php
/**
 * Model for User registration & management
 *
 * @author Asim Iqbal
 */
class Allfunction extends CI_Model {
	
		

		public function fetchAllData($table,$whereCondition,$limit,$start,$orderBy,$orderType){
			$this->db->select('*');
			$this->db->from($table);
			
			if($whereCondition !=''){
				$this->db->where($whereCondition);
			}
			if($limit>0){
				$this->db->limit($limit,$start);
			}
			$this->db->order_by($orderBy,$orderType);
			$sqlResult = $this->db->get();
			if($sqlResult->num_rows > 0){
				return $sqlResult;
			}
			else{
				return 0;	
			}
		}
		
		public function fetchAllDataWhere($table,$whereCondition,$limit,$start){ 
			$this->db->select('*');
			$this->db->from($table);
			
			if($whereCondition !=''){
				$this->db->where($whereCondition);
			}
			if($limit>0){
				$this->db->limit($limit,$start);
			}
			$sqlResult = $this->db->get();
			$data=$sqlResult->result();
			return $data;
			//echo $this->db->last_query();exit;
			/*if($sqlResult->num_rows > 0){
				return $sqlResult;
			}
			else{
				return 0;	
			}*/
		}
		
		public function fetchNews()
		{
			$query=$this->db->get('news');
			$data=$query->result();
			return $data;
		}
		
		public function fetchAll($table)
		{
			$query=$this->db->get($table);
			$data=$query->result();
			return $data;
		}
		
		public function fetchRightContent()
		{
			$this->db->where('page_type','righthome');
			$query=$this->db->get('morepagecontent');
			$data=$query->result();
			return $data;
			}
		public function fetchAllAdminData()
		{
			$this->db->where('user_id ','1');
			$sqlResult=$this->db->get('users');
			if($sqlResult->num_rows > 0){
				return $sqlResult;
			}
			else{
				return 0;	
			}
			}
			
		public function fetchTopCategories()
		{
			$query=$this->db->get('category',3,0);
			$data=$query->result();
			//echo $this->db->last_query();exit;
			return $data;
			}
			
		public function getSingleData_Row($compareFieldName, $dbFieldName, $table) {

       	$this->db->select('*');
        $this->db->from($table);
		$this->db->where($dbFieldName, $compareFieldName);
		
        $resultSet = $this->db->get();
        if ($resultSet->num_rows > 0) {
            $returnValue = $resultSet->row();			
        } else {
            $returnValue = 0;
       }
		//echo $this->db->last_query();exit;
        $resultSet->free_result();
        return $returnValue;
    }
	public function isModuleEnabled($module_name){
		
		if(isSuperAdmin()){
			return true;	
		}
		
		$this->db->select('ID');
        $this->db->from('hicon_settings');
		$this->db->where($module_name, 'YES');
		
        $resultSet = $this->db->get();
        if ($resultSet->num_rows > 0) {
           return true;
        }
		
		return false;
	}
	public function GetSelectedDate($Field,$tblName){
		$this->db->select($Field);
		$this->db->from($tblName);
		$result_sql = $this->db->get();
		
		return $result_sql->num_rows; 
	}
	public function GetAlldate($table, $limit, $start, $orderBy, $orderType){
		$this->db->select('*');
		$this->db->from($table);
		if($limit !=''){ $this->db->limit($limit,$start);}
		$this->db->order_by($orderBy,$orderType);
		
		$result_sql = $this->db->get();
		if($result_sql->num_rows >0){
			return $result_sql;
		}
		return 0;
	}
	public function updateInfo_Simple($compareFieldName, $dbFieldName, $updateDbFieldsAry, $updateInfoAry, $table){
		
		$data = array();		
		for($i=0; $i<sizeof($updateDbFieldsAry); $i++){			
			$data[$updateDbFieldsAry[$i]] = $updateInfoAry[$i];	
		}
				
		//print_r($data);exit;
		$this->db->where($dbFieldName, $compareFieldName);
		
		if($this->db->update($table, $data)){
			return true;
		}
		
		return false;
	}
	public function DeleteData($compareFieldName, $dbFieldName, $table) {
       	       
		$this->db->where($dbFieldName, $compareFieldName);
		
		if($this->db->delete($table)){
			return true;
		}
		
		return false;		        
    }
	public function DuplicateEntry($dbFieldName, $compareFieldName, $table) {

        $this->db->select($dbFieldName);
        $this->db->from($table);
		$this->db->where($dbFieldName, $compareFieldName);        		


        $dataValues = $this->db->get();
		
        if ($dataValues->num_rows > 0) {
           return true;
        }
		
		return false;
    }
	public function AddInfo_Simple($insertDbFieldsAry, $insertInfoAry, $table){
		$data = array();
		
		for($i=0; $i<sizeof($insertDbFieldsAry); $i++){
			$data[$insertDbFieldsAry[$i]] = $insertInfoAry[$i];	
		}
				
		if($this->db->insert($table, $data)){
			return true;	
		}
		return false;
	}
	
	public function AddInfo_WithId($insertDbFieldsAry, $insertInfoAry, $table){
		$data = array();
		
		for($i=0; $i<sizeof($insertDbFieldsAry); $i++){
			$data[$insertDbFieldsAry[$i]] = $insertInfoAry[$i];	
		}
				
		if($this->db->insert($table, $data)){
			$id = $this->db->insert_id();
			return $id;	
		}
		return false;
	}
	public function getTotalDataSimple($requiredFieldName, $table){
		
		$this->db->select($requiredFieldName);
        $this->db->from($table);
		
        $resultSet = $this->db->get();
        
		return $resultSet->num_rows;
	}
	public function GetSingleValue($compareFieldName, $dbFieldName, $requiredFieldName, $table) {
		$this->db->select($requiredFieldName);
        $this->db->from($table);
		$this->db->where($dbFieldName, $compareFieldName);
		
        $resultSet = $this->db->get();
        if ($resultSet->num_rows > 0) {
            $returnValue = $resultSet->row();
			$returnValue = $returnValue->$requiredFieldName;
        } else {
            $returnValue = 0;
        }

        $resultSet->free_result();
        return $returnValue;
    }
	function AddAgentActivity($agentId, $activityTable, $activityId, $activityDetails, $date, $time){
		
		$data = array('agentId'=> $agentId, 'activityTable' => $activityTable, 'activityId' => $activityId, 'activityDetails' => $activityDetails, 'date' => $date, 'time' => $time);
		
		$this->db->insert('tbl_agents_activitylog', $data);
		
	}
	
	function Get_single_tabel_row($tblname){
		$this->db->select('*');
		$this->db->from($tblname);
		
		$result_set = $this->db->get();
		if($result_set->num_rows > 0) {
			$result_value = $result_set->row();
		}
		else{
			$result_value = 0;
		}
		$result_set->free_result();
		return $result_value;
	}
	
	public function sel_spe_row_fields($table_name,$where, $fields){
        $this->db->select($fields);
        $this->db->where($where);
        $this->db->from($table_name);
        $query=$this->db->get();
        if($query->num_rows()>0){
//            foreach($query->row_array() as $row){
//                return $row;
//            }
            return $query->row_array();
        }
        else
            return FALSE;
    }
	
	  public function sel_spe_rec($table_name, $id,$value){
        $this->db->where($id, $value);
        $query=$this->db->get($table_name);
        if($query->num_rows>0){
            return $query->result_array();
        }
        else
            return FALSE;
    }
	
	 public  function sel_all_rec($table_name){
        $query=$this->db->get($table_name);
        if($query->num_rows()>0){
            return $query->result_array();
        }
        else
            return FALSE;
    }
	
	public function upd_rec($table_name, $id, $value,$data){
        $this->db->where($id,$value);
        if($this->db->update($table_name, $data)){
            return TRUE;
        }
        else
            return FALSE;
    }
	
	public  function ins_rec($table_name, $data){
        if($this->db->insert($table_name, $data))
        {
            $insert_id = $this->db->insert_id();
            return  $insert_id;
        }
        else
            return FALSE;
    }
	
}
?>