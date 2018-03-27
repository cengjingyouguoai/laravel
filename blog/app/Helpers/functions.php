<?php

/**
 * 跳转成功方法
 * @param $url 跳转地址
 * @param $message 提示信息
 * @param $timeJump跳转时间
 */

function successJump($url,$message,$timeJump = 2)
{

	$data = [

	       'code' => 1,
	       'msg' => $message,
	       'url' =>  $url,
	       'time' => $timeJump
	];

	return view ('common.jump',$data);
}

/**
 * 跳转失败方法
 * @param $url 跳转地址
 * @param $message 提示信息
 * @param $timeJump跳转时间
 */
function errorJump($url,$message,$timeJump = 2)
{
	$data = [
	       'code' => 2,
	       'msg' => $message,
	       'url' =>  $url,
	       'time' => $timeJump
	];

	return view ('common.jump',$data);
}
