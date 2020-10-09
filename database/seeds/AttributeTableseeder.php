<?php

use Illuminate\Database\Seeder;

class AttributeTableseeder extends Seeder {
    /**
    * Run the database seeds.
    *
    * @return void
    */

    public function run() {
        DB::table( 'attributes' )->insert( [
            'attributeset_id'=>'1',
            'attribute_code'=>'no variation',
            'attribute_label'=>'No Variation',
            'input_type'=>'label',
            'input_value'=>null,
            'required'=>true,
            'visible'=>true,
            'searchable'=>true,
            'filterable'=>true,
            'comparable'=>true,
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

        DB::table( 'attributes' )->insert( [
            'attributeset_id'=>'2',
            'attribute_code'=>'color',
            'attribute_label'=>'Color',
            'input_type'=>'checkbox',
            'input_value'=>'["blue","black"]',
            'required'=>true,
            'visible'=>true,
            'searchable'=>true,
            'filterable'=>true,
            'comparable'=>true,
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

        DB::table( 'attributes' )->insert( [
            'attributeset_id'=>'2',
            'attribute_code'=>'storage',
            'attribute_label'=>'Storage',
            'input_type'=>'checkbox',
            'input_value'=>'{"0":"8GB","1":"16GB","2":"32GB","3":"64GB","4":"128GB"}',
            'required'=>true,
            'visible'=>true,
            'searchable'=>true,
            'filterable'=>true,
            'comparable'=>true,
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

        DB::table( 'attributes' )->insert( [
            'attributeset_id'=>'8',
            'attribute_code'=>'display size',
            'attribute_label'=>'Display Size',
            'input_type'=>'checkbox',
            'input_value'=>'{"0":"480×800","1":"640×1136","2":"720×1280","3":"750×1334","4":"1080×1920"}',
            'required'=>true,
            'visible'=>true,
            'searchable'=>true,
            'filterable'=>true,
            'comparable'=>true,
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

        DB::table( 'attributes' )->insert( [
            'attributeset_id'=>'5',
            'attribute_code'=>'no variation',
            'attribute_label'=>'No Variation',
            'input_type'=>'label',
            'input_value'=>null,
            'required'=>true,
            'visible'=>true,
            'searchable'=>true,
            'filterable'=>true,
            'comparable'=>true,
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );
        DB::table( 'attributes' )->insert( [
            'attributeset_id'=>'9',
            'attribute_code'=>'Price',
            'attribute_label'=>'Card Price',
            'input_type'=>'checkbox',
            'input_value'=>'{"0":"price1","1":"price2","2":"price3","3":"price4","4":"price5"}',
            'required'=>true,
            'visible'=>true,
            'searchable'=>true,
            'filterable'=>true,
            'comparable'=>true,
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

        DB::table( 'attributes' )->insert( [
            'attributeset_id'=>'10',
            'attribute_code'=>'Format Type',
            'attribute_label'=>'Format Type',
            'input_type'=>'checkbox',
            'input_value'=>'[ "zip", "txt", "pdf" ]',
            'required'=>true,
            'visible'=>true,
            'searchable'=>true,
            'filterable'=>true,
            'comparable'=>true,
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

        DB::table( 'attributes' )->insert( [
            'attributeset_id'=>'11',
            'attribute_code'=>'Size In MB',
            'attribute_label'=>'Size In MB',
            'input_type'=>'checkbox',
            'input_value'=>'[ "200.6 MB", "246.6 MB", "300 MB" ]',
            'required'=>true,
            'visible'=>true,
            'searchable'=>true,
            'filterable'=>true,
            'comparable'=>true,
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );
        DB::table( 'attributes' )->insert( [
            'attributeset_id'=>'12',
            'attribute_code'=>'License Terms',
            'attribute_label'=>'License Terms',
            'input_type'=>'checkbox',
            'input_value'=>'[ "Subscription Plan1", "Subscription Plan2" ]',
            'required'=>true,
            'visible'=>true,
            'searchable'=>true,
            'filterable'=>true,
            'comparable'=>true,
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

        DB::table( 'attributes' )->insert( [
            'attributeset_id'=>'7',
            'attribute_code'=>'color and size',
            'attribute_label'=>'Color & Size',
            'input_type'=>'checkbox',
            'input_value'=>'["blue-small","red-small","white-small","blue-medium","red-medium","white-medium"]',
            'required'=>true,
            'visible'=>true,
            'searchable'=>true,
            'filterable'=>true,
            'comparable'=>true,
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

    }
}
