# TODO

Suite à un audit effectué en amont, voici les failles et les bugs qui ont été identifés comme prioritaire.

## FAILLES

- Des utilsateurs non admin ont des accès à l'interface de gestion des utilisateurs
  Résolu : on ajoute les guard aux routes que l'on veux sécuriser
- Les mots de passes ne sont pas chiffrée en base de données...
  Résolu : Il faut utiliser dans la fonction register et la fonction `new()` de `Admin/UserController`, `password_hash()` pour hasher le mot de passe, ensuite on vérifie le hash avec `password_verify()` dans la fonction `login()`
- Des injections de type XSS ont été détéctées sur certains formulaires
  Résolu : On doit utiliser `htmlspecialchars()` dans les variables affichés dans les templates pour les échaper
- On nous a signalé des injections SQL lors de la création d'une nouvelles habitudes
  - exemple dans le champs "name" : foo', 'INJECTED-DESC', NOW()); --
    Résuolu : il faut faire des requetes protégées avec `prepare()` et `execute()`

## BUGS

- Une 404 est détéctée lors de la redirection après l'ajout d'une habitude
  Résolu : La redirection après la création redirigeait vers /habit, ce qui ne correspondait pas à la route déclaré dans routes.json
- Le formulaire d'inscription ne semble pas fonctionner
  Résolu : La fonction index du `RegisterController.php` était une méthode `$GET`, alors qu'il s'agit d'un `$POST`
- Fatal error: Uncaught Error: Class "App\Controller\Api\HabitsController" lorsque l'on accède à l'URL `/api/habits`
  Résolu : Il fallait renomer le controller `HabitsController` pour qu'il correspondent à celui de la route

**ATTENTION : certains bugs n'ont pas été listé**
