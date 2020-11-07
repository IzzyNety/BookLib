<?php

namespace App\Controller;

use App\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AddController extends AbstractController
{
    /**
     * @Route("/add", name="add")
     */
    public function add(Request $request): Response
    {
        $book = new Book();

        $form = $this->createFormBuilder($book)
            ->add('name', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('year', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('author', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('save', SubmitType::class, array('label' => 'Creat',
            'attr' => array('class' => 'btn')))
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $book = $form->getData();
    
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($book);
            $entityManager->flush();
    
            return $this->redirectToRoute('list_books');
          }

        return $this->render('add/index.html.twig', array('form' => $form->createView()));
    }
}
