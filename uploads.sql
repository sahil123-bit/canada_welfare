-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2020 at 09:13 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serverside`
--

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(20) NOT NULL,
  `dates` datetime NOT NULL DEFAULT current_timestamp(),
  `topic` varchar(150) NOT NULL,
  `opinion` varchar(550) NOT NULL,
  `images` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `dates`, `topic`, `opinion`, `images`, `user`) VALUES
(1, '2020-11-11 00:00:00', 'Critical Thinking', 'Critical thinking is very important. l has completed the course of critical think', 'images/asdasda.jpeg', 'Sahil'),
(2, '2020-11-11 00:00:00', 'Poverty ', 'Poverty is being sick and not being able to see a doctor. Poverty is not having access to school and not knowing how to read. Poverty is not having a job, is fear for the future, living one day at a time', 'images/poverty.jpeg', 'Karan'),
(3, '2020-11-11 00:00:00', 'Corruption', 'Corruption, the abuse of entrusted power for private gain, as defined by Transparency International is systemic in the health sector. ... Corruption occurs within the private and public health sectors and may appear as theft, embezzlement, nepotism, bribery up until extortion, or as undue influence.', 'images/corrupt.jpeg', 'Rajveer'),
(6, '2020-11-11 00:00:00', 'Terrorism', 'In order to attract and maintain the publicity necessary to generate widespread fear, terrorists must engage in increasingly dramatic, violent, and high-profile attacks. These have included hijackings, hostage-takings, kidnappings, mass shootings, car bombings, and, frequently, suicide bombings.', 'images/terror.jpeg', 'Sid'),
(7, '2020-11-11 00:00:00', 'Literacy', 'total number of literate persons in a given age group expressed as a percentage of the total population in that age group. The adult literacy rate measures literacy among persons aged 15 years and older, and the youth literacy rate measures literacy among persons aged 15 to 24 years.', 'images/literacy_info.jpg', 'Jody'),
(8, '2020-11-12 00:00:00', 'Covid-19', 'Coronavirus disease (COVID-19) is an infectious disease caused by a newly discovered coronavirus. Most people infected with the COVID-19 virus will experience mild to moderate respiratory illness and recover without requiring special treatment.', 'images/covid.jpeg', 'Mike'),
(9, '2020-11-11 00:00:00', 'Crop Destruction', 'Crop destruction and disease transmission by insects have a remarkable impact on the human economy and health. Nearly 20% of the annual crop production is destroyed by insects (Oerke and Dehne, 2004), and about the same percentage of loss is registered for stored food grains (Bergvinson and Garcia-Lara, 2004).', 'images/crop.jpeg', 'Harry'),
(10, '2020-11-11 00:00:00', 'Pollution', 'Pollution is the degradation of an ecosystem or the biosphere by the introduction, usually human, entities (physical, chemical, or biological), or radiation alters the functioning of this ecosystem 1. Pollution has significant effects on health and the biosphere , as evidenced by exposure to pollutants and global warming which transforms the Earth\'s climate and its ecosystem, leading to the appearance of diseases hitherto unknown in certain areas. geographical, migrations of certain species, even their extinction if they cannot adapt to their n', 'images/pollution.png', 'Justin'),
(11, '2020-11-12 00:00:00', 'Drug Addiction', 'Addiction is a disease that affects your brain and behavior. When you’re addicted to drugs, you can’t resist the urge to use them, no matter how much harm the drugs may cause.\r\n\r\nDrug addiction isn’t about just heroin, cocaine, or other illegal drugs. You can get addicted to alcohol, nicotine, opioid painkillers, sleep and anti-anxiety medications, and other legal substances.', 'images/drug.jpeg', 'Riza'),
(12, '2020-11-11 00:00:00', 'Starvation', 'The events of the first two phases happen even during fairly short periods of dieting or fasting. The third phase happens only in prolonged starvation and may end in the person\'s death.\r\n', 'images/starvation.jpeg', 'Mehak'),
(14, '2020-11-12 00:00:00', 'Over Speeding', 'Speeding endangers everyone on the road: In 2018, speeding killed 9,378 people. We all know the frustrations of modern life and juggling a busy schedule, but speed limits are put in place to protect all road users. Learn about the dangers of speeding and why faster doesn’t mean safer.', 'images/speed.jpeg', 'gagan'),
(16, '2020-11-01 00:00:00', 'Bad Behavior', 'In my work as a coach, I\'ve seen how people will unknowingly carry around the baggage of bad behaviors — behaviors that hold them back from loving relationships, career growth, and simple life and happiness.\r\n\r\nThey don\'t realize they have infected themselves with habits that offend or even push people away.\r\n\r\nMost of us do a few things to annoy people, especially in our close relationships. It\'s impossible to be human and not drift into occasional bad moods, childish reactions, or selfishness.\r\n\r\nBut sometimes these behaviors become habitual.', 'images/download.jfif', 'Sahil'),
(17, '2020-06-13 00:00:00', 'Communication Skills for Workplace Success', 'Want to stand out from the competition? These are some of the top communication skills that recruiters and hiring managers want to see in your resume and cover letter. Highlight these skills and demonstrate them during job interviews, and you’ll make a solid first impression. Continue to develop these skills once you’re hired, and you’ll impress your boss, teammates, and clients.', 'images/cm.jpeg', 'Sahil'),
(31, '2020-12-06 07:38:28', 'Crime Rates in Canada', 'There were over 2.2 million police-reported Criminal Code incidents (excluding traffic) reported by police in 2019, about 164,700 more incidents than in 2018. At 5,874 incidents per 100,000 population, the police-reported crime rate—which measures the volume of crime—increased 7% in 2019.', 'images/20190722-CS12c.jfif', 'Justin'),
(33, '2020-12-06 07:42:59', 'Focus on Work-Life Balance and Workload', 'The Focus series is a collection of reports that present the results of the 2014 Public Service Employee Survey (PSES), broken down by theme. Focus on Work-Life Balance and Workload looks at results in the areas of work-life balance and workload and examines how they relate to results for other aspects of the workplace. The information provided in this report is intended to help target efforts to improve people management practices in the public service.', 'images/Worklife.jpeg', 'Tylor'),
(34, '2020-12-06 07:47:01', 'Road Accidents due people fatigue', 'In 2018, the number of motor vehicle fatalities was 1,922; up 3.6% from 2017 (1,856). The number of serious injuries decreased to 9,494 in 2018; down 6.1% from 2017 (10,107). The number of fatalities per 100,000 population increased slightly to 5.2 in 2018 (from 5.0 in 2017), yet is still the second-lowest on record.', 'images/road.jpeg', 'Honey');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
