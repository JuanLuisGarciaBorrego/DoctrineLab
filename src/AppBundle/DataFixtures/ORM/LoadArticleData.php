<?php
/**
 * Created by PhpStorm.
 * User: juanluis
 * Date: 8/11/15
 * Time: 11:35
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Article;
use AppBundle\Entity\Comment;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadArticleData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for($i=0; $i<40; $i++) {

            $article = new Article();
            $article->setTitle('News'.$i);
            $article->setContent('This is default content');

            $commentA = new Comment();
            $commentA->setAuthor('Author');
            $commentA->setContent('Comment .... default');

            $manager->persist($commentA);
            $article->addComment($commentA);

            $commentB = new Comment();
            $commentB->setAuthor('Author'.$i);
            $commentB->setContent('Comment .... default');

            $manager->persist($commentB);
            $article->addComment($commentB);

            $manager->persist($article);
        }

        $manager->flush();
    }
}