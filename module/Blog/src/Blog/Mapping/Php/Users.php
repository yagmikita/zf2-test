<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->setPrimaryTable(array(
   'name' => 'users',
  ));
$metadata->setChangeTrackingPolicy(ClassMetadataInfo::CHANGETRACKING_DEFERRED_IMPLICIT);
$metadata->mapField(array(
   'id' => true,
   'fieldName' => 'id',
   'columnName' => 'id',
   'type' => 'integer',
   'unsigned' => false,
   'nullable' => false,
  ));
$metadata->mapField(array(
   'fieldName' => 'nameFull',
   'columnName' => 'name_full',
   'type' => 'string',
   'length' => 255,
   'fixed' => false,
   'nullable' => false,
  ));
$metadata->mapField(array(
   'fieldName' => 'dateBirth',
   'columnName' => 'date_birth',
   'type' => 'datetime',
   'nullable' => false,
  ));
$metadata->mapField(array(
   'fieldName' => 'male',
   'columnName' => 'male',
   'type' => 'boolean',
   'nullable' => false,
  ));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_IDENTITY);