CREATE TABLE descriptions (
	 id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	 customer_id INT UNSIGNED,
	 description TEXT,
	 created DATETIME,
	 modified DATETIME,
     FOREIGN KEY (customer_id) REFERENCES customers(id)
 )
