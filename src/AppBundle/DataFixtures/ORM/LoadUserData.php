<?php
/**
 * Created by PhpStorm.
 * User: juanluis
 * Date: 6/11/15
 * Time: 16:20
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\InfoUser;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for($i=0; $i<100; $i++) {

            $user = new User();
            $infoUser = new InfoUser();

            $user->setName('Name'.$i);
            $user->setEmail('testname'.$i.'@dev.com');

            $datetimeNow = new \DateTime();

            $infoUser->setBirthdate($datetimeNow);
            $infoUser->setDescription('Esta es una descripcion personal de Name'.$i.'.');

            $user->setInfoUser($infoUser);

            $manager->persist($user);
            $manager->persist($infoUser);
        }

        $manager->flush();
    }
}