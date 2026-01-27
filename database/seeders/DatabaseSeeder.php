<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Country;
use App\Models\Detail;
use App\Models\Feature;
use App\Models\Invitation;
use App\Models\page;
use App\Models\Payment;
use App\Models\Schedule;
use App\Models\Sectionx;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Si existe que ELIMINE la carpeta products, incluyendo sus archivos internos
        // previniendo llenar de imagenes que no se volveran a usar
        Storage::deleteDirectory('public/products');

        //****IMPORTANTE****: Crea una carpeta llamada products, donde crea esta carpeta ???
        // DEPENDIENDO DEL DISCO QUE FUE DEFINIDO EN EL ARCHIVO  ( config/filesystems.php ),
        // QUE EN NUESTRO CASO FUE EL DISCO O FOLDER: ( public ),
        // COMO SE MUESTRA 'default' => env('FILESYSTEM_DRIVER', 'public'),
        // '/app/public/products/'

        //Crea una carpeta llamada products, dentro de(storage/app), quedando asi (storage/app/products)
        Storage::makeDirectory('public/products');

        Storage::deleteDirectory('public/sections');
        Storage::makeDirectory('public/sections');

        Storage::deleteDirectory('public/sectionx');
        Storage::makeDirectory('public/sectionx');

        Storage::deleteDirectory('public/subcategories');
        Storage::makeDirectory('public/subcategories');

        Storage::deleteDirectory('public/galleries');
        Storage::makeDirectory('public/galleries');

        // Fotos de los recibos de los gastos
        Storage::deleteDirectory('public/expenses');
        Storage::makeDirectory('public/expenses');

        $this->call(BusinessSeeder::class);

        $this->call(StoreSeeder::class);
        // IDS
        $this->call(IdsSeeder::class);

        $this->call(PermissionSeeder::class);

        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);

        $this->call(InviteSeeder::class);

        $this->call(InvitationSeeder::class);

        $this->call(SectionSeeder::class);

        $this->call(PartSeeder::class);

        $this->call(TypeCategorySeeder::class);
        $this->call(StatusCategorySeeder::class);
        $this->call(DetailSeeder::class);

        $this->call(FeatureSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(CategorySeeder::class);

        $this->call(TaxSeeder::class);
        $this->call(ImpostSeeder::class);

        $this->call(SubcategorySeeder::class);
        $this->call(StatusProductSeeder::class);
        $this->call(SizeSeeder::class);
        $this->call(GroupSeeder::class);


        $this->call(ProductSeeder::class);

        $this->call(CountrySeeder::class);

        $this->call(StateSeeder::class);

        $this->call(ShippingCompanySeeder::class);

        $this->call(AccountSeeder::class);

        $this->call(PaymentSeeder::class);

        // Paquetes
        $this->call(ElementSeeder::class);
        $this->call(PackageSeeder::class);

        $this->call(PackageLocationSeeder::class);

        //$this->call(ScheduleSeeder::class); No se va usar se cambio, por events
        $this->call(EventSeeder::class);  //Crea 20 eventos

        $this->call(StatusItemSeeder::class);

        $this->call(VenueSeeder::class); // Crea solo 2 salones
        $this->call(StatusItemsVenueSeeder::class);  //Crea solo 4 cosas por cada salon cerado
        $this->call(ItemsVenueSeeder::class);  //Crea solo 4 cosas por cada salon cerado

        $this->call(PageSeeder::class);  //Crea solo 3
        $this->call(SectionxSeeder::class);  //Crea solo 3

        $this->call(ColorSeeder::class);

        $this->call(GallerySeeder::class);

        $this->call(TagSeeder::class);
        $this->call(PostSeeder::class);

        $this->call(VendorSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(ExpenseSeeder::class);


    }
}
