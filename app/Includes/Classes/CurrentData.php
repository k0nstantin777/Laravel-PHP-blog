<?php

namespace App\Includes\Classes;

/**
 * Возвращает текущую дату в разных форматах
 *
 * @author Noskov Konstantin <noskov.kos@gmail.com>
 */
class CurrentData
{
    public function all()
    {
        return date("H:i:s d-m-Y", time());
    }
    
    public function timeNow()
    {
        return date("H:i:s", time());
    }
    
    public function data()
    {
        return date("d-m-Y", time());
    }
}
