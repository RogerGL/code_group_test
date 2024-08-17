### Este projeto é uma aplicação web desenvolvida em Laravel para gerenciar jogadores de um time de futebol, incluindo suas presenças em jogos, a formação dos times e a funcionalidade de sorteio de times, respeitando regras específicas como a quantidade de jogadores por time e a presença de goleiros.
![image](https://github.com/user-attachments/assets/f34ba138-664e-4bea-a302-7986f3483612)
![image](https://github.com/user-attachments/assets/92c9919e-7707-4d4a-99d8-1274379e8144)
![image](https://github.com/user-attachments/assets/af907cfc-d580-436b-bb13-80685ee0fe15)
<img width="285" alt="Untitled" src="https://github.com/user-attachments/assets/a78354e4-36fd-42f6-8448-28e1a5204b11">

## Utilizado

- Laravel
- PHP
- Tailwind
- JavaScript

## Requisitos

- PHP >= 8.2
- Composer (LTS)
- MySQL (LTS)
- Node.js e NPM (LTS)


## Setup

- Clone the repository;
- Install dependencies (`npm install`) and (`composer install`);
- You can always generate .env file manually by running;
`cp .env.example .env
php artisan key:generate`
- Edit .env db
`DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3036
DB_DATABASE=nome_do_banco
DB_USERNAME=nome_do_usuario
DB_PASSWORD=senha`
- Copy `.env.example` file (`cp .env.example .env`);
- Run key generate (`php artisan key:generate`);
- Run migrations (`php artisan migrate`);
- Compilation assets (`npm install`) - (`npm run dev`);
- Run aplication (`php artisan serve`);
- View (`http://localhost:8000`);
