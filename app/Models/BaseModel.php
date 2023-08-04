<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

//    protected static function boot()
//    {
//        static::bootTraits();
//    }

//    /**
//     * Boot all of the bootable traits on the model.
//     *
//     * @return void
//     */
//    protected static function bootTraits()
//    {
//        $class = static::class;
//
//        $booted = [];
//
//        foreach (class_uses_recursive($class) as $trait) {
//            $method = 'boot'.class_basename($trait);
//
//            if (method_exists($class, $method) && ! in_array($method, $booted)) {
//                forward_static_call([$class, $method]);
//                $booted[] = $method;
//            }
//
//        }
//    }
}
