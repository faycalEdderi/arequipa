<?php

namespace App\Controller;

use App\Entity\ExerciceDone;
use App\Form\ExerciceDoneType;
use App\Repository\ExerciceDoneRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExerciceDoneController extends AbstractController
{
    #[Route('/exercice/program/edit/{id}', name: 'exercice_program_edit')]
    #[Route('/exercice/program/add', name: 'exercice_program_add')]
    public function exercice_create(Request $request, EntityManagerInterface $entityManager, ExerciceDoneRepository $exerciceDoneRepository, int $id = null): Response
    {
        $entity = $id ? $exerciceDoneRepository->find($id) : new ExerciceDone();
        $type = ExerciceDoneType::class;

        $form = $this->createForm($type, $entity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($entity);
            $entityManager->flush();

            return $this->redirectToRoute('exercice_program_add');
        }

        return $this->render('exercice_done/add_program.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/exercice/program/show', name: 'exercice_program_show')]
    public function exercice_program_show(ExerciceDoneRepository $exerciceDoneRepository): Response
    {
        $programInfos = $exerciceDoneRepository->findAll();

        return $this->render('exercice_done/show_program.html.twig', [
            'programInfos' => $programInfos
        ]);
    }
}
