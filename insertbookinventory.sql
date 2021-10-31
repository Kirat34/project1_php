
-- Part 2 (Project 1)

-- Using Database bookstore

Use bookstore;

-- Inserting data into bookinventory table

Insert into bookinventory(bookid,name,author,price,quantity)
values
(null,"Macbeth","William Shakespear",12,30),
(null,"Pride and Prejudice","JaneAusten",13,20),
(null,"Alchemist","Paulo Coelho",20,15),
(null,"Hamlet","William Shakespear",20,25),
(null,"Cosmos", "Carl Sagan",35,11);


-- For viewing the entries
Select * from bookinventory order by bookid ;
