<?php

namespace App\DataFixtures;

use App\Entity\CompetenceCombat\Element;
use App\Entity\CompetenceCombat\NiveauSort;
use App\Entity\CompetenceCombat\TypeDon;
use App\Entity\Stuff\Taille;
use App\Entity\Stuff\TypeArme;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //#region -------------------------- COMPETENCE DE GUERRE --------------------------
        //#region -------------------------- TYPE DE DON --------------------------
        $typeDon1 = new TypeDon();
        $typeDon1->setLibelle('Attaque avec une arme');
        $manager->persist($typeDon1);

        $typeDon2 = new TypeDon();
        $typeDon2->setLibelle('Attaque avec un signe');
        $manager->persist($typeDon2);

        $typeDon3 = new TypeDon();
        $typeDon3->setLibelle('Don des anciennes races');
        $manager->persist($typeDon3);
        //#endregion -------------------------- TYPE DE DON --------------------------

        //#region -------------------------- ELEMENT --------------------------
        $element1 = new Element();
        $element1->setLibelle('Mixte');
        $manager->persist($element1);

        $element2 = new Element();
        $element2->setLibelle('Air');
        $manager->persist($element2);

        $element3 = new Element();
        $element3->setLibelle('Eau');
        $manager->persist($element3);

        $element4 = new Element();
        $element4->setLibelle('Feu');
        $manager->persist($element4);

        $element5 = new Element();
        $element5->setLibelle('Terre');
        $manager->persist($element5);
        //#endregion -------------------------- ELEMENT --------------------------

        //#region -------------------------- NIVEAU DU SORT --------------------------
        $nivSort1 = new NiveauSort();
        $nivSort1->setLibelle('Sort de novice');
        $manager->persist($nivSort1);

        $nivSort2 = new NiveauSort();
        $nivSort2->setLibelle('Sort de compagnon');
        $manager->persist($nivSort2);

        $nivSort3 = new NiveauSort();
        $nivSort3->setLibelle('Sort de maitre');
        $manager->persist($nivSort3);
        //#endregion -------------------------- NIVEAU DU SORT --------------------------
        //#endregion -------------------------- COMPETENCE DE GUERRE --------------------------

        //#region -------------------------- STUFF --------------------------
        //#region -------------------------- TAILLE --------------------------
        $taille1 = new Taille();
        $taille1->setLibelle('Minuscule');
        $manager->persist($taille1);

        $taille2 = new Taille();
        $taille2->setLibelle('Petite');
        $manager->persist($taille2);

        $taille3 = new Taille();
        $taille3->setLibelle('Moyenne');
        $manager->persist($taille3);

        $taille4 = new Taille();
        $taille4->setLibelle('Grande');
        $manager->persist($taille4);
        //#endregion -------------------------- TAILLE --------------------------

        //#region -------------------------- TYPE --------------------------
        $typeArme5 = new TypeArme();
        $typeArme5->setLibelle('Épée');
        $manager->persist($typeArme5);

        $typeArme6 = new TypeArme();
        $typeArme6->setLibelle('Lame courte');
        $manager->persist($typeArme6);

        $typeArme7 = new TypeArme();
        $typeArme7->setLibelle('Hache');
        $manager->persist($typeArme7);

        $typeArme8 = new TypeArme();
        $typeArme8->setLibelle('Arme contondante');
        $manager->persist($typeArme8);

        $typeArme9 = new TypeArme();
        $typeArme9->setLibelle('Arme d\'hast');
        $manager->persist($typeArme9);

        $typeArme10 = new TypeArme();
        $typeArme10->setLibelle('Bâton');
        $manager->persist($typeArme10);

        $typeArme11 = new TypeArme();
        $typeArme11->setLibelle('Arme de jet');
        $manager->persist($typeArme11);

        $typeArme12 = new TypeArme();
        $typeArme12->setLibelle('Arc');
        $manager->persist($typeArme12);

        $typeArme13 = new TypeArme();
        $typeArme13->setLibelle('Arbalète');
        $manager->persist($typeArme13);

        $typeArme14 = new TypeArme();
        $typeArme14->setLibelle('Projectile');
        $manager->persist($typeArme14);
        //#endregion -------------------------- TYPE --------------------------
        //#endregion -------------------------- STUFF --------------------------

        $manager->flush();
    }
}
