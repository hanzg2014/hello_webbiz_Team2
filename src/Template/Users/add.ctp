<?= $this->Html->css('register.css') ?>

<div id="body">
	<h3>新規登録</h3> 
	<?= $this->Form->create($user) ?> 
	<fieldset> 
	<?php 
		echo $this->Form->input('name'); 
		echo $this->Form->input('username');
		echo $this->Form->password('password');
		echo $this->Form->input('age'); 
	?> 
		<?=$this->Form->radio('sex',[ 
	['value'=>'male','text'=>'男','checked'=> true], ['value'=>'female','text'=>'女']
		]) ?>

		
	</fieldset> 
	<div id="return"><a href='login'>もどる</a></div>
	<?= $this->Form->button('登録') ?> 
	<?= $this->Form->end() ?> 
	<br>
</div>

<<<<<<< HEAD:src/Template/Users/add.ctp
<a href='login'>もどる</a><br>







=======
>>>>>>> 82e13273f1fe52b01c363a3ac15bcdfebfa3b3ea:src/Template/Users/register.ctp
