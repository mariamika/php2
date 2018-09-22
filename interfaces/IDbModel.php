<?php
namespace app\interfaces;

interface IDbModel
{
    public static function getOne($id);
    public static function getAll();
    public static function getTableName();

}