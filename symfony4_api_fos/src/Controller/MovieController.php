<?php

namespace App\Controller;


use App\Entity\Movie;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * Class MovieController
 * @package App\Controller
 *
 */
class MovieController extends FOSRestController
{
    /**
     * @Rest\Get("/movies", name="get_movies")
     */
    public function movies()
    {
        $em = $this->getDoctrine()->getManager();
        $movies = $em->getRepository(Movie::class)->findAll();
        return $this->json(['data' => $movies]);
    }

    /**
     * @param mixed|null $id
     *
     * @Rest\Get("/movies/{id}", name="get_movie")
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function movie($id)
    {
        $em = $this->getDoctrine()->getManager();
        $movie = $em->getRepository(Movie::class)->find($id);

        return $this->json(['data' => $movie]);
    }

    /**
     * @Rest\Post("movies")
     */

    /**
     * @Rest\Put("moveis/{id}"
     */

}