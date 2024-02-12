# Laravel Boolfolio - Base 

Eseguire la struttura base di partenza di progetto Laravel per la gestione del sistema portolio di progetti partendo da un template già definito di cui passaggi: 

```
composer create-project laravel/laravel nomeprogetto
```

### Installazione breeze
```
composer require laravel/breeze --dev
```

### Scaffold dell'autenticazione breeze/blade
```
php artisan breeze:install
```

- Which Breeze stack would you like to install? Blade with Alpine
- Would you like dark mode support? Yes
- Which testing framework do you prefer? PHPUnit


### Eseguire i passaggi per installare bootstrap invece di tailwind
```
npm remove postcss
npm remove tailwindcss
npm i --save-dev sass
npm i --save bootstrap @popperjs/core
```
Cancellare il file tailwind.config.js e postcss.config.js
```
rm tailwind.config.js
rm postcss.config.js
```

Rinominiamo la cartella css in scss 
```
mv resources/css resources/scss
```
ed il file app.css in app.scss
```
mv resources/scss/app.css  resources/scss/app.scss
```

### Nel file app.scss
Cancelliamo gli import di tailwind dal file app.scss e inseriamo:
```
@import "~bootstrap/scss/bootstrap";
```

### Nel file vite.config.js:

- modifichiamo il percorso del css
- aggiungiamo un alias per resources e per il bootstrap

```
import path from 'path';

resolve: {
        alias: {
            '~resources': '/resources/',
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap')
        }
    },
```

### Nel file app.js 

- togliere il codice che imposta alpine, lasciando solo la prima riga
- importare app.css, bootstrap e img
```
import '~resources/scss/app.scss'
import * as bootstrap from 'bootstrap'
import.meta.glob([
    '../img/**'
])
```

### Inserire le views con bootstrap
Cancellare tutti i file di default dalla cartella views e inserire i file presenti in questa repo

### Partenza
1. installare le dipendenze di npm e composer
2. inserire dati nel file .env
3. far partire le migrations
4. avviare il server (php e node)


# 1 fase project laravel-auth
Ripercorriamo gli steps fatti a lezione ed iniziamo un nuovo progetto Laravel con autenticazione.
Iniziamo con il definire il layout, modello, migrazione, controller e rotte necessarie per il sistema portfolio:
1. Autenticazione: si parte con l'autenticazione e la creazione di un layout per back-office
2. Creazione del modello Project con relativa migrazione, seeder, controller e rotte
3. Per la parte di back-office creiamo un resource controller Admin\ProjectController per gestire tutte le operazioni CRUD dei progetti

✨ 6_febbraio_2024

# 2 fase relationi one to many
Continuazione progettazione portfolio / Boolfolio, aggiungiamo una nuova entità __Type__.
Questa entità rappresenta la tipologia di progetto ed è in relazione *one to many* con i progetti.
I task:
1. Creare la migration per la tabella types
2. Creare il model Type
3. Creare la migration di modifica per la tabella projects per aggiungere la chiave esterna
4. aggiungere ai model Type e Project i metodi per definire la relazione one to many
5. visualizzare nella pagina di dettaglio di un progetto la tipologia associata, se presente
6. permettere all’utente di associare una tipologia nella pagina di creazione e modifica di un progetto
7. gestire il salvataggio dell’associazione progetto-tipologia con opportune regole di validazione

✨ 9_febbraio_2024

# Descrizione consegna
Continuazione progettazione portfolio / Laravel Boolfolio - Project Technology, ggiungiamo una nuova entità __Technology__. Questa entità rappresenta le tecnologie utilizzate ed è in relazione *many to many* con i progetti.
I task:
1. creare la migration per la tabella technologies
2. creare il model Technology
3. creare la migration per la tabella pivot project_technology
4. aggiungere ai model Technology e Project i metodi per definire la relazione many to many
5. visualizzare nella pagina di dettaglio di un progetto le tecnologie utilizzate, se presenti
6. permettere all’utente di associare le tecnologie nella pagina di creazione e modifica di un progetto
7. gestire il salvataggio dell’associazione progetto-tecnologie con opportune regole di validazione

##### Bonus 1:
creare il seeder per il model Technology.
##### Bonus 2:
aggiungere le operazioni CRUD per il model Technology, in modo da gestire le tecnologie utilizzate nei progetti direttamente dal pannello di amministrazione.

✨ 12_febbraio_2024