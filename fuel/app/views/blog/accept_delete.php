<div class="alert alert-block alert-error fade in">
    <h3 class="alert-heading">Are you sure, delete it?</h3>
    <p>Press once, and never see this entry again!</p>
    <form method="post" style="margin: 10px 0 0 0;">
        <button type="submit" class="btn btn-danger">Yes, delete it!</button>
        <?php echo Html::anchor('view/'.$entry_id, 'No, lets go back', array('class'=>'btn')); ?>
    </form>
</div>
