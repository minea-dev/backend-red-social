-- Adminer 4.8.1 MySQL 5.5.5-10.7.3-MariaDB-1:10.7.3+maria~focal dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `publicaciones`;
CREATE TABLE `publicaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` tinytext NOT NULL,
  `contenido` text NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_usuario` int(10) unsigned NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `publicaciones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `publicaciones` (`id`, `titulo`, `contenido`, `fecha`, `id_usuario`, `estado`) VALUES
(1,	'Hola mundo',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam blandit libero quis risus efficitur posuere. Nullam fermentum mattis orci, eu elementum metus rhoncus eget. Quisque non cursus risus, vitae faucibus orci. Aenean a tincidunt lacus. Nullam et ligula lorem. Duis maximus justo non tellus facilisis pellentesque. Donec vitae erat vitae felis auctor finibus ut eget mi. Curabitur auctor mattis est et auctor.\r\n\r\nQuisque at ornare orci. Aenean efficitur metus sit amet erat tristique, ac congue ante maximus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec quis mollis erat. Praesent in metus vel ipsum imperdiet aliquam nec ac enim. Quisque ac auctor mi, nec sodales nulla. Suspendisse potenti. Phasellus pulvinar sem et magna facilisis luctus. In euismod, turpis vel lacinia bibendum, felis nisl lacinia metus, ut tempor arcu justo in ligula. Pellentesque tincidunt a ante pulvinar pellentesque.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ornare egestas magna, faucibus cursus nibh aliquam ac. Nam vel finibus nunc. Phasellus dictum massa vel lorem semper, sed blandit ligula fringilla. Morbi tristique, nisl vitae ornare interdum, nisi nulla sollicitudin diam, nec consequat nulla ante id diam. Suspendisse vestibulum nisi vitae nisi ullamcorper, ultricies dictum justo lobortis. Sed auctor finibus sem in tempor. Etiam at laoreet risus. Duis vel vestibulum lectus. Aenean eget mattis est, at rhoncus nisi. Maecenas augue ex, congue sit amet fermentum nec, varius id velit. In vel elementum sapien, eu dignissim ligula. Nam egestas sapien quis felis sagittis, quis tempor lorem euismod. Nulla non arcu eu nibh faucibus luctus. Vestibulum id efficitur leo.\r\n\r\nEtiam ultrices est ut fermentum dignissim. Nam fringilla iaculis libero. Vestibulum vulputate vitae turpis id scelerisque. Praesent feugiat nibh eget sem tempor interdum. Vestibulum faucibus nisl at eros dignissim auctor. Nam finibus pulvinar felis, vel mattis nibh semper eget. Fusce nibh nulla, imperdiet sit amet pharetra ut, euismod ac erat. Quisque ut libero non velit scelerisque sollicitudin. Curabitur diam orci, porttitor ut auctor et, malesuada et odio.\r\n\r\nIn iaculis dapibus mauris, ac laoreet enim posuere sit amet. Ut commodo blandit libero. Donec aliquet facilisis orci sit amet ultricies. Nam elementum facilisis nibh eu vestibulum. Sed dictum turpis et finibus blandit. Cras ac dapibus arcu. Pellentesque ut magna quam. Vestibulum ac risus metus. Mauris molestie ligula eu leo euismod, sed interdum neque ultricies.\r\n\r\nDuis vitae magna molestie, tempor elit eget, volutpat neque. Sed ultricies, odio id interdum commodo, ex ligula bibendum velit, consequat rhoncus erat elit sed elit. Morbi congue cursus neque accumsan posuere. Fusce maximus enim vel quam scelerisque mattis. Pellentesque ultrices tincidunt metus in tempus. Nulla pharetra, massa sed ornare facilisis, tellus nunc elementum sem, in maximus nisi massa sit amet erat. Sed sagittis turpis erat, ac semper arcu vehicula ut. Vivamus placerat ante nisl, eu molestie diam feugiat ultricies. In scelerisque velit libero, ac pharetra dolor viverra ut. Vestibulum mattis sapien vel sem elementum elementum. Aenean vel arcu at lacus sagittis posuere a venenatis erat. Nullam metus neque, rutrum sit amet nisi ut, fringilla vulputate elit. Vestibulum efficitur tortor elit, vestibulum pellentesque mauris venenatis ut. Nulla ac tempus nulla.',	'2022-06-16 19:25:25',	4,	1),
(2,	'Te felicito',	'Por completarte me rompí en pedazos\r\nMe lo advirtieron, pero no hice caso\r\nMe di cuenta que lo tuyo es falso\r\nFue la gota que rebalsó el vaso\r\nNo me digas que lo sientes\r\nEso parece sincero, pero te conozco bien y sé que mientes\r\nTe felicito, qué bien actúas\r\nDe eso no me cabe duda\r\nCon tu papel continúa\r\nTe queda bien esе show\r\nTe felicito, qué bien actúas\r\nDе eso no me cabe duda\r\nCon tu papel continúa\r\nTe queda bien ese show\r\nTe felicito, qué bien actúas\r\nEsa filosofía barata no la compro\r\nLo siento, en esa moto ya no me monto\r\nLa gente de dos caras no la soporto\r\nYo que ponía las manos al fuego por ti\r\nY me tratas como una más de tus antojos\r\nTu herida no me abrió la piel, pero sí los ojos\r\nLos tengo rojos de tanto llorar por ti\r\nY ahora resulta que lo sientes\r\nSuena sincero, pero te conozco bien y sé que mientes\r\nTe felicito, qué bien actúas\r\nDe eso no me cabe duda\r\nCon tu papel continúa\r\nTe queda bien ese show\r\nTe felicito, qué bien actúas\r\nDe eso no me cabe duda\r\nCon tu papel continúa\r\nTe queda bien ese show\r\nTe felicito, qué bien actúas\r\nHablándote claro, no te necesito (Yeah)\r\nPerdiste a alguien auténtico (Ah)\r\nAlgo me decía por qué no fluiamo\' (Wuh!)\r\nTe va a picar cuando recuerde\' cómo nos comíamo\' (Yah!)\r\nComo ante\' (Ey)\r\nTú de espalda apoyándote del volante (Ey)\r\nQuemando el tranquilizante\r\nNo te bloqueé de las rede\' pa\' que vea\' la otra en la Mercede\' (Yah!)\r\nNo me cuente\' más historia\', no quiero saber\r\nCómo es que he sido tan ciega y no he podido ver\r\nTe deberían dar un Oscar, lo has hecho tan bien\r\nTe felicito, qué bien actúas\r\nDe eso no me cabe duda\r\nCon tu papel continúa\r\nTe queda bien ese show\r\nTe felicito, qué bien actúas\r\nDe eso no me cabe duda\r\nCon tu papel continúa\r\nTe queda bien ese show\r\nTe felicito, qué bien actúas',	'2022-06-16 19:39:30',	4,	1),
(4,	'Lo último',	'Sí soy',	'2022-06-16 23:39:28',	1,	1),
(5,	'fgfgh',	'fgfgfg',	'2022-06-16 23:50:05',	1,	1);

DROP TABLE IF EXISTS `sesiones`;
CREATE TABLE `sesiones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token_sesion` text NOT NULL,
  `id_usuario` int(10) unsigned NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `sesiones_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `sesiones` (`id`, `token_sesion`, `id_usuario`, `estado`) VALUES
(1,	'1b445939a997a744ed21e8ec8b4aab4b',	4,	1),
(2,	'71417e80476c1be55801fbb583e59abd',	4,	1),
(3,	'be513f1095bfb8e3acedfb65402b60a2',	4,	1),
(4,	'1076d37dec7dcd491d33e97088096d38',	4,	0),
(5,	'22bc21eb64a01bcaacad8a44e77f40bf',	4,	0),
(6,	'7e16b57dfb02f92d21fc5bb58c9d2661',	4,	0),
(7,	'0cee473f45359294f5ea1ccfdff5870e',	4,	0),
(8,	'9a14bad493ad07c7685b64caf11d9263',	4,	0),
(9,	'a7f67f2c916b1b57365f56521c4a7c87',	4,	1),
(10,	'ebac138e55239f997648846f180a009f',	4,	1),
(11,	'7630d1b94725b3e80f7bf4eb423fb0a2',	4,	0);

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` char(255) NOT NULL,
  `password` char(255) NOT NULL,
  `email_validado` tinyint(1) NOT NULL DEFAULT 0,
  `token` char(255) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `usuarios` (`id`, `email`, `password`, `email_validado`, `token`, `estado`) VALUES
(1,	'admin@admin.com',	'$2y$10$jl5QxiTfcL6XL/5nZScPUOE19wRFYk4jRH5FQepAU.fLJJq7x2Omu',	0,	'238831b3d69b374ea4f91ab49ac6c95e',	1),
(2,	'hola@hola.com',	'$2y$10$S2Pu2BDHW/Qi484pSabDRenMXwTbuvTi3QfWgyUFgm2cO7BjlcPNq',	0,	'1e28d1566113cbaed00a677ba756fbaf',	1),
(3,	'new@hola.com',	'$2y$10$sR/RcgGdBxokCAU5U8SkKOB03QhOxJAoWgD1OxSMWHnIXPDlkCAUe',	1,	'778f299e46c26929217679d4c86c149a',	0),
(4,	'milisil@uoc.edu',	'$2y$10$mDBnnap24OE6NMM6CWImuOUosc8CcnJ9ghh1QIfOB01L2hZZmy652',	1,	'80e1ce631c46331d2054fb11407489b0',	1),
(5,	'new@hola.com',	'$2y$10$3nC5nkVDNp.oJRSv0rAyeuhSt5YSXr3lcLGI7YHuBPIziOzpS.4sC',	0,	'a6c0e4497adedba0b39f5e2710833e7d',	1);

-- 2022-06-21 15:08:41
