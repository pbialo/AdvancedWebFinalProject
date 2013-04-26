-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2013 at 02:00 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `username_id` int(32) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_content` longtext NOT NULL,
  `blog_date` int(255) NOT NULL,
  `comments_allowed` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `username_id`, `blog_title`, `blog_content`, `blog_date`, `comments_allowed`) VALUES
(1, 1, 'First Blog Posted', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et purus vitae urna faucibus congue vel ut leo. Suspendisse laoreet pulvinar scelerisque. Curabitur lorem velit, dictum suscipit commodo a, mattis in erat. Praesent in nibh urna, nec convallis eros. Pellentesque rutrum tempus erat, et egestas mi congue sed. Morbi ullamcorper diam nisl, et interdum libero. Ut cursus lacinia pharetra. Etiam pellentesque neque malesuada neque dapibus tincidunt. Morbi condimentum libero eros, eu ultricies sapien. Nam augue enim, rhoncus ut pellentesque nec, egestas eget tellus.\n\nNullam convallis dapibus sagittis. Etiam eu adipiscing risus. Aenean a nulla a leo suscipit bibendum vestibulum vitae nulla. Quisque a tellus vitae neque consequat fringilla sit amet sed tortor. Mauris ut justo urna. Mauris enim quam, commodo vel molestie eu, vestibulum ac mauris. Maecenas arcu augue, tempus sed tempor ac, euismod eu nibh.- PAUL B', 1366940333, 0),
(2, 2, 'Sean''s First Blog', 'Integer ullamcorper ullamcorper lacus vel dignissim. Nunc sed nibh lacus. Mauris feugiat pulvinar turpis. Integer scelerisque condimentum risus, vitae malesuada erat laoreet sollicitudin. Mauris convallis, nisl eu tempor pulvinar, lorem mi vestibulum magna, non elementum velit nisi vel risus. Etiam consectetur risus eget elit aliquam euismod. Nullam et felis velit. Suspendisse justo nisl, interdum sed feugiat sed, mattis at massa. Donec tincidunt nunc consequat nibh consequat in ultricies dui sodales. Curabitur sed lacus nec nisl iaculis auctor. Suspendisse potenti. Ut adipiscing, dui vel aliquet bibendum, sapien nunc suscipit ipsum, non fermentum justo dolor et dolor. Etiam nec lacus at sem gravida rhoncus. Pellentesque elementum venenatis erat, eget imperdiet arcu sollicitudin nec. Mauris eget mi non augue sollicitudin semper.\n\nQuisque id odio et tellus ultrices dignissim ut a justo. Quisque a felis nisl, et aliquet nisl. Nullam imperdiet rutrum dolor sit amet pellentesque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris a dignissim neque. Aliquam a urna purus, ac adipiscing sem. Etiam aliquam laoreet est quis euismod. Integer at erat non odio sodales rutrum sed lobortis augue. Nam cursus facilisis dictum. Fusce et placerat lorem. Nulla sit amet lacus nec lorem gravida lacinia. Donec mattis arcu non risus placerat tristique. Etiam non nunc nibh, eget iaculis ligula.- P B', 1366945789, 1),
(3, 1, 'My Second Blog Post', 'Quisque id odio et tellus ultrices dignissim ut a justo. Quisque a felis nisl, et aliquet nisl. Nullam imperdiet rutrum dolor sit amet pellentesque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris a dignissim neque. Aliquam a urna purus, ac adipiscing sem. Etiam aliquam laoreet est quis euismod. Integer at erat non odio sodales rutrum sed lobortis augue. Nam cursus facilisis dictum. Fusce et placerat lorem. Nulla sit amet lacus nec lorem gravida lacinia. Donec mattis arcu non risus placerat tristique. Etiam non nunc nibh, eget iaculis ligula.\n\nDonec non est eu augue consequat laoreet. Pellentesque ornare elementum semper. Praesent vitae tellus et neque feugiat tincidunt id vitae arcu. Sed aliquet pharetra interdum. Donec hendrerit adipiscing nibh ac tempus. Nunc at sem nec lacus mattis scelerisque. Aenean aliquam nibh vitae lacus commodo iaculis.', 1366950771, 1),
(4, 2, 'Sean''s Second Blog Post', 'Quisque nisl lectus, consequat sed molestie quis, porttitor in risus. Donec luctus volutpat magna at luctus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis pulvinar tortor sed lorem pellentesque ut dignissim eros commodo. Pellentesque nec ipsum et tellus pellentesque condimentum at nec dolor. Aliquam erat volutpat. Donec quis mollis libero. Nullam et augue id ligula tempor accumsan. Sed tortor tellus, consequat in imperdiet ac, sollicitudin a turpis. Ut a velit eget enim congue mattis et sed magna.\r\n\r\nDuis in lorem ut nulla euismod cursus. Praesent libero lacus, pulvinar vitae porttitor a, ullamcorper nec dolor. Aliquam ornare varius augue, nec porta libero laoreet quis. Donec quis mauris turpis, luctus elementum ligula. Etiam in magna vel ipsum sodales ornare eu et erat. Quisque quis metus nec libero pulvinar tempus. Phasellus auctor enim interdum quam condimentum a aliquam justo dapibus.', 1366960724, 1),
(5, 2, 'Sean''s Third Blog', 'Aliquam accumsan justo at ligula condimentum lacinia vitae eu libero. Donec quis magna dolor. Cras fringilla, odio ac lacinia faucibus, leo metus viverra sem, ac rutrum nisi arcu vitae nisi. Pellentesque blandit mattis hendrerit. Integer dapibus quam et urna sodales id vestibulum nisl faucibus. In sed dui nisi, hendrerit rhoncus justo. Aenean consectetur velit non justo dignissim vestibulum. Curabitur tincidunt est et tellus malesuada sed scelerisque dolor elementum. Suspendisse egestas ipsum lorem.\n\nVivamus est elit, dictum et commodo non, accumsan sed magna. Morbi sodales turpis id nunc dignissim varius. Curabitur magna libero, rutrum non porta quis, auctor vel tortor. Ut nec ipsum vel magna fringilla congue. Aliquam magna mi, tempor sed sodales malesuada, hendrerit interdum nunc. Integer at massa non tellus pulvinar porta at vel elit. Integer lectus nunc, gravida et pretium ac, rutrum quis diam. Vestibulum orci enim, mollis eget tristique a, sagittis at magna. Morbi ut ante at quam convallis adipiscing. Quisque id nibh ut mi iaculis ultricies quis sit amet nisl.', 1366961035, 1),
(6, 4, 'Sixth Overall Blog', 'Proin eget erat eget quam pulvinar ornare. Proin quis dictum erat. Quisque adipiscing tempor diam vel euismod. Vestibulum varius ultrices elit id feugiat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nullam aliquam consectetur sodales. Curabitur imperdiet rhoncus ultrices. Suspendisse nulla dui, semper sodales venenatis a, consectetur vel sapien. Phasellus dapibus dolor mi. Ut malesuada ullamcorper tellus ac faucibus. Aliquam commodo ipsum eu ligula venenatis tristique sed sed lectus. Mauris a leo enim. Nullam hendrerit augue id enim tempor pretium. Vestibulum massa mi, vehicula eu iaculis id, lobortis sed odio.\n\nIn rutrum feugiat augue, sed placerat libero porttitor non. Quisque ultricies purus a ante tempus rutrum. Morbi suscipit turpis sed sem sodales fringilla. Maecenas eget sapien lorem, at congue velit. Pellentesque ante massa, consectetur eget scelerisque et, rutrum eu mi. Curabitur vitae lacus dui, at mattis justo. Maecenas tincidunt sem id dui eleifend quis tristique erat semper. Suspendisse varius euismod ipsum id euismod. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris fermentum purus venenatis erat consectetur imperdiet. Nunc cursus tristique quam, vitae cursus metus porta dapibus. Nulla facilisi. Sed mattis tempor hendrerit. Fusce in turpis eu ligula ultricies tempus. Nulla tincidunt arcu eu ante porta lobortis.\n\nDonec vitae ante sed felis blandit molestie at ut risus. Cras aliquet eros ut arcu adipiscing auctor. Sed erat nibh, tristique nec iaculis at, aliquet ut diam. Suspendisse varius luctus nibh, eu suscipit orci facilisis et. Sed placerat porta odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eros turpis, tincidunt vitae porta sed, suscipit ac nisl. Nulla elementum felis id augue malesuada eget commodo nunc iaculis.', 1366961542, 0),
(7, 1, 'My Third Blog Post', 'Sed imperdiet, tellus in molestie rhoncus, nisl est pulvinar turpis, at scelerisque mi tortor ac libero. Vivamus eu libero nulla. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas malesuada vestibulum neque, a tempus felis tempor at. Duis vestibulum, lectus quis pretium pulvinar, ipsum massa euismod erat, sed pulvinar lacus nibh in nulla. Maecenas ultrices, magna in eleifend sagittis, libero ipsum viverra turpis, sit amet tempor libero mauris eu ligula. Integer molestie dictum metus sed tincidunt. Mauris convallis nisl eu lectus imperdiet ut eleifend neque iaculis. Aenean quis tortor turpis. Quisque at leo leo, nec ornare libero. Donec vitae semper ipsum. Nulla ac commodo nibh. Nunc tristique tortor id diam fermentum eu aliquet eros imperdiet. Sed nec sapien nec arcu sodales dapibus. Fusce nibh felis, elementum eu tincidunt at, vulputate sed mauris.', 1366962944, 0),
(8, 5, 'Mary''s First Blog Post', 'Morbi vel nisl congue turpis tincidunt accumsan a nec velit. Vestibulum sed erat urna, vitae malesuada est. Aliquam in eleifend ante. Donec commodo arcu at odio consectetur interdum. Phasellus posuere sodales cursus. Ut feugiat nibh sed justo iaculis eleifend. Nunc in luctus libero. Maecenas condimentum, turpis egestas rutrum molestie, arcu nisl viverra justo, sit amet condimentum nisi mauris at elit.\r\n\r\nMauris dictum bibendum elit non sagittis. Sed euismod feugiat justo, non facilisis odio porta in. Integer vel augue nunc. Donec vitae imperdiet magna. Quisque elit erat, suscipit in cursus ac, convallis at ligula. Nunc ipsum massa, pharetra ut molestie sit amet, semper id arcu. Mauris quis purus erat, ut tempus urna. Nulla facilisi. Maecenas et dolor purus, eget fringilla nunc. Fusce aliquet, metus condimentum imperdiet molestie, turpis augue auctor enim, eget tincidunt sem ipsum a enim. Mauris accumsan ligula nec ligula facilisis ornare. Sed augue nibh, sodales in mattis eu, vestibulum ut massa. Aenean ac tellus justo. Maecenas mauris sem, laoreet nec dapibus at, ullamcorper a quam. Praesent urna purus, aliquam non auctor ac, pretium consequat nisl.', 1366963084, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
