<?php

namespace App\QueryCollections\SubstituteTeacher;

use App\Role;

class SubstituteteacherQuery {

    protected $type;

    public function setType($role)
    {
        $this->type = $role;
    }

	public function SubstituteTeacherCollection()
	{
        $projectType = $this->type;

        $lookupArray = [
            'super_administrator' => 'SuperAdminRoleType',
            'school_division_administrator' => 'SchoolDivisionAdminRoleType',
            'school_administrator' => 'SchoolAdminRoleType',
            'school_principal' => 'PrincipalRoleType',
            'school_teacher' => 'TeacherRoleType',
            'substitute_teacher' => 'SubstituteRoleType'
        ];

        if( ! array_key_exists($this->type, $lookupArray)) {
            throw new \RuntimeException('Incorrect project type');
        }
        //dd($lookupArray[$projectType]);
        $className = "App\\QueryCollections\\SubstituteTeacher\\" . $lookupArray[$projectType];
        //dd($className);
        return ( new $className )->SubstituteTeacherCollection();
	}

}