<?php

namespace App\DataFixtures;

use App\Entity\Contacts;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContactFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
      // fixture for loading contact data
        $limit = 50;
        for ($i = 0; $i<=$limit; $i++)
        {
            $contact = new Contacts();
            $contact->setName('test00'.$i);
            $contact->setPhone('000000'.$i);
            $contact->setCity('testcity'.$i);
            $contact->setEmail('akhil+'.$i.'@gmail.com');

            $manager->persist($contact);

        }


        $manager->flush();
    }
}
