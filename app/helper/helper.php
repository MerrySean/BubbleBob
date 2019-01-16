<?php
 
if (!function_exists('is_route')) {
 
    /**
     * Checks if a value exists in an array in a case-insensitive manner
     *
     * @param mixed $name
     * The Route name
     *
     * @param $class
     * The class name that is going to output if true
     *
     * @return class $class if current Route Match,
     * blank otherwise
     */
    function is_route($name, $class)
    {
        if (Route::currentRouteName() == $name) {
            return $class;
        } else {
            return "";
        }
    }
}
