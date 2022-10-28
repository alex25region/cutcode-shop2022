<?php


namespace App\Traits\Models;

use Illuminate\Database\Eloquent\Model;

trait HasSlug
{
    protected static function bootHasSlug ()
    {
//        parent::boot();

        $i = 0;

        // TODO Решить задачу с уникальностью slug:
        // В append надо добавить счетчик, т.е. если slug сущестовует то добавлять $i
        static::creating(function (Model $item) {
            $item->slug = $item->slug ?? str($item->title)
            ->append(rand(1, 1000))
            ->slug();
        });
    }


}