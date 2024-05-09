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
        $formOffre = $this->createForm(OffreType::class, $offre);
        
        
        $formOffre->handleRequest($req);
        if ($formOffre->isSubmitted() && $formOffre->isValid()) {
            // dd($form->getData());
            $emi->persist($formOffre->getData());
            $emi->flush();
            return $this->redirectToRoute('GameBuy.Offre.ShowAll');
        }

        return $this->render('offre/newOffre.html.twig',[
            'Form' => $formOffre->createView(),
        ]);
        }


    public function edit(Offre $offre,Request $req, EntityManagerInterface $manager){
        $formOffre = $this->createForm(OffreType::class, $offre);


        $formOffre->handleRequest($req);
        if ($formOffre->isSubmitted() && $formOffre->isValid()) {

            $manager->persist($formOffre->getData());
            $manager->flush();
            return $this->redirectToRoute('GameBuy.Offre.ShowAll');
        }

        return $this->render('Admin/adminEditOffre.html.twig', [
            'Admin_form_OffreEdition' => $formOffre->createView(),
        ]);
    }

    public function delete(Offre $offre, EntityManagerInterface $entityManager): Response
    {
           $entityManager->remove($offre);
            $entityManager->flush();

        return $this->redirectToRoute('GameBuy.Offre.ShowAll', [], Response::HTTP_SEE_OTHER);
    }
}
