# GDC Gestionnaire de Don Certifié

Cette application est resté en phase de prototype et a été réalisée lors d'un projet académique en 1<sup>ère</sup> année d'école d'ingénieur, (suivre ce **[lien](http://certified-donation-gestionary.epizy.com/)** pour la tester) : 

Nous souhaitons, par ce projet, aider les associations humanitaires à se développer correctement. Pour cela nous souhaitons résoudre un problème en particulier lié à la réception des dons pour les associations d’aide humanitaire par des particuliers par le biais du numérique. 
Nous savons qu’il existe actuellement des requêtes de dons numériques capables de récolter les dons à travers des moyens de payement en ligne. En conséquence, l’objectif sera d’améliorer les services de dons en ligne en créant nous mêmes une nouvelle plateforme numérique plus sécurisée et répondant aux certifications et normes en vigueur dans l'Europe, chaque association sera scrupuleusement évaluée sur ces normes et sera ensuite intégré ou non à notre plateforme. Celle-ci sera alors capable de répondre aux besoins des associations d’aide humanitaire et à la volonté de transparence des donnateurs lors de leurs actes de charité. 


***Vidéo de présentation du projet***

[![Alt text](Ressource-Read-Me/Capture.JPG)](https://www.youtube.com/watch?v=J5qV5SJTtuc&ab_channel=VincentBernet)

---

## Table des Matières 

- **[Fonctionnalités](#features)**
- **[Installation en local](#installation)**
- **[Licence](#licence)**

---
<a name='features'></a>
## Fonctionnalités
Sur cette application, voici les principales fonctionnalités implémentées :
 - Complete CRUD application
 - Login/Register/Logout possibility linked to our DataBase
 - Posibility to read/edit/delete only the profile created your own userprofile. 
 - Data validation all over our forms (via php and some java alert), using Session to set flash message
 - All forms use Session to avoid reloading thepage and get anoying pops up and ressending data to our database with only Post.
 - Night mode button using Java script to change css of our whole website, using changment of CSS on the DOM and saving those on localstorage
 - Html and CSS injections protection via Html entities and using pdo to make the link beetween our page and our DataBase

---
<a name='installation'></a>
## Installation Local Optionnelle (déjà en ligne)

Premièrement vous avez besoin d'une plateforme de serveur local comme MAMP ou XAMP <br /><br />
1] Télécharger le dossier complet dans votre dossier "htodcs" du serveur local <br />
2] Aller sur votre page PHPmyAdmins et créer une nouvelle database nommée GDC <br />
(Vous pouvez copier-coller le script Sql suivant : CREATE DATABASE GDC DEFAULT CHARACTER SET utf8 ;) <br />
3] Aller dans l'interface sql de cette DataBase et copier-coller les querrys SQL qui suivent : <br />

 ``` sql
--
-- Table structure for table `don`
--

CREATE TABLE `don` (
  `Don_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Association` text,
  `NumCarte` int(255) DEFAULT NULL,
  `DateExpi` int(255) DEFAULT NULL,
  `Crypto` int(255) DEFAULT NULL,
  `Titulaire` varchar(255) DEFAULT NULL,
  `Montant` int(255) DEFAULT NULL,
  `Date_Don` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for tale `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `FirstName` varchar(128) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Email` varchar(128) DEFAULT NULL,
  `Password` varchar(128) DEFAULT NULL,
  `PhoneNumber` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `don`
--
ALTER TABLE `don`
  ADD PRIMARY KEY (`Don_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `email` (`Email`),
  ADD KEY `email_2` (`Email`),
  ADD KEY `password` (`Password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `don`
--
ALTER TABLE `don`
  MODIFY `Don_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `don`
--
ALTER TABLE `don`
  ADD CONSTRAINT `don_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
```
4] Seulement si vous êtes sur Mac : allez dans le fichier pdo.php et changez le numéro de port en 8808 <br/>

&nbsp;&nbsp;&nbsp; ![Pdo.php](Ressource-Read-Me/pdo.JPG)

5] Run le fichier index.php sur votre moteur de recherche, s'il n'y a pas de message d'erreur SQL alors tout fonctionne !
S'il subsiste une erreur de ce type, vérifier votre database et votre numéro de port.

---

<a name='licence'></a>
## License

[![License](http://img.shields.io/:license-mit-blue.svg?style=flat-square)](http://badges.mit-license.org)

- **[MIT license](http://opensource.org/licenses/mit-license.php)**
- Copyright 2021 ©  **<a href="https://www.linkedin.com/in/k%C3%A9vin-thanh-le-floch/" target="_blank">Le FLOCH Kevin</a>, <a href="https://www.linkedin.com/in/vincent-bernet/" target="_blank">Bernet Vincent Marie</a>, <a href="https://www.linkedin.com/in/jean-pierre-tran/" target="_blank">Tran Jean-Pierre</a>, <a href="https://www.linkedin.com/in/theo-bedouet/" target="_blank">Bedouet Théo</a>, <a href="https://www.linkedin.com/in/gninhinlifanguy-siedou-moustapha-coulibaly-79201a197/" target="_blank">Coulibaly Siedou Moustapha</a>**.
