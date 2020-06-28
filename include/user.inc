<?php
class User
{
    private $name;
    private $pwd;
    private array $tracks;
    private string $playing;


    public function __construct($name, $pwd)
    {
        $this->name = $name;
        $this->pwd = $pwd;
        $this->playing = "Default";
        $this->tracks[$this->playing] = "music.mp3";
    }


    public function get_name() {return $this->name;}
    public function get_pwd() {return $this->pwd;}
    public function get_tracks() {return $this->tracks;}
    public function add_track(string $key, string $value) : bool
    {
        if (key_exists($key, $this->tracks))
            return false;

        $this->tracks[$key] = $value;
        return true;
    }

    public function set_playing(string $key)
    {
        if (!key_exists($key, $this->tracks))
            return;

        $this->playing = $key;
    }

    public function now_playing() : string
    {
        return $this->tracks[$this->playing];
    }
}