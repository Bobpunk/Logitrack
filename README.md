#  LogiTrack API

API Backend robusta para gestão e rastreamento de entregas logísticas, desenvolvida com foco em segurança e escalabilidade.

##  Tecnologias Utilizadas

- **Linguagem:** PHP 8.2+
- **Framework:** Laravel 11
- **Banco de Dados:** MariaDB 
- **Autenticação:** Laravel Sanctum (Bearer Token)
- **Testes:** PHPUnit (Feature Tests)
- **Arquitetura:** MVC com Service Layer (Resources & FormRequests)

##  Funcionalidades Principais

- [x] **Autenticação Segura:** Login e Registro com tokens.
- [x] **Gestão de Entregas:** CRUD completo (Criar, Ler, Atualizar, Deletar).
- [x] **Escopo de Usuário:** O usuário só acessa e manipula suas próprias entregas (Relacionamento 1:N).
- [x] **Validação Avançada:** Camada de proteção com FormRequests.
- [x] **Respostas Padronizadas:** Uso de API Resources para JSON limpo.
- [x] **Testes Automatizados:** Cobertura de testes para rotas e segurança.

## Como Rodar o Projeto

1. **Clone o repositório:**
   ```
   git clone (https://github.com/SEU_USUARIO/logitrack-backend.git)

   ```