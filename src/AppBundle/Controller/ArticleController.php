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
     * @Route("/article-{id}", name="listArticleExtraLazy")
     */
    public function listArticleExtraLazyAction(Article $article)
    {
        $article = $this->getDoctrine()->getRepository('AppBundle:Article')->find(array('id' => $article->getId()));

        $collection = $article->getComments(); // no hace nada

        $totalItems = $collection->count(); //provoca una consulta COUNT(*) y no carga la colección
        $totalItems2 = $collection->count(); //provoca una consulta COUNT(*) y no carga la colección

        //el foreach provoca una consulta y SI carga la colección, a partir de la carga, doctrine no necesita realizar ninguna consulta adicional.
        foreach($collection as $comment) {
            $comments[] = $comment;
         }

        $totalItems3 = $collection->count(); //No genera una nueva consulta, porque cargó la colección

        return $this->render('articles/article.html.twig', array(
            'article' => $article,
            'totalComment' => $totalItems
        ));
    }
}