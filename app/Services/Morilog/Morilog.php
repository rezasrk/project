<?php


namespace App\Services\Morilog;

class Morilog
{
    /**
     * Convert Gregorian to jalali date
     * @param  $datetime
     * @return string
     */
    public function gregorianToJalali($datetime, $format = 'Y/m/d')
    {
        return jdate($datetime)->format($format);
    }

    /**
     * Convert Jalali To Gregorian date
     *
     * @param datetime $date
     * @param string $delimiter
     * @param string $glue
     * @return void
     */
    public function jalaliToGregorian($date, $delimiter = '/', $glue = '-')
    {
        $dt = explode($delimiter, $date);

        if (is_array($dt) && count($dt) == 3) {
            $jalali = \Morilog\Jalali\CalendarUtils::toGregorian($dt[0], $dt[1], $dt[2]);
            $jalali[1] = strlen($jalali[1]) == 1 ? '0' . $jalali[1] : $jalali[1];
            $jalali[2] = strlen($jalali[2]) == 1 ? '0' . $jalali[2] : $jalali[2];
            return implode($glue, $jalali);
        }

        return null;
    }

    public function jdate()
    {
        return Jdate();
    }

    public static function morilog()
    {
        return new static();
    }
}
