<?php

namespace App\Controller;

use App\Entity\GeneroMedia;
use App\Entity\Media;
use App\Entity\Tipo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class NoticiasController extends AbstractController
{
    public function noticias(Request $request, SerializerInterface $serializer)
    {
        if ($request->isMethod('GET')) 
        {
            $tipo = $this->getDoctrine()
                ->getRepository(Tipo::class)
                ->findOneBy( ['id' => 3]);

            $noticias = $this->getDoctrine()->getRepository(Media::class)
                ->findBy(['tipo' => $tipo]);
            
            return new Response($serializer->serialize($noticias, 'json'));
        }
    }


    public function noticia_id(Request $request, SerializerInterface $serializer)
    {
        if ($request->isMethod('GET')) 
        {
            $id = $_GET['id'];

            $noticias = $this->getDoctrine()->getRepository(Media::class)
                ->findOneBy(['id' => $id]);

            return new Response($serializer->serialize($noticias, 'json', ['groups' => 'media']));
        }
    }


    public function noticias_genero(Request $request, SerializerInterface $serializer)
    {
        if ($request->isMethod('GET')) 
        {
           $id_g = $_GET['id_g'];
           $id_g2 = $_GET['id_g2'];
           $id_g3 = $_GET['id_g3'];

           $noticias = $this->getDoctrine()->getRepository(Media::class)->findNoticiaGenero($id_g, $id_g2, $id_g3);

            return new Response($serializer->serialize($noticias, 'json'));
        }
    }
}
