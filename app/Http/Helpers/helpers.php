<?php

/**
 * Write code on Method
 *
 * @return response()
 */
if (! function_exists('menuActive')) {
    function menuActive($routeName)
    {
        $class = 'active';
        
        if (is_array($routeName)) {
            foreach ($routeName as $key => $value) {
                if (request()->routeIs($value)) {
                    return $class;
                }
            }
        } elseif (request()->routeIs($routeName)) {
            return $class;
        }
    }
}

if (! function_exists('menuShow')) {
    function menuShow($routeName)
    {
        $class = 'show';
        
        if (is_array($routeName)) {
            foreach ($routeName as $key => $value) {
                if (request()->routeIs($value)) {
                    return $class;
                }
            }
        } elseif (request()->routeIs($routeName)) {
            return $class;
        }
    }
}

if (!function_exists('generateRandomString')) {
    function generateRandomString($length = 8) {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charsLength = strlen($chars);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $chars[rand(0, $charsLength - 1)];
        }
        return $randomString;
    }
}

if (!function_exists('generateRandomNumber')) {
    function generateRandomNumber($length = 6) {
        $chars = '0123456789';
        $charsLength = strlen($chars);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $chars[rand(0, $charsLength - 1)];
        }
        return $randomString;
    }
}

if (!function_exists('sendResponse')) {
    function sendResponse($data, $message = 'SUCCESS', $status = 201) {
        $format = [
            'data' => $data,
            'message' => $message
        ];
        return response()->json($format, $status);
    }
}

if (!function_exists('formatIndonesiaDate')) {
    function formatIndonesiaDate($dateFormat) {
        $month = date('m', strtotime($dateFormat));
        $monthInd = formatIndonesiaMonth($month);
        $date = date('d', strtotime($dateFormat));
        $year = date('Y', strtotime($dateFormat));
        $new = $date . ' ' . $monthInd . ' ' . $year;

        return $new;
    }
}

if (!function_exists('formatIndonesiaMonth')) {
    function formatIndonesiaMonth($month) {
        $newMonth = "";
        $split = str_split($month);
        if (count($split) > 1) {
            if ($split[0] == 0) {
                $month = $split[1];
            } else {
                $month = implode('', $split);
            }
        }
        switch ($month) {
            case '1':
                $newMonth = 'Januari';
                break;
            case '2':
                $newMonth = 'Febuari';
                break;
            case '3':
                $newMonth = 'Maret';
                break;
            case '4':
                $newMonth = 'April';
                break;
            case '5':
                $newMonth = 'Mei';
                break;
            case '6':
                $newMonth = 'Juni';
                break;
            case '7':
                $newMonth = 'Juli';
                break;
            case '8':
                $newMonth = 'Agustus';
                break;
            case '9':
                $newMonth = 'September';
                break;
            case '10':
                $newMonth = 'Oktober';
                break;
            case '11':
                $newMonth = 'November';
                break;
            case '12':
                $newMonth = 'Desember';
                break;
            default:
                $newMonth = 'Tidak Ter Generate';
                break;
        }

        return $newMonth;
    }
}

if (!function_exists('formatIndonesiaDay')) {
    function formatIndonesiaDay($date) {
        $days = date('D', strtotime($date));
        switch (strtolower($days)) {
            case 'sun':
                $day = 'Minggu';
                break;
            case 'mon':
                $day = 'Senin';
                break;
            case 'tue':
                $day = 'Selasa';
                break;
            case 'wed':
                $day = 'Rabu';
                break;
            case 'thu':
                $day = 'Kamis';
                break;
            case 'fri':
                $day = 'Jumat';
                break;
            case 'sat':
                $day = 'Sabtu';
                break;
            
            default:
                $day = 'Belum Ter Generate';
                break;
        }

        return $day;
    }
}