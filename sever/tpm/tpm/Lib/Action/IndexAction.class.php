<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
	public function _initialize(){
		if($this->isAjax())
			$url='/Index';
		else
			$url=__URL__;
		$this->assign('ismobile',IS_CLIENT);
		$this->assign('appurl',$url);
	}
	
    public function index(){
		$docid=$this->_get('id','',1);
		$doctitle=$_GET['title'];
		$url='http://doc.thinkphp.cn/api/view/'.$docid;
		$key=md5($url);
		$data=F($key);
		if(empty($data)){
			$data=file_get_contents($url);
			F($key,$data);
		}
		$data=json_decode($data,true);
		$list=F(md5('http://doc.thinkphp.cn/api'));
		$list=json_decode($list,true);
		$this->assign('list',$list['data']);
		$this->assign('data',$data['data']);
		$this->assign('title',$doctitle);
		$this->display();
	}
	public function read(){
		$docid=$this->_get('id','',1);
		$doctitle=$_GET['title'];
		$url='http://doc.thinkphp.cn/api/view/'.$docid;
		$key=md5($url);
		$data=F($key);
		if(empty($data)){
			$data=file_get_contents($url);
			F($key,$data);
		}
		$data=json_decode($data,true);
		$list=F(md5('http://doc.thinkphp.cn/api'));
		$list=json_decode($list,true);
		$this->assign('list',$list['data']);
		$this->assign('data',$data['data']);
		$this->assign('title',$doctitle);
		$this->display('read');
	}
	
	
	public function read_single(){
		$docid=$_GET['id'];
		$url='http://doc.thinkphp.cn/api/view/'.$docid;
		$key=md5($url);
		$data=F($key);
		if(empty($data)){
			$data=file_get_contents($url);
			F($key,$data);
		}
		echo $data;
	}
	
	public function _empty($name){
		$this->display($name);
	}
	
}