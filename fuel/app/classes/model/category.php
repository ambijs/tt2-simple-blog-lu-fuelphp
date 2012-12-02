<?php
use Orm\Model;

class Model_Category extends Model
{
    protected static $_table_name = 'categories';

    protected static $_primary_key = array('category_id');

    protected static $_properties = array(
        'category_id',
        'category_title'
    );

    protected static $_has_many = array(
        'blogs' => array(
            'key_from' => 'category_id',
            'model_to' => 'Model_Blog',
            'key_to' => 'entry_category_id',
            'cascade_save' => true,
            'cascade_delete' => false,
        )
    );

    public function __toString()
    {
        return $this->category_title;
    }
}
