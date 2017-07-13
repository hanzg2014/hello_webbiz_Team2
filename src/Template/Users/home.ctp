<?= $this->Html->css('userhome.css') ?>

<div id="wrapper">

	<div id="header">
		<h2><?= $name ?>さんのマイページ </h2>
		<div id="logout"><a href="logout">ログアウト</a></div>
	</div>
	
	<div id="left">
		<h3>販売ルート</h3>
		<div id="map"></div>
		<div id="vote"><a href="vote">来てほしい！</a></div>
	</div>
	
	<div id="right">
		<h3>NEWS</h3>
		<div id="newsbox">
			<div class="news">
				<div class="newsdate">2017/2/8</div>
				<div class="newscontent">●●を通ることになりました！</div>
			</div>
			<div class="news">
				<div class="newsdate">2017/2/8</div>
				<div class="newscontent">●●を通ることになりました！</div>
			</div>
			<div class="news">
				<div class="newsdate">2017/2/8</div>
				<div class="newscontent">●●を通ることになりました！</div>
			</div>
			<div class="news">
				<div class="newsdate">2017/2/8</div>
				<div class="newscontent">●●を通ることになりました！</div>
			</div>
		</div>
		
		<h3>COUPON</h3>
		<div id="couponbox">
			<div class="coupon">
				<div class="coupondate">～2017/8/30</div>
				<div class="couponcontent">
					<a href="coupon">10％割引券</a>
				</div>
			</div>
			<div class="coupon">
				<div class="coupondate">～2017/8/30</div>
					<a href="coupon">10％割引券</a>
				</div>
			</div>
		</div>
	</div>
	
		
</div>
