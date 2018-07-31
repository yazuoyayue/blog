<?php
namespace common\helpers;

/**
 * 工具类
 */
class Util {
    /**
     * 验证手机
     *
     * @param string|int  $phone
     * @return boolean
     */
    public static function verifyPhone($phone) {
        return preg_match('/^1[0-9]{10}$/', $phone);
    }
}