<?php

namespace App\QueryCollections\School;

use App\Role;

class SchoolQuery {

    protected $type;

    public function setType($role)
    {
        $this->type = $role;
    }

	public function SchoolCollection()
	{
        $projectType = $this->type;

        $lookupArray = [
            'super_administrator' => 'SuperAdminRoleType',
            'school_division_administrator' => 'SchoolDivisionAdminRoleType',
            'school_administrator' => 'SchoolAdminRoleType',
            'school_principal' => 'PrincipalRoleType',
            'school_teacher' => 'SchoolTeacherRoleType'
        ];

        if( ! array_key_exists($this->type, $lookupArray)) {
            throw new \RuntimeException('Incorrect project type');
        }

        $className = "App\\QueryCollections\\School\\" . $lookupArray[$projectType];

        return ( new $className )->SchoolCollection();
	}

}