# Questions

Répondez ici aux questions théoriques en détaillant un maxium vos réponses :

1. Expliquer la procédure pour réserver un nom de domaine chez OVH avec des captures d'écran (arrêtez-vous au paiement) :

- Se rendre sur le site officiel d'OVH
- Utiliser la barre de recherche dédiée aux domaines sur la page d'accueil
- Saisir le nom de domaine souhaité
- Cliquer sur "Rechercher"
- Vérifier la disponibilité de son domaine
- Le selectionner son extension (.fr, .com, .net, .eu, etc.)
- Cocher le(s) domaine(s) souhaité(s)
- Choisir la durée d'enregistrement
- Choisir et configurer ses options
- Créer un compte et payer afin de reserver le nom de domaine

2. Comment faire pour qu'un nom de domaine pointe vers une adresse IP spécifique ?

Accéder à la gestion DNS chez OVH
Connection à mon espace client OVH je vais dans la section "Noms de domaine" je sélectionne le domaine concerné puis je clique sur l'onglet "Zone DNS"

Pour pointer le domaine principal (habit-tracker.com) :
Je choisi le type d'enregistrement, le Nom/Sous-domaine si besoin, je defini mon adresse IP (192.168.23.143)

Configuration côté serveur (aaPanel)
Une fois les DNS configurés, il faut également configurer le serveur pour je me connecte à aaPanel je vais dans "Website" > "le site créer sur 192.168.23.143"
J'ajoyte le nom de domaine
Puis aaPanel crée automatiquement la configuration Nginx/Apache pour ce domaine

3. Comment mettre en place un certificat SSL ?

Certificat SSL
Je me connecte à aaPanel, je vais dans "Website", je sure mon site dans la liste et je vais dans "Settings"
Je vais dans l'onglet "SSL" et je fais "Apply"

Activation du SSL
Après l'obtention du certificat je dois Cocher "Force HTTPS" pour rediriger automatiquement HTTP vers HTTPS
