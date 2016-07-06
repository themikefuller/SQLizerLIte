# SQLizerLIte
The SQLite Cousin to SQLizer - SQLizerLite is a PHP SQLite PDO class

SQLizerLite is nearly a clone of SQLizer with small changes that make it work with PHP's SQLite PDO library.

[Learn more about SQLizer](https://github.com/themikefuller/sqlizer).

## BASIC USAGE

Choose a name and path to save your database file.

    $db_file = '/path/to/database.db';

###Load SQLizerLite

Require SQLizerLite in your app and create an instance of the of it.

    require_once 'path/to/sqlizerlite.php';
    $sqlizer = new SQLizerLite($db_file);

###Create a Table

SQLite syntax is similar to MySQL but has some notable differences. For instance, here is how you create a table in SQLite using SQLizerLite

    $sql['statement'] = "create table if not exists users (id integer primary key autoincrement not null,type text not null)";
    $sqlizer->RunSQL($sql);

###Insert a new user with prepared statements

You should always use prepared statements when variable data is to be used in a SQL query. This is the whole purpose of PDO.

    $type = "officeworker";
    $sql['statement'] = "insert into users (type) values (:type)";
    $sql['values'] = [':type'=>$type];
    $newid = $sqlizer->RunSQL($sql);
    echo "\nUser Created with an id of " . $newid . "\n\n";

###Select the new user from the database using a prepared statement

    $sql['statement'] = "select * from users where id = :id";
    $sql['values'] = [':id'=>$newid];
    $result = $sqlizer->RunSQL($sql);

// Output the new user's data from the database
var_dump($result);

## Other Information

Because SQLizerLite is mostly SQLizer, please refer to the [SQLizer Manual](https://github.com/themikefuller/SQLizer/blob/master/README.md) for additional details.
