USE my_shop;
ALTER TABLE order_details
ADD CONSTRAINT order_detailsFkorders 
	FOREIGN KEY (order_id) REFERENCES orders (order_id)
    ON DELETE CASCADE;