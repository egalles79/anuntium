-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 22-11-2018 a las 19:19:37
-- Versión del servidor: 5.6.35
-- Versión de PHP: 5.6.31

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `anuntium`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acos`
--

CREATE TABLE `acos` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT '',
  `foreign_key` int(10) UNSIGNED DEFAULT NULL,
  `alias` varchar(255) DEFAULT '',
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 206),
(2, 1, NULL, NULL, 'Authentications', 2, 37),
(3, 2, NULL, NULL, 'index', 3, 4),
(4, 2, NULL, NULL, 'view', 5, 6),
(5, 2, NULL, NULL, 'add', 7, 8),
(6, 2, NULL, NULL, 'edit', 9, 10),
(7, 2, NULL, NULL, 'delete', 11, 12),
(8, 2, NULL, NULL, 'setLanguage', 13, 14),
(9, 2, NULL, NULL, 'isControllerAllowed', 15, 16),
(10, 2, NULL, NULL, 'isAllowed', 17, 18),
(11, 2, NULL, NULL, 'isAuthorized', 19, 20),
(12, 2, NULL, NULL, 'getParamsFromHeader', 21, 22),
(13, 2, NULL, NULL, 'checkIfIsEmailValid', 23, 24),
(14, 2, NULL, NULL, 'getParamsFromGet', 25, 26),
(15, 2, NULL, NULL, 'getParamsFromPost', 27, 28),
(16, 2, NULL, NULL, 'getparamsFromDelete', 29, 30),
(17, 2, NULL, NULL, 'cleanParamsFromArray', 31, 32),
(18, 2, NULL, NULL, 'cleanInput', 33, 34),
(19, 2, NULL, NULL, 'guardaLog', 35, 36),
(20, 1, NULL, NULL, 'Groups', 38, 73),
(21, 20, NULL, NULL, 'index', 39, 40),
(22, 20, NULL, NULL, 'view', 41, 42),
(23, 20, NULL, NULL, 'add', 43, 44),
(24, 20, NULL, NULL, 'edit', 45, 46),
(25, 20, NULL, NULL, 'delete', 47, 48),
(26, 20, NULL, NULL, 'setLanguage', 49, 50),
(27, 20, NULL, NULL, 'isControllerAllowed', 51, 52),
(28, 20, NULL, NULL, 'isAllowed', 53, 54),
(29, 20, NULL, NULL, 'isAuthorized', 55, 56),
(30, 20, NULL, NULL, 'getParamsFromHeader', 57, 58),
(31, 20, NULL, NULL, 'checkIfIsEmailValid', 59, 60),
(32, 20, NULL, NULL, 'getParamsFromGet', 61, 62),
(33, 20, NULL, NULL, 'getParamsFromPost', 63, 64),
(34, 20, NULL, NULL, 'getparamsFromDelete', 65, 66),
(35, 20, NULL, NULL, 'cleanParamsFromArray', 67, 68),
(36, 20, NULL, NULL, 'cleanInput', 69, 70),
(37, 20, NULL, NULL, 'guardaLog', 71, 72),
(38, 1, NULL, NULL, 'Pages', 74, 101),
(39, 38, NULL, NULL, 'display', 75, 76),
(40, 38, NULL, NULL, 'setLanguage', 77, 78),
(41, 38, NULL, NULL, 'isControllerAllowed', 79, 80),
(42, 38, NULL, NULL, 'isAllowed', 81, 82),
(43, 38, NULL, NULL, 'isAuthorized', 83, 84),
(44, 38, NULL, NULL, 'getParamsFromHeader', 85, 86),
(45, 38, NULL, NULL, 'checkIfIsEmailValid', 87, 88),
(46, 38, NULL, NULL, 'getParamsFromGet', 89, 90),
(47, 38, NULL, NULL, 'getParamsFromPost', 91, 92),
(48, 38, NULL, NULL, 'getparamsFromDelete', 93, 94),
(49, 38, NULL, NULL, 'cleanParamsFromArray', 95, 96),
(50, 38, NULL, NULL, 'cleanInput', 97, 98),
(51, 38, NULL, NULL, 'guardaLog', 99, 100),
(52, 1, NULL, NULL, 'Users', 102, 171),
(53, 52, NULL, NULL, 'index', 103, 104),
(54, 52, NULL, NULL, 'view', 105, 106),
(55, 52, NULL, NULL, 'viewuser', 107, 108),
(56, 52, NULL, NULL, 'reestablished', 109, 110),
(57, 52, NULL, NULL, 'createExcel', 111, 112),
(58, 52, NULL, NULL, 'recoveryPassword', 113, 114),
(59, 52, NULL, NULL, 'initdb', 115, 116),
(60, 52, NULL, NULL, 'uploadImages', 117, 118),
(61, 52, NULL, NULL, 'updateUserParams', 119, 120),
(62, 52, NULL, NULL, 'forgotPassword', 121, 122),
(63, 52, NULL, NULL, 'getUser', 123, 124),
(64, 52, NULL, NULL, 'getToken', 125, 126),
(65, 52, NULL, NULL, 'facebookLogin', 127, 128),
(66, 52, NULL, NULL, 'login', 129, 130),
(67, 52, NULL, NULL, 'api_login', 131, 132),
(68, 52, NULL, NULL, 'logout', 133, 134),
(69, 52, NULL, NULL, 'add', 135, 136),
(70, 52, NULL, NULL, 'edit', 137, 138),
(71, 52, NULL, NULL, 'register', 139, 140),
(72, 52, NULL, NULL, 'dehabilite', 141, 142),
(73, 52, NULL, NULL, 'delete', 143, 144),
(74, 52, NULL, NULL, 'authenticationToken', 145, 146),
(75, 52, NULL, NULL, 'setLanguage', 147, 148),
(76, 52, NULL, NULL, 'isControllerAllowed', 149, 150),
(77, 52, NULL, NULL, 'isAllowed', 151, 152),
(78, 52, NULL, NULL, 'isAuthorized', 153, 154),
(79, 52, NULL, NULL, 'getParamsFromHeader', 155, 156),
(80, 52, NULL, NULL, 'checkIfIsEmailValid', 157, 158),
(81, 52, NULL, NULL, 'getParamsFromGet', 159, 160),
(82, 52, NULL, NULL, 'getParamsFromPost', 161, 162),
(83, 52, NULL, NULL, 'getparamsFromDelete', 163, 164),
(84, 52, NULL, NULL, 'cleanParamsFromArray', 165, 166),
(85, 52, NULL, NULL, 'cleanInput', 167, 168),
(86, 52, NULL, NULL, 'guardaLog', 169, 170),
(87, 1, NULL, NULL, 'AclExtras', 172, 173),
(88, 1, NULL, NULL, 'DebugKit', 174, 205),
(89, 88, NULL, NULL, 'ToolbarAccess', 175, 204),
(90, 89, NULL, NULL, 'history_state', 176, 177),
(91, 89, NULL, NULL, 'sql_explain', 178, 179),
(92, 89, NULL, NULL, 'setLanguage', 180, 181),
(93, 89, NULL, NULL, 'isControllerAllowed', 182, 183),
(94, 89, NULL, NULL, 'isAllowed', 184, 185),
(95, 89, NULL, NULL, 'isAuthorized', 186, 187),
(96, 89, NULL, NULL, 'getParamsFromHeader', 188, 189),
(97, 89, NULL, NULL, 'checkIfIsEmailValid', 190, 191),
(98, 89, NULL, NULL, 'getParamsFromGet', 192, 193),
(99, 89, NULL, NULL, 'getParamsFromPost', 194, 195),
(100, 89, NULL, NULL, 'getparamsFromDelete', 196, 197),
(101, 89, NULL, NULL, 'cleanParamsFromArray', 198, 199),
(102, 89, NULL, NULL, 'cleanInput', 200, 201),
(103, 89, NULL, NULL, 'guardaLog', 202, 203);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aros`
--

