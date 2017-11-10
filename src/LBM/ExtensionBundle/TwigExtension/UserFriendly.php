<?php
namespace LBM\ExtensionBundle\TwigExtension;

use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Bundle\TwigBundle\Loader\FilesystemLoader;

class UserFriendly extends \Twig_Extension
{

    protected  $day_week      = array('', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
    protected  $day_week_en   = array('', 'Monday','Tuesday', 'Wednesday','Thursday','Friday','Saturday','Sunday' );
    protected  $month_name    = array('', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
    protected  $month_name_en = array('', 'January', 'February', 'Mars', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('getDateUserFriendy', array($this, 'userFriendy')),
            new \Twig_SimpleFilter('getDayName', array($this, 'dayName')),


        );
    }

    public function userFriendly($date)
    {

        if(isset($_SESSION['_sf2_attributes']['_locale'])) {
            $lang = $_SESSION['_sf2_attributes']['_locale'];
        } else {
            $lang = 'fr';
        }
        
        $current_date = date_create_from_format('Y-m-d', $date);
        $d = date_format($current_date, 'w');
        if($d == 0) $d = 7;

        if($lang == 'en') {
            $day   = $this->day_week_en[$d];
            $month = $this->month_name_en[date_format($current_date, 'n')];
            $new_date = $day.', '.$month.' '.date_format($current_date, 'd').' '.date_format($current_date, 'Y');


        } else {
            $day   = $this->day_week[$d];
            $month = $this->month_name[date_format($current_date, 'n')];
            $new_date = $day.' '.date_format($current_date, 'd').' '.$month.' '.date_format($current_date, 'Y');

        }


        return $new_date;
    }

    public function dayName($d)
    {
        if(!$this->day_week_en[$d]) return $d;
        return strtolower($this->day_week_en[$d]);
    }



    public function getName()
    {
        return 'app_extension';
    }
}