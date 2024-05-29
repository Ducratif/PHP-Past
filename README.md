# PHP-Past
Un site en PHP qui permet d'ajouter du texte avec un titre.

En cadeau j'ai ajouter un system de connexion/inscription/Pin et de Mot de passe.

[**Documentation de l'api**](https://github.com/Ducratif/api-Past)


### **Structure du Projet**

```markdown
download_site/
├── paste.php
├── list_texts.php
├── db.php
└── sql/
    └── database.sql
```

Explications
paste.php : Cette page affiche un formulaire permettant à l'utilisateur de saisir un titre et du contenu texte, qui seront envoyés à save_text.php pour être enregistrés dans la base de données.

save_text.php : Ce script PHP reçoit les données du formulaire, les enregistre dans la table texts, puis redirige vers la page list_texts.php pour afficher la liste des titres des textes enregistrés.

list_texts.php : Cette page récupère tous les textes enregistrés depuis la base de données et les affiche sous forme de liste avec des liens vers une page de visualisation détaillée pour chaque texte.


### **Base de Données**
Assurez-vous que la table `texts` est créée dans votre base de données. Vous pouvez utiliser le fichier SQL suivant pour créer la table :

```sql
CREATE TABLE texts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL
);
```



### **Utilisation**
Assurez-vous que votre base de données est configurée et que le fichier db.php se connecte correctement à la base de données.
Créez la page `paste.php, save_text.php, et list_texts.php` dans votre répertoire.
Accédez à la page paste.php dans votre navigateur pour coller du texte avec un titre.
Le texte sera enregistré dans la base de données lors de la soumission du formulaire.
Accédez à la page list_texts.php pour voir la liste des titres des textes enregistrés, avec des liens vers chaque texte pour une vue détaillée.
Cette configuration vous permet de créer un système simple de gestion de textes où les utilisateurs peuvent coller du texte avec un titre et le récupérer ultérieurement. Vous pouvez également ajouter des fonctionnalités supplémentaires, comme la modification et la suppression de textes, en étendant les scripts PHP et les pages HTML/CSS.
