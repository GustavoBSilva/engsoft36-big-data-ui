# SisBPM TIC

O sistema BPM TIC tem como principal função a criação de novas funcionalidades que auxiliem a tarefa de mapeamento de processos da UFRJ.

## Tecnologias

A aplicação é desenvolvida em Laravel.
Para mais informações, consultar a documentação no site oficial do framework.

* php: >= 7.3
* composer: 1.9.3
* Laravel: 8.0

## Implantação

* Realizar o *clone* do projeto:
```
$ git clone https://github.com/GustavoBSilva/engsoft36-big-data-ui
```

* Executar o **composer** na raiz do projeto para a instalação das dependências:
```
$ composer install
```

* Criar o arquivo de definição e setar as variáveis do sistema, o arquivo .env (o arquivo .env.example possui as variáveis e pode ser copiado):
```
$ cp .env.example .env
```

* Atribuir a chave da aplicação:
```
$ php artisan key:generate
```

* Criar a base de dados conforme os arquivos de migração do projeto. **A base de dados já deve ter sido criada antes da execução do comando**:
```
$ php artisan migrate
```

* Configurar o serviço de disponibilização de aplicações.

* Fim.

