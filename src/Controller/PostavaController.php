<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Postava;
use App\Form\PostavaFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class PostavaController extends AbstractController
{
    #[Route('/', name: 'main')]
    public function vypisPostavy(EntityManagerInterface $em)
    {
        $data = $em->getRepository(Postava::class)->findAll();
        return $this->render('index.html.twig', [
            'list' => $data,
        ]);
    }

    #[Route('/vytvor', name: 'vytvor')]
    public function vytvorPostavu(Request $request, EntityManagerInterface $em): Response
    {
        $postava = new Postava();

        $formular = $this->createForm(PostavaFormType::class, $postava);

        $formular->handleRequest($request);
        if ($formular->isSubmitted() && $formular->isValid()) {
            $em->persist($postava);
            $em->flush();

            $this->addFlash('success', 'Úspěšně vloženo do databáze!');
            return $this->redirectToRoute('main');
        }
        return $this->render('vytvor.html.twig', [
            'postava_form' => $formular->createView()
        ]);
    }

    #[Route('/uprav/{id}', name: 'uprav')]
    public function upravPostavu(Request $request, EntityManagerInterface $em, $id): Response
    {
        $postava = $em->getRepository(Postava::class)->find($id);
        $formular = $this->createForm(PostavaFormType::class, $postava);

        $formular->handleRequest($request);
        if ($formular->isSubmitted() && $formular->isValid()) {
            $em->persist($postava);
            $em->flush();

            $this->addFlash('success', 'Úspěšně upraveno v databázi!');
            return $this->redirectToRoute('main');
        }
        return $this->render('uprav.html.twig', [
            'postava_form' => $formular->createView()
        ]);
    }

    #[Route('/smaz/{id}', name: 'smaz')]
    public function smazPostavu(EntityManagerInterface $em, $id): Response
    {
        $postava = $em->getRepository(Postava::class)->find($id);
        $em->remove($postava);
        $em->flush();

        $this->addFlash('success','Úspěšně smazáno!');
        return $this->redirectToRoute('main');
    }
}
