<?php
/**
 * Created by PhpStorm.
 * User: manchidede
 * Date: 11/18/19
 * Time: 6:07 AM
 */

namespace App\General;


trait PennywiseHandler {
	private $pennywiseValidationArray = 'required|integer|in:200,500,1000';
}