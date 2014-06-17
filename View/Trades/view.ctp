<div class="trades view">
<h2><?php echo __('Trade'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($trade['Trade']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo $this->Html->link($trade['Order']['id'], array('controller' => 'orders', 'action' => 'view', $trade['Order']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Stock'); ?></dt>
		<dd>
			<?php echo $this->Html->link($trade['Stock']['name'], array('controller' => 'stocks', 'action' => 'view', $trade['Stock']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Buy Amount'); ?></dt>
		<dd>
			<?php echo h($trade['Trade']['buy_amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Buy Price'); ?></dt>
		<dd>
			<?php echo h($trade['Trade']['buy_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sell Amount'); ?></dt>
		<dd>
			<?php echo h($trade['Trade']['sell_amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sell Price'); ?></dt>
		<dd>
			<?php echo h($trade['Trade']['sell_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Stock Situation'); ?></dt>
		<dd>
			<?php echo $this->Html->link($trade['StockSituation']['name'], array('controller' => 'stock_situations', 'action' => 'view', $trade['StockSituation']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Organization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($trade['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $trade['Organization']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Done'); ?></dt>
		<dd>
			<?php echo h($trade['Trade']['done']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Canceled'); ?></dt>
		<dd>
			<?php echo h($trade['Trade']['canceled']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Canceled Note'); ?></dt>
		<dd>
			<?php echo h($trade['Trade']['canceled_note']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Canceled Auth'); ?></dt>
		<dd>
			<?php echo $this->Html->link($trade['CanceledAuth']['name'], array('controller' => 'users', 'action' => 'view', $trade['CanceledAuth']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Trade'), array('action' => 'edit', $trade['Trade']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Trade'), array('action' => 'delete', $trade['Trade']['id']), null, __('Are you sure you want to delete # %s?', $trade['Trade']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Trades'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trade'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stocks'), array('controller' => 'stocks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock'), array('controller' => 'stocks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stock Situations'), array('controller' => 'stock_situations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock Situation'), array('controller' => 'stock_situations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Canceled Auth'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
