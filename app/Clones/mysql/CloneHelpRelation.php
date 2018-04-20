<?php
namespace App\Clones\mysql;

use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: Jeremy
 * Date: 4/18/2018
 * Time: 11:43 PM
 */

class CloneHelpRelation
{
    public static $tableName = 'help_relation';

    public function exec()
    {
        $chunkSize          = 50;
        $connection         = 'mysql';
        $database           = 'mysql';
        $tableName          = self::$tableName;
        $records            = [
                [
                    'help_topic_id' => '0',
                    'help_keyword_id' => '0'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '0'
                ],[
                    'help_topic_id' => '294',
                    'help_keyword_id' => '1'
                ],[
                    'help_topic_id' => '277',
                    'help_keyword_id' => '2'
                ],[
                    'help_topic_id' => '2',
                    'help_keyword_id' => '3'
                ],[
                    'help_topic_id' => '3',
                    'help_keyword_id' => '4'
                ],[
                    'help_topic_id' => '370',
                    'help_keyword_id' => '5'
                ],[
                    'help_topic_id' => '370',
                    'help_keyword_id' => '6'
                ],[
                    'help_topic_id' => '566',
                    'help_keyword_id' => '6'
                ],[
                    'help_topic_id' => '64',
                    'help_keyword_id' => '7'
                ],[
                    'help_topic_id' => '432',
                    'help_keyword_id' => '8'
                ],[
                    'help_topic_id' => '266',
                    'help_keyword_id' => '9'
                ],[
                    'help_topic_id' => '277',
                    'help_keyword_id' => '10'
                ],[
                    'help_topic_id' => '410',
                    'help_keyword_id' => '10'
                ],[
                    'help_topic_id' => '587',
                    'help_keyword_id' => '10'
                ],[
                    'help_topic_id' => '6',
                    'help_keyword_id' => '11'
                ],[
                    'help_topic_id' => '7',
                    'help_keyword_id' => '12'
                ],[
                    'help_topic_id' => '410',
                    'help_keyword_id' => '13'
                ],[
                    'help_topic_id' => '14',
                    'help_keyword_id' => '14'
                ],[
                    'help_topic_id' => '69',
                    'help_keyword_id' => '14'
                ],[
                    'help_topic_id' => '402',
                    'help_keyword_id' => '14'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '14'
                ],[
                    'help_topic_id' => '15',
                    'help_keyword_id' => '15'
                ],[
                    'help_topic_id' => '238',
                    'help_keyword_id' => '16'
                ],[
                    'help_topic_id' => '78',
                    'help_keyword_id' => '17'
                ],[
                    'help_topic_id' => '107',
                    'help_keyword_id' => '17'
                ],[
                    'help_topic_id' => '263',
                    'help_keyword_id' => '17'
                ],[
                    'help_topic_id' => '235',
                    'help_keyword_id' => '18'
                ],[
                    'help_topic_id' => '52',
                    'help_keyword_id' => '19'
                ],[
                    'help_topic_id' => '21',
                    'help_keyword_id' => '20'
                ],[
                    'help_topic_id' => '380',
                    'help_keyword_id' => '21'
                ],[
                    'help_topic_id' => '23',
                    'help_keyword_id' => '22'
                ],[
                    'help_topic_id' => '125',
                    'help_keyword_id' => '23'
                ],[
                    'help_topic_id' => '328',
                    'help_keyword_id' => '23'
                ],[
                    'help_topic_id' => '29',
                    'help_keyword_id' => '24'
                ],[
                    'help_topic_id' => '364',
                    'help_keyword_id' => '24'
                ],[
                    'help_topic_id' => '559',
                    'help_keyword_id' => '24'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '25'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '25'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '26'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '26'
                ],[
                    'help_topic_id' => '328',
                    'help_keyword_id' => '27'
                ],[
                    'help_topic_id' => '235',
                    'help_keyword_id' => '28'
                ],[
                    'help_topic_id' => '26',
                    'help_keyword_id' => '29'
                ],[
                    'help_topic_id' => '28',
                    'help_keyword_id' => '30'
                ],[
                    'help_topic_id' => '461',
                    'help_keyword_id' => '30'
                ],[
                    'help_topic_id' => '587',
                    'help_keyword_id' => '30'
                ],[
                    'help_topic_id' => '29',
                    'help_keyword_id' => '31'
                ],[
                    'help_topic_id' => '364',
                    'help_keyword_id' => '31'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '31'
                ],[
                    'help_topic_id' => '559',
                    'help_keyword_id' => '31'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '31'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '32'
                ],[
                    'help_topic_id' => '313',
                    'help_keyword_id' => '33'
                ],[
                    'help_topic_id' => '31',
                    'help_keyword_id' => '34'
                ],[
                    'help_topic_id' => '235',
                    'help_keyword_id' => '35'
                ],[
                    'help_topic_id' => '536',
                    'help_keyword_id' => '36'
                ],[
                    'help_topic_id' => '35',
                    'help_keyword_id' => '37'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '37'
                ],[
                    'help_topic_id' => '617',
                    'help_keyword_id' => '37'
                ],[
                    'help_topic_id' => '36',
                    'help_keyword_id' => '38'
                ],[
                    'help_topic_id' => '0',
                    'help_keyword_id' => '39'
                ],[
                    'help_topic_id' => '370',
                    'help_keyword_id' => '39'
                ],[
                    'help_topic_id' => '566',
                    'help_keyword_id' => '39'
                ],[
                    'help_topic_id' => '617',
                    'help_keyword_id' => '39'
                ],[
                    'help_topic_id' => '111',
                    'help_keyword_id' => '40'
                ],[
                    'help_topic_id' => '161',
                    'help_keyword_id' => '40'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '40'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '40'
                ],[
                    'help_topic_id' => '37',
                    'help_keyword_id' => '41'
                ],[
                    'help_topic_id' => '69',
                    'help_keyword_id' => '41'
                ],[
                    'help_topic_id' => '432',
                    'help_keyword_id' => '42'
                ],[
                    'help_topic_id' => '0',
                    'help_keyword_id' => '43'
                ],[
                    'help_topic_id' => '39',
                    'help_keyword_id' => '43'
                ],[
                    'help_topic_id' => '121',
                    'help_keyword_id' => '43'
                ],[
                    'help_topic_id' => '120',
                    'help_keyword_id' => '44'
                ],[
                    'help_topic_id' => '125',
                    'help_keyword_id' => '44'
                ],[
                    'help_topic_id' => '156',
                    'help_keyword_id' => '44'
                ],[
                    'help_topic_id' => '130',
                    'help_keyword_id' => '45'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '45'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '46'
                ],[
                    'help_topic_id' => '125',
                    'help_keyword_id' => '47'
                ],[
                    'help_topic_id' => '121',
                    'help_keyword_id' => '48'
                ],[
                    'help_topic_id' => '47',
                    'help_keyword_id' => '49'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '50'
                ],[
                    'help_topic_id' => '296',
                    'help_keyword_id' => '51'
                ],[
                    'help_topic_id' => '277',
                    'help_keyword_id' => '52'
                ],[
                    'help_topic_id' => '30',
                    'help_keyword_id' => '53'
                ],[
                    'help_topic_id' => '142',
                    'help_keyword_id' => '53'
                ],[
                    'help_topic_id' => '171',
                    'help_keyword_id' => '53'
                ],[
                    'help_topic_id' => '370',
                    'help_keyword_id' => '54'
                ],[
                    'help_topic_id' => '566',
                    'help_keyword_id' => '54'
                ],[
                    'help_topic_id' => '235',
                    'help_keyword_id' => '55'
                ],[
                    'help_topic_id' => '53',
                    'help_keyword_id' => '56'
                ],[
                    'help_topic_id' => '380',
                    'help_keyword_id' => '56'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '56'
                ],[
                    'help_topic_id' => '617',
                    'help_keyword_id' => '56'
                ],[
                    'help_topic_id' => '370',
                    'help_keyword_id' => '57'
                ],[
                    'help_topic_id' => '566',
                    'help_keyword_id' => '57'
                ],[
                    'help_topic_id' => '55',
                    'help_keyword_id' => '58'
                ],[
                    'help_topic_id' => '322',
                    'help_keyword_id' => '59'
                ],[
                    'help_topic_id' => '380',
                    'help_keyword_id' => '59'
                ],[
                    'help_topic_id' => '497',
                    'help_keyword_id' => '59'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '59'
                ],[
                    'help_topic_id' => '60',
                    'help_keyword_id' => '60'
                ],[
                    'help_topic_id' => '509',
                    'help_keyword_id' => '61'
                ],[
                    'help_topic_id' => '396',
                    'help_keyword_id' => '62'
                ],[
                    'help_topic_id' => '410',
                    'help_keyword_id' => '63'
                ],[
                    'help_topic_id' => '587',
                    'help_keyword_id' => '63'
                ],[
                    'help_topic_id' => '605',
                    'help_keyword_id' => '63'
                ],[
                    'help_topic_id' => '65',
                    'help_keyword_id' => '64'
                ],[
                    'help_topic_id' => '433',
                    'help_keyword_id' => '64'
                ],[
                    'help_topic_id' => '578',
                    'help_keyword_id' => '65'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '65'
                ],[
                    'help_topic_id' => '249',
                    'help_keyword_id' => '66'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '66'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '66'
                ],[
                    'help_topic_id' => '24',
                    'help_keyword_id' => '67'
                ],[
                    'help_topic_id' => '40',
                    'help_keyword_id' => '67'
                ],[
                    'help_topic_id' => '54',
                    'help_keyword_id' => '67'
                ],[
                    'help_topic_id' => '483',
                    'help_keyword_id' => '68'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '68'
                ],[
                    'help_topic_id' => '69',
                    'help_keyword_id' => '69'
                ],[
                    'help_topic_id' => '503',
                    'help_keyword_id' => '69'
                ],[
                    'help_topic_id' => '235',
                    'help_keyword_id' => '70'
                ],[
                    'help_topic_id' => '70',
                    'help_keyword_id' => '71'
                ],[
                    'help_topic_id' => '331',
                    'help_keyword_id' => '72'
                ],[
                    'help_topic_id' => '369',
                    'help_keyword_id' => '72'
                ],[
                    'help_topic_id' => '73',
                    'help_keyword_id' => '73'
                ],[
                    'help_topic_id' => '74',
                    'help_keyword_id' => '74'
                ],[
                    'help_topic_id' => '427',
                    'help_keyword_id' => '74'
                ],[
                    'help_topic_id' => '75',
                    'help_keyword_id' => '75'
                ],[
                    'help_topic_id' => '197',
                    'help_keyword_id' => '76'
                ],[
                    'help_topic_id' => '231',
                    'help_keyword_id' => '76'
                ],[
                    'help_topic_id' => '604',
                    'help_keyword_id' => '76'
                ],[
                    'help_topic_id' => '79',
                    'help_keyword_id' => '77'
                ],[
                    'help_topic_id' => '80',
                    'help_keyword_id' => '78'
                ],[
                    'help_topic_id' => '81',
                    'help_keyword_id' => '79'
                ],[
                    'help_topic_id' => '370',
                    'help_keyword_id' => '79'
                ],[
                    'help_topic_id' => '566',
                    'help_keyword_id' => '79'
                ],[
                    'help_topic_id' => '629',
                    'help_keyword_id' => '79'
                ],[
                    'help_topic_id' => '83',
                    'help_keyword_id' => '80'
                ],[
                    'help_topic_id' => '142',
                    'help_keyword_id' => '80'
                ],[
                    'help_topic_id' => '235',
                    'help_keyword_id' => '80'
                ],[
                    'help_topic_id' => '473',
                    'help_keyword_id' => '80'
                ],[
                    'help_topic_id' => '130',
                    'help_keyword_id' => '81'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '81'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '81'
                ],[
                    'help_topic_id' => '121',
                    'help_keyword_id' => '82'
                ],[
                    'help_topic_id' => '130',
                    'help_keyword_id' => '82'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '82'
                ],[
                    'help_topic_id' => '370',
                    'help_keyword_id' => '82'
                ],[
                    'help_topic_id' => '566',
                    'help_keyword_id' => '82'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '82'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '83'
                ],[
                    'help_topic_id' => '84',
                    'help_keyword_id' => '84'
                ],[
                    'help_topic_id' => '432',
                    'help_keyword_id' => '85'
                ],[
                    'help_topic_id' => '85',
                    'help_keyword_id' => '86'
                ],[
                    'help_topic_id' => '432',
                    'help_keyword_id' => '87'
                ],[
                    'help_topic_id' => '504',
                    'help_keyword_id' => '88'
                ],[
                    'help_topic_id' => '125',
                    'help_keyword_id' => '89'
                ],[
                    'help_topic_id' => '364',
                    'help_keyword_id' => '89'
                ],[
                    'help_topic_id' => '559',
                    'help_keyword_id' => '89'
                ],[
                    'help_topic_id' => '84',
                    'help_keyword_id' => '90'
                ],[
                    'help_topic_id' => '487',
                    'help_keyword_id' => '91'
                ],[
                    'help_topic_id' => '161',
                    'help_keyword_id' => '92'
                ],[
                    'help_topic_id' => '125',
                    'help_keyword_id' => '93'
                ],[
                    'help_topic_id' => '156',
                    'help_keyword_id' => '93'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '94'
                ],[
                    'help_topic_id' => '40',
                    'help_keyword_id' => '95'
                ],[
                    'help_topic_id' => '54',
                    'help_keyword_id' => '95'
                ],[
                    'help_topic_id' => '90',
                    'help_keyword_id' => '96'
                ],[
                    'help_topic_id' => '91',
                    'help_keyword_id' => '97'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '98'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '98'
                ],[
                    'help_topic_id' => '35',
                    'help_keyword_id' => '99'
                ],[
                    'help_topic_id' => '78',
                    'help_keyword_id' => '99'
                ],[
                    'help_topic_id' => '263',
                    'help_keyword_id' => '99'
                ],[
                    'help_topic_id' => '330',
                    'help_keyword_id' => '99'
                ],[
                    'help_topic_id' => '500',
                    'help_keyword_id' => '99'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '99'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '99'
                ],[
                    'help_topic_id' => '602',
                    'help_keyword_id' => '99'
                ],[
                    'help_topic_id' => '93',
                    'help_keyword_id' => '100'
                ],[
                    'help_topic_id' => '0',
                    'help_keyword_id' => '101'
                ],[
                    'help_topic_id' => '24',
                    'help_keyword_id' => '102'
                ],[
                    'help_topic_id' => '95',
                    'help_keyword_id' => '103'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '104'
                ],[
                    'help_topic_id' => '446',
                    'help_keyword_id' => '105'
                ],[
                    'help_topic_id' => '161',
                    'help_keyword_id' => '106'
                ],[
                    'help_topic_id' => '208',
                    'help_keyword_id' => '106'
                ],[
                    'help_topic_id' => '429',
                    'help_keyword_id' => '106'
                ],[
                    'help_topic_id' => '503',
                    'help_keyword_id' => '106'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '106'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '106'
                ],[
                    'help_topic_id' => '577',
                    'help_keyword_id' => '106'
                ],[
                    'help_topic_id' => '511',
                    'help_keyword_id' => '107'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '107'
                ],[
                    'help_topic_id' => '102',
                    'help_keyword_id' => '108'
                ],[
                    'help_topic_id' => '193',
                    'help_keyword_id' => '109'
                ],[
                    'help_topic_id' => '64',
                    'help_keyword_id' => '110'
                ],[
                    'help_topic_id' => '429',
                    'help_keyword_id' => '111'
                ],[
                    'help_topic_id' => '578',
                    'help_keyword_id' => '112'
                ],[
                    'help_topic_id' => '64',
                    'help_keyword_id' => '113'
                ],[
                    'help_topic_id' => '197',
                    'help_keyword_id' => '114'
                ],[
                    'help_topic_id' => '330',
                    'help_keyword_id' => '115'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '115'
                ],[
                    'help_topic_id' => '578',
                    'help_keyword_id' => '115'
                ],[
                    'help_topic_id' => '108',
                    'help_keyword_id' => '116'
                ],[
                    'help_topic_id' => '109',
                    'help_keyword_id' => '117'
                ],[
                    'help_topic_id' => '207',
                    'help_keyword_id' => '118'
                ],[
                    'help_topic_id' => '111',
                    'help_keyword_id' => '119'
                ],[
                    'help_topic_id' => '112',
                    'help_keyword_id' => '120'
                ],[
                    'help_topic_id' => '121',
                    'help_keyword_id' => '121'
                ],[
                    'help_topic_id' => '259',
                    'help_keyword_id' => '121'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '121'
                ],[
                    'help_topic_id' => '619',
                    'help_keyword_id' => '121'
                ],[
                    'help_topic_id' => '114',
                    'help_keyword_id' => '122'
                ],[
                    'help_topic_id' => '398',
                    'help_keyword_id' => '123'
                ],[
                    'help_topic_id' => '578',
                    'help_keyword_id' => '123'
                ],[
                    'help_topic_id' => '116',
                    'help_keyword_id' => '124'
                ],[
                    'help_topic_id' => '118',
                    'help_keyword_id' => '125'
                ],[
                    'help_topic_id' => '35',
                    'help_keyword_id' => '126'
                ],[
                    'help_topic_id' => '53',
                    'help_keyword_id' => '126'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '126'
                ],[
                    'help_topic_id' => '536',
                    'help_keyword_id' => '126'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '126'
                ],[
                    'help_topic_id' => '432',
                    'help_keyword_id' => '127'
                ],[
                    'help_topic_id' => '122',
                    'help_keyword_id' => '128'
                ],[
                    'help_topic_id' => '0',
                    'help_keyword_id' => '129'
                ],[
                    'help_topic_id' => '35',
                    'help_keyword_id' => '129'
                ],[
                    'help_topic_id' => '56',
                    'help_keyword_id' => '129'
                ],[
                    'help_topic_id' => '328',
                    'help_keyword_id' => '130'
                ],[
                    'help_topic_id' => '158',
                    'help_keyword_id' => '131'
                ],[
                    'help_topic_id' => '125',
                    'help_keyword_id' => '132'
                ],[
                    'help_topic_id' => '156',
                    'help_keyword_id' => '132'
                ],[
                    'help_topic_id' => '126',
                    'help_keyword_id' => '133'
                ],[
                    'help_topic_id' => '129',
                    'help_keyword_id' => '134'
                ],[
                    'help_topic_id' => '132',
                    'help_keyword_id' => '135'
                ],[
                    'help_topic_id' => '133',
                    'help_keyword_id' => '136'
                ],[
                    'help_topic_id' => '570',
                    'help_keyword_id' => '137'
                ],[
                    'help_topic_id' => '509',
                    'help_keyword_id' => '138'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '139'
                ],[
                    'help_topic_id' => '294',
                    'help_keyword_id' => '139'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '139'
                ],[
                    'help_topic_id' => '617',
                    'help_keyword_id' => '139'
                ],[
                    'help_topic_id' => '67',
                    'help_keyword_id' => '140'
                ],[
                    'help_topic_id' => '96',
                    'help_keyword_id' => '140'
                ],[
                    'help_topic_id' => '497',
                    'help_keyword_id' => '140'
                ],[
                    'help_topic_id' => '197',
                    'help_keyword_id' => '141'
                ],[
                    'help_topic_id' => '231',
                    'help_keyword_id' => '141'
                ],[
                    'help_topic_id' => '604',
                    'help_keyword_id' => '141'
                ],[
                    'help_topic_id' => '104',
                    'help_keyword_id' => '142'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '142'
                ],[
                    'help_topic_id' => '602',
                    'help_keyword_id' => '143'
                ],[
                    'help_topic_id' => '197',
                    'help_keyword_id' => '144'
                ],[
                    'help_topic_id' => '231',
                    'help_keyword_id' => '144'
                ],[
                    'help_topic_id' => '604',
                    'help_keyword_id' => '144'
                ],[
                    'help_topic_id' => '142',
                    'help_keyword_id' => '145'
                ],[
                    'help_topic_id' => '546',
                    'help_keyword_id' => '145'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '146'
                ],[
                    'help_topic_id' => '144',
                    'help_keyword_id' => '147'
                ],[
                    'help_topic_id' => '557',
                    'help_keyword_id' => '148'
                ],[
                    'help_topic_id' => '148',
                    'help_keyword_id' => '149'
                ],[
                    'help_topic_id' => '149',
                    'help_keyword_id' => '150'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '151'
                ],[
                    'help_topic_id' => '578',
                    'help_keyword_id' => '152'
                ],[
                    'help_topic_id' => '125',
                    'help_keyword_id' => '153'
                ],[
                    'help_topic_id' => '151',
                    'help_keyword_id' => '154'
                ],[
                    'help_topic_id' => '410',
                    'help_keyword_id' => '155'
                ],[
                    'help_topic_id' => '155',
                    'help_keyword_id' => '156'
                ],[
                    'help_topic_id' => '156',
                    'help_keyword_id' => '157'
                ],[
                    'help_topic_id' => '159',
                    'help_keyword_id' => '158'
                ],[
                    'help_topic_id' => '161',
                    'help_keyword_id' => '159'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '160'
                ],[
                    'help_topic_id' => '578',
                    'help_keyword_id' => '160'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '161'
                ],[
                    'help_topic_id' => '29',
                    'help_keyword_id' => '162'
                ],[
                    'help_topic_id' => '35',
                    'help_keyword_id' => '162'
                ],[
                    'help_topic_id' => '53',
                    'help_keyword_id' => '162'
                ],[
                    'help_topic_id' => '322',
                    'help_keyword_id' => '162'
                ],[
                    'help_topic_id' => '380',
                    'help_keyword_id' => '162'
                ],[
                    'help_topic_id' => '398',
                    'help_keyword_id' => '162'
                ],[
                    'help_topic_id' => '578',
                    'help_keyword_id' => '162'
                ],[
                    'help_topic_id' => '125',
                    'help_keyword_id' => '163'
                ],[
                    'help_topic_id' => '169',
                    'help_keyword_id' => '164'
                ],[
                    'help_topic_id' => '121',
                    'help_keyword_id' => '165'
                ],[
                    'help_topic_id' => '131',
                    'help_keyword_id' => '166'
                ],[
                    'help_topic_id' => '412',
                    'help_keyword_id' => '166'
                ],[
                    'help_topic_id' => '434',
                    'help_keyword_id' => '166'
                ],[
                    'help_topic_id' => '501',
                    'help_keyword_id' => '166'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '166'
                ],[
                    'help_topic_id' => '173',
                    'help_keyword_id' => '167'
                ],[
                    'help_topic_id' => '176',
                    'help_keyword_id' => '168'
                ],[
                    'help_topic_id' => '255',
                    'help_keyword_id' => '169'
                ],[
                    'help_topic_id' => '178',
                    'help_keyword_id' => '170'
                ],[
                    'help_topic_id' => '609',
                    'help_keyword_id' => '171'
                ],[
                    'help_topic_id' => '264',
                    'help_keyword_id' => '172'
                ],[
                    'help_topic_id' => '161',
                    'help_keyword_id' => '173'
                ],[
                    'help_topic_id' => '288',
                    'help_keyword_id' => '173'
                ],[
                    'help_topic_id' => '0',
                    'help_keyword_id' => '174'
                ],[
                    'help_topic_id' => '121',
                    'help_keyword_id' => '175'
                ],[
                    'help_topic_id' => '345',
                    'help_keyword_id' => '175'
                ],[
                    'help_topic_id' => '455',
                    'help_keyword_id' => '175'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '175'
                ],[
                    'help_topic_id' => '164',
                    'help_keyword_id' => '176'
                ],[
                    'help_topic_id' => '266',
                    'help_keyword_id' => '176'
                ],[
                    'help_topic_id' => '182',
                    'help_keyword_id' => '177'
                ],[
                    'help_topic_id' => '581',
                    'help_keyword_id' => '178'
                ],[
                    'help_topic_id' => '183',
                    'help_keyword_id' => '179'
                ],[
                    'help_topic_id' => '432',
                    'help_keyword_id' => '180'
                ],[
                    'help_topic_id' => '432',
                    'help_keyword_id' => '181'
                ],[
                    'help_topic_id' => '187',
                    'help_keyword_id' => '182'
                ],[
                    'help_topic_id' => '188',
                    'help_keyword_id' => '183'
                ],[
                    'help_topic_id' => '459',
                    'help_keyword_id' => '184'
                ],[
                    'help_topic_id' => '192',
                    'help_keyword_id' => '185'
                ],[
                    'help_topic_id' => '294',
                    'help_keyword_id' => '186'
                ],[
                    'help_topic_id' => '242',
                    'help_keyword_id' => '187'
                ],[
                    'help_topic_id' => '131',
                    'help_keyword_id' => '188'
                ],[
                    'help_topic_id' => '164',
                    'help_keyword_id' => '188'
                ],[
                    'help_topic_id' => '212',
                    'help_keyword_id' => '188'
                ],[
                    'help_topic_id' => '266',
                    'help_keyword_id' => '188'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '188'
                ],[
                    'help_topic_id' => '308',
                    'help_keyword_id' => '188'
                ],[
                    'help_topic_id' => '398',
                    'help_keyword_id' => '188'
                ],[
                    'help_topic_id' => '412',
                    'help_keyword_id' => '188'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '188'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '188'
                ],[
                    'help_topic_id' => '578',
                    'help_keyword_id' => '188'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '188'
                ],[
                    'help_topic_id' => '197',
                    'help_keyword_id' => '189'
                ],[
                    'help_topic_id' => '231',
                    'help_keyword_id' => '189'
                ],[
                    'help_topic_id' => '604',
                    'help_keyword_id' => '189'
                ],[
                    'help_topic_id' => '44',
                    'help_keyword_id' => '190'
                ],[
                    'help_topic_id' => '71',
                    'help_keyword_id' => '190'
                ],[
                    'help_topic_id' => '135',
                    'help_keyword_id' => '190'
                ],[
                    'help_topic_id' => '177',
                    'help_keyword_id' => '190'
                ],[
                    'help_topic_id' => '249',
                    'help_keyword_id' => '190'
                ],[
                    'help_topic_id' => '260',
                    'help_keyword_id' => '190'
                ],[
                    'help_topic_id' => '288',
                    'help_keyword_id' => '190'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '190'
                ],[
                    'help_topic_id' => '387',
                    'help_keyword_id' => '190'
                ],[
                    'help_topic_id' => '481',
                    'help_keyword_id' => '190'
                ],[
                    'help_topic_id' => '507',
                    'help_keyword_id' => '190'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '190'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '190'
                ],[
                    'help_topic_id' => '614',
                    'help_keyword_id' => '190'
                ],[
                    'help_topic_id' => '193',
                    'help_keyword_id' => '191'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '192'
                ],[
                    'help_topic_id' => '334',
                    'help_keyword_id' => '192'
                ],[
                    'help_topic_id' => '481',
                    'help_keyword_id' => '192'
                ],[
                    'help_topic_id' => '617',
                    'help_keyword_id' => '192'
                ],[
                    'help_topic_id' => '432',
                    'help_keyword_id' => '193'
                ],[
                    'help_topic_id' => '187',
                    'help_keyword_id' => '194'
                ],[
                    'help_topic_id' => '199',
                    'help_keyword_id' => '195'
                ],[
                    'help_topic_id' => '200',
                    'help_keyword_id' => '196'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '197'
                ],[
                    'help_topic_id' => '369',
                    'help_keyword_id' => '198'
                ],[
                    'help_topic_id' => '432',
                    'help_keyword_id' => '199'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '200'
                ],[
                    'help_topic_id' => '202',
                    'help_keyword_id' => '201'
                ],[
                    'help_topic_id' => '577',
                    'help_keyword_id' => '202'
                ],[
                    'help_topic_id' => '207',
                    'help_keyword_id' => '203'
                ],[
                    'help_topic_id' => '205',
                    'help_keyword_id' => '204'
                ],[
                    'help_topic_id' => '204',
                    'help_keyword_id' => '205'
                ],[
                    'help_topic_id' => '207',
                    'help_keyword_id' => '206'
                ],[
                    'help_topic_id' => '467',
                    'help_keyword_id' => '207'
                ],[
                    'help_topic_id' => '410',
                    'help_keyword_id' => '208'
                ],[
                    'help_topic_id' => '96',
                    'help_keyword_id' => '209'
                ],[
                    'help_topic_id' => '208',
                    'help_keyword_id' => '209'
                ],[
                    'help_topic_id' => '13',
                    'help_keyword_id' => '210'
                ],[
                    'help_topic_id' => '17',
                    'help_keyword_id' => '210'
                ],[
                    'help_topic_id' => '44',
                    'help_keyword_id' => '210'
                ],[
                    'help_topic_id' => '64',
                    'help_keyword_id' => '210'
                ],[
                    'help_topic_id' => '121',
                    'help_keyword_id' => '210'
                ],[
                    'help_topic_id' => '130',
                    'help_keyword_id' => '210'
                ],[
                    'help_topic_id' => '177',
                    'help_keyword_id' => '210'
                ],[
                    'help_topic_id' => '196',
                    'help_keyword_id' => '210'
                ],[
                    'help_topic_id' => '223',
                    'help_keyword_id' => '210'
                ],[
                    'help_topic_id' => '245',
                    'help_keyword_id' => '210'
                ],[
                    'help_topic_id' => '290',
                    'help_keyword_id' => '210'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '210'
                ],[
                    'help_topic_id' => '294',
                    'help_keyword_id' => '210'
                ],[
                    'help_topic_id' => '345',
                    'help_keyword_id' => '210'
                ],[
                    'help_topic_id' => '364',
                    'help_keyword_id' => '210'
                ],[
                    'help_topic_id' => '370',
                    'help_keyword_id' => '210'
                ],[
                    'help_topic_id' => '412',
                    'help_keyword_id' => '210'
                ],[
                    'help_topic_id' => '447',
                    'help_keyword_id' => '210'
                ],[
                    'help_topic_id' => '501',
                    'help_keyword_id' => '210'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '210'
                ],[
                    'help_topic_id' => '601',
                    'help_keyword_id' => '210'
                ],[
                    'help_topic_id' => '161',
                    'help_keyword_id' => '211'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '212'
                ],[
                    'help_topic_id' => '598',
                    'help_keyword_id' => '212'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '213'
                ],[
                    'help_topic_id' => '547',
                    'help_keyword_id' => '214'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '215'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '215'
                ],[
                    'help_topic_id' => '383',
                    'help_keyword_id' => '216'
                ],[
                    'help_topic_id' => '213',
                    'help_keyword_id' => '217'
                ],[
                    'help_topic_id' => '260',
                    'help_keyword_id' => '218'
                ],[
                    'help_topic_id' => '197',
                    'help_keyword_id' => '219'
                ],[
                    'help_topic_id' => '328',
                    'help_keyword_id' => '220'
                ],[
                    'help_topic_id' => '214',
                    'help_keyword_id' => '221'
                ],[
                    'help_topic_id' => '164',
                    'help_keyword_id' => '222'
                ],[
                    'help_topic_id' => '171',
                    'help_keyword_id' => '223'
                ],[
                    'help_topic_id' => '125',
                    'help_keyword_id' => '224'
                ],[
                    'help_topic_id' => '156',
                    'help_keyword_id' => '224'
                ],[
                    'help_topic_id' => '339',
                    'help_keyword_id' => '224'
                ],[
                    'help_topic_id' => '498',
                    'help_keyword_id' => '224'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '224'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '225'
                ],[
                    'help_topic_id' => '208',
                    'help_keyword_id' => '226'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '227'
                ],[
                    'help_topic_id' => '24',
                    'help_keyword_id' => '228'
                ],[
                    'help_topic_id' => '40',
                    'help_keyword_id' => '228'
                ],[
                    'help_topic_id' => '54',
                    'help_keyword_id' => '228'
                ],[
                    'help_topic_id' => '143',
                    'help_keyword_id' => '228'
                ],[
                    'help_topic_id' => '209',
                    'help_keyword_id' => '228'
                ],[
                    'help_topic_id' => '214',
                    'help_keyword_id' => '228'
                ],[
                    'help_topic_id' => '587',
                    'help_keyword_id' => '228'
                ],[
                    'help_topic_id' => '629',
                    'help_keyword_id' => '228'
                ],[
                    'help_topic_id' => '217',
                    'help_keyword_id' => '229'
                ],[
                    'help_topic_id' => '235',
                    'help_keyword_id' => '230'
                ],[
                    'help_topic_id' => '504',
                    'help_keyword_id' => '231'
                ],[
                    'help_topic_id' => '69',
                    'help_keyword_id' => '232'
                ],[
                    'help_topic_id' => '220',
                    'help_keyword_id' => '233'
                ],[
                    'help_topic_id' => '224',
                    'help_keyword_id' => '234'
                ],[
                    'help_topic_id' => '125',
                    'help_keyword_id' => '235'
                ],[
                    'help_topic_id' => '364',
                    'help_keyword_id' => '235'
                ],[
                    'help_topic_id' => '398',
                    'help_keyword_id' => '235'
                ],[
                    'help_topic_id' => '559',
                    'help_keyword_id' => '235'
                ],[
                    'help_topic_id' => '226',
                    'help_keyword_id' => '236'
                ],[
                    'help_topic_id' => '432',
                    'help_keyword_id' => '237'
                ],[
                    'help_topic_id' => '115',
                    'help_keyword_id' => '238'
                ],[
                    'help_topic_id' => '602',
                    'help_keyword_id' => '239'
                ],[
                    'help_topic_id' => '235',
                    'help_keyword_id' => '240'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '241'
                ],[
                    'help_topic_id' => '20',
                    'help_keyword_id' => '242'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '242'
                ],[
                    'help_topic_id' => '231',
                    'help_keyword_id' => '243'
                ],[
                    'help_topic_id' => '233',
                    'help_keyword_id' => '244'
                ],[
                    'help_topic_id' => '432',
                    'help_keyword_id' => '245'
                ],[
                    'help_topic_id' => '235',
                    'help_keyword_id' => '246'
                ],[
                    'help_topic_id' => '236',
                    'help_keyword_id' => '247'
                ],[
                    'help_topic_id' => '237',
                    'help_keyword_id' => '248'
                ],[
                    'help_topic_id' => '330',
                    'help_keyword_id' => '249'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '249'
                ],[
                    'help_topic_id' => '547',
                    'help_keyword_id' => '249'
                ],[
                    'help_topic_id' => '186',
                    'help_keyword_id' => '250'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '250'
                ],[
                    'help_topic_id' => '576',
                    'help_keyword_id' => '250'
                ],[
                    'help_topic_id' => '239',
                    'help_keyword_id' => '251'
                ],[
                    'help_topic_id' => '241',
                    'help_keyword_id' => '252'
                ],[
                    'help_topic_id' => '243',
                    'help_keyword_id' => '253'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '254'
                ],[
                    'help_topic_id' => '125',
                    'help_keyword_id' => '255'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '256'
                ],[
                    'help_topic_id' => '437',
                    'help_keyword_id' => '257'
                ],[
                    'help_topic_id' => '96',
                    'help_keyword_id' => '258'
                ],[
                    'help_topic_id' => '111',
                    'help_keyword_id' => '258'
                ],[
                    'help_topic_id' => '369',
                    'help_keyword_id' => '258'
                ],[
                    'help_topic_id' => '246',
                    'help_keyword_id' => '259'
                ],[
                    'help_topic_id' => '248',
                    'help_keyword_id' => '260'
                ],[
                    'help_topic_id' => '398',
                    'help_keyword_id' => '261'
                ],[
                    'help_topic_id' => '578',
                    'help_keyword_id' => '261'
                ],[
                    'help_topic_id' => '509',
                    'help_keyword_id' => '262'
                ],[
                    'help_topic_id' => '348',
                    'help_keyword_id' => '263'
                ],[
                    'help_topic_id' => '509',
                    'help_keyword_id' => '263'
                ],[
                    'help_topic_id' => '251',
                    'help_keyword_id' => '264'
                ],[
                    'help_topic_id' => '250',
                    'help_keyword_id' => '265'
                ],[
                    'help_topic_id' => '328',
                    'help_keyword_id' => '266'
                ],[
                    'help_topic_id' => '125',
                    'help_keyword_id' => '267'
                ],[
                    'help_topic_id' => '364',
                    'help_keyword_id' => '267'
                ],[
                    'help_topic_id' => '559',
                    'help_keyword_id' => '267'
                ],[
                    'help_topic_id' => '255',
                    'help_keyword_id' => '268'
                ],[
                    'help_topic_id' => '277',
                    'help_keyword_id' => '269'
                ],[
                    'help_topic_id' => '410',
                    'help_keyword_id' => '269'
                ],[
                    'help_topic_id' => '256',
                    'help_keyword_id' => '270'
                ],[
                    'help_topic_id' => '359',
                    'help_keyword_id' => '271'
                ],[
                    'help_topic_id' => '331',
                    'help_keyword_id' => '272'
                ],[
                    'help_topic_id' => '0',
                    'help_keyword_id' => '273'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '274'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '274'
                ],[
                    'help_topic_id' => '44',
                    'help_keyword_id' => '275'
                ],[
                    'help_topic_id' => '103',
                    'help_keyword_id' => '275'
                ],[
                    'help_topic_id' => '125',
                    'help_keyword_id' => '275'
                ],[
                    'help_topic_id' => '131',
                    'help_keyword_id' => '275'
                ],[
                    'help_topic_id' => '216',
                    'help_keyword_id' => '275'
                ],[
                    'help_topic_id' => '230',
                    'help_keyword_id' => '275'
                ],[
                    'help_topic_id' => '271',
                    'help_keyword_id' => '275'
                ],[
                    'help_topic_id' => '455',
                    'help_keyword_id' => '275'
                ],[
                    'help_topic_id' => '460',
                    'help_keyword_id' => '275'
                ],[
                    'help_topic_id' => '559',
                    'help_keyword_id' => '275'
                ],[
                    'help_topic_id' => '566',
                    'help_keyword_id' => '275'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '275'
                ],[
                    'help_topic_id' => '619',
                    'help_keyword_id' => '275'
                ],[
                    'help_topic_id' => '0',
                    'help_keyword_id' => '276'
                ],[
                    'help_topic_id' => '262',
                    'help_keyword_id' => '277'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '278'
                ],[
                    'help_topic_id' => '529',
                    'help_keyword_id' => '278'
                ],[
                    'help_topic_id' => '578',
                    'help_keyword_id' => '279'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '280'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '280'
                ],[
                    'help_topic_id' => '264',
                    'help_keyword_id' => '281'
                ],[
                    'help_topic_id' => '142',
                    'help_keyword_id' => '282'
                ],[
                    'help_topic_id' => '611',
                    'help_keyword_id' => '282'
                ],[
                    'help_topic_id' => '131',
                    'help_keyword_id' => '283'
                ],[
                    'help_topic_id' => '260',
                    'help_keyword_id' => '283'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '283'
                ],[
                    'help_topic_id' => '235',
                    'help_keyword_id' => '284'
                ],[
                    'help_topic_id' => '364',
                    'help_keyword_id' => '284'
                ],[
                    'help_topic_id' => '370',
                    'help_keyword_id' => '284'
                ],[
                    'help_topic_id' => '559',
                    'help_keyword_id' => '284'
                ],[
                    'help_topic_id' => '131',
                    'help_keyword_id' => '285'
                ],[
                    'help_topic_id' => '273',
                    'help_keyword_id' => '286'
                ],[
                    'help_topic_id' => '125',
                    'help_keyword_id' => '287'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '287'
                ],[
                    'help_topic_id' => '617',
                    'help_keyword_id' => '287'
                ],[
                    'help_topic_id' => '274',
                    'help_keyword_id' => '288'
                ],[
                    'help_topic_id' => '275',
                    'help_keyword_id' => '289'
                ],[
                    'help_topic_id' => '483',
                    'help_keyword_id' => '290'
                ],[
                    'help_topic_id' => '277',
                    'help_keyword_id' => '291'
                ],[
                    'help_topic_id' => '370',
                    'help_keyword_id' => '292'
                ],[
                    'help_topic_id' => '393',
                    'help_keyword_id' => '293'
                ],[
                    'help_topic_id' => '279',
                    'help_keyword_id' => '294'
                ],[
                    'help_topic_id' => '280',
                    'help_keyword_id' => '295'
                ],[
                    'help_topic_id' => '334',
                    'help_keyword_id' => '296'
                ],[
                    'help_topic_id' => '481',
                    'help_keyword_id' => '296'
                ],[
                    'help_topic_id' => '617',
                    'help_keyword_id' => '296'
                ],[
                    'help_topic_id' => '281',
                    'help_keyword_id' => '297'
                ],[
                    'help_topic_id' => '277',
                    'help_keyword_id' => '298'
                ],[
                    'help_topic_id' => '350',
                    'help_keyword_id' => '299'
                ],[
                    'help_topic_id' => '127',
                    'help_keyword_id' => '300'
                ],[
                    'help_topic_id' => '229',
                    'help_keyword_id' => '300'
                ],[
                    'help_topic_id' => '283',
                    'help_keyword_id' => '300'
                ],[
                    'help_topic_id' => '368',
                    'help_keyword_id' => '300'
                ],[
                    'help_topic_id' => '285',
                    'help_keyword_id' => '301'
                ],[
                    'help_topic_id' => '127',
                    'help_keyword_id' => '302'
                ],[
                    'help_topic_id' => '364',
                    'help_keyword_id' => '302'
                ],[
                    'help_topic_id' => '368',
                    'help_keyword_id' => '302'
                ],[
                    'help_topic_id' => '370',
                    'help_keyword_id' => '302'
                ],[
                    'help_topic_id' => '412',
                    'help_keyword_id' => '302'
                ],[
                    'help_topic_id' => '502',
                    'help_keyword_id' => '302'
                ],[
                    'help_topic_id' => '328',
                    'help_keyword_id' => '303'
                ],[
                    'help_topic_id' => '121',
                    'help_keyword_id' => '304'
                ],[
                    'help_topic_id' => '619',
                    'help_keyword_id' => '304'
                ],[
                    'help_topic_id' => '117',
                    'help_keyword_id' => '305'
                ],[
                    'help_topic_id' => '208',
                    'help_keyword_id' => '306'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '307'
                ],[
                    'help_topic_id' => '410',
                    'help_keyword_id' => '308'
                ],[
                    'help_topic_id' => '509',
                    'help_keyword_id' => '308'
                ],[
                    'help_topic_id' => '587',
                    'help_keyword_id' => '308'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '309'
                ],[
                    'help_topic_id' => '5',
                    'help_keyword_id' => '310'
                ],[
                    'help_topic_id' => '24',
                    'help_keyword_id' => '310'
                ],[
                    'help_topic_id' => '302',
                    'help_keyword_id' => '310'
                ],[
                    'help_topic_id' => '334',
                    'help_keyword_id' => '310'
                ],[
                    'help_topic_id' => '364',
                    'help_keyword_id' => '310'
                ],[
                    'help_topic_id' => '370',
                    'help_keyword_id' => '310'
                ],[
                    'help_topic_id' => '412',
                    'help_keyword_id' => '310'
                ],[
                    'help_topic_id' => '434',
                    'help_keyword_id' => '310'
                ],[
                    'help_topic_id' => '481',
                    'help_keyword_id' => '310'
                ],[
                    'help_topic_id' => '495',
                    'help_keyword_id' => '310'
                ],[
                    'help_topic_id' => '513',
                    'help_keyword_id' => '310'
                ],[
                    'help_topic_id' => '559',
                    'help_keyword_id' => '310'
                ],[
                    'help_topic_id' => '398',
                    'help_keyword_id' => '311'
                ],[
                    'help_topic_id' => '171',
                    'help_keyword_id' => '312'
                ],[
                    'help_topic_id' => '290',
                    'help_keyword_id' => '313'
                ],[
                    'help_topic_id' => '294',
                    'help_keyword_id' => '313'
                ],[
                    'help_topic_id' => '364',
                    'help_keyword_id' => '313'
                ],[
                    'help_topic_id' => '453',
                    'help_keyword_id' => '313'
                ],[
                    'help_topic_id' => '509',
                    'help_keyword_id' => '313'
                ],[
                    'help_topic_id' => '513',
                    'help_keyword_id' => '313'
                ],[
                    'help_topic_id' => '559',
                    'help_keyword_id' => '313'
                ],[
                    'help_topic_id' => '503',
                    'help_keyword_id' => '314'
                ],[
                    'help_topic_id' => '612',
                    'help_keyword_id' => '315'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '316'
                ],[
                    'help_topic_id' => '291',
                    'help_keyword_id' => '317'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '318'
                ],[
                    'help_topic_id' => '519',
                    'help_keyword_id' => '319'
                ],[
                    'help_topic_id' => '322',
                    'help_keyword_id' => '320'
                ],[
                    'help_topic_id' => '380',
                    'help_keyword_id' => '320'
                ],[
                    'help_topic_id' => '623',
                    'help_keyword_id' => '320'
                ],[
                    'help_topic_id' => '156',
                    'help_keyword_id' => '321'
                ],[
                    'help_topic_id' => '295',
                    'help_keyword_id' => '322'
                ],[
                    'help_topic_id' => '296',
                    'help_keyword_id' => '323'
                ],[
                    'help_topic_id' => '29',
                    'help_keyword_id' => '324'
                ],[
                    'help_topic_id' => '277',
                    'help_keyword_id' => '324'
                ],[
                    'help_topic_id' => '410',
                    'help_keyword_id' => '324'
                ],[
                    'help_topic_id' => '587',
                    'help_keyword_id' => '324'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '325'
                ],[
                    'help_topic_id' => '300',
                    'help_keyword_id' => '326'
                ],[
                    'help_topic_id' => '364',
                    'help_keyword_id' => '327'
                ],[
                    'help_topic_id' => '559',
                    'help_keyword_id' => '327'
                ],[
                    'help_topic_id' => '131',
                    'help_keyword_id' => '328'
                ],[
                    'help_topic_id' => '294',
                    'help_keyword_id' => '328'
                ],[
                    'help_topic_id' => '412',
                    'help_keyword_id' => '328'
                ],[
                    'help_topic_id' => '434',
                    'help_keyword_id' => '328'
                ],[
                    'help_topic_id' => '501',
                    'help_keyword_id' => '328'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '328'
                ],[
                    'help_topic_id' => '229',
                    'help_keyword_id' => '329'
                ],[
                    'help_topic_id' => '368',
                    'help_keyword_id' => '329'
                ],[
                    'help_topic_id' => '617',
                    'help_keyword_id' => '329'
                ],[
                    'help_topic_id' => '304',
                    'help_keyword_id' => '330'
                ],[
                    'help_topic_id' => '303',
                    'help_keyword_id' => '331'
                ],[
                    'help_topic_id' => '288',
                    'help_keyword_id' => '332'
                ],[
                    'help_topic_id' => '578',
                    'help_keyword_id' => '333'
                ],[
                    'help_topic_id' => '164',
                    'help_keyword_id' => '334'
                ],[
                    'help_topic_id' => '309',
                    'help_keyword_id' => '335'
                ],[
                    'help_topic_id' => '131',
                    'help_keyword_id' => '336'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '336'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '336'
                ],[
                    'help_topic_id' => '311',
                    'help_keyword_id' => '337'
                ],[
                    'help_topic_id' => '314',
                    'help_keyword_id' => '338'
                ],[
                    'help_topic_id' => '125',
                    'help_keyword_id' => '339'
                ],[
                    'help_topic_id' => '315',
                    'help_keyword_id' => '339'
                ],[
                    'help_topic_id' => '316',
                    'help_keyword_id' => '340'
                ],[
                    'help_topic_id' => '317',
                    'help_keyword_id' => '341'
                ],[
                    'help_topic_id' => '197',
                    'help_keyword_id' => '342'
                ],[
                    'help_topic_id' => '231',
                    'help_keyword_id' => '342'
                ],[
                    'help_topic_id' => '604',
                    'help_keyword_id' => '342'
                ],[
                    'help_topic_id' => '121',
                    'help_keyword_id' => '343'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '344'
                ],[
                    'help_topic_id' => '446',
                    'help_keyword_id' => '344'
                ],[
                    'help_topic_id' => '318',
                    'help_keyword_id' => '345'
                ],[
                    'help_topic_id' => '441',
                    'help_keyword_id' => '346'
                ],[
                    'help_topic_id' => '143',
                    'help_keyword_id' => '347'
                ],[
                    'help_topic_id' => '322',
                    'help_keyword_id' => '348'
                ],[
                    'help_topic_id' => '398',
                    'help_keyword_id' => '348'
                ],[
                    'help_topic_id' => '578',
                    'help_keyword_id' => '348'
                ],[
                    'help_topic_id' => '324',
                    'help_keyword_id' => '349'
                ],[
                    'help_topic_id' => '370',
                    'help_keyword_id' => '350'
                ],[
                    'help_topic_id' => '406',
                    'help_keyword_id' => '351'
                ],[
                    'help_topic_id' => '370',
                    'help_keyword_id' => '352'
                ],[
                    'help_topic_id' => '566',
                    'help_keyword_id' => '352'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '353'
                ],[
                    'help_topic_id' => '330',
                    'help_keyword_id' => '353'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '353'
                ],[
                    'help_topic_id' => '578',
                    'help_keyword_id' => '353'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '353'
                ],[
                    'help_topic_id' => '142',
                    'help_keyword_id' => '354'
                ],[
                    'help_topic_id' => '369',
                    'help_keyword_id' => '355'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '355'
                ],[
                    'help_topic_id' => '64',
                    'help_keyword_id' => '356'
                ],[
                    'help_topic_id' => '142',
                    'help_keyword_id' => '356'
                ],[
                    'help_topic_id' => '313',
                    'help_keyword_id' => '356'
                ],[
                    'help_topic_id' => '231',
                    'help_keyword_id' => '357'
                ],[
                    'help_topic_id' => '322',
                    'help_keyword_id' => '357'
                ],[
                    'help_topic_id' => '380',
                    'help_keyword_id' => '357'
                ],[
                    'help_topic_id' => '465',
                    'help_keyword_id' => '357'
                ],[
                    'help_topic_id' => '604',
                    'help_keyword_id' => '357'
                ],[
                    'help_topic_id' => '428',
                    'help_keyword_id' => '358'
                ],[
                    'help_topic_id' => '432',
                    'help_keyword_id' => '359'
                ],[
                    'help_topic_id' => '384',
                    'help_keyword_id' => '360'
                ],[
                    'help_topic_id' => '5',
                    'help_keyword_id' => '361'
                ],[
                    'help_topic_id' => '57',
                    'help_keyword_id' => '361'
                ],[
                    'help_topic_id' => '166',
                    'help_keyword_id' => '361'
                ],[
                    'help_topic_id' => '254',
                    'help_keyword_id' => '361'
                ],[
                    'help_topic_id' => '259',
                    'help_keyword_id' => '361'
                ],[
                    'help_topic_id' => '334',
                    'help_keyword_id' => '361'
                ],[
                    'help_topic_id' => '336',
                    'help_keyword_id' => '361'
                ],[
                    'help_topic_id' => '434',
                    'help_keyword_id' => '361'
                ],[
                    'help_topic_id' => '461',
                    'help_keyword_id' => '361'
                ],[
                    'help_topic_id' => '481',
                    'help_keyword_id' => '361'
                ],[
                    'help_topic_id' => '495',
                    'help_keyword_id' => '361'
                ],[
                    'help_topic_id' => '513',
                    'help_keyword_id' => '361'
                ],[
                    'help_topic_id' => '573',
                    'help_keyword_id' => '361'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '361'
                ],[
                    'help_topic_id' => '619',
                    'help_keyword_id' => '361'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '362'
                ],[
                    'help_topic_id' => '125',
                    'help_keyword_id' => '363'
                ],[
                    'help_topic_id' => '364',
                    'help_keyword_id' => '363'
                ],[
                    'help_topic_id' => '559',
                    'help_keyword_id' => '363'
                ],[
                    'help_topic_id' => '432',
                    'help_keyword_id' => '364'
                ],[
                    'help_topic_id' => '337',
                    'help_keyword_id' => '365'
                ],[
                    'help_topic_id' => '260',
                    'help_keyword_id' => '366'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '366'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '366'
                ],[
                    'help_topic_id' => '189',
                    'help_keyword_id' => '367'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '367'
                ],[
                    'help_topic_id' => '330',
                    'help_keyword_id' => '367'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '367'
                ],[
                    'help_topic_id' => '598',
                    'help_keyword_id' => '367'
                ],[
                    'help_topic_id' => '35',
                    'help_keyword_id' => '368'
                ],[
                    'help_topic_id' => '53',
                    'help_keyword_id' => '368'
                ],[
                    'help_topic_id' => '125',
                    'help_keyword_id' => '368'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '368'
                ],[
                    'help_topic_id' => '364',
                    'help_keyword_id' => '368'
                ],[
                    'help_topic_id' => '398',
                    'help_keyword_id' => '368'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '368'
                ],[
                    'help_topic_id' => '536',
                    'help_keyword_id' => '368'
                ],[
                    'help_topic_id' => '559',
                    'help_keyword_id' => '368'
                ],[
                    'help_topic_id' => '578',
                    'help_keyword_id' => '368'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '368'
                ],[
                    'help_topic_id' => '340',
                    'help_keyword_id' => '369'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '370'
                ],[
                    'help_topic_id' => '617',
                    'help_keyword_id' => '370'
                ],[
                    'help_topic_id' => '235',
                    'help_keyword_id' => '371'
                ],[
                    'help_topic_id' => '131',
                    'help_keyword_id' => '372'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '372'
                ],[
                    'help_topic_id' => '294',
                    'help_keyword_id' => '372'
                ],[
                    'help_topic_id' => '578',
                    'help_keyword_id' => '372'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '372'
                ],[
                    'help_topic_id' => '0',
                    'help_keyword_id' => '373'
                ],[
                    'help_topic_id' => '35',
                    'help_keyword_id' => '373'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '373'
                ],[
                    'help_topic_id' => '322',
                    'help_keyword_id' => '373'
                ],[
                    'help_topic_id' => '380',
                    'help_keyword_id' => '373'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '373'
                ],[
                    'help_topic_id' => '578',
                    'help_keyword_id' => '373'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '373'
                ],[
                    'help_topic_id' => '64',
                    'help_keyword_id' => '374'
                ],[
                    'help_topic_id' => '504',
                    'help_keyword_id' => '374'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '375'
                ],[
                    'help_topic_id' => '343',
                    'help_keyword_id' => '376'
                ],[
                    'help_topic_id' => '197',
                    'help_keyword_id' => '377'
                ],[
                    'help_topic_id' => '231',
                    'help_keyword_id' => '377'
                ],[
                    'help_topic_id' => '604',
                    'help_keyword_id' => '377'
                ],[
                    'help_topic_id' => '432',
                    'help_keyword_id' => '378'
                ],[
                    'help_topic_id' => '197',
                    'help_keyword_id' => '379'
                ],[
                    'help_topic_id' => '231',
                    'help_keyword_id' => '379'
                ],[
                    'help_topic_id' => '604',
                    'help_keyword_id' => '379'
                ],[
                    'help_topic_id' => '125',
                    'help_keyword_id' => '380'
                ],[
                    'help_topic_id' => '364',
                    'help_keyword_id' => '380'
                ],[
                    'help_topic_id' => '559',
                    'help_keyword_id' => '380'
                ],[
                    'help_topic_id' => '350',
                    'help_keyword_id' => '381'
                ],[
                    'help_topic_id' => '197',
                    'help_keyword_id' => '382'
                ],[
                    'help_topic_id' => '231',
                    'help_keyword_id' => '382'
                ],[
                    'help_topic_id' => '604',
                    'help_keyword_id' => '382'
                ],[
                    'help_topic_id' => '35',
                    'help_keyword_id' => '383'
                ],[
                    'help_topic_id' => '53',
                    'help_keyword_id' => '383'
                ],[
                    'help_topic_id' => '69',
                    'help_keyword_id' => '383'
                ],[
                    'help_topic_id' => '330',
                    'help_keyword_id' => '383'
                ],[
                    'help_topic_id' => '500',
                    'help_keyword_id' => '383'
                ],[
                    'help_topic_id' => '223',
                    'help_keyword_id' => '384'
                ],[
                    'help_topic_id' => '370',
                    'help_keyword_id' => '384'
                ],[
                    'help_topic_id' => '495',
                    'help_keyword_id' => '384'
                ],[
                    'help_topic_id' => '566',
                    'help_keyword_id' => '384'
                ],[
                    'help_topic_id' => '125',
                    'help_keyword_id' => '385'
                ],[
                    'help_topic_id' => '0',
                    'help_keyword_id' => '386'
                ],[
                    'help_topic_id' => '53',
                    'help_keyword_id' => '386'
                ],[
                    'help_topic_id' => '380',
                    'help_keyword_id' => '386'
                ],[
                    'help_topic_id' => '398',
                    'help_keyword_id' => '386'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '386'
                ],[
                    'help_topic_id' => '578',
                    'help_keyword_id' => '386'
                ],[
                    'help_topic_id' => '355',
                    'help_keyword_id' => '387'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '388'
                ],[
                    'help_topic_id' => '35',
                    'help_keyword_id' => '389'
                ],[
                    'help_topic_id' => '260',
                    'help_keyword_id' => '389'
                ],[
                    'help_topic_id' => '288',
                    'help_keyword_id' => '389'
                ],[
                    'help_topic_id' => '142',
                    'help_keyword_id' => '390'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '391'
                ],[
                    'help_topic_id' => '362',
                    'help_keyword_id' => '392'
                ],[
                    'help_topic_id' => '242',
                    'help_keyword_id' => '393'
                ],[
                    'help_topic_id' => '60',
                    'help_keyword_id' => '394'
                ],[
                    'help_topic_id' => '0',
                    'help_keyword_id' => '395'
                ],[
                    'help_topic_id' => '171',
                    'help_keyword_id' => '396'
                ],[
                    'help_topic_id' => '432',
                    'help_keyword_id' => '396'
                ],[
                    'help_topic_id' => '605',
                    'help_keyword_id' => '396'
                ],[
                    'help_topic_id' => '328',
                    'help_keyword_id' => '397'
                ],[
                    'help_topic_id' => '432',
                    'help_keyword_id' => '397'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '397'
                ],[
                    'help_topic_id' => '365',
                    'help_keyword_id' => '398'
                ],[
                    'help_topic_id' => '367',
                    'help_keyword_id' => '399'
                ],[
                    'help_topic_id' => '197',
                    'help_keyword_id' => '400'
                ],[
                    'help_topic_id' => '231',
                    'help_keyword_id' => '400'
                ],[
                    'help_topic_id' => '604',
                    'help_keyword_id' => '400'
                ],[
                    'help_topic_id' => '164',
                    'help_keyword_id' => '401'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '402'
                ],[
                    'help_topic_id' => '121',
                    'help_keyword_id' => '403'
                ],[
                    'help_topic_id' => '235',
                    'help_keyword_id' => '404'
                ],[
                    'help_topic_id' => '372',
                    'help_keyword_id' => '405'
                ],[
                    'help_topic_id' => '161',
                    'help_keyword_id' => '406'
                ],[
                    'help_topic_id' => '373',
                    'help_keyword_id' => '407'
                ],[
                    'help_topic_id' => '362',
                    'help_keyword_id' => '408'
                ],[
                    'help_topic_id' => '375',
                    'help_keyword_id' => '409'
                ],[
                    'help_topic_id' => '13',
                    'help_keyword_id' => '410'
                ],[
                    'help_topic_id' => '117',
                    'help_keyword_id' => '410'
                ],[
                    'help_topic_id' => '196',
                    'help_keyword_id' => '410'
                ],[
                    'help_topic_id' => '210',
                    'help_keyword_id' => '410'
                ],[
                    'help_topic_id' => '271',
                    'help_keyword_id' => '410'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '410'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '410'
                ],[
                    'help_topic_id' => '573',
                    'help_keyword_id' => '410'
                ],[
                    'help_topic_id' => '624',
                    'help_keyword_id' => '410'
                ],[
                    'help_topic_id' => '369',
                    'help_keyword_id' => '411'
                ],[
                    'help_topic_id' => '378',
                    'help_keyword_id' => '412'
                ],[
                    'help_topic_id' => '509',
                    'help_keyword_id' => '413'
                ],[
                    'help_topic_id' => '379',
                    'help_keyword_id' => '414'
                ],[
                    'help_topic_id' => '487',
                    'help_keyword_id' => '415'
                ],[
                    'help_topic_id' => '123',
                    'help_keyword_id' => '416'
                ],[
                    'help_topic_id' => '195',
                    'help_keyword_id' => '416'
                ],[
                    'help_topic_id' => '380',
                    'help_keyword_id' => '416'
                ],[
                    'help_topic_id' => '623',
                    'help_keyword_id' => '416'
                ],[
                    'help_topic_id' => '267',
                    'help_keyword_id' => '417'
                ],[
                    'help_topic_id' => '358',
                    'help_keyword_id' => '417'
                ],[
                    'help_topic_id' => '511',
                    'help_keyword_id' => '417'
                ],[
                    'help_topic_id' => '382',
                    'help_keyword_id' => '418'
                ],[
                    'help_topic_id' => '294',
                    'help_keyword_id' => '419'
                ],[
                    'help_topic_id' => '383',
                    'help_keyword_id' => '420'
                ],[
                    'help_topic_id' => '5',
                    'help_keyword_id' => '421'
                ],[
                    'help_topic_id' => '334',
                    'help_keyword_id' => '421'
                ],[
                    'help_topic_id' => '364',
                    'help_keyword_id' => '421'
                ],[
                    'help_topic_id' => '370',
                    'help_keyword_id' => '421'
                ],[
                    'help_topic_id' => '412',
                    'help_keyword_id' => '421'
                ],[
                    'help_topic_id' => '434',
                    'help_keyword_id' => '421'
                ],[
                    'help_topic_id' => '481',
                    'help_keyword_id' => '421'
                ],[
                    'help_topic_id' => '495',
                    'help_keyword_id' => '421'
                ],[
                    'help_topic_id' => '513',
                    'help_keyword_id' => '421'
                ],[
                    'help_topic_id' => '559',
                    'help_keyword_id' => '421'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '422'
                ],[
                    'help_topic_id' => '539',
                    'help_keyword_id' => '422'
                ],[
                    'help_topic_id' => '384',
                    'help_keyword_id' => '423'
                ],[
                    'help_topic_id' => '410',
                    'help_keyword_id' => '424'
                ],[
                    'help_topic_id' => '587',
                    'help_keyword_id' => '424'
                ],[
                    'help_topic_id' => '605',
                    'help_keyword_id' => '424'
                ],[
                    'help_topic_id' => '131',
                    'help_keyword_id' => '425'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '425'
                ],[
                    'help_topic_id' => '322',
                    'help_keyword_id' => '425'
                ],[
                    'help_topic_id' => '364',
                    'help_keyword_id' => '425'
                ],[
                    'help_topic_id' => '380',
                    'help_keyword_id' => '425'
                ],[
                    'help_topic_id' => '412',
                    'help_keyword_id' => '425'
                ],[
                    'help_topic_id' => '440',
                    'help_keyword_id' => '425'
                ],[
                    'help_topic_id' => '465',
                    'help_keyword_id' => '425'
                ],[
                    'help_topic_id' => '559',
                    'help_keyword_id' => '425'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '425'
                ],[
                    'help_topic_id' => '617',
                    'help_keyword_id' => '425'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '426'
                ],[
                    'help_topic_id' => '208',
                    'help_keyword_id' => '427'
                ],[
                    'help_topic_id' => '288',
                    'help_keyword_id' => '427'
                ],[
                    'help_topic_id' => '387',
                    'help_keyword_id' => '427'
                ],[
                    'help_topic_id' => '614',
                    'help_keyword_id' => '427'
                ],[
                    'help_topic_id' => '389',
                    'help_keyword_id' => '428'
                ],[
                    'help_topic_id' => '387',
                    'help_keyword_id' => '429'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '429'
                ],[
                    'help_topic_id' => '231',
                    'help_keyword_id' => '430'
                ],[
                    'help_topic_id' => '604',
                    'help_keyword_id' => '430'
                ],[
                    'help_topic_id' => '96',
                    'help_keyword_id' => '431'
                ],[
                    'help_topic_id' => '167',
                    'help_keyword_id' => '431'
                ],[
                    'help_topic_id' => '339',
                    'help_keyword_id' => '431'
                ],[
                    'help_topic_id' => '391',
                    'help_keyword_id' => '431'
                ],[
                    'help_topic_id' => '576',
                    'help_keyword_id' => '432'
                ],[
                    'help_topic_id' => '137',
                    'help_keyword_id' => '433'
                ],[
                    'help_topic_id' => '395',
                    'help_keyword_id' => '434'
                ],[
                    'help_topic_id' => '53',
                    'help_keyword_id' => '435'
                ],[
                    'help_topic_id' => '115',
                    'help_keyword_id' => '435'
                ],[
                    'help_topic_id' => '131',
                    'help_keyword_id' => '435'
                ],[
                    'help_topic_id' => '212',
                    'help_keyword_id' => '435'
                ],[
                    'help_topic_id' => '231',
                    'help_keyword_id' => '435'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '435'
                ],[
                    'help_topic_id' => '299',
                    'help_keyword_id' => '435'
                ],[
                    'help_topic_id' => '308',
                    'help_keyword_id' => '435'
                ],[
                    'help_topic_id' => '310',
                    'help_keyword_id' => '435'
                ],[
                    'help_topic_id' => '322',
                    'help_keyword_id' => '435'
                ],[
                    'help_topic_id' => '359',
                    'help_keyword_id' => '435'
                ],[
                    'help_topic_id' => '380',
                    'help_keyword_id' => '435'
                ],[
                    'help_topic_id' => '396',
                    'help_keyword_id' => '435'
                ],[
                    'help_topic_id' => '398',
                    'help_keyword_id' => '435'
                ],[
                    'help_topic_id' => '410',
                    'help_keyword_id' => '435'
                ],[
                    'help_topic_id' => '412',
                    'help_keyword_id' => '435'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '435'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '435'
                ],[
                    'help_topic_id' => '578',
                    'help_keyword_id' => '435'
                ],[
                    'help_topic_id' => '604',
                    'help_keyword_id' => '435'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '435'
                ],[
                    'help_topic_id' => '617',
                    'help_keyword_id' => '435'
                ],[
                    'help_topic_id' => '397',
                    'help_keyword_id' => '436'
                ],[
                    'help_topic_id' => '125',
                    'help_keyword_id' => '437'
                ],[
                    'help_topic_id' => '364',
                    'help_keyword_id' => '437'
                ],[
                    'help_topic_id' => '559',
                    'help_keyword_id' => '437'
                ],[
                    'help_topic_id' => '400',
                    'help_keyword_id' => '438'
                ],[
                    'help_topic_id' => '41',
                    'help_keyword_id' => '439'
                ],[
                    'help_topic_id' => '135',
                    'help_keyword_id' => '439'
                ],[
                    'help_topic_id' => '138',
                    'help_keyword_id' => '439'
                ],[
                    'help_topic_id' => '210',
                    'help_keyword_id' => '439'
                ],[
                    'help_topic_id' => '405',
                    'help_keyword_id' => '439'
                ],[
                    'help_topic_id' => '516',
                    'help_keyword_id' => '439'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '439'
                ],[
                    'help_topic_id' => '539',
                    'help_keyword_id' => '439'
                ],[
                    'help_topic_id' => '0',
                    'help_keyword_id' => '440'
                ],[
                    'help_topic_id' => '263',
                    'help_keyword_id' => '441'
                ],[
                    'help_topic_id' => '348',
                    'help_keyword_id' => '442'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '443'
                ],[
                    'help_topic_id' => '602',
                    'help_keyword_id' => '444'
                ],[
                    'help_topic_id' => '161',
                    'help_keyword_id' => '445'
                ],[
                    'help_topic_id' => '406',
                    'help_keyword_id' => '446'
                ],[
                    'help_topic_id' => '407',
                    'help_keyword_id' => '447'
                ],[
                    'help_topic_id' => '461',
                    'help_keyword_id' => '448'
                ],[
                    'help_topic_id' => '348',
                    'help_keyword_id' => '449'
                ],[
                    'help_topic_id' => '509',
                    'help_keyword_id' => '449'
                ],[
                    'help_topic_id' => '40',
                    'help_keyword_id' => '450'
                ],[
                    'help_topic_id' => '54',
                    'help_keyword_id' => '450'
                ],[
                    'help_topic_id' => '125',
                    'help_keyword_id' => '451'
                ],[
                    'help_topic_id' => '364',
                    'help_keyword_id' => '451'
                ],[
                    'help_topic_id' => '559',
                    'help_keyword_id' => '451'
                ],[
                    'help_topic_id' => '503',
                    'help_keyword_id' => '452'
                ],[
                    'help_topic_id' => '29',
                    'help_keyword_id' => '453'
                ],[
                    'help_topic_id' => '69',
                    'help_keyword_id' => '453'
                ],[
                    'help_topic_id' => '277',
                    'help_keyword_id' => '453'
                ],[
                    'help_topic_id' => '410',
                    'help_keyword_id' => '453'
                ],[
                    'help_topic_id' => '587',
                    'help_keyword_id' => '453'
                ],[
                    'help_topic_id' => '235',
                    'help_keyword_id' => '454'
                ],[
                    'help_topic_id' => '400',
                    'help_keyword_id' => '455'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '456'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '456'
                ],[
                    'help_topic_id' => '197',
                    'help_keyword_id' => '457'
                ],[
                    'help_topic_id' => '64',
                    'help_keyword_id' => '458'
                ],[
                    'help_topic_id' => '196',
                    'help_keyword_id' => '458'
                ],[
                    'help_topic_id' => '245',
                    'help_keyword_id' => '458'
                ],[
                    'help_topic_id' => '254',
                    'help_keyword_id' => '458'
                ],[
                    'help_topic_id' => '336',
                    'help_keyword_id' => '458'
                ],[
                    'help_topic_id' => '357',
                    'help_keyword_id' => '458'
                ],[
                    'help_topic_id' => '447',
                    'help_keyword_id' => '458'
                ],[
                    'help_topic_id' => '460',
                    'help_keyword_id' => '458'
                ],[
                    'help_topic_id' => '516',
                    'help_keyword_id' => '458'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '458'
                ],[
                    'help_topic_id' => '573',
                    'help_keyword_id' => '458'
                ],[
                    'help_topic_id' => '580',
                    'help_keyword_id' => '459'
                ],[
                    'help_topic_id' => '308',
                    'help_keyword_id' => '460'
                ],[
                    'help_topic_id' => '158',
                    'help_keyword_id' => '461'
                ],[
                    'help_topic_id' => '425',
                    'help_keyword_id' => '462'
                ],[
                    'help_topic_id' => '44',
                    'help_keyword_id' => '463'
                ],[
                    'help_topic_id' => '121',
                    'help_keyword_id' => '463'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '463'
                ],[
                    'help_topic_id' => '619',
                    'help_keyword_id' => '463'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '464'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '464'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '465'
                ],[
                    'help_topic_id' => '421',
                    'help_keyword_id' => '466'
                ],[
                    'help_topic_id' => '428',
                    'help_keyword_id' => '467'
                ],[
                    'help_topic_id' => '431',
                    'help_keyword_id' => '468'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '469'
                ],[
                    'help_topic_id' => '103',
                    'help_keyword_id' => '470'
                ],[
                    'help_topic_id' => '334',
                    'help_keyword_id' => '470'
                ],[
                    'help_topic_id' => '601',
                    'help_keyword_id' => '470'
                ],[
                    'help_topic_id' => '277',
                    'help_keyword_id' => '471'
                ],[
                    'help_topic_id' => '436',
                    'help_keyword_id' => '472'
                ],[
                    'help_topic_id' => '437',
                    'help_keyword_id' => '473'
                ],[
                    'help_topic_id' => '197',
                    'help_keyword_id' => '474'
                ],[
                    'help_topic_id' => '231',
                    'help_keyword_id' => '474'
                ],[
                    'help_topic_id' => '604',
                    'help_keyword_id' => '474'
                ],[
                    'help_topic_id' => '439',
                    'help_keyword_id' => '475'
                ],[
                    'help_topic_id' => '441',
                    'help_keyword_id' => '476'
                ],[
                    'help_topic_id' => '142',
                    'help_keyword_id' => '477'
                ],[
                    'help_topic_id' => '313',
                    'help_keyword_id' => '477'
                ],[
                    'help_topic_id' => '331',
                    'help_keyword_id' => '477'
                ],[
                    'help_topic_id' => '393',
                    'help_keyword_id' => '477'
                ],[
                    'help_topic_id' => '421',
                    'help_keyword_id' => '477'
                ],[
                    'help_topic_id' => '446',
                    'help_keyword_id' => '477'
                ],[
                    'help_topic_id' => '504',
                    'help_keyword_id' => '477'
                ],[
                    'help_topic_id' => '64',
                    'help_keyword_id' => '478'
                ],[
                    'help_topic_id' => '100',
                    'help_keyword_id' => '478'
                ],[
                    'help_topic_id' => '142',
                    'help_keyword_id' => '478'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '479'
                ],[
                    'help_topic_id' => '452',
                    'help_keyword_id' => '480'
                ],[
                    'help_topic_id' => '409',
                    'help_keyword_id' => '481'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '481'
                ],[
                    'help_topic_id' => '410',
                    'help_keyword_id' => '482'
                ],[
                    'help_topic_id' => '587',
                    'help_keyword_id' => '482'
                ],[
                    'help_topic_id' => '410',
                    'help_keyword_id' => '483'
                ],[
                    'help_topic_id' => '587',
                    'help_keyword_id' => '483'
                ],[
                    'help_topic_id' => '429',
                    'help_keyword_id' => '484'
                ],[
                    'help_topic_id' => '440',
                    'help_keyword_id' => '484'
                ],[
                    'help_topic_id' => '503',
                    'help_keyword_id' => '484'
                ],[
                    'help_topic_id' => '577',
                    'help_keyword_id' => '484'
                ],[
                    'help_topic_id' => '454',
                    'help_keyword_id' => '485'
                ],[
                    'help_topic_id' => '216',
                    'help_keyword_id' => '486'
                ],[
                    'help_topic_id' => '497',
                    'help_keyword_id' => '487'
                ],[
                    'help_topic_id' => '578',
                    'help_keyword_id' => '487'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '488'
                ],[
                    'help_topic_id' => '459',
                    'help_keyword_id' => '489'
                ],[
                    'help_topic_id' => '131',
                    'help_keyword_id' => '490'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '490'
                ],[
                    'help_topic_id' => '412',
                    'help_keyword_id' => '490'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '490'
                ],[
                    'help_topic_id' => '122',
                    'help_keyword_id' => '491'
                ],[
                    'help_topic_id' => '611',
                    'help_keyword_id' => '492'
                ],[
                    'help_topic_id' => '115',
                    'help_keyword_id' => '493'
                ],[
                    'help_topic_id' => '277',
                    'help_keyword_id' => '493'
                ],[
                    'help_topic_id' => '396',
                    'help_keyword_id' => '493'
                ],[
                    'help_topic_id' => '405',
                    'help_keyword_id' => '493'
                ],[
                    'help_topic_id' => '529',
                    'help_keyword_id' => '493'
                ],[
                    'help_topic_id' => '599',
                    'help_keyword_id' => '494'
                ],[
                    'help_topic_id' => '40',
                    'help_keyword_id' => '495'
                ],[
                    'help_topic_id' => '54',
                    'help_keyword_id' => '495'
                ],[
                    'help_topic_id' => '463',
                    'help_keyword_id' => '496'
                ],[
                    'help_topic_id' => '464',
                    'help_keyword_id' => '497'
                ],[
                    'help_topic_id' => '0',
                    'help_keyword_id' => '498'
                ],[
                    'help_topic_id' => '29',
                    'help_keyword_id' => '498'
                ],[
                    'help_topic_id' => '364',
                    'help_keyword_id' => '498'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '498'
                ],[
                    'help_topic_id' => '559',
                    'help_keyword_id' => '498'
                ],[
                    'help_topic_id' => '512',
                    'help_keyword_id' => '499'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '500'
                ],[
                    'help_topic_id' => '467',
                    'help_keyword_id' => '501'
                ],[
                    'help_topic_id' => '468',
                    'help_keyword_id' => '502'
                ],[
                    'help_topic_id' => '435',
                    'help_keyword_id' => '503'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '503'
                ],[
                    'help_topic_id' => '328',
                    'help_keyword_id' => '504'
                ],[
                    'help_topic_id' => '0',
                    'help_keyword_id' => '505'
                ],[
                    'help_topic_id' => '197',
                    'help_keyword_id' => '506'
                ],[
                    'help_topic_id' => '231',
                    'help_keyword_id' => '506'
                ],[
                    'help_topic_id' => '604',
                    'help_keyword_id' => '506'
                ],[
                    'help_topic_id' => '364',
                    'help_keyword_id' => '507'
                ],[
                    'help_topic_id' => '559',
                    'help_keyword_id' => '507'
                ],[
                    'help_topic_id' => '509',
                    'help_keyword_id' => '508'
                ],[
                    'help_topic_id' => '137',
                    'help_keyword_id' => '509'
                ],[
                    'help_topic_id' => '125',
                    'help_keyword_id' => '510'
                ],[
                    'help_topic_id' => '130',
                    'help_keyword_id' => '510'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '510'
                ],[
                    'help_topic_id' => '364',
                    'help_keyword_id' => '510'
                ],[
                    'help_topic_id' => '369',
                    'help_keyword_id' => '510'
                ],[
                    'help_topic_id' => '559',
                    'help_keyword_id' => '510'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '510'
                ],[
                    'help_topic_id' => '472',
                    'help_keyword_id' => '511'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '512'
                ],[
                    'help_topic_id' => '370',
                    'help_keyword_id' => '513'
                ],[
                    'help_topic_id' => '566',
                    'help_keyword_id' => '513'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '513'
                ],[
                    'help_topic_id' => '186',
                    'help_keyword_id' => '514'
                ],[
                    'help_topic_id' => '476',
                    'help_keyword_id' => '515'
                ],[
                    'help_topic_id' => '64',
                    'help_keyword_id' => '516'
                ],[
                    'help_topic_id' => '480',
                    'help_keyword_id' => '517'
                ],[
                    'help_topic_id' => '0',
                    'help_keyword_id' => '518'
                ],[
                    'help_topic_id' => '44',
                    'help_keyword_id' => '518'
                ],[
                    'help_topic_id' => '57',
                    'help_keyword_id' => '518'
                ],[
                    'help_topic_id' => '67',
                    'help_keyword_id' => '518'
                ],[
                    'help_topic_id' => '130',
                    'help_keyword_id' => '518'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '518'
                ],[
                    'help_topic_id' => '497',
                    'help_keyword_id' => '518'
                ],[
                    'help_topic_id' => '500',
                    'help_keyword_id' => '518'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '518'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '518'
                ],[
                    'help_topic_id' => '370',
                    'help_keyword_id' => '519'
                ],[
                    'help_topic_id' => '566',
                    'help_keyword_id' => '519'
                ],[
                    'help_topic_id' => '432',
                    'help_keyword_id' => '520'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '521'
                ],[
                    'help_topic_id' => '176',
                    'help_keyword_id' => '522'
                ],[
                    'help_topic_id' => '484',
                    'help_keyword_id' => '523'
                ],[
                    'help_topic_id' => '485',
                    'help_keyword_id' => '524'
                ],[
                    'help_topic_id' => '364',
                    'help_keyword_id' => '525'
                ],[
                    'help_topic_id' => '559',
                    'help_keyword_id' => '525'
                ],[
                    'help_topic_id' => '488',
                    'help_keyword_id' => '526'
                ],[
                    'help_topic_id' => '503',
                    'help_keyword_id' => '527'
                ],[
                    'help_topic_id' => '491',
                    'help_keyword_id' => '528'
                ],[
                    'help_topic_id' => '313',
                    'help_keyword_id' => '529'
                ],[
                    'help_topic_id' => '331',
                    'help_keyword_id' => '529'
                ],[
                    'help_topic_id' => '393',
                    'help_keyword_id' => '529'
                ],[
                    'help_topic_id' => '421',
                    'help_keyword_id' => '529'
                ],[
                    'help_topic_id' => '446',
                    'help_keyword_id' => '529'
                ],[
                    'help_topic_id' => '504',
                    'help_keyword_id' => '529'
                ],[
                    'help_topic_id' => '125',
                    'help_keyword_id' => '530'
                ],[
                    'help_topic_id' => '432',
                    'help_keyword_id' => '531'
                ],[
                    'help_topic_id' => '432',
                    'help_keyword_id' => '532'
                ],[
                    'help_topic_id' => '432',
                    'help_keyword_id' => '533'
                ],[
                    'help_topic_id' => '494',
                    'help_keyword_id' => '534'
                ],[
                    'help_topic_id' => '121',
                    'help_keyword_id' => '535'
                ],[
                    'help_topic_id' => '259',
                    'help_keyword_id' => '535'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '535'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '535'
                ],[
                    'help_topic_id' => '539',
                    'help_keyword_id' => '535'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '535'
                ],[
                    'help_topic_id' => '619',
                    'help_keyword_id' => '535'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '536'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '536'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '537'
                ],[
                    'help_topic_id' => '498',
                    'help_keyword_id' => '538'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '538'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '539'
                ],[
                    'help_topic_id' => '161',
                    'help_keyword_id' => '540'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '540'
                ],[
                    'help_topic_id' => '536',
                    'help_keyword_id' => '540'
                ],[
                    'help_topic_id' => '142',
                    'help_keyword_id' => '541'
                ],[
                    'help_topic_id' => '234',
                    'help_keyword_id' => '541'
                ],[
                    'help_topic_id' => '505',
                    'help_keyword_id' => '541'
                ],[
                    'help_topic_id' => '369',
                    'help_keyword_id' => '542'
                ],[
                    'help_topic_id' => '446',
                    'help_keyword_id' => '543'
                ],[
                    'help_topic_id' => '357',
                    'help_keyword_id' => '544'
                ],[
                    'help_topic_id' => '624',
                    'help_keyword_id' => '544'
                ],[
                    'help_topic_id' => '510',
                    'help_keyword_id' => '545'
                ],[
                    'help_topic_id' => '121',
                    'help_keyword_id' => '546'
                ],[
                    'help_topic_id' => '345',
                    'help_keyword_id' => '546'
                ],[
                    'help_topic_id' => '455',
                    'help_keyword_id' => '546'
                ],[
                    'help_topic_id' => '121',
                    'help_keyword_id' => '547'
                ],[
                    'help_topic_id' => '512',
                    'help_keyword_id' => '548'
                ],[
                    'help_topic_id' => '125',
                    'help_keyword_id' => '549'
                ],[
                    'help_topic_id' => '364',
                    'help_keyword_id' => '549'
                ],[
                    'help_topic_id' => '559',
                    'help_keyword_id' => '549'
                ],[
                    'help_topic_id' => '145',
                    'help_keyword_id' => '550'
                ],[
                    'help_topic_id' => '370',
                    'help_keyword_id' => '551'
                ],[
                    'help_topic_id' => '30',
                    'help_keyword_id' => '552'
                ],[
                    'help_topic_id' => '171',
                    'help_keyword_id' => '552'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '552'
                ],[
                    'help_topic_id' => '587',
                    'help_keyword_id' => '553'
                ],[
                    'help_topic_id' => '515',
                    'help_keyword_id' => '554'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '555'
                ],[
                    'help_topic_id' => '197',
                    'help_keyword_id' => '556'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '557'
                ],[
                    'help_topic_id' => '92',
                    'help_keyword_id' => '558'
                ],[
                    'help_topic_id' => '518',
                    'help_keyword_id' => '559'
                ],[
                    'help_topic_id' => '288',
                    'help_keyword_id' => '560'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '560'
                ],[
                    'help_topic_id' => '519',
                    'help_keyword_id' => '561'
                ],[
                    'help_topic_id' => '521',
                    'help_keyword_id' => '562'
                ],[
                    'help_topic_id' => '520',
                    'help_keyword_id' => '563'
                ],[
                    'help_topic_id' => '322',
                    'help_keyword_id' => '564'
                ],[
                    'help_topic_id' => '380',
                    'help_keyword_id' => '564'
                ],[
                    'help_topic_id' => '525',
                    'help_keyword_id' => '565'
                ],[
                    'help_topic_id' => '507',
                    'help_keyword_id' => '566'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '566'
                ],[
                    'help_topic_id' => '13',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '20',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '27',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '30',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '41',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '52',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '78',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '104',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '107',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '120',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '135',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '138',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '177',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '189',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '210',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '212',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '223',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '245',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '263',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '290',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '306',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '330',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '357',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '358',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '402',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '405',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '409',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '435',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '483',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '500',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '501',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '511',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '516',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '529',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '539',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '598',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '624',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '626',
                    'help_keyword_id' => '567'
                ],[
                    'help_topic_id' => '78',
                    'help_keyword_id' => '568'
                ],[
                    'help_topic_id' => '530',
                    'help_keyword_id' => '568'
                ],[
                    'help_topic_id' => '531',
                    'help_keyword_id' => '569'
                ],[
                    'help_topic_id' => '92',
                    'help_keyword_id' => '570'
                ],[
                    'help_topic_id' => '533',
                    'help_keyword_id' => '570'
                ],[
                    'help_topic_id' => '235',
                    'help_keyword_id' => '571'
                ],[
                    'help_topic_id' => '161',
                    'help_keyword_id' => '572'
                ],[
                    'help_topic_id' => '195',
                    'help_keyword_id' => '572'
                ],[
                    'help_topic_id' => '322',
                    'help_keyword_id' => '572'
                ],[
                    'help_topic_id' => '380',
                    'help_keyword_id' => '572'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '572'
                ],[
                    'help_topic_id' => '104',
                    'help_keyword_id' => '573'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '573'
                ],[
                    'help_topic_id' => '294',
                    'help_keyword_id' => '574'
                ],[
                    'help_topic_id' => '72',
                    'help_keyword_id' => '575'
                ],[
                    'help_topic_id' => '331',
                    'help_keyword_id' => '575'
                ],[
                    'help_topic_id' => '432',
                    'help_keyword_id' => '576'
                ],[
                    'help_topic_id' => '398',
                    'help_keyword_id' => '577'
                ],[
                    'help_topic_id' => '578',
                    'help_keyword_id' => '577'
                ],[
                    'help_topic_id' => '76',
                    'help_keyword_id' => '578'
                ],[
                    'help_topic_id' => '553',
                    'help_keyword_id' => '578'
                ],[
                    'help_topic_id' => '125',
                    'help_keyword_id' => '579'
                ],[
                    'help_topic_id' => '230',
                    'help_keyword_id' => '580'
                ],[
                    'help_topic_id' => '294',
                    'help_keyword_id' => '580'
                ],[
                    'help_topic_id' => '410',
                    'help_keyword_id' => '581'
                ],[
                    'help_topic_id' => '587',
                    'help_keyword_id' => '581'
                ],[
                    'help_topic_id' => '125',
                    'help_keyword_id' => '582'
                ],[
                    'help_topic_id' => '364',
                    'help_keyword_id' => '582'
                ],[
                    'help_topic_id' => '559',
                    'help_keyword_id' => '582'
                ],[
                    'help_topic_id' => '78',
                    'help_keyword_id' => '583'
                ],[
                    'help_topic_id' => '263',
                    'help_keyword_id' => '583'
                ],[
                    'help_topic_id' => '330',
                    'help_keyword_id' => '583'
                ],[
                    'help_topic_id' => '369',
                    'help_keyword_id' => '583'
                ],[
                    'help_topic_id' => '500',
                    'help_keyword_id' => '583'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '583'
                ],[
                    'help_topic_id' => '197',
                    'help_keyword_id' => '584'
                ],[
                    'help_topic_id' => '554',
                    'help_keyword_id' => '585'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '586'
                ],[
                    'help_topic_id' => '557',
                    'help_keyword_id' => '587'
                ],[
                    'help_topic_id' => '56',
                    'help_keyword_id' => '588'
                ],[
                    'help_topic_id' => '125',
                    'help_keyword_id' => '588'
                ],[
                    'help_topic_id' => '558',
                    'help_keyword_id' => '589'
                ],[
                    'help_topic_id' => '142',
                    'help_keyword_id' => '590'
                ],[
                    'help_topic_id' => '161',
                    'help_keyword_id' => '590'
                ],[
                    'help_topic_id' => '561',
                    'help_keyword_id' => '591'
                ],[
                    'help_topic_id' => '188',
                    'help_keyword_id' => '592'
                ],[
                    'help_topic_id' => '432',
                    'help_keyword_id' => '593'
                ],[
                    'help_topic_id' => '565',
                    'help_keyword_id' => '594'
                ],[
                    'help_topic_id' => '5',
                    'help_keyword_id' => '595'
                ],[
                    'help_topic_id' => '230',
                    'help_keyword_id' => '595'
                ],[
                    'help_topic_id' => '294',
                    'help_keyword_id' => '595'
                ],[
                    'help_topic_id' => '432',
                    'help_keyword_id' => '596'
                ],[
                    'help_topic_id' => '79',
                    'help_keyword_id' => '597'
                ],[
                    'help_topic_id' => '235',
                    'help_keyword_id' => '598'
                ],[
                    'help_topic_id' => '235',
                    'help_keyword_id' => '599'
                ],[
                    'help_topic_id' => '328',
                    'help_keyword_id' => '600'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '601'
                ],[
                    'help_topic_id' => '91',
                    'help_keyword_id' => '602'
                ],[
                    'help_topic_id' => '570',
                    'help_keyword_id' => '603'
                ],[
                    'help_topic_id' => '71',
                    'help_keyword_id' => '604'
                ],[
                    'help_topic_id' => '453',
                    'help_keyword_id' => '604'
                ],[
                    'help_topic_id' => '566',
                    'help_keyword_id' => '604'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '604'
                ],[
                    'help_topic_id' => '130',
                    'help_keyword_id' => '605'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '605'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '605'
                ],[
                    'help_topic_id' => '375',
                    'help_keyword_id' => '606'
                ],[
                    'help_topic_id' => '294',
                    'help_keyword_id' => '607'
                ],[
                    'help_topic_id' => '574',
                    'help_keyword_id' => '608'
                ],[
                    'help_topic_id' => '575',
                    'help_keyword_id' => '609'
                ],[
                    'help_topic_id' => '0',
                    'help_keyword_id' => '610'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '610'
                ],[
                    'help_topic_id' => '7',
                    'help_keyword_id' => '611'
                ],[
                    'help_topic_id' => '580',
                    'help_keyword_id' => '612'
                ],[
                    'help_topic_id' => '581',
                    'help_keyword_id' => '613'
                ],[
                    'help_topic_id' => '125',
                    'help_keyword_id' => '614'
                ],[
                    'help_topic_id' => '294',
                    'help_keyword_id' => '614'
                ],[
                    'help_topic_id' => '299',
                    'help_keyword_id' => '614'
                ],[
                    'help_topic_id' => '364',
                    'help_keyword_id' => '614'
                ],[
                    'help_topic_id' => '509',
                    'help_keyword_id' => '614'
                ],[
                    'help_topic_id' => '559',
                    'help_keyword_id' => '614'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '614'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '615'
                ],[
                    'help_topic_id' => '69',
                    'help_keyword_id' => '616'
                ],[
                    'help_topic_id' => '358',
                    'help_keyword_id' => '617'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '617'
                ],[
                    'help_topic_id' => '310',
                    'help_keyword_id' => '618'
                ],[
                    'help_topic_id' => '481',
                    'help_keyword_id' => '619'
                ],[
                    'help_topic_id' => '277',
                    'help_keyword_id' => '620'
                ],[
                    'help_topic_id' => '585',
                    'help_keyword_id' => '621'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '622'
                ],[
                    'help_topic_id' => '129',
                    'help_keyword_id' => '623'
                ],[
                    'help_topic_id' => '328',
                    'help_keyword_id' => '624'
                ],[
                    'help_topic_id' => '587',
                    'help_keyword_id' => '625'
                ],[
                    'help_topic_id' => '588',
                    'help_keyword_id' => '626'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '627'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '627'
                ],[
                    'help_topic_id' => '209',
                    'help_keyword_id' => '628'
                ],[
                    'help_topic_id' => '410',
                    'help_keyword_id' => '628'
                ],[
                    'help_topic_id' => '587',
                    'help_keyword_id' => '628'
                ],[
                    'help_topic_id' => '306',
                    'help_keyword_id' => '629'
                ],[
                    'help_topic_id' => '260',
                    'help_keyword_id' => '630'
                ],[
                    'help_topic_id' => '589',
                    'help_keyword_id' => '631'
                ],[
                    'help_topic_id' => '125',
                    'help_keyword_id' => '632'
                ],[
                    'help_topic_id' => '364',
                    'help_keyword_id' => '632'
                ],[
                    'help_topic_id' => '559',
                    'help_keyword_id' => '632'
                ],[
                    'help_topic_id' => '235',
                    'help_keyword_id' => '633'
                ],[
                    'help_topic_id' => '592',
                    'help_keyword_id' => '634'
                ],[
                    'help_topic_id' => '597',
                    'help_keyword_id' => '635'
                ],[
                    'help_topic_id' => '599',
                    'help_keyword_id' => '636'
                ],[
                    'help_topic_id' => '600',
                    'help_keyword_id' => '637'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '638'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '638'
                ],[
                    'help_topic_id' => '604',
                    'help_keyword_id' => '639'
                ],[
                    'help_topic_id' => '27',
                    'help_keyword_id' => '640'
                ],[
                    'help_topic_id' => '605',
                    'help_keyword_id' => '641'
                ],[
                    'help_topic_id' => '606',
                    'help_keyword_id' => '642'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '643'
                ],[
                    'help_topic_id' => '607',
                    'help_keyword_id' => '644'
                ],[
                    'help_topic_id' => '69',
                    'help_keyword_id' => '645'
                ],[
                    'help_topic_id' => '609',
                    'help_keyword_id' => '646'
                ],[
                    'help_topic_id' => '500',
                    'help_keyword_id' => '647'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '647'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '647'
                ],[
                    'help_topic_id' => '35',
                    'help_keyword_id' => '648'
                ],[
                    'help_topic_id' => '53',
                    'help_keyword_id' => '648'
                ],[
                    'help_topic_id' => '69',
                    'help_keyword_id' => '648'
                ],[
                    'help_topic_id' => '78',
                    'help_keyword_id' => '648'
                ],[
                    'help_topic_id' => '263',
                    'help_keyword_id' => '648'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '648'
                ],[
                    'help_topic_id' => '44',
                    'help_keyword_id' => '649'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '649'
                ],[
                    'help_topic_id' => '380',
                    'help_keyword_id' => '649'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '649'
                ],[
                    'help_topic_id' => '617',
                    'help_keyword_id' => '649'
                ],[
                    'help_topic_id' => '143',
                    'help_keyword_id' => '650'
                ],[
                    'help_topic_id' => '612',
                    'help_keyword_id' => '651'
                ],[
                    'help_topic_id' => '197',
                    'help_keyword_id' => '652'
                ],[
                    'help_topic_id' => '231',
                    'help_keyword_id' => '652'
                ],[
                    'help_topic_id' => '604',
                    'help_keyword_id' => '652'
                ],[
                    'help_topic_id' => '615',
                    'help_keyword_id' => '653'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '654'
                ],[
                    'help_topic_id' => '614',
                    'help_keyword_id' => '654'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '655'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '655'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '656'
                ],[
                    'help_topic_id' => '465',
                    'help_keyword_id' => '656'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '657'
                ],[
                    'help_topic_id' => '617',
                    'help_keyword_id' => '657'
                ],[
                    'help_topic_id' => '121',
                    'help_keyword_id' => '658'
                ],[
                    'help_topic_id' => '619',
                    'help_keyword_id' => '658'
                ],[
                    'help_topic_id' => '277',
                    'help_keyword_id' => '659'
                ],[
                    'help_topic_id' => '396',
                    'help_keyword_id' => '659'
                ],[
                    'help_topic_id' => '405',
                    'help_keyword_id' => '659'
                ],[
                    'help_topic_id' => '529',
                    'help_keyword_id' => '659'
                ],[
                    'help_topic_id' => '138',
                    'help_keyword_id' => '660'
                ],[
                    'help_topic_id' => '339',
                    'help_keyword_id' => '660'
                ],[
                    'help_topic_id' => '348',
                    'help_keyword_id' => '660'
                ],[
                    'help_topic_id' => '370',
                    'help_keyword_id' => '660'
                ],[
                    'help_topic_id' => '409',
                    'help_keyword_id' => '660'
                ],[
                    'help_topic_id' => '509',
                    'help_keyword_id' => '660'
                ],[
                    'help_topic_id' => '566',
                    'help_keyword_id' => '660'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '661'
                ],[
                    'help_topic_id' => '536',
                    'help_keyword_id' => '661'
                ],[
                    'help_topic_id' => '370',
                    'help_keyword_id' => '662'
                ],[
                    'help_topic_id' => '566',
                    'help_keyword_id' => '662'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '662'
                ],[
                    'help_topic_id' => '578',
                    'help_keyword_id' => '663'
                ],[
                    'help_topic_id' => '125',
                    'help_keyword_id' => '664'
                ],[
                    'help_topic_id' => '364',
                    'help_keyword_id' => '664'
                ],[
                    'help_topic_id' => '559',
                    'help_keyword_id' => '664'
                ],[
                    'help_topic_id' => '629',
                    'help_keyword_id' => '665'
                ],[
                    'help_topic_id' => '63',
                    'help_keyword_id' => '666'
                ],[
                    'help_topic_id' => '267',
                    'help_keyword_id' => '666'
                ],[
                    'help_topic_id' => '321',
                    'help_keyword_id' => '666'
                ],[
                    'help_topic_id' => '490',
                    'help_keyword_id' => '666'
                ],[
                    'help_topic_id' => '498',
                    'help_keyword_id' => '666'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '666'
                ],[
                    'help_topic_id' => '536',
                    'help_keyword_id' => '666'
                ],[
                    'help_topic_id' => '549',
                    'help_keyword_id' => '666'
                ],[
                    'help_topic_id' => '29',
                    'help_keyword_id' => '667'
                ],[
                    'help_topic_id' => '208',
                    'help_keyword_id' => '667'
                ],[
                    'help_topic_id' => '288',
                    'help_keyword_id' => '667'
                ],[
                    'help_topic_id' => '387',
                    'help_keyword_id' => '667'
                ],[
                    'help_topic_id' => '398',
                    'help_keyword_id' => '667'
                ],[
                    'help_topic_id' => '578',
                    'help_keyword_id' => '667'
                ],[
                    'help_topic_id' => '614',
                    'help_keyword_id' => '667'
                ],[
                    'help_topic_id' => '432',
                    'help_keyword_id' => '668'
                ],[
                    'help_topic_id' => '630',
                    'help_keyword_id' => '669'
                ],[
                    'help_topic_id' => '631',
                    'help_keyword_id' => '670'
                ],[
                    'help_topic_id' => '125',
                    'help_keyword_id' => '671'
                ],[
                    'help_topic_id' => '29',
                    'help_keyword_id' => '672'
                ],[
                    'help_topic_id' => '189',
                    'help_keyword_id' => '672'
                ],[
                    'help_topic_id' => '402',
                    'help_keyword_id' => '672'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '672'
                ],[
                    'help_topic_id' => '628',
                    'help_keyword_id' => '673'
                ],[
                    'help_topic_id' => '208',
                    'help_keyword_id' => '674'
                ],[
                    'help_topic_id' => '22',
                    'help_keyword_id' => '675'
                ],[
                    'help_topic_id' => '17',
                    'help_keyword_id' => '676'
                ],[
                    'help_topic_id' => '166',
                    'help_keyword_id' => '676'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '676'
                ],[
                    'help_topic_id' => '528',
                    'help_keyword_id' => '677'
                ],[
                    'help_topic_id' => '626',
                    'help_keyword_id' => '677'
                ],[
                    'help_topic_id' => '380',
                    'help_keyword_id' => '678'
                ],[
                    'help_topic_id' => '535',
                    'help_keyword_id' => '678'
                ],[
                    'help_topic_id' => '130',
                    'help_keyword_id' => '679'
                ],[
                    'help_topic_id' => '69',
                    'help_keyword_id' => '680'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '680'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '680'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '681'
                ],[
                    'help_topic_id' => '121',
                    'help_keyword_id' => '682'
                ],[
                    'help_topic_id' => '619',
                    'help_keyword_id' => '682'
                ],[
                    'help_topic_id' => '30',
                    'help_keyword_id' => '683'
                ],[
                    'help_topic_id' => '41',
                    'help_keyword_id' => '683'
                ],[
                    'help_topic_id' => '167',
                    'help_keyword_id' => '683'
                ],[
                    'help_topic_id' => '171',
                    'help_keyword_id' => '683'
                ],[
                    'help_topic_id' => '432',
                    'help_keyword_id' => '683'
                ],[
                    'help_topic_id' => '292',
                    'help_keyword_id' => '684'
                ],[
                    'help_topic_id' => '610',
                    'help_keyword_id' => '684'
                ],[
                    'help_topic_id' => '207',
                    'help_keyword_id' => '685'
                ],[
                    'help_topic_id' => '459',
                    'help_keyword_id' => '685'
                ]
            ];
        $columns            = ['help_topic_id','help_keyword_id'];
        $nullableColumns    = collect([]);

        $columnList         = '`' . implode('`,`', $columns) . '`';
        $updateDuplicates   = '';

        foreach($columns as $column)
        {
            if(!empty($updateDuplicates))
            {
                $updateDuplicates .= ',';
            }
            $updateDuplicates .= "`$column` = VALUES(`$column`)";
        }

        $recordChunks   = array_chunk($records, $chunkSize);

        foreach($recordChunks as $recordChunk)
        {
            try
            {
                $values = implode("),(", array_map(function($record) use(&$nullableColumns)
                {
                    $record = collect($record)->map(function($value, $column) use(&$nullableColumns)
                    {
                        return !empty($value) ? "'$value'" : ($nullableColumns->search($column) !== false ? 'NULL' : "0");
                    })->all();
                    return implode(",", $record);
                }, $recordChunk));

                $insertQuery = "INSERT INTO `$database`.`$tableName` ($columnList) VALUES ($values) ON DUPLICATE KEY UPDATE $updateDuplicates";

                DB::connection($connection)->statement($insertQuery);
            }
            catch(\Exception $exception)
            {
                \Log::warning($exception->getMessage());
                \Log::warning($exception->getTraceAsString());
                dump('Error in ' . __FILE__ . '::exec()');
                dump($exception->getMessage());
            }
        }
    }
}