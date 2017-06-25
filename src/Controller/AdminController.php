<?php
namespace App\Controller;
use App\Controller\AppController;

class AdminController extends AppController
{
	public $uses = array('User','Demand','Point','Spot');
	
	public function loginAdmin(){
		//sessionを破棄
		//postされていた場合、認証を行う処理を記述。
		//認証できた場合、sessionに情報を格納。
		$isPost =$this->request->is('post');
		if($isPost)$this->render('home_admin');
	}
	
	public function homeAdmin($i = 0){
		//session認証を行う
		//データベースから設置済み場所・需要のある場所取得
		//googleAPIを利用して上記を表す地図を描画
		//iは表示するitemを表す変数
		//※地図上にピンを立てられるようにしてください！
		
	}
	
	public function install(){
		//設置場所の情報をデータベースに格納
		//分配予算・人数・方法の情報を取得し、ユーザーへのポイントの割り振りを計算
		//計算結果をデータベースに格納
		$this->redirect(['controller'=>'admin','action'=>'home_admin']);
	}
	
	
}

?>