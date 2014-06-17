<?php
    if(sizeof($this->Session->Read('Config.Modules')) > 0) :
    $menu_actv_background='';
    $menu_actv_color='';
    foreach($this->Session->Read('Config.Modules') as $key=>$value){
        if($value['Module']['id'] == $this->Session->Read('Config.module')){
            $menu_actv_background = $value['Module']['background'];
            $menu_actv_color = $value['Module']['color'];
        }
    }
?>
<style>
    .dropdown.active{
        background-color:<?=$menu_actv_background;?>!important;
    }
    .dropdown.active.open .dropdown-toggle{
        background-color:<?=$menu_actv_background;?>!important;
    }
    .dropdown.active .dropdown-toggle:hover{
        background-color:<?=$menu_actv_background;?>!important;
    }
    .dropdown.active .dropdown-toggle{
        color:<?=$menu_actv_color;?>!important;
    }
    #header{
        border-bottom: 7px solid <?=$menu_actv_background;?>!important;
    }
</style>
<?php endif;?>