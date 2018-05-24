<?php

namespace App\QueryCollections\SchoolTeacher;

use App\Role;

class SchoolTeacherQuery {

    protected $type;

    public function setType($role)
    {
        $this->type = $role;
    }

	public function SchoolTeacherCollection()
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

        $className = "App\\QueryCollections\\SchoolTeacher\\" . $lookupArray[$projectType];

        return ( new $className )->SchoolTeacherCollection();
	}

}