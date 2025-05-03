<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* 
 * Project Name : Alumni Managment System
 * Project Description :  Alumni Managment System for IER
 * Author : Animesh Chadnra Bain
 * Author's email : animeshwp@live.com
 * Project version : 1.0
 */


function get_report_name($id)
{
    $ci = &get_instance();
    $ci->load->model('components/reports/Mod_reports_doctor');
    return $ci->Mod_reports_doctor->view_reports_name_accd_to_id($id);
}


function get_division_name($id)
{
    $ci = &get_instance();
    $ci->load->model('division/Mod_division_admin', 'divisionModelAdmin');
    return $ci->divisionModelAdmin->get_division_name_acc2_id($id);
}


function get_district_name($id)
{
    $ci = &get_instance();
    $ci->load->model('district/Mod_district_for_admin', 'districtModelAdmin');
    return $ci->districtModelAdmin->get_district_name_acc2_id($id);
}


function get_widget_name($id)
{
    $ci = &get_instance();
    $ci->load->model('mod_widget');
    return $ci->mod_widget->get_widget_acc2_id($id);
}

function get_widget_data_acc_to_widget_item_id($id)
{
    $ci = &get_instance();
    $ci->load->model('home/Mod_widgetsdata');
    return $ci->Mod_widgetsdata->get_widget_data_acc_to_widget_item_id($id);
}

function admin_temp_path()
{
    $ci = &get_instance();
    $admin_temp_path = base_url() . "application/views/admin";
    return $admin_temp_path;
}

function site_title()
{
    $ci =& get_instance();
    $site_title = "Admin Panel :: IERAA";
    return $site_title;
}

function site_info()
{
    $ci =& get_instance();
    $site_info = "Institute of Education Research institution Alumni Association (IERAA)";
    return $site_info;
}



function gov_info()
{
    $ci =& get_instance();
    $site_name = "It's Different in a Solutions";
    return $site_name;
}

function minister_info()
{
    $ci =& get_instance();
    $site_name = "It's Different in a Solutions";
    return $site_name;
}

function admin_url()
{
    $ci =& get_instance();
    $admin_url = base_url() . "application/views/templates/admin/";
    return $admin_url;
}

function home_url()
{
    $ci =& get_instance();
    $home_url = base_url() . "home/";
    return $home_url;
}

function getMenuIdNameAsArray()
{
    $ci = &get_instance();
    $ci->load->Model('admin/mod_menu', 'mod_menu');
    return $ci->mod_menu->getMenuIdNameAsArray();
}


function getMenuname_acc_to_id($id)
{
    $ci = &get_instance();
    $ci->load->Model('admin/mod_menu', 'mod_menu');
    return $ci->mod_menu->getMenuname_acc_to_id($id);
}


function auth_admin()
{
    $ci =& get_instance();
    $auth_admin = base_url() . "admin/";
    return $auth_admin;
}

function getSubMenuIdNameAsArray()
{
    $ci = &get_instance();
    $ci->load->Model('home/mod_submenu', 'mod_submenu');
    return $ci->mod_submenu->getSubMenuIdNameAsArray();
}


function getMenuiIdformSubMenu()
{
    $ci = &get_instance();
    $ci->load->Model('home/mod_submenu', 'mod_submenu');
    return $ci->mod_submenu->getMenuiIdformSubMenu();
}


function returnsubmenuTure($id)
{
    $ci = &get_instance();
    $ci->load->Model('home/mod_submenu', 'mod_submenu');
    return $ci->mod_submenu->returnsubmenuTure($id);
}


function returnsubmenuNameArray($id)
{
    $ci = &get_instance();
    $ci->load->Model('home/mod_submenu', 'mod_submenu');
    return $ci->mod_submenu->returnsubmenuNameArray($id);
}


function institutionInfo()
{
    $ci = &get_instance();
    $ci->load->Model('home/institution', 'institution');
    return $ci->institution->institutionInfo();
}

function view_widgetsdatafront($widgetsdata_info)
{
    $ci = &get_instance();
    $ci->load->Model('home/Mod_widgetsdata', 'Mod_widgetsdata');
    return $ci->Mod_widgetsdata->view_widgetsdatafront($widgetsdata_info);
}


