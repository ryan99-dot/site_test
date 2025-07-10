# site_test

Site test présentant deux pages dont une d'accueil et une de contact.
Le formulaire permet l'envoi de mails. 

---

## Pour lancer le site

```
composer install
php bin/console tailwind:build
symfony serve
```

---

## Pour mon projet, j'ai utiliser

Pour TailWind :
```
composer require symfonycasts/tailwind-bundle
php bin/console tailwind:init
```

Pour FlowBite : 
```
php bin/console importmap:require flowbite
php bin/console importmap:require flowbite/plugin
```

---

## Technologies

- Linux
- Symfony 7.3
- TailWind v4
- FlowBite
- PHP 8.4.10
- MailHog
- MariaDB 10.11.13
