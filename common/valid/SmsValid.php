<?php
/**
 * @link www.52azuo.com
 * @copyright Copyright (c) 2018 www.52azuo.com Software Team
 * @author 高学朋<1641381910@qq.com>
 */

namespace common\valid;

/**
 * 短信验证抽象类
 *
 * @property string $phone
 */
abstract class SmsValid {
    // 手机号
    public $phone = '';

    /*
     * 验证手机号是否有效
     *
     * @return bool
     */
    abstract protected function validPhone();
}
