<?php

namespace App\Controller;

use App\Entity\Libreria;
use App\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Serializer\SerializerInterface;

class UsuarioController extends AbstractController
{
    
    public function log(Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {
        if ($request->isMethod('POST')) {
            $bodydata = $request->getContent();
            $usuario_new = $serializer->deserialize($bodydata, Usuario::class, 'json');

            $username = $usuario_new->getUsuarios();

            $usuario = $entityManager->getRepository(Usuario::class)->findOneBy(['usuarios' => $username]);

            if ($usuario && ($usuario_new->getPassword() == decodeData($usuario->getPassword()))) {
                $id = $usuario->getId();
                return new Response(json_encode(['id' => $id]), Response::HTTP_OK, ['Content-Type' => 'application/json']);
            } else {
                return new Response(json_encode(['error' => 'Credenciales inválidas']), Response::HTTP_UNAUTHORIZED, ['Content-Type' => 'application/json']);
            }
        }

        return new Response(json_encode(['error' => 'Método no permitido']), Response::HTTP_METHOD_NOT_ALLOWED, ['Content-Type' => 'application/json']);
    }

    public function new_user(Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {
        if ($request->isMethod('POST')) {
            $bodydata = $request->getContent();
            $usuario_new = $serializer->deserialize($bodydata, Usuario::class, 'json');

            $plainPassword = $usuario_new->getPassword();
            $hash = encodeData($plainPassword);
            $usuario_new->setPassword($hash);

            $entityManager->persist($usuario_new);
            

            
            
            $libreria = new Libreria();
            $libreria->setIdUsuario($usuario_new);
            $libreria->setTitulo('ver mas tarde');
            $libreria->setImagen('https://cdn.pixabay.com/photo/2019/07/03/09/43/clock-4314041_960_720.jpg');

            $entityManager->persist($libreria);

            $libreria2 = new Libreria();
            $libreria2->setIdUsuario($usuario_new);
            $libreria2->setTitulo('Favoritos');
            $libreria2->setImagen('https://t3.ftcdn.net/jpg/01/21/64/88/360_F_121648819_ZQ0tZ6tjLzxim1SG7CQ86raBw4sglCzB.jpg');

            $entityManager->persist($libreria2);
            $entityManager->flush();

            return new Response($serializer->serialize($usuario_new, 'json', ['groups' => 'usuario']), Response::HTTP_CREATED, ['Content-Type' => 'application/json']);
        }

        return new Response(json_encode(['error' => 'Método no permitido']), Response::HTTP_METHOD_NOT_ALLOWED, ['Content-Type' => 'application/json']);
    }

    public function user_id(Request $request, SerializerInterface $serializer)
    {
        if ($request->isMethod('GET')) 
        {
            $id = $request->query->get('id');
            $usuario = $this->getDoctrine()
                ->getRepository(Usuario::class)
                ->findOneBy(['id' => $id]);
            
                $usuario_password_encrypted = $usuario->getPassword();
                $usuario->setPassword(decodeData($usuario_password_encrypted));

            
            return new Response($serializer->serialize($usuario, 'json', ['groups' => 'usuario']));
        }

        if ($request->isMethod('DELETE')) {
           
            $id = $request->query->get('id');
            $usuario = $this->getDoctrine()
                ->getRepository(Usuario::class)
                ->findOneBy(['id' => $id]);
            
            $usuario_delete = clone $usuario;
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($usuario);
            $entityManager->flush();

            return new Response($serializer->serialize($usuario_delete, 'json', ['groups' => 'usuario']));
        }

    }

    public function user_config(Request $request, SerializerInterface $serializer)
    {
        if ($request->isMethod('POST')) 
        {
            $bodydata = $request->getContent();
            $usuario_new = $serializer->deserialize(
                $bodydata, 
                Usuario::class, 
                'json');

            $id = $request->get('id_usuario');
            $usuario = $this->getDoctrine()
                ->getRepository(Usuario::class)
                ->findOneBy(['id' => $id]);

            $usuario->setUsuarios($usuario_new->getUsuarios());
            $usuario->setEmail($usuario_new->getEmail());
            $usuario->setPais($usuario_new->getPais());
            $usuario->setGenero($usuario_new->getGenero());
            $usuario->setPassword(encodeData($usuario_new->getPassword()));
            $usuario->setImagen($usuario_new->getImagen());

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($usuario);
            $entityManager->flush();

            return new Response($serializer->serialize($usuario, 'json', ['groups' => 'usuario']));
        }
    }


}


// Codificar
function encodeData($data) {
    return base64_encode($data);
}

// Decodificar
function decodeData($encodedData) {
    return base64_decode($encodedData);
}

