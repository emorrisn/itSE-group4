CREATE SCHEMA IF NOT EXISTS ModernFit;

-- Use 'ModernFit' schema
USE ModernFit;

CREATE TABLE `User` (
  `id` int PRIMARY KEY,
  `type` varchar(255),
  `pin` int,
  `name` varchar(255),
  `email` varchar(255),
  `password` varchar(255),
  `gender` varchar(20),
  `age` int,
  `height` float,
  `weight` float,
  `description` text,
  `trainer_id` int,
  `profile_picture_url` varchar(255),
  `emergency_contact_info` varchar(255),
  `medical_history` text,
  `preferred_language` varchar(50),
  `address` varchar(255),
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `Workout` (
  `id` int PRIMARY KEY,
  `name` varchar(255),
  `description` text,
  `duration` int,
  `intensity_level` varchar(20),
  `targeted_muscle_groups` varchar(255),
  `location` varchar(50),
  `recommended_intensity_range` varchar(50),
  `required_equipment` varchar(255),
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `Exercise` (
  `id` int PRIMARY KEY,
  `name` varchar(255),
  `description` text,
  `category` varchar(20),
  `equipment_needed` varchar(255),
  `difficulty_level` varchar(20),
  `demonstration_video_url` varchar(255),
  `exercise_variation` varchar(20),
  `target_heart_rate_range` varchar(50),
  `recommended_form_tips` text,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `WorkoutExercise` (
  `id` int PRIMARY KEY,
  `workout_id` int,
  `exercise_id` int,
  `sets` int,
  `reps` int,
  `rest_time_between_sets` int,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `UserWorkout` (
  `id` int PRIMARY KEY,
  `user_id` int,
  `workout_id` int,
  `start_date` date,
  `completion_date` date,
  `feedback_rating` int,
  `days` text,
  `user_comments` text,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `ExerciseLog` (
  `id` int PRIMARY KEY,
  `exercise_id` int,
  `workout_id` int,
  `user_id` int,
  `reps` int,
  `size` int,
  `duration` int,
  `notes` text,
  `perceived_difficulty_level` int,
  `fatigue_level` int,
  `motivation_level` int,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `Diet` (
  `id` int PRIMARY KEY,
  `user_trainer_id` int,
  `name` varchar(255),
  `description` text,
  `start_date` date,
  `end_date` date,
  `caloric_goal` int,
  `dietician_comments` text,
  `allowed_cheat_days` int,
  `dietary_restrictions` text,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `UserDiet` (
  `id` int PRIMARY KEY,
  `user_id` int,
  `diet_id` int,
  `user_trainer_id` int,
  `status` varchar(20),
  `completion_date` date,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `Meal` (
  `id` int PRIMARY KEY,
  `type` varchar(255),
  `name` varchar(255),
  `description` text,
  `caloric_content` int,
  `allergen_information` varchar(255),
  `preparation_time` int,
  `cooking_instructions` text,
  `recipe_link` varchar(255),
  `vegetarian_indicator` boolean,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `MealLog` (
  `id` int PRIMARY KEY,
  `user_id` int,
  `diet_id` int,
  `meal_id` int,
  `time_of_consumption` timestamp DEFAULT CURRENT_TIMESTAMP,
  `satisfaction_level` int,
  `location_of_consumption` varchar(255),
  `mood_during_consumption` varchar(50),
  `additional_comments` text,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `Food` (
  `id` int PRIMARY KEY,
  `name` varchar(255),
  `description` text,
  `calories_per_serving` int,
  `proteins` float,
  `fats` float,
  `carbohydrates` float,
  `nutritional_information` json,
  `origin` varchar(50),
  `shelf_life` int,
  `source` varchar(50),
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `DietMeal` (
  `id` int PRIMARY KEY,
  `diet_id` int,
  `meal_id` int,
  `order` int,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `MealFood` (
  `id` int PRIMARY KEY,
  `meal_id` int,
  `food_id` int,
  `quantity` int,
  `notes` text,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `Notification` (
  `id` int PRIMARY KEY,
  `user_id` int,
  `type` varchar(50),
  `content` text,
  `delivery_status` varchar(20),
  `timestamp` timestamp DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `Subscription` (
  `id` int PRIMARY KEY,
  `user_id` int,
  `subscription_plan` varchar(50),
  `start_date` date,
  `end_date` date,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE `User` ADD FOREIGN KEY (`trainer_id`) REFERENCES `User` (`id`);

ALTER TABLE `WorkoutExercise` ADD FOREIGN KEY (`workout_id`) REFERENCES `Workout` (`id`);

ALTER TABLE `WorkoutExercise` ADD FOREIGN KEY (`exercise_id`) REFERENCES `Exercise` (`id`);

ALTER TABLE `UserWorkout` ADD FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

ALTER TABLE `UserWorkout` ADD FOREIGN KEY (`workout_id`) REFERENCES `Workout` (`id`);

ALTER TABLE `ExerciseLog` ADD FOREIGN KEY (`exercise_id`) REFERENCES `Exercise` (`id`);

ALTER TABLE `ExerciseLog` ADD FOREIGN KEY (`workout_id`) REFERENCES `Workout` (`id`);

ALTER TABLE `ExerciseLog` ADD FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

ALTER TABLE `Diet` ADD FOREIGN KEY (`user_trainer_id`) REFERENCES `User` (`id`);

ALTER TABLE `UserDiet` ADD FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

ALTER TABLE `UserDiet` ADD FOREIGN KEY (`diet_id`) REFERENCES `Diet` (`id`);

ALTER TABLE `UserDiet` ADD FOREIGN KEY (`user_trainer_id`) REFERENCES `User` (`id`);

ALTER TABLE `MealLog` ADD FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

ALTER TABLE `MealLog` ADD FOREIGN KEY (`meal_id`) REFERENCES `Meal` (`id`);

ALTER TABLE `DietMeal` ADD FOREIGN KEY (`diet_id`) REFERENCES `Diet` (`id`);

ALTER TABLE `DietMeal` ADD FOREIGN KEY (`meal_id`) REFERENCES `Meal` (`id`);

ALTER TABLE `MealFood` ADD FOREIGN KEY (`meal_id`) REFERENCES `Meal` (`id`);

ALTER TABLE `MealFood` ADD FOREIGN KEY (`food_id`) REFERENCES `Food` (`id`);

ALTER TABLE `Notification` ADD FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

ALTER TABLE `Subscription` ADD FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

-- Create Admin user with a password
INSERT INTO `User` (`id`, `type`, `pin`, `name`, `email`, `password`, `gender`, `age`, `height`, `weight`, `description`, `trainer_id`, `profile_picture_url`, `emergency_contact_info`, `medical_history`, `preferred_language`, `address`, `created_at`, `updated_at`)
VALUES (1, 'Admin', 1234, 'admin', 'admin@example.com', '$2y$10$8psdf0Us6pJoDueQRSgwLeLPsA6iMOakkCPuU3zYT/gidM8X4TUzO', 'Male', 30, 175.0, 70.0, NULL, NULL, 'admin_profile.jpg', '123-456-7890', 'No medical history', 'English', '123 Admin Street', NOW(), NOW());

-- Permissions & Stuff
drop user 'ModernFitUser'@localhost;
FLUSH PRIVILEGES;
CREATE USER 'ModernFitUser'@'localhost' IDENTIFIED BY 'modernfit4';
GRANT ALL PRIVILEGES ON ModernFit.* TO 'ModernFitUser'@'localhost';
FLUSH PRIVILEGES;