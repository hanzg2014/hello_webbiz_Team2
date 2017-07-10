<div>
	<h3>新規登録</h3> 
	<?= $this->Form->create() ?> 
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
	<?= $this->Form->button('登録') ?> 
	<?= $this->Form->end() ?> 
</div>

<a href='login'>もどる</a><br>

