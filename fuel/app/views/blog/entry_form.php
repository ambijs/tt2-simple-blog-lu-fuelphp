<?php echo Form::open(); ?>
<?php if(isset($error)): ?>
    <div class="alert alert-error">
        <?php echo $error; ?>
    </div>
<?php endif; ?>

<?php if(isset($update_success)): ?>
    <div class="alert alert-success">
        This article were successfully updated!
    </div>
<?php endif; ?>

<fieldset>
    <div class="clearfix">
        <?php echo Form::label('Entry title:', 'title'); ?>

        <div class="input">
            <?php
            echo Form::input('title', Input::post('title', isset($entry) ? $entry['entry_title'] : ''), array("class" => "span5")
            );
            ?>
        </div>
    </div>
    <div class="clearfix">
        <?php echo Form::label('Entry teksts:', 'description'); ?>

        <div class="input">
            <?php
            echo Form::textarea('description', Input::post('description', isset($entry) ? $entry['entry_description'] : ''), array("rows" => 10, "class" => "span5"));
            ?>
        </div>
    </div>
    <div class="clearfix">
        <?php echo Form::label('Entry excerpt', 'excerpt'); ?>

        <div class="input">
            <?php
            echo Form::textarea('excerpt', Input::post('excerpt', isset($entry) ? $entry['entry_excerpt'] : ''), array("rows" => 3, "class" => "span5"));
            ?>
        </div>
    </div>
    <div class="clearfix">
        <?php echo Form::label('Entry category', 'category'); ?>

        <div class="input">
            <?php echo Form::select('category', isset($entry) ? $entry['entry_category_id'] : '', $categories, array("class" => "span5")); ?>
        </div>
    </div>
    <?php if(isset($edit_article)): ?>
        <?php echo Form::submit('submit', 'Edit entry', array('class' => 'btn btn-success')); ?>
        <?php echo Html::anchor('view/'.$entry_id, 'No, lets go back', array('class'=>'btn')); ?>
    <?php else: ?>
        <?php echo Form::submit('submit', 'Create entry', array('class' => 'btn btn-primary')); ?>
    <?php endif; ?>
</fieldset>
<?php echo Form::close() ?>