1. SELECT * FROM actor WHERE last_name = 'Kilmer'

2. SELECT COUNT(DISTINCT last_name) AS unique_last_names FROM actor

3. SELECT last_name, first_name, email FROM customer ORDER BY last_name

4. SELECT last_name, first_name, email
   FROM customer
   WHERE active = 0
   ORDER BY last_name

5. SELECT last_name, first_name, address, phone, district
   FROM customer 
   inner JOIN address ON customer.address_id = address.address_id;


6. SELECT last_name, first_name, address, phone, district, city, country
   FROM customer 
   inner JOIN address ON customer.address_id = address.address_id
   inner join city on address.city_id = city.city_id
   inner join country on city.country_id = country.country_id
   where active=0;

7. SELECT title, rental_rate, language_id
   FROM film
   inner join film_category on film.film_id = film_category.film_id
   WHERE category_id = 14;

8. SELECT count(distinct title)
   FROM film
   inner join film_category on film.film_id = film_category.film_id
   WHERE category_id = 1;

9.  SELECT count(inventory.film_id )
   FROM inventory
   inner join film_category on inventory.film_id = film_category.film_id
   WHERE category_id = 1;

10. SELECT title, rental_duration
    FROM sakila.film
    WHERE replacement_cost BETWEEN 15 AND 23;

11. SELECT title
    FROM sakila.film
    inner join film_category on film.film_id = film_category.film_id
    WHERE category_id = 1 AND rating IN ('PG-13', 'R', 'NC-17');

12. SELECT AVG(length)
    FROM film
    inner join film_category on film.film_id = film_category.film_id
    WHERE category_id=3;

13. SELECT actor.last_name, actor.first_name, title
    FROM actor
    inner join film_actor on actor.actor_id = film_actor.actor_id
    inner join film_category on film_actor.film_id = film_category.film_id 
    inner join film on film.film_id = film_category.film_id 
    WHERE category_id=11 or category_id=9 or category_id=8
    ORDER BY actor.last_name;

14. SELECT actor.last_name, actor.first_name, title, category.name as category
    FROM actor
    inner join film_actor on actor.actor_id = film_actor.actor_id
    inner join film_category on film_actor.film_id = film_category.film_id 
    inner join film on film.film_id = film_category.film_id 
    inner join category on film_category.category_id  = category.category_id 
    WHERE category.category_id =11 or category.category_id=8
    ORDER BY actor.last_name;


15. SELECT c.last_name, c.first_name, c.email
    FROM sakila.customer c
    JOIN sakila.rental r ON c.customer_id = r.customer_id
    JOIN sakila.inventory i ON r.inventory_id = i.inventory_id
    JOIN sakila.film_actor fa ON i.film_id = fa.film_id
    JOIN sakila.actor a ON fa.actor_id = a.actor_id
    WHERE a.first_name IN ('NICK', 'MATTHEW', 'RITA') AND a.last_name IN ('WAHLBERG', 'JOHANSSON', 'REYNOLDS')
    GROUP BY c.customer_id;

16. SELECT f.title
    FROM sakila.customer c
    JOIN sakila.rental r ON c.customer_id = r.customer_id
    JOIN sakila.inventory i ON r.inventory_id = i.inventory_id
    JOIN sakila.film f ON i.film_id = f.film_id
    WHERE c.first_name = 'HOLLY' AND c.last_name = 'FOX';

17. SELECT c.first_name, c.last_name, a.address, ci.city, a.postal_code
    FROM sakila.customer c
    JOIN sakila.payment p ON c.customer_id = p.customer_id
    JOIN sakila.address a ON c.address_id = a.address_id
    JOIN sakila.city ci ON a.city_id = ci.city_id
    WHERE p.amount BETWEEN 10 AND 12
    GROUP BY c.customer_id;

18. SELECT title, description
    FROM sakila.film
    WHERE language_id <> 1; -- Assuming 1 is the ID for English







