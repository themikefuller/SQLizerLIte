<?php

// references files from this directory's perspective.
$dir = __DIR__;
chdir($dir);

// Location and filename of database file
// If the file specified does not exists, SQLite will try to create it.
// If no filename is specified, SQLizerLite will default to database.db
// If this fails it is likely that PHP does have permission to write to that location.
$db_file = 'database.db';

// Load SQLizerLite
require_once '../src/sqlizerlite.php';
$sqlizer = new SQLizerLite($db_file);

// Create a table
$sql['statement'] = "create table if not exists users (id integer primary key autoincrement not null,type text not null)";
$sqlizer->RunSQL($sql);

// Insert a new user with prepared statements
$type = "officeworker";
$sql['statement'] = "insert into users (type) values (:type)";
$sql['values'] = [':type'=>$type];
$newid = $sqlizer->RunSQL($sql);
echo "\nUser Created with an id of " . $newid . "\n\n";

// Select the new user
$sql['statement'] = "select * from users where id = :id";
$sql['values'] = [':id'=>$newid];
$result = $sqlizer->RunSQL($sql);

// Output the new user's data from the database
var_dump($result);