CREATE TABLE `aros` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT '',
  `foreign_key` int(10) UNSIGNED DEFAULT NULL,
  `alias` varchar(255) DEFAULT '',
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Group', 1, '', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aros_acos`
--

CREATE TABLE `aros_acos` (
  `id` int(10) UNSIGNED NOT NULL,
  `aro_id` int(10) UNSIGNED NOT NULL,
  `aco_id` int(10) UNSIGNED NOT NULL,
  `_create` char(2) NOT NULL DEFAULT '0',
  `_read` char(2) NOT NULL DEFAULT '0',
  `_update` char(2) NOT NULL DEFAULT '0',
  `_delete` char(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1'),
(2, 1, 68, '1', '1', '1', '1'),
(3, 1, 38, '1', '1', '1', '1'),
(4, 1, 66, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authentications`
--

CREATE TABLE `authentications` (
  `id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(150) NOT NULL,
  `expires_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `authentications`
--

INSERT INTO `authentications` (`id`, `created`, `modified`, `user_id`, `token`, `expires_on`) VALUES
(1, '2018-11-22 01:51:38', '2018-11-22 01:51:38', 1, '39781913eb1811575eb5db7f7095d410', '2018-11-22 05:51:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grades_teachers`
--

CREATE TABLE `grades_teachers` (
  `id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Administrador', '2018-11-22 00:50:42', '2018-11-22 00:50:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages_files`
--

CREATE TABLE `messages_files` (
  `id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `file` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages_users`
--

CREATE TABLE `messages_users` (
  `id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sent` tinyint(1) DEFAULT NULL,
  `open` tinyint(1) DEFAULT NULL,
  `send_date` datetime DEFAULT NULL,
  `opening_date` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `schools`
--

INSERT INTO `schools` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Angeleta Ferrer', '2018-10-02 00:00:00', '2018-10-02 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `grade_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `token` varchar(250) DEFAULT NULL,
  `facebook_uid` varchar(150) DEFAULT NULL,
  `locale` varchar(255) DEFAULT NULL,
  `notpwd` int(11) DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `token`, `facebook_uid`, `locale`, `notpwd`, `is_enabled`, `created`, `modified`, `group_id`) VALUES
(1, 'Míriam Bruguera', 'mbruguera@gmail.com', '826153065f6190b0afc2a09f9ba1901e3bb6aef0', NULL, NULL, NULL, NULL, 1, '2018-11-22 00:51:47', '2018-11-22 00:51:47', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_schools`
--

CREATE TABLE `users_schools` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_students`
--

CREATE TABLE `users_students` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acos`
--
ALTER TABLE `acos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_acos_lft_rght` (`lft`,`rght`),
  ADD KEY `idx_acos_alias` (`alias`);

--
-- Indices de la tabla `aros`
--
ALTER TABLE `aros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_aros_lft_rght` (`lft`,`rght`),
  ADD KEY `idx_aros_alias` (`alias`);

--
-- Indices de la tabla `aros_acos`
--
ALTER TABLE `aros_acos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_aco_id` (`aco_id`);

--
-- Indices de la tabla `authentications`
--
ALTER TABLE `authentications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indices de la tabla `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grades_teachers`
--
ALTER TABLE `grades_teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_classes_teachers_classes1_idx` (`grade_id`),
  ADD KEY `fk_classes_teachers_users1_idx` (`user_id`);

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_messages_users1_idx` (`user_id`);

--
-- Indices de la tabla `messages_files`
--
ALTER TABLE `messages_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_messages_files_messages1_idx` (`message_id`);

--
-- Indices de la tabla `messages_users`
--
ALTER TABLE `messages_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_messages_users_messages1_idx` (`message_id`),
  ADD KEY `fk_messages_users_users1_idx` (`user_id`);

--
-- Indices de la tabla `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_students_classes1_idx` (`grade_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_groups1_idx` (`group_id`);

--
-- Indices de la tabla `users_schools`
--
ALTER TABLE `users_schools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_schools_schools1_idx` (`school_id`),
  ADD KEY `fk_users_schools_users1_idx` (`user_id`);

--
-- Indices de la tabla `users_students`
--
ALTER TABLE `users_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_students_users1_idx` (`user_id`),
  ADD KEY `fk_users_students_students1_idx` (`student_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acos`
--
ALTER TABLE `acos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT de la tabla `aros`
--
ALTER TABLE `aros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `aros_acos`
--
ALTER TABLE `aros_acos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `authentications`
--
ALTER TABLE `authentications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `grades_teachers`
--
ALTER TABLE `grades_teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `messages_files`
--
ALTER TABLE `messages_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `messages_users`
--
ALTER TABLE `messages_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users_schools`
--
ALTER TABLE `users_schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users_students`
--
ALTER TABLE `users_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `authentications`
--
ALTER TABLE `authentications`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `grades_teachers`
--
ALTER TABLE `grades_teachers`
  ADD CONSTRAINT `fk_classes_teachers_classes1` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_classes_teachers_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_messages_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `messages_files`
--
ALTER TABLE `messages_files`
  ADD CONSTRAINT `fk_messages_files_messages1` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `messages_users`
--
ALTER TABLE `messages_users`
  ADD CONSTRAINT `fk_messages_users_messages1` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_messages_users_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_students_classes1` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users_schools`
--
ALTER TABLE `users_schools`
  ADD CONSTRAINT `fk_users_schools_schools1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_schools_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users_students`
--
ALTER TABLE `users_students`
  ADD CONSTRAINT `fk_users_students_students1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_students_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
