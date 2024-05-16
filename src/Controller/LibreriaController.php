<?php

namespace App\Controller;

use App\Entity\Libreria;
use App\Entity\LibreriaMedia;
use App\Entity\Media;
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
            $id_user = $_GET['id_user'];

            $libreria = $this->getDoctrine()->getRepository(Libreria::class)
            ->findBy(['idUsuario' => $id_user]);

            return new Response($serializer->serialize($libreria, 'json', ['groups' => 'libreria']));
        }
    }

    public function contenido_libreria(Request $request, SerializerInterface $serializer)
    {
        if ($request->isMethod('GET')) 
        {
            $id_libreria = $_GET['id_libreria'];

            $contenido = $this->getDoctrine()->getRepository(Libreria::class)
            ->findContenidoLibreria($id_libreria);

            return new Response($serializer->serialize($contenido, 'json'));
        }
    }

    public function añadir_libreria_media(Request $request, SerializerInterface $serializer)
    {
        if ($request->isMethod('POST')) 
        {
            $id_media = $_POST['id_media'];
            $id_libreria = $_POST['id_libreria'];
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
}
