<?php

namespace LBM\ExtensionBundle\Entity;

class LbmDate {

    protected $calendar      = '';
    protected $day_week      = array('', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
    protected $day_week_en   = array('', 'Monday','Tuesday', 'Wednesday','Thursday','Friday','Saturday','Sunday' );
    protected $month_name    = array('01' => 'Janvier', '02' => 'Février', '03' => 'Mars', '04' => 'Avril', '05' => 'Mai', '06' => 'Juin', '07' => 'Juillet', '08' => 'Août', '09' => 'Septembre', '10' => 'Octobre','11' =>  'Novembre', '12' => 'Décembre');
    protected $month_name_en = array('01' =>  'January', '02' =>'February', '03' =>'Mars', '04' =>'April','05' => 'May','06' => 'June', '07' =>'July', '08' =>'August', '09' =>'September', '10' =>'October', '11' =>'November','12' => 'December');
    protected $lang          = 'en';


    public function __construct($date_ref = null, $lang = null) {

        if(isset($_SESSION['_sf2_attributes']['_locale'])) {
            $lang = $_SESSION['_sf2_attributes']['_locale'];
        } else {
            $lang = 'fr';
        }


        if(!$date_ref) $date_ref = date('Y-m-d');
        $element        = explode('-', $date_ref);
        $this->date_ref = $date_ref;
        $this->year     = $element[0];
        $this->month    = $element[1];
        $this->day      = $element[2];
        $this->lang     = $lang;
    }

    public function getDayName($day) {
        $lang = $this->lang;
        if($lang == 'fr') return strtolower($this->day_week[$day]);
        if($lang == 'en') return strtolower($this->day_week_en[$day]);
        return null;
    }


    public function getDateRef() {
        return $this->date_ref;
    }

    public function getYearRef() {
        return $this->year;
    }

    public function getMonthRef() {
        return $this->month;
    }

    public function getDateStartWeek() {
        // Calcul de l'écart entre le jour de $day et le lundi (=1)
        $rel = 1 - date('N', strtotime ($this->date_ref));
        //calcul du lundi avec cet écart
        $monday = date('Y-m-d', strtotime("$rel days", strtotime($this->date_ref)));
        return $monday;
    }

    public function getDateEndWeek() {
        $rel = 7 - date('N', strtotime ($this->date_ref));
        //calcul du lundi avec cet écart
        $sunday = date('Y-m-d', strtotime("$rel days", strtotime($this->date_ref)));
        return $sunday;
    }

    public function getFirstMondayFromMonth() {
        // Calcul de l'écart entre le jour de $day et le lundi (=1)
        $rel = 1 - date('N', strtotime ($this->getStartMonth()));
        //calcul du lundi avec cet écart
        $monday = date('Y-m-d', strtotime("$rel days", strtotime($this->getStartMonth())));
        return $monday;
    }

    public function getLastSundayFromMonth() {
        $rel = 7 - date('N', strtotime ($this->getEndMonth()));
        //calcul du lundi avec cet écart
        $sunday = date('Y-m-d', strtotime("$rel days", strtotime($this->getEndMonth())));
        return $sunday;
    }

    public function getNumberDate($date) {
        return date('d', strtotime($date));
    }

    /**
     *
     * monday = 1;
     *
     */
    public function getDayWeekNumber() {
        $day = date('N', strtotime ($this->getDateRef()));
        return $day;
    }

    public function getNumberWeek() {
        return date('W', strtotime($this->date_ref));
    }

    public function getStartMonth() {
        return $this->year.'-'.$this->month.'-01';
    }

    public function getEndMonth() {
        $lastday = date('t', strtotime($this->date_ref));
        return $this->year.'-'.$this->month.'-'.$lastday;
    }

    public function getNextDate() {
        return date('Y-m-d', strtotime($this->date_ref.", +1 day"));
    }

    public function getPrevDate() {
        return date('Y-m-d', strtotime($this->date_ref.", -1 day"));
    }

    public function getNextMonth() {

        $next_Y = $this->year;
        $next_m = $this->month+1;

        if($next_m<10) $next_m = '0'.$next_m;
        if($next_m == 13) {
            $next_m = '01';
            $next_Y = $next_Y+1;
        }
        return $next_Y.'-'.$next_m.'-01';
    }

    public function getPrevMonth() {

        $prev_Y = $this->year;
        $prev_m = $this->month-1;

        if($prev_m<10) $prev_m = '0'.$prev_m;
        if($prev_m == 0) {
            $prev_m = 12;
            $prev_Y = $prev_Y-1;
        }

        return $prev_Y.'-'.$prev_m.'-01';
    }

    public function getPrevMonthName() {
        if($this->lang == 'fr') return $this->month_name[date('m', strtotime($this->getPrevMonth()))];
        return strtolower($this->month_name_en[date('m', strtotime($this->getPrevMonth()))]);
    }

    public function getNextMonthName() {
        if($this->lang == 'fr') return $this->month_name[date('m', strtotime($this->getNextMonth()))];
        return strtolower($this->month_name_en[ date('m', strtotime($this->getNextMonth()))]);
    }

    public function getMonthName() {

        if($this->lang == 'fr')  return $this->month_name[date('m', strtotime($this->date_ref))];
        return strtolower($this->month_name_en[date('m', strtotime($this->date_ref))]);
    }

    public function getPrevYear() {
        return  date('Y', strtotime($this->getPrevMonth()));

    }

    public function showDateUserFriendly($date = null, $lang = 'fr', $showday = true) {

        if(!$date) $date = $this->getDateRef();
        $verif = explode(' ', $date);
        if(isset($verif[1])) {
            $date = $verif[0];
        }

        $elem  = explode('-', $date);
        $d     = $elem[2];
        $year  = $elem[0];

        $month  = padaCalendar::getMonthName($elem[1], $lang);
        $day    = padaTools::getNameDayOfTheDate($date, $lang);

        if($showday) {
            if($lang == 'fr') {
                $day = padaTools::getNameDayOfTheDate($date, $lang).' ';
            } else {
                $day = padaTools::getNameDayOfTheDate($date, $lang).', ';
            }

        } else {
            $day = '';
        }

        if($lang == 'fr') $string = $day.$d.' '.$month.' '.$year;
        if($lang == 'en') $string = $day.$month.' '.$day.' '.$year;

        return $string;

    }

    public function getLessNday($n) {
        return date('Y-m-d', strtotime($this->getDateRef().", -".$n." day"));
    }

    public function getPlusNday($n) {
        return date('Y-m-d', strtotime($this->getDateRef().", +".$n." day"));
    }


}