<?php
namespace App\Controller;

use App\Entity\Friend;
use App\Form\Type\FriendType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FriendController extends AbstractController
{

    public function add_friend(Request $request, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $friend = new Friend();
        $friend->setCars(['',]);

        $form = $this->createForm(FriendType::class, $friend);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $friend = $form->getData();
            $entityManager->persist($friend);
            $entityManager->flush();

            return $this->redirectToRoute('added_friend');

        }

        return $this->renderForm('add_friend.html.twig',[
            'form' => $form,
        ]);
    }

    public function success():Response {

        return $this->render('success.html.twig');
    }

}