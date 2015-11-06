<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    /**
     * @Route("/users/", name="listAllUser")
     */
    public function listAllUserAction()
    {
        $users = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();

        return $this->render('user/users.html.twig', array(
            'users' => $users
        ));
    }

    /**
     * @Route("/users-lazy/", name="listAllUserLazy")
     */
    public function listAllUserLazyAction()
    {
        $users = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();

        return $this->render('user/users-lazy.html.twig', array(
            'users' => $users
        ));
    }
}