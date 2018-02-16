<?php
/**
 * Created by PhpStorm.
 * User: gilso_nb9zlec
 * Date: 09/02/2018
 * Time: 17:21
 */

namespace App\DataFixtures;


use App\Entity\Category;
use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $categories = [
            "Terror", "Romance", "Comedy", "Action", "Science Fiction"
        ];

        foreach ($categories as $item) {
            $category = new Category();
            $category->setName($item);
            $manager->persist($category);
        }

        $manager->flush();

        for ($i = 1; $i <= 200; $i++) {

            $categories = $manager->getRepository(Category::class)->findAll();
            $category = array_rand($categories);

            $movie = new Movie();
            $movie->setTitle("Title of movie " . $i);
            $movie->setCategory($categories[$category]);
            $movie->setDescription("Description of movie " . $i * 3.1416);
            $movie->setReleaseDate((new \DateTime())->modify("- $i days"));
            $manager->persist($movie);
        }
        $manager->flush();
    }
}