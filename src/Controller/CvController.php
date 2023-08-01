<?php

namespace App\Controller;

use App\Entity\Experience;
use App\Entity\Hobby;
use App\Entity\Project;
use App\Entity\Techno;
use App\Entity\Trainig;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CvController extends AbstractController
{
    #[Route('/cv', name: 'app_cv')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $Experience = $entityManager->getRepository(Experience::class)->findAll();
        $Project = $entityManager->getRepository(Project::class)->findAll();
        $Techno = $entityManager->getRepository(Techno::class)->findAll();
        $Trainig = $entityManager->getRepository(Trainig::class)->findAll();
        $Hobby = $entityManager->getRepository(Hobby::class)->findAll();
        return $this->render('cv/index.html.twig', [
            'controller_name' => 'CvController',
            "Experience" => $Experience,
            "Techno"   => $Techno,
            "Trainig" => $Trainig,
            "Hobby" => $Hobby,
            "Project" => $Project,
        ]);
    }
}
