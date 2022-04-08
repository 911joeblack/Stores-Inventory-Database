CREATE TABLE item (
	UPC int(12) not NULL,
    Restock_Amount varchar(255),
    Price varchar(255),
    Interim_price varchar(255),
    WholesaleP varchar(255),
    Current_Stock varchar(255),
    IDeptName varchar(255),
  PRIMARY KEY(UPC),
  FOREIGN KEY (IDeptName) REFERENCES Department(Name)
);

Create table Department(
  Name varchar(255) not NULL,
  Supervisor varchar(255),
  Section varchar(255),
  primary key(Name)
);

create table item_expiration (
  IEUPC int(12),
  Exp_Date varchar(255),
  primary key(Exp_Date),
  Foreign key(IEUPC) references item(UPC)
);

create table Suppliers(
  ID varchar(255)not NULL,
  Representative varchar(255),
  Rep_Number varchar(255),
  primary key(ID)
);

create table employee(
  ID varchar(255)not NULL,
  firstName varchar(255),
  LastName varchar(255),
  Permission_Level varchar(255),
  EDeptName varchar(255),
  primary key(ID),
  Foreign key(EDeptName) references Department(Name)
);

create table customer(
  CustomerID varchar(255)not NULL,
  CustomerName varchar(255),
  primary key(CustomerID)
);

create table Delivery(
  ID varchar(255)not NULL,
  Arrival_Date varchar(255),
  Truck_Num int,
  Pallet_Count int,
  primary key(ID)
);

create table Cus_Order(
  OUPC varchar(255),
  Date varchar(255),
  Amount int,
  Delivery_Value varchar(255),
  ODeliveryID varchar(255),
  Foreign key(OUPC) references item(UPC),
  Foreign key(ODeliveryID) references Delivery(ID)
);

CREATE TABLE transactions(
  TcustomerID varchar(255),
  TransactionID varchar(255)not NULL,
  Date VArchar(255),
  Time VArchar(255),
  
  primary key(TransactionID),
  Foreign key(TcustomerID) references customer(CustomerID)
);

CREATE TABLE item_Summary(
  ISUPC int(12),
  IScustomerID varchar(255),
  ISTransactionID varchar(255),
  amount_of_item int(255),
  Price_paid varchar(255),

  Foreign key(ISUPC) references item(UPC),
  Foreign key(IScustomerID) references customer(CustomerID),
  Foreign key(ISTransactionID) references transactions(TransactionID)
);

CREATE TABLE item_location(
  ILUPC int(12),
  Aisle varchar(255),
  Side_of_Aisle varchar(255),
  Section_Number int(255),
  shelf_Number varchar(255),
  number_of_items_from_start varchar(255),

  Foreign key(ILUPC) references item(UPC)
);

CREATE TABLE Purchase(
    PUPC int(12),
    POrder_Date varchar(255),

    Foreign key(PUPC) references item(UPC),
    Foreign key(POrder_Date) references Cus_Order(Date)
);

CREATE TABLE item_Identification(
    IIDUPC int(12),
    IIDcustomerID varchar(255),
    IIDTransactionID varchar(255),
    
    Foreign key(IIDUPC) references item(UPC),
    Foreign key(IIDcustomerID) references customer(CustomerID),
    Foreign key(IIDTransactionID) references transactions(TransactionID)
);

CREATE TABLE Coupon(
    ID varchar(255) NOT NULL,
    Amount_off varchar(255),
    Required_Puchases varchar(255),
    CUPC int(12),
    
    PRIMARY KEY (ID),
    Foreign key(CUPC) references item(UPC)
);

CREATE TABLE contain (
    CoUPC int(12),
    CocustomerID varchar(255),
    CoTransactionID varchar(255),
    
    Foreign key(CoUPC) references item(UPC),
    Foreign key(CocustomerID) references customer(CustomerID),
    Foreign key(CoTransactionID) references transactions(TransactionID)
);

CREATE TABLE Determines_Price (
    DUPC int(12),
    DcustomerID varchar(255),
    DTransactionID varchar(255),
    DCouponID varchar(255),
    
    Foreign key(DCouponID) references Coupon(ID),
    Foreign key(DUPC) references item(UPC),
    Foreign key(DcustomerID) references customer(CustomerID),
    Foreign key(DTransactionID) references transactions(TransactionID)
);

CREATE TABLE Provided_by(
    UPC int(12),
    SuppliersID varchar(255),
    
    Foreign key(UPC) references item(UPC),
    Foreign key(SuppliersID) references Suppliers(ID)
);

CREATE TABLE Products_Bought(
    PBUPC int(12),
    PBcustomerID varchar(255),
    Amount varchar(255),
    
    Foreign key(PBUPC) references item(UPC),
    Foreign key(PBcustomerID) references customer(CustomerID)
);

CREATE TABLE Download(
    DocustomerID varchar(255),
    DoCouponID varchar(255),
    Amount varchar(255),
    
    Foreign key(DoCouponID) references Coupon(ID),
    Foreign key(DocustomerID) references customer(CustomerID)
);

insert into item_expiration VALUES (123456789012,'12/21/2021'),(123456789012,'12/25/2021');
INSERT into Department Values('N1','SV1','S1'),('N2','SV2','S2'),('N3','SV2','S3');
INSERT into item VALUES(123456789012,66,45.99,50,43,23,'N1'),(123456789013,68,12,30,43,23,'N2'),
(123456789014,78,16,40,50,43,'N3'),(123456789015,88,100,150,143,123,'N4'),(123456789016,123,60,120,143,123,'N5');
insert into employee values (0001,'jose','TestL',01,'N1'),(0002,'TestF','John',02,'N3'),(0003,'Holy','Jacob',03,'N3');
insert into customer values (123,'J.Johson'),(223,'D.LuFi'),(323,'Naruto'),(423,'Sasuke'),(153,'Brain');
insert into Cus_Order values (123456789012,'3/4/2020',12,300,213131),(123456789014,'4/5/2020',35,16000,213133);


Select * FROM item;
Select * FROM employee;
Select * FROM Department;
select * from item_expiration;
select * from customer;
select * from Cus_Order;
