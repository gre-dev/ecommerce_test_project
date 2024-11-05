<?php

if (! function_exists('randomOrCreateFactory')) {
    function randomOrCreateFactory(string $class_name)
    {
        $class = new $class_name();

        if ($class::count()) {
            return $class::inRandomOrder()->first();
        }

        return $class::factory()->create();
    }
}
