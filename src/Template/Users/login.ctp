<?= $this->Html->css('login.css') ?>

<div class="users form", id="wrapper">
	<div id="left">
		<div id="logo">
			ここに商品名？
		</div>
	<img id="yaoya_bg" src="/webbiz/img/yaoya_bg.jpg" width="34.8%" height="80%"/>
	<img id="yaoya" src="/webbiz/img/yaoya.png" width="180px"/>
	<img id="tire_left" src="/webbiz/img/login04.png" width="80px"/>
	</div>
	<div id="right">
		<div id="login">
			<form method="post" accept-charset="utf-8" action="/webbiz/users/login">
				<div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>
				<fieldset>
					<div id="login_title"></div>
        			<div class="input text login_form">
						<label for="username"><img src="/webbiz/img/login01.png" width="25px"/></label>
						<input type="text" name="username" required="required" maxlength="255" id="username"/>
					</div>        			
					<div class="input password login_form">
						<label for="password"><img src="/webbiz/img/login02.png" width="25px"/></label>
						<input type="password" name="password" required="required" id="password"/>
					</div>
					<button type="submit">ログイン<!--<img src="/webbiz/img/login03.png" width="30px"/>--></button>
				</fieldset>
				
			</form>
		</div>	
		<div id="btns">	
			<div class="btn">
				<a href='add'>新規登録</a>
			</div>
			<div class="btn">
				<a href='../Admin/login_admin'>管理者</a>
			</div>
		<img src="/webbiz/img/login04.png" width="80px"/>
		</div>
	</div>
</div>