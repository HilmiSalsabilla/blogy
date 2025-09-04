-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2025 at 08:32 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogy_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` mediumtext NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$12$tIXEIl8qjNgKcEgGe0YHW.ZV5fVt.JSNYpwLU1iJfu29efg5Bi9fW', '2025-09-03 05:30:42', '2025-09-03 05:30:42'),
(2, 'Admin1', 'admin1@gmail.com', '$2y$12$yNzI7t7N3X9nzYI8ITw8q..bz6LUoaPFJjzLBJDXDwW/0SxuUOCZG', '2025-09-03 19:01:51', '2025-09-03 19:01:51'),
(3, 'Admin2', 'admin2@gmail.com', '$2y$12$nrM3D5oHUO6eUpqlhyFfpuQgJaWAxuSV7JiIgG/KzrjpLBnwChzPm', '2025-09-03 19:04:31', '2025-09-03 19:04:31');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(1, 'Business', '2025-08-29 14:04:47'),
(2, 'Culture', '2025-08-29 14:04:47'),
(3, 'Politics', '2025-08-29 14:05:32'),
(4, 'Travel', '2025-08-29 14:05:32'),
(5, 'Technology', '2025-08-29 14:57:22'),
(6, 'Food', '2025-08-29 14:57:22');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `image` varchar(200) NOT NULL DEFAULT '	user.png',
  `post_id` int(10) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `user_name`, `user_email`, `image`, `post_id`, `comment`, `created_at`) VALUES
(1, 1, 'User', 'user@gmail.com', '	user.png', 22, 'Synergistically customize effective solutions via 24/7 e-business. Seamlessly deliver extensible quality vectors through premier schemas. Competently communicate client-centric core competencies.', '2025-08-30 06:32:17'),
(2, 1, 'User', 'user@gmail.com', '	user.png', 21, 'Proactively deliver resource-leveling strategic theme areas and empowered schemas. Credibly leverage other\'s distributed action items whereas installed base schemas. Monotonectally.', '2025-08-30 08:50:24'),
(3, 1, 'User', 'user@gmail.com', '	user.png', 3, 'Authoritatively embrace synergistic technology for maintainable \"outside the box\" thinking. Objectively incubate best-of-breed strategic theme areas whereas user-centric ideas. Seamlessly.', '2025-08-30 08:55:29'),
(4, 1, 'User', 'user@gmail.com', '	user.png', 2, 'Efficiently conceptualize standards compliant content without prospective testing procedures. Collaboratively monetize multimedia based initiatives rather than turnkey results. Interactively enhance.', '2025-08-30 08:55:44'),
(5, 1, 'User', 'user@gmail.com', '	user.png', 11, 'Completely develop functional intellectual capital whereas integrated best practices. Interactively fashion standardized quality vectors through equity invested users. Dramatically administrate.', '2025-08-30 08:59:30'),
(6, 3, 'UserTwo', 'usertwo@gmail.com', '	user.png', 26, 'Dramatically target cooperative results with state of the art methods of empowerment. Monotonectally parallel task B2C web-readiness and exceptional platforms.', '2025-08-30 12:43:28'),
(7, 1, 'User', 'user@gmail.com', '	user.png', 4, 'Credibly foster granular e-markets vis-a-vis leading-edge manufactured products. Efficiently cultivate timely models rather.', '2025-08-31 04:01:09');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(200) NOT NULL DEFAULT '',
  `user_id` int(10) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `image`, `description`, `category`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES
(2, 'Startup Funding Trends 2025', 'img_2_sq.jpg', 'The global startup ecosystem in 2025 is witnessing a significant shift in how investors allocate capital. Unlike previous years where aggressive growth was prioritized, today’s investors are focusing more on sustainable business models, profitability, and long-term resilience. Startups in sectors such as artificial intelligence, fintech, healthtech, and climate tech continue to attract strong attention, reflecting global priorities in technology adoption and sustainability. Venture capital firms are also becoming more selective, favoring companies with clear value propositions and scalable solutions.\r\n\r\nOne of the biggest funding trends in 2025 is the rise of alternative financing models. Crowdfunding, revenue-based financing, and decentralized funding platforms powered by blockchain are gaining popularity, offering startups new ways to access capital without relying solely on traditional venture capital. At the same time, corporate venture arms are increasing their investments, seeking innovation through partnerships with startups that can bring disruptive solutions to established industries. This diversification of funding sources provides entrepreneurs with greater flexibility in choosing the right path for growth.\r\n\r\nGeographically, emerging markets in Asia, Africa, and Latin America are seeing stronger inflows of startup funding as investors look beyond Silicon Valley and Europe. These regions offer young, tech-savvy populations and untapped opportunities in areas such as digital payments, e-commerce, and green technology. As global economic conditions remain uncertain, startups that can demonstrate resilience, adaptability, and impact will continue to thrive. The funding landscape of 2025 is therefore more strategic, cautious, and innovation-driven, setting the tone for the next generation of entrepreneurs.', 'Business', 1, 'User', '2025-08-29 09:05:13', '2025-08-29 09:05:13'),
(3, 'Remote Work and Business Growth', 'img_3_sq.jpg', 'Remote work has transformed from a temporary solution during the pandemic into a long-term strategy for many organizations. Businesses across the globe are recognizing the benefits of flexible work arrangements, including reduced operational costs, access to wider talent pools, and improved employee satisfaction. Companies that embrace remote work models are not only cutting down on expenses such as office space but are also creating opportunities for global collaboration without geographical limits.\n\nThe link between remote work and business growth is becoming increasingly clear. By hiring remotely, businesses can tap into specialized skills from anywhere in the world, enabling faster innovation and greater competitiveness. Furthermore, employees working remotely often report higher productivity levels due to fewer distractions and the ability to customize their work environments. This productivity boost, combined with lower overhead costs, contributes directly to revenue growth and long-term sustainability.\n\nHowever, for remote work to drive consistent business growth, companies must address challenges such as communication gaps, employee engagement, and data security. Investing in collaboration tools, cybersecurity infrastructure, and employee wellness programs will be essential. Businesses that successfully balance flexibility with accountability are more likely to thrive in this evolving landscape. As remote work becomes a permanent fixture, it will remain a powerful driver of efficiency, innovation, and global business expansion.', 'Business', 1, 'User', '2025-08-29 09:05:13', '2025-08-29 09:05:13'),
(4, 'AI and Automation in Enterprises', 'img_4_sq.jpg', 'Artificial intelligence (AI) and automation are redefining how enterprises operate in today’s digital economy. From streamlining internal workflows to enhancing customer experiences, these technologies are no longer optional but essential for competitiveness. Businesses across industries—ranging from finance to manufacturing—are adopting AI-driven solutions to improve decision-making, optimize supply chains, and reduce costs. Automation, particularly in repetitive and data-heavy tasks, is enabling organizations to allocate resources more efficiently while focusing on innovation and growth.\r\n\r\nThe integration of AI and automation is also driving smarter customer engagement. Enterprises are using AI-powered chatbots, recommendation engines, and predictive analytics to provide personalized services and anticipate customer needs. In addition, robotic process automation (RPA) is transforming back-office operations such as accounting, HR, and compliance, helping businesses maintain accuracy and speed at scale. This shift allows companies to build stronger relationships with customers while maintaining operational excellence.\r\n\r\nNevertheless, the adoption of AI and automation comes with challenges. Enterprises must address concerns about workforce adaptation, ethical use of AI, and data privacy. Upskilling employees to work alongside intelligent systems will be crucial to ensure sustainable growth. Companies that embrace responsible AI practices, transparency, and continuous learning will be best positioned to thrive. In the future, AI and automation will not just support enterprises but will become the backbone of business transformation and global competitiveness.\r\n\r\nSynergistically orchestrate excellent data without process-centric leadership. Synergistically conceptualize equity invested convergence through cross functional e-markets. Proactively deploy cost effective growth strategies for premium action items. Assertively plagiarize accurate outsourcing for focused architectures. Conveniently integrate competitive schemas rather than competitive.', 'Business', 1, 'User', '2025-08-29 09:05:13', '2025-08-29 09:05:13'),
(5, 'The Rise of Green Businesses', 'img_5_sq.jpg', 'In recent years, the global shift toward sustainability has fueled the rise of green businesses across industries. Consumers are becoming more environmentally conscious, demanding eco-friendly products, renewable energy solutions, and sustainable supply chains. This change in consumer behavior has pushed companies to adapt their practices, from reducing carbon emissions to adopting circular economy models. As a result, sustainability is no longer just a trend—it has become a core strategy for long-term business growth.\n\nGreen businesses are also attracting significant investment opportunities. Governments and private investors are increasingly channeling funds into renewable energy, electric vehicles, sustainable agriculture, and green technology. Enterprises that prioritize sustainability not only gain access to these financial incentives but also strengthen their brand reputation, making them more appealing to eco-conscious customers and partners. This alignment between profitability and environmental responsibility demonstrates that green business practices can drive both financial and social impact.\n\nLooking ahead, the rise of green businesses will continue to shape the future of global markets. Companies that fail to adopt sustainable practices risk falling behind competitors that integrate environmental responsibility into their business models. At the same time, collaboration between governments, corporations, and communities will be crucial to accelerating the transition toward greener economies. Ultimately, the success of green businesses proves that profitability and sustainability can go hand in hand, setting the foundation for a more responsible and resilient future.', 'Business', 1, 'User', '2025-08-29 09:05:13', '2025-08-29 09:05:13'),
(6, 'Preserving Traditional Arts in the Modern Era', 'img_1_sq.jpg', 'Traditional arts, ranging from music and dance to crafts and storytelling, are essential in keeping cultural heritage alive. They carry the values, beliefs, and history of communities, serving as a bridge between past and present. However, in today’s rapidly changing world, traditional arts face challenges as modern lifestyles, digital entertainment, and global influences dominate. Without intentional preservation efforts, many of these cultural treasures risk fading into obscurity.\n\nIn recent years, efforts to preserve traditional arts have taken new forms. Cultural institutions, governments, and local communities are promoting heritage festivals, workshops, and educational programs to keep traditions relevant to younger generations. Technology also plays a vital role, as digital platforms allow traditional performances, crafts, and practices to reach global audiences. Social media campaigns and online exhibitions help raise awareness, proving that ancient traditions can thrive in modern contexts.\n\nThe future of traditional arts depends on balance—honoring authenticity while embracing innovation. By integrating traditional art forms into contemporary expressions such as fashion, film, and digital design, cultures can ensure their relevance in today’s society. Ultimately, preserving traditional arts is not just about safeguarding the past but also about enriching the cultural identity of future generations. Through collective effort, these art forms will continue to inspire, educate, and connect people across time and borders.', 'Culture', 1, 'User', '2025-08-29 09:05:13', '2025-08-29 09:05:13'),
(7, 'Culinary Journeys Around the World', 'img_2_sq.jpg', 'Food is more than just sustenance—it is a reflection of history, culture, and identity. Culinary journeys around the world allow people to explore diverse traditions, flavors, and cooking techniques that have been passed down for generations. From the rich spices of Indian curries to the delicate artistry of Japanese sushi, every cuisine tells a story of the people and places it represents. Traveling through food becomes a cultural experience, connecting individuals to different ways of life.\n\nIn today’s globalized world, culinary traditions are blending while also maintaining their uniqueness. Street food in Bangkok, tapas in Spain, or pasta in Italy attract not only locals but also travelers seeking authentic tastes. Meanwhile, food tourism has become a booming industry, with travelers planning entire trips around dining experiences and culinary festivals. This growing interest highlights how food can act as a universal language, bringing people together regardless of borders or backgrounds.\n\nCulinary journeys are also evolving through innovation. Fusion cuisines, plant-based dining, and sustainable food practices are shaping how people eat and experience culture. As chefs and food enthusiasts experiment with blending traditions and modern trends, global cuisine continues to expand its horizons. Ultimately, exploring the world through food is not just about eating—it is about appreciating heritage, fostering connections, and celebrating the diversity that makes our world so vibrant.', 'Culture', 1, 'User', '2025-08-29 09:05:13', '2025-08-29 09:05:13'),
(8, 'The Power of Storytelling', 'img_3_sq.jpg', 'Storytelling has always been a fundamental part of human culture, serving as a way to pass down knowledge, values, and traditions from one generation to the next. Long before the written word, stories were shared orally around fires, helping communities make sense of the world and strengthening social bonds. Today, storytelling continues to play a powerful role, shaping how we understand ourselves and others. Whether in myths, folktales, or modern narratives, stories remain a tool for preserving cultural identity.\n\nIn the modern era, storytelling has expanded into diverse forms such as film, literature, theater, and digital media. Stories have the power to inspire, educate, and connect people across cultures. They can spark empathy by allowing audiences to step into someone else’s perspective, or drive social change by highlighting pressing issues in society. Businesses, educators, and leaders also use storytelling as a strategy to communicate messages more effectively and build emotional connections.\n\nThe enduring power of storytelling lies in its ability to evolve with time while maintaining its essence. As technology advances, stories are now told through podcasts, virtual reality, and social platforms, reaching global audiences instantly. Yet at its core, storytelling is still about human connection. By sharing experiences, emotions, and ideas, storytelling continues to shape cultures, influence societies, and inspire future generations to imagine new possibilities.', 'Culture', 1, 'User', '2025-08-29 09:05:13', '2025-08-29 09:05:13'),
(9, 'Festivals that Unite Communities', 'img_4_sq.jpg', 'Festivals have always been more than just celebrations; they are powerful occasions that bring people together, fostering unity and a sense of belonging. Across cultures, festivals provide an opportunity for communities to honor traditions, share joy, and strengthen social bonds. Whether it is a harvest festival, a religious ceremony, or a national holiday, these gatherings create spaces where individuals come together despite differences in age, background, or belief.\n\nAround the world, festivals showcase the diversity of cultural expression while also highlighting shared human values. For example, Lunar New Year in Asia, Diwali in India, or Carnival in Brazil not only celebrate cultural heritage but also attract people from all walks of life to participate. Food, music, dance, and rituals become universal languages that help break down barriers and encourage understanding among communities. These events remind us that unity often emerges through shared experiences of joy and celebration.\n\nIn the modern era, festivals continue to evolve, blending tradition with contemporary elements. Music and arts festivals, for instance, now bring together global audiences, while community-driven events emphasize sustainability and inclusivity. Whether ancient or modern, local or international, festivals remain vital in uniting people and strengthening the social fabric. They serve as a reminder that, no matter how diverse our backgrounds may be, the act of celebrating together creates harmony and lasting connections.', 'Culture', 1, 'User', '2025-08-29 09:05:13', '2025-08-29 09:05:13'),
(10, 'Art and Technology Fusion', 'img_5_sq.jpg', 'The fusion of art and technology is transforming the way creativity is expressed and experienced in the modern world. From digital paintings and 3D modeling to interactive installations, artists are increasingly using technological tools to push the boundaries of imagination. This combination allows for new forms of expression that were previously impossible, enabling creators to blend traditional artistry with cutting-edge innovations.\n\nOne of the most significant impacts of this fusion is the rise of immersive experiences. Virtual reality (VR) and augmented reality (AR) are giving audiences the chance to step inside works of art, interact with them, and experience culture in entirely new dimensions. Digital galleries and online platforms also allow artists to share their work with global audiences, breaking down geographical barriers and democratizing access to art. In this sense, technology is not only a tool for creation but also a bridge between artists and communities.\n\nLooking ahead, the relationship between art and technology will continue to evolve, shaping the cultural landscape of the future. Artificial intelligence, for instance, is being used to generate original artworks, compose music, and even collaborate with human artists. While some debate whether machine-made art can truly carry emotional depth, it is clear that technology opens up endless possibilities for creative exploration. Ultimately, the fusion of art and technology reflects humanity’s constant desire to innovate while preserving the essence of artistic expression.', 'Culture', 1, 'User', '2025-08-29 09:05:13', '2025-08-29 09:05:13'),
(11, 'Global Democracy in the Digital Age', 'img_1_sq.jpg', 'The digital age has reshaped how democracy functions around the world, offering both opportunities and challenges. Digital platforms provide citizens with faster access to information, greater political participation, and new channels to hold leaders accountable. Social media, for example, has become a space where individuals can voice opinions, mobilize movements, and influence policy discussions on a global scale. This connectivity empowers people and strengthens the democratic process by making participation more inclusive and immediate.\n\nAt the same time, digital democracy faces significant obstacles. The spread of misinformation, online polarization, and cyberattacks pose serious risks to democratic institutions. Fake news and disinformation campaigns can manipulate public opinion, while algorithms often amplify divisive content, undermining social trust. Governments and organizations must therefore balance freedom of expression with the need to protect citizens from harmful digital practices. Ensuring cybersecurity and safeguarding data privacy are now essential for preserving the integrity of democratic systems.\n\nLooking ahead, the future of global democracy in the digital age will depend on how societies adapt to technological change. Building digital literacy, promoting transparency, and fostering responsible governance will be crucial in maintaining trust. International cooperation is also needed to create fair regulations that prevent digital tools from being abused while ensuring they remain a force for empowerment. If harnessed responsibly, technology has the potential to make democracy more resilient, participatory, and responsive in an interconnected world.', 'Politics', 1, 'User', '2025-08-29 09:05:13', '2025-08-29 09:05:13'),
(12, 'Climate Policy Challenges', 'img_2_sq.jpg', 'Climate policy has become one of the most pressing issues in global politics, as nations struggle to balance economic growth with environmental responsibility. Governments are under increasing pressure to reduce greenhouse gas emissions, invest in renewable energy, and commit to international agreements like the Paris Accord. However, the complexity of transitioning away from fossil fuels and restructuring entire industries makes climate policy a difficult path to implement effectively.\n\nOne of the major challenges lies in the conflicting interests between developed and developing nations. Wealthier countries, historically responsible for the bulk of emissions, are expected to lead in funding and technological innovation. Meanwhile, developing nations argue that they need more time and resources to achieve sustainable growth without sacrificing poverty reduction and industrial progress. This tension often slows down negotiations and results in policies that lack strong enforcement.\n\nAnother obstacle is the influence of political and corporate interests. Powerful industries, such as oil and gas, often resist stricter regulations, while short-term political cycles discourage leaders from making bold climate commitments. Additionally, misinformation and public skepticism can weaken support for necessary reforms. To overcome these challenges, climate policy must emphasize global cooperation, transparency, and the integration of sustainable practices into every sector of society. Without unified action, the political hurdles surrounding climate change may continue to delay meaningful progress.', 'Politics', 1, 'User', '2025-08-29 09:05:13', '2025-08-29 09:05:13'),
(13, 'Youth Engagement in Politics', 'img_3_sq.jpg', 'Youth engagement in politics has become increasingly vital in shaping the future of democratic societies. With growing access to information through digital platforms, young people today are more aware of political issues and eager to influence change. Their participation goes beyond voting; it includes activism, community organizing, and raising awareness on issues such as climate change, social justice, and education reform. This rising involvement reflects a desire among younger generations to have their voices heard and their concerns addressed by policymakers.\n\nHowever, young people often face barriers to political participation. Limited representation in decision-making bodies, lack of political education, and skepticism toward traditional institutions can discourage them from active involvement. Many feel disconnected from political leaders who fail to address the challenges they face, such as unemployment, inequality, and environmental threats. Bridging this gap requires inclusive policies, mentorship programs, and platforms that empower youth to take part in governance and policy development.\n\nThe growing presence of youth movements worldwide demonstrates the transformative power of young voices in politics. From grassroots campaigns to international advocacy, young leaders are proving their ability to challenge the status quo and push for progressive reforms. Encouraging youth engagement not only strengthens democracy but also ensures that future policies are more representative, innovative, and responsive to societal needs. By supporting and amplifying young voices, societies can build more sustainable and inclusive political systems for generations to come.', 'Politics', 1, 'User', '2025-08-29 09:05:13', '2025-08-29 09:05:13'),
(14, 'International Relations in 2025', 'img_4_sq.jpg', 'The landscape of international relations in 2025 is marked by both cooperation and competition, as global powers navigate complex challenges. Issues such as climate change, cybersecurity, and global health have pushed nations to work together through multilateral organizations and strategic partnerships. At the same time, geopolitical tensions remain high in regions like Eastern Europe, the South China Sea, and the Middle East, reminding the world that diplomacy and negotiation are as crucial as ever.\n\nTechnology continues to play a central role in shaping international relations. Cybersecurity threats, artificial intelligence, and digital surveillance have become new areas of both collaboration and conflict among nations. Countries are racing to establish dominance in technological innovation while also debating ethical standards and regulations. The digital age has expanded diplomacy beyond traditional statecraft, requiring governments to adapt to a fast-changing, interconnected environment.\n\nLooking forward, international relations in 2025 reflect a delicate balance between global cooperation and national interests. While alliances such as NATO, ASEAN, and the European Union seek to strengthen unity, rising nationalism and economic competition challenge global stability. The future of diplomacy will depend on how well nations manage shared responsibilities while respecting sovereignty. In a world facing climate crises, economic uncertainties, and rapid technological change, building trust and dialogue remains the cornerstone of sustainable international relations.', 'Politics', 1, 'User', '2025-08-29 09:05:13', '2025-08-29 09:05:13'),
(15, 'The Future of Voting Systems', 'img_5_sq.jpg', 'The future of voting systems is being shaped by rapid technological advancements and the demand for more secure, transparent, and accessible elections. Traditional paper ballots are increasingly being supplemented—or in some cases replaced—by digital systems designed to streamline the voting process. Innovations such as online voting platforms, biometric verification, and blockchain-based systems are being explored to enhance both convenience and trust in democratic processes. These technologies promise to reduce errors, prevent fraud, and increase participation rates by making voting more accessible.\n\nHowever, the adoption of modern voting systems also brings significant challenges. Concerns over cybersecurity, voter privacy, and potential system manipulation remain major obstacles. A single vulnerability in digital infrastructure can undermine public confidence in the electoral process. Additionally, the digital divide poses another risk, as not all citizens have equal access to reliable internet or digital literacy. To ensure inclusivity, governments must balance technological innovation with safeguards that guarantee fairness and accessibility for all voters.\n\nLooking ahead, the future of voting systems will likely be a hybrid model that combines traditional methods with digital enhancements. Paper ballots may continue to serve as a secure backup while advanced technologies handle verification and counting. International collaboration on best practices, along with transparent oversight, will be essential in building trust. If implemented responsibly, modern voting systems have the potential to strengthen democracy by making elections more efficient, secure, and representative in the years to come.', 'Politics', 1, 'User', '2025-08-29 09:05:13', '2025-08-29 09:05:13'),
(16, 'Hidden Gems of Southeast Asia', 'img_1_sq.jpg', 'Southeast Asia is known for its vibrant cities, tropical beaches, and cultural landmarks, but beyond the famous destinations lie hidden gems waiting to be explored. From secluded islands to ancient towns, the region offers countless treasures that remain off the typical tourist trail. These lesser-known spots provide travelers with authentic experiences, untouched natural beauty, and a chance to connect more deeply with local cultures.\n\nIn Laos, the peaceful town of Luang Namtha offers breathtaking mountain scenery and opportunities to trek through remote villages. Meanwhile, in Indonesia, the island of Flores captivates visitors with its volcanic landscapes, traditional villages, and the stunning Komodo National Park nearby. Cambodia’s Koh Rong Samloem, a quieter alternative to its more crowded beaches, enchants travelers with crystal-clear waters and a laid-back atmosphere. These destinations remind us that Southeast Asia’s beauty extends far beyond its most popular attractions.\n\nExploring these hidden gems also supports sustainable travel by spreading tourism more evenly across the region. Smaller communities benefit from increased economic opportunities, while travelers enjoy unique experiences away from mass tourism. As interest in authentic and responsible travel grows, the hidden gems of Southeast Asia will continue to attract adventurous explorers seeking meaningful journeys. For those willing to venture off the beaten path, the region offers endless surprises and unforgettable memories.', 'Travel', 1, 'User', '2025-08-29 09:05:13', '2025-08-29 09:05:13'),
(17, 'Digital Nomads Lifestyle', 'img_2_sq.jpg', 'The rise of remote work has given birth to a growing community of digital nomads—individuals who combine work and travel, often moving from one destination to another while maintaining their careers online. This lifestyle offers freedom, flexibility, and the opportunity to explore new cultures while working. Digital nomads can often choose affordable destinations with strong internet connectivity, co-working spaces, and vibrant communities that support their mobile way of life.\n\nLiving as a digital nomad comes with both opportunities and challenges. On one hand, it allows for personal growth, networking with like-minded professionals, and the chance to experience diverse environments. On the other hand, managing time zones, maintaining work discipline, and dealing with visa restrictions can be difficult. Many digital nomads rely on online tools for project management, communication, and collaboration to stay productive while constantly on the move.\n\nThe lifestyle of digital nomads is also shaping travel trends and local economies. Cities such as Bali, Chiang Mai, and Lisbon have become hubs for remote workers, offering affordable living, supportive communities, and cultural experiences. Local businesses benefit from this influx of international residents, while co-working spaces and digital infrastructure continue to expand. As more people embrace location-independent work, the digital nomad lifestyle is redefining how we think about work, travel, and the concept of home in the modern world.', 'Travel', 1, 'User', '2025-08-29 09:05:13', '2025-08-29 09:05:13'),
(18, 'Top Sustainable Travel Spots', 'img_3_sq.jpg', 'Sustainable travel has gained momentum as travelers become more conscious of their environmental impact. Choosing destinations that prioritize eco-friendly practices, conservation, and community support allows visitors to enjoy authentic experiences while minimizing harm to the planet. From green resorts to wildlife-friendly tours, sustainable travel is reshaping the way people explore the world.\n\nIceland stands out as a top destination for sustainable travelers, offering breathtaking landscapes, geothermal energy-powered accommodations, and a strong focus on preserving natural habitats. Costa Rica is another leading example, with its extensive national parks, eco-lodges, and initiatives to protect biodiversity. In Asia, Bhutan’s commitment to “Gross National Happiness” ensures that tourism remains sustainable, with strict visitor limits, eco-friendly lodges, and support for local communities. These destinations prove that responsible travel can coexist with unforgettable experiences.\n\nBeyond natural conservation, sustainable travel also emphasizes cultural preservation and community engagement. Tourists are encouraged to support local artisans, choose homestays over large hotels, and participate in initiatives that benefit residents. By making conscious choices, travelers not only reduce their carbon footprint but also contribute to the economic and social well-being of the destinations they visit. Sustainable travel is no longer a niche concept—it is a pathway to more meaningful, responsible, and enjoyable journeys around the globe.', 'Travel', 1, 'User', '2025-08-29 09:05:13', '2025-08-29 09:05:13'),
(19, 'Cultural Immersion Experiences', 'img_4_sq.jpg', 'Traveling offers more than just sightseeing; it provides an opportunity to deeply engage with the cultures of the places we visit. Cultural immersion experiences allow travelers to go beyond typical tourist activities and truly connect with local traditions, customs, and daily life. From learning traditional crafts and participating in festivals to sharing meals with local families, these experiences enrich travel by fostering understanding and respect for diverse ways of life.\n\nParticipating in cultural immersion can transform the way we perceive the world. In Japan, travelers can join tea ceremonies or stay in rural ryokans to experience local hospitality and customs. In Morocco, visitors might explore markets with a local guide, learning about traditional crafts and the stories behind them. Even volunteering or engaging in community projects abroad allows travelers to gain insights into social, economic, and environmental challenges while making meaningful contributions.\n\nBeyond personal enrichment, cultural immersion benefits host communities as well. Responsible tourism supports local economies, preserves traditions, and encourages sustainable practices. By choosing experiences that prioritize authenticity and mutual respect, travelers create positive interactions that leave lasting impacts. Ultimately, cultural immersion transforms travel into a journey of connection, empathy, and discovery, offering memories and lessons that go far beyond the destination itself.', 'Travel', 1, 'User', '2025-08-29 09:05:13', '2025-08-29 09:05:13'),
(20, 'Future of Space Tourism', 'img_5_sq.jpg', 'The future of space tourism is quickly moving from science fiction to reality, as private companies and governments invest heavily in making space travel accessible to civilians. With companies like SpaceX, Blue Origin, and Virgin Galactic leading the charge, ordinary people may soon experience the thrill of orbiting the Earth or even visiting space hotels. This emerging industry promises not only unique experiences but also new economic opportunities, technological advancements, and scientific research possibilities.\n\nSpace tourism faces significant challenges, including high costs, safety concerns, and environmental impact. Current trips remain extremely expensive, limiting access to the wealthy, though prices are expected to decrease over time as technology advances. Safety protocols and rigorous training are essential to ensure that travelers can withstand the physical demands of space. Additionally, the environmental footprint of rocket launches has sparked discussions on how to make this new form of tourism more sustainable.\n\nDespite these hurdles, the potential of space tourism is immense. It could inspire innovation in aerospace, generate new jobs, and foster global interest in science and exploration. Beyond Earth, space hotels, orbital stations, and even lunar trips could redefine how humans experience travel. As technology improves and costs become more manageable, space tourism is poised to become a groundbreaking industry, offering experiences that were once unimaginable and shaping the future of how humanity interacts with the cosmos.', 'Travel', 1, 'User', '2025-08-29 09:05:13', '2025-08-29 09:05:13'),
(21, 'The Impact of Remote Collaboration on Global Business', 'img_1_sq.jpg', 'Remote collaboration has transformed the way businesses operate in an increasingly interconnected world. With the rise of digital tools such as Slack, Microsoft Teams, and Zoom, companies can now manage projects and maintain communication seamlessly across different time zones and continents. This shift has allowed organizations to tap into global talent, reduce operational costs, and enhance productivity without relying heavily on physical office spaces.\n\nBeyond efficiency, remote collaboration has opened the door to greater workforce diversity and inclusivity. Businesses can recruit skilled professionals from various cultural and geographic backgrounds, leading to innovative ideas and broader perspectives. Employees, in turn, benefit from improved work-life balance, flexible schedules, and reduced commuting stress, which helps boost job satisfaction and retention rates. This evolving model is reshaping traditional notions of the workplace, making flexibility a key factor in business growth and competitiveness.\n\nHowever, the rise of remote collaboration also presents challenges. Companies must ensure effective communication, maintain team cohesion, and safeguard sensitive data against cybersecurity threats. To overcome these hurdles, businesses are investing in secure digital infrastructures, regular training, and team-building initiatives. As global enterprises continue to adapt, remote collaboration is poised to remain a cornerstone of modern business, driving innovation and redefining the future of work.', 'Business', 1, 'User', '2025-08-29 14:50:53', '2025-08-29 14:50:53'),
(22, 'The Evolution of Street Art', 'img_2_sq.jpg', 'Street art has undergone a remarkable transformation over the past few decades. Once dismissed as mere graffiti or vandalism, it has grown into a respected art form that blends creativity, activism, and community expression. Today, street art can be found in cities around the world, decorating walls, bridges, and public spaces with vibrant colors and powerful messages. Its evolution reflects changing social attitudes, where what was once underground is now celebrated as part of mainstream culture.\n\nThe roots of street art lie in countercultural movements, where artists used public spaces to voice dissent, mark identity, or reclaim neglected neighborhoods. Over time, it has evolved beyond rebellious tags into intricate murals, stencils, and large-scale installations. Cities like Berlin, São Paulo, and New York have become global hubs for street art, where both local and international artists use walls as canvases to tell stories of history, politics, and community struggles.\n\nToday, street art is not only a form of self-expression but also a driver of cultural tourism. Festivals, walking tours, and government-supported mural projects have helped legitimize the movement while preserving its raw, authentic energy. With the rise of social media, street art now reaches global audiences instantly, amplifying its impact far beyond the streets where it was created. This evolution shows how a once-marginalized form of expression has become a vital cultural force, shaping the identity of cities and inspiring creativity worldwide.', 'Culture', 1, 'User', '2025-08-29 14:53:23', '2025-08-29 14:53:23'),
(23, 'The Role of Artificial Intelligence in Everyday Life', 'img_3_sq.jpg', 'Artificial Intelligence (AI) has moved far beyond being a futuristic concept and is now deeply integrated into our daily lives. From voice assistants like Siri and Alexa to recommendation systems on Netflix and Spotify, AI is shaping the way people access information and entertainment. Businesses are also relying on AI-driven analytics to understand customer behavior, optimize supply chains, and improve decision-making processes.\r\n\r\nIn healthcare, AI is making groundbreaking contributions. Machine learning algorithms are being used to detect diseases earlier, analyze medical images, and even assist doctors in surgery with robotic systems. These innovations not only save lives but also make healthcare more accessible and efficient. Similarly, in education, AI-powered platforms provide personalized learning experiences, adapting lessons to fit individual students’ needs.\r\n\r\nDespite its advantages, the integration of AI also brings ethical challenges. Issues such as data privacy, algorithmic bias, and job displacement are major concerns that must be addressed. Governments and organizations are now working to create policies that ensure AI development remains responsible and equitable. As AI continues to evolve, it will be essential to balance innovation with responsibility to ensure that it benefits society as a whole.', 'Technology', 1, 'User', '2025-08-30 07:03:34', '2025-08-30 07:03:34'),
(24, 'The Future of 5G and Connectivity', 'img_4_sq.jpg', 'The introduction of 5G technology is revolutionizing global connectivity, promising faster internet speeds, lower latency, and more reliable connections. Unlike its predecessors, 5G is not just about faster smartphones—it is the foundation for innovations like smart cities, autonomous vehicles, and advanced Internet of Things (IoT) applications. With its ability to handle massive data transfers in real time, 5G is setting the stage for the next wave of technological progress.\r\n\r\nIndustries are already preparing to harness the potential of 5G. In manufacturing, factories can implement real-time monitoring and automation through interconnected devices, making production more efficient. In healthcare, 5G enables remote surgeries and telemedicine with seamless video quality and minimal delays. Even entertainment is being transformed, with virtual reality (VR) and augmented reality (AR) experiences becoming more immersive thanks to high-speed connectivity.\r\n\r\nHowever, the rollout of 5G also faces challenges, including infrastructure costs, spectrum allocation, and public concerns about health and privacy. Countries around the world are investing heavily in building the necessary networks to ensure widespread access. As 5G adoption grows, it will redefine how people communicate, work, and experience technology, ushering in a more connected and intelligent world.', 'Technology', 1, 'User', '2025-08-30 07:03:34', '2025-08-30 07:03:34'),
(25, 'The Global Rise of Plant-Based Diets', 'img_5_sq.jpg', 'In recent years, plant-based diets have gained global popularity, driven by health concerns, environmental awareness, and ethical considerations. More people are choosing to reduce their meat consumption, opting instead for meals rich in vegetables, legumes, and alternative protein sources. Restaurants and food companies are responding by offering a wider variety of vegan and vegetarian options, making plant-based dining more accessible than ever.\r\n\r\nThe health benefits of plant-based eating are widely recognized. Diets rich in fruits, vegetables, and whole grains are linked to lower risks of heart disease, diabetes, and obesity. Beyond health, plant-based choices also contribute to sustainability by reducing the carbon footprint associated with meat production. As awareness grows, this trend is reshaping food industries and encouraging innovation in meat alternatives such as plant-based burgers and dairy substitutes.\r\n\r\nDespite its rise, plant-based eating also faces challenges, including accessibility and cultural preferences. In some regions, plant-based options remain expensive or less available, and traditional diets often rely heavily on meat. However, as demand continues to increase, it is likely that prices will decrease and more cultures will embrace plant-forward meals. The movement toward plant-based diets represents not just a change in eating habits, but a global shift in how people view food and its impact on the planet.', 'Food', 1, 'User', '2025-08-30 07:05:30', '2025-08-30 07:05:30'),
(26, 'Street Food as a Cultural Experience', '1756955372.jpg', 'Street food is more than just a convenient meal—it is a reflection of culture, tradition, and community. From food stalls in Bangkok to taco stands in Mexico City, street food offers an authentic taste of local flavors at affordable prices. Each dish tells a story of heritage and culinary creativity, making street food a vital part of cultural identity and tourism.\r\n\r\nOne of the unique aspects of street food is its ability to bring people together. Locals and travelers alike gather at street markets, sharing meals that are often prepared using recipes passed down through generations. Popular dishes such as Vietnamese bánh mì, Indian chaat, or Turkish kebabs highlight how street food preserves traditions while adapting to modern tastes. These vibrant food scenes provide an immersive experience that goes beyond dining—it becomes a cultural exchange.\r\n\r\nStreet food also contributes significantly to local economies, supporting small vendors and family-owned businesses. With the rise of food tours and social media, street food has gained international recognition, boosting tourism and encouraging culinary exploration. As cities continue to modernize, preserving street food culture becomes essential to maintaining authenticity and diversity in the global food landscape.', 'Food', 1, 'User', '2025-08-30 11:22:47', '2025-08-30 11:22:47'),
(27, 'Fusion Cuisine: Blending Flavors Across Cultures', '1756955353.jpg', 'Fusion cuisine has become one of the most exciting culinary trends of the modern era, bringing together flavors, techniques, and ingredients from different cultures. Chefs experiment with combinations such as sushi burritos, Korean tacos, or Italian-Asian pasta, creating dishes that surprise and delight food lovers. This blending of traditions not only showcases creativity but also reflects the increasingly interconnected world we live in.\r\n\r\nThe appeal of fusion cuisine lies in its ability to provide fresh experiences while honoring multiple cultural heritages. Diners can enjoy familiar flavors in new contexts, while chefs push boundaries and challenge conventional definitions of food. Cities like New York, London, and Tokyo have become hotspots for fusion dining, where global influences merge into inventive menus.\r\n\r\nHowever, fusion cuisine also raises discussions about authenticity and cultural appropriation. Critics argue that some dishes risk losing their original meaning or being commercialized without respect for tradition. Nevertheless, when done thoughtfully, fusion cuisine serves as a culinary bridge—celebrating diversity, fostering innovation, and reminding us of food’s universal power to connect people.', 'Food', 2, 'User', '2025-08-30 12:46:23', '2025-08-30 12:46:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.png',
  `bio` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No bio yet :(',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `bio`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hilmi Salsabilla', 'hilmisalsabilla6@gmail.com', NULL, '$2y$12$5OeXeXPY/hmAhuKktB.lo.JglV9WLxjUUwUudgdcsCbsttKOf0.oe', 'user.png', 'Objectively drive client-focused platforms for adaptive niches. Credibly extend value-added methods of empowerment with vertical synergy. Competently transform scalable catalysts for change through 24/365 metrics. Professionally envisioneer real-time benefits with.', NULL, '2025-08-26 20:32:24', '2025-09-02 07:46:30'),
(2, 'User', 'user@gmail.com', NULL, '$2y$12$OeaiSQts1TvQWZeaHO7OZO5yS4bJ1OiRYhwlZuh875fid3pCBxKpm', 'user.png', 'Efficiently incubate functionalized benefits without efficient portals. Seamlessly negotiate proactive.', NULL, '2025-08-30 05:42:56', '2025-09-02 06:19:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
