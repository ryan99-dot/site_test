# site_test

Site test présentant deux pages dont une d'accueil et une de contact.
Le formulaire permet l'envoi de mails. 

---

## Installation

Installer TailWind : 
```
composer require symfonycasts/tailwind-bundle
php bin/console tailwind:init
```

Installer FlowBite :
```
php bin/console importmap:require flowbite
php bin/console importmap:require flowbite/plugin
```

Installer MailHog :
```
sudo apt-get -y install golang-go
sudo apt-get install git
go install github.com/mailhog/MailHog
```


---

## Usage

Pour utiliser MailHog, j'ai dû créer une base de données.
Et utiliser la commande suivante afin de créer la table messenger_messages :

```
php bin/console messenger:setup-transports
```

Et la commande suivante pour permettre l'envoi et la réception des mails :

```
php bin/console messenger:consume async --time-limit=3600
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
