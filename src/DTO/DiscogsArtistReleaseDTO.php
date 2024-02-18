<?php 

namespace App\DTO;

class DiscogsReleaseDTO
{
    private $artist;
    private $id;
    private $mainRelease;
    private $resourceUrl;
    private $role;
    private $thumb;
    private $title;
    private $type;
    private $year;
    private $format;
    private $label;
    private $status;

    public function __construct($artist, $id, $mainRelease, $resourceUrl, $role, $thumb, $title, $type, $year, $format = null, $label = null, $status = null)
    {
        $this->artist = $artist;
        $this->id = $id;
        $this->mainRelease = $mainRelease;
        $this->resourceUrl = $resourceUrl;
        $this->role = $role;
        $this->thumb = $thumb;
        $this->title = $title;
        $this->type = $type;
        $this->year = $year;
        $this->format = $format;
        $this->label = $label;
        $this->status = $status;
    }

    public function getArtist()
    {
        return $this->artist;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getMainRelease()
    {
        return $this->mainRelease;
    }

    public function getResourceUrl()
    {
        return $this->resourceUrl;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getThumb()
    {
        return $this->thumb;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function getFormat()
    {
        return $this->format;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function getStatus()
    {
        return $this->status;
    }
}
