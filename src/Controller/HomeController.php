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

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="create")
     * @param Request $request
     * @return RedirectResponse|Response
     * @throws Exception
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

            return $this->redirectToRoute('projects_all');
        }

        return $this->render('create/new.html.twig', [
            'form' => $form->createView(),
        ]);

    }

    /**
     * @Route("/project/{id}", name="project_show")
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        $project = $this->getDoctrine()
            ->getRepository(ProjectStudent::class)
            ->find($id);

        if (!$project) {
            throw $this->createNotFoundException(
                'No project found for id '.$id
            );
        }

        return $this->render('edit/project_show.html.twig', [
            'project' => $project,
        ]);
    }

    /**
     * @Route("/projects", name="projects_all")
     */
    public function findAllProjects()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository(ProjectStudent::class);
        $projects = $repository->findAll();

        return $this->render('list/list.html.twig', [
            'projects' => $projects,
        ]);
    }
}
