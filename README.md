# B1FW2

Projeto da Aula de PHP

---
Codificar um aplicativo, em PHP para controlar a 
freqüência e notas de alunos em uma sala de aula. O sistema deverá comportar a ação de 3 níveis de usuários (*master*, *professor* e *aluno*).

---
## Funcionalidades

- Primeiramente para digitar as freqüências, o usuário deve se logar no sistema. O sistema deverá conter um controle rigoroso e por nível de acesso. Um professor pode manipular as 
notas e freqüências dos alunos mas jamais pode excluir um aluno ou alterar os dados do
mesmo.

- Um usuário máster poder realizar qualquer tipo de operação junto ao banco, inclusive excluir e incluir alunos, professores e disciplinas. Este usuário pode inclusive associar
professores as disciplinas.

- Um professor, após logado, deverá escolher a disciplina para o qual se deseja digitar as notas e faltas. Em seguida inicia-se a digitação das faltas por aluno. Ao final da 
digitação o usuário devera gravar os dados no banco.

- Devera existir uma opção para a geração de relatórios com as quantidades de faltas acumuladas por aluno e por disciplina. Deverá inclusive gerar gráficos comparativos.

- Um usuário aluno poderá apenas consultar os dados cadastrados. O usuário aluno não poderá alterar qualquer tipo de informação junto ao banco.

- Poderá ser criado outras funcionalidades que achar necessário.
