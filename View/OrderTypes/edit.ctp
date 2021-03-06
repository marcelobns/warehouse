<div class="container">
    <div class="orderTypes form col-md-9">
        <?php echo $this->Form->create('OrderType'); ?>
        <fieldset>
          <legend><?php echo __('Edit Order Type'); ?></legend>
          <?php
          echo $this->Form->input('id');
          echo $this->Form->input('name');
          echo $this->Form->input('seller_type_id');
          echo $this->Form->input('buyer_type_id');
          ?>
          <?php echo $this->Form->button(__('Submit'), array('class'=>'btn btn-success')); ?>
          <?php echo $this->Html->link(__('Cancel'), array('action'=>'index'), array('class'=>'btn btn-default')); ?>
      </fieldset>    
      <?php echo $this->Form->end(); ?>
  </div>
  <div class="actions col-md-3">
   <h4>Relacionado</h4>
   <ul>      
      <li><?php echo $this->Html->link(__('List Order Types'), array('action' => 'index')); ?></li>
      <li><?php echo $this->Html->link(__('List Organization Types'), array('controller' => 'organization_types', 'action' => 'index')); ?> </li>
      <li><?php echo $this->Html->link(__('New Seller Type'), array('controller' => 'organization_types', 'action' => 'add')); ?> </li>
      <li><?php echo $this->Html->link(__('List Modules'), array('controller' => 'modules', 'action' => 'index')); ?> </li>
      <li><?php echo $this->Html->link(__('New Module'), array('controller' => 'modules', 'action' => 'add')); ?> </li>
      <li><?php echo $this->Html->link(__('List Order Details'), array('controller' => 'order_details', 'action' => 'index')); ?> </li>
      <li><?php echo $this->Html->link(__('New Order Detail'), array('controller' => 'order_details', 'action' => 'add')); ?> </li>
  </ul>
</div>
<div class="related col-md-12">    
    <?php $orderType['OrderDetail'] = $this->request->data['OrderDetail']; ?>
    <table class="table table-condensed table-hover">
        <thead>
            <tr>
                <th><?php echo __('Id'); ?></th>
                <th><?php echo __('Name'); ?></th>
                <th><?php echo __('Input Type'); ?></th>
                <th><?php echo __('Css Class'); ?></th>
                <th class="actions">
                    <?php echo $this->Html->link(__('New Order Detail'), array('controller' => 'order_details', 'action' => 'add', $this->request->data['OrderType']['id'])); ?>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderType['OrderDetail'] as $orderDetail): ?>
                <tr>
                    <td><?php echo $orderDetail['id']; ?></td>
                    <td><?php echo $orderDetail['name']; ?></td>
                    <td><?php echo $orderDetail['input_type']; ?></td>
                    <td><?php echo $orderDetail['css_class']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('controller' => 'order_details', 'action' => 'view', $orderDetail['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('controller' => 'order_details', 'action' => 'edit', $orderDetail['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'order_details', 'action' => 'delete', $orderDetail['id']), null, __('Are you sure you want to delete # %s?', $orderDetail['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>