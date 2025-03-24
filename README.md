# survival-game-website
Repositório para a disciplina de Programação Web, desenvolvido durante a quinta fase do curso de Engenharia de Software na Católica SC.
# Apresentação

O backend do projeto está parcialmente pronto e hospedado em  
[https://survival-game-website.onrender.com](https://survival-game-website.onrender.com).  

A documentação do banco de dados e dos endpoints pode ser acessada em  
[https://app.eraser.io/workspace/X8M7fcUgVXuESetD3dHq](https://app.eraser.io/workspace/X8M7fcUgVXuESetD3dHq).  

O banco de dados relacional utilizado é o Amazon RDS, hospedado na AWS.

# Validação dos NPCs

A validação dos NPCs no backend do jogo é gerenciada através da ferramenta de filas e jobs do Laravel. A cada 5 horas, o sistema executa o job **NPCValidatorJob**, que recupera os primeiros NPCs cadastrados e valida seus nomes por meio de uma requisição à OpenAI.

## Fluxo de Validação

1. **Inserção inicial**: Quando um NPC é cadastrado, seu status é inserido como **'Pending'** na tabela de NPCs.
2. **Execução do job**: O job **NPCValidatorJob** é executado a cada 5 horas e verifica os NPCs com status **'Pending'**. Para cada NPC, o sistema faz uma requisição à OpenAI para validar o nome, verificando se ele atende aos critérios definidos.
3. **Resultado da validação**: Com base na resposta da IA:
   - Se o nome for aprovado, o status do NPC é atualizado para **'Approved'**.
   - Se o nome for reprovado, o status do NPC é alterado para **'Reproved'**.
4. **Rejeição de NPCs**: Os NPCs que forem reprovados geram um registro na tabela **'npc_rejections'**, onde é armazenada a razão pela qual o nome foi invalidado.

Esse processo automatizado garante que a validação dos NPCs seja eficiente e escalável.

# Documentação Externa 
- [Ereaser (Fluxograma/Documentação)](https://app.eraser.io/workspace/4tiB9E65AJS6R6aDpp0W)
- [Jira (Tarefas)](https://criminal-cases.atlassian.net)
# Padrões de Desenvolvimento
- [Conventional Commits](./docs/patterns/conventional-commits.md)
- [Pull Requests](./docs/patterns/pull-requests.md)
# Releases
- [Releases](./docs/releases.md)
# Arquitetura
- [Architecture](./docs/architecture.md)
# Requisitos
- [Requirements](./docs/requirements.md)
### Feito por:  

**Mateus Finder Martins**  
**Lucas Warmling**
