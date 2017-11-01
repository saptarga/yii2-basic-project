<?php
namespace app\helpers;
use yii;

class RecordHelpers
{
	public static function userHas($model_name)
	{
		$connection = \Yii::$app->db;
		$userid = \Yii::$app->user->identity->id;
		$sql = "SELECT id FROM $model_name WHERE user_id=:userid";
		$command = $connection->createCommand($sql);
		$command->bindValue(":userid", $userid);
		$result = $command->queryOne();
		if ($result == null) {
			return false;
		} else {
			return $result['id'];
		}
	}

	public static function userHasProfile($user_id)
	{
		$connection = \Yii::$app->db;
		$sql = "SELECT id FROM profile WHERE user_id=:userid";
		$command = $connection->createCommand($sql);
		$command->bindValue(":userid", $user_id);
		$result = $command->queryOne();
		if ($result == null) {
			return false;
		} else {
			return $result['id'];
		}
	}

	public static function userMustBeOwner($model_name, $model_id)
	{
		$connection = \Yii::$app->db;
		$userid = \Yii::$app->user->identity->id;
		$sql = "SELECT id FROM $model_name WHERE user_id=:userid AND id=:model_id";
		$command = $connection->createCommand($sql);
		$command->bindValue(":userid", $userid);
		$command->bindValue(":model_id", $model_id);
		if($result = $command->queryOne()) {
			return true;
		} else {
			return false;
		}
	}
}