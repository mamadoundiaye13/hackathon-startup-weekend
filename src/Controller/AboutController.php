<?php

namespace App\Controller;

use App\Entity\HackathonRegistration;
use App\Entity\ProjectStudent;
use App\Form\HackathonRegistrationType;
use App\Repository\ProjectStudentRepository;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{

    /**
     * @Route("/about", name="about")
     */
    public function AboutAction()
    {

        return $this->render('about/about.html.twig', [
        ]);
    }

}
