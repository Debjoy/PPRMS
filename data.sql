-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 23, 2019 at 05:49 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `data`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user`, `password`, `date`) VALUES
(15, 'user1', '12345a', '2018-07-23'),
(16, 'user2', '2468abcd', '2018-07-24'),
(18, 'user3', '3981advy', '2018-08-25');

-- --------------------------------------------------------

--
-- Table structure for table `deleting`
--

CREATE TABLE IF NOT EXISTS `deleting` (
  `password` varchar(11) NOT NULL,
  PRIMARY KEY (`password`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deleting`
--

INSERT INTO `deleting` (`password`) VALUES
('letsdelete');

-- --------------------------------------------------------

--
-- Table structure for table `institution`
--

CREATE TABLE IF NOT EXISTS `institution` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pin` int(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `institution`
--

INSERT INTO `institution` (`id`, `name`, `state`, `city`, `pin`, `address`) VALUES
(23, 'Momin High School', 'West Bengal', 'Howrah', 700011, 'P-36 & 37, Maulana Abul Kalam Azad Sarani, Raja Bazar, Kolkata, West Bengal 700011'),
(24, 'testing''dCamp', 'Uttar Pradesh', 'Agra', 700084, 'Guru Vishram Vridh Ashram, Village Lathira Garhmukteshwar, UP-245205');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE IF NOT EXISTS `records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniqueid` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phno` varchar(20) NOT NULL,
  `camp` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `ltmeds` varchar(300) NOT NULL,
  `chronic` varchar(300) NOT NULL,
  `date` varchar(5000) NOT NULL,
  `diagnosis` varchar(20000) NOT NULL,
  `treat` varchar(20000) NOT NULL,
  `refer` varchar(10000) NOT NULL,
  `followup` varchar(100) NOT NULL,
  `date1` varchar(50) NOT NULL,
  `diagnosis1` varchar(200) NOT NULL,
  `treatment1` varchar(200) NOT NULL,
  `refer1` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `uniqueid`, `name`, `age`, `gender`, `phno`, `camp`, `address`, `ltmeds`, `chronic`, `date`, `diagnosis`, `treat`, `refer`, `followup`, `date1`, `diagnosis1`, `treatment1`, `refer1`) VALUES
