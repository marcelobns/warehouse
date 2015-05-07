<?php
    if(sizeof($this->Session->Read('Auth.User.Module')) > 0) {
    $menu_actv_background='';
    $menu_actv_color='';
    foreach($this->Session->read('Auth.User.Module') as $key=>$module){
        if($module['id'] == $this->Session->Read('Config.module')){            
            $menu_actv_background = $module['background'];
            $menu_actv_color = $module['color'];
        }
    }
?>
<style>
    .dropdown.active {
        background-color:<?=$menu_actv_background;?>!important;
    }
    .dropdown.active.open .dropdown-toggle {
        background-color:<?=$menu_actv_background;?>!important;
    }
    .dropdown.active .dropdown-toggle:hover {
        background-color:<?=$menu_actv_background;?>!important;
    }
    .dropdown.active .dropdown-toggle {
        color:<?=$menu_actv_color;?>!important;
    }
    header {
        border-bottom: 5px solid <?=$menu_actv_background;?>!important;
    }
    .navbar-inverse .navbar-nav > .active > a {
        background-color:<?=$menu_actv_background;?>!important;
    }
</style>
<?php } ?>
