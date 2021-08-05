# Inventory-management-system-
Inventory management system  using HTML, CSS, PHP, JavaScript, MYSQL
In this emerging world of technology, every system is computerized and is available online. The Inventory Management of any organization is one of a critical requirement for the business success of the industry. A Cable can be defined as a number of insulated metallic conductors bunched in a compact form by providing mechanical protection and electrical insulation. Cable can be classified as Underground Cable (laid underground), Submarine cable (laid under water), Aerial cable (laid over head) and Indoor cable (laid along the walls of building). Jelly filled cable is an underground cable having polythene as insulation on conductors and the inter-spaces between the conductors is fully filled with petroleum jelly. Petroleum jelly prevents ingress of moisture and water inside the core in the event of any damages to the cable. The Cable is circular throughout its length and is free from any physical defects. An inventory management system (or inventory system) is the process by which one can track their goods throughout the supply chain, from purchasing to production to end sales. It is a systematic approach to sourcing, storing, and selling inventory—both raw materials (components) and finished goods (products). The main objective of this application is to allow the management (admin), who is usually the Logistics manager of an organization to see the customer orders, check the stock position of the products, raw materials and manage the vendor in a single dashboard. This also allows customers to place their orders online. It also provides the Vendor to raise Invoices and collect the payments from the management. The portal believes in providing the most secure and convenient Order Management system, keeping the customers orders confidential. 
Problem Statement
The Supertronix, a company which sells jelly filled cables, purchases raw materials from the registered vendors and sells the cables to the customers. 
The aim of this project is to design a platform where admin can manage and run the company smoothy by keeping track of raw materials, check the orders from customer and deliver the same to the respective customer. It is also used to keep track of the product stock and update the menu if the stock is unavailable. 
The database system contains various raw materials and products in stock along with their cost.
The system provides the user with a choice of different cables available for purchase in the store. Once a cable is selected, it can be added to the cart and based on the customer’s choice, Order details can be generated or further shopping is done.

**Objectives**
•	Provide customers, vendors and admin with a safe and secure system to avail the benefits of the application. 
•	Provides the customer to buy suitable product according to their requirement. 
•	Provides the customer to view their orders till date.
•	Provides the admin to buy the raw materials from any of the registered vendors. 
•	Provides the admin to view both customer and vendor orders.
•	It also makes it easy for admin to update product and raw material stock.
•	Make a user-friendly system with easy manipulation facilities. 

**Dataset Description**
Given below are the entities along with its attributes and relations present in the database of this application that are used to retrieve information from the database as per requirement.
•	An entity type ‘USER’ with attributes user_id, fname, lname, company_name, username, email, password, role and phone where user_id is the primary key attribute. 
•	An entity type ‘PRODUCT’ with attributes prod_id, prod_name, price and stock  where prod_id is the primary key attribute. 
•	An entity type ‘RAW_MATERIAL’ with attributes raw_id, raw_name, price and stock where raw_id is the primary key attribute. 
•	An entity type ‘ORDERS’ with attributes order_id, user_id, date_order, date_clrd and status which has order_id as the primary key attribute and user_id as foreign key from USER entity.
•	An entity type ‘ORDER_ITEMS’ with attributes order_items_id, order_id, prod_id, qty, price and amt where order_items_id acts as the primary key attribute, order_id as foreign key from ORDER entity and prod_id as foreign from PRODUCT entity.
•	An entity type ‘VENDOR_ORDERS’ with attributes order_id, user_id, date_order, date_clrd and status which has order_id as the primary key attribute and user_id as foreign key from USER entity.
•	An entity type ‘VENDOR_ORDER_ITEMS’ with attributes order_items_id, order_id, prod_id, qty, price and amt where order_items_id acts as the primary key attribute, order_id as foreign key from ORDER entity and prod_id as foreign from PRODUCT entity.
•	An entity type ‘STATUS_CHECK’ with attributes id and flg .

**Software Requirements**
•	Operating System	      :	   Windows 10, 64 bit
•	Front End            	  :	   HTML5, CSS, JavaScript
•	Server side language    :    Php
•	Back end              	:	   MySQL
•	Web Server              :	   Apache
•	Browser              	  :	   Chrome
•	Application software    :    XAMPP

