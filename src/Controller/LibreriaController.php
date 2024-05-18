<?php

namespace App\Controller;

use App\Entity\Libreria;
use App\Entity\LibreriaMedia;
use App\Entity\Media;
use App\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class LibreriaController extends AbstractController
{
    public function libreria_user(Request $request, SerializerInterface $serializer)
    {
        if ($request->isMethod('GET')) 
        {
            $id_user = $request->query->get('id_user');

            $libreria = $this->getDoctrine()->getRepository(Libreria::class)
            ->findBy(['idUsuario' => $id_user]);

            return new Response($serializer->serialize($libreria, 'json', ['groups' => 'libreria']));
        }
    }

    public function contenido_libreria(Request $request, SerializerInterface $serializer)
    {
        if ($request->isMethod('GET')) 
        {
            $id_libreria = $request->query->get('id_libreria');

            $contenido = $this->getDoctrine()->getRepository(Libreria::class)
            ->findContenidoLibreria($id_libreria);

            return new Response($serializer->serialize($contenido, 'json'));
        }
    }

    public function añadir_libreria_media(Request $request, SerializerInterface $serializer)
    {
        if ($request->isMethod('POST')) 
        {
            $id_libreria = $request->query->get('id_lib');
            $id_media = $request->query->get('id_med');
            
            $media = $this->getDoctrine()->getRepository(Media::class)->findOneBy(['id' => $id_media]);
            $libreria = $this->getDoctrine()->getRepository(Libreria::class)->findOneBy(['id' => $id_libreria]);
    
            $libreria_media = new LibreriaMedia();
            $libreria_media->setIdLibreria($libreria);
            $libreria_media->setIdMedia($media);
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($libreria_media);
            $entityManager->flush();
    
            $contenido = $this->getDoctrine()->getRepository(Libreria::class)->findContenidoLibreria($id_libreria);
    
            return new Response($serializer->serialize($contenido, 'json'));
            
        }

    }

    public function Crear_libreria(Request $request, SerializerInterface $serializer)
    {
        if ($request->isMethod('POST')) 
        {
            $id = $request->get('id_usuario');

            $usuario = $this->getDoctrine()->getRepository(Usuario::class)->findOneBy(['id' => $id]);

            $bodydata = $request->getContent();
            $libreria_new = $serializer->deserialize(
                $bodydata, 
                Libreria::class, 
                'json');
            
            $libreria_new->setIdUsuario($usuario);
            
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($libreria_new);
            $entityManager->flush();
    
    
            return new Response($serializer->serialize($libreria_new, 'json', ['groups' => 'libreria']));
        }
    }
}
