
# 📦 Sistema de Gerenciamento de Clientes - API Laravel

Este projeto é uma API RESTful desenvolvida em **Laravel** para gerenciamento de **clientes**, **endereços** e **profissões**, com foco em boas práticas, validações completas, documentação Swagger e testes automatizados.

---

## 🚀 Funcionalidades

- Cadastro de clientes em 3 etapas (wizard)
- Validações de CPF/CNPJ, e-mail único, telefone com DDD
- CRUD completo de Clientes, Endereços e Profissões
- Filtro de clientes por nome
- Documentação interativa com Swagger
- Testes unitários com PHPUnit

---

## 🛠️ Tecnologias

- Laravel 10+
- PHP 8.1+
- MySQL
- Swagger (l5-swagger)
- PHPUnit

---

## 📁 Estrutura do Projeto

```
app/
 ├── Http/
 │    ├── Controllers/
 │    └── Requests/
 ├── Models/
 ├── Repositories/
 └── Services/
routes/
 └── api.php
tests/
 └── Unit/
```

---

## ✅ Testes

Para executar os testes unitários:

```bash
php artisan test
```

---

## 📄 Documentação da API

Acesse a documentação Swagger em:

```
http://localhost:8000/api/documentation
```

---

## ⚙️ Setup do Projeto

1. Clone o repositório
2. Instale as dependências:
   ```bash
   composer install
   ```
3. Copie o `.env.example` para `.env` e configure o banco de dados
4. Rode as migrations e seeders:
   ```bash
   php artisan migrate --seed
   ```
5. Inicie o servidor:
   ```bash
   php artisan serve
   ```

---

## 🧪 Testes Disponíveis

- Criação de cliente
- Atualização de cliente
- Listagem de clientes
- Exclusão de cliente
- Busca por nome
