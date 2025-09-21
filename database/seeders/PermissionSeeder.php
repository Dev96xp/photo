<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //1
        //Permission::create(['name' => 'Crear cursos',]);
        //2
        Permission::create(['name' => 'Leer cursos',]);
        //3
        Permission::create(['name' => 'Actualizar cursos',]);
        //4
        Permission::create(['name' => 'Eliminar cursos',]);
        //5
        Permission::create(['name' => 'Ver dashboard',]);

        //6 - roles
        Permission::create(['name' => 'Crear role',]);
        //7
        Permission::create(['name' => 'Listar role',]);
        //8
        Permission::create(['name' => 'Editar role',]);
        //9
        Permission::create(['name' => 'Eliminar role',]);

        //10 - users
        Permission::create(['name' => 'Leer usuarios',]);
        //11
        Permission::create(['name' => 'Editar usuarios',]);
        //12
        Permission::create(['name' => 'Customer',]);

        //13
        Permission::create(['name' => 'Trabajar en Production',]);
        //14
        Permission::create(['name' => 'Trabajar en Ventas',]);
        //15
        Permission::create(['name' => 'Trabajar en Compras',]);
        //16
        Permission::create(['name' => 'Trabajar en Almacen',]);
        //17
        Permission::create(['name' => 'Trabajar en Shipping',]);
        //18
        Permission::create(['name' => 'CEO',]);
        //19
        Permission::create(['name' => 'Photography',]);

        //20 - Productos
        Permission::create(['name' => 'Product Index',]);
        //21
        Permission::create(['name' => 'Product Create',]);
        //22
        Permission::create(['name' => 'Product Edit',]);
        //23
        Permission::create(['name' => 'Product Import/Export Data',]);
        //24
        Permission::create(['name' => 'Product Download Images',]);

        //25 - Apointment
        Permission::create(['name' => 'Apointment index',]);  // Este se llamaba business


        //26
        Permission::create(['name' => 'Apointment create',]);
        //27
        Permission::create(['name' => 'Apointment edit',]);
        //28
        Permission::create(['name' => 'Apointment open1',]);
        //29
        Permission::create(['name' => 'Apointment open2',]);

        //30 - POS
        Permission::create(['name' => 'POS index',]);
        //31
        Permission::create(['name' => 'POS create',]);
        //32
        Permission::create(['name' => 'POS edit',]);
        //33
        Permission::create(['name' => 'POS open1',]);
        //34
        Permission::create(['name' => 'POS open2',]);

        //35 - ONLINE ORDERS
        Permission::create(['name' => 'Online orders index',]);
        //36
        Permission::create(['name' => 'Online orders create',]);
        //37
        Permission::create(['name' => 'Online orders edit',]);
        //38
        Permission::create(['name' => 'Online orders open1',]);
        //39
        Permission::create(['name' => 'Online orders open2',]);

        //40 - BRANDS
        Permission::create(['name' => 'Brands index',]);
        //41
        Permission::create(['name' => 'Brands create',]);
        //42
        Permission::create(['name' => 'Brands edit',]);
        //43
        Permission::create(['name' => 'Brands open1',]);
        //44
        Permission::create(['name' => 'Brands open2',]);

        //45 - CATEGORIES
        Permission::create(['name' => 'Categories index',]);
        //46
        Permission::create(['name' => 'Categories create',]);
        //47
        Permission::create(['name' => 'Categories edit',]);
        //48
        Permission::create(['name' => 'Categories open1',]);
        //49
        Permission::create(['name' => 'Categories open2',]);

        //50 - SUBCATEGORIES
        Permission::create(['name' => 'Subcategories index',]);
        //51
        Permission::create(['name' => 'Subcategories create',]);
        //52
        Permission::create(['name' => 'Subcategories edit',]);
        //53
        Permission::create(['name' => 'Subcategories open1',]);
        //54
        Permission::create(['name' => 'Subcategories open2',]);

        //55 - INVENTORY
        Permission::create(['name' => 'Inventory index',]);
        //56
        Permission::create(['name' => 'Inventory create',]);
        //57
        Permission::create(['name' => 'Inventory edit',]);
        //58
        Permission::create(['name' => 'Inventory open1',]);
        //59
        Permission::create(['name' => 'Inventory open2',]);

        //60 - DEPARTMENT
        Permission::create(['name' => 'Department index',]);
        //61
        Permission::create(['name' => 'Department create',]);
        //62
        Permission::create(['name' => 'Department edit',]);
        //63
        Permission::create(['name' => 'Department open1',]);
        //64
        Permission::create(['name' => 'Department open2',]);

        //65 - PACKAGES
        Permission::create(['name' => 'Packages index',]);
        //66
        Permission::create(['name' => 'Packages create',]);
        //67
        Permission::create(['name' => 'Packages edit',]);
        //68
        Permission::create(['name' => 'Packages open1',]);
        //69
        Permission::create(['name' => 'Packages open2',]);

        //70 - SPECIAL ORDERS
        Permission::create(['name' => 'Special Orders index',]);
        //71
        Permission::create(['name' => 'Special Orders create',]);
        //72
        Permission::create(['name' => 'Special Orders edit',]);
        //73
        Permission::create(['name' => 'Special Orders open1',]);
        //74
        Permission::create(['name' => 'Special Orders open2',]);

        //75 - TUXEDO
        Permission::create(['name' => 'Tuxedo index',]);
        //76
        Permission::create(['name' => 'Tuxedo create',]);
        //77
        Permission::create(['name' => 'Tuxedo edit',]);
        //78
        Permission::create(['name' => 'Tuxedo open1',]);
        //79
        Permission::create(['name' => 'Tuxedo open2',]);

        //80 - PRODUCTION
        Permission::create(['name' => 'Production index',]);
        //81
        Permission::create(['name' => 'Production create',]);
        //82
        Permission::create(['name' => 'Production edit',]);
        //83
        Permission::create(['name' => 'Production open1',]);
        //84
        Permission::create(['name' => 'Production open2',]);

        //85 - SETTINGS
        Permission::create(['name' => 'Settings index',]);
        //86
        Permission::create(['name' => 'Settings create',]);
        //87
        Permission::create(['name' => 'Settings edit',]);
        //88
        Permission::create(['name' => 'Settings delete',]);
        //89
        Permission::create(['name' => 'Settings open2',]);

        //90 - CHECK IN
        Permission::create(['name' => 'Check-in index',]);
        //91
        Permission::create(['name' => 'Check-in create',]);
        //92
        Permission::create(['name' => 'Check-in edit',]);
        //93
        Permission::create(['name' => 'Check-in open1',]);
        //94
        Permission::create(['name' => 'Check-in open2',]);

        //95 - PERMISSIONS
        Permission::create(['name' => 'Permission index',]);
        //96
        Permission::create(['name' => 'Permission create',]);
        //97
        Permission::create(['name' => 'Permission edit',]);
        //98
        Permission::create(['name' => 'Permission open1',]);
        //99
        Permission::create(['name' => 'Permission open2',]);

        //100 - USERS
        Permission::create(['name' => 'User index',]);
        //101
        Permission::create(['name' => 'User create',]);
        //102
        Permission::create(['name' => 'User edit',]);
        //103
        Permission::create(['name' => 'User open1',]);
        //104
        Permission::create(['name' => 'User open2',]);
        //105
        Permission::create(['name' => 'User open3',]);
        //106
        Permission::create(['name' => 'User open4',]);
        // IDS
        //107
        Permission::create(['name' => 'Ids index',]);
        //108
        Permission::create(['name' => 'Ids create',]);
        //109
        Permission::create(['name' => 'Ids edit',]);
        //110
        Permission::create(['name' => 'Ids delete',]);
        //111
        Permission::create(['name' => 'Ids open1',]);
        // Pack Configuration
        //112
        Permission::create(['name' => 'Configuration Pack index',]);
        //113
        Permission::create(['name' => 'Configuration Pack create',]);
        //114
        Permission::create(['name' => 'Configuration Pack edit',]);
        //115
        Permission::create(['name' => 'Configuration Pack delete',]);
        //116
        Permission::create(['name' => 'Configuration Pack open1',]);

        //117
        Permission::create(['name' => 'Dashborad online orders',]);
        //118
        Permission::create(['name' => 'Dashborad events',]);
        //119
        Permission::create(['name' => 'Dashborad settings',]);
        //120
        Permission::create(['name' => 'Dashborad cashier',]);
        //121
        Permission::create(['name' => 'Dashborad Open1',]);
        //122
        Permission::create(['name' => 'Dashborad Open2',]);
        //123
        Permission::create(['name' => 'Dashborad Open3',]);
        //124
        Permission::create(['name' => 'Dashborad Open4',]);
        //121
        Permission::create(['name' => 'Dashborad Open5',]);
        //122
        Permission::create(['name' => 'Dashborad Open6',]);
        //123
        Permission::create(['name' => 'Dashborad Open7',]);
        //124
        Permission::create(['name' => 'Dashborad Open8',]);

    }
}
