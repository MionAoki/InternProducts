<?php
class Data extends CI_Controller
{

	public function index()
	{
        $this->home();   //以下で定義した、home functionを読み込む
	}

	public function home(){
    	$this->load->model("Model_get");
	//モデルフォルダ内のModel_getを読み込む

   	$data["results"] = $this->Model_get->getData("first floor");
	//pageDataのカラム内にあるpageテーブルから取得したデータとの紐付けをする。その後、$dataに情報を挿入する。


	$data['title'] = 'Welcome to firstfloor';

    	$this->load->view('templates/header',$data);
	$this->load->view("pages/content_home", $data);
	$this->load->view('templates/footer');
	}


	public function about(){
        $this->load->model("Model_get");
        //モデルフォルダ内のModel_getを読み込む
        $data["results"] = $this->Model_get->getData("second floor");
        //pageDataのカラム内にあるpageテーブルから取得したデータとの紐付けをする。その後、$dataに情報を挿入する。


        $data['title'] = 'second floor';

        $this->load->view('templates/header',$data);
        $this->load->view("pages/content_home", $data);
        $this->load->view('templates/footer');
        }

}
