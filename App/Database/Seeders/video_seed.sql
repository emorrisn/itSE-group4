-- Additional Seeder file for video content

-- Insert additional dummy data into the User table
INSERT INTO `User` (`type`, `pin`, `name`, `email`, `password`, `gender`, `age`, `height`, `weight`,  `description`, `trainer_id`,`profile_picture_url`, `emergency_contact_info`, `medical_history`, `preferred_language`, `address`, `created_at`, `updated_at`)
VALUES
  ('Client', 1357, 'Eva Client', 'eva@example.com', '$2y$10$uA9s9.vILUmIq7ZvJ8R0d.xoQmKo/sGHSC0we/o8pW3/y6l3AZhQu', 'Female', 30, 155.0, 50.0, NULL, 4, 'eva_profile.jpg', '654-321-0987', 'No medical history', 'English', '321 Client Street', NOW(), NOW()),
  ('Trainer', 7531, 'Charlie Trainer', 'charlie@example.com', '$2y$10$R2Kg1zS6nUvM6eN9n/FpPOASxilndNizNoACyFnX5c7.VUylUoAgm', 'Male', 28, 175.0, 70.0, NULL, NULL, 'charlie_profile.jpg', '987-654-3210', 'No medical history', 'English', '654 Trainer Street', NOW(), NOW()),
  ('Client', 2468, 'Grace Client', 'grace@example.com', '$2y$10$gCm7VJbAAsj9eC6M8S6xw.xlhNnEGrOqRJFhjnsXJHMa1UgHHTxeO', 'Female', 25, 160.0, 55.0, NULL, 3, 'grace_profile.jpg', '876-543-2109', 'No medical history', 'English', '789 Client Street', NOW(), NOW()),
  ('Trainer', 8765, 'David Trainer', 'david@example.com', '$2y$10$4RoHFHS1iqqW8lfErC1yTuM7hvGEpT6Gxw9OD7c5e2FLg9jOPOJwC', 'Male', 35, 185.0, 80.0, NULL, NULL, 'david_profile.jpg', '234-567-8901', 'No medical history', 'English', '123 Trainer Street', NOW(), NOW()),
  -- Add more users here...
  ('Client', 1111, 'Alice Client', 'alice@example.com', '$2y$10$SINo/q2GkYs5v/bGGsFMEeKZu8avazM8xgC5pmviAq4sWU26mH8wW', 'Female', 28, 160.0, 55.0, NULL, 5, 'alice_profile.jpg', '555-555-5555', 'No medical history', 'English', '456 Client Street', NOW(), NOW()),
  ('Trainer', 2222, 'Bob Trainer', 'bob@example.com', '$2y$10$OjGZWeO5yG06.Q8hFr9ll.7pWhizNZr1e1RCLFoY8aBnO0ihI8e7K', 'Male', 30, 180.0, 75.0, NULL, NULL, 'bob_profile.jpg', '777-777-7777', 'No medical history', 'English', '789 Trainer Street', NOW(), NOW());

-- password(client): client_password_3
-- password(trainer): trainer_password_3

-- Insert additional dummy data into the Workout table
INSERT INTO `Workout` (`name`, `description`, `duration`, `intensity_level`, `targeted_muscle_groups`, `location`, `recommended_intensity_range`, `required_equipment`, `created_at`, `updated_at`)
VALUES
  ('Pilates Sculpt', 'Full-body Pilates workout', 60, 'Moderate', 'Core, Flexibility', 'Studio', 'Moderate', 'Exercise mat', NOW(), NOW()),
  ('Cycling Challenge', 'High-intensity cycling class', 45, 'High', 'Cardio, Legs', 'Gym', 'High', 'Stationary bike', NOW(), NOW()),
  ('Bodyweight Burn', 'Calisthenics for strength', 40, 'Moderate', 'Full Body', 'Home', 'Moderate', 'None', NOW(), NOW()),
  -- Add more workouts here...
  ('Yoga Flow', 'Relaxing yoga session', 50, 'Low', 'Flexibility', 'Studio', 'Low', 'Yoga mat', NOW(), NOW()),
  ('HIIT Explosion', 'High-Intensity Interval Training', 30, 'High', 'Full Body', 'Gym', 'Very High', 'Weights, Mat', NOW(), NOW());

