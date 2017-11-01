<?php
namespace app\helpers;
use yii;

class ValueHelpers
{
	public static function getUser($identity)
	{
		return Yii::$app->user->identity->$identity;
	}
}