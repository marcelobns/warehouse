<?php echo $this->Form->create(@$model, array('action'=>'index/'.@$url_params, 'type'=>'GET', 'class'=>'form-inline', 'div'=>false)); ?>
<div class="form-group">
    <input class="form-control input-search" name="q" type="text" placeholder="<?=__('Search');?>" required="required" value="<?=@$_GET['q'];?>">
    <button class="btn btn-default btn-search" type="submit"><i class="fa fa-search fa-lg"></i></button>
</div>
<?php echo $this->Form->end(); ?>