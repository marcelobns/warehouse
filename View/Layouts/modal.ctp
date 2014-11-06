<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 class="text-center"><?=$modal_title;?></h3>
</div>
<div class="modal-body">
    <?=$this->fetch('content');?>
</div>

<?=$this->Html->script('modules/jquery-1.11.0.min');?>
<?=$this->Html->script('app');?>

<script type="text/javascript">
    <?=$this->fetch('script');?>
</script>