function homeMenu()
{
    $homeMenu = "";
    $ci = &get_instance();
    $ci->homeMenu = array(
        '1' => "1",
        '2' => "2",
        '3' => "3",
        '4' => "4",
        '5' => "5",
        '6' => "6",
        '7' => "7",
        '8' => "8",
        '9' => "9",
        '10' => "10",
        '11' => "11",
        '12' => "12",
    );

    return $ci->homeMenu;
}

function imagebannerlocation()
{
    $imgbnrloc = "";
    $ci = &get_instance();
    $ci->imgbnrloc = array(
        '1' => "Middle Top",
        '2' => "Middle Bottom",
        '3' => "Top Left",
        '4' => "Top Left Bottom",
        '5' => "Bottom Top",
        '6' => "Bottom"
    );

    return $ci->imgbnrloc;
}


function typeOfJobs()
{
    $typeOfJobs = "";
    $ci = &get_instance();
    $ci->typeOfJobs = array(
        '1' => "Government",
        '2' => "United Nations",
        '3' => "NGO",
        '4' => "Media",
        '5' => "Others"
    );

    return $ci->typeOfJobs;
}


function pagelocation()
{
    $pagelocation = "";
    $ci = &get_instance();
    $ci->pagelocation = array(
        '1' => "Home Page",
        '2' => "News Page",
        '3' => "Event Page",
        '4' => "Career Page",
        '5' => "Galary Page",
        '6' => "Committee Page",
        '7' => "Other Page"
    );

    return $ci->pagelocation;
}


function menulocation()
{
    $menulocation = "";
    $ci = &get_instance();
    $ci->menulocation = array(
        '1' => "Top",
        '2' => "Left"
    );

    return $ci->menulocation;
}

function menuParentInfo()
{
    $menuParentInfo = "";
    $ci = &get_instance();

    $ci->menuParentInfo = array(
        '1' => "ছাত্র-ছাত্রীর তথ্য",
        '2' => "ছাত্র-ছাত্রীর উপস্থিতি",
        '3' => "পাঠ পরিকল্পনা",
        '4' => "পরীক্ষার ফলাফল",
        '5' => "শিক্ষকদের উপস্থিতি"
    );

    return $ci->menuParentInfo;
}

function get_bannerimage_acc_to($locid)
{
    $ci = &get_instance();
    $ci->load->model('admin/Mod_banneriamage', 'Mod_banneriamage');
    return $ci->Mod_banneriamage->get_bannerimage_acc_to($locid);
}


function menu_location($locid)
{
    $ci = &get_instance();
    $ci->load->model('admin/Mod_menu', 'Mod_menu');
    return $ci->Mod_menu->menu_location($locid);
}


function en2bnNumber($number)
{
    $search_array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "PM", "AM", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
    $replace_array = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০", "পিএম", "এএম", "জানুয়ারি", "ফেব্রুয়ারি", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "অগাস্ট");
    $en_number = str_replace($search_array, $replace_array, $number);

    return $en_number;
}

function BatchNumber()
{
    $BatchNumber = "";
    $ci = &get_instance();

    $ci->BatchNumber = array(
        "1" => "1st",
        "2" => "2nd",
        "3" => "3rd",
        "4" => "4th",
        "5" => "5th",
        "6" => "6th",
        "7" => "7th",
        "8" => "8th",
        "9" => "9th",
        "10" => "10th",
        "11" => "11th",
        "12" => "12th",
        "13" => "13th",
        "14" => "14th",
        "15" => "15th",
        "16" => "16th",
        "17" => "17th",
        "18" => "18th",
        "19" => "19th",
        "20" => "20th",
        "21" => "21th",
        "22" => "22th",
        "23" => "23th",
        "24" => "24th",
        "25" => "25th",
        "26" => "26th",
        "27" => "27th",
        "28" => "28th",
        "29" => "29th",
        "30" => "30th"
    );

    return $ci->BatchNumber;
}

