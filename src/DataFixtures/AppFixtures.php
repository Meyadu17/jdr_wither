<?php

namespace App\DataFixtures;

use App\Entity\CompetenceCombat\Don;
use App\Entity\CompetenceCombat\Element;
use App\Entity\CompetenceCombat\NiveauSigne;
use App\Entity\CompetenceCombat\NiveauSort;
use App\Entity\CompetenceCombat\Signe;
use App\Entity\CompetenceCombat\Sort;
use App\Entity\CompetenceCombat\TypeDon;
use App\Entity\Stuff\Arme;
use App\Entity\Stuff\Armure;
use App\Entity\Stuff\CategorieArme;
use App\Entity\Stuff\CategorieFourniture;
use App\Entity\Stuff\EmplacementArmure;
use App\Entity\Stuff\EncombrementArmure;
use App\Entity\Stuff\EquipementGeneral;
use App\Entity\Stuff\Ingredient;
use App\Entity\Stuff\Outil;
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

        //#region -------------------------- COMPETENCE DE GUERRE (ART DU COMBAT) --------------------------
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
        $nivSort1->setLibelle('Sorts de novice');
        $manager->persist($nivSort1);

        $nivSort2 = new NiveauSort();
        $nivSort2->setLibelle('Sorts de compagnon');
        $manager->persist($nivSort2);

        $nivSort3 = new NiveauSort();
        $nivSort3->setLibelle('Sorts de maitre');
        $manager->persist($nivSort3);
        //#endregion -------------------------- NIVEAU DU SORT --------------------------

        //#region -------------------------- NIVEAU DU SIGNE --------------------------
        $nivSigne1 = new NiveauSigne();
        $nivSigne1->setLibelle('Signes de base');
        $manager->persist($nivSigne1);

        $nivSigne2 = new NiveauSigne();
        $nivSigne2->setLibelle('Signes alternatif');
        $manager->persist($nivSigne2);
        //#endregion -------------------------- NIVEAU DU SIGNE --------------------------

        //#region -------------------------- DON (ART DU GUERRIER) --------------------------
        $don1 = new Don();
        $don1->setNom('Entaille');
        $don1->setType($typeDon1);
        $don1->setInitiative(1);
        $don1->setEffet("Le personnage réalise une attaque avec +2 Bonus Attaques et Dégâts.");
        $manager->persist($don1);

        $don2 = new Don();
        $don2->setNom('Éventrement');
        $don2->setType($typeDon1);
        $don2->setInitiative(2);
        $don2->setEffet("Le personnage réalise une attaque avec +6 Bonus Attaques et Dégâts.");
        $don2->setPresRequis('Entaille');
        $manager->persist($don2);

        $don3 = new Don();
        $don3->setNom('Estoc');
        $don3->setType($typeDon1);
        $don3->setInitiative(1);
        $don3->setEffet("Le personnage réalise une attaque avec un Bonus Dégâts de Force égal au double de la valeur d'Habileté du personnage.");
        $manager->persist($don3);

        $don4 = new Don();
        $don4->setNom('Feinte');
        $don4->setType($typeDon1);
        $don4->setInitiative(1);
        $don4->setEffet("Le personnage réalise une attaque au dépourvu (l'Adversaire est pris au dépourvu seulement pour une attaque).");
        $manager->persist($don4);
        //#endregion -------------------------- DON (ART DU GUERRIER) --------------------------

        //#region -------------------------- SIGNE (DU SORCELEUR) --------------------------
        $signe1 = new Signe();
        $signe1->setNiveauSigne($nivSigne1);
        $signe1->setNom('Aard');
        $signe1->setElement($element2);
        $signe1->setDuree('Instantané');
        $signe1->setCout('1 point pour 10%');
        $signe1->setPortee('Cône de 2m');
        $signe1->setContre('Esquive');
        $signe1->setDescription("Aard déclenche une vague de force télékinétique qui STUPÉFIE les créatures "
                                ."avec 10% de chance de le mettre à terre. Le pourcentage augmente de 10% point d'endurance dépensé.");
        $manager->persist($signe1);

        $signe2 = new Signe();
        $signe2->setNiveauSigne($nivSigne1);
        $signe2->setNom("Axii");
        $signe2->setElement($element3);
        $signe2->setDuree("Jusqu'à s'en débarrasser");
        $signe2->setCout("1 END pour -1 ou 3 END pour -2");
        $signe2->setPortee("8 m");
        $signe2->setContre("Résistance à la magie");
        $signe2->setDescription("Axii étourdit un adversaire jusqu'à ce qu'il réussisse un jet de sauvegarde "
                                ."contre l'étourdissement avec un malus de -1. Pour 2 points supplémentaires dépensés, "
                                ."le jet de sauvegarde contre l'étourdissement est plus difficile de 1 point.");
        $manager->persist($signe2);

        $signe3 = new Signe();
        $signe3->setNiveauSigne($nivSigne1);
        $signe3->setNom("Quen");
        $signe3->setElement($element5);
        $signe3->setDuree("10 round ou jusqu'à puisement");
        $signe3->setCout("1 END pour 5 PV");
        $signe3->setPortee("Sur soit");
        $signe3->setContre("Résistance à la magie");
        $signe3->setDescription("Quen crée un bouclier avec 5 points de santé par points d'endurance dépensé. "
                                ."Si vous échouez à vous défende (ou que vous ne voulez/pouvez pas) contre une attaque "
                                ."ou un effet infligeant des dégâts, ces dégâts sont pris en priorité par le bouclier. "
                                ."Les dégâts réduisent d'autant de point de santé du bouclier. Si le bouclier Quen est "
                                ."réduit à 0, les dégâts supplémentaire vous sont infligés (moins la protection de l'armure). "
                                ."Quen peut être utilisé pour se défendre contre les sorts pouvant être bloqué. Quen ne "
                                ."protège pas du poison déjà avalé, de la maladie ou de la suffocation.");
        $manager->persist($signe3);

        $signe4 = new Signe();
        $signe4->setNiveauSigne($nivSigne1);
        $signe4->setNom("Yrden");
        $signe4->setElement($element1);
        $signe4->setDuree("10 round ou jusqu'à épuisement");
        $signe4->setCout("1 END pour 1 point de malus");
        $signe4->setPortee(" rayon de 3 m");
        $signe4->setContre("Résistance à la magie");
        $signe4->setDescription("Yrdeen dessine sur le sol autour de vous un grand cercle magique. Tout ce qui "
                                ."rentre dans ce cercle subit un malus à la vitesse et au réflexe (égal au point "
                                ."d'endurance que vous dépensez) jusqu'à en ressortir. Toute les créatures incorporelle "
                                ."qui pénètrent dans le cercle deviennent matérielles.");
        $manager->persist($signe4);

        //#endregion -------------------------- SIGNE (DU SORCELEUR) --------------------------

        //#region -------------------------- SORTS (DE MAGE) --------------------------
        $sort1 = new Sort();
        $sort1->setNiveauSort($nivSort1);
        $sort1->setNom("Compas Magique");
        $sort1->setElement($element1);
        $sort1->setDuree("1d6 heure");
        $sort1->setCout("3 END");
        $sort1->setPortee("Sur soit");
        $sort1->setContre("Aucun");
        $sort1->setEffet("Compas magique permet de déterminer instantanément la direction vers un endroit où vous êtes déjà allé auparavant.");
        $manager->persist($sort1);

        $sort2 = new Sort();
        $sort2->setNiveauSort($nivSort1);
        $sort2->setNom("Dissipation");
        $sort2->setElement($element1);
        $sort2->setDuree("Instantané");
        $sort2->setCout("La moitié du cout en END du sort");
        $sort2->setPortee("10m");
        $sort2->setContre("Incantation");
        $sort2->setEffet("Dissipation met fin à un sort, un rituel ou une malédiction en cours dans sa portée. Ce "
                        ."sort permet d'annuler une magie qui dure et peut être utilisé comme une action défensive pour "
                        ."bloquer une attaque magique avec ou sans composants. Pour annuler un effet magique, vous devez "
                        ."dépenser la moitié des points d'endurance utilisé pas le lanceur.");
        $manager->persist($sort2);

        $sort3 = new Sort();
        $sort3->setNiveauSort($nivSort1);
        $sort3->setNom("Glamour");
        $sort3->setElement($element1);
        $sort3->setDuree("1d6 heure");
        $sort3->setCout("5");
        $sort3->setPortee("Sur soit");
        $sort3->setContre("Aucun");
        $sort3->setEffet("Glamour vous permet de mettre une illusion autour de vous qui vous fait paraître "
                        ."éblouissant. Ce sort vous donne un bonus de +3 en séduction, charisme et commandement.");
        $manager->persist($sort3);

        $sort4 = new Sort();
        $sort4->setNiveauSort($nivSort1);
        $sort4->setNom("Invocation de bâton");
        $sort4->setElement($element1);
        $sort4->setDuree("Instantané");
        $sort4->setCout("2");
        $sort4->setPortee("-");
        $sort4->setContre("Aucun");
        $sort4->setEffet("Invocation de bâton vous permet de dématerialiser votre ba^ton et de le téléporter à un "
                        ."endroit où vous avez été présent au cours des derniers jours. Vous pouvez lancer à nouveau le "
                        ."sort pour faire revenir le bâton à vous.");
        $manager->persist($sort4);
        //#endregion -------------------------- SORTS (DE MAGE) --------------------------

        //#endregion -------------------------- COMPETENCE DE GUERRE (ART DU COMBAT) --------------------------

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
        $typeArme1 = new CategorieArme();
        $typeArme1->setLibelle('Épées');
        $manager->persist($typeArme1);

        $typeArme2 = new CategorieArme();
        $typeArme2->setLibelle('Lames courte');
        $manager->persist($typeArme2);

        $typeArme3 = new CategorieArme();
        $typeArme3->setLibelle('Haches');
        $manager->persist($typeArme3);

        $typeArme4 = new CategorieArme();
        $typeArme4->setLibelle('Armes contondante');
        $manager->persist($typeArme4);

        $typeArme5 = new CategorieArme();
        $typeArme5->setLibelle('Armes d\'hast');
        $manager->persist($typeArme5);

        $typeArme6 = new CategorieArme();
        $typeArme6->setLibelle('Bâtons');
        $manager->persist($typeArme6);

        $typeArme7 = new CategorieArme();
        $typeArme7->setLibelle('Armes de jet');
        $manager->persist($typeArme7);

        $typeArme8 = new CategorieArme();
        $typeArme8->setLibelle('Arcs');
        $manager->persist($typeArme8);

        $typeArme9 = new CategorieArme();
        $typeArme9->setLibelle('Arbalètes');
        $manager->persist($typeArme9);

        $typeArme10 = new CategorieArme();
        $typeArme10->setLibelle('Projectiles');
        $manager->persist($typeArme10);
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

        //#region -------------------------- ARMES --------------------------
        $arme1 = new Arme();
        $arme1->setCategorieArme($typeArme1);
        $arme1->setNom("Épée de chavalier");
        $arme1->setTaille($taille3);
        $arme1->setPoids(2.5);
        $arme1->setPrix(270);
        $arme1->setDegat("2d6+4");
        $arme1->setMains(1);
        $arme1->setDescription("L'épée de chevalier Rédanienne est une lame à une main avec une simple garde "
                        ."incurvée et un tranchant aiguisé. Ah, avec les Rédianiens qui se répandent dans tout le Nord "
                        ."pour nous \"défendre\", ces épées de chevalier apparaissent un peu partout.");
        $manager->persist($arme1);

        $arme2 = new Arme();
        $arme2->setCategorieArme($typeArme1);
        $arme2->setNom("Kord");
        $arme2->setTaille($taille4);
        $arme2->setPoids(1.5);
        $arme2->setPrix(725);
        $arme2->setDegat("5d6");
        $arme2->setMains(2);
        $arme2->setEffet("Saignement (25%)");
        $arme2->setDescription("Les Kords sont fabriquées pour les marins, dans la cité côtière de Cidaris. "
                        ."C'est une lame simple et solide avec un tranchant incurvé aiguisé. Ah j'entend souvent dire "
                        ."que lames quittent clandestinement le nord, voire même sont jetées dans la mer, afin que les "
                        ."porteurs de noir ne puissent mettre la mains dessus.");
        $manager->persist($arme2);

        $arme3 = new Arme();
        $arme3->setCategorieArme($typeArme1);
        $arme3->setNom("Épée longue de fer");
        $arme3->setTaille($taille3);
        $arme3->setPoids(1.5);
        $arme3->setPrix(160);
        $arme3->setDegat("2d6+2");
        $arme3->setMains(2);
        $arme3->setDescription("Ah, les épées longues en fer. En tant que nain, je peux vous assurer que le "
                        ."concept me rend malade. Elles sont très mal aiguisées, mais j'imagine qu'elles sont faciles à "
                        ."fabriquer et que l'on peut les trouver partout.");
        $manager->persist($arme3);

        $arme4 = new Arme();
        $arme4->setCategorieArme($typeArme1);
        $arme4->setNom("Esboda");
        $arme4->setTaille($taille4);
        $arme4->setPoids(1.5);
        $arme4->setPrix(650);
        $arme4->setDegat("5d6");
        $arme4->setMains(1);
        $arme4->setPortee("");
        $arme4->setEffet("");
        $arme4->setDescription("En tant que marchand, il est indispensable de laisser de côté ses convictions "
                        ."personnelles au profit des bon articles. L'esboda des Metinniens est l'un des sabres de "
                        ."cavalerie les plus légers et tranchants qu'il m'ait été donné de voir. C'est une sorte de "
                        ."gleddyf en bien mieux. On peut compter sur les hommes en noir pour laisse leurs \"vassaux\" "
                        ."fabriquer de meilleures armes, hein ?");
        $manager->persist($arme4);
        //#endregion -------------------------- ARMES --------------------------

        //#region -------------------------- ARMURES --------------------------
        $armure1 = new Armure();
        $armure1->setEmplacementArmure($emplacementArmure1);
        $armure1->setNom("Armet témérien");
        $armure1->setEncombrementArmure($encombrementArmure2);
        $armure1->setProtection(16);
        $armure1->setPoids(1.5);
        $armure1->setPrix(475);
        $armure1->setEffet("Visibilité restreinte");
        $armure1->setDescription("Les chevaliers Témériens portent généralement un armet (le casque basique "
                        ."pour un chevalier). Un heaume entièrement fermé, en métal, avec un \"nez\" pointu qui "
                        ."ressemble à un visage de plate et une fine fente devant pour la vision. Le seul problème, "
                        ."c'est que la fente n'est pas très pratique pour voir.");
        $manager->persist($armure1);

        $armure2 = new Armure();
        $armure2->setEmplacementArmure($emplacementArmure1);
        $armure2->setNom("Capuche à tissage renforcé");
        $armure2->setEncombrementArmure($encombrementArmure1);
        $armure2->setProtection(5);
        $armure2->setPoids(1);
        $armure2->setPrix(175);
        $armure2->setDescription("Dans la nature, où il est nécessaire d'avoir une meilleure vision, les gens "
                        ."portent des capuches, en particulier les elfes. Faites de cuirs épais, d'un tissage dense et "
                        ."de couche de tissus. Elles sont traitées afin d'être suffisamment dures pour arrêter une "
                        ."entaille ou un tir de carreau avec une petite arbalète de poing.");
        $manager->persist($armure2);

        $armure3 = new Armure();
        $armure3->setEmplacementArmure($emplacementArmure1);
        $armure3->setNom("Capuche d'archer Verdenien");
        $armure3->setEncombrementArmure($encombrementArmure1);
        $armure3->setProtection(3);
        $armure3->setPoids(0.5);
        $armure3->setPrix(100);
        $armure3->setDescription("Les archers Verdenien sont de vrai durs. Ils portent peu de pièces d'armure."
                        ."J'imagine qu'ils ne s'en préoccupent plus étant donné que les dryades plantent leurs flèches "
                        ."dans les filles. Leurs capuches renforcées sont bonnes, solides, d'un tissage serré avec un "
                        ."dessin en forme de flèche bleu et noir.");
        $manager->persist($armure3);

        $armure4 = new Armure();
        $armure4->setEmplacementArmure($emplacementArmure1);
        $armure4->setNom("Spangenhelm");
        $armure4->setEncombrementArmure($encombrementArmure1);
        $armure4->setProtection(8);
        $armure4->setPoids(1);
        $armure4->setPrix(200);
        $armure4->setDescription("On trouve les Spangenhelm surtout en Nilfgaard et Skellige. Les nordiques "
                        ."ont tendance à préférer un casque entièrement fermé ou juste une cervelière (entourant "
                        ."uniquement le haut du crâne). Les lunettes sur le devant du casque aident à protéger votre "
                        ."visage et vos yeux des attaques, et parfois il y a un bout de mailleattaché à l'arrière pour "
                        ."protéger le cou.");
        $manager->persist($armure4);
        //#endregion -------------------------- ARMURES --------------------------

        //#region -------------------------- ÉQUIPEMENT GÉNÉRAL --------------------------
        $equipement1 = new EquipementGeneral();
        $equipement1->setCategorieFourniture($categorieFourniture1);
        $equipement1->setNom("20m de corde");
        $equipement1->setDescription("Toujours avoir de la corde sur soi. Je me suis retrouvé piégé dans des "
                        ."trous, j'ai dû escalader des falaises. À tout moment, une corde peut être utile.");
        $equipement1->setPoids(1.5);
        $equipement1->setPrix(20);
        $manager->persist($equipement1);

        $equipement2 = new EquipementGeneral();
        $equipement2->setCategorieFourniture($categorieFourniture1);
        $equipement2->setNom("Bâche");
        $equipement2->setDescription("Une grande bâche pour vous couvrir ou couvrir tout ce que vous voulez "
                        ."garder à l'abri de la pluie.");
        $equipement2->setPoids(1.5);
        $equipement2->setPrix(20);
        $manager->persist($equipement2);

        $equipement3 = new EquipementGeneral();
        $equipement3->setCategorieFourniture($categorieFourniture1);
        $equipement3->setNom("Cadenas");
        $equipement3->setDescription("Juste un cadenas basique. Il ferme n'importe quoi avec des deux boucles. "
                        ."J'en met sur tout mes coffres (Crochetage SD15)");
        $equipement3->setPoids(0.1);
        $equipement3->setPrix(34);
        $manager->persist($equipement3);

        $equipement4 = new EquipementGeneral();
        $equipement4->setCategorieFourniture($categorieFourniture1);
        $equipement4->setNom("Bougies (x5)");
        $equipement4->setDescription("De simples bougies en cire pour éloigner l'obscurité pendant quelques "
                        ."heures. (Augmente le niveau de luminosité de 1 dans un rayon 2m. Un vent fort l'éteint.");
        $equipement4->setPoids(0.5);
        $equipement4->setPrix(5);
        $manager->persist($equipement4);
        //#endregion -------------------------- ÉQUIPEMENT GÉNÉRAL --------------------------

        //#region -------------------------- INGREDIENTS --------------------------
        $ingredient1 = new Ingredient();
        $ingredient1->setNom("Adhésif alchimique");
        $ingredient1->setPrix(28);
        $ingredient1->setEffet("L'adhésif alchimique peut être lancé ou rependu sur une surface ou une personne. "
                        ."Après 2 tours, la solution va durcir, coller les objets ensemble et coller les gens à d'autres "
                        ."ou à des objets. Les objets peuvent être décollés avec un jet de Physique (SD16). Pour le "
                        ."lancer, il faut réaliser un jet d'athlétisme avec une portée égale à COR x 2m.");
        $manager->persist($ingredient1);

        $ingredient2 = new Ingredient();
        $ingredient2->setNom("Ami de l'empoisonneur");
        $ingredient2->setPrix(16);
        $ingredient2->setEffet("Le liquide de l'empoisonneur est un liquide clair qui peut être versé dans la "
                        ."nourriture ou la boisson afin de le rendre très appétissant ou sucré au goût. Cela augmente "
                        ."le SD pour détecter le poison.");
        $manager->persist($ingredient2);

        $ingredient3 = new Ingredient();
        $ingredient3->setNom("Chloroforme");
        $ingredient3->setPrix(16);
        $ingredient3->setEffet("Quiconque respire du chloroforme doit réussir une jet  de sauvegarde contre "
                        ."l'étourdissement avec un malus de -2 ou tomber dans l'inconscient jusqu'à réussir le jet. "
                        ."Pour l'utiliser, il fait généralement réaliser une attaque de Bagarre avec un tissu imbibé de "
                        ."chloroforme. Il est aussi possible de le verser dans un récipient. Chaque fiole contient 25 doses.");
        $manager->persist($ingredient3);

        $ingredient4 = new Ingredient();
        $ingredient4->setNom("Élixir de Pantagran");
        $ingredient4->setPrix(67);
        $ingredient4->setEffet("Boire une gorgée d'élixir de Pantagran provoque une joie délirante. Cet effet dure "
                        ."1d6/2 heures et laisse le consommateur incroyablement sensible au Charisme, à la Persuasion, "
                        ."et à la Séduction, lui infligeant un malus de -2 à la Resistance à la contrainte");
        $manager->persist($ingredient4);

        //#endregion -------------------------- INGREDIENTS --------------------------

        //#region -------------------------- OUTILS --------------------------
        $outil1 = new Outil();
        $outil1->setNom("Accessoires artistique");
        $outil1->setTaille($taille2);
        $outil1->setPoids(2);
        $outil1->setPrix(55);
        $outil1->setEffet("Permet de créer une forme d'art (peinture, joaillerie, sculpture, etc...).");
        $manager->persist($outil1);

        $outil2 = new Outil();
        $outil2->setNom("Amulette (gemme)");
        $outil2->setTaille($taille2);
        $outil2->setPoids(0.1);
        $outil2->setPrix(500);
        $outil2->setEffet("Focus (3)");
        $manager->persist($outil2);

        $outil3 = new Outil();
        $outil3->setNom("Amulette simple");
        $outil3->setTaille($taille1);
        $outil3->setPoids(2);
        $outil3->setPrix(250);
        $outil3->setEffet("Focus (1)");
        $manager->persist($outil3);

        $outil4 = new Outil();
        $outil4->setNom("Ensemble d'alchimie");
        $outil4->setTaille($taille4);
        $outil4->setPoids(3);
        $outil4->setPrix(80);
        $outil4->setEffet("Permet de fabriquer des articles alchimique");
        $manager->persist($outil4);
        //#endregion -------------------------- OUTILS --------------------------
        //#endregion -------------------------- STUFF --------------------------

        $manager->flush();
    }
}
