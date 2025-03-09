# Arquitetura do Site do Jogo

## **1. Tecnologias Utilizadas**
- **Frontend:** Next.js  
- **Backend:** Laravel  
- **Autenticação:** JWT  
- **Banco de Dados:** Firebase  
- **Microserviços:**
  - Cadastro de usuários e NPCs  
  - Validação de NPCs  

## **2. Estrutura do Sistema**
### **Frontend (Next.js)**
- Exibe informações sobre o jogo e a campanha.  
- Permite o cadastro e login de usuários.  
- Consome APIs do backend para envio de dados.  

### **Backend (Laravel)**
- Gerencia autenticação e autorização com JWT.  
- Fornece APIs para comunicação com o frontend.  
- Controla a lógica de negócios para cadastro e validação.  
- **Envia e-mails de confirmação** para usuários recém-cadastrados.  
- Integração com serviços de e-mail (ex: Mailgun, SendGrid, SMTP).  

### **Microserviço de Cadastro de Usuários e NPCs**
- Processa o registro de usuários.  
- Garante a unicidade de cada NPC (um CPF por NPC).  
- Armazena dados no Firebase.  
- Aciona o envio de e-mail de confirmação após o cadastro.  

### **Microserviço de Validação de NPCs**
- Verifica informações do NPC antes da aprovação.  
- Impede cadastros com nomes ou características inadequadas.  
- Retorna status de aprovação ao serviço de cadastro.  

## **3. Segurança e Comunicação**
- **JWT** para autenticação segura entre frontend e backend.  
- **Firestore/Firebase Realtime Database** para armazenamento e sincronização de dados.  
- **Regras de segurança do Firebase** para proteger informações sensíveis.  
- **Verificação de e-mail** antes da ativação da conta.  

## **4. Escalabilidade e Manutenção**
- **Firebase** permite escalabilidade automática para lidar com grandes volumes de usuários.  
- **Arquitetura baseada em microserviços** melhora manutenção e modularidade.  
- **Next.js** para otimizar carregamento e performance no frontend.  
- **Sistema de filas no Laravel (ex: Redis, Amazon SQS)** para processamento assíncrono de e-mails.  
