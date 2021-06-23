<?php


class HomepageController
{
    public function render(array $GET, array $POST): void
    {
        require 'View/homepage.php';
    }
}