<?php

namespace App\Controller;

use App\Entity\Game;
use App\Form\GameType;
use App\Repository\GameRepository;
use App\Repository\OffreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GameController extends AbstractController
{
    public function index(GameRepository $game): Response
    {       


        return $this->render('game/index.html.twig', [
            'controller_name' => 'GameController',
            'games' => $game->FindListGame(),

        ]);
    }

    public function new(Request $req,EntityManagerInterface $manager):Response{
        $game = new Game();
        $formGame = $this->createForm(GameType::class, $game);

        
        $formGame->handleRequest($req);
        if ($formGame->isSubmitted() && $formGame->isValid()) {
            
            $manager->persist($formGame->getData());
            $manager->flush();
            return $this->redirectToRoute('GameBuy.Home');
        }

        return $this->render('game/newGame.html.twig',[
            'form' => $formGame->createView(),
        ]);
    }



    public function edit(Game $game,Request $req,EntityManagerInterface $manager):Response
    {
        $formGame = $this->createForm(GameType::class, $game);
        
        
        $formGame->handleRequest($req);
        if ($formGame->isSubmitted() && $formGame->isValid()) {
            
            $manager->persist($formGame->getData());
            $manager->flush();
            return $this->redirectToRoute('GameBuy.Home');
        }

        return $this->render('Admin/adminEditGame.html.twig',[
            'Admin_form_GameEdition' => $formGame->createView(),
        ]);
    }

    public function delete(EntityManagerInterface $manager, Game $game):Response
    {
        $manager->remove($game);
        $manager->flush();

        return $this->redirectToRoute('GameBuy.Home');
    }
    
}