(1, 'HOW00001', 'Afia Anjum', '7', 'Female', '', 'Momin High School', 'Rajarhat Class-1', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:31:"Elevated Skin Lesions & Itching";}', 'a:1:{i:0;s:9:"Follow Up";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;i:1;}', '2018-08-11', 'Elevated Skin Lesions & Itching', 'Follow Up', ''),
(2, 'HOW00002', 'Kaika Shauddin', '8', 'Female', '', 'Momin High School', 'Rajarhat Class-2 ', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:24:"Hearing Problem Both Ear";}', 'a:1:{i:0;s:14:"Deep Wax Drops";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', 'Hearing Problem Both Ear', 'Deep Wax Drops', ''),
(3, 'HOW00003', 'Kasif Kamaludan', '6', 'Male', '', 'Momin High School', 'Rajarhat Class-Nursery', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:31:"Impacted Wax,Diminished Hearing";}', 'a:1:{i:0;s:12:"Healthy Diet";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', 'Impacted Wax,Diminished Hearing', 'Healthy Diet', ''),
(4, 'HOW00004', 'Faizan Khan', '9', 'Male', '', 'Momin High School', 'Narkel Danga Class-3', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:34:"Headaches Chest Pain, Impacted Wax";}', 'a:1:{i:0;s:14:"Deep Wax Drops";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', 'Headaches Chest Pain, Impacted Wax', 'Deep Wax Drops', ''),
(5, 'HOW00005', 'Israr Ahmad', '8', 'Male', '', 'Momin High School', 'Rajabazar Class-2', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:34:"Headaches Chest Pain, Impacted Wax";}', 'a:1:{i:0;s:14:"Deep Wax Drops";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', 'Headaches Chest Pain, Impacted Wax', 'Deep Wax Drops', ''),
(6, 'HOW00006', 'M.D Junaid', '6', 'Male', '', 'Momin High School', 'Narkel Danga Class-Nursery', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;s:12:"Healthy Diet";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', '', 'Healthy Diet', ''),
(7, 'HOW00007', 'Saina Khatun', '10', 'Female', '', 'Momin High School', 'Narkel Danga Class-4', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:26:"Tooth Problem , Tonsilitis";}', 'a:1:{i:0;s:9:"Follow Up";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;i:1;}', '2018-08-11', 'Tooth Problem , Tonsilitis', 'Follow Up', ''),
(8, 'HOW00008', 'Farad Anjum', '10', 'Female', '', 'Momin High School', 'Narkel Danga Class-4', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:9:"Headaches";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', 'Headaches', '', ''),
(9, 'HOW00009', 'M.D Parvej', '6', 'Male', '', 'Momin High School', 'Narkel Danga Class-Nursery', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;s:12:"Healthy Diet";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', '', 'Healthy Diet', ''),
(10, 'HOW00010', 'Siddique Akbar', '11', 'Male', '', 'Momin High School', 'Narkel Danga Class-5', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:19:"Hearing Deficiency ";}', 'a:1:{i:0;s:8:"Wax Drop";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', 'Hearing Deficiency ', 'Wax Drop', ''),
(11, 'HOW00011', 'Roshm Naz', '6', 'Female', '', 'Momin High School', 'Narkel Danga Class-Nursery', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:18:"Worms In Intestine";}', 'a:1:{i:0;s:11:"Albendazole";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', 'Worms In Intestine', 'Albendazole', ''),
(12, 'HOW00012', 'M.D Rahim', '11', 'Male', '', 'Momin High School', 'Narkel Danga Class-5', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:18:"Hearing Defficency";}', 'a:1:{i:0;s:8:"Wax Drop";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', 'Hearing Defficency', 'Wax Drop', ''),
(13, 'HOW00013', 'M.D Farhian', '7', 'Male', '', 'Momin High School', 'Narkel Danga Class-3', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:12:"Pain In Ear ";}', 'a:1:{i:0;s:8:"Wax Drop";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', 'Pain In Ear ', 'Wax Drop', ''),
(14, 'HOW00014', 'Mezba Alam', '8', 'Male', '', 'Momin High School', 'Narkel Danga Class-2', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:26:"Weakness, Less Food Intake";}', 'a:1:{i:0;s:11:"Albendazole";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', 'Weakness, Less Food Intake', 'Albendazole', ''),
(15, 'HOW00015', 'M.D. Kabir', '7', 'Male', '', 'Momin High School', 'Narkel Danga Class-3', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:25:"Swelling Occipital Region";}', 'a:1:{i:0;s:22:"Follow Up, Albendazole";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;i:1;}', '2018-08-11', 'Swelling Occipital Region', 'Follow Up, Albendazole', ''),
(16, 'HOW00016', 'M.D Yousuf', '7', 'Male', '', 'Momin High School', 'Narkel Danga Class-1', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:8:"Eye Pain";}', 'a:1:{i:0;s:11:"Albendazole";}', 'a:1:{i:0;s:12:"Refer To OPD";}', '0', '2018-08-11', 'Eye Pain', 'Albendazole', 'Refer To OPD'),
(17, 'HOW00017', 'Futkan Hussaan', '6', 'Male', '', 'Momin High School', 'Narkel Danga Class-Nursery', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;s:11:"Albendazole";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', '', 'Albendazole', ''),
(18, 'HOW00018', 'Abu Sufyan ', '7', 'Male', '', 'Momin High School', 'Narkel Danga Class-1', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:10:"Wax In Ear";}', 'a:1:{i:0;s:8:"Wax Drop";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', 'Wax In Ear', 'Wax Drop', ''),
(19, 'HOW00019', 'Taheer Iqbal', '6', 'Male', '', 'Momin High School', 'Narkel Danga Class-KG', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:21:"Fever, Macule, Papule";}', 'a:1:{i:0;s:9:"Follow Up";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;i:1;}', '2018-08-11', 'Fever, Macule, Papule', 'Follow Up', ''),
(20, 'HOW00020', 'Sana Iqbal', '6', 'Female', '', 'Momin High School', 'Narkel Danga Class-KG', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:12:"Rash & Fever";}', 'a:1:{i:0;s:9:"Follow Up";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;i:1;}', '2018-08-11', 'Rash & Fever', 'Follow Up', ''),
(21, 'HOW00021', 'Salekha Parveen', '11', 'Female', '', 'Momin High School', 'Narkel Danga Class-KG', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:21:"Headache, Nasal Block";}', 'a:1:{i:0;s:18:"Paracetamol, Nasal";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', 'Headache, Nasal Block', 'Paracetamol, Nasal', ''),
(22, 'HOW00022', 'Bibi Jainab', '7', 'Female', '', 'Momin High School', 'Narkel Danga Class-5', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:13:"Dental Caries";}', 'a:1:{i:0;s:11:"Albendazole";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', 'Dental Caries', 'Albendazole', ''),
(23, 'HOW00023', 'Abu Sameer', '6', 'Male', '', 'Momin High School', 'Narkel Danga Class-KG', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:7:"Ear Waw";}', 'a:1:{i:0;s:21:"Wax Drop, Albendazole";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', 'Ear Waw', 'Wax Drop, Albendazole', ''),
(24, 'HOW00024', 'Sabnam Parwer', '7', 'Female', '', 'Momin High School', 'Narkel Danga Class-1', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:22:"Skin Lesion In Abdomen";}', 'a:1:{i:0;s:32:"Fluconazole, Terbinafine Oinment";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', 'Skin Lesion In Abdomen', 'Fluconazole, Terbinafine Oinment', ''),
(25, 'HOW00025', 'Sama Parver', '8', 'Female', '', 'Momin High School', 'Narkel Danga Class-2', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;s:11:"Albendazole";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', '', 'Albendazole', ''),
(26, 'HOW00026', 'Huzayl Pariab', '12', 'Male', '', 'Momin High School', 'Narkel Danga Class-6', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:13:"Pain In Teeth";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', 'Pain In Teeth', '', ''),
(27, 'HOW00027', 'Humayl Yousufraz', '7', 'Male', '', 'Momin High School', 'Narkel Danga Class-1', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:23:"Skin Lession In Abdomen";}', 'a:1:{i:0;s:33:"Fluconazole, Terbinafine Ointment";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', 'Skin Lession In Abdomen', 'Fluconazole, Terbinafine Ointment', ''),
(28, 'HOW00028', 'Farah Khan', '7', 'Female', '', 'Momin High School', 'Narkel Danga Class-1', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:7:"Ear Wax";}', 'a:1:{i:0;s:41:"Albendazole, Drip Wax Drop, Levocetrizine";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', 'Ear Wax', 'Albendazole, Drip Wax Drop, Levocetrizine', ''),
(29, 'HOW00029', 'M.D. Mokim', '6', 'Male', '', 'Momin High School', 'Narkel Danga Class-KG', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:7:"Ear Wax";}', 'a:1:{i:0;s:37:"Albendazole, Ear Wax Removing Adviced";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', 'Ear Wax', 'Albendazole, Ear Wax Removing Adviced', ''),
(30, 'HOW00030', 'Ayan RAzzab', '8', 'Male', '', 'Momin High School', 'Narkel Danga Class-2', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:7:"Ear Wax";}', 'a:1:{i:0;s:14:"Drip Wax Drops";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', 'Ear Wax', 'Drip Wax Drops', ''),
(31, 'HOW00031', 'S.K Tausif', '5', 'SELECT ONE', '', 'Momin High School', 'Narkel Danga Class-Nursery', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:14:"Severe Itching";}', 'a:1:{i:0;s:32:"Albendazole, Follow Up Derma OPD";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;i:1;}', '2018-08-11', 'Severe Itching', 'Albendazole, Follow Up Derma OPD', ''),
(32, 'HOW00032', 'Roshan Began', '10', 'Female', '', 'Momin High School', 'Narkel Danga Class-4', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:16:"Impacted Ear Wax";}', 'a:1:{i:0;s:34:"Drip Wax Ear Drop, Maintain Hygene";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', 'Impacted Ear Wax', 'Drip Wax Ear Drop, Maintain Hygene', ''),
(33, 'HOW00033', 'Asif Razzab', '11', 'Male', '', 'Momin High School', 'Narkel Danga Class-5', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:30:"Pain In Left Ear Since Morning";}', 'a:1:{i:0;s:36:"Drip Wax 3-4 Times A Day In Both Ear";}', 'a:1:{i:0;s:12:"Refer to ENT";}', '0', '2018-08-11', 'Pain In Left Ear Since Morning', 'Drip Wax 3-4 Times A Day In Both Ear', 'Refer to ENT'),
(34, 'HOW00034', 'Raqiba Nasir', '99', 'Female', '', 'Momin High School', '10/8, Kasai Basti, 1st Lane, Kolkata-700011', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', '', '', ''),
(35, 'HOW00035', 'Mantasha Nasir', '10', 'Female', '', 'Momin High School', '10/8 Kasai Basti, 1st Lane, Kolkata-700011', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:11:"Dental Pain";}', 'a:1:{i:0;s:14:"Follow Up @NRS";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;i:1;}', '2018-08-11', 'Dental Pain', 'Follow Up @NRS', ''),
(36, 'HOW00036', 'Qurratulain', '10', 'Female', '', 'Momin High School', 'Narkel Danga Class-4', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:32:"Pain In Both Ears, Dental Caries";}', 'a:1:{i:0;s:8:"Drip Wax";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', 'Pain In Both Ears, Dental Caries', 'Drip Wax', ''),
(37, 'HOW00037', 'M.D. Zulkarnain Azad', '4', 'Male', '', 'Momin High School', 'Narkel Danga Class-Lower Nursery', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:12:"Pain In Ears";}', 'a:1:{i:0;s:13:"Drip Wax Drop";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', 'Pain In Ears', 'Drip Wax Drop', ''),
(38, 'HOW00038', 'Shazain Shabir', '4', 'Male', '', 'Momin High School', 'Narkel Danga Class-Lower Nursery', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:7:"Low BMI";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', 'Low BMI', '', ''),
(39, 'HOW00039', 'Rahmat Ali', '4', 'Male', '', 'Momin High School', 'Narkel Danga Class-Lower Nursery', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:20:"Enlarged Lymph Nodes";}', 'a:1:{i:0;s:11:"Paracetamol";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', 'Enlarged Lymph Nodes', 'Paracetamol', ''),
(40, 'HOW00040', 'Fateheen Nudrat Shamin', '7', 'Female', '', 'Momin High School', 'Narkel Danga Class-1', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:19:"Sinusitis, Headache";}', 'a:1:{i:0;s:19:"Saline, Nasal Drops";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', 'Sinusitis, Headache', 'Saline, Nasal Drops', ''),
(41, 'HOW00041', 'Arshi Parveen', '7', 'Female', '', 'Momin High School', 'Narkel Danga Class-1', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:35:"Deviated Nasal Septum,Ear Infection";}', 'a:1:{i:0;s:42:"Albendazole, Ciprofloxacin, Follow Up @NRS";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;i:1;}', '2018-08-11', 'Deviated Nasal Septum,Ear Infection', 'Albendazole, Ciprofloxacin, Follow Up @NRS', ''),
(42, 'HOW00042', 'Rizwan Alam', '7', 'Male', '', 'Momin High School', 'Narkel Danga Class-1', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:13:"Dental Caries";}', 'a:1:{i:0;s:16:"Tab. Albendazole";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', 'Dental Caries', 'Tab. Albendazole', ''),
(43, 'HOW00043', 'M.D. Islam', '7', 'Male', '', 'Momin High School', 'Narkel Danga Class-1', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:39:"Discharge From Right Ear, Dental Caries";}', 'a:1:{i:0;s:17:"At ENT OPD of NRS";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', 'Discharge From Right Ear, Dental Caries', 'At ENT OPD of NRS', ''),
(44, 'HOW00044', 'M.D. Kushal', '8', 'Male', '', 'Momin High School', 'Narkel Danga Class-1', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:21:"Molluscum Contagiosum";}', 'a:1:{i:0;s:16:"Tab. Albendazole";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', 'Molluscum Contagiosum', 'Tab. Albendazole', ''),
(45, 'HOW00045', 'M.D. Anas', '7', 'Male', '', 'Momin High School', 'Narkel Danga Class-1', '', '', 'a:1:{i:0;s:10:"2018-08-11";}', 'a:1:{i:0;s:13:"Ear Pain+ Wax";}', 'a:1:{i:0;s:17:"Drip Wax Ear Drop";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-11', 'Ear Pain+ Wax', 'Drip Wax Ear Drop', ''),
(46, 'HOW00046', 'Taiba Jamil', '7', 'Male', '', 'Momin High School', 'Narkel Danga Class-1', '', '', 'a:1:{i:0;s:10:"2018-08-12";}', 'a:1:{i:0;s:28:"Constipation With Distension";}', 'a:1:{i:0;s:14:"Follow Up @NRS";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;i:1;}', '2018-08-12', 'Constipation With Distension', 'Follow Up @NRS', ''),
(47, 'HOW00047', 'M.D. Arsian', '3', 'Male', '', 'Momin High School', 'Narkel Danga Montessori', '', '', 'a:1:{i:0;s:10:"2018-08-12";}', 'a:1:{i:0;s:30:"Lesion Over Left Upper Eye Lik";}', 'a:1:{i:0;s:30:"Coamoxiclav Syrup, Paracetamol";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-12', 'Lesion Over Left Upper Eye Lik', 'Coamoxiclav Syrup, Paracetamol', ''),
(48, 'HOW00048', 'Akshara', '9', 'Female', '', 'Momin High School', 'Narkel Danga Class-3', '', '', 'a:1:{i:0;s:10:"2018-08-12";}', 'a:1:{i:0;s:31:"Blackish Discoloration Of Teeth";}', 'a:1:{i:0;s:11:"Albendazole";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-12', 'Blackish Discoloration Of Teeth', 'Albendazole', ''),
(49, 'HOW00049', 'Jafar Ali', '9', 'Male', '', 'Momin High School', 'K.B. 1st Lane Class-3', '', '', 'a:1:{i:0;s:10:"2018-08-12";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;s:0:"";}', '0', '2018-08-12', '', '', ''),
(50, 'AGR00050', 'Aname nametitle', '9', 'Male', '', 'testing''dCamp', 'P-36 & 37, Maulana Abul Kalam Azad Sarani, Raja Bazar, Kolkata, West Bengal 700011', '', '', 'a:2:{i:0;s:10:"2018-08-25";i:1;s:0:"";}', 'a:2:{i:0;s:16:"a good diagnosis";i:1;s:13:"old diagnosis";}', 'a:2:{i:0;s:8:"treating";i:1;s:14:"good treatment";}', 'a:2:{i:0;s:9:"somewhere";i:1;s:10:"good place";}', 'a:2:{i:0;i:1;i:1;i:1;}', '2018-08-25', 'a good diagnosis', 'treating', 'somewhere'),
(51, 'AGR00051', 'new name', '6', 'Female', '', 'testing''dCamp', 'asdfsdfasdfsdf', '', '', 'a:1:{i:0;s:10:"2018-08-25";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;i:0;}', '2018-08-25', '', '', ''),
(52, 'AGR00052', 'new again', '12', 'Others', '56546655', 'testing''dCamp', '38/3 sdfsdfsdf', '', '', 'a:1:{i:0;s:10:"2018-08-26";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;i:0;}', '2018-08-26', '', '', ''),
(53, 'AGR00053', 'sdfsdf', '2', 'Male', '', 'testing''dCamp', 'drdr', '', '', 'a:1:{i:0;s:10:"2018-08-28";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;i:1;}', '2018-08-28', '', '', ''),
(54, 'AGR00054', 'a name', '6', 'Female', '', 'testing''dCamp', '', '', '', 'a:1:{i:0;s:10:"2018-08-28";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;i:0;}', '2018-08-28', '', '', ''),
(55, 'AGR00055', 'testing input agin', '3', 'Female', '19685447852', 'testing''dCamp', 'yo', '', '', 'a:1:{i:0;s:10:"2018-08-28";}', 'a:1:{i:0;s:9:"asdfsdfsf";}', 'a:1:{i:0;s:5:"asdfs";}', 'a:1:{i:0;s:5:"sdfsd";}', 'a:1:{i:0;i:0;}', '2018-08-28', 'asdfsdfsf', 'asdfs', 'sdfsd'),
(62, 'AGR00062', 'Sam hunt', '19', 'Male', '896587421', 'testing''dCamp', '', 'None', '', 'a:1:{i:0;s:10:"2018-08-28";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;s:25:"Laevocetrizine\r\nTears plus";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;i:0;}', '2018-08-28', '', '', ''),
(78, 'AGR00078', 'name of name', '5', 'Male', '', 'testing''dCamp', 'best address ever', '', '', 'a:1:{i:0;s:10:"2018-09-19";}', 'a:1:{i:0;s:36:"first line \r\nsecond line\r\nthird line";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;i:1;}', '', '', '', ''),
(79, 'AGR00079', 'debjoykk', '4', 'Male', '', 'testing''dCamp', '', '', '', 'a:1:{i:0;s:10:"2018-09-21";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;i:0;}', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `superuser`
--

CREATE TABLE IF NOT EXISTS `superuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `superuser`
--

INSERT INTO `superuser` (`id`, `user`, `password`) VALUES
(1, 'su', 'GodLikePower'),
(2, 'TestGod', 'TestingLikeAnything');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
