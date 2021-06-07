CREATE TABLE `likes_dislikes_ratings` (
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `rating_action` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes_dislikes_ratings`
--

INSERT INTO `likes_dislikes_ratings` (`user_id`, `post_id`, `rating_action`) VALUES
(2, 1, 'dislike'),
(2, 2, 'dislike'),
(2, 3, 'dislike'),
(2, 4, 'dislike'),
(2, 5, 'dislike'),
(2, 6, 'dislike');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `likes_dislikes_ratings`
--
ALTER TABLE `likes_dislikes_ratings`
  ADD UNIQUE KEY `UC_rating_info` (`user_id`,`post_id`);
