<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Blog <?php echo $title; ?></title>

    <?php echo Asset::css('bootstrap.min.css'); ?>
</head>
<body>
<style>
    body {
        padding: 20px 10px 0 0;
    }
    .br3 {
        border-radius: 3px;
    }
</style>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span2 br3">
            <div>
                <ul class="nav nav-pills nav-stacked">
                    <li class="nav-header">Navigation</li>
                    <li><?php echo Html::anchor('/', 'Home page'); ?></li>
                    <li><?php echo Html::anchor('/create', 'Create new entry'); ?></li>
                    <li class="nav-header">Categories</li>
                    <?php foreach ($categories as $category): ?>
                    <li class="<?php if (isset($category_id) && $category_id == $category->category_id) echo 'active'; ?>">
                        <?php echo Html::anchor('/category/'.$category->category_id, $category->category_title); ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="span10">
            <?php echo $content; ?>
        </div>
    </div>
</div>
</body>
</html>