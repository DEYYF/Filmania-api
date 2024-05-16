<?php

namespace App\Controller;

use App\Entity\Genero;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class GenerosController extends AbstractController
{
    public function generos(Request $request, SerializerInterface $serializer)
    {
        if ($request->isMethod('GET')) 
        {
            $generos = $this->getDoctrine()->getRepository(Genero::class)
                ->findAll();
            
            return new Response($serializer->serialize($generos, 'json'));
        }
    }

}
