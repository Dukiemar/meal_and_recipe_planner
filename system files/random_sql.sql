use c9;

INSERT category (category_name) VALUES ("Breakfast");
INSERT category (category_name) VALUES ("Lunch");
INSERT category (category_name) VALUES ("Dinner");

INSERT INTO meal (category_id, meal_name, serving_size, meal_image) VALUES (3, "Roast Beef", 2, "r_beef.jpg");
INSERT INTO recipe (user_id, recipe_name, recipe_description, calorie_count, instruction_id) VALUES (1, "Roast 1", "tasty food 1", 400, 1);
INSERT INTO recipe (user_id, recipe_name, recipe_description, calorie_count, instruction_id) VALUES (1, "Roast 2", "tasty food 2", 200, 2);
INSERT INTO recipe (user_id, recipe_name, recipe_description, calorie_count, instruction_id) VALUES (1, "Roast 3", "tasty food 3", 500, 3);
INSERT INTO recipe_meal (recipe_id, meal_id) VALUES (2, 2); 
INSERT INTO recipe_meal (recipe_id, meal_id) VALUES (3, 2);

/* meal name and total calorie */
CREATE VIEW Meal_List AS
SELECT meal.meal_id, meal_name, SUM(calorie_count) FROM meal JOIN recipe_meal JOIN recipe ON meal.meal_id=recipe_meal.meal_id AND recipe.recipe_id=recipe_meal.recipe_id GROUP BY (meal_name); 

INSERT INTO instruction (instruction_id, recipe_id) VALUES (1, 1);
INSERT INTO step (instruction_id, step_number, step_description) VALUES (1, 1, "Season chicken");
INSERT INTO step (instruction_id, step_number, step_description) VALUES (1, 2, "Hot Oil");
INSERT INTO step (instruction_id, step_number, step_description) VALUES (1, 3, "Put chicken in pot");
INSERT INTO step (instruction_id, step_number, step_description) VALUES (1, 4, "Fry for half hour");

INSERT INTO meal_plan (meal_plan_id, meal_plan_date) VALUES (1, "2016-04-11");