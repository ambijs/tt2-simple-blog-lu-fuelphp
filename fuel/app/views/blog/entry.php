<?php if (isset($category)): ?>
    <ul class="breadcrumb">
        <li><h3>Category - <?php echo $category; ?></h3></li>
    </ul>
<?php endif; ?>

<?php foreach ($entries as $entry): ?>
    <blockquote>
        <h2><?php echo $entry->entry_title; ?></h2>
        <p><?php echo nl2br($entry->entry_description); ?></p>
        <small><?php echo $entry->entry_excerpt; ?></small>
        <?php if(!isset($single)): ?>
            <div><?php echo Html::anchor('view/'.$entry->entry_id, 'View entry', array('class'=>'btn')); ?></div>
        <?php else: ?>
            <div style="margin: 10px 0 10px 0; width: 100%;">
                This article is postned in <?php echo Html::anchor('category/'.$entry->entry_category_id, $entry->category); ?>,
                at <?php echo date("j.n.Y", $entry->entry_updated_at); ?>
            </div>
            <div>
                <div class="btn-group">
                    <?php echo Html::anchor('edit/'.$entry->entry_id, 'Edit entry', array('class'=>'btn')); ?>
                    <?php echo Html::anchor('delete/'.$entry->entry_id, 'Delete entry', array('class'=>'btn btn-warning')); ?>
                    <?php echo Html::anchor('/', 'Back to first page', array('class'=>'btn')); ?>
                </div>
            </div>
        <?php endif; ?>
    </blockquote>
<?php endforeach; ?>