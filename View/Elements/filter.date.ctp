<div id="<?=$fields[0];?>Filter" class="btn-group filter">
    <button class="btn btn-link"><?=$label;?></button>
    <button class="btn btn-link dropdown-toggle" data-toggle="dropdown">
        &nbsp;<span class="fa fa-filter"></span>
    </button>
    <ul class="dropdown-menu" role="menu">
        <li class="ctrl">
            <button class="Apply btn btn-default btn-xs">
                <i class="fa fa-check-square-o"></i> <b><?=__('Apply');?></b>
            </button>
            <button id="<?=$fields[0]?>" class="Clear btn btn-default btn-xs">
                <i class="fa fa-minus-square-o"></i> <b><?=__('Clear');?></b>
            </button>
        </li>
        <li>
            <div class="input-group">
                <label><?=__('Begin')?></label>
                <?php echo $this->Form->input($fields[0], array('label'=>false,'class'=>'date filter-normalized'));?>
                <label><?=__('End')?></label>
                <?php echo $this->Form->input($fields[1], array('label'=>false,'class'=>'date filter-normalized'));?>
            </div>
        </li>
    </ul>
</div>