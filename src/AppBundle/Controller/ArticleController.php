<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{
    /**
     * @Route("/articles/", name="listAllArticles")
     */
    public function listAllArticlesAction()
    {
        $articles = $this->getDoctrine()->getRepository('AppBundle:Article')->findAll();

        return $this->render('articles/articles.html.twig', array(
            'articles' => $articles
        ));
    }
}