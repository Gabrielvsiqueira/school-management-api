<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## School Management API

School Management é uma API que reúne um conjunto de ferramentas voltadas à organização de sistemas de gestão educacional.  
Seu objetivo é disponibilizar uma API que auxilie no gerenciamento das atividades de todos os níveis de usuários de uma organização educacional (professores, alunos, class-models, relatórios, entre outros).

---

## Sobre o projeto

- Este projeto foi pensado e desenvolvido para servir como uma ferramenta facilitadora para a comunidade; por isso, está disponível 100% open source.
- Caso tenha interesse em adicionar alguma funcionalidade que sinta falta ou implementar melhorias, sinta-se à vontade para dar um fork. Estou disponível para conversarmos!
- Esta API tem como intuito encorajar mais desenvolvedores a construir e criar ferramentas para facilitar o dia a dia. Viva o open source!

---

## Ferramentas Utilizadas
- **Backend**: Laravel 12 (PHP Framework)
- **Linguagem**: PHP 8.2 ou superior
- **Base de Dados**: SQLite (padrão), configurável para MySQL/PostgreSQL
- **Testes**: PHPUnit / Pest

---

## Rotas disponíveis

- **Auth**  
  ``Route::post('/register', [AuthController::class, 'register']);`` <br>
  ``Route::get('/login', [AuthController::class, 'login']);``

- **Teacher**  
  ``Route::get('/teachers', [TeacherController::class, 'index'])->name('index');`` <br>
  ``Route::post('/teachers', [TeacherController::class, 'store'])->name('store');`` <br>
  ``Route::patch('/teachers/{teacher}', [TeacherController::class, 'update'])->name('update');`` <br>
  ``Route::delete('/teachers/{teacher}', [TeacherController::class, 'destroy'])->name('destroy');``

- **Student**  
  ``Route::get('/students', [StudentController::class, 'index'])->name('index');`` <br>
  ``Route::post('/students', [StudentController::class, 'store'])->name('store');`` <br>
  ``Route::patch('/students/{student}', [StudentController::class, 'update'])->name('update');`` <br>
  ``Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('destroy');``

- **ClassModel**  
  ``Route::get('/class-models', [ClassModelController::class, 'index'])->name('index');`` <br>
  ``Route::post('/class-models', [ClassModelController::class, 'store'])->name('store');`` <br>
  ``Route::patch('/class-models/{turma}', [ClassModelController::class, 'update'])->name('update');`` <br>
  ``Route::delete('/class-models/{turma}', [ClassModelController::class, 'destroy'])->name('destroy');`` <br>
  ``Route::post('/class-models/{turma}/professor', [ClassModelController::class, 'addTeacher'])->name('addTeacher');`` <br>
  ``Route::get('/class-models/{turma}', [ClassModelController::class, 'show'])->name('show');``

---

## Sobre as funcionalidades

### **Autenticação**
- O projeto utiliza o sistema de autenticação **Laravel Sanctum**, que possibilita a geração de tokens, permitindo a criação de usuários autorizados para utilizar as funcionalidades.
- Deve-se primeiramente:
    - Criar um usuário autenticado no sistema, gerando um Bearer Token;
    - Enviar esse token no campo *Authorization* da sua aplicação para permitir acesso às funcionalidades da API.

### **Professor**
- As funcionalidades de professor abrangem um CRUD, com as seguintes operações:
    - **Cadastrar** professor;
    - **Editar** um professor específico;
    - **Buscar** um professor ou todos os cadastrados no sistema;
    - **Deletar** um professor.

### **Turma**
- As funcionalidades de turma abrangem um CRUD, com as seguintes operações:
    - **Cadastrar** uma turma;
    - **Editar** uma turma específica;
    - **Buscar** uma turma ou todas as cadastradas no sistema;
    - **Gerar** um relatório da turma com todos os alunos e professores cadastrados;
    - **Deletar** uma turma.

### **Aluno**
- As funcionalidades de aluno abrangem um CRUD, com as seguintes operações:
    - **Cadastrar** aluno;
    - **Editar** um aluno específico;
    - **Buscar** um aluno ou todos os cadastrados no sistema;
    - **Deletar** um aluno.

---

## Como rodar o projeto

Para rodar o projeto localmente, você precisará ter instalado em sua máquina:

- [PHP 8.2+](https://www.php.net/downloads)
- [Composer](https://getcomposer.org/)
- [Git](https://git-scm.com/)

### Passo a passo

1. **Clone o repositório**
   ```bash
   git clone https://github.com/gabrielvsiqueira/school-management-api.git
   cd school-management-api


2. **Instale as dependências do PHP**
    ```bash
   composer install
   
3. **Gere uma chave da aplicação**
    ```bash
   php artisan key:generate
   
4. **Rode o projeto localmente e está disponível para testar**
    ```bash
   php artisan serve
    
5. **Acesse a documentação da API (Swagger)**
- Este projeto possui documentação completa seguindo o padrão OpenAPI 3.0, publicada via Swagger UI.
- Disponibilizei para verificação e testes dos endpoints.
    ```bash
  https://Gabrielvsiqueira.github.io/school-management-api/

---
   
## Autor
- Gabriel Vitor Siqueira.
- **[Linkedin](https://www.linkedin.com/in/gabriel-vitor-siqueira/)**

---

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
