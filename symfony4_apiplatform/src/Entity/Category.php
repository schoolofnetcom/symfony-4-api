<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 * @ApiResource(attributes={"normalization_context"={"groups"={"movies"}}
 *     })
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("movies")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     * @Groups("movies")
     */
    private $name;

    /**
     * @var object
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Movie", mappedBy="category")
     * @Groups("movies")
     */
    private $movies;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Category
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return object
     */
    public function getMovies()
    {
        return $this->movies;
    }

    /**
     * @param object $movies
     * @return Category
     */
    public function setMovies($movies)
    {
        $this->movies = $movies;
        return $this;
    }



}
