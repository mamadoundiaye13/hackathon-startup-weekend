<?php

namespace App\Controller;

use App\Entity\HackathonRegistration;
use App\Form\HackathonRegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/create", name="create")
     */
    public function newHackathonAction(Request $request)
    {
        $hackathonRegistration = new HackathonRegistration();
        $hackathonRegistration->setCreateAt(new \DateTime());
        $hackathonRegistration->setUpdateAt(new \DateTime());

        $form = $this->createForm(HackathonRegistrationType::class, $hackathonRegistration);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$hackathonRegistration` variable has also been updated
            $hackathonRegistration = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($hackathonRegistration);
             $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('create/new.html.twig', [
            'form' => $form->createView(),
        ]);

    }
}