function passingYear()
{
    $passingYear = "";
    $ci = &get_instance();

    $ci->passingYear = range(1990, strftime("%Y", time()));

    return $ci->passingYear;
}

function admin_template_url()
{
    $ci = &get_instance();
    $temp_admin_Url = base_url("template");
    return $temp_admin_Url;
}

function system_url()
{
    $ci = &get_instance();
    $temp_admin_Url = base_url("system_path");
    return $temp_admin_Url;
}


function count_members()
{
    $ci = &get_instance();
    $ci->load->model('home/Mod_members', 'Mod_members');
    return $ci->Mod_members->count_members();
}


function members_name($id)
{
    $ci = &get_instance();
    $ci->load->model('home/Mod_members', 'Mod_members');
    return $ci->Mod_members->members_name($id);
}


function member_type()
{
    $menuParentInfo = "";
    $ci = &get_instance();
    $ci->member_type = array(
        '1' => "Life Time Member",
        '2' => "Permanent Member",
        '3' => "Honorary Member",
        '4' => "Others"
    );
    return $ci->member_type;
}


function loc()
{
    $loc = "";
    $ci = &get_instance();
    $ci->loc = array(
        '1' => "Page",
        '2' => "Category"
    );
    return $ci->loc;
}

function ads_pos()
{
    $ads_pos = "";
    $ci = &get_instance();
    $ci->ads_pos = array(
        '1' => "Category Top",
        '2' => "Category Middle",
        '3' => "Category Bottom",
        '4' => "Category Sidebar Top",
        '5' => "Category Sidebar Middle",
        '6' => "Category Sidebar Bottom",
        '7' => "Page Top",
        '8' => "Page Middle",
        '9' => "Page Bottom",
        '10' => "Page Sidebar Top",
        '11' => "Page Sidebar Middle",
        '12' => "Page Sidebar Bottom"
    );
    return $ci->ads_pos;
}

function get_loc_name($id)
{
    $ci = &get_instance();
    $ci->load->model('admin/Mod_ads', 'Mod_ads');
    return $ci->Mod_ads->get_loc_name($id);
}

function get_pos_name($id)
{
    $ci = &get_instance();
    $ci->load->model('admin/Mod_ads', 'Mod_ads');
    return $ci->Mod_ads->get_pos_name($id);
}

//
//function menu_location($locid){
//    $ci = &get_instance();
//    $ci->load->model('admin/Mod_menu', 'Mod_menu');
//    return $ci->Mod_menu->menu_location($locid);
//} 

function sc_memberss($sc_comm_id)
{
    $ci = &get_instance();
    $ci->load->model('admin/Mod_sub_committees', 'Mod_sub_committees');
    return $ci->Mod_members->sc_memberss($sc_comm_id);
}

function payment_list($user_id)
{
    $ci = &get_instance();
    $ci->load->model('admin/Mod_fees', 'Mod_sub_fees');
    return $ci->Mod_sub_fees->payment_list($user_id);
}

function get_notice()
{
    $ci = &get_instance();
    $ci->load->model('home/Mod_notice', 'Mod_notice');
    return $ci->Mod_notice->get_notice();
}

function categories()
{
    $ci = &get_instance();
    $ci->load->model('admin/Mod_category', 'Mod_category');
    return $ci->Mod_category->categories();
}

function authors()
{
    $ci = &get_instance();
    $ci->load->model('admin/Mod_author', 'Mod_author');
    return $ci->Mod_author->authors();
}

function authors_name_acc_to_id($id)
{
    $ci = &get_instance();
    $ci->load->model('admin/Mod_author', 'Mod_author');
    return $ci->Mod_author->authors_name_acc_to_id($id);
}

function fcategories()
{
    $ci = &get_instance();
    $ci->load->model('home/Mod_category', 'Mod_category');
    return $ci->Mod_category->fcategories();
}

function subcategories()
{
    $ci = &get_instance();
    $ci->load->model('admin/Mod_category', 'Mod_category');
    return $ci->Mod_category->subcategories();
}


