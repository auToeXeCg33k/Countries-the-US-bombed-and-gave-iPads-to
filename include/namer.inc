<?php


class Namer
{
    private const CHARS = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";


    static function rename(string $folder, string $filename) : string
    {
        while (true)
        {
            $unique = true;
            $name = "";

            for ($i = 0; $i < 5; $i++)
                $name .= self::CHARS[mt_rand(0, strlen(self::CHARS)-1)];

            foreach (scandir($folder) as &$file)
                if ($file === $name)
                    $unique = false;

            if ($unique)
            {
                for ($i = strlen(basename($_FILES[$filename]["name"])) - 1; $i >= 0; $i--)
                    if (basename($_FILES[$filename]["name"])[$i] === ".")
                    {
                        $ext = substr(basename($_FILES[$filename]["name"]), $i, strlen(basename($_FILES[$filename]["name"])) - 1);
                        break;
                    }
                return $name . $ext;
            }
        }
    }
}