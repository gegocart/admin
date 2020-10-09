<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(UserGroupTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(SellerProfileSeeder::class);
        $this->call(CountriesTableSeeder::class);
       $this->call(StateTableSeeder::class);
        $this->call(CityTableSeeder::class);
        //$this->call(CityPincodeTableSeeder::class);
        $this->call(RegionTableSeeder::class);
        $this->call(PincodeRegionTableSeeder::class);
        $this->call(AttributesetTableseeder::class);
        $this->call(Attributecodeseeder::class);
        $this->call(AttributeTableseeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(TaxTypeTableSeeder::class);
        $this->call(AttributeCategoryTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(StoreTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(CategoryProductTableSeeder::class);
        $this->call(AttributeProductSeeder::class);
        $this->call(ProductSourceSeeder::class);
        $this->call(ProductGallery::class);
        $this->call(ProductVariationSeeder::class);
        $this->call(StockSeeder::class);
        $this->call(ProductFeaturedSeeder::class);
        $this->call(PaymentMethodSeeder::class);
        $this->call(ShippingMethodtable::class);
        $this->call(CountryShippingSeeder::class);
        $this->call(MailTemplateSeeder::class);
        $this->call(AddressTableSeeder::class);
        $this->call(FeeSettingsTableSeeder::class);
        $this->call(ShippingChargesTableSeeder::class);
        $this->call(FeesTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(GiftcardImageTableSeeder::class);
        $this->call(ProductRatingTableSeeder::class);
        $this->call(ProductQuestionTableSeeder::class);
        $this->call(ProductAnswerTableSeeder::class);
       
    
   }
}
