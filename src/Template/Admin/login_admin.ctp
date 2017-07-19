<?= $this->Html->css('adminlogin.css') ?>

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
			<form method="post" accept-charset="utf-8" action="login_admin">
				<div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>
				<fieldset>
					<div id="login_title">LOGIN</div>
        			<div class="input text login_form">
						<label for="username"><img src="/webbiz/img/login01.png" width="25px"/></label>
						<input type="text" name="id" required="required" maxlength="255" id="username"/>
					</div>        			
					<div class="input password login_form">
						<label for="password"><img src="/webbiz/img/login02.png" width="25px"/></label>
						<input type="password" name="pass" required="required" id="password"/>
					</div>
					<button type="submit"><img src="/webbiz/img/login03.png" width="30px"/></button>
				</fieldset>
				
			</form>
		</div>	
		<div id="btns">	
			<div class="btn">
				<a href='../Users/login'>通常ログイン</a>
			</div>
		<img src="/webbiz/img/login04.png" width="80px"/>
		</div>
	</div>
</div>