#Introduzione

Questo progetto vuole documentare passo passo l'implementazione di API 
utilizzando Symfony e Solid-o (https://solid-o.github.io/docs/#/).

Il progetto prevede due entita': Task e slot.
Task sono i compiti da svolgere.
Slot rappresentano degli slot temporali dedicati ai Task.

Un altro esempio e' disponibile al seguente url https://github.com/solid-o/example-symfony-app

#Preparazione del progetto
In una prima fase prepareremo il codice che fungera' da base per
utilizzare Solid-o.

##Creazione dell'ambiente

come indicato indicato in https://symfony.com/doc/current/setup.html
controllo della corretta configurazione dell'ambiente

> symfony check:requirements

e creiamo il progetto

> symfony new pertoteam --full
> 
> composer install


##Creazione delle entita'

Con il comando **./bin/console make:entity** creiamo le due entita' relazionate con i seguenti campi:

Task: title (string), kind (string), description (text), created_at (datetime), updated_at (datetime)
Slot: title (string), description (text), status (string),task (ManyTo One), created_at (datetime), updated_at (datetime)

Implementiamo i CRUD delle due entita' con il comando

> ./bin/console make:crud

##Creazione del database

creiamo il file **.env.local** dove inserire i parametri per accedere al database.
Come per esempio:

> DATABASE_URL="mysql://nomeutenteDb:PasswordUtente!@127.0.0.1:3306/nomeDB?serverVersion=8.0.23&charset=utf8"

Per una guida piu' dettagliata guardare vedi https://symfonycasts.com/screencast/symfony-doctrine/docker-env-vars#play

Ora siamo pronti per creare il database:

> bin/console doctrine:database:create

e creare le tabelle:

> ./bin/console  make:migration
> 
> ./bin/console doctrine:migrations:migrate

#Inizio 
Una volta creato l'ambiente possiamo concentrarci nella creazione delle API.
il codice fino ad ora scritto e' stato taggato con '001-APIstart'.

Iniziamo con l'installazione delle librerie necessarie.
 Installiamo la libreria Solido e tutte le parti di cui si avra' bisogno:

> composer require solido/solido

installiamo il bundle che si occupa di integrare solid-o con symfony:

> composer require solido/symfony

e come indicato nella documentazione ufficiale (https://solid-o.github.io/docs/#/./symfony-integration?id=symfony-integration)
aggiungiamo il bundle nella configurazione.
Quindi nel file bundles.php aggiungiamo:

>
>return [
> 
>...
> 
>Solido\Symfony\SolidoBundle::class => ['all' => true],
> 
>];
>
>

Facciamo un commit con un tag '002-inst_solido'

