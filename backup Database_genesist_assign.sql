-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2017 at 03:54 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `genesist_assign`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(255) NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted` int(255) NOT NULL,
  `create date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `subject`, `description`, `username`, `deleted`, `create date`) VALUES
(1, 'test', 'testing', 'muhammed', 0, '2017-11-25 05:00:03'),
(2, 'web', 'site', 'mohaa', 0, '2017-11-25 05:18:19'),
(3, 'test', 'testing', 'muhammed', 0, '2017-11-25 05:00:11'),
(55, 'web', 'site', 'mohaa', 0, '2017-11-25 05:18:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `c_id` int(11) NOT NULL,
  `city_name` varchar(500) NOT NULL,
  `c_s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`c_id`, `city_name`, `c_s_id`) VALUES
(10093, 'Airdrie', 663),
(10094, 'Athabasca', 663),
(10095, 'Banff', 663),
(10096, 'Barrhead', 663),
(10097, 'Bassano', 663),
(10098, 'Beaumont', 663),
(10099, 'Beaverlodge', 663),
(10100, 'Black Diamond', 663),
(10101, 'Blackfalds', 663),
(10102, 'Blairmore', 663),
(10103, 'Bon Accord', 663),
(10104, 'Bonnyville', 663),
(10105, 'Bow Island', 663),
(10106, 'Brooks', 663),
(10107, 'Calgary', 663),
(10108, 'Calmar', 663),
(10109, 'Camrose', 663),
(10110, 'Canmore', 663),
(10111, 'Cardston', 663),
(10112, 'Carstairs', 663),
(10113, 'Chateau Lake Louise', 663),
(10114, 'Chestermere', 663),
(10115, 'Clairmont', 663),
(10116, 'Claresholm', 663),
(10117, 'Coaldale', 663),
(10118, 'Coalhurst', 663),
(10119, 'Cochrane', 663),
(10120, 'Crossfield', 663),
(10121, 'Devon', 663),
(10122, 'Didsbury', 663),
(10123, 'Drayton Valley', 663),
(10124, 'Drumheller', 663),
(10125, 'Edmonton', 663),
(10126, 'Edson', 663),
(10127, 'Elk Point', 663),
(10128, 'Fairview', 663),
(10129, 'Falher', 663),
(10130, 'Fort MacLeod', 663),
(10131, 'Fox Creek', 663),
(10132, 'Gibbons', 663),
(10133, 'Grand Centre', 663),
(10134, 'Grande Cache', 663),
(10135, 'Grande Prairie', 663),
(10136, 'Grimshaw', 663),
(10137, 'Hanna', 663),
(10138, 'High Level', 663),
(10139, 'High Prairie', 663),
(10140, 'High River', 663),
(10141, 'Hinton', 663),
(10142, 'Irricana', 663),
(10143, 'Jasper', 663),
(10144, 'Killam', 663),
(10145, 'La Crete', 663),
(10146, 'Lac la Biche', 663),
(10147, 'Lacombe', 663),
(10148, 'Lamont', 663),
(10149, 'Leduc', 663),
(10150, 'Lethbridge', 663),
(10151, 'Lloydminster', 663),
(10152, 'Magrath', 663),
(10153, 'Manning', 663),
(10154, 'Mayerthorpe', 663),
(10155, 'McMurray', 663),
(10156, 'Medicine Hat', 663),
(10157, 'Millet', 663),
(10158, 'Morinville', 663),
(10159, 'Nanton', 663),
(10160, 'Okotoks', 663),
(10161, 'Olds', 663),
(10162, 'Peace River', 663),
(10163, 'Penhold', 663),
(10164, 'Picture Butte', 663),
(10165, 'Pincher Creek', 663),
(10166, 'Ponoka', 663),
(10167, 'Provost', 663),
(10168, 'Raymond', 663),
(10169, 'Red Deer', 663),
(10170, 'Redwater', 663),
(10171, 'Rimbey', 663),
(10172, 'Rocky Mountain House', 663),
(10173, 'Rocky View', 663),
(10174, 'Saint Paul', 663),
(10175, 'Sexsmith', 663),
(10176, 'Sherwood Park', 663),
(10177, 'Slave Lake', 663),
(10178, 'Smoky Lake', 663),
(10179, 'Spirit River', 663),
(10180, 'Spruce Grove', 663),
(10181, 'Stettler', 663),
(10182, 'Stony Plain', 663),
(10183, 'Strathmore', 663),
(10184, 'Sundre', 663),
(10185, 'Swan Hills', 663),
(10186, 'Sylvan Lake', 663),
(10187, 'Taber', 663),
(10188, 'Three Hills', 663),
(10189, 'Tofield', 663),
(10190, 'Two Hills', 663),
(10191, 'Valleyview', 663),
(10192, 'Vegreville', 663),
(10193, 'Vermilion', 663),
(10194, 'Viking', 663),
(10195, 'Vulcan', 663),
(10196, 'Wainwright', 663),
(10197, 'Wembley', 663),
(10198, 'Westlock', 663),
(10199, 'Wetaskiwin', 663),
(10200, 'Whitecourt', 663),
(10201, 'Wood Buffalo', 663),
(10202, 'Altona', 665),
(10203, 'Beausejour', 665),
(10204, 'Boissevain', 665),
(10205, 'Brandon', 665),
(10206, 'Carberry', 665),
(10207, 'Carman', 665),
(10208, 'Dauphin', 665),
(10209, 'Deloraine', 665),
(10210, 'Dugald', 665),
(10211, 'Flin Flon', 665),
(10212, 'Gimli', 665),
(10213, 'Hamiota', 665),
(10214, 'Killarney', 665),
(10215, 'Lac du Bonnet', 665),
(10216, 'Leaf Rapids', 665),
(10217, 'Lorette', 665),
(10218, 'Melita', 665),
(10219, 'Minnedosa', 665),
(10220, 'Morden', 665),
(10221, 'Morris', 665),
(10222, 'Neepawa', 665),
(10223, 'Niverville', 665),
(10224, 'Pinawa', 665),
(10225, 'Portage la Prairie', 665),
(10226, 'Ritchot', 665),
(10227, 'Rivers', 665),
(10228, 'Roblin', 665),
(10229, 'Saint Adolphe', 665),
(10230, 'Sainte Anne', 665),
(10231, 'Sainte Rose du Lac', 665),
(10232, 'Selkirk', 665),
(10233, 'Shilo', 665),
(10234, 'Snow Lake', 665),
(10235, 'Souris', 665),
(10236, 'Springfield', 665),
(10237, 'Steinbach', 665),
(10238, 'Stonewall', 665),
(10239, 'Stony Mountain', 665),
(10240, 'Swan River', 665),
(10241, 'The Pas', 665),
(10242, 'Thompson', 665),
(10243, 'Virden', 665),
(10244, 'Winkler', 665),
(10245, 'Winnipeg', 665),
(10246, 'Clyde River', 670),
(10247, 'Iqaluit', 670),
(10248, 'Kangerdlinerk', 670),
(10249, 'Oqsuqtooq', 670),
(10250, 'Pangnirtung', 670),
(10251, 'Tununirusiq', 670),
(10252, 'Acton', 671),
(10253, 'Ajax', 671),
(10254, 'Alexandria', 671),
(10255, 'Alfred', 671),
(10256, 'Alliston', 671),
(10257, 'Almonte', 671),
(10258, 'Amherstburg', 671),
(10259, 'Amigo Beach', 671),
(10260, 'Angus-Borden', 671),
(10261, 'Arnprior', 671),
(10262, 'Arthur', 671),
(10263, 'Athens', 671),
(10264, 'Atikokan', 671),
(10265, 'Attawapiskat', 671),
(10266, 'Aurora', 671),
(10267, 'Aylmer', 671),
(10268, 'Ayr', 671),
(10269, 'Barrie', 671),
(10270, 'Barry\'s Bay', 671),
(10271, 'Beamsville', 671),
(10272, 'Beaverton', 671),
(10273, 'Beeton', 671),
(10274, 'Belleville', 671),
(10275, 'Belmont', 671),
(10276, 'Blenheim', 671),
(10277, 'Blind River', 671),
(10278, 'Bobcaygeon', 671),
(10279, 'Bolton', 671),
(10280, 'Bourget', 671),
(10281, 'Bowmanville-Newcastle', 671),
(10282, 'Bracebridge', 671),
(10283, 'Bradford', 671),
(10284, 'Brampton', 671),
(10285, 'Brantford', 671),
(10286, 'Bridgenorth-Chemong Park Area', 671),
(10287, 'Brighton', 671),
(10288, 'Brockville', 671),
(10289, 'Brooklin', 671),
(10290, 'Brussels', 671),
(10291, 'Burford', 671),
(10292, 'Burlington', 671),
(10293, 'Caledon', 671),
(10294, 'Caledon East', 671),
(10295, 'Caledonia', 671),
(10296, 'Cambridge', 671),
(10297, 'Campbellford', 671),
(10298, 'Campbellville', 671),
(10299, 'Cannington', 671),
(10300, 'Capreol', 671),
(10301, 'Cardinal', 671),
(10302, 'Carleton Place', 671),
(10303, 'Carlisle', 671),
(10304, 'Casselman', 671),
(10305, 'Cayuga', 671),
(10306, 'Chalk River', 671),
(10307, 'Chapleau', 671),
(10308, 'Chatham', 671),
(10309, 'Chesley', 671),
(10310, 'Chesterville', 671),
(10311, 'Clinton', 671),
(10312, 'Cobourg', 671),
(10313, 'Cochrane', 671),
(10314, 'Colborne', 671),
(10315, 'Colchester', 671),
(10316, 'Collingwood', 671),
(10317, 'Concord', 671),
(10318, 'Constance Bay', 671),
(10319, 'Cookstown', 671),
(10320, 'Cornwall', 671),
(10321, 'Creemore', 671),
(10322, 'Crystal Beach', 671),
(10323, 'Deep River', 671),
(10324, 'Delhi', 671),
(10325, 'Deseronto', 671),
(10326, 'Downsview', 671),
(10327, 'Drayton', 671),
(10328, 'Dresden', 671),
(10329, 'Dryden', 671),
(10330, 'Dundalk', 671),
(10331, 'Dunnville', 671),
(10332, 'Durham', 671),
(10333, 'Dutton', 671),
(10334, 'Eganville', 671),
(10335, 'Elliot Lake', 671),
(10336, 'Elmira', 671),
(10337, 'Elmvale', 671),
(10338, 'Embrun', 671),
(10339, 'Englehart', 671),
(10340, 'Erin', 671),
(10341, 'Espanola', 671),
(10342, 'Essex', 671),
(10343, 'Etobicoke', 671),
(10344, 'Everett', 671),
(10345, 'Exeter', 671),
(10346, 'Fenelon Falls', 671),
(10347, 'Fergus', 671),
(10348, 'Forest', 671),
(10349, 'Fort Erie', 671),
(10350, 'Fort Frances', 671),
(10351, 'Frankford', 671),
(10352, 'Gananoque', 671),
(10353, 'Georgetown', 671),
(10354, 'Georgina', 671),
(10355, 'Geraldton', 671),
(10356, 'Glencoe', 671),
(10357, 'Goderich', 671),
(10358, 'Golden', 671),
(10359, 'Gormley', 671),
(10360, 'Grand Bend', 671),
(10361, 'Grand Valley', 671),
(10362, 'Gravenhurst', 671),
(10363, 'Guelph', 671),
(10364, 'Hagersville', 671),
(10365, 'Haileybury', 671),
(10366, 'Hamilton', 671),
(10367, 'Hanover', 671),
(10368, 'Harriston', 671),
(10369, 'Harrow', 671),
(10370, 'Hastings', 671),
(10371, 'Havelock', 671),
(10372, 'Hawkesbury', 671),
(10373, 'Hearst', 671),
(10374, 'Hensall', 671),
(10375, 'Hillsburgh', 671),
(10376, 'Hornepayne', 671),
(10377, 'Huntsville', 671),
(10378, 'Ingersoll', 671),
(10379, 'Innisfil', 671),
(10380, 'Iroquois', 671),
(10381, 'Iroquois Falls', 671),
(10382, 'Jarvis', 671),
(10383, 'Kanata', 671),
(10384, 'Kapuskasing', 671),
(10385, 'Kars', 671),
(10386, 'Kemptville', 671),
(10387, 'Kenora', 671),
(10388, 'Kincardine', 671),
(10389, 'Kingston', 671),
(10390, 'Kirkland Lake', 671),
(10391, 'Kitchener', 671),
(10392, 'L\'Original', 671),
(10393, 'Lakefield', 671),
(10394, 'Lanark', 671),
(10395, 'Leamington', 671),
(10396, 'Lindsay', 671),
(10397, 'Listowel', 671),
(10398, 'Little Current', 671),
(10399, 'Lively', 671),
(10400, 'London', 671),
(10401, 'Longlac', 671),
(10402, 'Lucan', 671),
(10403, 'Lucknow', 671),
(10404, 'Madoc', 671),
(10405, 'Manitouwadge', 671),
(10406, 'Maple', 671),
(10407, 'Marathon', 671),
(10408, 'Markdale', 671),
(10409, 'Markham', 671),
(10410, 'Marmora', 671),
(10411, 'Mattawa', 671),
(10412, 'Meaford', 671),
(10413, 'Metcalfe', 671),
(10414, 'Midland', 671),
(10415, 'Mildmay', 671),
(10416, 'Millbrook', 671),
(10417, 'Milton', 671),
(10418, 'Milverton', 671),
(10419, 'Mississauga', 671),
(10420, 'Mississauga Beach', 671),
(10421, 'Mitchell', 671),
(10422, 'Moose Factory', 671),
(10423, 'Morrisburg', 671),
(10424, 'Mount Albert', 671),
(10425, 'Mount Brydges', 671),
(10426, 'Mount Forest', 671),
(10427, 'Munster', 671),
(10428, 'Nanticoke', 671),
(10429, 'Napanee', 671),
(10430, 'Nepean', 671),
(10431, 'New Hamburg', 671),
(10432, 'Newmarket', 671),
(10433, 'Newtonville', 671),
(10434, 'Nobleton', 671),
(10435, 'North Bay', 671),
(10436, 'North Gower', 671),
(10437, 'North York', 671),
(10438, 'Norwich', 671),
(10439, 'Norwood', 671),
(10440, 'Oakville', 671),
(10441, 'Omemee', 671),
(10442, 'Onaping-Levack', 671),
(10443, 'Ontario', 671),
(10444, 'Orangeville', 671),
(10445, 'Orillia', 671),
(10446, 'Orono', 671),
(10447, 'Osgoode', 671),
(10448, 'Oshawa', 671),
(10449, 'Ottawa', 671),
(10450, 'Owen Sound', 671),
(10451, 'Paisley', 671),
(10452, 'Palmerston', 671),
(10453, 'Paris', 671),
(10454, 'Parkhill', 671),
(10455, 'Parry Sound', 671),
(10456, 'Pembroke', 671),
(10457, 'Perth', 671),
(10458, 'Petawawa', 671),
(10459, 'Peterborough', 671),
(10460, 'Petrolia', 671),
(10461, 'Pickering', 671),
(10462, 'Picton', 671),
(10463, 'Porcupine', 671),
(10464, 'Port Credit', 671),
(10465, 'Port Dover', 671),
(10466, 'Port Elgin', 671),
(10467, 'Port Hope', 671),
(10468, 'Port Perry', 671),
(10469, 'Port Stanley', 671),
(10470, 'Powassan', 671),
(10471, 'Prescott', 671),
(10472, 'Queensville', 671),
(10473, 'Renfrew', 671),
(10474, 'Richmond', 671),
(10475, 'Richmond Hill', 671),
(10476, 'Ridgetown', 671),
(10477, 'Rockland', 671),
(10478, 'Rockwood', 671),
(10479, 'Rodney', 671),
(10480, 'Saint Catharines', 671),
(10481, 'Saint Catharines-Niagara', 671),
(10482, 'Saint George', 671),
(10483, 'Saint Jacobs', 671),
(10484, 'Saint Marys', 671),
(10485, 'Saint Thomas', 671),
(10486, 'Sarnia', 671),
(10487, 'Sault Sainte Marie', 671),
(10488, 'Scarborough', 671),
(10489, 'Schomberg', 671),
(10490, 'Seaforth', 671),
(10491, 'Shelburne', 671),
(10492, 'Simcoe', 671),
(10493, 'Sioux Lookout', 671),
(10494, 'Smiths Falls', 671),
(10495, 'Smithville', 671),
(10496, 'South River', 671),
(10497, 'Southampton', 671),
(10498, 'Stayner', 671),
(10499, 'Stirling', 671),
(10500, 'Stoney Creek', 671),
(10501, 'Stoney Point', 671),
(10502, 'Stouffville', 671),
(10503, 'Stratford', 671),
(10504, 'Strathroy', 671),
(10505, 'Sturgeon Falls', 671),
(10506, 'Sudbury', 671),
(10507, 'Sutton', 671),
(10508, 'Tavistock', 671),
(10509, 'Teeswater', 671),
(10510, 'Terrace Bay', 671),
(10511, 'Thamesford', 671),
(10512, 'Thessalon', 671),
(10513, 'Thornbury', 671),
(10514, 'Thornhill', 671),
(10515, 'Thunder Bay', 671),
(10516, 'Tilbury', 671),
(10517, 'Tilsonburg', 671),
(10518, 'Timmins', 671),
(10519, 'Toronto', 671),
(10520, 'Tory Hill', 671),
(10521, 'Tottenham', 671),
(10522, 'Tweed', 671),
(10523, 'Uxbridge', 671),
(10524, 'Valley East', 671),
(10525, 'Vankleek Hill', 671),
(10526, 'Vaughan', 671),
(10527, 'Vineland', 671),
(10528, 'Walkerton', 671),
(10529, 'Wallaceburg', 671),
(10530, 'Wasaga Beach', 671),
(10531, 'Waterdown', 671),
(10532, 'Waterford', 671),
(10533, 'Waterloo', 671),
(10534, 'Watford', 671),
(10535, 'Wawa', 671),
(10536, 'Welland', 671),
(10537, 'Wellesley', 671),
(10538, 'Wellington', 671),
(10539, 'West Lorne', 671),
(10540, 'Wheatley', 671),
(10541, 'Whitby', 671),
(10542, 'Whitchurch-Stouffville', 671),
(10543, 'Wiarton', 671),
(10544, 'Wikwemikong', 671),
(10545, 'Willowdale', 671),
(10546, 'Winchester', 671),
(10547, 'Windsor', 671),
(10548, 'Wingham', 671),
(10549, 'Woodbridge', 671),
(10550, 'Woodstock', 671),
(10551, 'Wyoming', 671),
(10552, 'Acton Vale', 673),
(10553, 'Albanel', 673),
(10554, 'Alencon', 673),
(10555, 'Alma', 673),
(10556, 'Amos', 673),
(10557, 'Amqui', 673),
(10558, 'Anjou', 673),
(10559, 'Asbestos', 673),
(10560, 'Bagotville', 673),
(10561, 'Baie-Comeau', 673),
(10562, 'Baie-Saint-Paul', 673),
(10563, 'Barraute', 673),
(10564, 'Beauceville', 673),
(10565, 'Beaupre', 673),
(10566, 'Bedford', 673),
(10567, 'Beloeil', 673),
(10568, 'Bernierville', 673),
(10569, 'Berthierville', 673),
(10570, 'Betsiamites', 673),
(10571, 'Boisbriand', 673),
(10572, 'Bonaventure', 673),
(10573, 'Boucherville', 673),
(10574, 'Bromont', 673),
(10575, 'Brossard', 673),
(10576, 'Brownsburg', 673),
(10577, 'Buckingham', 673),
(10578, 'Cabano', 673),
(10579, 'Candiac', 673),
(10580, 'Cap-Chat', 673),
(10581, 'Cap-aux-Meules', 673),
(10582, 'Carleton', 673),
(10583, 'Causapscal', 673),
(10584, 'Chandler', 673),
(10585, 'Chapais', 673),
(10586, 'Charlesbourg', 673),
(10587, 'Chateau-Richer', 673),
(10588, 'Chibougamou', 673),
(10589, 'Chicoutimi-Jonquiere', 673),
(10590, 'Chisasibi', 673),
(10591, 'Chute-aux-Outardes', 673),
(10592, 'Clermont', 673),
(10593, 'Coaticook', 673),
(10594, 'Coleraine', 673),
(10595, 'Contrecoeur', 673),
(10596, 'Cookshire', 673),
(10597, 'Cowansville', 673),
(10598, 'Crabtree', 673),
(10599, 'Danville', 673),
(10600, 'Daveluyville', 673),
(10601, 'Degelis', 673),
(10602, 'Desbiens', 673),
(10603, 'Disraeli', 673),
(10604, 'Dolbeau', 673),
(10605, 'Donnacona', 673),
(10606, 'Dorval', 673),
(10607, 'Drummondville', 673),
(10608, 'East Angus', 673),
(10609, 'East Broughton', 673),
(10610, 'Farnham', 673),
(10611, 'Ferme-Neuve', 673),
(10612, 'Fermont', 673),
(10613, 'Filion', 673),
(10614, 'Forestville', 673),
(10615, 'Fort-Coulonge', 673),
(10616, 'Gaspe', 673),
(10617, 'Gentilly', 673),
(10618, 'Granby', 673),
(10619, 'Grande-Riviere', 673),
(10620, 'Grenville', 673),
(10621, 'Ham Nord', 673),
(10622, 'Hampstead', 673),
(10623, 'Hauterive', 673),
(10624, 'Havre-Saint-Pierre', 673),
(10625, 'Hebertville', 673),
(10626, 'Huntingdon', 673),
(10627, 'Joliette', 673),
(10628, 'Kingsey Falls', 673),
(10629, 'L\'Annonciation', 673),
(10630, 'L\'Ascension-de-Notre-Seigneur', 673),
(10631, 'L\'Epiphanie', 673),
(10632, 'La Malbaie', 673),
(10633, 'La Pocatiere', 673),
(10634, 'La Sarre', 673),
(10635, 'La Tuque', 673),
(10636, 'Labelle', 673),
(10637, 'Lac-Etchemin', 673),
(10638, 'Lac-Lapierre', 673),
(10639, 'Lac-Megantic', 673),
(10640, 'Lac-au-Saumon', 673),
(10641, 'Lachine', 673),
(10642, 'Lachute', 673),
(10643, 'Lacolle', 673),
(10644, 'Lasalle', 673),
(10645, 'Laurentides', 673),
(10646, 'Laurier-Station', 673),
(10647, 'Laval', 673),
(10648, 'Lavaltrie', 673),
(10649, 'Le Bic', 673),
(10650, 'Lebel-sur-Quevillon', 673),
(10651, 'Les Cedres', 673),
(10652, 'Les Coteaux', 673),
(10653, 'Les Escoumins', 673),
(10654, 'Liniere', 673),
(10655, 'Longueuil', 673),
(10656, 'Louiseville', 673),
(10657, 'Luceville', 673),
(10658, 'Macamic', 673),
(10659, 'Magog', 673),
(10660, 'Malartic', 673),
(10661, 'Maniwaki', 673),
(10662, 'Marieville', 673),
(10663, 'Maskinonge', 673),
(10664, 'Matagami', 673),
(10665, 'Matane', 673),
(10666, 'Metabetchouan', 673),
(10667, 'Mirabel', 673),
(10668, 'Mistissini', 673),
(10669, 'Mont-Joli', 673),
(10670, 'Mont-Laurier', 673),
(10671, 'Montmagny', 673),
(10672, 'Montreal', 673),
(10673, 'Murdochville', 673),
(10674, 'Napierville', 673),
(10675, 'New Richmond', 673),
(10676, 'Nicolet', 673),
(10677, 'Normandin', 673),
(10678, 'Notre-Dame-du-Bon-Conseil', 673),
(10679, 'Notre-Dame-du-Lac', 673),
(10680, 'Notre-Dame-du-Mont-Carmel', 673),
(10681, 'Oka-Kanesatake', 673),
(10682, 'Ormstown', 673),
(10683, 'Papineauville', 673),
(10684, 'Pierreville', 673),
(10685, 'Plessisville', 673),
(10686, 'Pointe-Claire', 673),
(10687, 'Pont-Rouge', 673),
(10688, 'Port-Alfred-Bagotville', 673),
(10689, 'Port-Cartier', 673),
(10690, 'Portneuf', 673),
(10691, 'Price', 673),
(10692, 'Princeville', 673),
(10693, 'Quebec', 673),
(10694, 'Rawdon', 673),
(10695, 'Repentigny', 673),
(10696, 'Richmond', 673),
(10697, 'Rigaud', 673),
(10698, 'Rimouski', 673),
(10699, 'Riviere-au-Renard', 673),
(10700, 'Riviere-du-Loup', 673),
(10701, 'Roberval', 673),
(10702, 'Rougemont', 673),
(10703, 'Rouyn-Noranda', 673),
(10704, 'Saint-Agapit', 673),
(10705, 'Saint-Alexandre', 673),
(10706, 'Saint-Alexis-des-Monts', 673),
(10707, 'Saint-Ambroise', 673),
(10708, 'Saint-Andre-Avellin', 673),
(10709, 'Saint-Anselme', 673),
(10710, 'Saint-Apollinaire', 673),
(10711, 'Saint-Augustin', 673),
(10712, 'Saint-Basile-Sud', 673),
(10713, 'Saint-Bruno', 673),
(10714, 'Saint-Canut', 673),
(10715, 'Saint-Cesaire', 673),
(10716, 'Saint-Cyrill-de-Wendover', 673),
(10717, 'Saint-Damase', 673);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE `tbl_country` (
  `c_id` int(11) NOT NULL,
  `country_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`c_id`, `country_name`) VALUES
