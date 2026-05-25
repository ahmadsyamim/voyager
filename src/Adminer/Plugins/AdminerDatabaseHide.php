<?php

namespace TCG\Voyager\Adminer\Plugins;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;

class AdminerDatabaseHide
{
    protected $disabled;

    function __construct() {}

    function databases($flush = true)
    {
        $return = [];

        // 1. Get the current active driver and default database name from config
        $defaultConnection = Config::get('database.default');
        $driver = Config::get("database.connections.{$defaultConnection}.driver");
        $currentDb = Config::get("database.connections.{$defaultConnection}.database", '');

        // 2. Handle SQLite separately since Schema::getDatabases() throws an error on it
        if ($driver === 'sqlite') {
            // SQLite just uses a file. We can extract the filename as the database name.
            $dbName = basename($currentDb);
            return [$dbName];
        }

        // 3. For MySQL / PostgreSQL, safely use Laravel's schema inspection
        try {
            $databases = Schema::getDatabases();

            foreach ($databases as $db) {
                $dbName = $db['name'] ?? '';

                if (strtolower($dbName) === strtolower($currentDb)) {
                    $return[] = $dbName;
                }
            }
        } catch (\Throwable $e) {
            // Fallback safety if the driver doesn't support schema listing
            if (strtolower(basename($currentDb)) === strtolower(basename($currentDb))) {
                $return[] = basename($currentDb);
            }
        }

        return $return;
    }
}
