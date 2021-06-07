CREATE TABLE `likes_dislikes_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `posted` year(4) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes_dislikes_posts`
--

INSERT INTO `likes_dislikes_posts` (`id`, `title`, `text`, `category`, `posted`, `timestamp`) VALUES
(1, 'Sample PHP Post', 'PHP is a fun language to learn, do you agree?', 'PHP', 2020, '2021-01-18 02:00:55'),
(2, 'Sample Dart Post', 'Dart is a fun language to learn, do you agree?', 'Dart', 2021, '2021-01-18 02:01:21'),
(3, 'Sample JS Post', 'JavaScript is a fun language to learn, do you agree?', 'JS', 2021, '2021-01-18 02:01:29'),
(4, 'Sample CSS Post', 'CSS is a fun language to learn, do you agree?', 'CSS', 2021, '2021-01-18 02:01:41'),
(5, 'Sample WordPress Post', 'WordPress is a fun language to learn, do you agree?', 'WP', 2020, '2021-01-18 02:01:51'),
(6, 'Sample Bootstrap Post', 'Bootstrap is a fun language to learn, do you agree?', 'Bootstrap', 2020, '2021-01-18 02:02:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `likes_dislikes_posts`
--
ALTER TABLE `likes_dislikes_posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `likes_dislikes_posts`
--
ALTER TABLE `likes_dislikes_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
