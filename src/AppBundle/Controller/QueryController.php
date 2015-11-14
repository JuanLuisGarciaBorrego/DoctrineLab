<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/query")
 */
class QueryController extends Controller
{
    /**
     * @Route("/", name="query")
     */
    public function indexAction()
    {
        $id = 203;
        //Find by id , return user object
        $user0 = $this->getDoctrine()->getRepository('AppBundle:User')->find($id);
        dump($user0);

        //find all users that are Name1 and testname1@dev.com by simple conditions, return array objects
        $user1 = $this->getDoctrine()->getRepository('AppBundle:User')->findBy(
            array('name' => 'Name1', 'email' => 'testname1@dev.com')
        );
        dump($user1);

        //a single object by email / return user object
        $user2 = $this->getDoctrine()->getRepository('AppBundle:User')->findOneBy(
            array('email' => 'testname4@dev.com')
        );
        dump($user2);

        //associations throught repository / return user object
        $infoUser = $this->getDoctrine()->getRepository('AppBundle:InfoUser')->find(203);
        $userAssociation = $this->getDoctrine()->getRepository('AppBundle:User')->findOneBy(
            array('infoUser' => $infoUser)
        );
        dump($userAssociation);

        return $this->render('query/query.html.twig', array(
            'user0' => $user0,
            'user1' => $user1,
            'user2' => $user2,
            'userAssociation' => $userAssociation
        ));
    }
}