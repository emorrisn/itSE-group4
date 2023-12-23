-- Insert dummy data into the User table
INSERT INTO `User` (`id`, `type`, `pin`, `name`, `email`, `password`, `gender`, `age`, `height`, `weight`,  `description`, `trainer_id`,`profile_picture_url`, `emergency_contact_info`, `medical_history`, `preferred_language`, `address`, `created_at`, `updated_at`)
VALUES
  (2, 'Client', 5678, 'John Doe', 'john@example.com', '$2y$10$fpOne/Do0iPVKlFyNLQuAeAS71QMa2xmnyG3sAxrXQmOEnBSruYQK', 'Male', 25, 180.0, 75.0, NULL, 1, 'john_profile.jpg', '987-654-3210', 'No medical history', 'English', '456 Client Street', NOW(), NOW()),
  (3, 'Trainer', 9876, 'Jane Trainer', 'jane@example.com', '$2y$10$E8tdrPyFQz9As3zu8t2GIO1tWJmZteqjzIXA6W052BCg4RadGrtti', 'Female', 30, 170.0, 65.0, NULL, NULL, 'jane_profile.jpg', '345-678-9012', 'No medical history', 'English', '789 Trainer Street', NOW(), NOW());

-- password(client): client_password
-- password(trainer): trainer_password

-- Insert dummy data into the Workout table
INSERT INTO `Workout` (`id`, `name`, `description`, `duration`, `intensity_level`, `targeted_muscle_groups`, `location`, `recommended_intensity_range`, `required_equipment`, `created_at`, `updated_at`)
VALUES
  (1, 'Cardio Blast', 'High-intensity cardio workout', 30, 'High', 'Cardio', 'Gym', 'High', 'Treadmill', NOW(), NOW()),
  (2, 'Strength Training', 'Full-body strength workout', 45, 'Moderate', 'Full Body', 'Home', 'Moderate', 'Dumbbells', NOW(), NOW());

-- Insert dummy data into the Exercise table
INSERT INTO `Exercise` (`id`, `name`, `description`, `category`, `equipment_needed`, `difficulty_level`, `demonstration_video_url`, `exercise_variation`, `target_heart_rate_range`, `recommended_form_tips`, `created_at`, `updated_at`)
VALUES
  (1, 'Running', 'Run on the treadmill', 'Cardio', 'Treadmill', 'Easy', 'video_url_1', 'Variation 1', '120-150', 'Keep a steady pace', NOW(), NOW()),
  (2, 'Squats', 'Bodyweight squats', 'Strength', 'None', 'Intermediate', 'video_url_2', 'Variation 2', '80-120', 'Maintain proper form', NOW(), NOW());

-- Insert dummy data into the WorkoutExercise table
INSERT INTO `WorkoutExercise` (`id`, `workout_id`, `exercise_id`, `sets`, `reps`, `rest_time_between_sets`, `created_at`, `updated_at`)
VALUES
  (1, 1, 1, 3, 15, 60, NOW(), NOW()),
  (2, 2, 2, 4, 12, 45, NOW(), NOW());

-- Insert dummy data into the UserWorkout table
INSERT INTO `UserWorkout` (`id`, `user_id`, `workout_id`, `start_date`, `completion_date`, `days`, `feedback_rating`, `user_comments`, `created_at`, `updated_at`)
VALUES
  (1, 2, 1, '2023-11-15', '2023-11-15', '1,2,3,4,5,6,7', 5, 'Great workout!', NOW(), NOW()),
  (2, 3, 2, '2023-11-17', '2023-11-17', '1,2,4,5,7', 4, NULL, NOW(), NOW());

-- Insert dummy data into the Diet table
INSERT INTO `Diet` (`id`, `user_trainer_id`, `name`, `description`, `start_date`, `end_date`, `caloric_goal`, `dietician_comments`, `allowed_cheat_days`, `dietary_restrictions`, `created_at`, `updated_at`)
VALUES
  (1, 3, 'Weight Loss Plan', 'A balanced diet for weight loss', '2023-01-01', '2023-12-31', 1800, 'Follow the plan strictly', 1, 'No dairy', NOW(), NOW()),
  (2, 3, 'Muscle Building Plan', 'High protein diet for muscle gain', '2023-01-01', '2023-12-31', 2500, 'Consume protein-rich foods', 2, 'No gluten', NOW(), NOW());

