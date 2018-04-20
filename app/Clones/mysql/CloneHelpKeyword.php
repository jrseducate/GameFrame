<?php
namespace App\Clones\mysql;

use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: Jeremy
 * Date: 4/18/2018
 * Time: 11:43 PM
 */

class CloneHelpKeyword
{
    public static $tableName = 'help_keyword';

    public function exec()
    {
        $chunkSize          = 50;
        $connection         = 'mysql';
        $database           = 'mysql';
        $tableName          = self::$tableName;
        $records            = [
                [
                    'help_keyword_id' => '685',
                    'name' => '(JSON'
                ],[
                    'help_keyword_id' => '489',
                    'name' => '->'
                ],[
                    'help_keyword_id' => '206',
                    'name' => '->>'
                ],[
                    'help_keyword_id' => '673',
                    'name' => '<>'
                ],[
                    'help_keyword_id' => '525',
                    'name' => 'ACCOUNT'
                ],[
                    'help_keyword_id' => '657',
                    'name' => 'ACTION'
                ],[
                    'help_keyword_id' => '463',
                    'name' => 'ADD'
                ],[
                    'help_keyword_id' => '337',
                    'name' => 'AES_DECRYPT'
                ],[
                    'help_keyword_id' => '634',
                    'name' => 'AES_ENCRYPT'
                ],[
                    'help_keyword_id' => '512',
                    'name' => 'AFTER'
                ],[
                    'help_keyword_id' => '411',
                    'name' => 'AGAINST'
                ],[
                    'help_keyword_id' => '113',
                    'name' => 'AGGREGATE'
                ],[
                    'help_keyword_id' => '469',
                    'name' => 'ALGORITHM'
                ],[
                    'help_keyword_id' => '224',
                    'name' => 'ALL'
                ],[
                    'help_keyword_id' => '275',
                    'name' => 'ALTER'
                ],[
                    'help_keyword_id' => '305',
                    'name' => 'ANALYSE'
                ],[
                    'help_keyword_id' => '654',
                    'name' => 'ANALYZE'
                ],[
                    'help_keyword_id' => '570',
                    'name' => 'AND'
                ],[
                    'help_keyword_id' => '164',
                    'name' => 'ANY_VALUE'
                ],[
                    'help_keyword_id' => '465',
                    'name' => 'ARCHIVE'
                ],[
                    'help_keyword_id' => '545',
                    'name' => 'AREA'
                ],[
                    'help_keyword_id' => '498',
                    'name' => 'AS'
                ],[
                    'help_keyword_id' => '182',
                    'name' => 'ASBINARY'
                ],[
                    'help_keyword_id' => '661',
                    'name' => 'ASC'
                ],[
                    'help_keyword_id' => '467',
                    'name' => 'ASTEXT'
                ],[
                    'help_keyword_id' => '194',
                    'name' => 'ASWKB'
                ],[
                    'help_keyword_id' => '358',
                    'name' => 'ASWKT'
                ],[
                    'help_keyword_id' => '5',
                    'name' => 'AT'
                ],[
                    'help_keyword_id' => '155',
                    'name' => 'AUTOCOMMIT'
                ],[
                    'help_keyword_id' => '48',
                    'name' => 'AUTOEXTEND_SIZE'
                ],[
                    'help_keyword_id' => '500',
                    'name' => 'AUTO_INCREMENT'
                ],[
                    'help_keyword_id' => '464',
                    'name' => 'AVG_ROW_LENGTH'
                ],[
                    'help_keyword_id' => '223',
                    'name' => 'BEFORE'
                ],[
                    'help_keyword_id' => '628',
                    'name' => 'BEGIN'
                ],[
                    'help_keyword_id' => '558',
                    'name' => 'BETWEEN'
                ],[
                    'help_keyword_id' => '433',
                    'name' => 'BIGINT'
                ],[
                    'help_keyword_id' => '53',
                    'name' => 'BINARY'
                ],[
                    'help_keyword_id' => '568',
                    'name' => 'BINLOG'
                ],[
                    'help_keyword_id' => '575',
                    'name' => 'BOOL'
                ],[
                    'help_keyword_id' => '72',
                    'name' => 'BOOLEAN'
                ],[
                    'help_keyword_id' => '239',
                    'name' => 'BOTH'
                ],[
                    'help_keyword_id' => '679',
                    'name' => 'BTREE'
                ],[
                    'help_keyword_id' => '295',
                    'name' => 'BUFFER'
                ],[
                    'help_keyword_id' => '368',
                    'name' => 'BY'
                ],[
                    'help_keyword_id' => '492',
                    'name' => 'BYTE'
                ],[
                    'help_keyword_id' => '140',
                    'name' => 'CACHE'
                ],[
                    'help_keyword_id' => '563',
                    'name' => 'CALL'
                ],[
                    'help_keyword_id' => '192',
                    'name' => 'CASCADE'
                ],[
                    'help_keyword_id' => '450',
                    'name' => 'CASE'
                ],[
                    'help_keyword_id' => '342',
                    'name' => 'CATALOG_NAME'
                ],[
                    'help_keyword_id' => '591',
                    'name' => 'CEIL'
                ],[
                    'help_keyword_id' => '635',
                    'name' => 'CEILING'
                ],[
                    'help_keyword_id' => '631',
                    'name' => 'CENTROID'
                ],[
                    'help_keyword_id' => '208',
                    'name' => 'CHAIN'
                ],[
                    'help_keyword_id' => '397',
                    'name' => 'CHANGE'
                ],[
                    'help_keyword_id' => '282',
                    'name' => 'CHAR'
                ],[
                    'help_keyword_id' => '188',
                    'name' => 'CHARACTER'
                ],[
                    'help_keyword_id' => '460',
                    'name' => 'CHARSET'
                ],[
                    'help_keyword_id' => '366',
                    'name' => 'CHECK'
                ],[
                    'help_keyword_id' => '66',
                    'name' => 'CHECKSUM'
                ],[
                    'help_keyword_id' => '451',
                    'name' => 'CIPHER'
                ],[
                    'help_keyword_id' => '76',
                    'name' => 'CLASS_ORIGIN'
                ],[
                    'help_keyword_id' => '530',
                    'name' => 'CLIENT'
                ],[
                    'help_keyword_id' => '41',
                    'name' => 'CLOSE'
                ],[
                    'help_keyword_id' => '681',
                    'name' => 'COALESCE'
                ],[
                    'help_keyword_id' => '544',
                    'name' => 'CODE'
                ],[
                    'help_keyword_id' => '490',
                    'name' => 'COLLATE'
                ],[
                    'help_keyword_id' => '677',
                    'name' => 'COLLATION'
                ],[
                    'help_keyword_id' => '254',
                    'name' => 'COLUMN'
                ],[
                    'help_keyword_id' => '353',
                    'name' => 'COLUMNS'
                ],[
                    'help_keyword_id' => '379',
                    'name' => 'COLUMN_NAME'
                ],[
                    'help_keyword_id' => '82',
                    'name' => 'COMMENT'
                ],[
                    'help_keyword_id' => '482',
                    'name' => 'COMMIT'
                ],[
                    'help_keyword_id' => '620',
                    'name' => 'COMMITTED'
                ],[
                    'help_keyword_id' => '104',
                    'name' => 'COMPACT'
                ],[
                    'help_keyword_id' => '352',
                    'name' => 'COMPLETION'
                ],[
                    'help_keyword_id' => '307',
                    'name' => 'COMPRESSED'
                ],[
                    'help_keyword_id' => '83',
                    'name' => 'COMPRESSION'
                ],[
                    'help_keyword_id' => '577',
                    'name' => 'CONCURRENT'
                ],[
                    'help_keyword_id' => '111',
                    'name' => 'CONDITION'
                ],[
                    'help_keyword_id' => '40',
                    'name' => 'CONNECTION'
                ],[
                    'help_keyword_id' => '581',
                    'name' => 'CONSISTENT'
                ],[
                    'help_keyword_id' => '655',
                    'name' => 'CONSTRAINT'
                ],[
                    'help_keyword_id' => '474',
                    'name' => 'CONSTRAINT_CATALOG'
                ],[
                    'help_keyword_id' => '144',
                    'name' => 'CONSTRAINT_NAME'
                ],[
                    'help_keyword_id' => '652',
                    'name' => 'CONSTRAINT_SCHEMA'
                ],[
                    'help_keyword_id' => '3',
                    'name' => 'CONTAINS'
                ],[
                    'help_keyword_id' => '452',
                    'name' => 'CONTINUE'
                ],[
                    'help_keyword_id' => '145',
                    'name' => 'CONVERT'
                ],[
                    'help_keyword_id' => '496',
                    'name' => 'CONVEXHULL'
                ],[
                    'help_keyword_id' => '417',
                    'name' => 'COUNT'
                ],[
                    'help_keyword_id' => '210',
                    'name' => 'CREATE'
                ],[
                    'help_keyword_id' => '399',
                    'name' => 'CREATE_DH_PARAMETERS'
                ],[
                    'help_keyword_id' => '174',
                    'name' => 'CROSS'
                ],[
                    'help_keyword_id' => '205',
                    'name' => 'CROSSES'
                ],[
                    'help_keyword_id' => '160',
                    'name' => 'CSV'
                ],[
                    'help_keyword_id' => '54',
                    'name' => 'CURRENT_USER'
                ],[
                    'help_keyword_id' => '202',
                    'name' => 'CURSOR'
                ],[
                    'help_keyword_id' => '506',
                    'name' => 'CURSOR_NAME'
                ],[
                    'help_keyword_id' => '372',
                    'name' => 'DATA'
                ],[
                    'help_keyword_id' => '328',
                    'name' => 'DATABASE'
                ],[
                    'help_keyword_id' => '573',
                    'name' => 'DATABASES'
                ],[
                    'help_keyword_id' => '304',
                    'name' => 'DATAFILE'
                ],[
                    'help_keyword_id' => '80',
                    'name' => 'DATE'
                ],[
                    'help_keyword_id' => '354',
                    'name' => 'DATETIME'
                ],[
                    'help_keyword_id' => '246',
                    'name' => 'DATE_ADD'
                ],[
                    'help_keyword_id' => '599',
                    'name' => 'DATE_SUB'
                ],[
                    'help_keyword_id' => '371',
                    'name' => 'DAY'
                ],[
                    'help_keyword_id' => '633',
                    'name' => 'DAY_HOUR'
                ],[
                    'help_keyword_id' => '598',
                    'name' => 'DAY_MINUTE'
                ],[
                    'help_keyword_id' => '70',
                    'name' => 'DAY_SECOND'
                ],[
                    'help_keyword_id' => '448',
                    'name' => 'DEALLOCATE'
                ],[
                    'help_keyword_id' => '105',
                    'name' => 'DEC'
                ],[
                    'help_keyword_id' => '478',
                    'name' => 'DECIMAL'
                ],[
                    'help_keyword_id' => '484',
                    'name' => 'DECLARE'
                ],[
                    'help_keyword_id' => '425',
                    'name' => 'DEFAULT'
                ],[
                    'help_keyword_id' => '138',
                    'name' => 'DEFAULT_AUTH'
                ],[
                    'help_keyword_id' => '519',
                    'name' => 'DEFINER'
                ],[
                    'help_keyword_id' => '320',
                    'name' => 'DELAYED'
                ],[
                    'help_keyword_id' => '627',
                    'name' => 'DELAY_KEY_WRITE'
                ],[
                    'help_keyword_id' => '37',
                    'name' => 'DELETE'
                ],[
                    'help_keyword_id' => '540',
                    'name' => 'DESC'
                ],[
                    'help_keyword_id' => '211',
                    'name' => 'DESCRIBE'
                ],[
                    'help_keyword_id' => '306',
                    'name' => 'DES_KEY_FILE'
                ],[
                    'help_keyword_id' => '584',
                    'name' => 'DIAGNOSTICS'
                ],[
                    'help_keyword_id' => '621',
                    'name' => 'DIMENSION'
                ],[
                    'help_keyword_id' => '336',
                    'name' => 'DIRECTORY'
                ],[
                    'help_keyword_id' => '513',
                    'name' => 'DISABLE'
                ],[
                    'help_keyword_id' => '213',
                    'name' => 'DISCARD'
                ],[
                    'help_keyword_id' => '120',
                    'name' => 'DISJOINT'
                ],[
                    'help_keyword_id' => '259',
                    'name' => 'DISTANCE'
                ],[
                    'help_keyword_id' => '666',
                    'name' => 'DISTINCT'
                ],[
                    'help_keyword_id' => '200',
                    'name' => 'DISTINCTROW'
                ],[
                    'help_keyword_id' => '79',
                    'name' => 'DO'
                ],[
                    'help_keyword_id' => '361',
                    'name' => 'DROP'
                ],[
                    'help_keyword_id' => '170',
                    'name' => 'DUAL'
                ],[
                    'help_keyword_id' => '586',
                    'name' => 'DUMPFILE'
                ],[
                    'help_keyword_id' => '21',
                    'name' => 'DUPLICATE'
                ],[
                    'help_keyword_id' => '146',
                    'name' => 'DYNAMIC'
                ],[
                    'help_keyword_id' => '95',
                    'name' => 'ELSE'
                ],[
                    'help_keyword_id' => '102',
                    'name' => 'ELSEIF'
                ],[
                    'help_keyword_id' => '662',
                    'name' => 'ENABLE'
                ],[
                    'help_keyword_id' => '112',
                    'name' => 'ENCLOSED'
                ],[
                    'help_keyword_id' => '391',
                    'name' => 'ENCRYPTION'
                ],[
                    'help_keyword_id' => '228',
                    'name' => 'END'
                ],[
                    'help_keyword_id' => '414',
                    'name' => 'ENDPOINT'
                ],[
                    'help_keyword_id' => '551',
                    'name' => 'ENDS'
                ],[
                    'help_keyword_id' => '535',
                    'name' => 'ENGINE'
                ],[
                    'help_keyword_id' => '68',
                    'name' => 'ENGINES'
                ],[
                    'help_keyword_id' => '149',
                    'name' => 'ENVELOPE'
                ],[
                    'help_keyword_id' => '626',
                    'name' => 'EQUALS'
                ],[
                    'help_keyword_id' => '617',
                    'name' => 'ERRORS'
                ],[
                    'help_keyword_id' => '16',
                    'name' => 'ESCAPE'
                ],[
                    'help_keyword_id' => '279',
                    'name' => 'ESCAPED'
                ],[
                    'help_keyword_id' => '384',
                    'name' => 'EVENT'
                ],[
                    'help_keyword_id' => '17',
                    'name' => 'EVENTS'
                ],[
                    'help_keyword_id' => '292',
                    'name' => 'EVERY'
                ],[
                    'help_keyword_id' => '557',
                    'name' => 'EXCHANGE'
                ],[
                    'help_keyword_id' => '588',
                    'name' => 'EXECUTE'
                ],[
                    'help_keyword_id' => '421',
                    'name' => 'EXISTS'
                ],[
                    'help_keyword_id' => '314',
                    'name' => 'EXIT'
                ],[
                    'help_keyword_id' => '542',
                    'name' => 'EXPANSION'
                ],[
                    'help_keyword_id' => '507',
                    'name' => 'EXPIRE'
                ],[
                    'help_keyword_id' => '159',
                    'name' => 'EXPLAIN'
                ],[
                    'help_keyword_id' => '674',
                    'name' => 'EXPORT'
                ],[
                    'help_keyword_id' => '173',
                    'name' => 'EXTENDED'
                ],[
                    'help_keyword_id' => '547',
                    'name' => 'EXTENT_SIZE'
                ],[
                    'help_keyword_id' => '96',
                    'name' => 'EXTERIORRING'
                ],[
                    'help_keyword_id' => '184',
                    'name' => 'EXTRACTION)'
                ],[
                    'help_keyword_id' => '393',
                    'name' => 'FALSE'
                ],[
                    'help_keyword_id' => '218',
                    'name' => 'FAST'
                ],[
                    'help_keyword_id' => '402',
                    'name' => 'FEDERATED'
                ],[
                    'help_keyword_id' => '252',
                    'name' => 'FETCH'
                ],[
                    'help_keyword_id' => '115',
                    'name' => 'FIELDS'
                ],[
                    'help_keyword_id' => '163',
                    'name' => 'FILE'
                ],[
                    'help_keyword_id' => '343',
                    'name' => 'FILE_BLOCK_SIZE'
                ],[
                    'help_keyword_id' => '624',
                    'name' => 'FILTER'
                ],[
                    'help_keyword_id' => '680',
                    'name' => 'FIRST'
                ],[
                    'help_keyword_id' => '344',
                    'name' => 'FIXED'
                ],[
                    'help_keyword_id' => '466',
                    'name' => 'FLOAT4'
                ],[
                    'help_keyword_id' => '231',
                    'name' => 'FLOAT8'
                ],[
                    'help_keyword_id' => '509',
                    'name' => 'FLOOR'
                ],[
                    'help_keyword_id' => '209',
                    'name' => 'FLUSH'
                ],[
                    'help_keyword_id' => '106',
                    'name' => 'FOR'
                ],[
                    'help_keyword_id' => '395',
                    'name' => 'FORCE'
                ],[
                    'help_keyword_id' => '139',
                    'name' => 'FOREIGN'
                ],[
                    'help_keyword_id' => '92',
                    'name' => 'FORMAT'
                ],[
                    'help_keyword_id' => '99',
                    'name' => 'FROM'
                ],[
                    'help_keyword_id' => '367',
                    'name' => 'FULL'
                ],[
                    'help_keyword_id' => '81',
                    'name' => 'FULLTEXT'
                ],[
                    'help_keyword_id' => '458',
                    'name' => 'FUNCTION'
                ],[
                    'help_keyword_id' => '501',
                    'name' => 'GEOMCOLLFROMTEXT'
                ],[
                    'help_keyword_id' => '423',
                    'name' => 'GEOMCOLLFROMWKB'
                ],[
                    'help_keyword_id' => '407',
                    'name' => 'GEOMETRYCOLLECTION'
                ],[
                    'help_keyword_id' => '207',
                    'name' => 'GEOMETRYCOLLECTIONFROMTEXT'
                ],[
                    'help_keyword_id' => '360',
                    'name' => 'GEOMETRYCOLLECTIONFROMWKB'
                ],[
                    'help_keyword_id' => '137',
                    'name' => 'GEOMETRYFROMTEXT'
                ],[
                    'help_keyword_id' => '602',
                    'name' => 'GEOMETRYFROMWKB'
                ],[
                    'help_keyword_id' => '136',
                    'name' => 'GEOMETRYN'
                ],[
                    'help_keyword_id' => '637',
                    'name' => 'GEOMETRYTYPE'
                ],[
                    'help_keyword_id' => '603',
                    'name' => 'GEOMFROMTEXT'
                ],[
                    'help_keyword_id' => '97',
                    'name' => 'GEOMFROMWKB'
                ],[
                    'help_keyword_id' => '219',
                    'name' => 'GET'
                ],[
                    'help_keyword_id' => '338',
                    'name' => 'GLENGTH'
                ],[
                    'help_keyword_id' => '493',
                    'name' => 'GLOBAL'
                ],[
                    'help_keyword_id' => '132',
                    'name' => 'GRANT'
                ],[
                    'help_keyword_id' => '503',
                    'name' => 'GRANTS'
                ],[
                    'help_keyword_id' => '175',
                    'name' => 'GROUP'
                ],[
                    'help_keyword_id' => '69',
                    'name' => 'HANDLER'
                ],[
                    'help_keyword_id' => '151',
                    'name' => 'HAVING'
                ],[
                    'help_keyword_id' => '555',
                    'name' => 'HEAP'
                ],[
                    'help_keyword_id' => '578',
                    'name' => 'HELP'
                ],[
                    'help_keyword_id' => '71',
                    'name' => 'HELP_DATE'
                ],[
                    'help_keyword_id' => '125',
                    'name' => 'HELP_VERSION'
                ],[
                    'help_keyword_id' => '678',
                    'name' => 'HIGH_PRIORITY'
                ],[
                    'help_keyword_id' => '1',
                    'name' => 'HOST'
                ],[
                    'help_keyword_id' => '481',
                    'name' => 'HOSTS'
                ],[
                    'help_keyword_id' => '571',
                    'name' => 'HOUR'
                ],[
                    'help_keyword_id' => '55',
                    'name' => 'HOUR_MINUTE'
                ],[
                    'help_keyword_id' => '404',
                    'name' => 'HOUR_SECOND'
                ],[
                    'help_keyword_id' => '235',
                    'name' => 'IDENTIFIED'
                ],[
                    'help_keyword_id' => '310',
                    'name' => 'IF'
                ],[
                    'help_keyword_id' => '386',
                    'name' => 'IGNORE'
                ],[
                    'help_keyword_id' => '180',
                    'name' => 'IGNORE_SERVER_IDS'
                ],[
                    'help_keyword_id' => '65',
                    'name' => 'IMPORT'
                ],[
                    'help_keyword_id' => '583',
                    'name' => 'IN'
                ],[
                    'help_keyword_id' => '518',
                    'name' => 'INDEX'
                ],[
                    'help_keyword_id' => '479',
                    'name' => 'INDEXES'
                ],[
                    'help_keyword_id' => '123',
                    'name' => 'INFILE'
                ],[
                    'help_keyword_id' => '658',
                    'name' => 'INITIAL_SIZE'
                ],[
                    'help_keyword_id' => '203',
                    'name' => 'INLINE'
                ],[
                    'help_keyword_id' => '440',
                    'name' => 'INNER'
                ],[
                    'help_keyword_id' => '26',
                    'name' => 'INNODB'
                ],[
                    'help_keyword_id' => '416',
                    'name' => 'INSERT'
                ],[
                    'help_keyword_id' => '536',
                    'name' => 'INSERT_METHOD'
                ],[
                    'help_keyword_id' => '432',
                    'name' => 'INSTALL'
                ],[
                    'help_keyword_id' => '486',
                    'name' => 'INSTANCE'
                ],[
                    'help_keyword_id' => '272',
                    'name' => 'INT1'
                ],[
                    'help_keyword_id' => '550',
                    'name' => 'INT2'
                ],[
                    'help_keyword_id' => '461',
                    'name' => 'INT3'
                ],[
                    'help_keyword_id' => '33',
                    'name' => 'INT4'
                ],[
                    'help_keyword_id' => '293',
                    'name' => 'INT8'
                ],[
                    'help_keyword_id' => '356',
                    'name' => 'INTEGER'
                ],[
                    'help_keyword_id' => '264',
                    'name' => 'INTERIORRINGN'
                ],[
                    'help_keyword_id' => '217',
                    'name' => 'INTERSECTS'
                ],[
                    'help_keyword_id' => '284',
                    'name' => 'INTERVAL'
                ],[
                    'help_keyword_id' => '59',
                    'name' => 'INTO'
                ],[
                    'help_keyword_id' => '449',
                    'name' => 'IO_THREAD'
                ],[
                    'help_keyword_id' => '300',
                    'name' => 'IS'
                ],[
                    'help_keyword_id' => '20',
                    'name' => 'ISCLOSED'
                ],[
                    'help_keyword_id' => '554',
                    'name' => 'ISEMPTY'
                ],[
                    'help_keyword_id' => '291',
                    'name' => 'ISOLATION'
                ],[
                    'help_keyword_id' => '154',
                    'name' => 'ISSIMPLE'
                ],[
                    'help_keyword_id' => '437',
                    'name' => 'ISSUER'
                ],[
                    'help_keyword_id' => '78',
                    'name' => 'ITERATE'
                ],[
                    'help_keyword_id' => '0',
                    'name' => 'JOIN'
                ],[
                    'help_keyword_id' => '590',
                    'name' => 'JSON'
                ],[
                    'help_keyword_id' => '669',
                    'name' => 'JSON_APPEND'
                ],[
                    'help_keyword_id' => '135',
                    'name' => 'JSON_ARRAY'
                ],[
                    'help_keyword_id' => '418',
                    'name' => 'JSON_ARRAY_APPEND'
                ],[
                    'help_keyword_id' => '428',
                    'name' => 'JSON_ARRAY_INSERT'
                ],[
                    'help_keyword_id' => '462',
                    'name' => 'JSON_CONTAINS'
                ],[
                    'help_keyword_id' => '472',
                    'name' => 'JSON_CONTAINS_PATH'
                ],[
                    'help_keyword_id' => '644',
                    'name' => 'JSON_DEPTH'
                ],[
                    'help_keyword_id' => '73',
                    'name' => 'JSON_EXTRACT'
                ],[
                    'help_keyword_id' => '116',
                    'name' => 'JSON_INSERT'
                ],[
                    'help_keyword_id' => '447',
                    'name' => 'JSON_KEYS'
                ],[
                    'help_keyword_id' => '670',
                    'name' => 'JSON_LENGTH'
                ],[
                    'help_keyword_id' => '436',
                    'name' => 'JSON_MERGE'
                ],[
                    'help_keyword_id' => '297',
                    'name' => 'JSON_OBJECT'
                ],[
                    'help_keyword_id' => '326',
                    'name' => 'JSON_QUOTE'
                ],[
                    'help_keyword_id' => '340',
                    'name' => 'JSON_REMOVE'
                ],[
                    'help_keyword_id' => '585',
                    'name' => 'JSON_REPLACE'
                ],[
                    'help_keyword_id' => '38',
                    'name' => 'JSON_SEARCH'
                ],[
                    'help_keyword_id' => '528',
                    'name' => 'JSON_SET'
                ],[
                    'help_keyword_id' => '86',
                    'name' => 'JSON_TYPE'
                ],[
                    'help_keyword_id' => '117',
                    'name' => 'JSON_UNQUOTE'
                ],[
                    'help_keyword_id' => '247',
                    'name' => 'JSON_VALID'
                ],[
                    'help_keyword_id' => '649',
                    'name' => 'KEY'
                ],[
                    'help_keyword_id' => '647',
                    'name' => 'KEYS'
                ],[
                    'help_keyword_id' => '280',
                    'name' => 'KEY_BLOCK_SIZE'
                ],[
                    'help_keyword_id' => '119',
                    'name' => 'KILL'
                ],[
                    'help_keyword_id' => '645',
                    'name' => 'LAST'
                ],[
                    'help_keyword_id' => '143',
                    'name' => 'LEADING'
                ],[
                    'help_keyword_id' => '195',
                    'name' => 'LEAVE'
                ],[
                    'help_keyword_id' => '101',
                    'name' => 'LEFT'
                ],[
                    'help_keyword_id' => '52',
                    'name' => 'LEVEL'
                ],[
                    'help_keyword_id' => '249',
                    'name' => 'LIKE'
                ],[
                    'help_keyword_id' => '648',
                    'name' => 'LIMIT'
                ],[
                    'help_keyword_id' => '381',
                    'name' => 'LINEFROMTEXT'
                ],[
                    'help_keyword_id' => '636',
                    'name' => 'LINEFROMWKB'
                ],[
                    'help_keyword_id' => '261',
                    'name' => 'LINES'
                ],[
                    'help_keyword_id' => '376',
                    'name' => 'LINESTRING'
                ],[
                    'help_keyword_id' => '299',
                    'name' => 'LINESTRINGFROMTEXT'
                ],[
                    'help_keyword_id' => '494',
                    'name' => 'LINESTRINGFROMWKB'
                ],[
                    'help_keyword_id' => '487',
                    'name' => 'LOAD'
                ],[
                    'help_keyword_id' => '667',
                    'name' => 'LOCAL'
                ],[
                    'help_keyword_id' => '31',
                    'name' => 'LOCK'
                ],[
                    'help_keyword_id' => '546',
                    'name' => 'LOGFILE'
                ],[
                    'help_keyword_id' => '552',
                    'name' => 'LOGS'
                ],[
                    'help_keyword_id' => '91',
                    'name' => 'LONG'
                ],[
                    'help_keyword_id' => '415',
                    'name' => 'LONGBINARY'
                ],[
                    'help_keyword_id' => '221',
                    'name' => 'LOOP'
                ],[
                    'help_keyword_id' => '162',
                    'name' => 'LOW_PRIORITY'
                ],[
                    'help_keyword_id' => '683',
                    'name' => 'MASTER'
                ],[
                    'help_keyword_id' => '181',
                    'name' => 'MASTER_AUTO_POSITION'
                ],[
                    'help_keyword_id' => '520',
                    'name' => 'MASTER_BIND'
                ],[
                    'help_keyword_id' => '85',
                    'name' => 'MASTER_CONNECT_RETRY'
                ],[
                    'help_keyword_id' => '378',
                    'name' => 'MASTER_HEARTBEAT_PERIOD'
                ],[
                    'help_keyword_id' => '593',
                    'name' => 'MASTER_HOST'
                ],[
                    'help_keyword_id' => '87',
                    'name' => 'MASTER_LOG_FILE'
                ],[
                    'help_keyword_id' => '199',
                    'name' => 'MASTER_LOG_POS'
                ],[
                    'help_keyword_id' => '531',
                    'name' => 'MASTER_PASSWORD'
                ],[
                    'help_keyword_id' => '576',
                    'name' => 'MASTER_PORT'
                ],[
                    'help_keyword_id' => '364',
                    'name' => 'MASTER_RETRY_COUNT'
                ],[
                    'help_keyword_id' => '245',
                    'name' => 'MASTER_SSL'
                ],[
                    'help_keyword_id' => '8',
                    'name' => 'MASTER_SSL_CA'
                ],[
                    'help_keyword_id' => '596',
                    'name' => 'MASTER_SSL_CERT'
                ],[
                    'help_keyword_id' => '237',
                    'name' => 'MASTER_SSL_CIPHER'
                ],[
                    'help_keyword_id' => '127',
                    'name' => 'MASTER_SSL_CRL'
                ],[
                    'help_keyword_id' => '42',
                    'name' => 'MASTER_SSL_CRLPATH'
                ],[
                    'help_keyword_id' => '668',
                    'name' => 'MASTER_SSL_KEY'
                ],[
                    'help_keyword_id' => '359',
                    'name' => 'MASTER_SSL_VERIFY_SERVER_CERT'
                ],[
                    'help_keyword_id' => '533',
                    'name' => 'MASTER_USER'
                ],[
                    'help_keyword_id' => '198',
                    'name' => 'MATCH'
                ],[
                    'help_keyword_id' => '582',
                    'name' => 'MAX_CONNECTIONS_PER_HOUR'
                ],[
                    'help_keyword_id' => '267',
                    'name' => 'MAX_QUERIES_PER_HOUR'
                ],[
                    'help_keyword_id' => '274',
                    'name' => 'MAX_ROWS'
                ],[
                    'help_keyword_id' => '403',
                    'name' => 'MAX_SIZE'
                ],[
                    'help_keyword_id' => '549',
                    'name' => 'MAX_UPDATES_PER_HOUR'
                ],[
                    'help_keyword_id' => '664',
                    'name' => 'MAX_USER_CONNECTIONS'
                ],[
                    'help_keyword_id' => '233',
                    'name' => 'MBRCONTAINS'
                ],[
                    'help_keyword_id' => '562',
                    'name' => 'MBRDISJOINT'
                ],[
                    'help_keyword_id' => '124',
                    'name' => 'MBREQUAL'
                ],[
                    'help_keyword_id' => '133',
                    'name' => 'MBRINTERSECTS'
                ],[
                    'help_keyword_id' => '185',
                    'name' => 'MBROVERLAPS'
                ],[
                    'help_keyword_id' => '534',
                    'name' => 'MBRTOUCHES'
                ],[
                    'help_keyword_id' => '253',
                    'name' => 'MBRWITHIN'
                ],[
                    'help_keyword_id' => '630',
                    'name' => 'MEDIUM'
                ],[
                    'help_keyword_id' => '256',
                    'name' => 'MEMORY'
                ],[
                    'help_keyword_id' => '316',
                    'name' => 'MERGE'
                ],[
                    'help_keyword_id' => '377',
                    'name' => 'MESSAGE_TEXT'
                ],[
                    'help_keyword_id' => '131',
                    'name' => 'MIDDLEINT'
                ],[
                    'help_keyword_id' => '35',
                    'name' => 'MINUTE'
                ],[
                    'help_keyword_id' => '454',
                    'name' => 'MINUTE_SECOND'
                ],[
                    'help_keyword_id' => '456',
                    'name' => 'MIN_ROWS'
                ],[
                    'help_keyword_id' => '420',
                    'name' => 'MLINEFROMTEXT'
                ],[
                    'help_keyword_id' => '168',
                    'name' => 'MLINEFROMWKB'
                ],[
                    'help_keyword_id' => '74',
                    'name' => 'MOD'
                ],[
                    'help_keyword_id' => '355',
                    'name' => 'MODE'
                ],[
                    'help_keyword_id' => '197',
                    'name' => 'MODIFY'
                ],[
                    'help_keyword_id' => '18',
                    'name' => 'MONTH'
                ],[
                    'help_keyword_id' => '281',
                    'name' => 'MPOINTFROMTEXT'
                ],[
                    'help_keyword_id' => '646',
                    'name' => 'MPOINTFROMWKB'
                ],[
                    'help_keyword_id' => '476',
                    'name' => 'MPOLYFROMTEXT'
                ],[
                    'help_keyword_id' => '77',
                    'name' => 'MPOLYFROMWKB'
                ],[
                    'help_keyword_id' => '443',
                    'name' => 'MRG_MYISAM'
                ],[
                    'help_keyword_id' => '277',
                    'name' => 'MULTILINESTRING'
                ],[
                    'help_keyword_id' => '216',
                    'name' => 'MULTILINESTRINGFROMTEXT'
                ],[
                    'help_keyword_id' => '522',
                    'name' => 'MULTILINESTRINGFROMWKB'
                ],[
                    'help_keyword_id' => '251',
                    'name' => 'MULTIPOINT'
                ],[
                    'help_keyword_id' => '172',
                    'name' => 'MULTIPOINTFROMTEXT'
                ],[
                    'help_keyword_id' => '171',
                    'name' => 'MULTIPOINTFROMWKB'
                ],[
                    'help_keyword_id' => '100',
                    'name' => 'MULTIPOLYGON'
                ],[
                    'help_keyword_id' => '346',
                    'name' => 'MULTIPOLYGONFROMTEXT'
                ],[
                    'help_keyword_id' => '597',
                    'name' => 'MULTIPOLYGONFROMWKB'
                ],[
                    'help_keyword_id' => '422',
                    'name' => 'MUTEX'
                ],[
                    'help_keyword_id' => '539',
                    'name' => 'MYISAM'
                ],[
                    'help_keyword_id' => '141',
                    'name' => 'MYSQL_ERRNO'
                ],[
                    'help_keyword_id' => '285',
                    'name' => 'NAME'
                ],[
                    'help_keyword_id' => '271',
                    'name' => 'NAMES'
                ],[
                    'help_keyword_id' => '176',
                    'name' => 'NATIONAL'
                ],[
                    'help_keyword_id' => '276',
                    'name' => 'NATURAL'
                ],[
                    'help_keyword_id' => '9',
                    'name' => 'NCHAR'
                ],[
                    'help_keyword_id' => '32',
                    'name' => 'NDB'
                ],[
                    'help_keyword_id' => '50',
                    'name' => 'NDBCLUSTER'
                ],[
                    'help_keyword_id' => '327',
                    'name' => 'NEVER'
                ],[
                    'help_keyword_id' => '616',
                    'name' => 'NEXT'
                ],[
                    'help_keyword_id' => '370',
                    'name' => 'NO'
                ],[
                    'help_keyword_id' => '165',
                    'name' => 'NODEGROUP'
                ],[
                    'help_keyword_id' => '671',
                    'name' => 'NONE'
                ],[
                    'help_keyword_id' => '302',
                    'name' => 'NOT'
                ],[
                    'help_keyword_id' => '427',
                    'name' => 'NO_WRITE_TO_BINLOG'
                ],[
                    'help_keyword_id' => '329',
                    'name' => 'NULL'
                ],[
                    'help_keyword_id' => '114',
                    'name' => 'NUMBER'
                ],[
                    'help_keyword_id' => '543',
                    'name' => 'NUMERIC'
                ],[
                    'help_keyword_id' => '468',
                    'name' => 'NUMGEOMETRIES'
                ],[
                    'help_keyword_id' => '265',
                    'name' => 'NUMINTERIORRINGS'
                ],[
                    'help_keyword_id' => '485',
                    'name' => 'NUMPOINTS'
                ],[
                    'help_keyword_id' => '334',
                    'name' => 'NVARCHAR'
                ],[
                    'help_keyword_id' => '615',
                    'name' => 'OFFSET'
                ],[
                    'help_keyword_id' => '39',
                    'name' => 'ON'
                ],[
                    'help_keyword_id' => '10',
                    'name' => 'ONLY'
                ],[
                    'help_keyword_id' => '14',
                    'name' => 'OPEN'
                ],[
                    'help_keyword_id' => '429',
                    'name' => 'OPTIMIZE'
                ],[
                    'help_keyword_id' => '93',
                    'name' => 'OPTION'
                ],[
                    'help_keyword_id' => '663',
                    'name' => 'OPTIONALLY'
                ],[
                    'help_keyword_id' => '580',
                    'name' => 'OPTIONS'
                ],[
                    'help_keyword_id' => '234',
                    'name' => 'OR'
                ],[
                    'help_keyword_id' => '126',
                    'name' => 'ORDER'
                ],[
                    'help_keyword_id' => '505',
                    'name' => 'OUTER'
                ],[
                    'help_keyword_id' => '161',
                    'name' => 'OUTFILE'
                ],[
                    'help_keyword_id' => '122',
                    'name' => 'OVERLAPS'
                ],[
                    'help_keyword_id' => '186',
                    'name' => 'OWNER'
                ],[
                    'help_keyword_id' => '215',
                    'name' => 'PACK_KEYS'
                ],[
                    'help_keyword_id' => '605',
                    'name' => 'PARSER'
                ],[
                    'help_keyword_id' => '227',
                    'name' => 'PARTIAL'
                ],[
                    'help_keyword_id' => '373',
                    'name' => 'PARTITION'
                ],[
                    'help_keyword_id' => '309',
                    'name' => 'PARTITIONING'
                ],[
                    'help_keyword_id' => '445',
                    'name' => 'PARTITIONS'
                ],[
                    'help_keyword_id' => '614',
                    'name' => 'PASSWORD'
                ],[
                    'help_keyword_id' => '118',
                    'name' => 'PATH)'
                ],[
                    'help_keyword_id' => '250',
                    'name' => 'PLUGIN'
                ],[
                    'help_keyword_id' => '640',
                    'name' => 'PLUGINS'
                ],[
                    'help_keyword_id' => '262',
                    'name' => 'PLUGIN_DIR'
                ],[
                    'help_keyword_id' => '398',
                    'name' => 'POINT'
                ],[
                    'help_keyword_id' => '236',
                    'name' => 'POINTFROMTEXT'
                ],[
                    'help_keyword_id' => '331',
                    'name' => 'POINTFROMWKB'
                ],[
                    'help_keyword_id' => '179',
                    'name' => 'POINTN'
                ],[
                    'help_keyword_id' => '587',
                    'name' => 'POLYFROMTEXT'
                ],[
                    'help_keyword_id' => '60',
                    'name' => 'POLYFROMWKB'
                ],[
                    'help_keyword_id' => '34',
                    'name' => 'POLYGON'
                ],[
                    'help_keyword_id' => '148',
                    'name' => 'POLYGONFROMTEXT'
                ],[
                    'help_keyword_id' => '394',
                    'name' => 'POLYGONFROMWKB'
                ],[
                    'help_keyword_id' => '419',
                    'name' => 'PORT'
                ],[
                    'help_keyword_id' => '517',
                    'name' => 'POW'
                ],[
                    'help_keyword_id' => '330',
                    'name' => 'POWER'
                ],[
                    'help_keyword_id' => '88',
                    'name' => 'PRECISION'
                ],[
                    'help_keyword_id' => '30',
                    'name' => 'PREPARE'
                ],[
                    'help_keyword_id' => '57',
                    'name' => 'PRESERVE'
                ],[
                    'help_keyword_id' => '232',
                    'name' => 'PREV'
                ],[
                    'help_keyword_id' => '643',
                    'name' => 'PRIMARY'
                ],[
                    'help_keyword_id' => '44',
                    'name' => 'PRIVILEGES'
                ],[
                    'help_keyword_id' => '410',
                    'name' => 'PROCEDURE'
                ],[
                    'help_keyword_id' => '579',
                    'name' => 'PROCESS'
                ],[
                    'help_keyword_id' => '212',
                    'name' => 'PROCESSLIST'
                ],[
                    'help_keyword_id' => '629',
                    'name' => 'PROFILE'
                ],[
                    'help_keyword_id' => '19',
                    'name' => 'PROFILES'
                ],[
                    'help_keyword_id' => '321',
                    'name' => 'PROXY'
                ],[
                    'help_keyword_id' => '312',
                    'name' => 'PURGE'
                ],[
                    'help_keyword_id' => '258',
                    'name' => 'QUERY'
                ],[
                    'help_keyword_id' => '389',
                    'name' => 'QUICK'
                ],[
                    'help_keyword_id' => '158',
                    'name' => 'RANDOM_BYTES'
                ],[
                    'help_keyword_id' => '453',
                    'name' => 'READ'
                ],[
                    'help_keyword_id' => '374',
                    'name' => 'REAL'
                ],[
                    'help_keyword_id' => '601',
                    'name' => 'REBUILD'
                ],[
                    'help_keyword_id' => '553',
                    'name' => 'RECOVER'
                ],[
                    'help_keyword_id' => '225',
                    'name' => 'REDUNDANT'
                ],[
                    'help_keyword_id' => '287',
                    'name' => 'REFERENCES'
                ],[
                    'help_keyword_id' => '441',
                    'name' => 'RELAYLOG'
                ],[
                    'help_keyword_id' => '532',
                    'name' => 'RELAY_LOG_FILE'
                ],[
                    'help_keyword_id' => '193',
                    'name' => 'RELAY_LOG_POS'
                ],[
                    'help_keyword_id' => '424',
                    'name' => 'RELEASE'
                ],[
                    'help_keyword_id' => '153',
                    'name' => 'RELOAD'
                ],[
                    'help_keyword_id' => '521',
                    'name' => 'REMOVE'
                ],[
                    'help_keyword_id' => '604',
                    'name' => 'RENAME'
                ],[
                    'help_keyword_id' => '94',
                    'name' => 'REORGANIZE'
                ],[
                    'help_keyword_id' => '560',
                    'name' => 'REPAIR'
                ],[
                    'help_keyword_id' => '347',
                    'name' => 'REPEAT'
                ],[
                    'help_keyword_id' => '471',
                    'name' => 'REPEATABLE'
                ],[
                    'help_keyword_id' => '348',
                    'name' => 'REPLACE'
                ],[
                    'help_keyword_id' => '504',
                    'name' => 'REPLICATE_DO_DB'
                ],[
                    'help_keyword_id' => '303',
                    'name' => 'REPLICATE_DO_TABLE'
                ],[
                    'help_keyword_id' => '266',
                    'name' => 'REPLICATE_IGNORE_DB'
                ],[
                    'help_keyword_id' => '600',
                    'name' => 'REPLICATE_IGNORE_TABLE'
                ],[
                    'help_keyword_id' => '27',
                    'name' => 'REPLICATE_REWRITE_DB'
                ],[
                    'help_keyword_id' => '130',
                    'name' => 'REPLICATE_WILD_DO_TABLE'
                ],[
                    'help_keyword_id' => '220',
                    'name' => 'REPLICATE_WILD_IGNORE_TABLE'
                ],[
                    'help_keyword_id' => '23',
                    'name' => 'REPLICATION'
                ],[
                    'help_keyword_id' => '89',
                    'name' => 'REQUIRE'
                ],[
                    'help_keyword_id' => '431',
                    'name' => 'RESET'
                ],[
                    'help_keyword_id' => '243',
                    'name' => 'RESIGNAL'
                ],[
                    'help_keyword_id' => '296',
                    'name' => 'RESTRICT'
                ],[
                    'help_keyword_id' => '335',
                    'name' => 'RETURN'
                ],[
                    'help_keyword_id' => '556',
                    'name' => 'RETURNED_SQLSTATE'
                ],[
                    'help_keyword_id' => '7',
                    'name' => 'RETURNS'
                ],[
                    'help_keyword_id' => '157',
                    'name' => 'REVOKE'
                ],[
                    'help_keyword_id' => '273',
                    'name' => 'RIGHT'
                ],[
                    'help_keyword_id' => '675',
                    'name' => 'RLIKE'
                ],[
                    'help_keyword_id' => '63',
                    'name' => 'ROLLBACK'
                ],[
                    'help_keyword_id' => '311',
                    'name' => 'ROWS'
                ],[
                    'help_keyword_id' => '457',
                    'name' => 'ROW_COUNT'
                ],[
                    'help_keyword_id' => '684',
                    'name' => 'ROW_FORMAT'
                ],[
                    'help_keyword_id' => '641',
                    'name' => 'SAVEPOINT'
                ],[
                    'help_keyword_id' => '6',
                    'name' => 'SCHEDULE'
                ],[
                    'help_keyword_id' => '166',
                    'name' => 'SCHEMA'
                ],[
                    'help_keyword_id' => '142',
                    'name' => 'SCHEMAS'
                ],[
                    'help_keyword_id' => '189',
                    'name' => 'SCHEMA_NAME'
                ],[
                    'help_keyword_id' => '230',
                    'name' => 'SECOND'
                ],[
                    'help_keyword_id' => '47',
                    'name' => 'SECURITY'
                ],[
                    'help_keyword_id' => '572',
                    'name' => 'SELECT'
                ],[
                    'help_keyword_id' => '36',
                    'name' => 'SEPARATOR'
                ],[
                    'help_keyword_id' => '656',
                    'name' => 'SERIAL'
                ],[
                    'help_keyword_id' => '2',
                    'name' => 'SERIALIZABLE'
                ],[
                    'help_keyword_id' => '595',
                    'name' => 'SERVER'
                ],[
                    'help_keyword_id' => '659',
                    'name' => 'SESSION'
                ],[
                    'help_keyword_id' => '435',
                    'name' => 'SET'
                ],[
                    'help_keyword_id' => '178',
                    'name' => 'SHA'
                ],[
                    'help_keyword_id' => '613',
                    'name' => 'SHA1'
                ],[
                    'help_keyword_id' => '387',
                    'name' => 'SHA2'
                ],[
                    'help_keyword_id' => '375',
                    'name' => 'SHARE'
                ],[
                    'help_keyword_id' => '567',
                    'name' => 'SHOW'
                ],[
                    'help_keyword_id' => '339',
                    'name' => 'SHUTDOWN'
                ],[
                    'help_keyword_id' => '639',
                    'name' => 'SIGNAL'
                ],[
                    'help_keyword_id' => '390',
                    'name' => 'SIGNED'
                ],[
                    'help_keyword_id' => '660',
                    'name' => 'SLAVE'
                ],[
                    'help_keyword_id' => '483',
                    'name' => 'SNAPSHOT'
                ],[
                    'help_keyword_id' => '607',
                    'name' => 'SOCKET'
                ],[
                    'help_keyword_id' => '516',
                    'name' => 'SONAME'
                ],[
                    'help_keyword_id' => '214',
                    'name' => 'SOUNDS'
                ],[
                    'help_keyword_id' => '45',
                    'name' => 'SPATIAL'
                ],[
                    'help_keyword_id' => '430',
                    'name' => 'SQLSTATE'
                ],[
                    'help_keyword_id' => '61',
                    'name' => 'SQL_AFTER_GTIDS'
                ],[
                    'help_keyword_id' => '508',
                    'name' => 'SQL_AFTER_MTS_GAPS'
                ],[
                    'help_keyword_id' => '413',
                    'name' => 'SQL_BEFORE_GTIDS'
                ],[
                    'help_keyword_id' => '362',
                    'name' => 'SQL_BIG_RESULT'
                ],[
                    'help_keyword_id' => '46',
                    'name' => 'SQL_BUFFER_RESULT'
                ],[
                    'help_keyword_id' => '488',
                    'name' => 'SQL_CACHE'
                ],[
                    'help_keyword_id' => '537',
                    'name' => 'SQL_CALC_FOUND_ROWS'
                ],[
                    'help_keyword_id' => '618',
                    'name' => 'SQL_LOG_BIN'
                ],[
                    'help_keyword_id' => '318',
                    'name' => 'SQL_NO_CACHE'
                ],[
                    'help_keyword_id' => '238',
                    'name' => 'SQL_SLAVE_SKIP_COUNTER'
                ],[
                    'help_keyword_id' => '622',
                    'name' => 'SQL_SMALL_RESULT'
                ],[
                    'help_keyword_id' => '263',
                    'name' => 'SQL_THREAD'
                ],[
                    'help_keyword_id' => '4',
                    'name' => 'SRID'
                ],[
                    'help_keyword_id' => '632',
                    'name' => 'SSL'
                ],[
                    'help_keyword_id' => '308',
                    'name' => 'START'
                ],[
                    'help_keyword_id' => '152',
                    'name' => 'STARTING'
                ],[
                    'help_keyword_id' => '475',
                    'name' => 'STARTPOINT'
                ],[
                    'help_keyword_id' => '350',
                    'name' => 'STARTS'
                ],[
                    'help_keyword_id' => '98',
                    'name' => 'STATS_AUTO_RECALC'
                ],[
                    'help_keyword_id' => '25',
                    'name' => 'STATS_PERSISTENT'
                ],[
                    'help_keyword_id' => '638',
                    'name' => 'STATS_SAMPLE_PAGES'
                ],[
                    'help_keyword_id' => '439',
                    'name' => 'STATUS'
                ],[
                    'help_keyword_id' => '511',
                    'name' => 'STD'
                ],[
                    'help_keyword_id' => '270',
                    'name' => 'STDDEV'
                ],[
                    'help_keyword_id' => '442',
                    'name' => 'STOP'
                ],[
                    'help_keyword_id' => '290',
                    'name' => 'STORAGE'
                ],[
                    'help_keyword_id' => '388',
                    'name' => 'STORED'
                ],[
                    'help_keyword_id' => '610',
                    'name' => 'STRAIGHT_JOIN'
                ],[
                    'help_keyword_id' => '110',
                    'name' => 'STRING'
                ],[
                    'help_keyword_id' => '412',
                    'name' => 'ST_AREA'
                ],[
                    'help_keyword_id' => '409',
                    'name' => 'ST_ASBINARY'
                ],[
                    'help_keyword_id' => '341',
                    'name' => 'ST_ASGEOJSON'
                ],[
                    'help_keyword_id' => '84',
                    'name' => 'ST_ASTEXT'
                ],[
                    'help_keyword_id' => '606',
                    'name' => 'ST_ASWKB'
                ],[
                    'help_keyword_id' => '90',
                    'name' => 'ST_ASWKT'
                ],[
                    'help_keyword_id' => '294',
                    'name' => 'ST_BUFFER'
                ],[
                    'help_keyword_id' => '345',
                    'name' => 'ST_BUFFER_STRATEGY'
                ],[
                    'help_keyword_id' => '301',
                    'name' => 'ST_CENTROID'
                ],[
                    'help_keyword_id' => '229',
                    'name' => 'ST_CONTAINS'
                ],[
                    'help_keyword_id' => '515',
                    'name' => 'ST_CONVEXHULL'
                ],[
                    'help_keyword_id' => '559',
                    'name' => 'ST_CROSSES'
                ],[
                    'help_keyword_id' => '405',
                    'name' => 'ST_DIFFERENCE'
                ],[
                    'help_keyword_id' => '434',
                    'name' => 'ST_DIMENSION'
                ],[
                    'help_keyword_id' => '569',
                    'name' => 'ST_DISJOINT'
                ],[
                    'help_keyword_id' => '317',
                    'name' => 'ST_DISTANCE'
                ],[
                    'help_keyword_id' => '322',
                    'name' => 'ST_DISTANCE_SPHERE'
                ],[
                    'help_keyword_id' => '524',
                    'name' => 'ST_ENDPOINT'
                ],[
                    'help_keyword_id' => '248',
                    'name' => 'ST_ENVELOPE'
                ],[
                    'help_keyword_id' => '594',
                    'name' => 'ST_EQUALS'
                ],[
                    'help_keyword_id' => '653',
                    'name' => 'ST_EXTERIORRING'
                ],[
                    'help_keyword_id' => '196',
                    'name' => 'ST_GEOHASH'
                ],[
                    'help_keyword_id' => '392',
                    'name' => 'ST_GEOMCOLLFROMTEXT'
                ],[
                    'help_keyword_id' => '12',
                    'name' => 'ST_GEOMCOLLFROMWKB'
                ],[
                    'help_keyword_id' => '408',
                    'name' => 'ST_GEOMETRYCOLLECTIONFROMTEXT'
                ],[
                    'help_keyword_id' => '611',
                    'name' => 'ST_GEOMETRYCOLLECTIONFROMWKB'
                ],[
                    'help_keyword_id' => '491',
                    'name' => 'ST_GEOMETRYFROMTEXT'
                ],[
                    'help_keyword_id' => '459',
                    'name' => 'ST_GEOMETRYFROMWKB'
                ],[
                    'help_keyword_id' => '11',
                    'name' => 'ST_GEOMETRYN'
                ],[
                    'help_keyword_id' => '75',
                    'name' => 'ST_GEOMETRYTYPE'
                ],[
                    'help_keyword_id' => '609',
                    'name' => 'ST_GEOMFROMGEOJSON'
                ],[
                    'help_keyword_id' => '128',
                    'name' => 'ST_GEOMFROMTEXT'
                ],[
                    'help_keyword_id' => '612',
                    'name' => 'ST_GEOMFROMWKB'
                ],[
                    'help_keyword_id' => '502',
                    'name' => 'ST_INTERIORRINGN'
                ],[
                    'help_keyword_id' => '480',
                    'name' => 'ST_INTERSECTION'
                ],[
                    'help_keyword_id' => '15',
                    'name' => 'ST_INTERSECTS'
                ],[
                    'help_keyword_id' => '103',
                    'name' => 'ST_ISCLOSED'
                ],[
                    'help_keyword_id' => '150',
                    'name' => 'ST_ISEMPTY'
                ],[
                    'help_keyword_id' => '177',
                    'name' => 'ST_ISSIMPLE'
                ],[
                    'help_keyword_id' => '147',
                    'name' => 'ST_ISVALID'
                ],[
                    'help_keyword_id' => '608',
                    'name' => 'ST_LATFROMGEOHASH'
                ],[
                    'help_keyword_id' => '548',
                    'name' => 'ST_LINEFROMTEXT'
                ],[
                    'help_keyword_id' => '191',
                    'name' => 'ST_LINEFROMWKB'
                ],[
                    'help_keyword_id' => '499',
                    'name' => 'ST_LINESTRINGFROMTEXT'
                ],[
                    'help_keyword_id' => '109',
                    'name' => 'ST_LINESTRINGFROMWKB'
                ],[
                    'help_keyword_id' => '108',
                    'name' => 'ST_LONGFROMGEOHASH'
                ],[
                    'help_keyword_id' => '288',
                    'name' => 'ST_MAKEENVELOPE'
                ],[
                    'help_keyword_id' => '651',
                    'name' => 'ST_MLINEFROMTEXT'
                ],[
                    'help_keyword_id' => '183',
                    'name' => 'ST_MLINEFROMWKB'
                ],[
                    'help_keyword_id' => '438',
                    'name' => 'ST_MPOINTFROMTEXT'
                ],[
                    'help_keyword_id' => '473',
                    'name' => 'ST_MPOINTFROMWKB'
                ],[
                    'help_keyword_id' => '561',
                    'name' => 'ST_MPOLYFROMTEXT'
                ],[
                    'help_keyword_id' => '134',
                    'name' => 'ST_MPOLYFROMWKB'
                ],[
                    'help_keyword_id' => '315',
                    'name' => 'ST_MULTILINESTRINGFROMTEXT'
                ],[
                    'help_keyword_id' => '592',
                    'name' => 'ST_MULTILINESTRINGFROMWKB'
                ],[
                    'help_keyword_id' => '455',
                    'name' => 'ST_MULTIPOINTFROMTEXT'
                ],[
                    'help_keyword_id' => '257',
                    'name' => 'ST_MULTIPOINTFROMWKB'
                ],[
                    'help_keyword_id' => '319',
                    'name' => 'ST_MULTIPOLYGONFROMTEXT'
                ],[
                    'help_keyword_id' => '623',
                    'name' => 'ST_MULTIPOLYGONFROMWKB'
                ],[
                    'help_keyword_id' => '642',
                    'name' => 'ST_NUMGEOMETRIES'
                ],[
                    'help_keyword_id' => '351',
                    'name' => 'ST_NUMINTERIORRING'
                ],[
                    'help_keyword_id' => '446',
                    'name' => 'ST_NUMINTERIORRINGS'
                ],[
                    'help_keyword_id' => '244',
                    'name' => 'ST_NUMPOINTS'
                ],[
                    'help_keyword_id' => '526',
                    'name' => 'ST_OVERLAPS'
                ],[
                    'help_keyword_id' => '369',
                    'name' => 'ST_POINTFROMGEOHASH'
                ],[
                    'help_keyword_id' => '523',
                    'name' => 'ST_POINTFROMTEXT'
                ],[
                    'help_keyword_id' => '286',
                    'name' => 'ST_POINTFROMWKB'
                ],[
                    'help_keyword_id' => '22',
                    'name' => 'ST_POINTN'
                ],[
                    'help_keyword_id' => '268',
                    'name' => 'ST_POLYFROMTEXT'
                ],[
                    'help_keyword_id' => '323',
                    'name' => 'ST_POLYFROMWKB'
                ],[
                    'help_keyword_id' => '169',
                    'name' => 'ST_POLYGONFROMTEXT'
                ],[
                    'help_keyword_id' => '51',
                    'name' => 'ST_POLYGONFROMWKB'
                ],[
                    'help_keyword_id' => '58',
                    'name' => 'ST_SIMPLIFY'
                ],[
                    'help_keyword_id' => '589',
                    'name' => 'ST_SRID'
                ],[
                    'help_keyword_id' => '49',
                    'name' => 'ST_STARTPOINT'
                ],[
                    'help_keyword_id' => '349',
                    'name' => 'ST_SYMDIFFERENCE'
                ],[
                    'help_keyword_id' => '167',
                    'name' => 'ST_TOUCHES'
                ],[
                    'help_keyword_id' => '204',
                    'name' => 'ST_UNION'
                ],[
                    'help_keyword_id' => '365',
                    'name' => 'ST_VALIDATE'
                ],[
                    'help_keyword_id' => '289',
                    'name' => 'ST_WITHIN'
                ],[
                    'help_keyword_id' => '565',
                    'name' => 'ST_X'
                ],[
                    'help_keyword_id' => '156',
                    'name' => 'ST_Y'
                ],[
                    'help_keyword_id' => '382',
                    'name' => 'SUBCLASS_ORIGIN'
                ],[
                    'help_keyword_id' => '363',
                    'name' => 'SUBJECT'
                ],[
                    'help_keyword_id' => '385',
                    'name' => 'SUPER'
                ],[
                    'help_keyword_id' => '190',
                    'name' => 'TABLE'
                ],[
                    'help_keyword_id' => '672',
                    'name' => 'TABLES'
                ],[
                    'help_keyword_id' => '121',
                    'name' => 'TABLESPACE'
                ],[
                    'help_keyword_id' => '400',
                    'name' => 'TABLE_NAME'
                ],[
                    'help_keyword_id' => '619',
                    'name' => 'TEMPORARY'
                ],[
                    'help_keyword_id' => '333',
                    'name' => 'TERMINATED'
                ],[
                    'help_keyword_id' => '67',
                    'name' => 'THEN'
                ],[
                    'help_keyword_id' => '541',
                    'name' => 'TIME'
                ],[
                    'help_keyword_id' => '64',
                    'name' => 'TIMESTAMP'
                ],[
                    'help_keyword_id' => '396',
                    'name' => 'TO'
                ],[
                    'help_keyword_id' => '497',
                    'name' => 'TOUCHES'
                ],[
                    'help_keyword_id' => '406',
                    'name' => 'TRADITIONAL'
                ],[
                    'help_keyword_id' => '444',
                    'name' => 'TRAILING'
                ],[
                    'help_keyword_id' => '269',
                    'name' => 'TRANSACTION'
                ],[
                    'help_keyword_id' => '676',
                    'name' => 'TRIGGER'
                ],[
                    'help_keyword_id' => '242',
                    'name' => 'TRIGGERS'
                ],[
                    'help_keyword_id' => '187',
                    'name' => 'TRUE'
                ],[
                    'help_keyword_id' => '566',
                    'name' => 'TRUNCATE'
                ],[
                    'help_keyword_id' => '426',
                    'name' => 'TYPE'
                ],[
                    'help_keyword_id' => '298',
                    'name' => 'UNCOMMITTED'
                ],[
                    'help_keyword_id' => '527',
                    'name' => 'UNDO'
                ],[
                    'help_keyword_id' => '514',
                    'name' => 'UNINSTALL'
                ],[
                    'help_keyword_id' => '538',
                    'name' => 'UNION'
                ],[
                    'help_keyword_id' => '241',
                    'name' => 'UNIQUE'
                ],[
                    'help_keyword_id' => '24',
                    'name' => 'UNLOCK'
                ],[
                    'help_keyword_id' => '477',
                    'name' => 'UNSIGNED'
                ],[
                    'help_keyword_id' => '650',
                    'name' => 'UNTIL'
                ],[
                    'help_keyword_id' => '56',
                    'name' => 'UPDATE'
                ],[
                    'help_keyword_id' => '283',
                    'name' => 'UPGRADE'
                ],[
                    'help_keyword_id' => '255',
                    'name' => 'USAGE'
                ],[
                    'help_keyword_id' => '43',
                    'name' => 'USE'
                ],[
                    'help_keyword_id' => '313',
                    'name' => 'USER'
                ],[
                    'help_keyword_id' => '226',
                    'name' => 'USER_RESOURCES'
                ],[
                    'help_keyword_id' => '332',
                    'name' => 'USE_FRM'
                ],[
                    'help_keyword_id' => '129',
                    'name' => 'USING'
                ],[
                    'help_keyword_id' => '357',
                    'name' => 'VALUE'
                ],[
                    'help_keyword_id' => '564',
                    'name' => 'VALUES'
                ],[
                    'help_keyword_id' => '222',
                    'name' => 'VARCHARACTER'
                ],[
                    'help_keyword_id' => '62',
                    'name' => 'VARIABLE'
                ],[
                    'help_keyword_id' => '278',
                    'name' => 'VARIABLES'
                ],[
                    'help_keyword_id' => '401',
                    'name' => 'VARYING'
                ],[
                    'help_keyword_id' => '470',
                    'name' => 'VIEW'
                ],[
                    'help_keyword_id' => '325',
                    'name' => 'VIRTUAL'
                ],[
                    'help_keyword_id' => '682',
                    'name' => 'WAIT'
                ],[
                    'help_keyword_id' => '107',
                    'name' => 'WARNINGS'
                ],[
                    'help_keyword_id' => '495',
                    'name' => 'WHEN'
                ],[
                    'help_keyword_id' => '383',
                    'name' => 'WHERE'
                ],[
                    'help_keyword_id' => '665',
                    'name' => 'WHILE'
                ],[
                    'help_keyword_id' => '510',
                    'name' => 'WITH'
                ],[
                    'help_keyword_id' => '29',
                    'name' => 'WITHIN'
                ],[
                    'help_keyword_id' => '13',
                    'name' => 'WORK'
                ],[
                    'help_keyword_id' => '574',
                    'name' => 'WRAPPER'
                ],[
                    'help_keyword_id' => '324',
                    'name' => 'WRITE'
                ],[
                    'help_keyword_id' => '201',
                    'name' => 'X'
                ],[
                    'help_keyword_id' => '380',
                    'name' => 'X509'
                ],[
                    'help_keyword_id' => '625',
                    'name' => 'XA'
                ],[
                    'help_keyword_id' => '260',
                    'name' => 'Y'
                ],[
                    'help_keyword_id' => '240',
                    'name' => 'YEAR'
                ],[
                    'help_keyword_id' => '28',
                    'name' => 'YEAR_MONTH'
                ],[
                    'help_keyword_id' => '529',
                    'name' => 'ZEROFILL'
                ]
            ];
        $columns            = ['help_keyword_id','name'];
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