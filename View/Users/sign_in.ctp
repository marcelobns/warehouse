<div id="login">
    <div class="container" style="margin-top: 75px; width: 75%">
        <div class="row marketing">
            <div class="col-md-5">
                <div class="login-form">
                    <h3 style="text-align: center; font-weight: bold;">Almoxarifado</h3>
                    <?php echo $this->Form->create('User', array('url'=>array('action'=>'sign_in'))); ?>
                        <fieldset style="margin: 42px 30px;">
                            <?php echo $this->Form->input('username', array('placeholder'=>__('Username'), 'autofocus'=>true, 'label'=>false)); ?>
                            <?php echo $this->Form->input('password', array('type'=>'password', 'placeholder'=>__('Password'), 'label'=>false)); ?>
                            <?php echo $this->Form->button(__('Enter'), array('type'=>'submit', 'class'=>'btn btn-default btn-block')); ?>
                        </fieldset>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>

            <div class="col-md-7">
                <div class="panel panel-primary login-panel-info">
                    <div class="panel-heading" style="background-color: #404040"><h5>Mensagens e Informações</h5></div>
                    <div class="panel-body">
                        <div class="col-md-12"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>