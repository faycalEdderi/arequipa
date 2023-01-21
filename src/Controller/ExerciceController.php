<?php

namespace App\Controller;

use App\Entity\Exercice;
use App\Form\ExerciceType;
use App\Repository\ExerciceRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExerciceController extends AbstractController
{
    #[Route('/exercice/create', name: 'exercice_create')]
    public function exercice_create(Request $request, EntityManagerInterface $entityManager, ExerciceRepository $exerciceRepository, int $id = null): Response
    {
        $entity = $id ? $exerciceRepository->find($id) : new Exercice();
        $type = ExerciceType::class;

        $form = $this->createForm($type, $entity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($entity);
            $entityManager->flush();

            return $this->redirectToRoute('exercice_create');
        }

        return $this->render('exercices/add_exercice.html.twig', [
            'form' => $form
        ]);
    }
}
