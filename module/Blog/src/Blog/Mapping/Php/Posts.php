<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->setPrimaryTable(array(
   'name' => 'posts',
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
   'fieldName' => 'title',
   'columnName' => 'title',
   'type' => 'string',
   'length' => 50,
   'fixed' => false,
   'nullable' => false,
  ));
$metadata->mapField(array(
   'fieldName' => 'text',
   'columnName' => 'text',
   'type' => 'text',
   'nullable' => false,
  ));
$metadata->mapField(array(
   'fieldName' => 'dateCreate',
   'columnName' => 'date_create',
   'type' => 'datetime',
   'nullable' => true,
  ));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_IDENTITY);
$metadata->mapOneToOne(array(
   'fieldName' => 'author',
   'targetEntity' => 'Users',
   'cascade' => 
   array(
   ),
   'mappedBy' => NULL,
   'inversedBy' => NULL,
   'joinColumns' => 
   array(
   0 => 
   array(
    'name' => 'author',
    'referencedColumnName' => 'id',
   ),
   ),
   'orphanRemoval' => false,
  ));