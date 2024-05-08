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

        $form = $this->createForm(GameType::class, $game);
        $form->handleRequest($req);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $manager->persist($form->getData());
            $manager->flush();
            return $this->redirectToRoute('GameBuy.Home');
        }

        return $this->render('game/newGame.html.twig',[
            'form' => $form->createView(),
        ]);
    }




    public function edit(Game $game,Request $req,EntityManagerInterface $manager):Response{

        $form = $this->createForm(GameType::class, $game);
        $form->handleRequest($req);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $manager->persist($form->getData());
            $manager->flush();
            return $this->redirectToRoute('GameBuy.Home');
        }

        return $this->render('game/editGame.html.twig',[
            'form' => $form->createView(),
        ]);
    }

    public function delete(EntityManagerInterface $manager, Game $game):Response
    {
        $manager->remove($game);
        $manager->flush();

        return $this->redirectToRoute('GameBuy.Home');
    }
    
}
