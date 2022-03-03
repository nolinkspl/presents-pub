<?php

use App\Models;
use App\Models\Device;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->createUsers();
     //   $this->createGiftCategories();
        $this->createGiftTypes();
       // $this->createGiftCategoryTypes();
        $this->createGifts();
        $this->createInvites();
    }

    public function createGiftTypes(): void
    {
        $data = [
            [
                'id' => 1,
                'name' => 'lamoda',
                'title' => 'Lamoda',
                'is_vip' => false,
                'description_head' => 'Сохраните сертификат.',
                'description' => '1. Войдите в свой профиль на сайте Lamoda. Если вы еще не зарегистрированы, сделайте это, используя электронную почту или аккаунт в социальных сетях<br>
2. Выберите раздел «Подарочный сертификаты» <br>
3. Нажмите на кнопку «Добавить сертификат» <br>
4. Введите в соответствующие поля номер сертификата и пинкод (указаны в сертификате) <br>
5. Нажмите «Активировать» <br>
6. Добавьте понравившиеся товары в корзину*<br>
7. В блоке оплаты, в разделе «Подарочный сертификат», выберите сертификат и примените его к заказу<br><br>

*Сертификат применим к товарам от продавца Lamoda и не действует на товары партнеров. <br>
На карточке товара мы всегда указываем, под кнопкой "таблица соответствия размеров", продавца этого товара. Например: <br>
"Товар размещён в магазине Lamoda нашим партнёром..." - это означает, что сертификат невозможно применить к этой позиции.  Вы можете воспользоваться сертификатом в течение 6 месяцев. <br><br>

Если вы не можете воспользоваться подарком, то его можно отдать своим друзьям или родным.
',
            ],
//            [
//                'id' => 1,
//                'name' => 'sportmaster',
//                'title' => 'Спортмастер',
//                'is_vip' => false,
//                'description_head' => 'Распечатайте и сохраните номер и PIN код сертификата. <br>',
//                'description' => 'Для оплаты заказа электронной подарочной картой в интернет-магазине спортмастер.ру:<br>
//1. Выберите товар и оформите заказ<br>
//2. Выберите способ оплаты «электронной подарочной картой» <br>
//3. Выберите номер электронной подарочной карты <br>
//4. Введите актуальный пин-код<br>
//5. Нажмите ок и дождитесь подтверждения оплаты<br>
//6. После подтверждения Вы перейдёте к следующему этапу оформления заказа. <br>
//Вы можете использовать Подарочную карту в любом магазине СПОРТМАСТЕР на территории России, в том числе, в магазинах СПОРТМАСТЕР-ДИСКОНТ. Предъявите номер электронной подарочной карты и сообщите актуальный пин-код. <br>
//Вы можете воспользоваться сертификатом в течение 6 месяцев. <br><br>
//
//Если вы не можете воспользоваться подарком, то его можно отдать своим друзьям или родным.
//',
//            ],
            [
                'id' => 2,
                'name' => 'mvideo',
                'title' => 'М Видео',
                'is_vip' => false,
                'description_head' => 'Магазин цифровой и бытовой техники',
                'description' => 'Распечатайте подарочный сертификат или сохраните в электронном виде, сохраните пин код. <br>
Предъявите сертификат и сообщите пин код сертификата, состоящий из 4х цифр,  кассиру при оплате. <br>
При заказе товаров в интернет магазине необходимо в корзине, на шаге №3 «скидочные средства» выбрать подарочную карту и указать ее номинал. Пин код сообщить курьеру при доставке. <br>
Подарочный сертификат может быть использован однократно и после оплаты блокируется. <br>
Вы можете приобрести товар, равный номиналу сертификата, при необходимости  совершить доплату наличными или банковской картой. При покупке Вы также можете воспользоваться картой «Мвидео бонус».  Бонусы суммируются. <br>
Если стоимость товара меньше номинала сертификата, разница не возвращается. <br>
Сертификат не может быть  использован для приобретения техники Miele ,Apple,  Dyson. <br><br>

Срок действия сертификата 2 года. <br><br>

Если вы не можете воспользоваться подарком, то его можно отдать своим друзьям или родным.',
            ],
            [
                'id' => 3,
                'name' => 'letual',
                'title' => 'Л’Этуаль',
                'is_vip' => false,
                'description_head' => 'Интернет магазин свежего кофе',
                'description' => 'Вы можете использовать номинал сертификата для оплаты выбранных Вами товаров на сайте https://shop.tastycoffee.ru/ <br>
При оформлении заказа введите код в поле «подарочный сертификат». <br>
Нужная сумма спишется после оформления заказа.
Сертификат бессрочный. <br>
Если вы не можете воспользоваться подарком, то его можно отдать своим друзьям или родным.',
            ],
//            [
//                'id' => 3,
//                'name' => 'amedia',
//                'title' => 'Амедиатека',
//                'is_vip' => false,
//                'description_head' => 'Онлайн-сервис лучших сериалов планеты.',
//                'description' => 'Промокод можно активировать на сайте Амедиатеки www.amediateka.ru, либо в приложениях Амедиатеки для iOS / Android / Windows Phone/Mobile или Smart TV: <br><br>
//
//1. На SMART TV (на телевизорах Samsung, LG, Phillips): <br>
//- Откройте боковое меню и выберите раздел «Профиль»;
//- Выберите кнопку "У меня есть промо-код"<br>
//- В окне ввода кода введите имеющийся у вас промокод. <br><br>
//
//2. На сайте: <br>
//- С помощью web-браузера зайдите на www.amediateka.ru, зарегистрируйтесь; <br>
//- В разделе «Покупки» введите промокод в графе «Промокод»; <br>
//- Смотрите сериалы. <br><br>
//
//3. На мобильных устройствах с iOS: <br>
//- Зайдите в приложение Амедиатеки и выберите вкладку «Подписки»; <br>
//- Выберите ту подписку, которую активирует полученный вами промокод; <br>
//- Нажмите на стоимость подписки; <br>
//- Появится всплывающее окно, в котором вам необходимо нажать «Ввести промокод»; <br>
//- После введения промокода он будет активирован; <br>
//- Наслаждайтесь просмотром. <br><br>
//
//4. На мобильных устройствах с Android: <br>
//- Зайдите в приложение Амедиатеки; <br>
//- В боковом меню приложения выберите пункт «Промокод»; <br>
//- Введите промокод в открывшееся окно и нажмите «ОК»; <br>
//- Промокод активирован и вы можете смотреть Амедиатеку. <br><br>
//
//5. На мобильных устройствах с Windows Phone/Mobile: <br>
//- Зайдите в приложение Амедиатеки; <br>
//- Для вызова меню приложения нажмите на многоточие в правом нижнем углу и выберите «Профиль»; <br>
//- Введите промокод в графе «Промокод» и нажмите «Активировать»; <br>
//- Промокод активирован. Включайте сериалы скорее. <br><br>
//
//Поле активации промокода будет доступно в приложении только в том случае, если у Вас отсутствуют встроенные подписки. <br>
//Вы можете воспользоваться сертификатом в течение 6 месяцев. <br>
//Если вы не можете воспользоваться подарком, то его можно отдать своим друзьям или родным',
//            ],
//            [
//                'id' => 5,
//                'name' => 'tasty',
//                'title' => 'Tasty Coffee',
//                'is_vip' => false,
//                'description_head' => 'Интернет магазин свежего кофе',
//                'description' => 'Вы можете использовать номинал сертификата для оплаты выбранных Вами товаров на сайте https://shop.tastycoffee.ru/ <br>
//При оформлении заказа введите код в поле «подарочный сертификат». <br>
//Нужная сумма спишется после оформления заказа.
//Сертификат бессрочный. <br>
//Если вы не можете воспользоваться подарком, то его можно отдать своим друзьям или родным.',
//            ],
//            [
//                'id' => 6,
//                'name' => 'ticket',
//                'title' => 'Ticketland.ru',
//                'is_vip' => false,
//                'description_head' => 'Cохраните номер сертификата.',
//                'description' => 'Вы можете воспользоваться сертификатом для оплаты билетов на сайте ticketland.ru
//Выбираете понравившийся мероприятие.
//При оплате билетов вводите уникальный код сертификата в поле «подарочная карта».
//На почту поступит уведомление о заказе, переходите по ссылке, которая указана в письме, распечатываете билеты.
//Вы можете применить сертификат в кассах Ticketland.ru, предъявив кассиру QR-код сертификата.
//Вы можете воспользоваться сертификатом в течение 12 месяцев.
//
//Если вы не можете воспользоваться подарком, то его можно отдать своим друзьям или родным.
//',
//            ],
//            [
//                'id' => 7,
//                'name' => 'yandex_vip',
//                'title' => 'Яндекс',
//                'is_vip' => true,
//                'description_head' => 'Яндекс музыка и фильмы в одной подписке на 12 месяцев',
//                'description' => 'Зайдите на сайт https://plus.yandex.ru/gift и активируйте промокод. <br><br>
//
//Промокод необходимо активировать до 31.12.2022<br><br>
//
//Если вы не можете воспользоваться подарком, то его можно отдать своим друзьям или родным',
//            ],
//            [
//                'id' => 8,
//                'name' => 'mvideo_vip',
//                'title' => 'М Видео',
//                'is_vip' => true,
//                'description_head' => 'Магазин цифровой и бытовой техники',
//                'description' => 'Распечатайте подарочный сертификат или сохраните в электронном виде, сохраните пин код. <br>
//Предъявите сертификат и сообщите пин код сертификата, состоящий из 4х цифр,  кассиру при оплате. <br>
//При заказе товаров в интернет магазине необходимо в корзине, на шаге №3 «скидочные средства» выбрать подарочную карту и указать ее номинал. Пин код сообщить курьеру при доставке. <br>
//Подарочный сертификат может быть использован однократно и после оплаты блокируется. <br>
//Вы можете приобрести товар, равный номиналу сертификата, при необходимости  совершить доплату наличными или банковской картой. При покупке Вы также можете воспользоваться картой «Мвидео бонус».  Бонусы суммируются. <br>
//Если стоимость товара меньше номинала сертификата, разница не возвращается. <br>
//Сертификат не может быть  использован для приобретения техники Miele ,Apple,  Dyson. <br><br>
//
//Срок действия сертификата 2 года. <br><br>
//
//Если вы не можете воспользоваться подарком, то его можно отдать своим друзьям или родным.',
//            ],
//            [
//                'id' => 9,
//                'name' => 'amedia_vip',
//                'title' => 'Амедиатека',
//                'is_vip' => true,
//                'description_head' => 'Онлайн-сервис лучших сериалов планеты.',
//                'description' => 'Промокод можно активировать на сайте Амедиатеки www.amediateka.ru, либо в приложениях Амедиатеки для iOS / Android / Windows Phone/Mobile или Smart TV: <br><br>
//
//1. На SMART TV (на телевизорах Samsung, LG, Phillips): <br>
//- Откройте боковое меню и выберите раздел «Профиль»;
//- Выберите кнопку "У меня есть промо-код"<br>
//- В окне ввода кода введите имеющийся у вас промокод. <br><br>
//
//2. На сайте: <br>
//- С помощью web-браузера зайдите на www.amediateka.ru, зарегистрируйтесь; <br>
//- В разделе «Покупки» введите промокод в графе «Промокод»; <br>
//- Смотрите сериалы. <br><br>
//
//3. На мобильных устройствах с iOS: <br>
//- Зайдите в приложение Амедиатеки и выберите вкладку «Подписки»; <br>
//- Выберите ту подписку, которую активирует полученный вами промокод; <br>
//- Нажмите на стоимость подписки; <br>
//- Появится всплывающее окно, в котором вам необходимо нажать «Ввести промокод»; <br>
//- После введения промокода он будет активирован; <br>
//- Наслаждайтесь просмотром. <br><br>
//
//4. На мобильных устройствах с Android: <br>
//- Зайдите в приложение Амедиатеки; <br>
//- В боковом меню приложения выберите пункт «Промокод»; <br>
//- Введите промокод в открывшееся окно и нажмите «ОК»; <br>
//- Промокод активирован и вы можете смотреть Амедиатеку. <br><br>
//
//5. На мобильных устройствах с Windows Phone/Mobile: <br>
//- Зайдите в приложение Амедиатеки; <br>
//- Для вызова меню приложения нажмите на многоточие в правом нижнем углу и выберите «Профиль»; <br>
//- Введите промокод в графе «Промокод» и нажмите «Активировать»; <br>
//- Промокод активирован. Включайте сериалы скорее. <br><br>
//
//Поле активации промокода будет доступно в приложении только в том случае, если у Вас отсутствуют встроенные подписки. <br>
//Вы можете воспользоваться сертификатом в течение 6 месяцев. <br>
//Если вы не можете воспользоваться подарком, то его можно отдать своим друзьям или родным',
//            ],
//            [
//                'id' => 10,
//                'name' => 'lamoda_vip',
//                'title' => 'Lamoda',
//                'is_vip' => true,
//                'description_head' => 'Сохраните сертификат.',
//                'description' => '1. Войдите в свой профиль на сайте Lamoda. Если вы еще не зарегистрированы, сделайте это, используя электронную почту или аккаунт в социальных сетях<br>
//2. Выберите раздел «Подарочный сертификаты» <br>
//3. Нажмите на кнопку «Добавить сертификат» <br>
//4. Введите в соответствующие поля номер сертификата и пинкод (указаны в сертификате) <br>
//5. Нажмите «Активировать» <br>
//6. Добавьте понравившиеся товары в корзину*<br>
//7. В блоке оплаты, в разделе «Подарочный сертификат», выберите сертификат и примените его к заказу<br><br>
//
//*Сертификат применим к товарам от продавца Lamoda и не действует на товары партнеров. <br>
//На карточке товара мы всегда указываем, под кнопкой "таблица соответствия размеров", продавца этого товара. Например: <br>
//"Товар размещён в магазине Lamoda нашим партнёром..." - это означает, что сертификат невозможно применить к этой позиции.  Вы можете воспользоваться сертификатом в течение 6 месяцев. <br><br>
//
//Если вы не можете воспользоваться подарком, то его можно отдать своим друзьям или родным.
//',
//            ],
//            [
//                'id' => 11,
//                'name' => 'tasty_vip',
//                'title' => 'Tasty Coffee',
//                'is_vip' => true,
//                'description_head' => 'Интернет магазин свежего кофе',
//                'description' => 'Вы можете использовать номинал сертификата для оплаты выбранных Вами товаров на сайте https://shop.tastycoffee.ru/ <br>
//При оформлении заказа введите код в поле «подарочный сертификат». <br>
//Нужная сумма спишется после оформления заказа.
//Сертификат бессрочный. <br>
//Если вы не можете воспользоваться подарком, то его можно отдать своим друзьям или родным.',
//            ],
//            [
//                'id' => 12,
//                'name' => 'ticket_vip',
//                'title' => 'Ticketland.ru',
//                'is_vip' => true,
//                'description_head' => 'Cохраните номер сертификата.',
//                'description' => 'Вы можете воспользоваться сертификатом для оплаты билетов на сайте ticketland.ru
//Выбираете понравившийся мероприятие.
//При оплате билетов вводите уникальный код сертификата в поле «подарочная карта».
//На почту поступит уведомление о заказе, переходите по ссылке, которая указана в письме, распечатываете билеты.
//Вы можете применить сертификат в кассах Ticketland.ru, предъявив кассиру QR-код сертификата.
//Вы можете воспользоваться сертификатом в течение 12 месяцев.
//
//Если вы не можете воспользоваться подарком, то его можно отдать своим друзьям или родным.
//',
//            ],
        ];

        $this->createRecords(Models\GiftType::class, $data);
    }

    public function createGifts(): void
    {
        $data = [];

         for ($i = 0; $i < 200; $i++) {
             $typeId = ($i % 3) + 1;
             if ($typeId == 9) continue;
             if (in_array($typeId, [5, 10])) {
                 continue;
             }
             $data[] = [
                 'gift_type_id' => $typeId,
                 'code' => 'TESTGIFT' . $i,
             ];
         }

//         for ($i = 0; $i < 20; $i++) {
//             $data[] = [
//                 'gift_type_id' => 5,
//                 'code' => 'TESTGIFT999',
//                 'pin' => '1010',
//             ];
//             $data[] = [
//                 'gift_type_id' => 10,
//                 'code' => 'TESTGIFT999',
//             ];
//         }

        $this->createRecords(Models\Gift::class, $data);
    }

    public function createInvites(): void
    {
        $data = [];

        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'code' => 'TESTINVITE' . $i,
                'is_vip' => false,
            ];
        }

        for ($i = 100; $i < 200; $i++) {
            $data[] = [
                'code' => 'TESTINVITE' . $i,
                'is_vip' => true,
            ];
        }

        $this->createRecords(Models\Invite::class, $data);
    }

    private function createRecords(string $modelName, array $data): void
    {
//        foreach ($data as $row) {
//            $result = new $modelName($row);
//            $result->save();
//        }
        $modelName::insert($data);
    }

    private function createUsers(): void
    {
        $data = [
            [
                'name' => 'Admin',
                'email' => 'admin@newyear-ehrmann.com',
                'email_verified_at' => null,
                'password' => Hash::make('123456'),
                'remember_token' => Str::random(60),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'role' => 'admin',
            ],
            [
                'name' => 'Manager',
                'email' => 'manager@newyear-ehrmann.ru',
                'email_verified_at' => null,
                'password' => Hash::make('IAmManager'),
                'remember_token' => Str::random(60),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'role' => 'manager',
            ],
        ];

        $this->createRecords(Models\User::class, $data);
    }
