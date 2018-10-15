<?php

namespace App\Entity\Base;

/**
 * Class BaseModel
 */
class BaseModel
{

    /**
     * @var DateTime
     */
    protected $createdAt;

    /**
     * @var DateTime
     */
    protected $updatedAt;

    /**
     * @var array
     */
    public $links;

    /**
     * Get $createdAt
     *
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return new \DateTime($this->createdAt);
    }

    /**
     * @var DateTime $createdAt
     *
     * @return BaseModel
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get $updatedAt
     *
     * @return DateTime
     */
    public function getUpdatedAt()
    {
        return new \DateTime($this->updatedAt);
    }

    /**
     * Set $updatedAt
     *
     * @var DateTime $updatedAt
     *
     * @return BaseModel
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get $links
     *
     * @return array
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * add link
     *
     * @var string|array $link
     *
     * @return BaseModel
     */
    public function addLink($link)
    {
        $this->links[] = $link;

        return $this;
    }

    /**
     * Set $links
     *
     * @var array $updatedAt
     *
     * @return BaseModel
     */
    public function setLinks($links)
    {
        $this->links = $links;

        return $this;
    }
}
