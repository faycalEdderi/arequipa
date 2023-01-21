<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends AbstractController
{
    // affichage de la homepage
    public function index(Request $request): Response
    {


        return $this->render('homepage/index.html.twig', []);
    }
}
