CREATE TABLE customers (
	 id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	 kit_id INT UNSIGNED UNIQUE,
	 customer_name VARCHAR(250),
	 created DATETIME,
	 modified DATETIME,
	 FOREIGN KEY (kit_id) REFERENCES kits(id)
 )
 
