<?php

namespace IndecopiUsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use IndecopiUsuarioBundle\Entity\Usuario;
use Symfony\Component\HttpFoundation\JsonResponse; 

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('IndecopiUsuarioBundle:Default:index.html.twig');
    }


    /**
     * @Route("/registerUser")
     * @Method("POST")
     */

    public function registerUserAction(Request $request)
    {
        $jsonContent=null;

        if($request->isXmlHttpRequest())
        {
            $dni = $request->request->get('dni');
            $nombre = $request->request->get('nombre');
            $apellidoPaterno = $request->request->get('apellidoPaterno');
            $apellidoMaterno = $request->request->get('apellidoMaterno');
            $plainpassword = $request->request->get('plainpassword');
            $correo = $request->request->get('correo');
            $ubigeo = $request->request->get("ubigeo");
            $telefono = $request->request->get("telefono");
            $fechaNacimiento = $request->request->get("fechaNacimiento");
            $telefono = $request->request->get("telefono");
            $username = $request->request->get("username");
            $password = $request->request->get("password");
            $plainpassword = $request->request->get("plainpasswordReg");

            if( $password == $plainpassword ){

                $user = new Usuario();
                $user->setDni($dni);
                $user->setNombre($nombre);
                $user->setApellidoPaterno($apellidoPaterno);
                $user->setApellidoMaterno($apellidoMaterno);
                $user->setEmail($correo);
                $user->setUbigeo($ubigeo);
                $user->setTelefono($telefono);
                $user->setFechaNacimiento($fechaNacimiento);

                $user->setPlainPassword($plainpassword);

                $user->setUsername($username);

                $password = $this->get('security.password_encoder')->encodePassword($user, $user->getPlainPassword());
                $user->setPassword($password);

                $roles = ["ROLE_USER"];
                                       
                $user->setRoles($roles);  

                // 4) save the User!
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
                return new JsonResponse("Datos Correctos");
            }else{
                return new JsonResponse("Invalid Password");
            }
        }
     
    }

    /**
     * @Route("/login",name="prueba_login")
     */
    public function loginAction(Request $request){

            // get the login error if there is one
	    $authenticationUtils = $this->get('security.authentication_utils');

	    // get the login error if there is one
	    $error = $authenticationUtils->getLastAuthenticationError();

	    // last username entered by the user
	    $lastUsername = $authenticationUtils->getLastUsername();

	    return $this->render('IndecopiUsuarioBundle:Usuario:login.html.twig', array(
	        'last_username' => $lastUsername,
	        'error'         => $error,
	    ));

    }
}
