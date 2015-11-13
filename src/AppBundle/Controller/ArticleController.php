<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
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

    /**
     * @Route("/article-{id}", name="listArticle")
     */
    public function listArticleAction(Article $article)
    {
        $article = $this->getDoctrine()->getRepository('AppBundle:Article')->find(array('id' => $article->getId()));

        $collection = $article->getComments(); // no hace nada

        $totalItems = $collection->count(); //Proboca una consulta COUNT(*)

        return $this->render('articles/article.html.twig', array(
            'article' => $article,
            'totalComment' => $totalItems
        ));
    }
}