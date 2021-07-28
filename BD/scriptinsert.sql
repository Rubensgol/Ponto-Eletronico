insert into cargo(descricao,atribuicao)
values("responsável pela administração o sistema de ponto e da empresa","administrador"),
("responsável pela limpeza geral","auxiliar de limpeza"),
("responsável pelos serviços mecanicos","mecânico"),
("responsável pela manutenção de equipamentos da empresa","auxiliar de mecânico"),
("responsável pelo atendimento ao cliente","atendente");
select * from  cargo ;
insert into funcionario(cpf,telefone,email,nome,cargo_id_cargo)
values("12593199854","21991260891","rubenssilva@gmail.com","Rubens Silva Lima",1),
("28366553132","21991315410","ppedromartincastro@grupomozue.com.br","Pedro Martin Castro",2),
("86317859973","21991184091","flavia__antoniacosta@arablock.com.br","Flávia Rafaela Antônia Costa",3),
("06291283590","21997464571","alexandreiagomoura-70@netwis.com.br","Alexandre Iago Moura",3),
("94268730400","21998118245","thomasbeniciopereira-91@paae.com.br","Thomas Benício Pereira",3),
("64075890457","21987694093","lauramariacastro__lauramariacastro@netwis.com","Laura Maria Castro",3),
("59264453881","21988073146","elainerebecamartins_@meddi.com.br","Elaine Rebeca Martins",4),
("28698198546","21996319845","eenricocaiorenatodacruz@vuyu.com.br","Enrico Caio Renato da Cruz",4),
("44654400303","21982669804","brenoantoniopedrodossantos-77@pib.com.br","Breno Antonio Pedro dos Santos",4),
("84192507242","21985175379","louise__elainedaluz@pib.com.br","Louise Elaine da Luz",5);


insert into tipo_ponto(descricao) values("Email"),
("SMS"),
("WhatsApp"),
("Impresso");
insert into tipo_registro(descricao)values("Entrada"),
("Saída"),
("Início Pausa"),
("Fim Pausa"),
("Feriado");

insert into administrador()values("rubens","2816","12593199854");

insert into ponto(tipo_ponto_id,tipo_registro_id,funcionario_cpf)values(1,1,"12593199854"),
(2,4,"28366553132"),
(4,3,"86317859973"),
(3,2,"06291283590"),
(5,3,"94268730400"),
(2,1,"64075890457"),
(5,1,"59264453881"),
(2,3,"28698198546"),
(3,2,"44654400303"),
(6,2,"84192507242");
select P.momento, F.nome, R.descricao,T.descricao from ponto P 
inner join funcionario F on P.funcionario_cpf=F.cpf
inner join tipo_registro R on P.tipo_registro_id=R.id
inner join tipo_ponto T on P.tipo_ponto_id=T.id;

select * from tipo_ponto;