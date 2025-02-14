<?php

namespace Core;

class Container{
    protected static $binding = [];
    public static function bind($key,$resolver){
        //$this->binding[$key] = $resolver;
        Container::$binding[$key] = $resolver;
    }
    public static function resolve($key){
        if(!array_key_exists($key, Container::$binding)){
            throw new \Exception("No matching bounding is found");
        }
        $resolver = Container::$binding[$key];
        return $resolver();  
        // if(array_key_exists($key,Container::$binding)){
        //     $resolver = Container::$binding[$key];
        //     return $resolver;
        // }
        // if(!array_key_exists($key, $this->binding)){
        //     throw new \Exception("No matching bounding is found");
        // }
        // if(array_key_exists($key,$this->binding)){
        //     $resolver = $this->binding[$key];
        //     return $resolver;
        // }
    }
}