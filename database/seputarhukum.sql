-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2020 at 06:55 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seputarhukum`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `isi` text NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `tgl_dibuat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `id_kategori`, `isi`, `penulis`, `tgl_dibuat`) VALUES
(7, 'Hukum Rimba', 1, 'Lorem ipsum dolor, sit amet consectetur Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam incidunt cupiditate tempora doloremque id rem iure rerum suscipit nisi, facere natus numquam excepturi maxime adipisci enim ipsum modi, corrupti necessitatibus nemo consequatur nobis sit. Aspernatur dicta mollitia et incidunt, tempora reprehenderit error sequi harum ex dolores maxime maiores facere dolorem possimus earum eum obcaecati, cum accusantium. Explicabo aspernatur vitae perspiciatis accusamus, quisquam officiis ratione porro sint quidem illo deleniti voluptate delectus doloribus harum temporibus sunt recusandae eveniet facilis! Nobis neque ad ratione nihil iusto veritatis dolor atque deserunt. Veritatis, iste unde quo ipsa distinctio esse veniam. Deserunt autem quia hic.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam incidunt cupiditate tempora doloremque id rem iure rerum suscipit nisi, facere natus numquam excepturi maxime adipisci enim ipsum modi, corrupti necessitatibus nemo consequatur nobis sit. Aspernatur dicta mollitia et incidunt, tempora reprehenderit error sequi harum ex dolores maxime maiores facere dolorem possimus earum eum obcaecati, cum accusantium. Explicabo aspernatur vitae perspiciatis accusamus, quisquam officiis ratione porro sint quidem illo deleniti voluptate delectus doloribus harum temporibus sunt recusandae eveniet facilis! Nobis neque ad ratione nihil iusto veritatis dolor atque deserunt. Veritatis, iste unde quo ipsa distinctio esse veniam. Deserunt autem quia hic.adipisicing elit. Nam incidunt cupiditate tempora doloremque id rem iure rerum suscipit nisi, facere natus numquam excepturi maxime adipisci enim ipsum modi, corrupti necessitatibus nemo consequatur nobis sit. Aspernatur dicta mollitia et incidunt, tempora reprehenderit error sequi harum ex dolores maxime maiores facere dolorem possimus earum eum obcaecati, cum accusantium. Explicabo aspernatur vitae perspiciatis accusamus, quisquam officiis ratione porro sint quidem illo deleniti voluptate delectus doloribus harum temporibus sunt recusandae eveniet facilis! Nobis neque ad ratione nihil iusto veritatis dolor atque deserunt. Veritatis, iste unde quo ipsa distinctio esse veniam. Deserunt autem quia hic.', 'Fikri', '2020-06-26 11:18:07'),
(16, 'Test123', 4, '<p>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Assumenda&nbsp;culpa&nbsp;consectetur&nbsp;sunt&nbsp;nemo&nbsp;esse&nbsp;et&nbsp;officia&nbsp;placeat&nbsp;quidem&nbsp;exercitationem&nbsp;repudiandae&nbsp;fugit&nbsp;molestiae,&nbsp;corrupti&nbsp;dolorum&nbsp;quos&nbsp;consequuntur&nbsp;quia&nbsp;veritatis&nbsp;odit&nbsp;tempora.&nbsp;Unde&nbsp;consectetur&nbsp;perspiciatis,&nbsp;fugiat&nbsp;vel&nbsp;deleniti,&nbsp;pariatur&nbsp;temporibus&nbsp;similique&nbsp;nam&nbsp;ab&nbsp;explicabo&nbsp;harum&nbsp;illum?&nbsp;Natus,&nbsp;minima?&nbsp;Voluptatem&nbsp;distinctio&nbsp;veniam&nbsp;totam&nbsp;provident&nbsp;facere&nbsp;dolores&nbsp;explicabo&nbsp;omnis&nbsp;voluptate&nbsp;eaque&nbsp;ratione&nbsp;optio&nbsp;consequuntur&nbsp;excepturi&nbsp;magni&nbsp;aut&nbsp;cum&nbsp;veritatis&nbsp;asperiores,&nbsp;esse&nbsp;laudantium&nbsp;rem&nbsp;est&nbsp;atque&nbsp;itaque&nbsp;aperiam?&nbsp;Illum,&nbsp;omnis&nbsp;voluptas&nbsp;ipsa&nbsp;accusamus,&nbsp;ad&nbsp;quam&nbsp;cupiditate&nbsp;optio,&nbsp;nostrum&nbsp;rerum&nbsp;at&nbsp;esse?&nbsp;Sit,&nbsp;perspiciatis&nbsp;iste,&nbsp;veniam,&nbsp;labore&nbsp;suscipit&nbsp;doloremque&nbsp;laboriosam&nbsp;repellendus&nbsp;natus&nbsp;itaque&nbsp;distinctio&nbsp;dignissimos&nbsp;culpa&nbsp;neque&nbsp;deserunt&nbsp;at&nbsp;quae&nbsp;quam&nbsp;velit&nbsp;accusantium&nbsp;ut&nbsp;aperiam&nbsp;id&nbsp;nisi.&nbsp;Nemo&nbsp;commodi&nbsp;vel&nbsp;repellat,&nbsp;cumque,&nbsp;eum&nbsp;harum,&nbsp;deleniti&nbsp;vitae&nbsp;esse&nbsp;ullam&nbsp;alias&nbsp;possimus&nbsp;aperiam&nbsp;dignissimos&nbsp;quibusdam&nbsp;impedit&nbsp;unde&nbsp;assumenda&nbsp;officia&nbsp;sint&nbsp;veniam&nbsp;nisi&nbsp;natus.&nbsp;Tempora&nbsp;voluptatem&nbsp;eos&nbsp;assumenda&nbsp;distinctio&nbsp;praesentium&nbsp;qui&nbsp;dolore&nbsp;iusto,&nbsp;eligendi&nbsp;minima&nbsp;labore&nbsp;hic,&nbsp;repellendus&nbsp;debitis&nbsp;atque&nbsp;ad&nbsp;dolores&nbsp;dignissimos&nbsp;deleniti&nbsp;in&nbsp;dicta&nbsp;quo&nbsp;odio&nbsp;quos!&nbsp;Quae,&nbsp;iusto.&nbsp;Veritatis&nbsp;veniam&nbsp;illo&nbsp;laborum&nbsp;ipsa,&nbsp;exercitationem&nbsp;culpa&nbsp;quisquam,&nbsp;accusamus&nbsp;assumenda&nbsp;nihil,&nbsp;alias&nbsp;incidunt&nbsp;expedita&nbsp;temporibus&nbsp;minima&nbsp;numquam?&nbsp;Officiis&nbsp;libero&nbsp;sapiente&nbsp;nesciunt&nbsp;iure&nbsp;officia&nbsp;voluptatem&nbsp;rerum&nbsp;debitis&nbsp;nam&nbsp;numquam&nbsp;incidunt?&nbsp;Cupiditate,&nbsp;quo&nbsp;aspernatur&nbsp;facilis&nbsp;fuga,&nbsp;optio&nbsp;quia&nbsp;eligendi&nbsp;et&nbsp;nemo&nbsp;ipsa&nbsp;amet&nbsp;facere&nbsp;porro&nbsp;libero&nbsp;molestias.&nbsp;Amet&nbsp;explicabo,&nbsp;quibusdam&nbsp;inventore&nbsp;iste&nbsp;ratione&nbsp;modi&nbsp;deserunt&nbsp;minus&nbsp;quaerat&nbsp;error,&nbsp;veniam,&nbsp;quasi&nbsp;consequatur?&nbsp;Quae&nbsp;mollitia&nbsp;quibusdam&nbsp;omnis,&nbsp;doloremque,&nbsp;consequatur&nbsp;enim&nbsp;dignissimos&nbsp;maxime&nbsp;earum&nbsp;repellendus&nbsp;itaque&nbsp;recusandae&nbsp;perspiciatis&nbsp;quo&nbsp;excepturi&nbsp;fuga&nbsp;quam&nbsp;dicta&nbsp;quia&nbsp;incidunt&nbsp;praesentium&nbsp;exercitationem&nbsp;quisquam&nbsp;ullam!&nbsp;Nostrum&nbsp;reprehenderit&nbsp;praesentium&nbsp;illum,&nbsp;corporis&nbsp;autem&nbsp;sunt&nbsp;illo&nbsp;quam&nbsp;non&nbsp;minima&nbsp;sed&nbsp;itaque&nbsp;earum&nbsp;provident&nbsp;laudantium&nbsp;laborum,&nbsp;id&nbsp;porro&nbsp;nam&nbsp;ab&nbsp;accusamus&nbsp;nisi&nbsp;exercitationem.&nbsp;Numquam&nbsp;eum&nbsp;debitis&nbsp;ullam&nbsp;repudiandae&nbsp;velit&nbsp;consequuntur&nbsp;asperiores&nbsp;aspernatur&nbsp;ipsum&nbsp;quam,&nbsp;odio&nbsp;excepturi&nbsp;dolores&nbsp;sapiente&nbsp;natus&nbsp;perferendis&nbsp;repellendus&nbsp;rem.&nbsp;A&nbsp;aliquid&nbsp;eligendi,&nbsp;quae&nbsp;praesentium&nbsp;molestiae&nbsp;ex&nbsp;nemo&nbsp;consectetur.&nbsp;Autem,&nbsp;ipsum?</p>\r\n', 'fikri', '2020-07-11 11:18:45'),
(17, 'Hukum Alam', 2, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Numquam ipsam optio consequuntur provident voluptatum est tempore temporibus quisquam, fuga aut incidunt repellat doloremque dolorem magni, exercitationem laboriosam reiciendis dolore, libero a perferendis. Quos, incidunt non quod delectus exercitationem labore enim ratione provident vero excepturi magnam omnis modi expedita asperiores recusandae quasi? Repellendus hic rerum suscipit eligendi aliquam odio vero nesciunt, omnis dolores reprehenderit quasi facilis quaerat esse labore unde et ad provident officia, veniam quidem eum, ullam accusamus quos? Esse, officia. Accusantium id blanditiis sapiente distinctio libero non laborum maiores excepturi. Similique autem quibusdam obcaecati tempora ducimus saepe illum voluptates libero praesentium, nihil deserunt adipisci ullam et? Quibusdam amet quis voluptatum necessitatibus illo eos sequi consectetur aliquid tenetur, velit perspiciatis. Expedita, quisquam \r\naliquam asperiores consequuntur excepturi, veniam exercitationem eaque provident eum quidem ad deleniti nihil culpa incidunt perferendis animi cumque officiis? Culpa, incidunt rerum, neque, fuga consectetur sit mollitia est alias atque sunt distinctio fugit omnis a sequi nisi soluta! Illo eveniet ullam omnis facilis nobis earum optio voluptas dolorum. Eius quod aut magnam sed veritatis eum pariatur labore tempore quisquam! Nobis labore quaerat autem saepe. Optio, in minima. Quo, commodi nobis explicabo temporibus officia obcaecati ducimus recusandae, ipsum est debitis laudantium, iusto ullam repellat sequi. Minus asperiores sequi, ab laboriosam ipsum officiis molestias officia perspiciatis ad harum dolores ipsa fugiat nostrum reprehenderit sint repudiandae iste deserunt quae necessitatibus dicta tempore. Maxime, tempore rem. Eaque et expedita quas reprehenderit? Debitis ex, corrupti eligendi facilis veritatis numquam explicabo vitae magni ratione quo amet accusantium dolorem quae reiciendis nisi aperiam in doloribus maiores quos fuga. Voluptatum necessitatibus modi soluta porro quibusdam maxime, omnis eveniet minus error? Accusantium mollitia minus error soluta deleniti accusamus incidunt quia ab sequi, aperiam, dolore facilis necessitatibus architecto similique beatae laudantium commodi ex optio autem vitae totam quae eius ducimus culpa. Odit iste eveniet vitae consequuntur sequi sapiente voluptatum quisquam possimus? Consectetur accusamus cupiditate fugiat odio, illum tempora mollitia expedita porro optio fugit enim commodi id? Asperiores dicta cumque praesentium possimus repudiandae minus, vero sint sunt voluptas sapiente error a recusandae amet suscipit! Nesciunt molestiae fugiat facilis aliquam deserunt eligendi, voluptatum assumenda debitis alias maiores iste! Quam corporis, maiores natus alias quasi aut labore recusandae, non eveniet, eum eaque soluta iste eos incidunt! Quod, laboriosam quisquam accusamus tenetur molestiae modi exercitationem consectetur sapiente fugiat explicabo tempore qui ea earum neque natus cumque culpa laudantium. Cumque \r\n\r\nfacere earum iure libero quod fuga ducimus exercitationem voluptatum, porro veritatis minus voluptates corrupti cupiditate ab consequuntur qui delectus doloribus et dicta quasi? Possimus nulla cumque tempore porro et. Non, facilis! Ullam assumenda voluptas neque. Deleniti ut illum odit minus, facere pariatur in dolores dolore esse? Rerum, deleniti fugiat, ullam aliquam ipsum aut quo nemo molestiae dolor expedita voluptatibus qui! Recusandae unde adipisci distinctio exercitationem rem atque natus itaque consectetur necessitatibus velit aspernatur vitae pariatur reiciendis doloribus et impedit nam dicta, nulla officiis quaerat excepturi? Odit, molestias perferendis sed recusandae impedit tenetur, autem laborum, vitae quibusdam numquam id dignissimos nostrum labore. Harum, mollitia.', 'kamal', '2020-07-14 09:49:12'),
(18, 'Hukum Pernikahan', 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste nam magni repudiandae nobis repellat, excepturi rerum aspernatur suscipit numquam pariatur vero delectus nulla natus laborum ipsum autem provident voluptate error fugit quae odio exercitationem perferendis fugiat. Repudiandae est, neque architecto, eius maiores sapiente quas fuga eum aspernatur perspiciatis non tempore ex minima natus, ratione eaque quae velit delectus. Quae doloremque expedita itaque velit nemo! Atque blanditiis perspiciatis corrupti vel modi porro sequi culpa unde amet ratione aut eius ut eos sunt ab, voluptate fuga expedita voluptatum laboriosam! Officia voluptates hic ut dignissimos voluptatum nemo ipsam accusamus incidunt reprehenderit reiciendis, dolores iure culpa inventore laboriosam ab illum molestias, libero a, totam veritatis in odio consequatur voluptas doloribus? Dolorum quas id tenetur blanditiis a. Reiciendis sit sint velit beatae soluta non, magnam ducimus libero iste accusamus nobis numquam, enim facere. Quae quisquam dolores voluptas dolore similique voluptatum quibusdam nam fugiat accusamus expedita porro tenetur deleniti, dolorum totam necessitatibus vero quas in libero provident molestiae cum modi adipisci. Harum, soluta earum quo aut eius quod, magni cumque rerum, possimus temporibus dolore aliquam et laudantium. Obcaecati veniam vero quisquam soluta magni fugit, veritatis debitis eos excepturi, labore neque asperiores id aspernatur maxime illum ipsum.', 'rusdi', '2020-07-14 09:49:57'),
(19, 'Hukum Pembunuhan', 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime rem exercitationem quas voluptatem dignissimos quae cum doloremque quasi suscipit. Iure blanditiis, soluta quis atque harum nostrum quia animi velit quaerat aliquam? Aliquid ea quisquam qui, veniam ipsam praesentium libero ut, officia asperiores quibusdam impedit nobis sequi voluptatibus sunt ipsum temporibus culpa, quos fugiat vitae optio quis molestias tenetur maiores! Ratione quidem, vero omnis repellat quas delectus dicta consequatur vel perspiciatis totam. Alias sunt repellendus accusantium ea quod. Aliquid id aspernatur distinctio expedita commodi ipsam quidem nobis iste hic iusto, unde reiciendis inventore saepe. Natus dolorem ipsam saepe. \r\n                \r\n                Veritatis tempora sed explicabo perspiciatis amet ea vel fugit placeat nulla dicta aut maxime autem obcaecati quia, quisquam reiciendis, pariatur possimus qui suscipit id mollitia temporibus aliquid a quidem. Corrupti odit eveniet culpa et reprehenderit assumenda dolorem quia consequatur earum nihil, quam dolor nisi fugiat libero quo velit, exercitationem quidem tempora, explicabo fugit aut iure! Asperiores at, eos doloribus quos tenetur sapiente, sed hic culpa eaque laboriosam natus dolor minima. Suscipit accusantium aspernatur veniam ut est, corrupti consectetur perspiciatis odit officia, id consequuntur quas alias. Perferendis, nam facilis. Nihil harum placeat repudiandae possimus unde suscipit itaque rem voluptatum, fugiat molestiae sed eaque provident, enim veniam ullam nam facere sequi illum iure hic eveniet vero earum! Sapiente non voluptas, modi asperiores eum velit dolorum quia doloribus odio odit nesciunt dolor! Perferendis expedita ea in dignissimos laboriosam praesentium vero odio officia. Asperiores necessitatibus facere labore quae recusandae, nisi distinctio unde neque in molestias nostrum officiis est. Quis illum neque hic. Nobis dolores perferendis, rem commodi vero similique placeat? Veniam ipsa corporis eius ea? Accusantium veritatis nesciunt expedita ex reiciendis. Adipisci expedita sit repellat velit cumque beatae quo optio odit tenetur provident, doloremque quod culpa vel sint aliquam explicabo debitis minima aliquid ex. Saepe dolore ab laboriosam quam iure natus, enim cupiditate hic dolorum quasi officia deserunt, nobis explicabo atque voluptatibus? Perferendis similique ratione accusantium doloribus neque, quod voluptas quasi a maxime vel alias eaque. Temporibus nihil, incidunt voluptas voluptates, ullam consequatur iusto facilis quisquam rem voluptatibus est libero! Quae at cum nam doloribus cumque ipsum blanditiis consectetur, ea quod, doloremque officia velit illum qui quam distinctio ratione consequatur quas porro enim? Aspernatur voluptatum, consectetur doloremque hic natus dolores similique. Autem consectetur et dignissimos officia officiis modi. Quidem quia sapiente inventore, deserunt dicta vel magnam mollitia praesentium incidunt reprehenderit accusamus provident numquam ipsum natus quasi cum quis cumque nisi repudiandae impedit. Maiores repudiandae doloremque sapiente non dolor ad recusandae pariatur possimus. Earum, voluptates dolores. Hic, et ab quae ducimus quis deserunt cumque voluptate ut dignissimos sunt repellendus labore nihil accusantium delectus? Necessitatibus, nihil officia blanditiis nesciunt excepturi, placeat culpa facilis, atque maiores autem sit ipsum explicabo sint? Alias aperiam vitae veniam. Perspiciatis ullam sint veniam, aliquid eveniet similique iure, magni dolor optio perferendis asperiores quam ex, magnam nam esse quas reiciendis! A eaque consequuntur ex architecto amet cupiditate aliquid sint consectetur ducimus quam nesciunt nulla adipisci hic vero distinctio fugit, labore quasi expedita inventore ipsam, fugiat veritatis? Temporibus pariatur quis error adipisci nihil ad voluptate saepe debitis? Sapiente in dolore minima! Ab, pariatur a nesciunt quia in suscipit? Recusandae voluptas sequi ratione earum adipisci fugit laudantium veritatis quos autem cupiditate quis reprehenderit, sint perferendis dolores, alias quod consectetur aperiam beatae? Ab libero totam nulla nobis reprehenderit numquam odio tempora nostrum cupiditate, id, earum adipisci aspernatur! Aut tempora recusandae pariatur. Facilis odit fugit natus asperiores a tempore dolores! Aut illo nam omnis nemo facilis neque inventore. Dolorem, quaerat enim cumque necessitatibus nesciunt accusantium. Numquam beatae laboriosam facere nam iste quisquam modi blanditiis reprehenderit magnam, doloremque neque reiciendis? Vitae eos ipsa ipsam ab numquam excepturi et eligendi laboriosam at delectus maiores aliquam quibusdam laudantium esse nobis, reiciendis ratione. Nam fugit, adipisci fugiat vero harum, illum blanditiis id, corrupti nisi molestias pariatur mollitia totam. Voluptas aut officiis ex itaque obcaecati? Explicabo voluptatibus odit vero eos atque ipsum aperiam a magnam aut temporibus eum \r\n                \r\n                dolores blanditiis pariatur earum natus sapiente veniam doloribus nobis, autem minima enim. Sed praesentium molestias nisi impedit ipsam aliquid corporis blanditiis, sint vero eos ipsa. Consectetur laboriosam incidunt maxime quis et voluptatibus quas veniam earum blanditiis ipsam cum natus, animi corrupti? Aliquam id quaerat minus similique repellendus, laudantium hic mollitia vitae aut numquam libero dolorem sit nulla qui velit obcaecati ratione corporis quo. Ipsam explicabo sed voluptatem culpa modi fugiat fugit voluptas. Culpa, excepturi minus magnam eligendi facilis laudantium sed quidem recusandae nulla corporis natus nostrum perferendis? Veritatis, amet eveniet architecto quae exercitationem a tempora animi eius illum, vitae perspiciatis fugit. Eum, veritatis consequuntur doloribus, obcaecati natus exercitationem architecto consequatur iusto ab perferendis soluta nemo. Modi commodi cumque debitis, sapiente dolore dicta vero eos sed aliquam exercitationem? Consequuntur unde aliquam maiores recusandae dicta, rerum delectus amet ipsam. Dolores esse incidunt excepturi at quas dicta sit earum voluptatum? Sunt modi tempore quidem eligendi blanditiis doloremque enim at harum perspiciatis accusamus. Nostrum sapiente tenetur soluta, magni explicabo fugit rerum dolore aut beatae blanditiis totam veritatis excepturi, officia culpa reprehenderit minima sunt eaque laudantium porro laborum atque aperiam incidunt. Veniam provident, consequuntur doloribus ipsam dolorem aspernatur laudantium. Modi qui amet optio deleniti quasi asperiores. Animi suscipit commodi delectus excepturi, consequatur obcaecati esse rerum laborum, quam aperiam ducimus earum reprehenderit, numquam atque iusto vitae. Pariatur obcaecati nobis fugiat ea eaque delectus quam nemo architecto tenetur. Nisi ducimus quo vero incidunt, ex adipisci minima dignissimos porro veritatis animi non aliquid laudantium officia voluptates doloribus a cupiditate fugit reprehenderit officiis, nulla sunt totam magnam minus. Similique enim provident, debitis voluptates fuga mollitia velit voluptatem voluptatum repudiandae, iste voluptatibus, sapiente voluptate praesentium recusandae maxime labore necessitatibus eveniet quam. Esse iure, porro asperiores, expedita soluta aliquid perspiciatis eius voluptate alias nesciunt similique veritatis. Enim fuga dolor mollitia perferendis, nisi fugit nostrum adipisci velit. Id consectetur adipisci, aperiam beatae omnis sunt dolor voluptates necessitatibus ipsum, perspiciatis dolore nostrum. Pariatur veritatis itaque vero labore eum ex esse harum aperiam, possimus molestiae nisi ratione excepturi exercitationem, iure nesciunt impedit nostrum aliquam totam minus voluptates obcaecati laboriosam quidem?', 'Joni', '2020-07-14 09:50:56'),
(20, 'Hukum Kisos', 1, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique illo deserunt vero officia labore quis. Amet quos voluptatem, pariatur id sunt blanditiis dolorem optio ipsa provident debitis culpa suscipit laboriosam eveniet voluptates rerum? Laboriosam, eius illum? Laboriosam fugit similique cupiditate esse neque porro explicabo facilis quibusdam sed animi repudiandae, illum itaque enim, quas, hic amet. Iusto eius veritatis assumenda odio officia voluptas ducimus ab inventore debitis enim voluptate ex ut asperiores, tempore delectus cumque dignissimos consequatur quam laudantium aspernatur commodi, omnis eos a. A nobis earum totam facilis necessitatibus quos dignissimos non blanditiis \r\n\r\n\r\nminima cupiditate, consequatur ex voluptatibus ab mollitia neque. Illum, quaerat! Eos, est temporibus odit repellat eveniet veniam nisi nihil totam laborum incidunt. Fugiat nihil voluptatibus, odio quo nulla excepturi dolore? Aliquid, sint. Veniam quam maiores illum unde sunt magni dignissimos, repellendus sed autem id, aliquid est qui inventore facilis, eligendi et! Veritatis culpa non dolorum inventore mollitia sint aliquam tempora odio qui, fugiat maiores quidem saepe doloremque quam eligendi adipisci tempore impedit? Adipisci temporibus reprehenderit vitae animi hic tempora explicabo, modi nesciunt consequuntur excepturi consectetur sapiente necessitatibus deserunt alias quam error quis rerum suscipit illum magnam dolorem quo. Aperiam, voluptate, facere fuga corrupti ut, ea delectus eum reprehenderit vel laudantium laborum. Quasi repellat nesciunt dolore eos similique culpa possimus totam dignissimos sint. Minima nisi odio minus maxime qui quis nobis a eum esse? Tempora quas voluptatem vitae, optio et sapiente provident illum iusto corrupti vel ipsa tempore obcaecati, veritatis aliquid atque eaque ab facilis quia tenetur ratione laudantium minus quidem sequi. Eveniet vero laboriosam tempore voluptas non repellendus blanditiis tempora explicabo, quidem incidunt nam perferendis deserunt recusandae? Libero sed maiores voluptatem fuga consequuntur laborum hic nam, ea eum ipsa? Illum labore accusantium dolores vero earum itaque veniam assumenda sed necessitatibus, dicta cupiditate? Repellendus voluptates eos in cum totam aliquam vero quaerat itaque consectetur soluta praesentium voluptate velit sint aperiam eveniet atque, ab dolores temporibus nobis expedita recusandae illum. Molestias, similique deserunt quisquam atque id, aut odio veritatis porro accusantium sequi aperiam necessitatibus itaque suscipit ullam cumque! Aperiam nulla quia veniam doloribus sunt qui, repellat a architecto ut at cumque, possimus id natus voluptatum iure accusamus exercitationem. Voluptates, quaerat sapiente soluta nihil tempore saepe voluptatum commodi! Blanditiis beatae cupiditate commodi doloribus harum ullam error consectetur corrupti, quam maxime nesciunt recusandae esse facere, aperiam porro repellat assumenda asperiores? Enim, illo dignissimos. Sapiente ea distinctio voluptatum maxime, itaque impedit ipsum temporibus laudantium, aliquam laboriosam, porro delectus consectetur illum veritatis natus error sint. Quia laborum porro incidunt dolorem omnis, nisi fugiat eveniet neque nihil, sequi dignissimos. Eius sunt veniam officiis quibusdam ex rerum porro placeat recusandae cum enim accusamus illum et minus quia, quos alias incidunt sint aperiam error nulla dicta qui? Vel consequatur quia quaerat quod corrupti ab ratione voluptas. Est consectetur deserunt \r\n\r\n\r\ndolorum voluptatum incidunt totam tempore ipsa repellendus repudiandae ea dolor atque eius rem, perferendis temporibus numquam sint illo molestiae architecto assumenda exercitationem? Quaerat quidem earum rerum quod laudantium facere aliquam! Blanditiis commodi autem eligendi natus repellendus labore nemo corrupti consequatur necessitatibus, odio minima ea sit perspiciatis in fugiat sapiente cupiditate nobis quia iure? Possimus dolorem blanditiis, nisi aspernatur ab minima iusto ipsa dignissimos dolorum vel est, itaque vero quo officiis libero, error beatae voluptates omnis quas deserunt voluptatibus magnam molestiae assumenda delectus! Voluptas illum aut mollitia delectus, veritatis hic suscipit nesciunt dicta quo in ut accusamus possimus harum voluptatibus qui autem nobis animi tenetur, iusto, cupiditate cumque iure accusantium. Eum modi sed veniam iure iusto aperiam quisquam maxime hic illum placeat? Dolores a, provident, quas pariatur sapiente nihil doloremque illum, incidunt libero nobis quod in eum corporis.', 'Ahmad Kamal', '2020-07-14 10:39:09'),
(22, 'Hukum Kekerasan', 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos officia deserunt sit corporis, mollitia iste perspiciatis voluptatum laudantium fugiat aut aperiam quas architecto nulla ducimus odio, aspernatur, dolorum numquam in? Perspiciatis quae aperiam quod, pariatur vel quo itaque veritatis autem sit suscipit libero qui assumenda explicabo dolores expedita consectetur sapiente maiores sint. Tenetur vel ad inventore illo nisi quibusdam voluptatum ipsa at! Sequi est fugiat optio esse, modi officia ut in? Molestiae dignissimos pariatur repellendus cupiditate ducimus fuga sapiente at asperiores adipisci repudiandae distinctio qui a maiores, vel odio ratione nemo. Quibusdam commodi rem voluptatem velit aperiam reprehenderit, odit hic minus, praesentium labore, sapiente necessitatibus voluptatum modi assumenda maiores. Quod laborum vel temporibus at. Quia blanditiis iusto maiores libero! Dicta odit suscipit placeat voluptate atque, obcaecati animi nulla rem reiciendis minus nihil libero. Ipsum praesentium error omnis optio, ad laudantium numquam, quos nostrum aliquid perspiciatis tenetur necessitatibus atque quia! Iure \r\nsaepe, eveniet at quisquam nemo alias consequuntur voluptate optio qui sit quasi? Animi, ex corrupti illum quos dicta impedit totam. Nostrum ex obcaecati doloribus voluptate id deserunt culpa minus quidem aut facilis labore laborum eum distinctio, molestiae expedita! Libero magni veritatis provident adipisci suscipit eaque, repellat inventore exercitationem, voluptatibus architecto quos? Saepe facilis sit illum voluptas minima quaerat omnis, molestiae explicabo laudantium, magni ipsam error doloremque, odio cumque quos exercitationem nisi veniam ab quibusdam est sapiente sequi alias consequatur amet. Odio, porro debitis quis sint perspiciatis rerum impedit rem sapiente consectetur distinctio et officia, possimus, neque ipsum ab unde laudantium eveniet numquam illo. Numquam, sapiente at doloremque enim, dolores expedita eos praesentium ex incidunt nihil laudantium molestiae corrupti alias assumenda unde fuga totam ullam. Quam provident nam quis odio repudiandae! Commodi, voluptate. Perspiciatis optio eveniet sit sequi molestias! Recusandae doloremque minima, magni fugit non incidunt quo reprehenderit repellat quaerat nobis omnis alias inventore cumque dignissimos reiciendis, qui soluta itaque nisi quas aliquam eaque similique! Voluptas eos facilis saepe exercitationem tempora? Asperiores veritatis unde modi veniam similique libero hic reprehenderit vitae, alias, repudiandae at nam dignissimos possimus. Illum id provident reiciendis dolores earum nihil, possimus enim voluptate excepturi maxime corporis similique fuga. Quia fugiat sit dolorum unde voluptates nemo eaque quae cumque. Harum, aut eli\r\n\r\ngendi nisi odio ab, et consectetur repudiandae dolorem quidem commodi id distinctio in ea iusto aspernatur, quaerat porro! Repellendus quasi voluptatibus reprehenderit deleniti doloribus dolorum ex porro aliquid omnis autem, numquam consequuntur beatae. Beatae provident ea consequuntur est laboriosam eos sint! Est ipsam corrupti ipsum, optio ratione necessitatibus cumque magnam suscipit consectetur ad, sapiente rem quam et qui at quis quisquam natus itaque libero ut. Est non excepturi dolorum, ratione a voluptas magni culpa cum vero, assumenda nemo? Quisquam temporibus consectetur quam consequuntur, adipisci ut commodi assumenda beatae natus voluptates nam qui fuga vel quos suscipit culpa eius? A quasi nam in et veritatis doloremque provident. Perferendis vel soluta saepe, nesciunt voluptatem reprehenderit voluptates deserunt temporibus quidem incidunt qui quasi autem. Nihil sunt quisquam natus odit architecto pariatur atque qui recusandae temporibus vero sit molestias, unde repellendus blanditiis in aliquam eligendi minima libero quam ea repudiandae nam aperiam? Eum id ducimus fugit provident, tenetur amet excepturi saepe deleniti rem error molestias esse voluptatem commodi suscipit nisi aliquid cumque minima incidunt. Praesentium distinctio facilis doloribus harum illum, vel cumque aperiam vitae, consectetur quas libero, nulla quasi voluptatibus laboriosam eveniet assumenda obcaecati delectus molestiae iure asperiores voluptas. Ab ad eos maiores nobis rerum! Tempora reprehenderit laboriosam officia doloribus laborum eaque aut commodi dignissimos id soluta a illum dicta totam facilis voluptatum provident nihil veritatis est, voluptate cumque facere quasi? Quae consectetur \r\n\r\n', 'Ahmad Fikri', '2020-07-14 11:23:51');

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id_informasi` int(11) NOT NULL,
  `isi` text NOT NULL,
  `tgl_dibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `isi`, `tgl_dibuat`) VALUES
(1, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis dolor nostrum corrupti modi repellat fugiat id sed, expedita quidem! Soluta atque vitae facilis! Obcaecati velit ipsa odio cumque accusantium mollitia, nisi nemo dolor neque, quae assumenda repudiandae quidem ab ipsam commodi quos minima itaque numquam cupiditate molestiae officia in sit? Illum voluptate esse, alias cum sit sint. Placeat sint itaque nulla dolorum. Accusamus quas sit, libero, culpa tempora excepturi quibusdam itaque, officiis odit fuga quaerat amet. Suscipit, fugiat optio labore, voluptatibus quas voluptas fuga, sunt illo corrupti quaerat quisquam neque et ipsa iste commodi nesciunt accusantium. Itaque, alias. Repudiandae odit necessitatibus et sint distinctio vero voluptatem, reprehenderit quibusdam eaque explicabo quas architecto, totam enim exercitationem, nihil vel quasi officia illum! Maxime dolore corrupti quidem harum similique fugiat impedit assumenda tempora dolorem facilis mollitia alias quam, earum aperiam tempore temporibus nobis vitae eligendi. Quidem, libero hic voluptates soluta possimus dolorem ex officiis sunt, repudiandae vitae omnis repellat provident minus ipsum asperiores eius? Quaerat voluptatibus sequi saepe sed harum, accusantium, aspernatur quo fugiat magnam quidem quibusdam accusamus incidunt, exercitationem delectus reiciendis dolorum ut perferendis hic suscipit ab aliquam tenetur esse eaque eius. Molestiae deleniti iste natus accusamus vel quam soluta eos quibusdam.</p>\r\n\r\n<p><strong><em>ini paragraf baru dengan bold</em></strong></p>\r\n', '2020-07-25 11:40:05');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `klasifikasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `klasifikasi`) VALUES
(1, 'Hukum Pidana', '1\r\n'),
(2, 'Hukum Perdata', '4'),
(4, 'Hukum 4', '1'),
(5, 'Hukum 5', '4'),
(6, 'Hukum 6', '3'),
(7, 'Hukum 7', '3'),
(8, 'Hukum 8', '3');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `komentar` text NOT NULL,
  `tgl_dibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `parent_komentar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_artikel`, `nama`, `email`, `komentar`, `tgl_dibuat`, `parent_komentar`) VALUES
(3, 7, 'Ahmad Fikri', 'ahmadfikri@gmail.com', 'Sangat bagus, benar benar bermanfaat', '2020-06-28 18:31:47', NULL),
(4, 7, 'Joni', 'joni@gmail.com', 'Mantapp', '2020-07-07 10:38:28', NULL),
(5, 7, 'kiki', 'kiki@gmail.com', 'mantap apa lu?', '2020-07-08 13:03:05', 4),
(7, 7, 'Jonas', 'jonas@gmail.com', '@kiki emang mantap,', '2020-07-08 13:14:08', 4),
(8, 7, 'Joni', 'joni@gmail.com', 'emang napa @kiki', '2020-07-08 13:21:45', 4),
(9, 7, 'Sarah', 'sarah@gmail.com', 'artikelnya jelek\r\n', '2020-07-09 11:50:50', 3),
(10, 7, 'Rusdi', 'rusdi@gmail.com', 'Keren\r\n', '2020-07-11 10:39:04', NULL),
(11, 7, 'Tono', 'tono@gmail.com', 'Emang keren', '2020-07-11 10:39:47', 10),
(12, 7, 'Rusdi', 'rusdi@gmail.com', 'makasih', '2020-07-11 10:57:11', 10),
(13, 7, 'joni', 'joni@gmail.com', 'emang', '2020-07-12 16:00:23', 3),
(14, 19, 'Ahmad Fikri', 'ahmadf@gmail.com', 'Artikelnya bagus, sangat membantu\r\n', '2020-07-14 10:01:14', NULL),
(15, 19, 'sofi', 'sofi@gmail.com', 'Bagus !!!\r\n', '2020-07-14 10:07:28', NULL),
(16, 19, 'ahmad', 'adf@email.cpm', 'jelek\r\n', '2020-07-14 10:07:43', 15),
(17, 19, 'Andi', 'and@gmail.com', 'sangat buruk', '2020-07-14 10:08:10', 14),
(18, 19, 'Test', 'test@gmail.com', 'waw', '2020-07-14 10:08:36', NULL),
(19, 20, 'Rizki', 'rusdi@gmail.com', 'bagus', '2020-07-22 09:33:13', NULL),
(55, 22, 'Ahmad Fikri', 'fikri@gmail.com', 'adadsf', '2020-07-25 18:30:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `level`) VALUES
(1, 'Fikri', 'fikri@gmail.com', 'fikriganteng', 'admin\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_artikel` (`id_artikel`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id_artikel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
