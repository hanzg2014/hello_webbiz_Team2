<?= $this->Html->css('register.css') ?>

<div id="wrapper">
	<h3>新規登録</h3> 
	<form method="post" accept-charset="utf-8" action="/webbiz/users/add">
		<div style="display:none;">
			<input type="hidden" name="_method" value="POST"/>
		</div> 
		<fieldset> 
			<div class="input text">
				<label for="name">名前</label>
				<input type="text" name="name" maxlength="255" id="name"/>
			</div>
			<div class="input text required">
				<label for="username">ログイン名</label>
				<input type="text" name="username" required="required" maxlength="255" id="username"/>
			</div>
			<div class="input text required">
				<label for="password">パスワード</label>
				<input type="password" name="password" required="required"/>
			</div>
			
			<div class="input number">
				<label for="age">年齢</label>
				<input type="number" name="age" id="age"/>
			</div> 
			<input type="hidden" name="sex" value=""/>
			<label for="sex-male"><input type="radio" name="sex" value="male" checked="checked" id="sex-male">男
			</label>
			<label for="sex-female"><input type="radio" name="sex" value="female" id="sex-female">女
			</label>	
		</fieldset> 
	
		<div id="return"><a href='login'>もどる</a></div>
		<button type="submit">登録</button> 
	</form> 
</div>