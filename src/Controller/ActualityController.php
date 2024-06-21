<?php

namespace App\Controller;

use App\Entity\Actuality;
use App\Form\ActualityType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ActualityRepository;

#[Route('/actuality')]
class ActualityController extends AbstractController
{
    #[Route('/', name: 'actuality', methods: ['GET'])]
    public function index(ActualityRepository $actualityRepository): Response
    {
        return $this->render('actuality/index.html.twig', [
            'actualities' => $actualityRepository->findAll(),
        ]);
    }
}
