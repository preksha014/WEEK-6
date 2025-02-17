<?php

namespace Core;
use Exception;
class Container
{
    protected $bindings = [];
    public function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }
    public function resolve($key)
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new Exception("No matching binding found for {$key}");
        }
        $resolver = $this->bindings[$key];
        return call_user_func($resolver);
    }
}
// namespace Core;

// class Container{
//     protected $binding = [];
//     public  function bind($key,$resolver){
//         $this->binding[$key] = $resolver;
//         //Container::$binding[$key] = $resolver;
//     }
//     public function resolve($key){
//         // if(!array_key_exists($key, Container::$binding)){
//         //     throw new \Exception("No matching bounding is found");
//         // }
//         // $resolver = Container::$binding[$key];
//         // return $resolver();  
//         // if(!array_key_exists($key, $this->binding)){
//         //     throw new \Exception("No matching bounding is found");
//         // }
//         if(array_key_exists($key,$this->binding)){
//             $resolver=  $this->binding[$key];
//             return $resolver;
//         }
//     }
// }