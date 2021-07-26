<?php

namespace Aluraflix\Entity;

/**
 * @Entity
 * @Table(name="videos")
 */
class Video
{
    /**
     * @Id
     * @PrimaryKey
     * @Column(type="integer")
     * @GeneratedValue
     */
    public int $id;
    /**
     * @Column(length=100)
     */
    public string $title;
    /**
     * @Column(length=500)
     */
    public string $description;
    /**
     * @Column(length=200)
     */
    public string $url;
}
