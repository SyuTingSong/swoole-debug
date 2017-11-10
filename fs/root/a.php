<?php
/**
 * Created by IntelliJ IDEA.
 * User: rek
 * Date: 2017/11/7
 * Time: 下午8:09
 */

ini_set('display_errors', 'on');

require_once __DIR__ . '/t.php';

class A {
    public $a;
    public $b;
    public function __construct() {
        $this->b = 'abc';
    }

    public function __sleep() {
        return ['b'];
    }
}
$a = new A();
$a->a = $a;

$buffer = swoole_serialize::pack($a);
printf("Swoole serialized size: %d\n", strlen($buffer));
