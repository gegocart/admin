<?php

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    
    public function run()
    {
     $countries = array(
        array('id' => 1,'code' => 'AF' ,'name' => "Afghanistan",'phonecode' => 93,'status'=>'active'
            ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 2,'code' => 'AL' ,'name' => "Albania",'phonecode' => 355,'status'=>'active'
           ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 3,'code' => 'DZ' ,'name' => "Algeria",'phonecode' => 213,'status'=>'active'
           ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 4,'code' => 'AS' ,'name' => "American Samoa",'phonecode' => 1684,
          'status'=>'active'
          ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 5,'code' => 'AD' ,'name' => "Andorra",'phonecode' => 376,'status'=>'active'
         ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 6,'code' => 'AO' ,'name' => "Angola",'phonecode' => 244,'status'=>'active'
          ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 7,'code' => 'AI' ,'name' => "Anguilla",'phonecode' => 1264,'status'=>'active'
          ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 8,'code' => 'AQ' ,'name' => "Antarctica",'phonecode' => 0,'status'=>'active'
          ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 9,'code' => 'AG' ,'name' => "Antigua And Barbuda",'phonecode' => 1268,'status'=>'active'
          ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 10,'code' => 'AR','name' => "Argentina",'phonecode' => 54,'status'=>'active'
                             ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 11,'code' => 'AM','name' => "Armenia",'phonecode' => 374,'status'=>'active'
          ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 12,'code' => 'AW','name' => "Aruba",'phonecode' => 297,'status'=>'active'
           ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 13,'code' => 'AU','name' => "Australia",'phonecode' => 61,'status'=>'active'
           ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 14,'code' => 'AT','name' => "Austria",'phonecode' => 43,'status'=>'active'
          ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 15,'code' => 'AZ','name' => "Azerbaijan",'phonecode' => 994,'status'=>'active'
          ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
      array('id' => 16,'code' => 'BS','name' => "Bahamas The",'phonecode' => 1242,'status'=>'active'
               ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 17,'code' => 'BH','name' => "Bahrain",'phonecode' => 973,'status'=>'active'
             ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 18,'code' => 'BD','name' => "Bangladesh",'phonecode' => 880,'status'=>'active'
                 ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 19,'code' => 'BB','name' => "Barbados",'phonecode' => 1246,'status'=>'active'
                            ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 20,'code' => 'BY','name' => "Belarus",'phonecode' => 375,'status'=>'active'
                        ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 21,'code' => 'BE','name' => "Belgium",'phonecode' => 32,'status'=>'active'
                            ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 22,'code' => 'BZ','name' => "Belize",'phonecode' => 501,'status'=>'active'
                    ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 23,'code' => 'BJ','name' => "Benin",'phonecode' => 229,'status'=>'active'
           ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 24,'code' => 'BM','name' => "Bermuda",'phonecode' => 1441,'status'=>'active'
            ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 25,'code' => 'BT','name' => "Bhutan",'phonecode' => 975,'status'=>'active'
              ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 26,'code' => 'BO','name' => "Bolivia",'phonecode' => 591,'status'=>'active'
          ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 27,'code' => 'BA','name' => "Bosnia and Herzegovina",'phonecode' => 387,'status'=>'active'
           ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 28,'code' => 'BW','name' => "Botswana",'phonecode' => 267,'status'=>'active'
         ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 29,'code' => 'BV','name' => "Bouvet Island",'phonecode' => 0,'status'=>'active'
          ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 30,'code' => 'BR','name' => "Brazil",'phonecode' => 55,'status'=>'active'
              ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 31,'code' => 'IO','name' => "British Indian Ocean Territory",'phonecode' => 246,
            'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 32,'code' => 'BN','name' => "Brunei",'phonecode' => 673,'status'=>'active'
          ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 33,'code' => 'BG','name' => "Bulgaria",'phonecode' => 359,'status'=>'active'
           ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 34,'code' => 'BF','name' => "Burkina Faso",'phonecode' => 226,'status'=>'active'
          ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 35,'code' => 'BI','name' => "Burundi",'phonecode' => 257,'status'=>'active'
        ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 36,'code' => 'KH','name' => "Cambodia",'phonecode' => 855,'status'=>'active'
        ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 37,'code' => 'CM','name' => "Cameroon",'phonecode' => 237,'status'=>'active'
        ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 38,'code' => 'CA','name' => "Canada",'phonecode' => 1,'status'=>'active'
         ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 39,'code' => 'CV','name' => "Cape Verde",'phonecode' => 238,'status'=>'active'
         ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 40,'code' => 'KY','name' => "Cayman Islands",'phonecode' => 1345,'status'=>'active'
         ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 41,'code' => 'CF','name' => "Central African Republic",'phonecode' => 236,'status'=>'active'
         ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 42,'code' => 'TD','name' => "Chad",'phonecode' => 235,'status'=>'active'
          ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 43,'code' => 'CL','name' => "Chile",'phonecode' => 56,'status'=>'active'
         ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 44,'code' => 'CN','name' => "China",'phonecode' => 86,'status'=>'active'
         ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 45,'code' => 'CX','name' => "Christmas Island",'phonecode' => 61,'status'=>'active'
         ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 46,'code' => 'CC','name' => "Cocos (Keeling) Islands",'phonecode' => 672,'status'=>'active'
          ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 47,'code' => 'CO','name' => "Colombia",'phonecode' => 57,'status'=>'active'
        ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 48,'code' => 'KM','name' => "Comoros",'phonecode' => 269,'status'=>'active'
         ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 49,'code' => 'CG','name' => "Congo",'phonecode' => 242,'status'=>'active'
          ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 50,'code' => 'CD','name' => "Congo The Democratic Republic Of The",'phonecode' => 242,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 51,'code' => 'CK','name' => "Cook Islands",'phonecode' => 682,'status'=>'active'
         ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 52,'code' => 'CR','name' => "Costa Rica",'phonecode' => 506,'status'=>'active'
          ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 53,'code' => 'CI','name' => "Cote D Ivoire (Ivory Coast)",'phonecode' => 225,'status'=>'active'
          ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 54,'code' => 'HR','name' => "Croatia (Hrvatska)",'phonecode' => 385,'status'=>'active'
           ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 55,'code' => 'CU','name' => "Cuba",'phonecode' => 53,'status'=>'active'
         ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 56,'code' => 'CY','name' => "Cyprus",'phonecode' => 357,'status'=>'active'
          ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 57,'code' => 'CZ','name' => "Czech Republic",'phonecode' => 420,'status'=>'active'
        ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 58,'code' => 'DK','name' => "Denmark",'phonecode' => 45,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 59,'code' => 'DJ','name' => "Djibouti",'phonecode' => 253,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 60,'code' => 'DM','name' => "Dominica",'phonecode' => 1767,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 61,'code' => 'DO','name' => "Dominican Republic",'phonecode' => 1809,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 62,'code' => 'TP','name' => "East Timor",'phonecode' => 670,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 63,'code' => 'EC','name' => "Ecuador",'phonecode' => 593,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 64,'code' => 'EG','name' => "Egypt",'phonecode' => 20,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 65,'code' => 'SV','name' => "El Salvador",'phonecode' => 503,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 66,'code' => 'GQ','name' => "Equatorial Guinea",'phonecode' => 240,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 67,'code' => 'ER','name' => "Eritrea",'phonecode' => 291,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 68,'code' => 'EE','name' => "Estonia",'phonecode' => 372,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 69,'code' => 'ET','name' => "Ethiopia",'phonecode' => 251,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 70,'code' => 'XA','name' => "External Territories of Australia",'phonecode' => 61,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 71,'code' => 'FK','name' => "Falkland Islands",'phonecode' => 500,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 72,'code' => 'FO','name' => "Faroe Islands",'phonecode' => 298,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 73,'code' => 'FJ','name' => "Fiji Islands",'phonecode' => 679,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 74,'code' => 'FI','name' => "Finland",'phonecode' => 358,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 75,'code' => 'FR','name' => "France",'phonecode' => 33,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 76,'code' => 'GF','name' => "French Guiana",'phonecode' => 594,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 77,'code' => 'PF','name' => "French Polynesia",'phonecode' => 689,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 78,'code' => 'TF','name' => "French Southern Territories",'phonecode' => 0,'status'=>'active'
         ,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 79,'code' => 'GA','name' => "Gabon",'phonecode' => 241,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 80,'code' => 'GM','name' => "Gambia The",'phonecode' => 220,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 81,'code' => 'GE','name' => "Georgia",'phonecode' => 995,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 82,'code' => 'DE','name' => "Germany",'phonecode' => 49,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 83,'code' => 'GH','name' => "Ghana",'phonecode' => 233,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 84,'code' => 'GI','name' => "Gibraltar",'phonecode' => 350,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 85,'code' => 'GR','name' => "Greece",'phonecode' => 30,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 86,'code' => 'GL','name' => "Greenland",'phonecode' => 299,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 87,'code' => 'GD','name' => "Grenada",'phonecode' => 1473,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 88,'code' => 'GP','name' => "Guadeloupe",'phonecode' => 590,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 89,'code' => 'GU','name' => "Guam",'phonecode' => 1671,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 90,'code' => 'GT','name' => "Guatemala",'phonecode' => 502,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 91,'code' => 'XU','name' => "Guernsey and Alderney",'phonecode' => 44,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 92,'code' => 'GN','name' => "Guinea",'phonecode' => 224,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 93,'code' => 'GW','name' => "Guinea-Bissau",'phonecode' => 245,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 94,'code' => 'GY','name' => "Guyana",'phonecode' => 592,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 95,'code' => 'HT','name' => "Haiti",'phonecode' => 509,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 96,'code' => 'HM','name' => "Heard and McDonald Islands",'phonecode' => 0,
            'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 97,'code' => 'HN','name' => "Honduras",'phonecode' => 504,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 98,'code' => 'HK','name' => "Hong Kong S.A.R.",'phonecode' => 852,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 99,'code' => 'HU','name' => "Hungary",'phonecode' => 36,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 100,'code' => 'IS','name' => "Iceland",'phonecode' => 354,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 101,'code' => 'IN','name' => "India",'phonecode' => 91,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 102,'code' => 'ID','name' => "Indonesia",'phonecode' => 62,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 103,'code' => 'IR','name' => "Iran",'phonecode' => 98,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 104,'code' => 'IQ','name' => "Iraq",'phonecode' => 964,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 105,'code' => 'IE','name' => "Ireland",'phonecode' => 353,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 106,'code' => 'IL','name' => "Israel",'phonecode' => 972,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 107,'code' => 'IT','name' => "Italy",'phonecode' => 39,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 108,'code' => 'JM','name' => "Jamaica",'phonecode' => 1876,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 109,'code' => 'JP','name' => "Japan",'phonecode' => 81,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 110,'code' => 'XJ','name' => "Jersey",'phonecode' => 44,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 111,'code' => 'JO','name' => "Jordan",'phonecode' => 962,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 112,'code' => 'KZ','name' => "Kazakhstan",'phonecode' => 7,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 113,'code' => 'KE','name' => "Kenya",'phonecode' => 254,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 114,'code' => 'KI','name' => "Kiribati",'phonecode' => 686,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 115,'code' => 'KP','name' => "Korea North",'phonecode' => 850,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 116,'code' => 'KR','name' => "Korea South",'phonecode' => 82,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 117,'code' => 'KW','name' => "Kuwait",'phonecode' => 965,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 118,'code' => 'KG','name' => "Kyrgyzstan",'phonecode' => 996,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 119,'code' => 'LA','name' => "Laos",'phonecode' => 856,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 120,'code' => 'LV','name' => "Latvia",'phonecode' => 371,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 121,'code' => 'LB','name' => "Lebanon",'phonecode' => 961,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 122,'code' => 'LS','name' => "Lesotho",'phonecode' => 266,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 123,'code' => 'LR','name' => "Liberia",'phonecode' => 231,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 124,'code' => 'LY','name' => "Libya",'phonecode' => 218,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 125,'code' => 'LI','name' => "Liechtenstein",'phonecode' => 423,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 126,'code' => 'LT','name' => "Lithuania",'phonecode' => 370,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 127,'code' => 'LU','name' => "Luxembourg",'phonecode' => 352,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 128,'code' => 'MO','name' => "Macau S.A.R.",'phonecode' => 853,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 129,'code' => 'MK','name' => "Macedonia",'phonecode' => 389,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 130,'code' => 'MG','name' => "Madagascar",'phonecode' => 261,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 131,'code' => 'MW','name' => "Malawi",'phonecode' => 265,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 132,'code' => 'MY','name' => "Malaysia",'phonecode' => 60,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 133,'code' => 'MV','name' => "Maldives",'phonecode' => 960,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 134,'code' => 'ML','name' => "Mali",'phonecode' => 223,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 135,'code' => 'MT','name' => "Malta",'phonecode' => 356,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 136,'code' => 'XM','name' => "Man (Isle of)",'phonecode' => 44,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 137,'code' => 'MH','name' => "Marshall Islands",'phonecode' => 692,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 138,'code' => 'MQ','name' => "Martinique",'phonecode' => 596,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 139,'code' => 'MR','name' => "Mauritania",'phonecode' => 222,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 140,'code' => 'MU','name' => "Mauritius",'phonecode' => 230,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 141,'code' => 'YT','name' => "Mayotte",'phonecode' => 269,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 142,'code' => 'MX','name' => "Mexico",'phonecode' => 52,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 143,'code' => 'FM','name' => "Micronesia",'phonecode' => 691,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 144,'code' => 'MD','name' => "Moldova",'phonecode' => 373,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 145,'code' => 'MC','name' => "Monaco",'phonecode' => 377,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 146,'code' => 'MN','name' => "Mongolia",'phonecode' => 976,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 147,'code' => 'MS','name' => "Montserrat",'phonecode' => 1664,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 148,'code' => 'MA','name' => "Morocco",'phonecode' => 212,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 149,'code' => 'MZ','name' => "Mozambique",'phonecode' => 258,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 150,'code' => 'MM','name' => "Myanmar",'phonecode' => 95,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 151,'code' => 'NA','name' => "Namibia",'phonecode' => 264,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 152,'code' => 'NR','name' => "Nauru",'phonecode' => 674,'status'=>'active',
            'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 153,'code' => 'NP','name' => "Nepal",'phonecode' => 977,'status'=>'active',
            'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 154,'code' => 'AN','name' => "Netherlands Antilles",'phonecode' => 599,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 155,'code' => 'NL','name' => "Netherlands The",'phonecode' => 31,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 156,'code' => 'NC','name' => "New Caledonia",'phonecode' => 687,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 157,'code' => 'NZ','name' => "New Zealand",'phonecode' => 64,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 158,'code' => 'NI','name' => "Nicaragua",'phonecode' => 505,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 159,'code' => 'NE','name' => "Niger",'phonecode' => 227,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 160,'code' => 'NG','name' => "Nigeria",'phonecode' => 234,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 161,'code' => 'NU','name' => "Niue",'phonecode' => 683,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 162,'code' => 'NF','name' => "Norfolk Island",'phonecode' => 672,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 163,'code' => 'MP','name' => "Northern Mariana Islands",'phonecode' => 1670,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 164,'code' => 'NO','name' => "Norway",'phonecode' => 47,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 165,'code' => 'OM','name' => "Oman",'phonecode' => 968,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 166,'code' => 'PK','name' => "Pakistan",'phonecode' => 92,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 167,'code' => 'PW','name' => "Palau",'phonecode' => 680,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 168,'code' => 'PS','name' => "Palestinian Territory Occupied",'phonecode' => 970,
            'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 169,'code' => 'PA','name' => "Panama",'phonecode' => 507,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 170,'code' => 'PG','name' => "Papua new Guinea",'phonecode' => 675,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 171,'code' => 'PY','name' => "Paraguay",'phonecode' => 595,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 172,'code' => 'PE','name' => "Peru",'phonecode' => 51,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 173,'code' => 'PH','name' => "Philippines",'phonecode' => 63,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 174,'code' => 'PN','name' => "Pitcairn Island",'phonecode' => 0,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 175,'code' => 'PL','name' => "Poland",'phonecode' => 48,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 176,'code' => 'PT','name' => "Portugal",'phonecode' => 351,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 177,'code' => 'PR','name' => "Puerto Rico",'phonecode' => 1787,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 178,'code' => 'QA','name' => "Qatar",'phonecode' => 974,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 179,'code' => 'RE','name' => "Reunion",'phonecode' => 262,'status'=>'active',
          'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 180,'code' => 'RO','name' => "Romania",'phonecode' => 40,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 181,'code' => 'RU','name' => "Russia",'phonecode' => 70,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 182,'code' => 'RW','name' => "Rwanda",'phonecode' => 250,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 183,'code' => 'SH','name' => "Saint Helena",'phonecode' => 290,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 184,'code' => 'KN','name' => "Saint Kitts And Nevis",'phonecode' => 1869,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 185,'code' => 'LC','name' => "Saint Lucia",'phonecode' => 1758,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 186,'code' => 'PM','name' => "Saint Pierre and Miquelon",'phonecode' => 508,
            'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 187,'code' => 'VC','name' => "Saint Vincent And The Grenadines",'phonecode' => 1784,
            'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 188,'code' => 'WS','name' => "Samoa",'phonecode' => 684,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 189,'code' => 'SM','name' => "San Marino",'phonecode' => 378,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 190,'code' => 'ST','name' => "Sao Tome and Principe",'phonecode' => 239,
            'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 191,'code' => 'SA','name' => "Saudi Arabia",'phonecode' => 966,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 192,'code' => 'SN','name' => "Senegal",'phonecode' => 221,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 193,'code' => 'RS','name' => "Serbia",'phonecode' => 381,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 194,'code' => 'SC','name' => "Seychelles",'phonecode' => 248,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 195,'code' => 'SL','name' => "Sierra Leone",'phonecode' => 232,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 196,'code' => 'SG','name' => "Singapore",'phonecode' => 65,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 197,'code' => 'SK','name' => "Slovakia",'phonecode' => 421,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 198,'code' => 'SI','name' => "Slovenia",'phonecode' => 386,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 199,'code' => 'XG','name' => "Smaller Territories of the UK",'phonecode' => 44,
            'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 200,'code' => 'SB','name' => "Solomon Islands",'phonecode' => 677,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 201,'code' => 'SO','name' => "Somalia",'phonecode' => 252,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 202,'code' => 'ZA','name' => "South Africa",'phonecode' => 27,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 203,'code' => 'GS','name' => "South Georgia",'phonecode' => 0,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 204,'code' => 'SS','name' => "South Sudan",'phonecode' => 211,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 205,'code' => 'ES','name' => "Spain",'phonecode' => 34,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 206,'code' => 'LK','name' => "Sri Lanka",'phonecode' => 94,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 207,'code' => 'SD','name' => "Sudan",'phonecode' => 249,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 208,'code' => 'SR','name' => "Suriname",'phonecode' => 597,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 209,'code' => 'SJ','name' => "Svalbard And Jan Mayen Islands",'phonecode' => 47,
            'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 210,'code' => 'SZ','name' => "Swaziland",'phonecode' => 268,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 211,'code' => 'SE','name' => "Sweden",'phonecode' => 46,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 212,'code' => 'CH','name' => "Switzerland",'phonecode' => 41,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 213,'code' => 'SY','name' => "Syria",'phonecode' => 963,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 214,'code' => 'TW','name' => "Taiwan",'phonecode' => 886,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 215,'code' => 'TJ','name' => "Tajikistan",'phonecode' => 992,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 216,'code' => 'TZ','name' => "Tanzania",'phonecode' => 255,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 217,'code' => 'TH','name' => "Thailand",'phonecode' => 66,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 218,'code' => 'TG','name' => "Togo",'phonecode' => 228,'status'=>'active',
          'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 219,'code' => 'TK','name' => "Tokelau",'phonecode' => 690,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 220,'code' => 'TO','name' => "Tonga",'phonecode' => 676,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 221,'code' => 'TT','name' => "Trinidad And Tobago",'phonecode' => 1868,
            'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 222,'code' => 'TN','name' => "Tunisia",'phonecode' => 216,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 223,'code' => 'TR','name' => "Turkey",'phonecode' => 90,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 224,'code' => 'TM','name' => "Turkmenistan",'phonecode' => 7370,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 225,'code' => 'TC','name' => "Turks And Caicos Islands",'phonecode' => 1649,
            'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 226,'code' => 'TV','name' => "Tuvalu",'phonecode' => 688,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 227,'code' => 'UG','name' => "Uganda",'phonecode' => 256,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 228,'code' => 'UA','name' => "Ukraine",'phonecode' => 380,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 229,'code' => 'AE','name' => "United Arab Emirates",'phonecode' => 971,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 230,'code' => 'GB','name' => "United Kingdom",'phonecode' => 44,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 231,'code' => 'US','name' => "United States",'phonecode' => 1,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 232,'code' => 'UM','name' => "United States Minor Outlying Islands",
            'phonecode' => 1,'status'=>'active','created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 233,'code' => 'UY','name' => "Uruguay",'phonecode' => 598,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 234,'code' => 'UZ','name' => "Uzbekistan",'phonecode' => 998,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 235,'code' => 'VU','name' => "Vanuatu",'phonecode' => 678,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 236,'code' => 'VA','name' => "Vatican City State (Holy See)",
            'phonecode' => 39,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 237,'code' => 'VE','name' => "Venezuela",'phonecode' => 58,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 238,'code' => 'VN','name' => "Vietnam",'phonecode' => 84,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 239,'code' => 'VG','name' => "Virgin Islands (British)",'phonecode' => 1284
            ,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 240,'code' => 'VI','name' => "Virgin Islands (US)",
            'phonecode' => 1340,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 241,'code' => 'WF','name' => "Wallis And Futuna Islands",
            'phonecode' => 681,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 242,'code' => 'EH','name' => "Western Sahara",'phonecode' => 212,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 243,'code' => 'YE','name' => "Yemen",'phonecode' => 967,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 244,'code' => 'YU','name' => "Yugoslavia",'phonecode' => 38,'status'=>'active',
            'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 245,'code' => 'ZM','name' => "Zambia",'phonecode' => 260,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")),
        array('id' => 246,'code' => 'ZW','name' => "Zimbabwe",'phonecode' => 263,'status'=>'active','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s"))
        
      );

     DB::table('countries')->insert($countries);
         }
}