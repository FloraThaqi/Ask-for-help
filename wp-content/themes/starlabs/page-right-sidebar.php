<?php 
	
/*
	Template Name: Right Sidebar Page
*/
	
get_header(); ?>

<div class="w-full">
  <div class="p-4 container mx-auto flex flex-col md:flex-row">
    <div class="w-full">
      <?php if(have_posts()):
        while(have_posts()): the_post();?>
          <h1><?php the_title();?></h1>
          <p><?php the_content();?></p>
        <?php endwhile;
      endif;
      ?>
    </div>

    <div class="w-full md:w-[30%]">
      <h1>This is where the sidebar goes</h1>
      <?php get_sidebar();?>
    </div>
  </div>
</div>

<div class="container mx-5 mt-10">
  <div class="flex gap-10">
    <main class="flex-1 rounded-lg bg-gray-200 p-2">
      Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum ad, qui debitis voluptatibus corporis dolorum voluptate quis hic, ipsa placeat repudiandae nisi obcaecati maxime praesentium asperiores eos rerum minus vitae! Possimus, incidunt cupiditate. Est neque laudantium ut voluptatum. Omnis, reprehenderit? Quasi adipisci, corrupti ex dolores earum error rerum, tenetur ea, optio veniam maxime quod quia pariatur eum soluta totam saepe? Officiis assumenda magnam nemo dignissimos autem aut, neque fuga. Totam, nostrum. Possimus minima sapiente explicabo doloremque. Repudiandae, provident, animi atque molestias architecto iste ea hic corporis expedita reprehenderit quo. Facere? Praesentium asperiores quam facilis autem eligendi aspernatur cum accusamus nisi ea impedit vel hic laudantium commodi, tenetur molestias saepe ad explicabo et suscipit aperiam? Sed in alias modi quam optio! Alias similique, repellendus et autem magni consequatur quasi, iure qui architecto molestiae odio iusto saepe aut! Fugiat in adipisci placeat! Labore fugiat harum dolorum eaque distinctio aperiam minus itaque veniam? Nihil possimus consequuntur ipsam vero ipsum officia officiis eius voluptates, distinctio praesentium, hic numquam necessitatibus ea quae veritatis ipsa, culpa velit vitae consequatur. Quisquam necessitatibus modi accusantium vero officia corrupti! Pariatur minima atque tempora culpa optio! Quidem optio voluptatem quaerat quae velit maxime dolores ab sit soluta, harum obcaecati amet doloribus dolorum enim tempore fuga eveniet totam impedit illum hic! Facilis accusamus qui soluta ipsum accusantium odit asperiores dignissimos saepe natus, id enim praesentium perferendis voluptas provident ipsa? Dignissimos explicabo, cupiditate repudiandae qui inventore nam odio temporibus animi similique officia! Vitae officia magni hic maxime inventore aut nemo explicabo, fugiat aliquid exercitationem, ut nisi accusantium optio ea rem dolorem alias! Ipsam officiis sint officia sit temporibus aut culpa provident eius? Ipsum omnis incidunt quas nulla vel quibusdam eligendi repellat suscipit tempore ex soluta a officiis quaerat animi itaque voluptatibus, reprehenderit eos perspiciatis dolorum doloribus magni aliquam quidem inventore? Ipsa, nostrum? Laborum cum nesciunt accusantium sapiente iusto sint, neque voluptatem laboriosam ducimus deserunt expedita dolores eaque omnis repellendus voluptatum nam consequuntur? Dolorem asperiores ex deserunt consequuntur laborum eligendi earum error voluptatum. Excepturi hic dolores a necessitatibus quaerat dolorem minima earum laborum nihil eum suscipit, accusantium deleniti delectus tempore eaque quod, commodi architecto officiis esse, laudantium quisquam eligendi tempora atque quia! Quas! Nesciunt, placeat tenetur. Quibusdam quas quam alias amet nihil consectetur provident est libero odit, porro molestias voluptatem dignissimos accusamus eligendi assumenda. Iusto praesentium iure sint delectus sapiente consequatur explicabo officia. Autem, aut? Placeat obcaecati accusamus cum officia vel minima iusto blanditiis beatae molestias eaque a tenetur cupiditate pariatur, aliquam voluptatibus doloribus sunt ipsum aperiam voluptas sequi quas deleniti quae distinctio! Placeat ex enim debitis eaque fuga eum aliquid distinctio veritatis earum. Aperiam optio tempore quis ab soluta, quam excepturi omnis molestiae reprehenderit laboriosam placeat, quisquam ea itaque at. Minima, voluptatibus. Sed assumenda nam modi molestias similique in ex quibusdam dolorum a qui porro quia unde odio inventore, quae magni quaerat quas ipsa nobis nulla repudiandae, culpa veniam. Cum, expedita sequi! Expedita ratione similique nemo asperiores exercitationem obcaecati laborum sit! Unde ad iste corrupti, id, ducimus quos, obcaecati aliquam reprehenderit officia at debitis? Perferendis iste neque exercitationem culpa voluptatem. Impedit, vero! Odit laudantium at perspiciatis illum! Placeat consequuntur iusto iure repellat. Atque alias amet quaerat, tempora deleniti fugiat corporis eveniet et quibusdam enim, saepe aspernatur ullam totam natus quas ipsum facere? Sed dolorem temporibus in neque sunt debitis mollitia delectus tempore tempora? Officiis, minima quod eveniet, a mollitia itaque quos rem distinctio repellat voluptas nemo illo reiciendis molestias alias minus ex! Porro, expedita maxime. Doloremque illum ipsa optio velit eaque provident illo nesciunt ut? Iure, eveniet. Animi, reiciendis ducimus perspiciatis optio deserunt odio quisquam? Numquam, placeat minus modi omnis repellat suscipit. Obcaecati corporis quo cum, aspernatur suscipit quam aliquam ipsam vero amet ducimus repudiandae eius esse hic itaque fugit provident iure quidem! Aliquam modi, nostrum accusamus voluptatem vero quos harum dicta. Dicta dolore quis sed iste, beatae hic harum, ut eius natus voluptates accusamus. Et magnam perferendis quas fuga id quasi, totam facilis eius, voluptatum pariatur impedit illo, quidem atque corrupti. Labore voluptate magni iusto omnis debitis! Ipsam doloremque consequuntur quae quisquam, molestias rem a. Ex dolores exercitationem recusandae rerum ad illum sequi neque voluptate nemo, unde vel officia? Deserunt, libero! Quibusdam cum reiciendis quos nemo incidunt voluptates fugit placeat, eos exercitationem? Deleniti cumque impedit dolorum quam aperiam fugiat commodi, expedita fugit ut placeat veritatis iste odio eum beatae, sunt nihil. Cumque quam modi porro consectetur dolorum vel maxime consequuntur totam voluptas provident. Itaque qui impedit consequatur repudiandae veniam esse ea inventore mollitia, vitae accusantium? Dicta magni iure possimus? Numquam, debitis? Atque error repudiandae totam accusantium perferendis soluta veritatis expedita ullam, quasi dolore iure rerum commodi doloribus consectetur quia unde corrupti accusamus ipsam. Nobis molestiae nostrum doloribus eligendi, eveniet inventore quae! Minus voluptas fugit totam, incidunt, ipsa dicta dignissimos natus et asperiores eos quis neque facilis temporibus, at error ad optio iure consequatur ratione assumenda provident laudantium. Quo labore dicta earum. Cumque, dolore animi autem provident rem fugit deleniti nostrum sequi vel ullam! Dignissimos quam iure consectetur cum temporibus voluptatum enim nam minus illum repellendus, at itaque architecto corporis voluptate excepturi. Ipsam ex maiores ipsum sit consequatur totam sequi autem facilis dolores cupiditate inventore nobis soluta nesciunt pariatur, dolore sed quibusdam! Aperiam nesciunt dolorum repellendus saepe possimus recusandae sint tempora consequuntur! Reiciendis dolores impedit, ut ratione alias officia dolorem. Natus, accusamus. Maiores asperiores ut dolorem commodi. Aliquam deleniti quae, iure tempore ab nemo quos veritatis maxime rerum porro fugiat alias. Veritatis! Vel eligendi quas dolores voluptatum possimus! Consequuntur, incidunt, fuga amet sapiente minima eligendi unde magnam hic aut quia cumque distinctio, tempore excepturi totam ea delectus sit. Vero illo quidem nemo! Optio unde ratione quidem, dicta culpa eos expedita quos qui commodi. Reiciendis minus magnam quia assumenda doloremque quaerat sit illo, quos reprehenderit expedita tenetur sapiente perspiciatis ratione minima quis consequuntur! Facilis eveniet repellat ad placeat? Iusto deserunt, dicta distinctio laboriosam ullam illum expedita reiciendis placeat tempora dolore minus ab cupiditate soluta repellendus corporis praesentium dolorem excepturi hic velit atque sit? Tenetur aut dolor sint! Laborum, officiis quas quasi eos commodi eius tempora sequi maiores voluptates, aperiam ullam eum vero ea! Officia molestias cupiditate nihil quas quae suscipit eius exercitationem porro! Nemo possimus molestias beatae ut, iusto ipsam at amet dolores non. Ratione ut deserunt, eum in hic natus porro vel iusto, accusantium magni expedita iure unde, repellendus provident quisquam cum? Rem officiis officia cumque ipsa voluptas, placeat optio cupiditate voluptatibus dolorum necessitatibus, earum fuga? Quis hic, veritatis assumenda voluptas aperiam soluta corrupti error fuga, quas consequatur molestias exercitationem minus doloremque? Doloribus, cupiditate beatae facilis saepe non natus porro praesentium a vitae provident ex aperiam eum omnis blanditiis nihil voluptate asperiores repudiandae alias odio dicta cum. Alias repudiandae consequuntur iusto fugit. At explicabo molestiae natus neque dolorum vel, qui nulla aut laboriosam velit sunt reprehenderit aperiam dolor deleniti impedit. Asperiores totam ducimus quam iure mollitia officiis maiores illo quas dolorem minus. Autem, itaque dolores nam ab deleniti veniam, quod maxime, neque tenetur asperiores odio suscipit fugit aliquid nisi blanditiis error ea expedita reiciendis. Minima nemo alias, est sunt ipsam atque sit. Illum, est, at quasi architecto assumenda alias impedit ab sequi officia repellendus, accusamus amet. Neque eligendi, dolore alias obcaecati mollitia sed culpa veniam cum corporis dolorum maxime! Fugit, cum corporis? Porro animi amet architecto, eos ducimus, debitis error optio aspernatur ut eum asperiores fuga, doloribus officia consectetur cumque. Iure totam veritatis minima earum. Quod quidem assumenda ducimus neque ullam temporibus? Assumenda magnam neque tempora impedit totam quisquam quibusdam aliquam fuga natus repellat? Dolor illo velit dolorem excepturi magnam accusamus vero veniam, quasi deserunt ratione tempore ex minima doloremque id! Corrupti! Iusto harum delectus ipsa vel doloribus possimus cupiditate itaque voluptatum vero asperiores nisi nesciunt fugit nemo, molestiae hic saepe autem odit consectetur laborum. Libero quasi ipsa quo, nihil repellat quibusdam! Qui at molestias impedit tempore necessitatibus? Error veniam minus aliquid sequi, assumenda vitae ratione labore nobis vero laboriosam esse magnam recusandae iure consectetur eum laborum dolores dolor quaerat praesentium. Quae. Sit mollitia fugiat dolores culpa pariatur, possimus ipsam exercitationem. Quos quidem ipsam deleniti
      inventore libero eveniet sit pariatur aspernatur mollitia? Perspiciatis repellat corrupti excepturi mollitia assumenda iste voluptates voluptate ea. Quaerat commodi officiis, consequuntur totam ipsam nisi. Numquam maiores nemo obcaecati eaque vero pariatur quam culpa impedit fugiat. Dolor excepturi ullam nisi tenetur quia numquam aliquam, nulla id ipsa repudiandae. Et dicta ducimus consequuntur labore a, architecto assumenda magnam odit, repellat deleniti ullam repellendus, ex mollitia doloribus ad reprehenderit molestias inventore. Distinctio itaque similique quasi, hic saepe reprehenderit sed harum. Voluptas, consectetur. Beatae est soluta iste pariatur eveniet, fuga ad esse vero totam! Itaque quisquam reiciendis blanditiis. Dignissimos cum fugiat possimus, nulla ratione iste suscipit explicabo tenetur molestias animi hic! Esse consequatur temporibus sunt quo laboriosam, explicabo fugit sed omnis distinctio! Odit laborum distinctio eius nostrum quod tempore sit suscipit deserunt quo numquam reprehenderit atque fuga dolorem voluptatum, repellat ipsum. Magni voluptates laboriosam, quos nostrum necessitatibus excepturi iure mollitia quibusdam culpa fuga ipsa molestiae aliquam incidunt tenetur enim hic in cum veritatis quisquam. Enim sint delectus deserunt odio porro nemo! Vitae ipsa molestiae molestias a et ex autem consequatur obcaecati velit reiciendis? Suscipit nulla mollitia illum sunt numquam? Expedita, minus ullam architecto totam tenetur provident veritatis corrupti laudantium itaque sapiente? Earum ipsum quidem sequi, veritatis deserunt est cupiditate repellendus non error repudiandae, ullam, illum totam nisi tenetur enim doloremque nihil architecto! Fugit, et ea explicabo sint reiciendis ab quos temporibus! Vitae iste nam molestias voluptatem, nulla distinctio rem, veritatis dolores debitis minima quasi! Deserunt facere sed earum ad ducimus debitis dolorem! Alias neque deserunt repellendus eum laborum dolore omnis excepturi? Nostrum, fugit natus laudantium minima labore facere repellendus pariatur sequi laboriosam a! Earum doloribus, reiciendis recusandae quae, accusantium, fugit hic soluta ipsum dicta perspiciatis ullam labore illum. Sed, id sit? Voluptatibus explicabo mollitia natus cupiditate eligendi fugiat commodi veritatis in accusantium nulla vero impedit provident ea exercitationem quam voluptas dicta aperiam facere, corrupti voluptates ut! Velit autem odio eveniet architecto! Dolore quos necessitatibus voluptates totam explicabo voluptatem dolorem libero quam recusandae a error, perferendis perspiciatis voluptas et excepturi, accusamus atque eum. Vel quibusdam autem dignissimos ut molestias dolore illo sapiente? Deleniti magni veritatis itaque fugiat delectus. Dolores fugiat, consequuntur minus omnis voluptate aut deserunt nobis voluptatum, deleniti ipsam iusto, voluptatem sapiente quasi dolorum natus placeat ipsa excepturi laboriosam nihil ut! Autem aut voluptatibus ad ipsa natus? Maxime, rem? Asperiores repellat inventore deleniti laborum laboriosam enim quam, unde quidem id facere adipisci provident nulla. Officiis accusantium tempore eaque rem quibusdam sequi. Labore numquam ducimus expedita debitis non iure mollitia aliquid maxime voluptas perferendis iusto nesciunt animi doloribus consequuntur fugiat quaerat harum eligendi maiores, cupiditate itaque ratione. Reprehenderit magnam consequuntur expedita. Quisquam. Praesentium earum, nobis doloribus eius soluta voluptates voluptatum. Dolorem nam, omnis impedit eum possimus maiores minima quasi mollitia blanditiis laudantium facere autem cupiditate illo eveniet sapiente est nulla ullam perspiciatis. Iure non earum quia beatae vel odit facere. Expedita cupiditate eum voluptate! Quia dignissimos quaerat quas doloribus cum dolorum rem qui, id ex, veritatis fuga aliquam iste velit quidem ab. Ipsa tenetur incidunt adipisci exercitationem explicabo necessitatibus cumque ratione beatae, illo reiciendis quae fugiat ducimus atque suscipit dolores et soluta dicta. Doloremque in ut beatae officia. Laudantium a temporibus in? Perspiciatis dolores aspernatur est quibusdam, reiciendis veritatis perferendis id vero! Facere blanditiis temporibus, quas quos eaque debitis culpa animi iste possimus totam doloremque officiis tempore architecto delectus quisquam harum voluptas! Neque suscipit officiis vitae magni repellat quam odio! Qui, repellendus sequi fuga id deleniti repudiandae animi, fugit ipsum optio minus quaerat eaque alias sunt illo error porro dolor natus illum. Expedita architecto, dolores nisi molestiae asperiores itaque! Eveniet ducimus sunt voluptate iusto repellat, sint esse, praesentium, velit ullam mollitia voluptatem labore suscipit corporis rem adipisci atque exercitationem nulla tempora repudiandae? Velit nisi est quas aliquam omnis perferendis ipsum, delectus fuga iure aut sequi odit cumque odio molestias minima reiciendis earum asperiores non provident impedit error culpa doloremque dolor distinctio? Repellat. Voluptatum quas omnis rerum, enim mollitia quam temporibus ipsum, earum consequatur cupiditate quo labore quasi quae reiciendis in? Inventore, itaque obcaecati! Nisi autem, est voluptatum fugit itaque id quam amet. Cumque debitis vero sint soluta, a asperiores iure quidem, ipsa est dolores maiores quam perferendis dolor, officiis temporibus. Inventore sed dolores laborum cum tempora, sapiente quaerat esse harum reprehenderit iusto. Consequuntur repellat facere et architecto tempora harum sequi voluptate aliquid beatae corrupti consectetur, modi dolores veniam maxime nam neque quasi minus molestias, animi recusandae fuga deserunt tempore? Aliquid, magnam fugit. Rem maxime, sequi, quibusdam eum nam aliquam, cumque quod nostrum eaque nihil quas vero vitae. Atque corporis at illum veniam, quos id beatae deserunt aut delectus rerum quia laboriosam natus. Dolores, perferendis numquam. Laboriosam pariatur illo vel non quod consectetur beatae, aliquam nisi nesciunt nihil explicabo temporibus perferendis alias iure qui optio magnam doloribus! Rerum dolores nemo possimus optio. Iste! At eum laboriosam deserunt quo doloribus quasi ea non iure magni est eaque praesentium voluptatibus, culpa natus incidunt corrupti ratione modi soluta labore officiis ab? Quidem ratione vel expedita saepe? Nihil accusantium officiis illum corporis consequatur sequi odit repellat a. Tempore est enim eum beatae excepturi ipsa quae aperiam soluta qui nihil! Voluptatibus totam dolor iusto similique illo amet aperiam! Cum autem quibusdam sed sequi sit, enim mollitia nihil temporibus non, ex harum. Dolores explicabo obcaecati sapiente molestiae, aliquam illum ipsum cum dolore quam temporibus deleniti quod voluptatum dolor neque. Aperiam nisi totam explicabo recusandae assumenda, dignissimos natus perferendis! Similique vero dicta, explicabo accusamus pariatur sed fugiat amet facilis quis numquam dignissimos assumenda, suscipit sint harum excepturi, ipsam expedita voluptates! Fugiat ducimus ullam nobis distinctio blanditiis, a corrupti cumque veritatis molestiae eius vitae qui aspernatur aliquam facere totam quasi autem nesciunt? Dolor consequatur accusantium totam commodi nemo omnis quod quas. At, dignissimos! Distinctio iste voluptatem optio illo quos, quasi dolorum soluta! Magnam, commodi voluptas eos aperiam amet, fugiat placeat alias excepturi nemo temporibus cum quis, nulla dolorem iusto iste fuga. Nisi quibusdam doloribus ad aperiam alias enim at assumenda hic ullam ipsum. Ea optio ducimus rem labore dolor doloremque laudantium consequatur, nihil soluta. Dolorum impedit totam culpa maxime exercitationem laudantium. Iure dolore nobis beatae modi recusandae voluptates laborum aliquid eveniet fugiat. Impedit quaerat hic voluptas obcaecati autem error iure molestiae, unde sapiente reprehenderit quam, atque est vero perferendis doloremque quae. Repudiandae, consequatur tempore? Amet eligendi quisquam modi repellendus voluptatibus explicabo dolor consectetur accusantium beatae error deleniti, qui molestiae nobis corporis doloremque saepe expedita facere. Aut amet quia ullam quaerat tenetur. Laboriosam cupiditate alias eveniet aut rem possimus mollitia, tenetur facilis vitae ipsum aperiam necessitatibus? Quaerat corrupti similique reiciendis incidunt sed, pariatur sint quia in illo repellat ipsum exercitationem, quo excepturi. Fuga aut quidem beatae. Quam iste aperiam illum, accusantium, a tenetur doloribus beatae blanditiis debitis neque placeat recusandae animi expedita quaerat sapiente voluptatum saepe repellat impedit quidem. Hic, in iste? Libero obcaecati, dolores facilis blanditiis debitis cum? Omnis, esse laborum. Aut earum consequuntur recusandae obcaecati culpa natus sunt, aliquid pariatur voluptas, excepturi provident qui ipsa possimus soluta fugit error labore? Nobis incidunt et, sequi repellat consequatur doloribus temporibus tempora corrupti? Sed hic minima veritatis itaque ut eum? Expedita ut iste modi ratione at excepturi? Doloribus quos consequuntur assumenda labore expedita? Expedita laboriosam odit cumque modi animi voluptatum dicta quidem mollitia laborum, eaque eos saepe exercitationem amet veniam aliquid. Voluptatem voluptatibus aliquid harum deleniti mollitia laboriosam aspernatur voluptates quaerat, repellat eum. Placeat sit perferendis amet rerum molestias corrupti et. Aut expedita quisquam non officia architecto. Minus id laborum hic quibusdam voluptates. Architecto, placeat? Voluptatem sequi, veniam saepe hic provident maxime aperiam. Veritatis incidunt esse, laborum quam ea dolore. Doloribus, assumenda molestiae quisquam quis commodi tenetur minima itaque vero error maiores ratione voluptate omnis rerum ipsam maxime natus quia debitis harum tempore? Dolore voluptatum rem dolor, nobis et itaque velit adipisci, vitae eligendi aliquam a necessitatibus rerum. Ex hic nesciunt, dolorem est accusantium nam, deserunt iste aspernatur odit fugit rem expedita facere! Vel perspiciatis similique atque commodi fugiat itaque, recusandae maxime vitae
      impedit in a temporibus quibusdam voluptatibus asperiores illum dolorem voluptates facilis, ducimus hic quos officia minima? Aspernatur fugiat mollitia provident? Ut, odio? Vitae incidunt rerum pariatur laudantium voluptatum suscipit ab reiciendis non natus quaerat placeat, ex eum adipisci iste excepturi ad obcaecati tempora aspernatur ratione, veritatis magnam eligendi voluptatem blanditiis. Ex iusto deserunt modi quod tempora aliquam natus, fugiat eaque inventore neque saepe expedita dolorem amet, alias harum incidunt fugit optio doloremque eveniet minima repudiandae vitae animi? Alias, sequi accusantium. Perferendis ullam dicta dolorem voluptatum laudantium, excepturi impedit fuga totam laboriosam minima delectus. Adipisci maxime mollitia, vel sapiente dignissimos maiores, nihil laboriosam molestiae animi quia cupiditate ex voluptate at. Quo? Animi facere iusto maxime eligendi recusandae alias adipisci accusantium labore maiores exercitationem veritatis sunt, itaque officia ut tempora distinctio illum explicabo ducimus expedita cumque culpa? Eius dolore sapiente non dolorum. Iste excepturi, accusantium nemo autem repellat porro velit? Aut commodi sunt, ullam voluptate fugit voluptatibus harum omnis consectetur, corrupti quasi soluta doloremque cupiditate optio quia placeat quae iste officia consequuntur. Debitis quas ullam aliquam accusantium facilis dolore? Labore culpa consectetur maiores aliquam odio expedita accusantium! Suscipit aliquid cumque aspernatur iusto, voluptate inventore dicta, pariatur sequi vero facilis doloremque. Voluptatibus, modi. Architecto corporis voluptas natus dolor necessitatibus rerum a ullam assumenda est similique iusto laborum, dolores et reprehenderit eos quae eligendi quidem optio magnam ipsam voluptates? Error temporibus libero ipsa porro? Praesentium, exercitationem facere a dolores maxime optio ipsa, reiciendis voluptates molestiae fuga totam est, corporis ipsum voluptate incidunt soluta dolorum minima dolor. Vero, nam et asperiores incidunt facilis odio suscipit? Facilis vero, ipsam debitis velit saepe similique officia molestias, laborum placeat, ut sint obcaecati odio. Incidunt culpa itaque fugiat dignissimos quasi iste quia praesentium modi quibusdam impedit. Ullam, recusandae quasi. Similique vitae doloribus laborum excepturi distinctio perspiciatis hic error modi at exercitationem ea facilis ipsum magni esse illo architecto ut, soluta, maxime velit in veritatis id cumque commodi omnis? Ex? Numquam exercitationem impedit ex commodi natus est quos, fuga, nemo sapiente unde aut velit vitae iure accusamus molestias culpa modi quibusdam minus amet vel id quia quas temporibus obcaecati! Perspiciatis.
    </main>
    <aside class="sticky top-0 h-64 bg-blue-400 py-5 px-10">
      <ul>
        <li>Link One</li>
        <li>Link Two</li>
        <li>Link Three</li>
        <li>Link Four</li>
        <li>Link Five</li>
      </ul>
    </aside>
  </div>
</div>

<?php get_footer(); ?>