<?php
namespace App\Controller;
use App\Controller\AppController;

class UsersController extends AppController
{
	public $uses = array('User','Demand','Point','Spot');
	
	public function login(){
		//sessionを破棄
		//postされていた場合、認証を行う処理を記述。
		//認証できた場合、sessionにユーザー情報を格納。
		$isPost =$this->request->is('post');
		if($isPost)$this->redirect(['controller'=>'Users','action'=>'home']);
		
	}
	
	public function register(){
		//sessionを破棄
		//postされていた場合、バリデーションを行う。
		//さらに同一のユーザーがいないかどうかチェック
		//以上に引っかからなければ、ユーザー情報をデータベースに格納
		//sessionにもユーザー情報を格納。
		$isPost =$this->request->is('post');
		if($isPost)$this->redirect(['controller'=>'Users','action'=>'home']);
	}
	
	public function home(){
		//sessionに基づきデータベースから必要なユーザー情報・取得ポイント情報を取得
	}
	
	public function achievement($i = 0){
		//session認証を行う
		//データベースから設置済み場所取得
		//googleAPI,GeolocationAPIを利用して設置場所表示地図を描画
	}
	
	public function vote(){
		//sessionを取得
		//googleAPI,GeolocationAPIを利用して現在地周辺地図を描画
		//※地図上にピンを立てられるようにしてください！
	}
	
	public function facebookLogin(){
		//facebookの認証ページに飛び、情報を取得して戻ってくる
		//その情報をデータベースと照合し認証
		//認証できない場合、新規ユーザーとしてデータベースに登録
		//sessionにユーザー情報を格納。
		$this->redirect(['controller'=>'Users','action'=>'home']);
	}
	
	public function doVote($i = 0, $j = 0){
		//投票された位置情報を取得
		//sessionから取得したユーザー情報を結び付け、データベースに格納
		//iは現在位置か地図上の点かを判定する変数、jは投票するitemを表す変数
		$this->redirect(['controller'=>'Users','action'=>'home']);
	}
}

?>