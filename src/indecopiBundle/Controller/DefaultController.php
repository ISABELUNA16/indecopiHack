<?php

namespace indecopiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('indecopiBundle:Default:index.html.twig');
    }

    public function principalUsuarioAction(){

    	return $this->render('indecopiBundle:Default:menu_usuario.html.twig');

    }

    public function nuevoReclamoAction(){

    	return $this->render('indecopiBundle:Default:nuevoReclamo.html.twig');
    }

    public function seguimientoAction(){
    	return $this->render('indecopiBundle:Default:seguimiento_usuario.html.twig');   
    }

    public function participarReclamoAction(){
    	return $this->render('indecopiBundle:Default:participar_reclamo.html.twig');   
    }

}
