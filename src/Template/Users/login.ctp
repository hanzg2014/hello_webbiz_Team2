<?= $this->Html->css('login.css') ?>

<div id="body">
	<div id="left">
	</div>
	<div id="right">
		<div id="login">

			<form action="login" method="POST">
			ID<input type="text" name="id" size="10" width="10">
			PASSWORD<input type="password" name="pass" size="10">
			<input type="submit" value="login">
			</form>
		</div>	
		<div id="btns">	
			<a href='register'>登録</a><br>
			<a href='../Admin/login_admin'>管理者</a>
		</div>

	</div>
</div>