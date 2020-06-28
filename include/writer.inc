<?php
require_once "user.inc";

class Writer
{
    //method to write user data to database
    static function write_user(string $where, User &$user) : void
    {
        $file = fopen($where, "a");
        fwrite($file, serialize($user)."\n");
        fclose($file);
    }

    static function write_data(string $where, $data)
    {
        $file = fopen($where, "a");
        fwrite($file, serialize($data)."\n");
        fclose($file);
    }

    static function modify_user(string $path, User $user)
    {
        $file = fopen($path, "r");

        while(($line = fgets($file)) !== false)
            $data[] = unserialize($line);

        fclose($file);

        $file = fopen($path, "w");

        foreach($data as &$account) {
            if ($account->get_name() === $user->get_name())
                $account = $user;

            var_dump($account);
            fwrite($file, serialize($account) . "\n");
        }

        fclose($file);
    }
}