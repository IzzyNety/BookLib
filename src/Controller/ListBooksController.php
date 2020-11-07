<?php

namespace App\Controller;

use App\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListBooksController extends AbstractController
{
    /**
     * @Route("/", name="list_books")
     */
    public function index(): Response
    {
        $books = $this->getDoctrine()->getRepository(Book::class)->findAll();

        return $this->render('list_books/index.html.twig', 
        array('books' => $books),
        );
    }
}
