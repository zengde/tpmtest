<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
		$key=md5('http://doc.thinkphp.cn/api');
		$data=F($key);
		if(empty($data)){
			$data=file_get_contents('http://doc.thinkphp.cn/api');
			F($key,$data);
		}
		$data=json_decode($data,true);
		$this->assign('list',$data['data']);
		$this->display();
	}
	public function read(){
		$docid=$_GET['id'];
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
	
}