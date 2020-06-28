<?php


class Page
{
    private bool $menu;
    private string $file;
    private string $title;
    private string $trump;
    private $links;

    function __construct(bool $menu, string $file, string $title, string $trump, string ...$sites)
    {
        $this->menu = $menu;
        $this->file = $file;
        $this->title = $title;
        $this->trump = $trump;
        for ($i = 0; $i < count($sites); $i+=2)
            $this->links[$sites[$i]] = $sites[$i+1];
    }

    function get_menu() : bool
    {
        return $this->menu;
    }
    function get_file() : string
    {
        return $this->file;
    }
    function get_title() : string
    {
        return $this->title;
    }
    function get_trump() : string
    {
        return $this->trump;
    }
    function get_links()
    {
        return $this->links;
    }
}