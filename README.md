


```markdown
# 📚 Plataforma de Ensino - Libro Studio

API RESTful desenvolvida em **Laravel** para gerenciamento de **alunos, cursos e matrículas**, incluindo um relatório de alunos por **faixa etária**, **curso** e **sexo**.  
Este projeto foi desenvolvido como teste prático para vaga de Analista Desenvolvedor(a) Back-end.

---

## 🚀 Tecnologias Utilizadas

- PHP 8.1+
- Laravel 10+
- SQLite (banco local leve, ideal para testes)
- Composer (gerenciador de dependências)
- PHPUnit (para testes automatizados)
- RESTful API com validação e Clean Code

---

## 📦 Funcionalidades Implementadas

### 📘 Alunos
- CRUD completo
- Validação de dados
- Busca por `nome` e `email`

### 📙 Cursos
- CRUD completo
- Validação de título e descrição

### 📗 Matrículas
- Associar aluno e curso
- Validação de relacionamentos
- Exibição de dados com relações

### 📊 Relatório Especial
- Total de alunos por **faixa etária**, **curso** e **sexo**
- Agrupado automaticamente via SQL otimizado

---

## ⚙️ Instalação e Execução

### 1. Clone o repositório

```bash
git clone https://github.com/seu-usuario/libro-ensino.git
cd libro-ensino
```

### 2. Instale as dependências

```bash
composer install
```

### 3. Configure o ambiente

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Use SQLite ou configure seu banco

- Já incluso um `database.sqlite` para testes rápidos

No `.env`:

```
DB_CONNECTION=sqlite
DB_DATABASE=/caminho/para/seu/database.sqlite
```

### 5. Rode as migrations

```bash
php artisan migrate
```

### 6. Inicie o servidor local

```bash
php artisan serve
```

Acesse: [http://localhost:8000](http://localhost:8000)

---

## 🔗 Endpoints da API

### 🧑 Alunos
| Método | Rota                         | Descrição                         |
|--------|------------------------------|-----------------------------------|
| GET    | `/api/alunos`               | Listar alunos                     |
| GET    | `/api/alunos/{id}`          | Exibir aluno                      |
| POST   | `/api/alunos`               | Criar aluno                       |
| PUT    | `/api/alunos/{id}`          | Atualizar aluno                   |
| DELETE | `/api/alunos/{id}`          | Remover aluno                     |
| GET    | `/api/alunos/buscar`        | Buscar por nome e/ou e-mail       |

### 📘 Cursos
| Método | Rota                         | Descrição                         |
|--------|------------------------------|-----------------------------------|
| GET    | `/api/cursos`               | Listar cursos                     |
| GET    | `/api/cursos/{id}`          | Exibir curso                      |
| POST   | `/api/cursos`               | Criar curso                       |
| PUT    | `/api/cursos/{id}`          | Atualizar curso                   |
| DELETE | `/api/cursos/{id}`          | Remover curso                     |

### 📝 Matrículas
| Método | Rota                          | Descrição                        |
|--------|-------------------------------|----------------------------------|
| GET    | `/api/matriculas`            | Listar matrículas                |
| GET    | `/api/matriculas/{id}`       | Exibir matrícula                 |
| POST   | `/api/matriculas`            | Criar matrícula (aluno + curso) |
| PUT    | `/api/matriculas/{id}`       | Atualizar matrícula             |
| DELETE | `/api/matriculas/{id}`       | Remover matrícula               |

---

## 📊 Relatório de Faixa Etária

```http
GET /api/relatorios/faixa-etaria
```

Retorna o total de alunos agrupados por:

- Curso
- Sexo (M, F, O)
- Faixas:
  - `< 15`
  - `15–18`
  - `19–24`
  - `25–30`
  - `> 30`

---

## ✅ Testes Automatizados

Executar todos os testes:

```bash
php artisan test
```

Testes cobrem:

- Criação de alunos com dados válidos e inválidos
- Matrícula entre aluno e curso
- Relatório de faixa etária funcionando corretamente

---

## 📁 Estrutura do Projeto

```
├── app/
│   ├── Models/            # Aluno, Curso, Matricula
│   └── Http/Controllers/Api/
│       ├── AlunoController
│       ├── CursoController
│       ├── MatriculaController
│       └── RelatorioController
├── database/
│   ├── migrations/
│   └── database.sqlite
├── routes/
│   └── api.php
```

---

## 🎯 Boas Práticas Adotadas

- Clean Code
- Single Responsibility nos controllers
- Validação via Form Request simplificada
- Código preparado para expansão (login, permissões etc.)

---

## 🧠 Considerações

> Caso não haja tempo para implementar mais funcionalidades, o sistema já está funcional e alinhado aos requisitos principais, com possibilidade de extensão simples.

---

**Desenvolvido por Rafael Dias**  
Contato: [linkedin.com/in/rafaeldiasdev](https://linkedin.com/in/rafaeldiasdev)
```

---

