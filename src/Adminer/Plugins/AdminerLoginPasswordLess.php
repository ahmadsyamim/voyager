<?php

namespace TCG\Voyager\Adminer\Plugins;

/** Enable login for password-less database
 * @link https://www.adminer.org/plugins/#use
 * @author Jakub Vrana, https://www.vrana.cz/
 * @license https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @license https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
 */
class AdminerLoginPasswordLess
{
    function login($login, $password)
    {
        if (config('database.default') == 'sqlite') {
            return true;
        }
    }
}