-- Insert dummy data into the ExerciseLog table
INSERT INTO `ExerciseLog` (`id`, `exercise_id`, `workout_id`, `user_id`, `reps`, `size`, `duration`, `notes`, `perceived_difficulty_level`, `fatigue_level`, `motivation_level`, `created_at`, `updated_at`)
VALUES
  (1, 2, 1, 1, 20, NULL, 30, 'Good session', 3, 2, 4, NOW(), NOW()),
  (2, 2, 2, 3, 15, NULL, 45, 'Focused on form', 4, 3, 5, NOW(), NOW());

-- Insert dummy data into the Food table
INSERT INTO `Food` (`id`, `name`, `description`, `calories_per_serving`, `proteins`, `fats`, `carbohydrates`, `nutritional_information`, `origin`, `shelf_life`, `source`, `created_at`, `updated_at`)
VALUES
  (1, 'Chicken Breast', 'Lean protein source', 120, 25.0, 3.0, 0.0, '{"vitaminA": 2, "vitaminC": 0, "calcium": 1, "iron": 5}', 'Local', 7, 'Farm', NOW(), NOW()),
  (2, 'Brown Rice', 'Whole grain rice', 215, 5.0, 1.5, 45.0, '{"vitaminA": 0, "vitaminC": 0, "calcium": 2, "iron": 8}', 'Imported', 365, 'Harvested', NOW(), NOW()),
  (3, 'Salmon', 'Rich in Omega-3 fatty acids', 220, 20.0, 13.0, 0.0, '{"vitaminA": 1, "vitaminC": 0, "calcium": 1, "iron": 2}', 'Local', 5, 'Seafood Market', NOW(), NOW());

-- Insert dummy data into the Meal table
INSERT INTO `Meal` (`id`, `type`, `name`, `description`, `caloric_content`, `allergen_information`, `preparation_time`, `cooking_instructions`, `recipe_link`, `vegetarian_indicator`, `created_at`, `updated_at`)
VALUES
  (1, 'Breakfast', 'Oatmeal with Berries', 'Healthy breakfast option', 300, 'None', 10, 'Cook oatmeal, add berries', NULL, false, NOW(), NOW()),
  (2, 'Lunch', 'Grilled Chicken Salad', 'Protein-packed salad', 450, 'None', 20, 'Grill chicken, toss with veggies', NULL, false, NOW(), NOW()),
  (3, 'Dinner', 'Salmon with Brown Rice', 'Omega-3 rich dinner', 500, 'None', 30, 'Bake salmon, serve with brown rice', NULL, false, NOW(), NOW());

-- Insert dummy data into the DietMeal table
INSERT INTO `DietMeal` (`id`, `diet_id`, `meal_id`, `order`, `created_at`, `updated_at`)
VALUES
 (1, 1, 1, 1, NOW(), NOW()),
 (2, 1, 2, 2, NOW(), NOW()),
 (3, 2, 2, 1, NOW(), NOW()),
 (4, 2, 3, 2, NOW(), NOW());

-- Insert dummy data into the MealFood table
INSERT INTO `MealFood` (`id`, `meal_id`, `food_id`, `quantity`, `notes`, `created_at`, `updated_at`)
VALUES
  (1, 1, 2, 1, 'Add extra berries for flavor', NOW(), NOW()),
  (2, 2, 1, 1, 'Use olive oil dressing', NOW(), NOW()),
  (3, 2, 3, 1, 'Grilled salmon fillet', NOW(), NOW()),
  (4, 3, 3, 1, 'Serve with a side of steamed vegetables', NOW(), NOW());

-- Insert dummy data into the MealLog table
INSERT INTO `MealLog` (`id`, `user_id`, `diet_id`, `meal_id`, `time_of_consumption`, `satisfaction_level`, `location_of_consumption`, `mood_during_consumption`, `additional_comments`, `created_at`, `updated_at`)
VALUES
  (1, 2, 1, 1, '2023-11-15 08:00:00', 4, 'Home', 'Happy', 'Delicious breakfast!', NOW(), NOW()),
  (2, 2, 1, 2, '2023-11-15 12:30:00', 5, 'Work', 'Energetic', 'Great salad for lunch!', NOW(), NOW()),
  (3, 3, 2, 3, '2023-11-15 19:00:00', 3, 'Home', 'Satisfied', 'Healthy dinner option', NOW(), NOW());
