<?php

// src/DTO/DiscogsPaginationDTO.php

namespace App\DTO;

class DiscogsPaginationDTO
{
    private $perPage;
    private $items;
    private $page;
    private $urls;
    private $pages;

    public function __construct($perPage, $items, $page, $urls, $pages)
    {
        $this->perPage = $perPage;
        $this->items = $items;
        $this->page = $page;
        $this->urls = $urls;
        $this->pages = $pages;
    }

    public function getPerPage()
    {
        return $this->perPage;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getPage()
    {
        return $this->page;
    }

    public function getUrls()
    {
        return $this->urls;
    }

    public function getPages()
    {
        return $this->pages;
    }
}
