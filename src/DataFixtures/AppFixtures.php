<?php

namespace App\DataFixtures;

use App\Entity\Caracteristique;
use App\Entity\CompetenceCombat\Don;
use App\Entity\CompetenceCombat\Element;
use App\Entity\CompetenceCombat\NiveauSigne;
use App\Entity\CompetenceCombat\NiveauSort;
use App\Entity\CompetenceCombat\Signe;
use App\Entity\CompetenceCombat\Sort;
use App\Entity\CompetenceCombat\TypeDon;
use App\Entity\HandicapMoral;
use App\Entity\HandicapPhysique;
use App\Entity\Job;
use App\Entity\Quete;
use App\Entity\Race;
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
use App\Entity\Talent;
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

        //#region -------------------------- GUIDE  DU PERSONNAGE --------------------------
        //#region -------------------------- CARACTÉRISTIQUE --------------------------
        $caracteristique1 = new Caracteristique();
        $caracteristique1->setLibelle('Force');
        $manager->persist($caracteristique1);

        $caracteristique2 = new Caracteristique();
        $caracteristique2->setLibelle('Habileté');
        $manager->persist($caracteristique2);

        $caracteristique3 = new Caracteristique();
        $caracteristique3->setLibelle('Charme');
        $manager->persist($caracteristique3);

        $caracteristique4 = new Caracteristique();
        $caracteristique4->setLibelle('Sagacité');
        $manager->persist($caracteristique4);
        //#endregion -------------------------- CARACTÉRISTIQUE --------------------------

        //#region -------------------------- HANDICAPS MORAUX --------------------------
        $handicapMoral1 = new HandicapMoral();
        $handicapMoral1->setValeur(1);
        $handicapMoral1->setCaractere("Acariâtre");
        $handicapMoral1->setDescription("Est souvent de mauvaise humeur, voire se montre carrément insupportable");
        $manager->persist($handicapMoral1);

        $handicapMoral2 = new HandicapMoral();
        $handicapMoral2->setValeur(2);
        $handicapMoral2->setCaractere("Craintif");
        $handicapMoral2->setDescription("Est facilement effrayé et n'ose pas prendre de risque");
        $manager->persist($handicapMoral2);

        $handicapMoral3 = new HandicapMoral();
        $handicapMoral3->setValeur(3);
        $handicapMoral3->setCaractere("Cruel");
        $handicapMoral3->setDescription("Est insensible à la souffrance d'autrui, voire prend plaisir à faire souffrir les autres");
        $manager->persist($handicapMoral3);

        $handicapMoral4 = new HandicapMoral();
        $handicapMoral4->setValeur(4);
        $handicapMoral4->setCaractere("Cupide");
        $handicapMoral4->setDescription("Se montre avide de richesse et veut toujours s'enrichir");
        $manager->persist($handicapMoral4);

        $handicapMoral5 = new HandicapMoral();
        $handicapMoral5->setValeur(5);
        $handicapMoral5->setCaractere("Drogué");
        $handicapMoral5->setDescription("Est dépendant de drogue (fisstech) et prêt à tout pour s'en procurer");
        $manager->persist($handicapMoral5);

        $handicapMoral6 = new HandicapMoral();
        $handicapMoral6->setValeur(6);
        $handicapMoral6->setCaractere("Grossier");
        $handicapMoral6->setDescription("Possède un vocabulaire outrancier et se montre souvent impoli");
        $manager->persist($handicapMoral6);

        $handicapMoral7 = new HandicapMoral();
        $handicapMoral7->setValeur(7);
        $handicapMoral7->setCaractere("Impulsif");
        $handicapMoral7->setDescription("Agit spontanément et ne réfléchit pas aux conséquences");
        $manager->persist($handicapMoral7);

        $handicapMoral8 = new HandicapMoral();
        $handicapMoral8->setValeur(8);
        $handicapMoral8->setCaractere("Naïf");
        $handicapMoral8->setDescription("Se montre ingénu voire crédule");
        $manager->persist($handicapMoral8);

        $handicapMoral9 = new HandicapMoral();
        $handicapMoral9->setValeur(9);
        $handicapMoral9->setCaractere("Négligé");
        $handicapMoral9->setDescription("Possède une hygiène douteuse et dégage une odeur désagréable");
        $manager->persist($handicapMoral9);

        $handicapMoral10 = new HandicapMoral();
        $handicapMoral10->setValeur(10);
        $handicapMoral10->setCaractere("Névrosé");
        $handicapMoral10->setDescription("Est victime de phobie (Acrophobie, Cheimophobie, Hydrophobie, Pyrophobie)");
        $manager->persist($handicapMoral10);

        $handicapMoral11 = new HandicapMoral();
        $handicapMoral11->setValeur(11);
        $handicapMoral11->setCaractere("Obsédé");
        $handicapMoral11->setDescription("Se montre souvent séducteur voire est obnubilé par ses désirs sexuels");
        $manager->persist($handicapMoral11);

        $handicapMoral12 = new HandicapMoral();
        $handicapMoral12->setValeur(12);
        $handicapMoral12->setCaractere("Obstiné");
        $handicapMoral12->setDescription("Persévère de manière irréfléchie dans une action et accepte difficilement l'échec");
        $manager->persist($handicapMoral12);

        $handicapMoral13 = new HandicapMoral();
        $handicapMoral13->setValeur(13);
        $handicapMoral13->setCaractere("Orgueilleux");
        $handicapMoral13->setDescription("Se montre prétentieux voire arrogant");
        $manager->persist($handicapMoral13);

        $handicapMoral14 = new HandicapMoral();
        $handicapMoral14->setValeur(14);
        $handicapMoral14->setCaractere("Paresseux");
        $handicapMoral14->setDescription("Refuse l'effort et se montre indolent");
        $manager->persist($handicapMoral14);

        $handicapMoral15 = new HandicapMoral();
        $handicapMoral15->setValeur(15);
        $handicapMoral15->setCaractere("Précieux");
        $handicapMoral15->setDescription("Possède un langage raffiné et des manières élégantes");
        $manager->persist($handicapMoral15);

        $handicapMoral16 = new HandicapMoral();
        $handicapMoral16->setValeur(16);
        $handicapMoral16->setCaractere("Sentimental");
        $handicapMoral16->setDescription("Manifeste une sensibilité extrême, voire se montre mièvre");
        $manager->persist($handicapMoral16);

        $handicapMoral17 = new HandicapMoral();
        $handicapMoral17->setValeur(17);
        $handicapMoral17->setCaractere("Soupçonneux");
        $handicapMoral17->setDescription("Accorde difficilement sa confiance et est difficile à convaincre");
        $manager->persist($handicapMoral17);

        $handicapMoral18 = new HandicapMoral();
        $handicapMoral18->setValeur(18);
        $handicapMoral18->setCaractere("Sournois");
        $handicapMoral18->setDescription("Dissimule ses véritables intentions et n'hésite pas à trahir ses alliés");
        $manager->persist($handicapMoral18);

        $handicapMoral19 = new HandicapMoral();
        $handicapMoral19->setValeur(19);
        $handicapMoral19->setCaractere("Tourmenté");
        $handicapMoral19->setDescription("Est victime d'hallucinations et se montre souvent déprimé");
        $manager->persist($handicapMoral19);

        $handicapMoral20 = new HandicapMoral();
        $handicapMoral20->setValeur(20);
        $handicapMoral20->setCaractere("Violent");
        $handicapMoral20->setDescription("Se montre excessif et use fréquemment de sa force physique");
        $manager->persist($handicapMoral20);
        //#endregion -------------------------- HANDICAPS MORAUX --------------------------

        //#region -------------------------- HANDICAPS PHYSIQUES --------------------------
        $handicapPhysique1 = new HandicapPhysique();
        $handicapPhysique1->setValeur(1);
        $handicapPhysique1->setDescription("Obligation de prendre un handicap physique avec -8 Bonus de Formation");
        $manager->persist($handicapPhysique1);

        $handicapPhysique2 = new HandicapPhysique();
        $handicapPhysique2->setValeur(2);
        $handicapPhysique2->setDescription("Genou fracturé et maintenu par des tiges d'acier");
        $handicapPhysique2->setMalus("Acrobaties");
        $manager->persist($handicapPhysique2);

        $handicapPhysique3 = new HandicapPhysique();
        $handicapPhysique3->setValeur(3);
        $handicapPhysique3->setDescription("Nez cassé et suturé avec un morceau de cuir");
        $handicapPhysique3->setMalus("Alchimie");
        $manager->persist($handicapPhysique3);

        $handicapPhysique4 = new HandicapPhysique();
        $handicapPhysique4->setValeur(4);
        $handicapPhysique4->setDescription("Pouce tranché et remplacé par un crochet d'acier");
        $handicapPhysique4->setMalus("Artisanat");
        $manager->persist($handicapPhysique4);

        $handicapPhysique5 = new HandicapPhysique();
        $handicapPhysique5->setValeur(5);
        $handicapPhysique5->setDescription("Tempe fissurée et renforcée par des broches d'acier");
        $handicapPhysique5->setMalus("Connaissances");
        $manager->persist($handicapPhysique5);

        $handicapPhysique6 = new HandicapPhysique();
        $handicapPhysique6->setValeur(6);
        $handicapPhysique6->setDescription("Œil crevé et masqué par un bandeau de cuir");
        $handicapPhysique6->setMalus("Détection");
        $manager->persist($handicapPhysique6);

        $handicapPhysique7 = new HandicapPhysique();
        $handicapPhysique7->setValeur(7);
        $handicapPhysique7->setDescription("Odeur forte et bestiale aux relents perturbants");
        $handicapPhysique7->setMalus("Diplomatie");
        $manager->persist($handicapPhysique7);

        $handicapPhysique8 = new HandicapPhysique();
        $handicapPhysique8->setValeur(8);
        $handicapPhysique8->setDescription("Pied arraché et remplacé par un pivot de bois");
        $handicapPhysique8->setMalus("Escalade");
        $manager->persist($handicapPhysique8);

        $handicapPhysique9 = new HandicapPhysique();
        $handicapPhysique9->setValeur(9);
        $handicapPhysique9->setDescription("Chevelure longue et hirsute de couleur inhabituelle");
        $handicapPhysique9->setMalus("Furtivité");
        $manager->persist($handicapPhysique9);

        $handicapPhysique10 = new HandicapPhysique();
        $handicapPhysique10->setValeur(10);
        $handicapPhysique10->setDescription("Possibilité de prendre un handicap physique avec -2 Bonus de Formation");
        $manager->persist($handicapPhysique10);

        $handicapPhysique11 = new HandicapPhysique();
        $handicapPhysique11->setValeur(11);
        $handicapPhysique11->setDescription("Obligation de prendre un handicap physique avec -8 Bonus de Formation");
        $manager->persist($handicapPhysique11);

        $handicapPhysique12 = new HandicapPhysique();
        $handicapPhysique12->setValeur(12);
        $handicapPhysique12->setDescription("Front tailladé et frappé d'une plaque en acier");
        $handicapPhysique12->setMalus("Intuition");
        $manager->persist($handicapPhysique12);

        $handicapPhysique13 = new HandicapPhysique();
        $handicapPhysique13->setValeur(13);
        $handicapPhysique13->setDescription("Poignet brisé et entouré d'une attelle en bois");
        $handicapPhysique13->setMalus("Larcin");
        $manager->persist($handicapPhysique13);

        $handicapPhysique14 = new HandicapPhysique();
        $handicapPhysique14->setValeur(14);
        $handicapPhysique14->setDescription("Poitrine lacérée et affaiblie par de profondes cicatrices");
        $handicapPhysique14->setMalus("Lutte");
        $manager->persist($handicapPhysique14);

        $handicapPhysique15 = new HandicapPhysique();
        $handicapPhysique15->setValeur(15);
        $handicapPhysique15->setDescription("Main brûlée et gantée de cuir noir");
        $handicapPhysique15->setMalus("Piège");
        $manager->persist($handicapPhysique15);

        $handicapPhysique16 = new HandicapPhysique();
        $handicapPhysique16->setValeur(16);
        $handicapPhysique16->setDescription("Oreille coupée et dissimulée par un ruban de soie");
        $handicapPhysique16->setMalus("Pistage");
        $manager->persist($handicapPhysique16);

        $handicapPhysique17 = new HandicapPhysique();
        $handicapPhysique17->setValeur(17);
        $handicapPhysique17->setDescription("Ongles acérés et contaminés par la lèpre du sang (catriona)");
        $handicapPhysique17->setMalus("Soins");
        $manager->persist($handicapPhysique17);

        $handicapPhysique18 = new HandicapPhysique();
        $handicapPhysique18->setValeur(18);
        $handicapPhysique18->setDescription("Voix sourde et rocailleuse de faible volume");
        $handicapPhysique18->setMalus("Spectacle");
        $manager->persist($handicapPhysique18);

        $handicapPhysique19 = new HandicapPhysique();
        $handicapPhysique19->setValeur(19);
        $handicapPhysique19->setDescription("Teint blafard et maladif dû à une santé précaire");
        $handicapPhysique19->setMalus("Survie");
        $manager->persist($handicapPhysique19);

        $handicapPhysique20 = new HandicapPhysique();
        $handicapPhysique20->setValeur(20);
        $handicapPhysique20->setDescription("Possibilité de prendre un handicap physique avec -2 Bonus de Formation");
        $manager->persist($handicapPhysique20);
        //#endregion -------------------------- HANDICAPS PHYSIQUES --------------------------

        //#region -------------------------- QUÊTE --------------------------
        $quete1 = new Quete();
        $quete1->setValeur(1);
        $quete1->setDescription("Défendre les non-humains");
        $manager->persist($quete1);

        $quete2 = new Quete();
        $quete2->setValeur(2);
        $quete2->setDescription("Anéantir les non humains");
        $manager->persist($quete2);

        $quete3 = new Quete();
        $quete3->setValeur(3);
        $quete3->setDescription("Discréditer le culte du Feu Eternel");
        $manager->persist($quete3);

        $quete4 = new Quete();
        $quete4->setValeur(4);
        $quete4->setDescription("Combattre aux cotés de la Rose-Ardente");
        $manager->persist($quete4);

        $quete5 = new Quete();
        $quete5->setValeur(5);
        $quete5->setDescription("Eradiquer le culte de l'Araignée à tête de lion");
        $manager->persist($quete5);

        $quete6 = new Quete();
        $quete6->setValeur(6);
        $quete6->setDescription("Eradiquer l'organisation de la Salamandre");
        $manager->persist($quete6);

        $quete7 = new Quete();
        $quete7->setValeur(7);
        $quete7->setDescription("Exercer un 'droit de surprise'");
        $manager->persist($quete7);

        $quete8 = new Quete();
        $quete8->setValeur(8);
        $quete8->setDescription("Rencontrer l'âme sœur");
        $manager->persist($quete8);

        $quete9 = new Quete();
        $quete9->setValeur(9);
        $quete9->setDescription("Retrouver un endroit abandonné");
        $manager->persist($quete9);

        $quete10 = new Quete();
        $quete10->setValeur(10);
        $quete10->setDescription("Combattre un spécimen de chaque monstre des Royaumes du nord");
        $manager->persist($quete10);

        $quete11 = new Quete();
        $quete11->setValeur(11);
        $quete11->setDescription("Tuer une personne");
        $manager->persist($quete11);

        $quete12 = new Quete();
        $quete12->setValeur(12);
        $quete12->setDescription("Secourir une personne");
        $manager->persist($quete12);

        $quete13 = new Quete();
        $quete13->setValeur(13);
        $quete13->setDescription("Connaître l'identité d'une personne");
        $manager->persist($quete13);

        $quete14 = new Quete();
        $quete14->setValeur(14);
        $quete14->setDescription("Trouver le moyen de guérir une personne");
        $manager->persist($quete14);

        $quete15 = new Quete();
        $quete15->setValeur(15);
        $quete15->setDescription("Retrouver la trace d'une personne");
        $manager->persist($quete15);

        $quete16 = new Quete();
        $quete16->setValeur(16);
        $quete16->setDescription("Venger la mort d'une personne");
        $manager->persist($quete16);

        $quete17 = new Quete();
        $quete17->setValeur(17);
        $quete17->setDescription("Retrouver la mémoire");
        $manager->persist($quete17);

        $quete18 = new Quete();
        $quete18->setValeur(18);
        $quete18->setDescription("Honorer une promesse");
        $manager->persist($quete18);

        $quete19 = new Quete();
        $quete19->setValeur(19);
        $quete19->setDescription("Retrouver un artefact");
        $manager->persist($quete19);

        $quete20 = new Quete();
        $quete20->setValeur(20);
        $quete20->setDescription("Détruire un artefact");
        $manager->persist($quete20);
        //#endregion -------------------------- QUÊTE --------------------------

        //#region -------------------------- RACES --------------------------
        $race1 = new Race();
        $race1->setLibelle("Elfe");
        $race1->setDescription("Les elfes font partie, comme les hobbits et les nains, des Anciennes Races.");
        $race1->setPhoto("elfe.jpg");
        $manager->persist($race1);

        $race2 = new Race();
        $race2->setLibelle("Hobbit");
        $race2->setDescription("Les hobbits constituent la plus vieille des Anciennes Races. Ils sont particulièrement vifs d’esprit, mais demeurent secrets et mystérieux.");
        $race2->setPhoto("hobbit.jpg");
        $manager->persist($race2);

        $race3 = new Race();
        $race3->setLibelle("Humain");
        $race3->setDescription("Bien qu’ils n’en soient pas les premiers habitants, les humains exercent aujourd'hui leur domination sur le monde.");
        $race3->setPhoto("humain.jpg");
        $manager->persist($race3);

        $race4 = new Race();
        $race4->setLibelle("Nain");
        $race4->setDescription("Les nains sont plus petits que les humains, mais plus robustes et plus musclés. Les mâles portent généralement de longues barbes.");
        $race4->setPhoto("nain.jpg");
        $manager->persist($race4);

        //#endregion -------------------------- RACES --------------------------

        //#region -------------------------- JOBS --------------------------
        $job1 = new Job();
        $job1->setLibelle("Assassin de Nilfgaard");
        $job1->setBonusCaracteristiques(["Force","Sagacité"]);
        $job1->setBonusTalent(["Acrobaties","Furtivité"]);
        $job1->setPhoto("assassin.jpg");
        $manager->persist($job1);

        $job2 = new Job();
        $job2->setLibelle("Barde des îles Skellige");
        $job2->setBonusCaracteristiques(["Habileté","Charme"]);
        $job2->setBonusTalent(["Artisanat","Spectacle"]);
        $job2->setPhoto("barde.jpg");
        $manager->persist($job2);

        $job3 = new Job();
        $job3->setLibelle("Chevalier de la Rose-Ardente");
        $job3->setPresrequis("Humain");
        $job3->setBonusCaracteristiques(["Force","Charme"]);
        $job3->setBonusTalent(["Lutte","Survie"]);
        $job3->setPhoto("chevalier.jpg");
        $manager->persist($job3);

        $job4 = new Job();
        $job4->setLibelle("Inquisitrice de Melitele");
        $job4->setPresrequis("Femme");
        $job4->setBonusCaracteristiques(["Habileté","Sagacité"]);
        $job4->setBonusTalent(["Intuition","Soins"]);
        $job4->setPhoto("inquisitrice.jpg");
        $manager->persist($job4);

        $job5 = new Job();
        $job5->setLibelle("Magicienne de la Loge");
        $job5->setPresrequis("Femme");
        $job5->setBonusCaracteristiques(["Sagacité","Charme"]);
        $job5->setBonusTalent(["Connaissances","Diplomatie"]);
        $job5->setPhoto("magicienne.jpg");
        $manager->persist($job5);

        $job6 = new Job();
        $job6->setLibelle("Rebelle de la Scoia'tael");
        $job6->setPresrequis("Non-humain");
        $job6->setBonusCaracteristiques(["Force","Habileté"]);
        $job6->setBonusTalent(["Escalade","Pistage"]);
        $job6->setPhoto("rebelle.jpg");
        $manager->persist($job6);

        $job7 = new Job();
        $job7->setLibelle("Sorceleur de Kaer Morhen");
        $job7->setPresrequis("Humain");
        $job7->setBonusCaracteristiques(["Force","Charme"]);
        $job7->setBonusTalent(["Alchimie","Détection"]);
        $job7->setPhoto("sorceleur.jpg");
        $manager->persist($job7);

        $job8 = new Job();
        $job8->setLibelle("Voleur de la Salamandre");
        $job8->setBonusCaracteristiques(["Habileté","Sagacité"]);
        $job8->setBonusTalent(["Larcin","Piège"]);
        $job8->setPhoto("voleur.jpg");
        $manager->persist($job8);
        //#endregion -------------------------- JOBS --------------------------

        //#region -------------------------- TALENTS --------------------------
        $talent1 = new Talent();
        $talent1->setLibelle("Acrobaties");
        $talent1->setDescription("Le personnage se sert du Talent Acrobaties pour réaliser des sauts périlleux, effectuer des roulés-boulés ou amortir ses chutes.");
        $talent1->setCaracteristique($caracteristique1);
        $manager->persist($talent1);

        $talent2 = new Talent();
        $talent2->setLibelle("Alchimie");
        $talent2->setDescription("Le personnage se sert du Talent Alchimie pour réaliser des élixirs, identifier des substances ou prélever des ingrédients.");
        $talent2->setCaracteristique($caracteristique4);
        $manager->persist($talent2);

        $talent3 = new Talent();
        $talent3->setLibelle("Artisanat");
        $talent3->setDescription("Le personnage se sert du Talent Artisanat pour réparer une arbalète, forger une épée ou évaluer un bijou.");
        $talent3->setCaracteristique($caracteristique2);
        $manager->persist($talent3);

        $talent4 = new Talent();
        $talent4->setLibelle("Connaissances");
        $talent4->setDescription("Le personnage se sert du Talent Connaissances pour retenir des informations, mémoriser des faits et comprendre des idées.");
        $talent4->setCaracteristique($caracteristique4);
        $manager->persist($talent4);

        $talent5 = new Talent();
        $talent5->setLibelle("Détection");
        $talent5->setDescription("Le personnage se sert du Talent Détection pour repérer des mouvements, entendre des sons ou percevoir des odeurs.");
        $talent5->setCaracteristique($caracteristique3);
        $manager->persist($talent5);

        $talent6 = new Talent();
        $talent6->setLibelle("Diplomatie");
        $talent6->setDescription("Le personnage se sert du Talent Diplomatie pour négocier un achat, convaincre d’un évènement ou intimider un brigand.");
        $talent6->setCaracteristique($caracteristique3);
        $manager->persist($talent6);

        $talent7 = new Talent();
        $talent7->setLibelle("Escalade");
        $talent7->setDescription("Le personnage se sert du Talent Escalade pour gravir une falaise, lancer un grappin ou se déplacer sur une corniche.");
        $talent7->setCaracteristique($caracteristique1);
        $manager->persist($talent7);

        $talent8 = new Talent();
        $talent8->setLibelle("Furtivité");
        $talent8->setDescription("Le personnage se sert du Talent Furtivité pour se fondre dans l’ombre, se déplacer sans bruit ou se perdre dans la foule.");
        $talent8->setCaracteristique($caracteristique2);
        $manager->persist($talent8);

        $talent9 = new Talent();
        $talent9->setLibelle("Intuition");
        $talent9->setDescription("Le personnage se sert du Talent Intuition pour détecter un mensonge, intercepter un message secret ou deviner un sentiment caché.");
        $talent9->setCaracteristique($caracteristique3);
        $manager->persist($talent9);

        $talent10 = new Talent();
        $talent10->setLibelle("Larcin");
        $talent10->setDescription("Le personnage se sert du Talent Larcin pour crocheter une serrure, détrousser des poches ou escamoter une bague.");
        $talent10->setCaracteristique($caracteristique2);
        $manager->persist($talent10);

        $talent11 = new Talent();
        $talent11->setLibelle("Lutte");
        $talent11->setDescription("Le personnage se sert du Talent Lutte pour assommer un garde, maîtriser un compagnon ou gifler un enfant.");
        $talent11->setCaracteristique($caracteristique1);
        $manager->persist($talent11);

        $talent12 = new Talent();
        $talent12->setLibelle("Piège");
        $talent12->setDescription("Le personnage se sert du Talent Piège pour détecter une alarme, désamorcer un mécanisme ou contrefaire une signature.");
        $talent12->setCaracteristique($caracteristique2);
        $manager->persist($talent12);

        $talent13 = new Talent();
        $talent13->setLibelle("Pistage");
        $talent13->setDescription("Le personnage se sert du Talent Pistage pour suivre une piste, apaiser un animal ou identifier des empreintes.");
        $talent13->setCaracteristique($caracteristique4);
        $manager->persist($talent13);

        $talent14 = new Talent();
        $talent14->setLibelle("Soins");
        $talent14->setDescription("Le personnage se sert du Talent Soins pour apaiser les blessés, contenir une hémorragie ou réaliser une autopsie.");
        $talent14->setCaracteristique($caracteristique4);
        $manager->persist($talent14);

        $talent15 = new Talent();
        $talent15->setLibelle("Spectacle");
        $talent15->setDescription("Le personnage se sert du Talent Spectacle pour peindre un portrait, donner un récital ou jongler avec quelques balles.");
        $talent15->setCaracteristique($caracteristique3);
        $manager->persist($talent15);

        $talent16 = new Talent();
        $talent16->setLibelle("Survie");
        $talent16->setDescription("Le personnage se sert du Talent Survie pour résister à certains poisons, endurer les changements climatiques ou éviter une noyade.");
        $talent16->setCaracteristique($caracteristique1);
        $manager->persist($talent16);
        //#endregion -------------------------- TALENTS --------------------------

        //#endregion -------------------------- GUIDE  DU PERSONNAGE --------------------------

        $manager->flush();
    }
}
