<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\PincodeRegion;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
//use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Auth;
use Exception;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Validation\Rule;

class PincodeRegionImport implements ToModel,WithHeadingRow,WithChunkReading,WithValidation
{
  use Importable;

    public $regionid;

	public function __construct($region) 
    {
      $this->regionid=$region->id;
    
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
       try {

            if($row['pincode']!=''){
              return new PincodeRegion([
                  'region_id'=>$this->regionid,
                  'pincode'     => $row['pincode'],
                  'pincode_prefix'=>''
              ]);
            }
              
   	      } 
       catch (\Maatwebsite\Excel\Validators\ValidationException $e) 
        {

           $failures = $e->failures();
            foreach ($failures as $failure) {
               $failure->row(); // row that went wrong
               $failure->attribute(); // either heading key (if using heading row concern) or column index
               $failure->errors(); // Actual error messages from Laravel validator
               $failure->values(); // The values of the row that has failed.
           }
        }     

    
    }


    // /**
    // * @param Collection $collection
    // */
    // public function collection(Collection $collection)
    // {
    //     //
    // }

     public function chunkSize(): int
    {
        return 1000;
    }

    public function rules(): array
    {
      try
      {
        return [
            'pincode' => Rule::unique('pincode_region','pincode')
        ];
      }
      catch (\Maatwebsite\Excel\Validators\ValidationException $e) 
      {
         $failures = $e->failures();
          foreach ($failures as $failure) {
              $failure->row(); // row that went wrong
             $failure->attribute(); // either heading key (if using heading row concern) or column index
             $failure->errors(); // Actual error messages from Laravel validator
             $failure->values(); // The values of the row that has failed.
         }
      }  

        
    }

     // public function customValidationMessages()
     //  {
     //      return [
     //          'pincode.unique' => 'Duplicate',
     //      ];
     //  }

}
