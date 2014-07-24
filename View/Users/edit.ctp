<div class="users form">
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Edit User'); ?> <span class="pull-right"><?=$this->request->data['User']['id'];?></span></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('name');
        echo $this->Form->input('email');
        echo $this->Form->input('phone');

        if($isUser){
            echo $this->Form->input('username', array('disabled'));
            echo $this->Form->input('confirm_password', array('type'=>'password', 'label'=>'Current Password'));
            echo $this->Form->input('password', array('value'=>'', 'section'=>'password', 'label'=>'New Password'));
            echo '<span class="help-block 1"><a href="#password" id="editPassword">'.__('edit password').'</a></span>';
            echo '<span class="help-block 2" style="display: none;"><a href="#password" id="closePassword">'.__('close password').'</a></span>';
        }
            echo $this->Form->input('organization_id', array('class'=>'select2', 'empty'=>__('Select an Item...')));

        ?>
        <?php echo $this->Form->button(__('Submit'), array('class'=>'btn btn-success')); ?>
        <?php echo $this->Html->link(__('Cancel'), array('action'=>'index'), array('class'=>'btn btn-default')); ?>
    </fieldset>
    <?php echo $this->Form->end(); ?>
    <div class="related">
        <?php $user = $this->request->data; ?>
        <h3><?php echo __('Related User Roles'); ?></h3>
        <table cellpadding = "0" cellspacing = "0">
            <tr>
                <th><?php echo __('Id'); ?></th>
                <th><?php echo __('Module'); ?></th>
                <th><?php echo __('Role'); ?></th>
                <th><?php echo __('Last Signin'); ?></th>
                <th class="action-add">
                    <?php echo $this->Html->link('<i class="fa fa-plus fa-lg"></i> '.__('New User Role'), array('controller' => 'user_roles', 'action' => 'add', @$user['User']['id']), array('escape'=>false)); ?>
                </th>
            </tr>
            <?php if (!empty($user['UserRole'])): ?>
                <?php foreach ($user['UserRole'] as $userRole): ?>
                    <tr>
                        <td><?php echo $userRole['UserRole']['id']; ?></td>
                        <td><?php echo $userRole['Module']['name']; ?></td>
                        <td><?php echo $userRole['Role']['name']; ?></td>
                        <td><?php echo $userRole['UserRole']['last_signin']; ?></td>
                        <td class="actions">
                            <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'user_roles', 'action' => 'delete', $userRole['UserRole']['id']), null, __('Are you sure you want to delete # %s?', $userRole['UserRole']['id'])); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>

</div>
<div class="actions">
    <?=$this->element('actions.users');?>
</div>
<?php $this->start('script'); ?>
<script type="text/javascript">
    $(function(){
        $('#UserPassword').val('');
        $('#UserConfirmPassword').val('');

        $('#UserPassword').attr('disabled', true)
    })

    $('#UserConfirmPassword').blur(function(){
        if($('#UserPassword').isDisabled){
            if($('#UserConfirmPassword').val() != $('#UserPassword').val()){
                $('#UserPassword').css('border-color', 'red');
                $('#UserConfirmPassword').css('border-color', 'red');
                $('#UserConfirmPassword').val('');
            } else {
                $('#UserPassword').css('border-color', 'green');
                $('#UserConfirmPassword').css('border-color', 'green');
            }
        }
    });
    $('#editPassword').on('click', function(){
        $('#UserPassword').attr('disabled', false)
        $('#UserPassword').focus();
        $('.help-block.1').hide();
        $('.help-block.2').show();
    });
    $('#closePassword').on('click', function(){
        $('#UserPassword').attr('disabled', true)
        $('.help-block.2').hide();
        $('.help-block.1').show();
    });

</script>
<?php $this->end(); ?>