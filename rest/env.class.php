<?php

class Config
{
    public static function DB_HOST()
    {
        return Config::get_env("DB_HOST", "sql7.freemysqlhosting.net");
    }
    public static function DB_USERNAME()
    {
        return Config::get_env("DB_USERNAME", "sql7620435");
    }
    public static function DB_PASSWORD()
    {
        return Config::get_env("DB_PASSWORD", "mCDqCLpp64");
    }
    public static function DB_SCHEME()
    {
        return Config::get_env("DB_SCHEME", "sql7620435");
    }
    public static function DB_PORT()
    {
        return Config::get_env("DB_PORT", "3306");
    }
  //ovo nismo dirali!!
    public static function jwtSecret()
    {
        return Config::get_env("JWT_SECRET", "ezcb9s8UcF");
    }
  //isto !!
    public static function get_env($name, $default)
    {
        return isset($_ENV[$name]) && trim($_ENV[$name]) != '' ? $_ENV[$name] : $default;
    }
}
