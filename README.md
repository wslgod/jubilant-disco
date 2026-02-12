# Box OAB

Plataforma SaaS educacional para preparação da OAB em Laravel 10+ com PHP 8.2.

## Importante: por que no GitHub aparece só este README?
O GitHub **não executa PHP/Laravel como hospedagem da aplicação**. Ao abrir o repositório pelo navegador, você verá arquivos/README, não o sistema rodando.

Para ver o sistema web, rode localmente (ou publique em servidor PHP com document root em `public/`).

## Como executar localmente
1. `cp .env.example .env`
2. Ajuste banco MySQL no `.env`
3. `composer install`
4. `php artisan key:generate`
5. `php artisan migrate --seed`
6. `php artisan serve`
7. Acesse `http://127.0.0.1:8000`

## Deploy em hospedagem compartilhada
- Aponte o domínio/subdomínio para a pasta `public/`
- Mantenha `storage/app/private_materials` fora de acesso público
- Garanta permissões de escrita em `storage/` e `bootstrap/cache/`

## Credenciais admin padrão
- E-mail: `admin@boxoab.com`
- Senha: `12345678`
