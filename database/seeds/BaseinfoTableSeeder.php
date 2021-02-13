<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
use \App\Models\Supply\Request;

class BaseinfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::unprepared("SET FOREIGN_KEY_CHECKS=0;");
        DB::table('baseinfos')->where('id', '<=', 10000)->delete();
        DB::table('baseinfos')->insert([
            [
                'id' => 1,
                'type' => 'discipline',
                'value' => 'دیسیپلین',
                'parent_id' => 0,
                'user_can_add' => 0,
                'user_can_view' => 1,
                'extra_value' => '',
            ],
            [
                'id' => 2,
                'type' => 'discipline',
                'value' => 'عمومی',
                'parent_id' => 1,
                'user_can_add' => 0,
                'user_can_view' => 1,
                'extra_value' => '',
            ],
            [
                'id' => 3,
                'type' => 'discipline',
                'value' => 'سازه',
                'parent_id' => 1,
                'user_can_add' => 0,
                'user_can_view' => 1,
                'extra_value' => '',
            ],
            [
                'id' => 4,
                'type' => 'discipline',
                'value' => 'تاسیسات',
                'parent_id' => 1,
                'user_can_add' => 0,
                'user_can_view' => 1,
                'extra_value' => '',
            ],
            [
                'id' => 5,
                'type' => 'discipline',
                'value' => 'برق',
                'parent_id' => 1,
                'user_can_add' => 0,
                'user_can_view' => 1,
                'extra_value' => '',
            ],
            [
                'id' => 6,
                'type' => 'discipline',
                'value' => 'معماری',
                'parent_id' => 1,
                'user_can_add' => 0,
                'user_can_view' => 1,
                'extra_value' => '',
            ],
            [
                'id' => 7,
                'type' => 'equipment_unit',
                'value' => 'واحد تجهیزات',
                'parent_id' => 0,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => '',
            ],
            [
                'id' => 8,
                'type' => 'equipment_unit',
                'value' => 'عدد',
                'parent_id' => 7,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => '',
            ],
            [
                'id' => 9,
                'type' => 'equipment_unit',
                'value' => 'کیلو گرم',
                'parent_id' => 7,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => '',
            ],
            [
                'id' => 10,
                'type' => 'equipment_unit',
                'value' => 'متر (طول)',
                'parent_id' => 7,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => '',
            ],
            [
                'id' => 11,
                'type' => 'equipment_unit',
                'value' => 'متر مکعب',
                'parent_id' => 7,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => '',
            ],
            [
                'id' => 12,
                'type' => 'equipment_unit',
                'value' => 'متر مربع',
                'parent_id' => 7,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => '',
            ],
            [
                'id' => 13,
                'type' => 'money_unit',
                'value' => 'واحد پول',
                'parent_id' => 0,
                'user_can_add' => 0,
                'user_can_view' => 1,
                'extra_value' => '',
            ],

            [
                'id' => 15,
                'type' => 'money_unit',
                'value' => 'یورو',
                'parent_id' => 13,
                'user_can_add' => 0,
                'user_can_view' => 1,
                'extra_value' => '',
            ],
            [
                'id' => 16,
                'type' => 'typeAttachment',
                'value' => 'نوع فایل آپلودی',
                'parent_id' => 0,
                'user_can_add' => 0,
                'user_can_view' => 1,
                'extra_value' => '',
            ],
            [
                'id' => 17,
                'type' => 'typeAttachment',
                'value' => 'MRS',
                'parent_id' => 16,
                'user_can_add' => 0,
                'user_can_view' => 1,
                'extra_value' => '',
            ],
            [
                'id' => 18,
                'type' => 'typeAttachment',
                'value' => 'MIV',
                'parent_id' => 16,
                'user_can_add' => 0,
                'user_can_view' => 1,
                'extra_value' => '',
            ],
            [
                'id' => 19,
                'type' => 'typeAttachment',
                'value' => 'MRV',
                'parent_id' => 16,
                'user_can_add' => 0,
                'user_can_view' => 1,
                'extra_value' => '',
            ],
            [
                'id' => 20,
                'type' => 'typeAttachment',
                'value' => 'فاکتور',
                'parent_id' => 16,
                'user_can_add' => 0,
                'user_can_view' => 1,
                'extra_value' => '',
            ],
            [
                'id' => 21,
                'type' => 'equipment_unit',
                'value' => 'لیتر',
                'parent_id' => 7,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => '',
            ],
            [
                'id' => 22,
                'type' => 'equipment_unit',
                'value' => 'اینچ',
                'parent_id' => 7,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => '',
            ],
            [
                'id' => 23,
                'type' => 'equipment_unit',
                'value' => 'برگ',
                'parent_id' => 7,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => '',
            ],

            [
                'id' => 25,
                'type' => 'equipment_unit',
                'value' => 'مجموعه',
                'parent_id' => 7,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => '',
            ],
            [
                'id' => 26,
                'type' => 'equipment_unit',
                'value' => 'بسته',
                'parent_id' => 7,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => '',
            ],
            [
                'id' => 27,
                'type' => 'equipment_unit',
                'value' => 'شاخه',
                'parent_id' => 7,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => '',
            ],

            [
                'id' => 28,
                'type' => 'equipment_unit',
                'value' => 'گالن',
                'parent_id' => 7,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => '',
            ],
            [
                'id' => 29,
                'type' => 'equipment_unit',
                'value' => 'سطل',
                'parent_id' => 7,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => '',
            ],
            [
                'id' => 30,
                'type' => 'equipment_unit',
                'value' => 'متر مربع',
                'parent_id' => 7,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => '',
            ],
            [
                'id' => 31,
                'type' => 'equipment_unit',
                'value' => 'قوطی',
                'parent_id' => 7,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => '',
            ],
            [
                'id' => 32,
                'type' => 'equipment_unit',
                'value' => 'کارتن',
                'parent_id' => 7,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => '',
            ],
            [
                'id' => 33,
                'type' => 'equipment_unit',
                'value' => 'کیسه',
                'parent_id' => 7,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => '',
            ],
            [
                'id' => 34,
                'type' => 'equipment_unit',
                'value' => 'دستگاه',
                'parent_id' => 7,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => '',
            ],
            [
                'id' => 35,
                'type' => 'equipment_unit',
                'value' => 'رول',
                'parent_id' => 7,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => '',
            ],
            [
                'id' => 36,
                'type' => 'equipment_unit',
                'value' => 'رشته',
                'parent_id' => 7,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => '',
            ],
            [
                'id' => 38,
                'type' => 'equipment_unit',
                'value' => 'توپ',
                'parent_id' => 7,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => '',
            ],
            [
                'id' => 39,
                'type' => 'equipment_unit',
                'value' => 'جفت',
                'parent_id' => 7,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => '',
            ],
            [
                'id' => 40,
                'type' => 'equipment_unit',
                'value' => 'حلقه',
                'parent_id' => 7,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => '',
            ],
            [
                'id' => 41,
                'type' => 'equipment_unit',
                'value' => 'دست',
                'parent_id' => 7,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => '',
            ],
            [
                'id' => 42,
                'type' => 'equipment_unit',
                'value' => 'سلول',
                'parent_id' => 7,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => '',
            ],
            [
                'id' => 43,
                'type' => 'equipment_unit',
                'value' => 'بشکه',
                'parent_id' => 7,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => '',
            ],
            [
                'id' => 45,
                'type' => 'money_unit',
                'value' => 'ریال',
                'parent_id' => 13,
                'user_can_add' => 0,
                'user_can_view' => 1,
                'extra_value' => '',
            ],
            [
                'id' => 46,
                'type' => 'defaultId',
                'value' => '---',
                'parent_id' => 0,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => '',
            ],
            [
                'id' => 47,
                'type' => 'unit_requester',
                'value' => 'واحد درخواست کننده',
                'parent_id' => 0,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => '',
            ],
            [
                'id' => 48,
                'type' => 'unit_requester',
                'value' => 'مدیریت' . ' ( 100 ) ',
                'parent_id' => 47,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => json_encode([
                    'code' => '100'
                ]),
            ],
            [
                'id' => 49,
                'type' => 'unit_requester',
                'value' => 'امور قرارداد ها و امور پیمان' . ' ( 101 ) ',
                'parent_id' => 47,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => json_encode([
                    'code' => '101'
                ]),
            ],
            [
                'id' => 50,
                'type' => 'unit_requester',
                'value' => 'روابط عمومی' . ' ( 102 ) ',
                'parent_id' => 47,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => json_encode([
                    'code' => '102'
                ]),
            ],
            [
                'id' => 51,
                'type' => 'unit_requester',
                'value' => 'بازار یابی مناقصات' . ' ( 103 ) ',
                'parent_id' => 47,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => json_encode([
                    'code' => '103'
                ]),
            ],
            [
                'id' => 52,
                'type' => 'unit_requester',
                'value' => 'کنترل و تضمین کیفیت' . ' ( 104 ) ',
                'parent_id' => 47,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => json_encode([
                    'code' => '104'
                ]),
            ],
            [
                'id' => 53,
                'type' => 'unit_requester',
                'value' => 'برنامه ریزی و کنترل پروژه' . ' ( 105 ) ',
                'parent_id' => 47,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => json_encode([
                    'code' => '105'
                ]),
            ],
            [
                'id' => 54,
                'type' => 'unit_requester',
                'value' => 'فنی مهندسی' . ' ( 106 ) ',
                'parent_id' => 47,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => json_encode([
                    'code' => '106'
                ]),
            ],
            [
                'id' => 56,
                'type' => 'unit_requester',
                'value' => 'الکتریکال' . ' ( 107 ) ',
                'parent_id' => 47,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => json_encode([
                    'code' => '107'
                ]),
            ],
            [
                'id' => 57,
                'type' => 'unit_requester',
                'value' => 'ابزار دقیق' . ' ( 108 ) ',
                'parent_id' => 47,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => json_encode([
                    'code' => '108'
                ]),
            ],
            [
                'id' => 58,
                'type' => 'unit_requester',
                'value' => 'سیویل - ص' . ' ( 109 ) ',
                'parent_id' => 47,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => json_encode([
                    'code' => '109'
                ]),
            ],
            [
                'id' => 59,
                'type' => 'unit_requester',
                'value' => 'مکانیکال' . ' ( 110 ) ',
                'parent_id' => 47,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => json_encode([
                    'code' => '110'
                ]),
            ],
            [
                'id' => 60,
                'type' => 'unit_requester',
                'value' => 'تامین تجهیزات داخلی' . ' ( 111 ) ',
                'parent_id' => 47,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => json_encode([
                    'code' => '111'
                ]),
            ],
            [
                'id' => 61,
                'type' => 'unit_requester',
                'value' => 'تامین تجهیزات خارجی' . ' ( 112 ) ',
                'parent_id' => 47,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => json_encode([
                    'code' => '112'
                ]),
            ],
            [
                'id' => 62,
                'type' => 'unit_requester',
                'value' => 'برش' . ' ( 113 ) ',
                'parent_id' => 47,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => json_encode([
                    'code' => '113'
                ]),
            ],
            [
                'id' => 63,
                'type' => 'unit_requester',
                'value' => 'ساخت' . ' ( 114 ) ',
                'parent_id' => 47,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => json_encode([
                    'code' => '114'
                ]),
            ],
            [
                'id' => 64,
                'type' => 'unit_requester',
                'value' => 'دفتر فنی' . ' ( 115 ) ',
                'parent_id' => 47,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => json_encode([
                    'code' => '115'
                ]),
            ],
            [
                'id' => 65,
                'type' => 'unit_requester',
                'value' => 'مصرفی انبار خرید تهران ' . ' ( 116 ) ',
                'parent_id' => 47,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => json_encode([
                    'code' => '116'
                ]),
            ],
            [
                'id' => 66,
                'type' => 'unit_requester',
                'value' => 'مالی' . ' ( 117 ) ',
                'parent_id' => 47,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => json_encode([
                    'code' => '117'
                ]),
            ],
            [
                'id' => 67,
                'type' => 'unit_requester',
                'value' => 'اداری' . ' ( 118 ) ',
                'parent_id' => 47,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => json_encode([
                    'code' => '118'
                ]),
            ],
            [
                'id' => 68,
                'type' => 'unit_requester',
                'value' => 'پشتیبانی' . ' ( 119 ) ',
                'parent_id' => 47,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => json_encode([
                    'code' => '119'
                ]),
            ],
            [
                'id' => 69,
                'type' => 'unit_requester',
                'value' => 'خدماتی' . ' ( 120 ) ',
                'parent_id' => 47,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => json_encode([
                    'code' => '120'
                ]),
            ],
            [
                'id' => 70,
                'type' => 'unit_requester',
                'value' => 'IT' . ' ( 121 ) ',
                'parent_id' => 47,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => json_encode([
                    'code' => '121'
                ]),
            ],
            [
                'id' => 71,
                'type' => 'unit_requester',
                'value' => 'تخصصی مالی' . ' ( 122 ) ',
                'parent_id' => 47,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => json_encode([
                    'code' => '122'
                ]),
            ],
            [
                'id' => 72,
                'type' => 'unit_requester',
                'value' => 'سازه' . ' ( 123 ) ',
                'parent_id' => 47,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => json_encode([
                    'code' => '123'
                ]),
            ],
            [
                'id' => 73,
                'type' => 'unit_requester',
                'value' => 'نصب' . ' ( 124 ) ',
                'parent_id' => 47,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => json_encode([
                    'code' => '124'
                ]),
            ],
            [
                'id' => 74,
                'type' => 'unit_requester',
                'value' => 'سیویل - غ' . ' ( 125 ) ',
                'parent_id' => 47,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => json_encode([
                    'code' => '125'
                ]),
            ],
            [
                'id' => 75,
                'type' => 'unit_requester',
                'value' => 'ماشین آلات و تجهیزات تولید' . ' ( 126 ) ',
                'parent_id' => 47,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => json_encode([
                    'code' => '126'
                ]),
            ],
            [
                'id' => 76,
                'type' => 'unit_requester',
                'value' => 'ماشین آلات' . ' ( 127 ) ',
                'parent_id' => 47,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => json_encode([
                    'code' => '127'
                ]),
            ],
            [
                'id' => 77,
                'type' => 'unit_requester',
                'value' => 'قطعات یدکی راه‌اندازی' . ' ( 128 ) ',
                'parent_id' => 47,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => json_encode([
                    'code' => '128'
                ]),
            ],
            [
                'id' => 78,
                'type' => 'typeAttachment',
                'value' => 'مدارک فنی',
                'parent_id' => 16,
                'user_can_add' => 0,
                'user_can_view' => 1,
                'extra_value' => '',
            ],
            [
                'id' => 79,
                'type' => 'unit_requester',
                'value' => 'مصرفی انبار سایت ' . ' ( 200 ) ',
                'parent_id' => 47,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => json_encode([
                    'code' => '200'
                ]),
            ],
            [
                'id' => 80,
                'type' => 'discipline',
                'value' => 'مکانیکال',
                'parent_id' => 1,
                'user_can_add' => 0,
                'user_can_view' => 1,
                'extra_value' => '',
            ],
            [
                'id' => 81,
                'type' => 'discipline',
                'value' => 'پایپینگ',
                'parent_id' => 1,
                'user_can_add' => 0,
                'user_can_view' => 1,
                'extra_value' => '',
            ],
            [
                'id' => 82,
                'type' => 'condition_request',
                'value' => 'وضعیت درخواست ها',
                'parent_id' => 0,
                'user_can_add' => 0,
                'user_can_view' => 1,
                'extra_value' => '',
            ],
            [
                'id' => 83,
                'type' => 'condition_request',
                'value' => 'ارسال شده',
                'parent_id' => 82,
                'user_can_add' => 0,
                'user_can_view' => 1,
                'extra_value' => json_encode([
                    'color' => '#dddddd',
                    'status' => Request::STATUS['SN'],
                    'permission' => 'send-requests'
                ]),
            ],
            [
                'id' => 84,
                'type' => 'condition_request',
                'value' => 'تایید شده',
                'parent_id' => 82,
                'user_can_add' => 0,
                'user_can_view' => 1,
                'extra_value' => json_encode([
                    'color' => '#dddddd',
                    'status' => Request::STATUS['AC'],
                    'permission' => 'accept-requests'
                ]),
            ],
            [
                'id' => 86,
                'type' => 'condition_request',
                'value' => 'واحد مالی',
                'parent_id' => 82,
                'user_can_add' => 0,
                'user_can_view' => 1,
                'extra_value' => json_encode([
                    'color' => '#dddddd',
                    'status' => '',
                    'permission' => 'unit-financial-request'
                ]),
            ],
            [
                'id' => 88,
                'type' => 'condition_request',
                'value' => 'رد شده',
                'parent_id' => 83,
                'user_can_add' => 0,
                'user_can_view' => 1,
                'extra_value' => json_encode([
                    'color' => '#dddddd',
                    'status' => Request::STATUS['RJ'],
                    'permission' => 'reject-requests'
                ]),
            ],
            [
                'id' => 89,
                'type' => 'condition_request',
                'value' => 'مسدود شده',
                'parent_id' => 83,
                'user_can_add' => 0,
                'user_can_view' => 1,
                'extra_value' => json_encode([
                    'color' => '#dddddd',
                    'status' => Request::STATUS['BL'],
                    'permission' => 'block-requests'
                ]),
            ],
            [
                'id' => 90,
                'type' => 'type_request',
                'value' => 'نوع درخواست',
                'parent_id' => 0,
                'user_can_add' => 0,
                'user_can_view' => 1,
                'extra_value' => '',
            ],
            [
                'id' => 91,
                'type' => 'type_request',
                'value' => 'تامین در محل',
                'parent_id' => 90,
                'user_can_add' => 0,
                'user_can_view' => 1,
                'extra_value' => json_encode([
                    'color' => '#ffrfrfr'
                ]),
            ],
            [
                'id' => 92,
                'type' => 'type_request',
                'value' => 'تامین',
                'parent_id' => 90,
                'user_can_add' => 0,
                'user_can_view' => 1,
                'extra_value' => json_encode([
                    'color' => '#ffrfrfr'
                ]),
            ],
            [
                'id' => 93,
                'type' => 'type_request',
                'value' => 'از قبل تامین شده',
                'parent_id' => 90,
                'user_can_add' => 0,
                'user_can_view' => 1,
                'extra_value' => json_encode([
                    'color' => '#ffrfrfr'
                ]),
            ],
            [
                'id' => 94,
                'type' => 'condition_request',
                'value' => 'اضافه کردن درخواست به کاربر',
                'parent_id' => 83,
                'user_can_add' => 0,
                'user_can_view' => 1,
                'extra_value' => json_encode([
                    'color' => '#dddddd',
                    'status' => '',
                    'permission' => 'assign-request'
                ]),
            ],
            [
                'id' => 95,
                'type' => 'condition_request',
                'value' => 'تامین شده',
                'parent_id' => 83,
                'user_can_add' => 0,
                'user_can_view' => 1,
                'extra_value' => json_encode([
                    'color' => '#dddddd',
                    'status' => '',
                    'permission' => 'supplied-requests'
                ]),
            ],
            [
                'id' => 96,
                'type' => 'equipment_unit',
                'value' => 'پالت',
                'parent_id' => 7,
                'user_can_add' => 0,
                'user_can_view' => 0,
                'extra_value' => '',
            ],
            [
                'id' => 97,
                'type' => 'condition_request',
                'value' => 'تامین ناقص',
                'parent_id' => 82,
                'user_can_add' => 0,
                'user_can_view' => 1,
                'extra_value' => json_encode([
                    'color' => '#dddddd',
                    'status' => '',
                    'permission' => 'supply-unfinished'
                ]),
            ],
        ]);
        DB::unprepared("SET FOREIGN_KEY_CHECKS=1;");
        DB::unprepared("ALTER TABLE baseinfos AUTO_INCREMENT = 10000");
    }
}
