<?php
return[
  'roles'=>[
    'super-admin'=>['id'=>1,'name'=>'super-admin'],
    'admin'=>['id'=>2,'name'=>'admin'],
    'user'=>['id'=>3,'name'=>'user'],
    'requisitioner'=>['id'=>4,'name'=>'requistioner'],
    'manager'=>['id'=>5,'name'=>'manager']
  ],
  'folder_access'=>[
    'allow'=>['id'=>1,'name'=>'allow'],
    'deny'=>['id'=>2,'name'=>'deny']
  ],
  'document_access'=>[
    'forbidden'=>['id'=>1,'name'=>'forbidden'],
    'view'=>['id'=>2,'name'=>'view'],
    'download'=>['id'=>3,'name'=>'download'],
    'write'=>['id'=>4,'name'=>'write'],
    'admin'=>['id'=>5,'name'=>'admin']
  ]

];