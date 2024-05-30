<?php

namespace App\Controller;

use App\Entity\Media;
use App\Entity\Usuario;
use App\Entity\VistoAnteriormente;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class VistoAnteriormenteController extends AbstractController
{
    public function visto_anteriormente(Request $request, SerializerInterface $serializer)
    {
        if ($request->isMethod('GET')) 
        {
            $id_user = $request->query->get('id_user');

            
            $media = $this->getDoctrine()->getRepository(Media::class)->findVistoAnteriormente($id_user);




            return new Response($serializer->serialize($media, 'json'));
        }

     
    }

    public function visto_anteriormente_create(Request $request, SerializerInterface $serializer)
    {
        if ($request->isMethod('POST')) 
        {
            $id_user = $request->query->get('id_user');
            $id_media = $request->query->get('id_media');
            
            $media = $this->getDoctrine()->getRepository(Media::class)->findOneBy(['id' => $id_media]);
            $usuario = $this->getDoctrine()->getRepository(Usuario::class)->findOneBy(['id' => $id_user]);
    
            $visto_anteriormente = new VistoAnteriormente();
            $visto_anteriormente->setIdMedia($media);
            $visto_anteriormente->setIdUser($usuario);
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($visto_anteriormente);
            $entityManager->flush();
    
            $media = $this->getDoctrine()->getRepository(Media::class)->findVistoAnteriormente($id_user);
    
            return new Response($serializer->serialize($media, 'json'));
        }
    }
}
