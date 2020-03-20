<?php


namespace backend\models;


class Helper
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;

    const ROLE_GUEST = 0;
    const ROLE_MOD1 = 1;
    const ROLE_MOD2 = 2;
    const ROLE_EXECUTOR = 3;
    const ROLE_WATCHER = 4;
    const ROLE_ADMIN = 5;

    const CURRENCY_SUM = 0;
    const CURRENCY_USD = 1;
    const CURRENCY_EURO = 2;

    const BID_CREATED = 0;
    const BID_PROCESSING = 1;
    const BID_CLOSED = 2;

    const FINANCE_BUDGET = 0;
    const FINANCE_UNBUDGET = 1;

    const APPLICATION_TYPE = ['bid','aggreement','protocol'];

    public static function getUserStatuses()
    {
        return array(
            self::STATUS_DELETED => 'STATUS_DELETED',
            self::STATUS_INACTIVE => 'STATUS_INACTIVE',
            self::STATUS_ACTIVE => 'STATUS_ACTIVE',
        );
    }
    public static function getRoles()
    {
        return array(
            self::ROLE_GUEST => 'ROLE_GUEST',
            self::ROLE_MOD1 => 'ROLE_MOD1',
            self::ROLE_MOD2 => 'ROLE_MOD2',
            self::ROLE_EXECUTOR => 'ROLE_EXECUTOR',
            self::ROLE_WATCHER => 'ROLE_WATCHER',
            self::ROLE_ADMIN => 'ROLE_ADMIN',
        );
    }
    public static function getCurrencies()
    {
        return array(
            self::CURRENCY_SUM  => 'CURRENCY_SUM',
            self::CURRENCY_USD  => 'CURRENCY_USD',
            self::CURRENCY_EURO => 'CURRENCY_EURO',

        );
    }
    public static function getBidStatuses()
    {
        return array(
            self::BID_CREATED => 'BID_CREATED',
            self::BID_PROCESSING => 'BID_PROCESSING',
            self::BID_CLOSED => 'BID_CLOSED',
        );
    }
    public static function getFinances()
    {
        return array(
            self::FINANCE_BUDGET => 'FINANCE_BUDGET',
            self::FINANCE_UNBUDGET => 'FINANCE_UNBUDGET',
        );
    }
    /*public static function getStatusLabel($id, $default = null)
    {
        $statuses = static::getStatusArr();
        return isset($statuses[$id]) ? $statuses[$id] : $default;
    }*/
}
