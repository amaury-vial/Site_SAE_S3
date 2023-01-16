
# SAE S3 - FindTheBreach




[![My Skills](https://skills.thijs.gg/icons?i=php)](https://skills.thijs.gg)[![My Skills](https://skills.thijs.gg/icons?i=html)](https://skills.thijs.gg)[![My Skills](https://skills.thijs.gg/icons?i=css)](https://skills.thijs.gg)[![My Skills](https://skills.thijs.gg/icons?i=js)](https://skills.thijs.gg)

Projet universitaire visant à la création d'un **serious game** sur les réseaux, évolutif.  
Nous avons choisi un scénario afin de rendre l'application plus attrayante :   

Vous êtes un étudiant en informatique et vous venez de trouver une signature laissée par un groupe de hackers. Votre mission est de les retrouver afin de les dénoncer à la police.  

Ce site sert à se connecter et à administrer l'application.

## Demandes ✍️

- Jeu qui sert de support pour les cours téléchargeable depuis le site
- Site web pour administrer le contenu du jeu
- Utilisation des sockets

## Ce que nous avons réalisé ⚙️

Site :

- Une page d'accueil qui explique l'histoire et le fonctionnement du jeu
- Une page de connexion/inscription
- Une page réservée aux administrateurs où ils peuvent :
  - Modifier / ajouter / supprimer les questions
  - Récupérer le score des joueurs

## Démarrage 🚀

Site accessible sur <https://findthebreach.ddns.net>

## Utilisation 🎮

- Page d'accueil :

![page d'accueil](imagesReadme/index.png)

  Sur cette page vous pouvez lire l'histoire de notre application, mais aussi voir comment l'application fonctionne. De plus, si vous êtes connecté, vous pouvez télécharger l'application en cliquant sur l'image. Si vous n'êtes pas connecté cela vous redirigera vers la page de connexion. Vous pouvez aussi accéder à cette page en cliquant sur « Connexion » en haut à droite de la page.

- Page de connexion / inscription :

![Page de connexion / inscription](imagesReadme/connxion.jpg)

  Sur cette page vous pouvez vous connecter ou vous inscrire. Vous pouvez changer de formulaire en cliquant sur ce que vous voulez faire juste en dessous du formulaire. Si vous avez oublié votre mot de passe, vous pouvez cliquer sur « Mot de passe oublié ? » pour déclencher la procédure pour récupérer votre mot de passe. Lorsque que vous êtes connecté, vous pouvez vous déconnecter en cliquant sur « Se déconnecter ».

- Page d'administration :
  Disponible uniquement si vous êtes connecté avec un compte administrateur.
  Sur cette page vous trouvez 2 sections. Une pour les questions et une pour les joueurs. Vous pouvez changer de section en sélectionnant la section.
  
  ![question joueur](imagesReadme/questionjoueur.png)
  
  De plus, vous trouverez en bas de page, toutes les questions.
  
  ![liste question](imagesReadme/question.png)

  - Pour les questions :
    Disponible uniquement si vous êtes connecté avec un compte administrateur.
    Sur cette page vous pourrez trouver 3 formulaires :
    - Le premier sert à modifier les questions. En entrant le numéro de la question le formulaire se remplit avec la question sélectionnée et vous pouvez modifier les champs que vous voulez.
    
    ![formulaire](imagesReadme/form1.png)
    
    - Les deux autres formulaires concernent uniquement les questions de la partie jeu (à partir de la question 15) :
      - Le deuxième permet d'ajouter une question.
      
      ![formulaire](imagesReadme/form2.png)
      
      - Le dernier sert à supprimer une question.
      
      ![formulaire](imagesReadme/form3.png)

  - Pour les joueurs :
  
  ![formulaire](imagesReadme/joueur.png)
  
    Vous pouvez voir le top 5 des joueurs. En dessous, vous trouverez un formulaire pour recevoir par mail le score des joueurs que vous voulez. Il faudra juste séparer le nom des joueurs par «, ».

### Lien GitHub de l'application

Lien : https://github.com/frederic-egenscheviller/SAE_S3

### Mesures d'amélioration

Pour améliorer notre projet, nous aurions utilisé une architecture MCV. Et nous améliorerions le style du site qui est classique.

## Membres du projet 🧑‍💻

- Ceccarelli Luca
- Egenscheviller Frédéric
- Ramdani Djibril
- Saadi Nils
- Vial Amaury
