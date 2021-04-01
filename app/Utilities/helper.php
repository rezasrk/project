<?php

/**
 * convert jalali to miladi date
 *
 * @param $date
 * @param string $delimiter
 * @param string $glue
 * @return string|null
 */
function jalaliToMiladi($date, $delimiter = '/', $glue = '-')
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

/**
 * convert miladi to jalali date\
 *
 * @param $date
 * @param string $delimiter
 * @param string $glue
 * @return string|null
 */
function miladiToJalali($date, $delimiter = '-', $glue = '/')
{
    $dt = explode($delimiter, $date);
    if (is_array($dt) && count($dt) == 3) {
        $miladi = \Morilog\Jalali\CalendarUtils::toJalali($dt[0], $dt[1], $dt[2]);
        $miladi[1] = strlen($miladi[1]) == 1 ? '0' . $miladi[1] : $miladi[1];
        $miladi[2] = strlen($miladi[2]) == 1 ? '0' . $miladi[2] : $miladi[2];
        return implode($glue, $miladi);
    }
    return null;
}

/**
 * get data from baseinfos table
 *
 * @param $type
 * @return array
 */
function getBaseinfo($type)
{
    return \App\Models\Baseinfo::whereType($type)->where('parent_id', '<>', '0')->get()->pluck('value', 'id')->toArray();
}

/**
 * check national code truth ?
 *
 * @param $code
 * @return bool
 */
function checkNationalCode($code)
{
    if (!preg_match('/^[0-9]{10}$/', $code))
        return false;
    for ($i = 0; $i < 10; $i++)
        if (preg_match('/^' . $i . '{10}$/', $code))
            return false;
    for ($i = 0, $sum = 0; $i < 9; $i++)
        $sum += ((10 - $i) * intval(substr($code, $i, 1)));
    $ret = $sum % 11;
    $parity = intval(substr($code, 9, 1));
    if (($ret < 2 && $ret == $parity) || ($ret >= 2 && $ret == 11 - $parity))
        return true;
    return false;
}

/**
 * convert persian and arabic number to english number
 *
 * @param $string
 * @return mixed
 */
function persianToEnglishNumber($string)
{
    $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١', '٠'];

    $num = range(0, 9);
    $convertedPersianNums = str_replace($persian, $num, $string);
    $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);

    return $englishNumbersOnly;
}


/**
 * adapter asset for custom asset
 *
 * @param $url
 * @return string
 */
function customAsset($url)
{
    return asset(env('PREFIX_FRONT') . $url);
}

/**
 * Get information current project
 *
 * @return \App\Models\Project
 */
function projectInf()
{
    return session('projectInformation');
}

/*
 * Get project information
 */
function getProjects()
{
    return \App\Models\Project::query()->where('is_active', 1)->get();
}

function setProjectInf($project)
{
    session(['projectInformation' => $project]);
}



