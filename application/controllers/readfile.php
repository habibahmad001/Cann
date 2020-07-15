<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Readfile extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
				$file = './public/user_data/compaign_rep.xlsx';
		 
				//load the excel library
				$this->load->library('excel');
				 
				//read file from path
				$objPHPExcel = PHPExcel_IOFactory::load($file);
				 
				$data_array = array();

				$compaign_rep_data_array = array();
				
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
				
				for($i=2; $i<=19297; $i++)
				{
					$data_array["A".$i] = $sheetData[$i]["A"];
					$data_array["B".$i] = $sheetData[$i]["B"];
					$data_array["C".$i] = $sheetData[$i]["C"];
					$data_array["D".$i] = $sheetData[$i]["D"];
					$data_array["E".$i] = $sheetData[$i]["E"];
					$data_array["F".$i] = $sheetData[$i]["F"];
					$data_array["G".$i] = $sheetData[$i]["G"];
					$data_array["H".$i] = $sheetData[$i]["H"];
					$data_array["I".$i] = $sheetData[$i]["I"];
					$data_array["J".$i] = $sheetData[$i]["J"];
					$data_array["K".$i] = $sheetData[$i]["K"];
					$data_array["L".$i] = $sheetData[$i]["L"];
					$data_array["M".$i] = $sheetData[$i]["M"];
					$data_array["N".$i] = $sheetData[$i]["N"];
					$data_array["O".$i] = $sheetData[$i]["O"];
					$data_array["P".$i] = $sheetData[$i]["P"];
					$data_array["Q".$i] = $sheetData[$i]["Q"];
					$data_array["R".$i] = $sheetData[$i]["R"];
					$data_array["S".$i] = $sheetData[$i]["S"];
					$data_array["T".$i] = $sheetData[$i]["T"];
					$data_array["U".$i] = $sheetData[$i]["U"];
					$data_array["V".$i] = $sheetData[$i]["V"];
					$data_array["W".$i] = $sheetData[$i]["W"];
					$data_array["X".$i] = $sheetData[$i]["X"];
					$data_array["Y".$i] = $sheetData[$i]["Y"];
					
					$compaign_rep_data_array[$i] = $data_array;
					
					unset($data_array);
				}

				$data['values'] = $compaign_rep_data_array;
				//$this->load->view('welcome_message');
				$this->load->view('readfile',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
		
?>