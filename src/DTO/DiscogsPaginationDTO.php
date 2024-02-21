<?php

// src/DTO/DiscogsPaginationDTO.php

namespace App\DTO;

class DiscogsPaginationDTO
{
    private int $perPage;
    private int $items;
    private int $page;
    private array $urls;
    private int $pages;

    public function __construct(int $perPage, int $items, int $page, array $urls, int $pages)
    {
        $this->perPage = $perPage;
        $this->items = $items;
        $this->page = $page;
        $this->urls = $urls;
        $this->pages = $pages;
    }

    public function getPerPage(): int
    {
        return $this->perPage;
    }

    public function getItems(): int
    {
        return $this->items;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function getUrls(): array
    {
        return $this->urls;
    }

    public function getPages(): int
    {
        return $this->pages;
    }
}
