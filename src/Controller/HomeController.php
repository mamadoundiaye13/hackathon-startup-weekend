<?php

namespace App\Controller;

use App\Entity\HackathonRegistration;
use App\Entity\ProjectStudent;
use App\Form\HackathonRegistrationType;
use App\Repository\ProjectStudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
        $projet = new ProjectStudent();
        $projet->setCreateAt(new \DateTime());
        $projet->setUpdateAt(new \DateTime());
        $hackathonRegistration->setCreateAt(new \DateTime());
        $hackathonRegistration->setUpdateAt(new \DateTime());

        $form = $this->createForm(HackathonRegistrationType::class, $hackathonRegistration);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $hackathonRegistration = $form->getData();
            $projet->setAuthor($hackathonRegistration);

             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($hackathonRegistration);
             $entityManager->persist($projet);
             $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('create/new.html.twig', [
            'form' => $form->createView(),
        ]);

    }

    /**
     * @Route("/project/{id}", name="product_show")
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        $product = $this->getDoctrine()
            ->getRepository(ProjectStudent::class)
            ->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return new Response('Check out this great product: '.$product->getName());
    }

    /**
     * @Route("/projects", name="product_all")
     */
    public function findAllProjects()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository(ProjectStudent::class);
        $projects = $repository->findAll();

        return $this->render('all/all.html.twig', [
            'projects' => $projects,
        ]);
    }
}
