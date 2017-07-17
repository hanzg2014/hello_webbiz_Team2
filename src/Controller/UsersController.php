<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Session\Database;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class UsersController extends AppController
{
	public $uses = array('User','Demand','Coupon','Spot');
	
	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow();
    }

	public function login(){
		//sessionを破棄
		
		//postされていた場合、認証を行う処理を記述。
		$user = $this->Users->newEntity(); 
		$this->set('user',$user);
    	if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
              	$this->Session->write('User.name', $this->Auth->User('name') );
				$this->Session->write('User.id', $this->Auth->User('id') );
                return $this->redirect($this->Auth->redirectUrl());
            } else {
            	$this->Flash->error(__('Invalid username or password, try again'));
        	}
    	}
    	//認証できた場合、sessionにユーザー情報を格納。
    }
    public function logout(){
		$this->Flash->success('ログアウトしました');
		$this->Session->destroy();
		return $this->redirect($this->Auth->logout());
	}

		
	
	public function add(){
		//sessionを破棄
		//postされていた場合、バリデーションを行う。
		$user = $this->Users->newEntity(); 
		$this->set('user', $user);
		if ($this->request->is('post')) { 
			$user = $this->Users->patchEntity($user, $this->request->data); 
			if ($this->Users->save($user)) { 
				return $this->redirect(['controller'=>'Users','action'=>'login']);
			}
			$this->Flash->error(__('Unable to add the user.'));
		}	
		
		//さらに同一のユーザーがいないかどうかチェック
		//以上に引っかからなければ、ユーザー情報をデータベースに格納
		//sessionにもユーザー情報を格納。
	}
	
	public function home(){
		//sessionに基づきデータベースから必要なユーザー情報・取得ポイント情報を取得
		$name = $this->Session->read('User.name');
		$this->set('name',$name);
		$id = $this->Session->read('User.id');
		$this->set('id',$id);
		
		$coupons = TableRegistry::get('Coupons');
		$coupon = $coupons->find('all');
		$this->set('coupon',$coupon);
		$demands = TableRegistry::get('Demands');
		$demand = $demands->find('all');
		$this->set('demand',$demand);
		$spots = TableRegistry::get('Spots');
		$spot = $spots->find('all');
		$this->set('spot',$spot);
	}
	
	public function coupon($i = 0){
		$id = $this->request->query('id');
		$coupons = TableRegistry::get('Coupons');
		$coupon = $coupons->find('all')->where(["id=".$id]);
		$this->set('coupon',$coupon);
		//session認証を行う
		//データベースから該当クーポン情報取得
	}
	
	public function vote(){
		$spots = TableRegistry::get('Spots');
		$spot = $spots->find('all');
		$this->set('spot',$spot);
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
	
	public function useCoupon($i = 0){
		//データベースから該当クーポン削除
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