(38, 'Canada');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manager`
--

CREATE TABLE `tbl_manager` (
  `manager_id` int(11) NOT NULL,
  `manager_name` varchar(5000) NOT NULL,
  `manager_phone` varchar(5000) NOT NULL,
  `manager_email` varchar(5000) NOT NULL,
  `manager_password` varchar(5000) NOT NULL,
  `manager_dob` varchar(500) NOT NULL,
  `manager_country` int(11) NOT NULL,
  `manager_state` int(11) NOT NULL,
  `manager_city` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_manager`
--

INSERT INTO `tbl_manager` (`manager_id`, `manager_name`, `manager_phone`, `manager_email`, `manager_password`, `manager_dob`, `manager_country`, `manager_state`, `manager_city`) VALUES
(9, 'Manager_1', '7784585855', 'manager1@algomau.ca', 'manager123', '06/20/1985', 38, 671, 10519),
(10, 'Manager_2', '9855558585', 'manager2@algomau.ca', 'manager123', '10/02/1991', 38, 665, 10205),
(11, 'Manager_3', '3325288855', 'manager_3@algomau.ca', 'manager123', '07/04/2001', 38, 663, 10093),
(12, 'manager_6', '7052572501', 'malsaiari@algomau.ca', '123456', '04/21/1990', 38, 671, 10487),
(13, 's2', '5125586699', 's2@algomau.ca', '12345', '03/05/2002', 38, 673, 10672);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `staff_id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `staff_name` varchar(5000) NOT NULL,
  `staff_phone` varchar(5000) NOT NULL,
  `staff_email` varchar(5000) NOT NULL,
  `staff_password` varchar(5000) NOT NULL,
  `staff_dob` varchar(500) NOT NULL,
  `staff_country` int(11) NOT NULL,
  `staff_state` int(11) NOT NULL,
  `staff_city` int(11) NOT NULL,
  `staff_age` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`staff_id`, `manager_id`, `staff_name`, `staff_phone`, `staff_email`, `staff_password`, `staff_dob`, `staff_country`, `staff_state`, `staff_city`, `staff_age`) VALUES
(4, 8, 's1', '1234567899', 's12@algomau.ca', 's1', '12/27/2017', 38, 663, 10095, '0'),
(8, 9, 'staff_1', '9999858586', 'staff1@algomau.ca', 'staff123', '11/26/1975', 38, 663, 10094, '42'),
(9, 10, 'staff_2', '5225255335', 'staff2@algomau.ca', 'staff123', '05/10/2002', 38, 663, 10097, '15'),
(10, 10, 'staff_2', '9953245554', 'staff_2@algomau.ca', 'test123', '03/09/2011', 38, 663, 10095, '6');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `s_id` int(11) NOT NULL,
  `state_name` varchar(5000) NOT NULL,
  `s_c_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`s_id`, `state_name`, `s_c_id`) VALUES
