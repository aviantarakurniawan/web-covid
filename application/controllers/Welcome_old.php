<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('mcalibration');
        $this->load->model('mservis');
		$this->load->model('mteam');
		$this->load->model('mabout');
		$this->load->model('mtestimoni');
		$this->load->model('m_pengunjung');
    }
	public function index(){
		$user_ip=$_SERVER['REMOTE_ADDR'];
		if ($this->agent->is_browser()){
		    $agent = $this->agent->browser();
		}elseif ($this->agent->is_robot()){
		    $agent = $this->agent->robot(); 
		}elseif ($this->agent->is_mobile()){
		    $agent = $this->agent->mobile();
		}else{
			$agent='Other';
		}
		$cek_ip=$this->m_pengunjung->cek_ip($user_ip);
		$cek=$cek_ip->num_rows();
		if($cek > 0){
			$x['test']=$this->mtestimoni->tampil_test();
			$x['kalibrasi']=$this->mcalibration->get_alatmedis();
			$x['servis']=$this->mservis->get_servis();
			$x['about']=$this->mabout->get_about();
			$x['team']=$this->mteam->get_team();
			$this->load->view('frontend/home',$x);
		}else{
			$this->m_pengunjung->simpan_user_agent($user_ip,$agent);
			$x['test']=$this->mtestimoni->tampil_test();
			$x['kalibrasi']=$this->mcalibration->get_alatmedis();
			$x['servis']=$this->mservis->get_servis();
			$x['about']=$this->mabout->get_about();
			$x['team']=$this->mteam->get_team();
			$this->load->view('frontend/home',$x);
		}
	}
}