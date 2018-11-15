<?php
/**
 * Created by PhpStorm.
 * User: reiosantos
 * Date: 5/2/17
 * Time: 12:32 PM
 */

namespace App\Utils;

use DateTime;

class UtilClass
{
	/**
	 * Generates a 13 digit random number based on the current date and time
	 *
	 * @return string
	 */
	final public static function generateId(): string
    {
        $f = substr(date('Y'), 0, 1);
        return $f.date('ymdHis');

    }

    final public static function getDate(): string
	{
		return (new DateTime())->format('dS-m-Y');
	}
}
