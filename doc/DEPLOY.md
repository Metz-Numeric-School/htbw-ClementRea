# Procédure de Déploiement

Décrivez ci-dessous votre procédure de déploiement en détaillant chacune des étapes. De la préparation du VPS à la méthodologie de déploiement continu.

## Préparation du VPS

- Sur le vps, on se rend dans le dossier /var
- Créer un dossier `mkdir depot_git` qui nous servira de depot git bare
- On rentre dendans et on fait l'init `git init --bare`
- Installer aapanel
- Le configuer en lançant une quick install en single webserver model
- On ajoute un site, en mettant comme nom de domaine `rea.dfs.lan` de la machine
- En entrant aussi le path du worktree : bloc-4-dsf-training
- Il faut pointer vers le dossier /public, puis lancer le composer
- Ensuite, créer le .env à la racine du projet
- Une fois fait, on alimente la base de données avec les script SQL fait
- Et on créer une backup de la base de données dans aapanel

Le vps est prêt maintenant on n'a plus qu'à lui pousser le code pour qu'il déploie tout automatiquement

## Méthode de déploiement

- On créer un tag 1.0.0 (Pour le premier deploiement, ensuite on mettra celui que le CHANGELOG nous indique) depuis le code local
- Créer un remote qu'on appel vps `git remote add vps root@192.168.23.143:/var/depot_git`, et on push le tag dessus avec `git push vps tag  1.0.0`
- Dans le vps je créer un script qui va m'aider à déployer automatiquement `touch deploy.sh`
- Rentre dedans `nano deploy.sh` pour coller cette commande `VARNAME=${1:?"missing arg 1 for tag name or branch name"} git --git-dir=/var/depot_git --work-tree=/www/wwwroot/bloc4-dfs-training checkout -f $VARNAME`
- Donner les droit d'exécuter la commande `chmod +x deploy.sh`
- J'ai maintenant juste à executer `./deploy.sh 1.0.0` pour déployer le code en production
