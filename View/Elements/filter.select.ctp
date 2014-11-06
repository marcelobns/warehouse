<div id="<?=$field?>Filter" class="btn-group filter">
    <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown">
        <b style="color:#003d4c;"><?=$label;?></b> <span class="fa fa-filter"></span>
    </button>
    <ul class="dropdown-menu" role="menu" style="min-width: 260px;">
        <li class="ctrl">
            <button class="Apply btn btn-default btn-xs">
                <i class="fa fa-check-square-o"></i> <b><?=__('Apply');?></b>
            </button>
            <button id="<?=$field?>" class="Clear btn btn-default btn-xs">
                <i class="fa fa-minus-square-o"></i> <b><?=__('Clear');?></b>
            </button>
        </li>
        <li>
            <?php echo $this->Form->input($field, array('type'=>'select', 'options'=>$options,'class'=>'select2-open', 'multiple'=>true, 'label'=>false)); ?>
        </li>
    </ul>
</div>
