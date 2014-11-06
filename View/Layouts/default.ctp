<?php
$cakeDescription = __d('cake_dev', __('Warehouse'));
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
        <?php echo __($title_for_layout); ?>:
		<?php echo $cakeDescription; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
        echo $this->Html->css('bootstrap');
		echo $this->Html->css('cake.generic');
		echo $this->Html->css('font-awesome');
		echo $this->Html->css('select2/select2');
        echo $this->Html->css('smoothness/jquery-ui-1.10.4.custom.min');
		echo $this->Html->css('custom');
		echo $this->fetch('meta');
		echo $this->fetch('css');
        echo $this->element('module.theme');
	?>
</head>
<body>
	<div id="container">
		<div id="header" class="navbar navbar-static-top" role="navigation">
            <div class="navbar-header">
                <?php echo $this->Html->link('<i class="fa fa-cubes fa-2x" style="line-height: 0.5;"></i>',
                    array('controller'=>'orders', 'action' => 'index'),
                    array('escape'=>false, 'class'=>'navbar-brand', 'style'=>'height: 0; color: #404040; text-shadow: 1px 1px darkgray, -1px -1px black;')); ?>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <?php foreach($this->Session->Read('Config.Modules') as $i=>$value):?>
                    <li class="dropdown <?=$value['Module']['id'] == $this->Session->Read('Config.module')?'active' : '';?>">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"><?=$value['Module']['name'];?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><?php echo $this->Html->link(__('Orders'),
                                    array('controller'=>'orders', 'action' => 'index', '?' =>  array('@'=>$value['Module']['id'])),
                                    array('escape'=>false)); ?></li>
                            <li><?php echo $this->Html->link(__('Order Types'),
                                    array('controller'=>'order_types', 'action' => 'index', '?' =>  array('@'=>$value['Module']['id'])),
                                    array('escape'=>false)); ?></li>
                            <li class="divider"></li>
                            <li><?php echo $this->Html->link(__('Stocks'),
                                    array('controller'=>'stocks', 'action' => 'index', '?' =>  array('@'=>$value['Module']['id'])),
                                    array('escape'=>false)); ?></li>
                            <li><?php echo $this->Html->link(__('Stock Types'),
                                    array('controller'=>'stock_types', 'action' => 'index', '?' =>  array('@'=>$value['Module']['id'])),
                                    array('escape'=>false)); ?></li>
                        </ul>
                    </li>
                    <?php endforeach;?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"> RELATÓRIOS <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?php foreach($this->Session->Read('Config.Modules') as $i=>$value):?>
                                <?php if($value['Module']['name'] == 'PERMANENTE') :?>
                                    <li role="presentation" class="dropdown-header">PERMANENTE</li>
                                    <li><?php echo $this->Html->link('Relação de Materiais',
                                            array('controller'=>'reports', 'action' => 'permanente', 'relacao_materiais'),
                                            array('data-toggle'=>'modal', 'data-target'=>'#modal', 'escape'=>false)); ?></li>
                                    <!--                            <li>--><?php //echo $this->Html->link('Inventário',
//                                    array('controller'=>'organizations', 'action' => 'index', $i),
//                                    array('escape'=>false)); ?><!--</li>-->
                                    <!--                            <li>--><?php //echo $this->Html->link('Registros',
//                                    array('controller'=>'organizations', 'action' => 'index'),
//                                    array('escape'=>false)); ?><!--</li>-->
                                <?php endif; ?>
                                <?php if($i == 1) :?>
                                    <li class="divider"></li>
                                <?php endif; ?>
                                <?php if($value['Module']['name'] == 'CONSUMO') :?>
                                    <li role="presentation" class="dropdown-header">CONSUMO</li>
                                    <li><?php echo $this->Html->link('Lista de Estoque',
                                            array('controller'=>'reports', 'action' => 'consumo', 'lista_estoque'),
                                            array('data-toggle'=>'modal', 'data-target'=>'#modal', 'escape'=>false)); ?></li>
                                    <!--                            <li>--><?php //echo $this->Html->link('Saldo de Estoque',
//                                    array('controller'=>'organizations', 'action' => 'index'),
//                                    array('escape'=>false)); ?><!--</li>-->
                                    <!--                            <li>--><?php //echo $this->Html->link('Registros',
//                                    array('controller'=>'organizations', 'action' => 'index'),
//                                    array('escape'=>false)); ?><!--</li>-->
                                <?php endif; ?>
                            <?php endforeach;?>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"><?=__('ENTRIES');?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="#"><?=__('Organizations');?></a>
                                <ul class="dropdown-menu">
                                <?php foreach($this->Session->Read('Config.OrganizationTypes') as $i=>$value):?>
                                    <li><?php echo $this->Html->link($value,
                                            array('controller'=>'organizations', 'action' => 'index', $i),
                                            array('escape'=>false)); ?></li>
                                <?php endforeach;?>
                                </ul>
                            </li>
                            <li><?php echo $this->Html->link(__('Organization Types'),
                                    array('controller'=>'organization_types', 'action' => 'index'),
                                    array('escape'=>false)); ?></li>
                            <li class="divider"></li>
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
                            <li><?php echo $this->Html->link(__('Modules'),
                                    array('controller'=>'modules', 'action' => 'index'),
                                    array('escape'=>false)); ?></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right" style="margin-right: 0px;">
                    <li><?php echo $this->Html->link($this->Session->read('Auth.User.name'), array('controller' => 'users', 'action' => 'edit', $this->Session->read('Auth.User.id')), array('escape'=>false)); ?></li>
                    <li><?php echo $this->Html->link('<i style="color: darkorange;" class="fa fa-power-off fa-lg"></i> ', array('controller' => 'users', 'action' => 'logout'), array('escape'=>false)); ?></li>
                </ul>
            </div>
		</div>
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	<?php
        if($this->Session->read('Auth.User.id') == 5)
            echo $this->element('sql_dump');
    ?>
    <?php
    echo $this->Html->script('modules/jquery-1.11.0.min');
    echo $this->Html->script('modules/jquery-ui-1.10.4.custom.min');
    echo $this->Html->script('modules/bootstrap');
    echo $this->Html->script('modules/select2');
    echo $this->Html->script('modules/jquery.maskedinput');
    echo $this->Html->script('modules/jquery.maskmoney');
    echo $this->Html->script('modules/modernizr.custom');
    echo $this->Html->script('modules/sisyphus.min');
    echo $this->Html->script('modules/track-changes');
    echo $this->Html->script('app');
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

</body>
</html>

