<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Session\Database;
use Cake\ORM\TableRegistry;

class AdminController extends AppController
{
	public $uses = array('User','Demand','Coupon','Spot');
	
	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow();
    }

	public function loginAdmin(){
		//sessionを破棄
		//
		//postされていた場合、認証を行う処理を記述。 
    	if ($this->request->is('post')) {
            if ('admin' == $this->request->data('id') && 'webbiz' == $this->request->data('pass')){
				$this->homeAdmin();
				$this->render("home_admin");
            } else {
            	$this->Flash->error(__('Invalid username or password, try again'));
        	}
        }	

		//認証できた場合、sessionに情報を格納。
		
	}
	
	public function homeAdmin($i = 0){
		$demands = TableRegistry::get('Demands');
		$demand = $demands->find('all');
		$this->set('demand',$demand);
		$spots = TableRegistry::get('Spots');
		$spot = $spots->find()
			->where(['deleted =' => 0])
			->order(['start' => 'ASC']);
		$this->set('spot',$spot);
		//session認証を行う
		//データベースから設置済み場所・需要のある場所取得
		//googleAPIを利用して上記を表す地図を描画
		//iは表示するitemを表す変数
		//※地図上にピンを立てられるようにしてください！
		
	}
	
	public function deleteSpot(){
		$spotsTable = TableRegistry::get('Spots');
		$id = $this->request->query('id');
		
		$spot = $spotsTable->get($id);
		$spot->deleted = 1;
		$spotsTable->save($spot);
		$this->redirect("/admin/home_admin");
		//設置場所の情報をデータベースに格納
		//分配予算・人数・方法の情報を取得し、ユーザーへのポイントの割り振りを計算
		//計算結果をデータベースに格納
	}
	
	public function createSpot(){
		$spotsTable = TableRegistry::get('Spots');
		$spot = $spotsTable->newEntity();
		$this->set('spot', $spot);
		if ($this->request->is('post')) { 
			$spot = $spotsTable->patchEntity($spot, $this->request->data); 
			if ($spotsTable->save($spot)) { 
				return $this->redirect("/admin/home_admin");
			}
			$this->Flash->error(__('Unable to add the user.'));
		}
		$this->redirect("/admin/home_admin");
	}

	public function createCoupon(){
		$spots = TableRegistry::get('Spots');
		$spot = $spots->find()
			->where(['deleted =' => 0])
			->order(['start' => 'ASC']);
		$demands = TableRegistry::get('Demands');
		$demand = $demands->find('all');
		$couponsTable = TableRegistry::get('Coupons');
		
		foreach($demand as $data2){
			foreach($spot as $data){
				
				$marginla=(($data->latitude)-($data2->latitude))*30.82*3600;
				$marginlo=(($data->longtitude)-($data2->longtitude))*25.11*3600;
				$distance=$marginla*$marginla+$marginlo*$marginlo;
				$distances=array();
				$distances[]=$distance;
			}
			$coupon= $couponsTable->newEntity();
			$coupon = $couponsTable->patchEntity($coupon, $this->request->data);
			$couponsTable->save($coupon);
			if (min($distances)>9000000){
				$coupon =$couponsTable->patchEntity($coupon, ['foreign_id'=>$data2->foreign_id,'money'=>30]); 
				$couponsTable->save($coupon);	
			}elseif (min($distances)>1000000){
				$coupon =$couponsTable->patchEntity($coupon, ['foreign_id'=>$data2->foreign_id,'money'=>20]); 
				$couponsTable->save($coupon);	
			}else{
				$coupon =$couponsTable->patchEntity($coupon, ['foreign_id'=>$data2->foreign_id,'money'=>10]); 
				$couponsTable->save($coupon);
			}	
			$distances=array();
		}
		$this->Flash->success('ユーザーにクーポンを配布しました');
		$this->redirect("/admin/home_admin");		
	}	
	
}

?>