function category_name_acc_to_id($id)
{
    $ci = &get_instance();
    $ci->load->model('admin/Mod_category', 'Mod_category');
    return $ci->Mod_category->category_name_acc_to_id($id);
}



function category_info_acc_to_id($id)
{
    $ci = &get_instance();
    $ci->load->model('admin/Mod_category', 'Mod_category');
    return $ci->Mod_category->category_info_acc_to_id($id);
}



function fees_month($user_id)
{
    $ci = &get_instance();
    $ci->load->model('admin/Mod_fees', 'Mod_sub_fees');
    return $ci->Mod_sub_fees->fees_month($user_id);
}

function fees_year($user_id)
{
    $ci = &get_instance();
    $ci->load->model('admin/Mod_fees', 'Mod_sub_fees');
    return $ci->Mod_sub_fees->fees_year($user_id);
}

function is_active_member($user_id)
{
    $ci = &get_instance();
    $ci->load->model('home/Mod_members', 'Mod_members');
    return $ci->Mod_members->is_active_member($user_id);
}

function get_average_rating($post_id)
{
    $ci = &get_instance();
    $ci->load->model('home/mod_posts', 'mod_posts');
    return $ci->mod_posts->get_average_rating($post_id);
}


function get_($user_id)
{
    $ci = &get_instance();
    $ci->load->model('home/Mod_careers', 'Mod_careers');
    return $ci->Mod_careers->is_active_member($user_id);
}

function all_months()
{

    $all_months = "";
    $ci = &get_instance();

    $ci->all_months = array(
        '1' => "January",
        '2' => "February",
        '3' => "March",
        '4' => "April",
        '5' => "May",
        '6' => "June",
        '7' => "July",
        '8' => "August",
        '9' => "September",
        '10' => "October",
        '11' => "November",
        '12' => "December"
    );

    return $ci->all_months;

}

function cal_year()
{
    $years = [];

    for ($i = date('Y') - 3; $i < (date('Y') + 2); $i++) {

        $years[] = $i;
    }

    return $years;

}


function numberToWords($number)
{
    $words = [
        0 => 'zero',
        1 => 'one',
        2 => 'two',
        3 => 'three',
        4 => 'four',
        5 => 'five',
        6 => 'six',
        7 => 'seven',
        8 => 'eight',
        9 => 'nine',
        10 => 'ten',
        11 => 'eleven',
        12 => 'twelve',
        13 => 'thirteen',
        14 => 'fourteen',
        15 => 'fifteen',
        16 => 'sixteen',
        17 => 'seventeen',
        18 => 'eighteen',
        19 => 'nineteen',
        20 => 'twenty',
        30 => 'thirty',
        40 => 'forty',
        50 => 'fifty',
        60 => 'sixty',
        70 => 'seventy',
        80 => 'eighty',
        90 => 'ninety',
        100 => 'hundred',
        1000 => 'thousand',
        1000000 => 'million',
        1000000000 => 'billion'
    ];

    if ($number < 20) {
        return $words[$number];
    } elseif ($number < 100) {
        $tens = intdiv($number, 10) * 10;
        $units = $number % 10;
        return $words[$tens] . ($units ? '-' . $words[$units] : '');
    } elseif ($number < 1000) {
        $hundreds = intdiv($number, 100);
        $remainder = $number % 100;
        return $words[$hundreds] . ' hundred' . ($remainder ? ' and ' . numberToWords($remainder) : '');
    } elseif ($number < 1000000) {
        $thousands = intdiv($number, 1000);
        $remainder = $number % 1000;
        return numberToWords($thousands) . ' thousand' . ($remainder ? ' ' . numberToWords($remainder) : '');
    } elseif ($number < 1000000000) {
        $millions = intdiv($number, 1000000);
        $remainder = $number % 1000000;
        return numberToWords($millions) . ' million' . ($remainder ? ' ' . numberToWords($remainder) : '');
    } else {
        $billions = intdiv($number, 1000000000);
        $remainder = $number % 1000000000;
        return numberToWords($billions) . ' billion' . ($remainder ? ' ' . numberToWords($remainder) : '');
    }
}
// end