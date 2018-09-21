<?php
namespace app\models;


class Category extends Model
{
    public $id;
    public $nameCategory;

    public static function getTableName()
    {
        return 'category';
    }
}