<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Postava;
use App\Form\PostavaFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;

class PostavaController extends AbstractController
{
    #[Route('/')]

    public function cislo(Environment $twig, Request $request, EntityManagerInterface $em): Response
    {
        $postava = new Postava();

        $formular = $this->createForm(PostavaFormType::class, $postava);

        $formular->handleRequest($request);
        if ($formular->isSubmitted() && $formular->isValid()) {
            $em->persist($postava);
            $em->flush();

            return new Response('Postava'. $postava->getJmeno() . $postava->getPrijmeni(). 'Byla vytvořena a poslána do databáze');
        }

        return new Response($twig->render('cislicko.html.twig', [
            'postava_form' => $formular->createView()
        ]));
    }
}
