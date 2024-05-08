<?php

namespace App\Controller;

use App\Entity\Game;
use App\Entity\Offre;
use App\Form\OffreType;
use Doctrine\ORM\Mapping\Id;
use App\Repository\OffreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OffreController extends AbstractController
{
    public function index(EntityManagerInterface $emi): Response
    {   
        
        return $this->render('offre/indexOffre.html.twig', [
            'offres' => $emi->getRepository(Offre::class)->findAll(),
        ]);
    }

    
    public function show(OffreRepository $offreRepository, int $id):Response{
        $offre= $offreRepository->find($id);

        return $this->render('showOne.html.twig',[
            "finds" => $offre

        ]);
    }
    public function new(Request $req, EntityManagerInterface $emi){
        $offre = new Offre();
        $form = $this->createForm(OffreType::class, $offre);
        
        
        $form->handleRequest($req);
        if ($form->isSubmitted() && $form->isValid()) {
            // dd($form->getData());
            $emi->persist($form->getData());
            $emi->flush();
            return $this->redirectToRoute('GameBuy.Offre.ShowAll');
        }

        return $this->render('offre/newOffre.html.twig',[
            'Form' => $form->createView(),
        ]);
        }


    public function edit(){

    }

    public function delete(Offre $offre, EntityManagerInterface $entityManager): Response
    {
           $entityManager->remove($offre);
            $entityManager->flush();

        return $this->redirectToRoute('GameBuy.Offre.ShowAll', [], Response::HTTP_SEE_OTHER);
    }
}
