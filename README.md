# Box OAB

Plataforma SaaS educacional para preparação da OAB em Laravel 10+ com PHP 8.2.

## Requisitos principais implementados
- Landing page pública com planos Semestral/Anual e CTA “Começar agora”.
- Autenticação (registro, login e solicitação de recuperação de senha).
- Dashboard do aluno com menu lateral e histórico de materiais acessados.
- Estrutura `Disciplina > Assunto > Materiais`.
- Materiais dos tipos `pdf` e `resumo`.
- PDFs privados em `storage/app/private_materials`, entregues por streaming autenticado e URL assinada temporária.
- Controle de assinatura por middleware `CheckSubscription`.
- Painel admin para disciplinas, assuntos, materiais, alunos e assinaturas.
- Roles `admin` e `student`.
- Seeder com admin padrão (`admin@boxoab.com` / `12345678`).

## Setup
1. `cp .env.example .env`
2. Configure MySQL no `.env`
3. `php artisan key:generate`
4. `php artisan migrate --seed`
5. `php artisan serve`
