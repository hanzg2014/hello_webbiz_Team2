<?= $this->Html->css('login.css') ?>

<div class="users form", id="body">
	<div id="left">
	</div>
	<div id="right">
		<div id="login">
			<?= $this->Flash->render() ?>
			<?= $this->Form->create($user) ?>
    			<fieldset>
        			<legend><?= __('Please enter your username and password') ?></legend>
        			<?= $this->Form->control('username') ?>
        			<?= $this->Form->control('password') ?>
    			</fieldset>
			<?= $this->Form->button(__('Login')); ?>
			<?= $this->Form->end() ?>
		</div>	
		<div id="btns">	
			<a href='add'>登録</a><br>
			<a href='../Admin/login_admin'>管理者</a>
		</div>
	</div>

</div>	