//
//    private function createGiftCategories(): void
//    {
//        $data = [
//            [
//                'name' => 'SPORT ZONE (СПОРТИВНЫМ ФАНАТАМ)',
//                'is_vip' => false,
//            ],
//            [
//                'name' => 'SPORT ZONE (СПОРТИВНЫМ ФАНАТАМ)',
//                'is_vip' => true,
//            ],
//            [
//                'name' => 'DO IT YOURSELF (ЛЮБИТЕЛЯМ СТРОИТЬ)',
//                'is_vip' => false,
//            ],
//            [
//                'name' => 'DO IT YOURSELF (ЛЮБИТЕЛЯМ СТРОИТЬ)',
//                'is_vip' => true,
//            ],
//            [
//                'name' => 'GAME ZONE (НАСТОЯЩИМ ГЕЙМЕРАМ)',
//                'is_vip' => false,
//            ],
//            [
//                'name' => 'GAME ZONE (НАСТОЯЩИМ ГЕЙМЕРАМ)',
//                'is_vip' => true,
//            ],
//        ];
//
//        $this->createRecords(Models\GiftCategory::class, $data);
//    }
//
//    private function createGiftCategoryTypes(): void
//    {
//        $data = [
//            [
//                'gift_category_id' => 1,
//                'gift_type_id' => 1,
//            ],
//            [
//                'gift_category_id' => 1,
//                'gift_type_id' => 2,
//            ],
//            [
//                'gift_category_id' => 2,
//                'gift_type_id' => 1,
//            ],
//            [
//                'gift_category_id' => 2,
//                'gift_type_id' => 3,
//            ],
//            [
//                'gift_category_id' => 3,
//                'gift_type_id' => 4,
//            ],
//            [
//                'gift_category_id' => 3,
//                'gift_type_id' => 5,
//            ],
//            [
//                'gift_category_id' => 4,
//                'gift_type_id' => 4,
//            ],
//            [
//                'gift_category_id' => 4,
//                'gift_type_id' => 5,
//            ],
//            [
//                'gift_category_id' => 5,
//                'gift_type_id' => 6,
//            ],
//            [
//                'gift_category_id' => 5,
//                'gift_type_id' => 7,
//            ],
//            [
//                'gift_category_id' => 6,
//                'gift_type_id' => 6,
//            ],
//            [
//                'gift_category_id' => 6,
//                'gift_type_id' => 7,
//            ],
//        ];
//
//        $this->createRecords(Models\GiftCategoryType::class, $data);
//    }
}