-- Insert additional dummy data into the Exercise table
INSERT INTO `Exercise` (`name`, `description`, `category`, `equipment_needed`, `difficulty_level`, `demonstration_video_url`, `exercise_variation`, `target_heart_rate_range`, `recommended_form_tips`, `created_at`, `updated_at`)
VALUES
  ('Plank Challenge', 'Core-strengthening plank variations', 'Core', 'Exercise mat', 'Intermediate', 'video_url_5', 'Variation 1', '80-100', 'Maintain a straight line', NOW(), NOW()),
  ('Sprint Intervals', 'High-intensity sprinting', 'Cardio', 'Running shoes', 'Advanced', 'video_url_6', 'Variation 2', '120-160', 'Alternate sprinting and resting', NOW(), NOW()),
  ('Push-up Variations', 'Bodyweight upper body workout', 'Strength', 'None', 'Intermediate', 'video_url_7', 'Variation 3', '60-80', 'Maintain proper form', NOW(), NOW()),
  -- Add more exercises here...
  ('Sun Salutations', 'Basic yoga flow sequence', 'Flexibility', 'Yoga mat', 'Beginner', 'video_url_8', 'Sequence 1', '60-80', 'Focus on breath', NOW(), NOW()),
  ('Jump Squats', 'Explosive lower body exercise', 'Strength', 'None', 'Advanced', 'video_url_9', 'Variation 4', '80-120', 'Land softly', NOW(), NOW());

-- Insert additional dummy data into the WorkoutExercise table
INSERT INTO `WorkoutExercise` (`workout_id`, `exercise_id`, `sets`, `reps`, `rest_time_between_sets`, `created_at`, `updated_at`)
VALUES
  (1, 1, 3, 15, 60, NOW(), NOW()),
  (2, 2, 4, 20, 45, NOW(), NOW()),
  (3, 3, 3, 12, 60, NOW(), NOW()),
  (4, 4, 2, 10, 30, NOW(), NOW()),
  (5, 5, 4, 15, 45, NOW(), NOW());

-- Insert additional dummy data into the UserWorkout table
INSERT INTO `UserWorkout` (`user_id`, `workout_id`, `start_date`, `completion_date`, `days`, `feedback_rating`, `user_comments`, `created_at`, `updated_at`)
VALUES
  (1, 5, '2023-11-21', '2023-11-21', '1,2,3,4,5', 4, 'Enjoyed the Pilates session!', NOW(), NOW()),
  (2, 6, '2023-11-22', '2023-11-22', '1,3,5,7', 5, 'Challenging cycling workout', NOW(), NOW()),
  (3, 7, '2023-11-23', '2023-11-23', '2,4,6,7', 3, 'Bodyweight exercises were tough', NOW(), NOW()),
  (4, 7, '2023-11-24', '2023-11-24', '1,3,5', 4, 'Relaxed yoga session', NOW(), NOW()),
  (4, 7, '2023-11-25', '2023-11-25', '1,2,4,6', 5, 'Intense HIIT workout', NOW(), NOW()),
  (5, 7, '2023-11-26', '2023-11-26', '2,3,5,7', 3, 'Powerful strength training', NOW(), NOW());

-- Insert additional dummy data into the Diet table
INSERT INTO `Diet` (`user_trainer_id`, `name`, `description`, `start_date`, `end_date`, `caloric_goal`, `dietician_comments`, `allowed_cheat_days`, `dietary_restrictions`, `created_at`, `updated_at`)
VALUES
  (5, 'Vegan Meal Plan', 'Plant-based diet for overall health', '2023-01-01', '2023-12-31', 2000, 'Include a variety of veggies', 1, 'No dairy', NOW(), NOW()),
  (7, 'Low-Carb Lifestyle', 'Reduced carbohydrate intake for weight management', '2023-01-01', '2023-12-31', 1800, 'Limit starchy foods', 2, 'No gluten', NOW(), NOW()),
  -- Add more diets here...
  (4, 'Mediterranean Delight', 'Balanced Mediterranean diet', '2023-01-01', '2023-12-31', 2200, 'Incorporate olive oil and fish', 1, 'None', NOW(), NOW()),
  (9, 'Paleo Power', 'Embrace the paleolithic diet', '2023-01-01', '2023-12-31', 2000, 'Focus on lean meats and vegetables', 2, 'No dairy', NOW(), NOW()),
  (9, 'Keto Kickstart', 'Initiate ketogenic lifestyle', '2023-01-01', '2023-12-31', 1600, 'Increase healthy fats, limit carbs', 3, 'No gluten', NOW(), NOW());

