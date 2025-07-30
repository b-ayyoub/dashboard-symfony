<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AppController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        // $this->getUser  =>
        // $this->is_granted("ROLE_ADMIN")
        return $this->render('app/index.html.twig');
    }
}

