<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'basic_data_access',
            ],
            [
                'id'    => 18,
                'title' => 'database_create',
            ],
            [
                'id'    => 19,
                'title' => 'database_edit',
            ],
            [
                'id'    => 20,
                'title' => 'database_show',
            ],
            [
                'id'    => 21,
                'title' => 'database_delete',
            ],
            [
                'id'    => 22,
                'title' => 'database_access',
            ],
            [
                'id'    => 23,
                'title' => 'sequence_related_mysql_data_access',
            ],
            [
                'id'    => 24,
                'title' => 'sequence_create',
            ],
            [
                'id'    => 25,
                'title' => 'sequence_edit',
            ],
            [
                'id'    => 26,
                'title' => 'sequence_show',
            ],
            [
                'id'    => 27,
                'title' => 'sequence_delete',
            ],
            [
                'id'    => 28,
                'title' => 'sequence_access',
            ],
            [
                'id'    => 29,
                'title' => 'identifier_edit',
            ],
            [
                'id'    => 30,
                'title' => 'identifier_show',
            ],
            [
                'id'    => 31,
                'title' => 'identifier_delete',
            ],
            [
                'id'    => 32,
                'title' => 'identifier_access',
            ],
            [
                'id'    => 33,
                'title' => 'region_source_create',
            ],
            [
                'id'    => 34,
                'title' => 'region_source_edit',
            ],
            [
                'id'    => 35,
                'title' => 'region_source_show',
            ],
            [
                'id'    => 36,
                'title' => 'region_source_delete',
            ],
            [
                'id'    => 37,
                'title' => 'region_source_access',
            ],
            [
                'id'    => 38,
                'title' => 'localisation_type_create',
            ],
            [
                'id'    => 39,
                'title' => 'localisation_type_edit',
            ],
            [
                'id'    => 40,
                'title' => 'localisation_type_show',
            ],
            [
                'id'    => 41,
                'title' => 'localisation_type_delete',
            ],
            [
                'id'    => 42,
                'title' => 'localisation_type_access',
            ],
            [
                'id'    => 43,
                'title' => 'species_create',
            ],
            [
                'id'    => 44,
                'title' => 'species_edit',
            ],
            [
                'id'    => 45,
                'title' => 'species_show',
            ],
            [
                'id'    => 46,
                'title' => 'species_delete',
            ],
            [
                'id'    => 47,
                'title' => 'species_access',
            ],
            [
                'id'    => 48,
                'title' => 'reference_proteome_create',
            ],
            [
                'id'    => 49,
                'title' => 'reference_proteome_edit',
            ],
            [
                'id'    => 50,
                'title' => 'reference_proteome_show',
            ],
            [
                'id'    => 51,
                'title' => 'reference_proteome_delete',
            ],
            [
                'id'    => 52,
                'title' => 'reference_proteome_access',
            ],
            [
                'id'    => 53,
                'title' => 'pdb_related_mysql_data_access',
            ],
            [
                'id'    => 54,
                'title' => 'pdbtm_create',
            ],
            [
                'id'    => 55,
                'title' => 'pdbtm_edit',
            ],
            [
                'id'    => 56,
                'title' => 'pdbtm_show',
            ],
            [
                'id'    => 57,
                'title' => 'pdbtm_delete',
            ],
            [
                'id'    => 58,
                'title' => 'pdbtm_access',
            ],
            [
                'id'    => 59,
                'title' => 'new_chain_matrix_create',
            ],
            [
                'id'    => 60,
                'title' => 'new_chain_matrix_edit',
            ],
            [
                'id'    => 61,
                'title' => 'new_chain_matrix_show',
            ],
            [
                'id'    => 62,
                'title' => 'new_chain_matrix_delete',
            ],
            [
                'id'    => 63,
                'title' => 'new_chain_matrix_access',
            ],
            [
                'id'    => 64,
                'title' => 'alignment_show',
            ],
            [
                'id'    => 65,
                'title' => 'alignment_access',
            ],
            [
                'id'    => 66,
                'title' => 'uniprot_ac_edit',
            ],
            [
                'id'    => 67,
                'title' => 'uniprot_ac_show',
            ],
            [
                'id'    => 68,
                'title' => 'uniprot_ac_delete',
            ],
            [
                'id'    => 69,
                'title' => 'uniprot_ac_access',
            ],
            [
                'id'    => 70,
                'title' => 'region_related_mysql_data_access',
            ],
            [
                'id'    => 71,
                'title' => 'region_edit',
            ],
            [
                'id'    => 72,
                'title' => 'region_show',
            ],
            [
                'id'    => 73,
                'title' => 'region_delete',
            ],
            [
                'id'    => 74,
                'title' => 'region_access',
            ],
            [
                'id'    => 75,
                'title' => 'pdbtm_region_edit',
            ],
            [
                'id'    => 76,
                'title' => 'pdbtm_region_show',
            ],
            [
                'id'    => 77,
                'title' => 'pdbtm_region_delete',
            ],
            [
                'id'    => 78,
                'title' => 'pdbtm_region_access',
            ],
            [
                'id'    => 79,
                'title' => 'cctop_re_show',
            ],
            [
                'id'    => 80,
                'title' => 'cctop_re_delete',
            ],
            [
                'id'    => 81,
                'title' => 'cctop_re_access',
            ],
            [
                'id'    => 82,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
