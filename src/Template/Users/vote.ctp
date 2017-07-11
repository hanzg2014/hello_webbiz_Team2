<?= $this->Html->css('vote.css') ?>

<div id="wrapper">

	<div id="header">
		<h2>呼び込み</h2>
	</div>
	<div id="left">
		<div id="map"></div>
	</div>
	
	<div id="right">
		<div class="submit">
			<a href='do_vote'>現在位置で<br>送信</a>
		</div>
		<div class="submit">
			<a href='do_vote'>地図上の<br>点で送信</a>
		</div>
		<div id="return">
			<a href='home'>もどる</a>
		</div>
	</div>

</div>

