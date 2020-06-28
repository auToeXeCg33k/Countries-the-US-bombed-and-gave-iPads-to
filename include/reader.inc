<?php
require_once "user.inc";

class Reader
{
    //method to check if a username is taken
    static function user_exists(string $whence, string &$what) : bool
    {
        $file = fopen($whence, "r");

        while (($line = fgets($file)) !== false)
            if (unserialize($line)->get_name() === $what)
            {
                fclose($file);
                return true;
            }

        fclose($file);
        return false;
    }

    //method to check for a user with matching name and password
    static function user_valid(string $whence, string $name, string $pwd) : bool
    {
        $file = fopen($whence, "r");

        while(($line = fgets($file)) !== false)
            if (unserialize($line)->get_name() === $name && unserialize($line)->get_pwd() === $pwd)
            {
                fclose($file);
                return true;
            }

        fclose($file);
        return false;
    }

    //method to load a user in by name
    static function load_user(string $whence, string $name)
    {
        $file = fopen($whence, "r");

        while(($line = fgets($file)) !== false)
        {
            $user = unserialize($line);
            if ($user->get_name() === $name)
            {
                fclose($file);
                return $user;
            }
        }

        fclose($file);
        return NULL;
    }

    //function to read data into an array
    static function load_data(string $whence)
    {
        $file = fopen($whence, "r");
        $data = [];
        while (($line = fgets($file)) !== false)
            $data[] = unserialize($line);

        fclose($file);
        return $data;
    }
}