(663, 'Alberta', 38),
(664, 'British Columbia', 38),
(665, 'Manitoba', 38),
(666, 'New Brunswick', 38),
(667, 'Newfoundland and Labrador', 38),
(668, 'Northwest Territories', 38),
(669, 'Nova Scotia', 38),
(670, 'Nunavut', 38),
(671, 'Ontario', 38),
(672, 'Prince Edward Island', 38),
(673, 'Quebec', 38),
(674, 'Saskatchewan', 38),
(675, 'Yukon', 38);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `uid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(85) NOT NULL,
  `phno` varchar(85) NOT NULL,
  `city` varchar(500) NOT NULL,
  `role` varchar(500) NOT NULL,
  `country` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`uid`, `name`, `email`, `password`, `phno`, `city`, `role`, `country`, `state`, `role_id`) VALUES
(4, 'admin', 'demo@algomau.ca', 'admin', '9974240067', '301', 'admin', 101, 3, 1),
(5, 'anurag', 'anurag@algomau.ca', 'anurag', '9974240067', '1', 'manager', 101, 1, 4),
(6, 'ibhrahim', 'ibhrahim@algomau.ca', 'ibhrahim', '4534544354', '300', 'staff', 101, 3, 5),
(7, 'demo123', 'demo@algomau.ca', 'demo', '9974240067', '319', 'staff', 101, 4, 5),
(10, 'ibhrahim1', 'ibhrahim1@algomau.ca', 'ibhrahim1', '9974240067', '318', 'staff', 101, 4, 6),
(11, 'demo1233334', 'demo123333@algomau.ca', 'demo123333', '9974240067', '318', 'manager', 101, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(4) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`) VALUES
(3, 'muhammed', 'ali'),
(8, 'ali123', '$2y$10$Gy.rvzpwJTWtNcxkxqirMOm0se33uEorx29z4FvAypktNJDtd0vLC'),
(9, 'aliali', '$2y$10$QMIducKAlkZiptmTL6ZuouDs2uE/fXh/aMo30W9040/IfOUybeCki'),
(10, 'ali123', '$2y$10$Bbs89yaoUTFXpc6HIzwMjO3f1kG2q0XiL6766MDWRSf9.NlHSltQm'),
(11, 'mohaa', '$2y$10$5uCneRsFUmgFPoBol.btcetuaRP46ickRLfi7vLbOhh8vlZSq81qi'),
(12, 'mohaa', '$2y$10$rjJQf1Ce5A/hnhS/W5tck..u24bLipM040chMmKzhNqBelmogFUeq'),
(13, 'kmdska', '$2y$10$a7i0pzR9FPTt/9nds.C89OOV1szZT9bKT1WxQhkSNciwa2DtSqgAu'),
(14, 'cvs', '$2y$10$U/dJGX1Yw7xdaXIIAhXD9eoy7VEKbyHlPGA0xv/A6nCebAckHzy5.'),
(15, 'hlahlahla', '$2y$10$P.oVjZvynEqrILsy1dgjNe9xNUM5ujCH5GElHye5LXESQ4ylD6662'),
(16, 'hlahlahla', '$2y$10$bK5pnCrFpeYBZQEaS3UtguMao0N8CeTY.gLjQxSoCWibTXHIOPGcm'),
(17, 'hlahlahla', '$2y$10$AZ/hIoLJOXcZSu7ZXSXc9ezPb4kAJze3gd3TJ47QIrp55ftNp06z2'),
(18, 'hlahlahla', '$2y$10$4S.nrRB9/LaBr57N9rO/9urEMhRwjAcyOESpZ/FJMwfWVqdHu.5gi'),
(19, 'hlahlahla', '$2y$10$bQmDRLZ6oRRJEUeDLGHzNup3aiLs7iVTG8N3QxQs3wJr6j/W.0ODq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_country`
--
ALTER TABLE `tbl_country`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_manager`
--
ALTER TABLE `tbl_manager`
  ADD PRIMARY KEY (`manager_id`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `city` (`city`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10718;

--
-- AUTO_INCREMENT for table `tbl_country`
--
ALTER TABLE `tbl_country`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_manager`
--
ALTER TABLE `tbl_manager`
  MODIFY `manager_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=676;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
