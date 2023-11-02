<?php

namespace App\DataFixtures;

use App\Entity\CompetenceCombat\Element;
use App\Entity\CompetenceCombat\NiveauSort;
use App\Entity\CompetenceCombat\TypeDon;
use App\Entity\Stuff\CategorieArme;
use App\Entity\Stuff\CategorieFourniture;
use App\Entity\Stuff\EmplacementArmure;
use App\Entity\Stuff\EncombrementArmure;
use App\Entity\Stuff\Taille;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }
    public function load(ObjectManager $manager): void
    {
        //#region -------------------------- USER --------------------------
        $user1 = new User();
        $user1->setPseudo('Meya');
        $user1->setEmail('admin@admin.fr');
        $password1 = $this->hasher->hashPassword($user1, 'Pa$$w0rd');
        $user1->setPassword($password1);
        $user1->setRoles(["ROLE_ADMIN"]);
        $user1->setPhoto('photoProfil.jpg');
        $manager->persist($user1);

        $user2 = new User();
        $user2->setPseudo('Woogeek');
        $user2->setEmail('woogeek@gmail.com');
        $password2 = $this->hasher->hashPassword($user2, 'Pa$$w0rd');
        $user2->setPassword($password2);
        $manager->persist($user2);
        //#endregion -------------------------- USER --------------------------

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

        //#region -------------------------- CATEGORIE D'ARME --------------------------
        $typeArme5 = new CategorieArme();
        $typeArme5->setLibelle('Épées');
        $manager->persist($typeArme5);

        $typeArme6 = new CategorieArme();
        $typeArme6->setLibelle('Lames courte');
        $manager->persist($typeArme6);

        $typeArme7 = new CategorieArme();
        $typeArme7->setLibelle('Haches');
        $manager->persist($typeArme7);

        $typeArme8 = new CategorieArme();
        $typeArme8->setLibelle('Armes contondante');
        $manager->persist($typeArme8);

        $typeArme9 = new CategorieArme();
        $typeArme9->setLibelle('Armes d\'hast');
        $manager->persist($typeArme9);

        $typeArme10 = new CategorieArme();
        $typeArme10->setLibelle('Bâtons');
        $manager->persist($typeArme10);

        $typeArme11 = new CategorieArme();
        $typeArme11->setLibelle('Armes de jet');
        $manager->persist($typeArme11);

        $typeArme12 = new CategorieArme();
        $typeArme12->setLibelle('Arcs');
        $manager->persist($typeArme12);

        $typeArme13 = new CategorieArme();
        $typeArme13->setLibelle('Arbalètes');
        $manager->persist($typeArme13);

        $typeArme14 = new CategorieArme();
        $typeArme14->setLibelle('Projectiles');
        $manager->persist($typeArme14);
        //#endregion -------------------------- CATEGORIE D'ARME --------------------------

        //#region -------------------------- EMPLACEMENT D'ARMURE --------------------------
        $emplacementArmure1 = new EmplacementArmure();
        $emplacementArmure1->setLibelle('Tête');
        $manager->persist($emplacementArmure1);

        $emplacementArmure2 = new EmplacementArmure();
        $emplacementArmure2->setLibelle('Torse');
        $manager->persist($emplacementArmure2);

        $emplacementArmure3 = new EmplacementArmure();
        $emplacementArmure3->setLibelle('Jambe');
        $manager->persist($emplacementArmure3);

        $emplacementArmure4 = new EmplacementArmure();
        $emplacementArmure4->setLibelle('Bouclier');
        $manager->persist($emplacementArmure4);
        //#endregion -------------------------- EMPLACEMENT D'ARMURE --------------------------
        //#region -------------------------- ENCOMBREMENT D'ARMURE --------------------------
        $encombrementArmure1 = new EncombrementArmure();
        $encombrementArmure1->setLibelle('léger');
        $manager->persist($encombrementArmure1);

        $encombrementArmure2 = new EncombrementArmure();
        $encombrementArmure2->setLibelle('intermédiaire');
        $manager->persist($encombrementArmure2);

        $encombrementArmure3 = new EncombrementArmure();
        $encombrementArmure3->setLibelle('lourd');
        $manager->persist($encombrementArmure3);

        //#endregion -------------------------- ENCOMBREMENT D'ARMURE --------------------------
        //#region -------------------------- TYPE DE FOURNITURE --------------------------
        $categorieFourniture1 = new CategorieFourniture();
        $categorieFourniture1->setLibelle('Équipement général');
        $manager->persist($categorieFourniture1);

        $categorieFourniture2 = new CategorieFourniture();
        $categorieFourniture2->setLibelle('Contenant');
        $manager->persist($categorieFourniture2);

        $categorieFourniture3 = new CategorieFourniture();
        $categorieFourniture3->setLibelle('Nourriture & Boisson');
        $manager->persist($categorieFourniture3);

        $categorieFourniture4 = new CategorieFourniture();
        $categorieFourniture4->setLibelle('Vêtement');
        $manager->persist($categorieFourniture4);

        $categorieFourniture5 = new CategorieFourniture();
        $categorieFourniture5->setLibelle('Service');
        $manager->persist($categorieFourniture5);

        $categorieFourniture6 = new CategorieFourniture();
        $categorieFourniture6->setLibelle('Logement');
        $manager->persist($categorieFourniture6);

        //#endregion -------------------------- TYPE DE FOURNITURE --------------------------
        //#endregion -------------------------- STUFF --------------------------

        $manager->flush();
    }
}