-- Insert additional dummy data into the ExerciseLog table
INSERT INTO `ExerciseLog` (`exercise_id`, `workout_id`, `user_id`, `reps`, `size`, `duration`, `notes`, `perceived_difficulty_level`, `fatigue_level`, `motivation_level`, `created_at`, `updated_at`)
VALUES
  (2, 5, 5, 2, NULL, 45, 'Increased intensity for plank challenge', 3, 4, 4, NOW(), NOW()),
  (3, 6, 6, 7, NULL, 30, 'Focused on improving sprint speed', 4, 3, 5, NOW(), NOW()),
  (4, 7, 7, 5, NULL, 55, 'Added more sets for push-up variations', 4, 5, 3, NOW(), NOW()),
  (1, 5, 8, 3, NULL, 40, 'Joined Eva for Pilates session', 3, 2, 5, NOW(), NOW()),
  (7, 6, 9, 9, NULL, 35, 'Explored cycling challenge at home', 5, 4, 4, NOW(), NOW());

-- Insert additional dummy data into the Food table
INSERT INTO `Food` (`name`, `description`, `calories_per_serving`, `proteins`, `fats`, `carbohydrates`, `nutritional_information`, `origin`, `shelf_life`, `source`, `created_at`, `updated_at`)
VALUES
  ('Salmon', 'Rich in omega-3 fatty acids', 250, 20.0, 15.0, 0.0, '{"vitaminA": 2, "vitaminC": 0, "calcium": 1, "iron": 4}', 'Imported', 2, 'Seafood Market', NOW(), NOW()),
  ('Kale', 'Nutrient-dense leafy greens', 50, 5.0, 1.0, 10.0, '{"vitaminA": 90, "vitaminC": 130, "calcium": 10, "iron": 15}', 'Local', 7, 'Farm', NOW(), NOW()),
  ('Almonds', 'Healthy source of fats and proteins', 160, 6.0, 14.0, 6.0, '{"vitaminA": 0, "vitaminC": 0, "calcium": 8, "iron": 7}', 'Imported', 90, 'Grocery Store', NOW(), NOW());

-- Insert additional dummy data into the Meal table
INSERT INTO `Meal` (`type`, `name`, `description`, `caloric_content`, `allergen_information`, `preparation_time`, `cooking_instructions`, `recipe_link`, `vegetarian_indicator`, `created_at`, `updated_at`)
VALUES
  ('Lunch', 'Grilled Salmon Salad', 'Healthy and protein-packed lunch', 300, 'None', 20, 'Grill salmon and toss with kale', NULL, false, NOW(), NOW()),
  ('Snack', 'Almond Trail Mix', 'Energy-boosting snack', 150, 'Contains nuts', 5, 'Mix almonds with dried fruits', NULL, true, NOW(), NOW()),
  ('Dinner', 'Kale and Quinoa Bowl', 'Nutrient-rich dinner option', 280, 'None', 25, 'Combine kale and quinoa with a light dressing', NULL, true, NOW(), NOW());

-- Insert additional dummy data into the DietMeal table
INSERT INTO `DietMeal` (`diet_id`, `meal_id`, `order`, `created_at`, `updated_at`)
VALUES
 (1, 1, 1, NOW(), NOW()),
 (2, 2, 2, NOW(), NOW()),
 (1, 3, 1, NOW(), NOW());

-- Insert additional dummy data into the MealFood table
INSERT INTO `MealFood` (`meal_id`, `food_id`, `quantity`, `notes`, `created_at`, `updated_at`)
VALUES
  (1, 1, 1, 'Top with lemon dressing', NOW(), NOW()),
  (2, 1, 1, 'Add a variety of dried fruits', NOW(), NOW()),
  (1, 2, 1, 'Light dressing with olive oil', NOW(), NOW());

-- Insert additional dummy data into the MealLog table
INSERT INTO `MealLog` (`user_id`, `diet_id`, `meal_id`, `time_of_consumption`, `satisfaction_level`, `location_of_consumption`, `mood_during_consumption`, `additional_comments`, `created_at`, `updated_at`)
VALUES
  (1, 1, 2, '2023-11-27 12:30:00', 4, 'Work', 'Energized', 'Grilled salmon salad was delicious', NOW(), NOW()),
  (1, 1, 1, '2023-11-27 16:00:00', 3, 'Home', 'Satisfied', 'Enjoyed the almond trail mix', NOW(), NOW()),
  (2, 2, 1, '2023-11-27 19:30:00', 5, 'Home', 'Happy', 'Kale and quinoa bowl was nutritious', NOW(), NOW());