<?php
/**
 * Created by PhpStorm.
 * User: chenallen
 * Date: 2018/1/7
 * Time: 下午5:16
 */
namespace Laravist\Hasher;

/**
 * Class MD5Hasher
 * @package Laravist\Hasher
 */
class MD5Hasher
{
    /**
     * @param $value
     * @param array $options
     * @return string
     */
    public function make($value, array $options = [])
    {
        $salt = isset($options['salt']) ? $options['salt'] : '';
        return hash('md5', $value.$salt);
    }

    /**
     * @param $value
     * @param $hashValue
     * @param array $options
     * @return bool
     */
    public function check($value, $hashValue, array $options = [])
    {
        $salt = isset($options['salt']) ? $options['salt'] : '';
        return hash('md5', $value.$salt) === $hashValue;
    }
}