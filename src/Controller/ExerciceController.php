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
    #[Route('/exercice/create/{id}', name: 'exercice_edit')]
    #[Route('/exercice/create', name: 'exercice_create')]
    public function exercice_create(Request $request, EntityManagerInterface $entityManager, ExerciceRepository $exerciceRepository, int $id = null): Response
    {
        // check if the user is connected
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();

        $entity = $id ? $exerciceRepository->find($id) : new Exercice();
        $type = ExerciceType::class;

        $form = $this->createForm($type, $entity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($entity);
            $entity->setUser($user);
            $entityManager->flush();

            return $this->redirectToRoute('exercice_create');
        }

        return $this->render('exercices/add_exercice.html.twig', [
            'form' => $form
        ]);
    }
}
