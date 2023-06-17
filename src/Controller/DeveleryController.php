<?php

namespace App\Controller;

use App\Entity\Develery;
use App\Form\DeveleryFormType;
use App\Repository\DeveleryRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use JetBrains\PhpStorm\Deprecated;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeveleryController extends AbstractController
{

    private $em;
    private $develeryRepository;
    public function __construct(DeveleryRepository $develeryRepository, EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->develeryRepository = $develeryRepository;
    }

    #[Route('', name: 'develery')]
    public function create(Request $request): Response
    {
        $develery = new Develery();
        $form = $this->createForm(DeveleryFormType::class, $develery);

        $form -> handleRequest($request);
        if ($form -> isSubmitted() && $form-> isValid())
        {
            $newDevelery = $form->getData();
            $this->em->persist($newDevelery);
            $this->em->flush();
            return $this->redirectToRoute('success');
        }   

        return $this->render('delevery.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/success', name: 'success')]
    public function success(Request $request): Response
    {
        return $this->render('success.html.twig');
    }
}
   
