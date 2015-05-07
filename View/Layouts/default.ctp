<?php
$cakeDescription = __d('cake_dev', __('Warehouse'));
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
        <?php echo __($title_for_layout); ?>:
		<?php echo __('Warehouse'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
        echo $this->Html->css('modules/jquery-ui/jquery-ui');
        echo $this->Html->css('modules/font-awesome');
        echo $this->Html->css('build');
		echo $this->Html->css('custom');
		echo $this->fetch('meta');
		echo $this->fetch('css');
        echo $this->element('module.theme');
	?>
</head>
<body onunload="">
	<header class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-header">
            <?php echo $this->Html->link('<i class="fa fa-cubes fa-lg"></i>',
                array('controller'=>'orders', 'action' => 'index'),
                array('escape'=>false, 'class'=>'navbar-brand', 'style'=>'color: #444;')); ?>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" style="font-weight: bold;">
            <ul class="nav navbar-nav">
                <?php foreach($this->Session->Read('Auth.User.Module') as $i=>$module):?>
                <li class="dropdown <?= $module['id'] == $this->Session->Read('Config.module') ? 'active' : '';?>">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown"><?=$module['name'];?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php echo $this->Html->link(__('Orders'),
                                array('controller'=>'orders', 'action' => 'index', '?' =>  array('@'=>$module['id'])),
                                array('escape'=>false)); ?></li>
                        <li><?php echo $this->Html->link(__('Order Types'),
                                array('controller'=>'order_types', 'action' => 'index', '?' =>  array('@'=>$module['id'])),
                                array('escape'=>false)); ?></li>
                        <li class="divider"></li>
                        <li><?php echo $this->Html->link(__('Stocks'),
                                array('controller'=>'stocks', 'action' => 'index', '?' =>  array('@'=>$module['id'])),
                                array('escape'=>false)); ?></li>
                        <li><?php echo $this->Html->link(__('Stock Types'),
                                array('controller'=>'stock_types', 'action' => 'index', '?' =>  array('@'=>$module['id'])),
                                array('escape'=>false)); ?></li>
                    </ul>
                </li>
                <?php endforeach;?>
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown"> RELATÓRIOS <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <?php foreach($this->Session->Read('Auth.User.Module') as $i=>$module):?>
                            <?php if($module['name'] == 'PERMANENTE') :?>
                                <li role="presentation" class="dropdown-header">PERMANENTE</li>
                                <li><?php echo $this->Html->link('Relação de Materiais',
                                        array('controller'=>'reports', 'action' => 'permanente', 'relacao_materiais'),
                                        array('data-toggle'=>'modal', 'data-target'=>'#modal', 'escape'=>false)); ?></li>
                            <?php endif; ?>
                            <?php if($i == 1) :?>
                                <li class="divider"></li>
                            <?php endif; ?>
                            <?php if($module['name'] == 'CONSUMO') :?>
                                <li role="presentation" class="dropdown-header">CONSUMO</li>
                                <li><?php echo $this->Html->link('Lista de Estoque',
                                        array('controller'=>'reports', 'action' => 'consumo', 'lista_estoque'),
                                        array('data-toggle'=>'modal', 'data-target'=>'#modal', 'escape'=>false)); ?></li>
                            <?php endif; ?>
                        <?php endforeach;?>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown"><?=__('ENTRIES');?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <?php foreach($this->Session->Read('Auth.User.OrganizationTypes') as $i=>$OrganizationType):?>
                        <li><?php echo $this->Html->link($OrganizationType,
                                array('controller'=>'organizations', 'action' => 'index', $i),
                                array('escape'=>false)); ?></li>
                        <?php endforeach;?>
                        <li class="divider"></li>
						<li><?php echo $this->Html->link(__('Organization Types'),
                                array('controller'=>'organization_types', 'action' => 'index'),
                                array('escape'=>false)); ?></li>
                        <li><?php echo $this->Html->link(__('Stock Groups'),
                                array('controller'=>'stock_groups', 'action' => 'index'),
                                array('escape'=>false)); ?></li>
                        <li><?php echo $this->Html->link(__('Stock Units'),
                                array('controller'=>'stock_units', 'action' => 'index'),
                                array('escape'=>false)); ?></li>
                        <li class="divider"></li>
                        <li><?php echo $this->Html->link(__('Users'),
                                array('controller'=>'users', 'action' => 'index'),
                                array('escape'=>false)); ?></li>
						<li><?php echo $this->Html->link(__('Roles'),
                                array('controller'=>'roles', 'action' => 'index'),
                                array('escape'=>false)); ?></li>
                        <li><?php echo $this->Html->link(__('Modules'),
                                array(),
                                array('escape'=>false)); ?></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><?php echo $this->Html->link($this->Session->read('Auth.User.name'), array('controller' => 'users', 'action' => 'edit', $this->Session->read('Auth.User.id')), array('escape'=>false)); ?></li>
                <li><?php echo $this->Html->link('<i style="color: darkorange;" class="fa fa-power-off fa-lg"></i> ', array('controller' => 'users', 'action' => 'logout'), array('escape'=>false)); ?></li>
            </ul>
			<?php echo $this->Form->create($this->name, array('type'=>'get', 'action'=>'index/'.@$url_params, 'class'=>'navbar-form navbar-right')); ?>
				<div class="input-group">
					<input id="search_input" type="search" placeholder="Localizar" name="search" class="form-control" style="border-right: none;" value="<?=@$_GET['search'];?>">
					<div class="input-group-btn">
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="border-radius: 0px; border-left:none;">
							<span class="fa fa-filter text-muted"></span>
						</button>
						<?php if(isset($filters)) : ?>
						<div class="dropdown-menu" role="menu">
							<?php echo $this->Form->input('filter', array('label'=>false,'options'=>$filters, 'multiple'=>true, 'value'=>@$_GET['filter']));?>
						</div>
						<?php endif; ?>
					</div>
					<div class="input-group-btn">
						<button class="btn btn-primary" type="submit">
							<i class="fa fa-search"></i>
						</button>
					</div>
				</div>
		    <?php echo $this->Form->end(); ?>
        </div>
	</header>
	<main style="display:none;">
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
	</main>
	<footer>
		<?php echo $this->Html->link(
				$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
				'http://www.cakephp.org/',
				array('target' => '_blank', 'escape' => false, 'class'=>'pull-right')
			);
		?>
	</footer>
	<?php
        if($this->Session->read('Auth.User.id') == 5)
            echo $this->element('sql_dump');
    ?>
    <?php
	echo $this->Html->script('http://localhost:35729/livereload.js');

    echo $this->Html->script('modules/jquery-1.11.1.min');
    echo $this->Html->script('modules/jquery-ui');
    echo $this->Html->script('modules/selectize');
    echo $this->Html->script('modules/bootstrap.min');
    echo $this->Html->script('modules/track-changes');
    echo $this->Html->script('custom');
    echo $this->fetch('script');
    ?>
    <div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
    <div id="loading-indicator" tabindex="-1" class="modal">
        <i class="fa fa-spinner fa-spin fa-4x"></i>
    </div>
    <script type="text/javascript">
        $('#loading-indicator').fadeOut();
    </script>
</body>
</html>
