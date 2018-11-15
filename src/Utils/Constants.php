<?php
/**
 * Created by PhpStorm.
 * User: ronaldsekitto
 * Date: 16/12/2018
 * Time: 15:59
 */

namespace App\Utils;


class Constants
{
	/**
	 * Keys to be used for flash messages
	 */
	public const KEY_ACTION_SUCCESS = 'action_success';
	public const KEY_ACTION_ERROR = 'action_error';

	public const FLASH_FINISHED_INITIAL_SETUP = 'setup is complete';

	/**
	 * Subject Constants values
	 */
	public const SUBJECT_NOT_FOUND = 'Could not find requested subject';
	public const SUBJECT_COULD_NOT_BE_DELETED = 'This subject could not be deleted, Try again later.';
	public const SUBJECT_ALREADY_EXISTS = 'A subject with this code already exists. Use a different code.';
	public const SUBJECT_DELETED_SUCCESSFULLY = 'Subject has been removed';
	public const SUBJECT_ADDED_SUCCESSFULLY = 'New subject has been created';
	public const SUBJECT_UPDATED_SUCCESSFULLY = 'Subject has been updated';
}
