<?= $this->Html->css('adminhome.css') ?>

<div id="wrapper">

	<div id="header">
		<h2>管理者ページ</h2>
		<div id="logout"><a href="login_admin">ログアウト</a></div>
	</div>
	
	<div id="left">
		<h3>販売ルート</h3>
		<div id="map"></div>
	</div>
	
	<div id="right">
		<h3>販売場所</h3>
		<div id="spotbox">
			<div class="spot">
				<div class="spotname">公園</div>
				<div class="spottime">13:00-14:00</div>
				<div class="spotdelete"><a href="delete_spot">削除</a></div>
			</div>
			<div class="spot">
				<div class="spotname">公園</div>
				<div class="spottime">13:00-14:00</div>
				<div class="spotdelete"><a href="delete_spot">削除</a></div>
			</div>
			<div class="spot">
				<div class="spotname">公園</div>
				<div class="spottime">13:00-14:00</div>
				<div class="spotdelete"><a href="delete_spot">削除</a></div>
			</div>
		</div>
		
		<h3>販売場所を追加</h3>

		<div id="newspot">
			<form action="create_spot" method="POST">
				<label>名前</label>
				<input type="text" name="name" size="10" width="10">
				<label>時間</label>
				<input class="newtime" type="text" name="start" size="10">
				<div id="kara">～</div>
				<input class="newtime"} type="text" name="end" size="10">
				<input type="submit" value="追加">
			</form>
		</div>

	</div>
</div>
