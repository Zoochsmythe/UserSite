CREATE TABLE Customer (
	customerID int NOT NULL ,
	name varchar (50) NOT NULL ,
	phone_number varchar (50) NOT NULL ,
	shipping_address varchar (50) NOT NULL ,
	email_address varchar (50) NOT NULL
);

CREATE TABLE PaymentInfo (
	cardNumb varchar (50) NOT NULL ,
	billing_address varchar (50) NOT NULL ,
	card_type varchar (50) NOT NULL ,
	exp_date varchar (50) NOT NULL ,
	customerID int NOT NULL
);

CREATE TABLE Orders (
	order_numb int NOT NULL ,
	order_date date NOT NULL ,
	exp_delivery date NOT NULL ,
	order_type varchar (50) NOT NULL 
);

CREATE TABLE OrdersMade (
	customerID int NOT NULL ,
	order_numb int NOT NULL
);

CREATE TABLE PhoneOrder (
	serial_numb varchar (50) NOT NULL ,
	order_numb int NOT NULL
);

CREATE TABLE ServiceOrder (
	repairID int NOT NULL ,
	order_numb int NOT NULL
);

CREATE TABLE Phones (
	serial_numb varchar (50) NOT NULL ,
	phone_model varchar (50) NOT NULL ,
	price int NULL ,
	RAM varchar (4) NOT NULL ,
	CPU varchar (50) NOT NULL ,
	conditions varchar (50) NOT NULL ,
	screen_size double (10,1) NOT NULL ,
	brand varchar (50) NOT NULL
);

CREATE TABLE Service (
	repairID int NOT NULL ,
	repair_type varchar (50) NOT NULL ,
	phone_model varchar (50) NOT NULL ,
	parts_used varchar (50) NOT NULL ,
	price int NULL
);

CREATE TABLE Sales (
	employeeID varchar (50) NOT NULL ,
	order_numb int NOT NULL
);

CREATE TABLE RepairSpecialist (
	employeeID varchar (50) NOT NULL ,
	order_numb int NOT NULL
);

CREATE TABLE Employee (
	employeeID varchar (50) NOT NULL ,
	name varchar (50) NOT NULL ,
	address varchar (50) NOT NULL ,
	phone_number varchar (50) NOT NULL
);

CREATE TABLE Admin (
	username varchar (50) NOT NULL,
	password varchar (50) NOT NULL
);

insert into Customer values(18210,'John Smith','702-533-1111', '123 Mocking Bird Lane, Provo UT 84606', 'abc@yahoo.com');
insert into Customer values(18211,'Walter White','929-456-9865', '123 Mocking Bird Lane, Provo UT 84606', '123@yahoo.com');
insert into Customer values(18212,'Mandy Price','929-343-4323', '123 Mocking Bird Lane, Provo UT 84606', 'cat@yahoo.com');
insert into Customer values(18213,'Janet Jackson','929-764-2111', '123 Mocking Bird Lane, Provo UT 84606', 'tattoo@yahoo.com');


insert into PaymentInfo values('1234567891011121','642 E 500 N, Provo UT 84606','Visa','11/22',18211);
insert into PaymentInfo values('1234567891011122','123 Mocking Bird Lane, Provo UT 84606','Master Card','10/22',18210);
insert into PaymentInfo values('1234567891011123','642 E 500 N, Provo UT 84606','Visa','1/22',18213);
insert into PaymentInfo values('1234567891011124','642 E 500 N, Provo UT 84606','American Express','2/22',18212);


insert into Orders values(1,'2018-01-23','2018-01-26','Phone Order');
insert into Orders values(2,'2018-01-23','2018-01-26','Phone Order');
insert into Orders values(3,'2018-01-25','2018-01-30','Repair Order');
insert into Orders values(4,'2018-02-14','2018-02-24','Repair Order');

insert into OrdersMade values(18210,1);
insert into OrdersMade values(18211,2);
insert into OrdersMade values(18212,3);
insert into OrdersMade values(18214,4);

insert into PhoneOrder values('WCH101JLK',1);
insert into PhoneOrder values('ABC234DEF',2);

insert into ServiceOrder values(501,3);
insert into ServiceOrder values(502,4);

insert into Phones values('WCH101JLK','iPhone 8 Plus',750,'3gb','A11 Bionic','Good',5.5,'Apple');
insert into Phones values('ABC234DEF','Pixel 2',400,'4gb','Snapdragon 835','Fair',5.0,'Google');
insert into Phones values('YUMAD1232','Pixel 2 XL',850,'4gb','Snapdragon 835','Mint',6.0,'Google');
insert into Phones values('OKTHIS123','Galaxy S8',300,'4gb','Snapdragon 835','Good',5.8,'Samsung');
insert into Phones values('IKSER1234','Galaxy S8+',750,'4gb','Snapdragon 835','Good',6.2,'Samsung');


insert into Service values(501,'Screen Repair','iPhone 8 Plus','LCD Screen',120);
insert into Service values(502,'Screen Repair','iPhone 8','LCD Screen',70);

insert into Sales values('E41260', 1);
insert into Sales values('E41261', 2);

insert into RepairSpecialist values('E41262', 3);
insert into RepairSpecialist values('E41262', 4);

insert into Employee values('E41260', 'Jake Harrington', '123 Fake Ln, Provo UT 84606','702-545-9598');
insert into Employee values('E41261', 'Emily James', '123 Fake Rd, Provo UT 84606','801-565-9898');
insert into Employee values('E41262', 'Thor Earton', '123 Fake St, Provo UT 84606','360-285-5068');

insert into Admin values ('phoneguru','I love phones 123');
