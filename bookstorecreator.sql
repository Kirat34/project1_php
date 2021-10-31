-- PROJECT 1 ----

-- Part 1 - Creating Database and Table 


-- Creating Databse
Create database bookstore;


-- Creating table bookinventory
Create table bookinventory(
bookid int auto_increment,
name varchar(50),
author varchar(50),
price int,
quantity int,
PRIMARY KEY (bookid)
);

-- Creating Orders table
Create table orders(
orderid int auto_increment,
FirstName varchar(50),
Lastname varchar(50),
Item_purchased int ,
PRIMARY KEY (orderid));
