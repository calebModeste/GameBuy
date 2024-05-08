<?php

namespace App\DataFixtures;

use App\Entity\Game;
use App\Entity\Offre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $descrip =[
        "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci fugiat excepturi nam quae fuga alias quisquam accusamus sunt, suscipit repellendus eveniet quasi consectetur? Eaque voluptas velit odio, accusamus ipsam error.",
        "Ratione quaerat harum aspernatur quia perspiciatis est cupiditate recusandae sint deleniti commodi consequuntur magni voluptas ipsam saepe placeat velit possimus reiciendis totam a, sunt nisi non voluptatum. Earum, quia velit.",
        "Eaque ipsum unde officia et. Quam neque aut deserunt? Ipsam et, voluptate unde repellat modi repudiandae nisi distinctio porro, eaque nam dolores recusandae maxime veniam tempore! Accusamus atque dicta fugit!",
        "Aut facere ipsam harum debitis quidem. Ipsa non earum molestias animi, est sed deleniti repudiandae odit iure et, quidem ad, ipsum delectus voluptatem fugiat impedit commodi. Voluptatum aliquid non molestias.",
        "Incidunt, accusamus. Voluptatum dolore deleniti veniam aspernatur nisi consequuntur expedita suscipit quia! Quaerat est aut itaque veniam possimus. Veniam molestias sunt deleniti cumque. Quod, possimus vel voluptatum officiis sequi amet.",
        "Illum, ea quae. Reiciendis quisquam ab a quia, architecto incidunt tempora exercitationem sunt cum harum qui accusamus et enim mollitia autem reprehenderit nam hic, ullam error esse consequuntur facere deserunt!"];
        for ($i=0; $i <50 ; $i++) { 
            $offre =new Offre();
            
            $offre->setPrice(random_int(10,100));
            $offre->setLink("lien_n".$i);
            
            $manager->persist($offre);
        }
        
        for ($i=0; $i <25 ; $i++) { 
            $game = new Game();
            $game->setName("game_".$i);
            $game->setDescript($descrip[random_int(0,5)]);
            
            $manager->persist($game);
        }
        $manager->flush();
    }
}
