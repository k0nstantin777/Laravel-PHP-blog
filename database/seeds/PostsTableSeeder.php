<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * 1
         */
        Post::create([
            'user_id' => 1,
            'title' => 'Авто путешествие на оз.Зюраткуль',
            'image' => 'https://image.jimcdn.com/app/cms/image/transf/dimension=700x10000:format=jpg/path/s5fb7f8ba38782360/image/i39978599365b2173/version/1427020429/image.jpg',
            'slug' => url_slug('Авто путешествие на оз.Зюраткуль'),
            'announce' => 'Наше первое авто путешествие было запланировано на оз. Зюраткуль в Челябинской области на 5 дней, так же взяли с собой собаку. ',
            'fulltext' => 'Наше первое авто путешествие было запланировано на оз. Зюраткуль в Челябинской области на 5 дней, так же взяли с собой собаку. Бронировали жилье самостоятельно и развлечения придумывали тоже сами. Поехали мы в последнюю неделю лета, поэтому погода обещала быть разной.
                        Озеро находится на территории национального парка Зюраткуль. Один из самых высокогорных (724 м над уровнем моря) водоёмов Южного Урала. Водохранилище окружают горные хребты, Юго-западнее расположен хребет Нургуш — самый высокий хребет Челябинской области.
                        День 1. Дорога.
                        Дорога до озера проходила через город Кыштым, в котором стоит очень красивый и величественный Христовоздвиженский собор.  В 1848 г. его начали строить на самой высокой точке поселка в течении 9 лет. Колокольня имеет высоту 71 метр, а общая площадь двухэтажного храма 2000 кв.м.
                        Недалеко от города Кыштым есть заброшенный Каолиновый карьер, в народе его называют "Русское Бали". Такое название ему дали не зря, т.к. вода в нем голубая-голубая, а берега из белой глины. Купаться здесь нежелательно из-за наличия свалки рядом, но многих это не останавливает. 
                        Погуляв, едем дальше, и проезжаем самый грязный город  Карабаш. Он представляет из себя горы не понятного вещества, клубы дыма вылетающих из труб  заменяют городку облака, природа выглядит зачахшей. Люди там как-то живут и работают на этом заводе загрязняющим планету. При желании по этим горам можно прогуляться.
                        Въезд на территорию национального парка Зюраткуль платный. Дорога уходит вверх, закладывает уши от перепада высоты.
                        День 2. ЭКО-тропа на хр. Зюраткуль.
                        День был солнечный с пробегающими мимо облаками ( которых мы немного опасались на случай дождя).
                        На территории леса говорят живет семья медведей, поэтому при входе стоит  стенд с правилами поведения в лесу (нужно петь песенки и шуметь,чтоб медведь вас услышал и не вышел к вам).
                        Подъём на хребет представляет из себя эко-тропу которая специально подготовлена для туристов. На маршруте есть две беседки,расстояние между ними примерно 1 км., возле одной из них растет дерево-желаний(туристы на нем повязывают ленты). Рядом с тропой протекает горный ручей,если сильная засуха, то он может пересохнуть. Воду можно пить,чистая горная,вкусная.
                        Пройдя примерно 2,5-3 км мы почувствовали подъем в гору, деревянная дорожка закончилась. Меняется растительность, местами проступают большие, огромные камни, торчат корни деревьев. Дорога становится интереснее, и когда оборачиваешься происходит прилив сил от увиденного, желание  лицезреть всю эту природу растет, и не так сильно чувствуешь усталость.
                        Обойти курумник не было возможности, шли прямо по нему. Когда первый раз увидели перед собой огромное количество булижников, очень сильно удились , т.к. видели такое в первый раз. Пройдя первую полосу препятствий были в полном восторге от всего происходящего. Папа  с сыном за руку так быстро скакали,что пока я все фотографировала убегали далеко вперед. Вот эта вторая часть пути для ребенка была самым большим приключением, сам бы он конечно не поднялся.
                        Подниматься по курумнику нужно очень аккуратно,чтоб камень не сдвинулся на идущего сзади. Да и вообще чтоб ни кого не придавил.
                        На самом верху дул очень сильный ветер, облака проплывали практически над нами, мы не много спрятались по ниже, фотографировались и сделали мини пикничок с отличнейшим видом на высоте примерно 1038 м над уровнем моря. К счастью с погодой нам повезло, гора нас встретила и приняла, чему мы были очень-очень рады).
                        Приезжайте сюда, отдыхайте с семьей, место очень живописное, чистейший воздух, все как надо!!',
            'views_count' => mt_rand(40,100),
            'active_from' => Carbon::now(),
            
        ]);
        /**
         * 2
         */
        Post::create([
            'user_id' => 3,
            'title' => 'Товарищеский матч. Россия – Аргентина – 0:1',
            'image' => 'http://ss.sport-express.ru/userfiles/materials/111/1110178/full.jpg',
            'slug' => url_slug('Товарищеский матч. Россия – Аргентина – 0:1'),
            'announce' => 'Может, оно и к лучшему, что 0:1. Ничья в матче открытия новых "Лужников" с Аргентиной могла бы создать ложные иллюзии относительно уровня сегодняшней сборной России, которые были бы только вредны для адекватности самооценки каждого из игроков и команды в целом. "Соперник был сильнее нас, на гол он точно наиграл – надо быть объективным", – прав Станислав Черчесов.',
            'fulltext' => 'Может, оно и к лучшему, что 0:1. Ничья в матче открытия новых "Лужников" с Аргентиной могла бы создать ложные иллюзии относительно уровня сегодняшней сборной России, которые были бы только вредны для адекватности самооценки каждого из игроков и команды в целом. "Соперник был сильнее нас, на гол он точно наиграл – надо быть объективным", – прав Станислав Черчесов. И хорошо, что он это на пресс-конференции сказал.
                           То, что этот гол Серхио Агуэро забил после того, как Кристиан Павон получил пас от Лео Месси в офсайде, сути дела не меняет. Одно дело, если бы это был непосредственно матч ЧМ-2018 – но там такое при системе ВАР будет исключено. В контрольной же встрече главное – качество игры. Заслужили ли аргентинцы, хоть они тоже далеко не феерили, одним лишь количеством своих моментов гола? Безусловно. Наиграла ли сборная России на ничью, не создав ни одного голевого момента? Едва ли. И если бы не Игорь Акинфеев (ау, счетоводы его антирекордной серии в Лиге чемпионов), все было бы решено гораздо раньше.',
            'views_count' => mt_rand(0,100),
            'active_from' => Carbon::now(),
        ]);
        
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $postModel = Post::create([
                'title' => $faker->realText(50),
                'tagline' => $faker->realText(30),
                'user_id' => mt_rand(1,3),
                //'image' => 'https://imgholder.ru/1280x720/0082d5/eceff4&text=%D0%9A%D0%B0%D1%80%D1%82%D0%B8%D0%BD%D0%BA%D0%B0%20%D0%B1%D0%BB%D0%BE%D0%B3%D0%B0&font=kelson',
                'image' => 'https://picsum.photos/1280/720?random',
                'slug' => sha1(str_random(16) . microtime(true)),
                'announce' => $faker->realText(300),
                'fulltext' => $faker->realText(1024),
                'active_from' => Carbon::now(),
                'views_count' => mt_rand(0,40),
            ]);
            $postModel->slug = url_slug($postModel->title);
            $postModel->save();
        }
        $favPost = Post::find(mt_rand(1,12));
        $favPost->is_favorite = 1;
        $favPost->save();
    }
}
