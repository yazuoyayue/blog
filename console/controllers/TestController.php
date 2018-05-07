<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/3
 * Time: 15:55
 */

namespace console\controllers;


use yii\console\Controller;


/*
	测试
*/

class TestController extends Controller
{
    public function actionIndex()
    {
        echo 'index';
    }

    #测试正则
    /*
     * @see http://php.net/manual/en/function.preg-replace-callback.php
     *
        测试过程
     $ php yii.php test/pattern2
        <p>T1<p>T1<p>T1<p>T1   #输入的
        <p>t1<p>t1<p>t1<p>T1  #输出
        3   #替换的次数会被填充到这个变量，3表示替换了3次
     * */

    public function actionPregReplaceCallback()
    {
        $fp = fopen("php://stdin", "r") or die("can't read stdin");
        while (!feof($fp)) {
            $line = fgets($fp);
            $line = preg_replace_callback(
                '|<p>\s*\w1|',
                function ($matches) {
                    return strtolower($matches[0]);
                },
                $line,
                3,   #limit,限制替换的次数
                $count  #输出实际替换的次数
            );
            echo $line;
            echo $count;
        }
        fclose($fp);
    }


    public function actionPregReplaceCallback2() {
        $input = "plain [indent] deep [indent] deeper [/indent] deep [/indent] plain";

        /*
         *
         * 静态方法绑定也可以
         *
         *
         * $output = $this->parseTagsRecursiveStatic($input);
         * */

        $output = $this->parseTagsRecursive($input);

        echo $output;
    }


    public function parseTagsRecursive($input)
    {

        $regex = '#\[indent]((?:[^[]|\[(?!/?indent])|(?R))+)\[/indent]#';

        if (is_array($input)) {
            $input = '<div style="margin-left: 10px">'.$input[1].'</div>';
        }

        return preg_replace_callback($regex, array($this, 'parseTagsRecursive'), $input);
        #return preg_replace_callback($regex, 'self::parseTagsRecursive', $input);
    }

    public static function parseTagsRecursiveStatic($input)
    {

        /*
         译注: 对此正则表达式分段分析
         * 首尾两个#是正则分隔符
         * \[indent] 匹配一个原文的[indent]
         * ((?:[^[]|\[(?!/?indent])|(?R))+)分析:
         *   (?:[^[]|\[(?!/?indent])分析:
         *  首先它是一个非捕获子组
         *   两个可选路径, 一个是非[字符, 另一个是[字符但后面紧跟着不是/indent或indent.
         *   (?R) 正则表达式递归
         *     \[/indent] 匹配结束的[/indent]
         */

        $regex = '#\[indent]((?:[^[]|\[(?!/?indent])|(?R))+)\[/indent]#';

        if (is_array($input)) {
            $input = '<div style="margin-left:10px">'.$input[1].'</div>';
        }
        #这里的TestController一定要把命名空间写全
        return preg_replace_callback($regex, '\console\controllers\TestController::parseTagsRecursiveStatic', $input);
    }


}