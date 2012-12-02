<?php
use Orm\Model;
use Orm\Observer;

class Observer_Blog extends Observer
{
    public function before_insert(Model $model)
    {
        $model->entry_created_at = time();
        $model->entry_updated_at = time();
    }

    public function before_update(Model $model)
    {
        $model->entry_updated_at = time();
    }
}