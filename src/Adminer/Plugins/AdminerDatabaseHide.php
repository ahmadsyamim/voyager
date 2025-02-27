<?php

namespace TCG\Voyager\Adminer\Plugins;

class AdminerDatabaseHide
{
    protected $disabled;

    /**
     * @param array case insensitive database names in values
     */
    function __construct() {}

    function databases($flush = true)
    {
        $return = array();
        foreach (get_databases($flush) as $db) {
            if (strtolower($db) == env('DB_DATABASE', '')) {
                $return[] = $db;
            }
        }
        return $return;
    }
}
