<div class="container">
	<div class="users view col-md-9">
		<fieldset>
		<legend><?php echo __('User'); ?> <?php echo h($user['User']['id']); ?></legend>
			<dl>
				<dt><?php echo __('Name'); ?></dt>
				<dd>
					<?php echo h($user['User']['name']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Username'); ?></dt>
				<dd>
					<?php echo h($user['User']['username']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Email'); ?></dt>
				<dd>
					<?php echo h($user['User']['email']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Phone'); ?></dt>
				<dd>
					<?php echo h($user['User']['phone']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Organization'); ?></dt>
				<dd>
					<?php echo h($user['Organization']['name']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Role'); ?></dt>
				<dd>
					<?php echo h($user['Role']['name']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Broker'); ?></dt>
				<dd>
					<?php echo h($user['User']['broker']); ?>
					&nbsp;
				</dd>
			</dl>
		</fieldset>
	</div>
	<div class="actions col-md-3">
        <?=$this->element('actions.users');?>
    </div>
</div>
