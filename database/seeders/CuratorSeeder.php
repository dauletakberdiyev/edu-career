<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Registration;
use App\Models\Term;
use App\Models\User;
use Illuminate\Database\Seeder;

class CuratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            'Air Astana',
            'SoftPark',
            'SDU',
            'SDU',
            'COTTON',
            'SDU',
            'Skillset Schools',
            'IT and Law science center',
            '',
            'InnLab',
            'IT and Law science center',
            'Alldata',
            'SDU',
            'Центр развития и роста человеческих ресурсов «Adam labs»',
            'SDU',
            'ИП code4u',
            'ИП Kurmashev Studio',
            'SDU',
            'SDU',
            'SDU',
            'Yandex',
            'Tekled',
            'SDU',
            'AMOZ (АНПЗ)',
            'РГКП (республиканское государственное казенное предприятие)',
            'SDU',
            'NLS Kazakhstan',
            'Белый ветер',
            'ABM Co',
            'Oralbek',
            'Управдом Казахстан',
            'CifrON',
            'CifrON',
            'Morrison Academy',
            'SDU',
            'SDU',
            'Glovo Kazakhstan ',
            'InnLab',
            'Управдом Казахстан ',
            'NLS Kazakhstan',
            'РГКП (республиканское государственное казенное предприятие)',
            'SDU',
            'SDU',
            'Мобайл Телеком-Сервис (Объединенная Компания Tele2/ALTEL)',
            'Hero study',
            'IT Business Group',
            'ABM Co',
            'SDU',
            'ABM Co',
            'SDU',
            'SDU',
            'ABM Co',
            '7Generation LLC',
            'SDU',
            'ВанОнГоу Казахстан',
            'IT and Law science center',
            'InnLab',
            'Управдом Казахстан',
            'Petrel AI',
            'SDU',
            'Raketa Soft from Choco Family',
            'First Credit Bureau (FCB)',
            'ВЕРИГРАМ',
            'SDU',
            'TarlanPayments',
            'KaspiMunaiGaz',
            'Morrison Academy',
            'Halyk Bank',
            'Alldata',
            'SDU',
            'Region LLC',
            'Payda',
            'Morrison Academy',
            'BilimBer',
            'SDU',
            'АО First Heartland Jusan Bank',
            'Mediana Services Limited(Aktau)',
            'Technodom',
            'ABM Co',
            'АО Казахтелеком (Kazakhtelecom JSC)',
            'SDU',
            'ВЕРИГРАМ',
            'AMOZ (АНПЗ)',
            'Qazaqsoft',
            'STRONG',
            'SDU',
            'Item Technology',
            'Qazaqsoft',
            'SDU',
            'SDU ',
            '«СТОФАРМ»',
            'Qazaqsoft',
            'ICS',
            'ICS',
            '«Энергосистема»',
            'First Heartland Jusan Bank',
            'Qazaqsoft',
            'BusinessProcess.kz',
            'SDU',
            'SDU',
            'ABM Co',
            'Bass technology ',
            'ABM Co',
            'Technopark',
            'SDU',
            'SDU',
            'АО Halyk Bank',
            'Region LLC',
            'Athena Plus',
            'Tarlan Payments',
            'ABM Co',
            'A2DATA',
            'IT and Law science center',
            'ИП Болатов',
            'A2DATA',
            'SDU',
            'SDU',
            'ИП «КАИРЛИЕВ АЛИБИ ДЖАЛГАСОВИЧ»',
            'Payda',
            'АО «Кселл»',
            'Crystal Spring',
            'SDU',
            'IT Business Group',
            'Morrison Academy',
            'BusinessProcess.kz',
            'SDU',
            'First Heartland Jusan Bank',
            '«TELSE»',
            'SDU BETA',
            'SDU',
            'ТрансКом',
            'ABC Design',
            'SDU BETA',
            'ABM Co',
            'Telse',
            'ИП Lanmaster.kz',
            'SDU BETA',
            'TS Property Management',
            'SDU',
            'АО Атырауская ТЭЦ',
            'First Heartland Jusan Bank',
            'A2DATA',
            'Platonus',
            'SDU',
            'ИП Atlant Soft',
            'SDU',
            'SDU',
            'SDU',
            'Platonus',
            'КаР-Тел',
            'greetgo!',
            'Air Astana',
            'Softrack',
            'SDU',
            'ONE Technologies',
            'greetgo!',
            'Alldata',
            'АО Jusan Mobile',
            'SDU',
            'КАИРЛИЕВ АЛИБИ ДЖАЛГАСОВИЧ',
            'SDU',
            'SDU',
            'SDU',
            'Кепіл-Консалтинг',
            'Kaspi Bank',
            'SDU',
            'Halyk Bank',
            'STRONG te.am',
            'ABM Co',
            'SDU ',
            'Qazaqsoft',
            'InnLab',
            'Continent Invest Group',
            'SDU',
            'First Credit Bureau',
            'SDU',
            'SDU',
            'BusinessProcess.kz',
            'Shonbay INC',
            'Sergek Development',
            'ИП Болатов',
            'SDU',
            'ВЕРИГРАМ',
            'SDU',
            'Qazaqsoft',
            'SDU',
            'Alma Medical Group',
            'ГКП Горводоканал',
            'Continent Invest Group',
            'SDU',
            'alabs.team',
            'Mediana Services Limited(Aktau)',
            'SDU',
            'ReLive Intelligence',
            'АО Halyk Bank',
            'Iceberg-group',
            'SDU',
            'IT and Law science center',
            'КГУ центр информационных технологий',
            'Technopark',
            'Regional medical consultion group',
            '',
            'Future Power Solutions',
            'SDU',
            'РАМС-Казахстан',
            'SDU',
            'Apple seed',
            'IT and Law science center',
            'IT and Law science center',
            'ICS',
            'ICS',
            'ICS',
            '',
            'KazDream Management',
            'IT and law science center',
            'IT and law science center',
        ];

        $ids = [
            '190107020',
            '190103056',
            '210107189',
            '200119001',
            '200113010',
            '200113004',
            '200113001',
            '200103074',
            '190302001',
            '190113004',
            '190109014',
            '190109013',
            '190109010',
            '190109009',
            '190109008',
            '190109007',
            '190109006',
            '190109005',
            '190109003',
            '190109002',
            '190107108',
            '190107105',
            '190107103',
            '190107099',
            '190107098',
            '190107095',
            '190107091',
            '190107088',
            '190107087',
            '190107084',
            '190107077',
            '190107076',
            '190107074',
            '190107067',
            '190107066',
            '190107065',
            '190107057',
            '190107055',
            '190107054',
            '190107052',
            '190107050',
            '190107047',
            '190107045',
            '190107044',
            '190107043',
            '190107041',
            '190107037',
            '190107036',
            '190107034',
            '190107032',
            '190107030',
            '190107029',
            '190107027',
            '190107025',
            '190107024',
            '190107021',
            '190107019',
            '190107017',
            '190107016',
            '190107012',
            '190107010',
            '190107008',
            '190107007',
            '190107005',
            '190107003',
            '190107001',
            '190103494',
            '190103491',
            '190103486',
            '190103485',
            '190103484',
            '190103483',
            '190103482',
            '190103481',
            '190103479',
            '190103476',
            '190103471',
            '190103470',
            '190103468',
            '190103466',
            '190103459',
            '190103458',
            '190103455',
            '190103452',
            '190103449',
            '190103448',
            '190103445',
            '190103440',
            '190103438',
            '190103436',
            '190103434',
            '190103433',
            '190103431',
            '190103425',
            '190103422',
            '190103419',
            '190103416',
            '190103414',
            '190103412',
            '190103411',
            '190103407',
            '190103402',
            '190103400',
            '190103397',
            '190103394',
            '190103389',
            '190103388',
            '190103385',
            '190103383',
            '190103378',
            '190103376',
            '190103374',
            '190103372',
            '190103371',
            '190103368',
            '190103360',
            '190103348',
            '190103347',
            '190103345',
            '190103344',
            '190103335',
            '190103328',
            '190103325',
            '190103322',
            '190103318',
            '190103315',
            '190103314',
            '190103309',
            '190103308',
            '190103307',
            '190103298',
            '190103297',
            '190103287',
            '190103281',
            '190103278',
            '190103277',
            '190103276',
            '190103273',
            '190103268',
            '190103262',
            '190103247',
            '190103244',
            '190103239',
            '190103238',
            '190103236',
            '190103235',
            '190103224',
            '190103223',
            '190103219',
            '190103217',
            '190103216',
            '190103215',
            '190103211',
            '190103209',
            '190103205',
            '190103200',
            '190103199',
            '190103191',
            '190103188',
            '190103185',
            '190103178',
            '190103175',
            '190103171',
            '190103158',
            '190103156',
            '190103155',
            '190103154',
            '190103149',
            '190103140',
            '190103138',
            '190103136',
            '190103135',
            '190103134',
            '190103123',
            '190103116',
            '190103109',
            '190103102',
            '190103099',
            '190103094',
            '190103084',
            '190103081',
            '190103071',
            '190103066',
            '190103063',
            '190103062',
            '190103061',
            '190103057',
            '190103052',
            '190103050',
            '190103048',
            '190103044',
            '190103043',
            '190103041',
            '190103040',
            '190103039',
            '190103027',
            '190103021',
            '190103019',
            '190103003',
            '190103001',
            '190107031',
            '190103248',
            '190103196',
            '190103321',
            '190103125',
            '190109012',
            '190103213',
            '190103339',
            '190103340',
            '190103152',
            '190103267',
            '190103300',
            '190107022',
            '190103197',
            '190103450',
            '190107089',
        ];

        for ($i = 0; $i < count($ids); ++$i) {
            if ($companies[$i] == '' || $companies[$i] == 'SDU') {
                continue;
            }

            $company = Company::where('name', 'like', '%'.$companies[$i].'%')->get();
            $user = User::where('email', 'like', '%'.$ids[$i].'%')->first();
            $term = Term::where('active', '=', 1)->first();

            if ($user == null) {
                continue;
            }

            foreach ($company as $c) {
                if ($c == null) {
                    continue;
                }
                if ($user->registration != null) {
                    $registration = $user->registration;
                } else {
                    $registration = new Registration();
                }

                $registration->user_id = $user->id;
                $registration->status = 1;
                $registration->term_id = Term::where('active', '=', 1)->first()->id;
                $registration->company_id = $c->id;
                $registration->save();
            }
        }
    }
}
