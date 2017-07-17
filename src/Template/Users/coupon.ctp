<?= $this->Html->css('coupon.css') ?>

<div id="wrapper">

	<div id="header">
		<h2>クーポン</h2>
		<div id="return">
			<a href='home'>もどる</a>
		</div>
	</div>
<?php foreach($coupon as $data){
?>
	<div id="couponwrapper">
		<div id="coupon">
			<div id="couponleft">
				<div id="triangle"></div>
				<img src="/webbiz/img/coupon01.jpg" width="300px"/>
			</div>
			<div id="couponright">
				<div id="title">全品<?=$data->money?>％引きクーポン</div>
				<div id="content">
					お買い上げ時に提示すると，<br>
					全商品が会計から<?=$data->money?>％引きに<br>
					なります（１度限り有効）
				</div>
			</div>
			<div id="couponfooter">
				<div id="expiration">
					利用期限：～<?=$data->expiration->format("Y/m/d")?>
				</div>
				<div id="place">本郷1丁目内</div>
			</div>
		</div>
	</div>
<?php
}
?>
	
	<div id="footer">
		<div id="btn1"></div>
		<div id="btn2"></div>
	</div>


</div>
