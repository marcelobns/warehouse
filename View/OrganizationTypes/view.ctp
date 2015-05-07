<div class="container">
	<div class="organizationTypes view col-md-9">
	<fieldset>
		<legend><?php echo __('Organization Type'); ?></legend>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($organizationType['OrganizationType']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Name'); ?></dt>
			<dd>
				<?php echo h($organizationType['OrganizationType']['name']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Register Type'); ?></dt>
			<dd>
				<?php echo h($organizationType['OrganizationType']['register_type']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Register Mask'); ?></dt>
			<dd>
				<?php echo h($organizationType['OrganizationType']['register_mask']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Sort'); ?></dt>
			<dd>
				<?php echo h($organizationType['OrganizationType']['sort']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Internal'); ?></dt>
			<dd>
				<?php echo h($organizationType['OrganizationType']['internal']); ?>
				&nbsp;
			</dd>
		</dl>
	</fieldset>		
	</div>
	<div class="actions col-md-3">
		<h3><?php echo __('Actions'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('Edit Organization Type'), array('action' => 'edit', $organizationType['OrganizationType']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete Organization Type'), array('action' => 'delete', $organizationType['OrganizationType']['id']), null, __('Are you sure you want to delete # %s?', $organizationType['OrganizationType']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List Organization Types'), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Organization Type'), array('action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		</ul>
	</div>	
</div>
