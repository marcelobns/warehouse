<div class="organizations view">
<h2><?php echo __('Organization'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Organization Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organization['OrganizationType']['name'], array('controller' => 'organization_types', 'action' => 'view', $organization['OrganizationType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Register id'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['register_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nickname'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['nickname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Acronym'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['acronym']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Responsible'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['responsible']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Organization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organization['ParentOrganization']['name'], array('controller' => 'organizations', 'action' => 'view', $organization['ParentOrganization']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Array'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['parent_array']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id Old'); ?></dt>
		<dd>
			<?php echo h($organization['Organization']['id_old']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
    <?=$this->element('actions.organizations');?>
</div>
