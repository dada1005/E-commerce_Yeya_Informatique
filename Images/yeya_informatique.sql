-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 04, 2026 at 10:54 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yeya_informatique`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int NOT NULL,
  `mail` varchar(150) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `idCategorie` int NOT NULL,
  `nomCategorie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `nomCategorie`) VALUES
(1, 'PC'),
(2, 'Imprimante'),
(3, 'Cartouche'),
(4, 'Peripherique');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `idClient` int NOT NULL,
  `nomClient` varchar(150) NOT NULL,
  `mailClient` varchar(150) NOT NULL,
  `mdpClient` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `idCommande` int NOT NULL,
  `dateCommande` datetime NOT NULL,
  `totalCommande` decimal(15,2) NOT NULL,
  `statut` varchar(50) NOT NULL,
  `idClient` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `ligne_commandes`
--

CREATE TABLE `ligne_commandes` (
  `idLignCommande` int NOT NULL,
  `quantité` int NOT NULL,
  `prix_unitaire` decimal(15,2) NOT NULL,
  `idCommande` int NOT NULL,
  `idProduit` int NOT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `idProduit` int NOT NULL,
  `nomProduit` varchar(150) NOT NULL,
  `description` varchar(100) NOT NULL,
  `prix` decimal(15,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `idCategorie` int NOT NULL
) ;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`idProduit`, `nomProduit`, `description`, `prix`, `image`, `idCategorie`) VALUES
(1, 'PC Gamer', 'PC Gamer A à Z AMD Ryzen 7000; Composants à vos choix ;Personnalisation à 100%!!!', 600.00, 'c46fb84524ddab47e327bf7e322e58a65de40921-1.jpg', 1),
(2, 'PC Portable HP', 'PC Portable HP 15-fd0167nf; Windows 11 - 15,6\" FHD;Intel N100; RAM 8Go ;Stockage 256Go SSD; AZERTY', 500.00, '411cixderl._ac_.jpg', 1),
(3, 'PC de Bureau HP', 'Windows 11 ProfessionnelIntel® Core™ i5 144008 Go RAM256 Go Disque SSDCarte graphique Intel® UHD', 800.00, '61hmvihrnpl.webp', 1),
(4, 'PC Portable DELL', 'Dell Latitude 5400 - 16Go - 24', 530.00, '805f6fdc11d04bc1860a3ed506d0a2ac.webp', 1),
(5, 'Macbook Pro (2020)', 'MacBook Pro Touch Bar 13\" i5 1,4 Ghz 8 Go RAM 256 Go SSD Gris Sidéral (2020) ', 579.00, 'apple-macbook-air-13-2020-i3-1-1-ghz-8-go-ram.webp', 1),
(6, 'Macbook Air (2020)', 'APPLE MacBook Air 13\" 2020 i3 - 1,1 Ghz - 8 Go RAM - 256 Go SSD - Gris Sidéral', 639.00, 'refurb-macbook-air-silver-m1-202010.jpg', 1),
(7, 'Macbook Air (2015)', 'APPLE MacBook Pro Retina 13\" 2015 i5 - 2,7 Ghz - 8 Go RAM - 256 Go SSD - Gris ', 500.00, '6d3546db-c562-44f9-ba41-40597168985e-1_886795d1-7bd3-4c8f-a011-8fcb98b7cee6.jpg', 1),
(8, 'PC de Bureau FUJITSU', 'FUJITSU Ordinateur de bureau ESPRIMO P558/E85+; Core i5 i5-8400; 4 Go RAM; 500 Go HDD; Micro tour', 600.00, '8b10a654-4278-4709-b9af-b9db6507da97-1.webp', 1),
(9, 'PC de Bureau DELL', 'PC de bureau Dell OptiPlex 7050 SFF - Core i5-6500 - 16Go DDR4 - 500Go SSD - Windows 10', 620.00, 'dell-optiplex-3040-sff-8go-ssd-240go.jpg', 1),
(10, 'PC de Bureau Lenovo', 'Lenovo V50s; pc de bureau Windows 11; intel Pentium 4 GHz; 1To + 256go SSD; 16 Go RAM', 700.00, 'lenovo-thinkcentre-m910s-sff-i7-gen-6-8go-ram-240go-ssd-windows-10.jpg', 1),
(11, 'PC Portable Lenovo', 'PC portable - LENOVO - ThinkPad T450S - 14\"-8go de RAM - 256go', 530.00, 'lenovo-thinkpad-p70-core-i7-6820hq-2-7ghz-16gb-ram-256gb-m-2-ssd-batterycare-wifi-bt-fp-webcam-17-3-40e.jpg', 1),
(12, 'HP Deskjet 4230e', 'Imprimante tout-en-un HP Deskjet 4230e Jet encre couleur + Carte Instant Ink', 50.00, 'hp-envy-6430e.jpg', 2),
(13, 'HP DeskJet 2810e', '\r\nImprimante Tout-en-un HP DeskJet 2810e, copie, numérisation, Couleur, Numérisation vers PDF', 40.00, '61TFlMeH0HL._AC_UF1000,1000_QL80_.jpg', 2),
(14, 'HP OfficeJet 8014e', 'Imprimante tout-en-un HP OfficeJet Pro 8014e, Jet encre couleur, WiFi, Instant Ink inclus', 90.00, '71uj52AINgL._AC_UF1000,1000_QL80_.jpg', 2),
(15, 'Epson EcoTank ET-2860', 'Imprimante multifonction A4, EPSON, Ecotank ET-2860, Wi-Fi, Equipée de réservoirs d’encre', 200.00, '71L840Q+goL._AC_UF350,350_QL80_.jpg', 2),
(16, 'EPSON Expression XP-255', 'EPSON Imprimante Expression XP-255, multifonctions - 3 en 1,jet encre, couleur, ultra compact', 450.00, 'ld0005973366.webp', 2),
(17, 'EPSON Ecotank ET-2856', 'Imprimante multifonction Epson Ecotank ET-2856 - Jet encre - Impression recto-verso - Wi-Fi', 200.00, 'epson-ecotank-et-2826-imprimante-multifonctions-couleur.jpg', 2),
(18, 'EPSON Workforce 2860', 'Imprimante Jet encre multifonction 4-en-1 EPSON Workforce WF-2860 - Couleur', 350.00, 'epson-workforce-wf-2960dwf-1.webp', 2),
(19, 'HP DeskJet 2823e', 'Imprimante multifonction Hp DeskJet 2823E Tout en un \" ELIGIBLE INSTANT INK \"', 45.00, '71-186dy4l-1.jpg', 2),
(20, 'CANON MG2555S', 'Imprimante Multifonction CANON MG2555S Bureautique Impression Copie Scanner Noire', 200.00, 'canon-pixma-mg2555s_001.jpg', 2),
(21, 'EPSON XP-3200', 'Imprimante multifonction Epson XP-3200', 100.00, '710ozm4wowl.webp', 2),
(22, 'HP DeskJet 4222e', 'Imprimante tout-en-un HP Deskjet 4222e jet encre couleur, 3 mois Instant ink inclus avec HP+', 50.00, '4e70f5b2-7ffa-44ee-ae93-f05d962e88cc.webp', 2),
(23, 'HP DeskJet 2632', 'HP Deskjet 2632 All-in-One Imprimante multifonctions couleur jet encre USB 2.0', 250.00, 'hp-deskjet-2821e-all-in-one-imprimante-multifonctions-couleur-jet-d-encre-216-x-297-mm-original-a4-legal-support-jusqu-a-7-5-ppm-impreion-60-feuilles-usb-2-0-bluetooth-wi-fi-n-bleu-maroc.jpg', 2),
(24, 'Cartouches HP 305 Pack ', 'HP 305 Pack de 2 Cartouches Encre Noire et Trois Couleurs Authentiques (6ZD17AE)', 30.00, 'original-hp-305-multipack-standard-noir-couleurs-6zd17ae-120-100-pages.jpg', 3),
(25, 'Cartourche HP 305 trois couleurs ', 'HP 305 Cartouche encre trois couleurs authentique(CH562EE) pour HP Envy 6000 et HP DeskJet 2300', 30.00, 'cartouche-hp-305-couleur-3ym60ae-originale.jpg', 3),
(26, 'Cartouche HP 305 Noir', 'HP 305 Cartouche encre noire authentique (3YM61AE) pour HP DeskJet 2300/2700, HP Envy 6000/Pro 6400', 15.00, 'hp-305-cartouche-d-encre-noire-authentique-3ym61a.jpg', 3),
(27, 'Cartouche encre Epson Multipack 104', 'Compatible avec Epson EcoTank ET-2710..., ET-2726, Couleur : Noir, jaune, cyan, magenta,Pack de 4', 34.00, 'ld0005796882_1 (1).webp', 3),
(28, 'Cartouches EPSON Noir', 'EPSON Kit de Remplissage Encre Epson EcoTank 104, Noir ,Jet encre - 4500 Pages', 10.00, 'a3815c5c-f258-4d5f-812f-dc06771ac98b.jpg', 3),
(29, 'Cartouches EPSON Magenta', 'EPSON Kit de Remplissage Encre Epson EcoTank 104 - Magenta - Jet encre - 7500 Pages', 10.00, 'cartouche-encre-epson-ecotank-magenta-t104.jpg', 3),
(30, 'Cartouches EPSON Jaune', 'Cartouche encre Epson ECOTANK 104 JAUNE, jet encre 7500 pages', 10.00, 'cartouche-epson-104-jaune-c13t00p440-originale.jpg', 3),
(31, 'Cartouches EPSON Cyan', 'EPSON Kit de Remplissage Encre Epson EcoTank 104 - Cyan - Jet encre - 7500 Pages', 10.00, 'Epson_104_réservoir_dencre_cyan_dorigine_C13T00P240_052084_m1_big.jpg', 3),
(32, 'Cartouches Canon Noir', 'Cartouche encre - CANON - PG-540 (5225B001), taille L à 300 pages ISO/IEC 24711 - Noir - 8 ml', 10.00, 'oem_-_canon_-_5225_b_001_-_pg-540_-_cartouche_-_noire.jpeg', 3),
(33, 'Cartouches Canon MultiCouleurs', 'Cartouche encre - CANON - CL-541XL (5226B001) - Couleur (cyan, magenta, rouge) - 15 ml', 30.00, 'cartouche-canon-cli-526-consommables-pour-imprimante-jet-dencre-cartouche-canon-cli-526-compatible-avec-la-serie-pixma-ip4850-ip (1).jpg', 3),
(34, 'Souris Apple Magic Mouse', 'Technologie de connectivité : Sans fil, Couleur : Blanc, Poids : 99 g, Interfaces : Bluetooth', 50.00, 'mk2e3.jpg', 4),
(35, 'Claviers Apple Magic Keyboard', 'Clavier sans fil compact Bluetooth rechargeable (AZERTY, Francais)', 70.00, 'mk2a3z.jpg', 4),
(36, 'Prises CPL', 'CPL 1000 Mbps, Prise CPL avec 2 Ports Ethernet Gigabit et Prise Intégrée, Boitier CPL Kit de 2', 70.00, 'ld0004870450_2.webp', 4),
(37, 'Cables Ethernet RJ45', '20M Câble Ethernet Cat6 Câble Réseau Plat RJ45 Haut Débit Blindé 1Gbps 250MHz(Gris Argenté)', 15.00, 'n6lpatch10mgr.main_.webp', 4),
(38, 'Cartes SD', 'Carte Micro-SD 256 Go - Adaptateur inclus - Compatible smartphones et caméras', 15.00, '3615614646260_1.jpg', 4),
(39, 'Clés USB SanDisk', 'Clé USB 3.0 - SanDisk - Ultra 128 Go - Vitesse de lecture 130 Mo/s - Compatible Windows et Mac', 18.00, 'ld0001343664_2_0001343689.webp', 4),
(40, 'Disques Durs Externes', 'Disque dur externe Toshiba CANVIO 1To, Interfaces : USB 3.2 Gen 1 (compatible USB 2.0)', 80.00, 'toshiba-disque-dur-externe-hdtb420ek3aa-2tb-2.5.jpg', 4),
(41, 'Clavier Flilaire', 'Clavier - Filaire - Logitech - K120 Business - AZERTY - Noir', 16.00, 'clavier-filaire-cultura-3700408388362_0.jpg', 4),
(42, 'Webcams', 'Webcam - HP - 320 FHD - Résolution 2048x1536 - USB-A - Correction automatique image', 45.99, 'c08051358.png', 4),
(43, 'Cables D’Alimentation', '65W Chargeur pour Ordinateur Portable 19,5V 3,33A Bloc alimentation avec câble alimentation pour HP', 15.00, '71qax0-t1l._ac_sl1500_.jpg', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idClient`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idCommande`),
  ADD KEY `fk_commande_client` (`idClient`);

--
-- Indexes for table `ligne_commandes`
--
ALTER TABLE `ligne_commandes`
  ADD PRIMARY KEY (`idLignCommande`),
  ADD KEY `fk_ligne_commandes_commande` (`idCommande`),
  ADD KEY `fk_ligne_produit` (`idProduit`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idProduit`),
  ADD KEY `fk_produit_categorie` (`idCategorie`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`),
  ADD CONSTRAINT `fk_commande_client` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`);

--
-- Constraints for table `ligne_commandes`
--
ALTER TABLE `ligne_commandes`
  ADD CONSTRAINT `fk_ligne_commandes_commande` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`idCommande`),
  ADD CONSTRAINT `fk_ligne_produit` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`),
  ADD CONSTRAINT `ligne_commandes_ibfk_1` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`idCommande`),
  ADD CONSTRAINT `ligne_commandes_ibfk_2` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`);

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_produit_categorie` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`),
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
