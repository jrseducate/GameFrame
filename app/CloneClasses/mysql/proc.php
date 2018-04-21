<?php return ['connection' => 'mysql', 'database' => 'mysql', 'table' => 'proc', 'nullable' => [0 => 'character_set_client', 1 => 'collation_connection', 2 => 'db_collation', 3 => 'body_utf8'], 'columns' => [0 => 'db', 1 => 'name', 2 => 'type', 3 => 'specific_name', 4 => 'language', 5 => 'sql_data_access', 6 => 'is_deterministic', 7 => 'security_type', 8 => 'param_list', 9 => 'returns', 10 => 'body', 11 => 'definer', 12 => 'created', 13 => 'modified', 14 => 'sql_mode', 15 => 'comment', 16 => 'character_set_client', 17 => 'collation_connection', 18 => 'db_collation', 19 => 'body_utf8'], 'records' => [0 => ['db' => 'sys', 'name' => 'extract_schema_from_file_name', 'type' => 'FUNCTION', 'specific_name' => 'extract_schema_from_file_name', 'language' => 'SQL', 'sql_data_access' => 'NO_SQL', 'is_deterministic' => 'YES', 'security_type' => 'INVOKER', 'param_list' => ' path VARCHAR(512) ', 'returns' => 'varchar(64) CHARSET utf8', 'body' => 'BEGIN RETURN LEFT(SUBSTRING_INDEX(SUBSTRING_INDEX(REPLACE(path, \'\\', \'/\'), \'/\', -2), \'/\', 1), 64); END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Takes a raw file path, and attempts to extract the schema name from it.
 
 Useful for when interacting with Performance Schema data 
 concerning IO statistics, for example.
 
 Currently relies on the fact that a table data file will be within a 
 specified database directory (will not work with partitions or tables
 that specify an individual DATA_DIRECTORY).
 
 Parameters
 
 path (VARCHAR(512)):
 The full file path to a data file to extract the schema name from.
 
 Returns
 
 VARCHAR(64)
 
 Example
 
 mysql> SELECT sys.extract_schema_from_file_name(\'/var/lib/mysql/employees/employee.ibd\');
 +----------------------------------------------------------------------------+
 | sys.extract_schema_from_file_name(\'/var/lib/mysql/employees/employee.ibd\') |
 +----------------------------------------------------------------------------+
 | employees                                                                  |
 +----------------------------------------------------------------------------+
 1 row in set (0.00 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN RETURN LEFT(SUBSTRING_INDEX(SUBSTRING_INDEX(REPLACE(path, \'\', \'/\'), \'/\', -2), \'/\', 1), 64); END'], 1 => ['db' => 'sys', 'name' => 'extract_table_from_file_name', 'type' => 'FUNCTION', 'specific_name' => 'extract_table_from_file_name', 'language' => 'SQL', 'sql_data_access' => 'NO_SQL', 'is_deterministic' => 'YES', 'security_type' => 'INVOKER', 'param_list' => ' path VARCHAR(512) ', 'returns' => 'varchar(64) CHARSET utf8', 'body' => 'BEGIN RETURN LEFT(SUBSTRING_INDEX(REPLACE(SUBSTRING_INDEX(REPLACE(path, \'\\', \'/\'), \'/\', -1), \'@0024\', \'$\'), \'.\', 1), 64); END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Takes a raw file path, and extracts the table name from it.
 
 Useful for when interacting with Performance Schema data 
 concerning IO statistics, for example.
 
 Parameters
 
 path (VARCHAR(512)):
 The full file path to a data file to extract the table name from.
 
 Returns
 
 VARCHAR(64)
 
 Example
 
 mysql> SELECT sys.extract_table_from_file_name(\'/var/lib/mysql/employees/employee.ibd\');
 +---------------------------------------------------------------------------+
 | sys.extract_table_from_file_name(\'/var/lib/mysql/employees/employee.ibd\') |
 +---------------------------------------------------------------------------+
 | employee                                                                  |
 +---------------------------------------------------------------------------+
 1 row in set (0.02 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN RETURN LEFT(SUBSTRING_INDEX(REPLACE(SUBSTRING_INDEX(REPLACE(path, \'\', \'/\'), \'/\', -1), \'@0024\', \'$\'), \'.\', 1), 64); END'], 2 => ['db' => 'sys', 'name' => 'format_bytes', 'type' => 'FUNCTION', 'specific_name' => 'format_bytes', 'language' => 'SQL', 'sql_data_access' => 'NO_SQL', 'is_deterministic' => 'YES', 'security_type' => 'INVOKER', 'param_list' => ' bytes TEXT ', 'returns' => 'text CHARSET utf8', 'body' => 'BEGIN IF bytes IS NULL THEN RETURN NULL; ELSEIF bytes >= 1125899906842624 THEN RETURN CONCAT(ROUND(bytes / 1125899906842624, 2), \' PiB\'); ELSEIF bytes >= 1099511627776 THEN RETURN CONCAT(ROUND(bytes / 1099511627776, 2), \' TiB\'); ELSEIF bytes >= 1073741824 THEN RETURN CONCAT(ROUND(bytes / 1073741824, 2), \' GiB\'); ELSEIF bytes >= 1048576 THEN RETURN CONCAT(ROUND(bytes / 1048576, 2), \' MiB\'); ELSEIF bytes >= 1024 THEN RETURN CONCAT(ROUND(bytes / 1024, 2), \' KiB\'); ELSE RETURN CONCAT(ROUND(bytes, 0), \' bytes\'); END IF; END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Takes a raw bytes value, and converts it to a human readable format.
 
 Parameters
 
 bytes (TEXT):
 A raw bytes value.
 
 Returns
 
 TEXT
 
 Example
 
 mysql> SELECT sys.format_bytes(2348723492723746) AS size;
 +----------+
 | size     |
 +----------+
 | 2.09 PiB |
 +----------+
 1 row in set (0.00 sec)
 
 mysql> SELECT sys.format_bytes(2348723492723) AS size;
 +----------+
 | size     |
 +----------+
 | 2.14 TiB |
 +----------+
 1 row in set (0.00 sec)
 
 mysql> SELECT sys.format_bytes(23487234) AS size;
 +-----------+
 | size      |
 +-----------+
 | 22.40 MiB |
 +-----------+
 1 row in set (0.00 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN IF bytes IS NULL THEN RETURN NULL; ELSEIF bytes >= 1125899906842624 THEN RETURN CONCAT(ROUND(bytes / 1125899906842624, 2), \' PiB\'); ELSEIF bytes >= 1099511627776 THEN RETURN CONCAT(ROUND(bytes / 1099511627776, 2), \' TiB\'); ELSEIF bytes >= 1073741824 THEN RETURN CONCAT(ROUND(bytes / 1073741824, 2), \' GiB\'); ELSEIF bytes >= 1048576 THEN RETURN CONCAT(ROUND(bytes / 1048576, 2), \' MiB\'); ELSEIF bytes >= 1024 THEN RETURN CONCAT(ROUND(bytes / 1024, 2), \' KiB\'); ELSE RETURN CONCAT(ROUND(bytes, 0), \' bytes\'); END IF; END'], 3 => ['db' => 'sys', 'name' => 'format_path', 'type' => 'FUNCTION', 'specific_name' => 'format_path', 'language' => 'SQL', 'sql_data_access' => 'NO_SQL', 'is_deterministic' => 'YES', 'security_type' => 'INVOKER', 'param_list' => ' in_path VARCHAR(512) ', 'returns' => 'varchar(512) CHARSET utf8', 'body' => 'BEGIN DECLARE v_path VARCHAR(512); DECLARE v_undo_dir VARCHAR(1024);  DECLARE path_separator CHAR(1) DEFAULT \'/\';  IF @@global.version_compile_os LIKE \'win%\' THEN SET path_separator = \'\\'; END IF;  IF in_path LIKE \'/private/%\' THEN SET v_path = REPLACE(in_path, \'/private\', \'\'); ELSE SET v_path = in_path; END IF;  SET v_undo_dir = IFNULL((SELECT VARIABLE_VALUE FROM performance_schema.global_variables WHERE VARIABLE_NAME = \'innodb_undo_directory\'), \'\');  IF v_path IS NULL THEN RETURN NULL; ELSEIF v_path LIKE CONCAT(@@global.datadir, IF(SUBSTRING(@@global.datadir, -1) = path_separator, \'%\', CONCAT(path_separator, \'%\'))) ESCAPE \'|\' THEN SET v_path = REPLACE(v_path, @@global.datadir, CONCAT(\'@@datadir\', IF(SUBSTRING(@@global.datadir, -1) = path_separator, path_separator, \'\'))); ELSEIF v_path LIKE CONCAT(@@global.tmpdir, IF(SUBSTRING(@@global.tmpdir, -1) = path_separator, \'%\', CONCAT(path_separator, \'%\'))) ESCAPE \'|\' THEN SET v_path = REPLACE(v_path, @@global.tmpdir, CONCAT(\'@@tmpdir\', IF(SUBSTRING(@@global.tmpdir, -1) = path_separator, path_separator, \'\'))); ELSEIF v_path LIKE CONCAT(@@global.slave_load_tmpdir, IF(SUBSTRING(@@global.slave_load_tmpdir, -1) = path_separator, \'%\', CONCAT(path_separator, \'%\'))) ESCAPE \'|\' THEN SET v_path = REPLACE(v_path, @@global.slave_load_tmpdir, CONCAT(\'@@slave_load_tmpdir\', IF(SUBSTRING(@@global.slave_load_tmpdir, -1) = path_separator, path_separator, \'\'))); ELSEIF v_path LIKE CONCAT(@@global.innodb_data_home_dir, IF(SUBSTRING(@@global.innodb_data_home_dir, -1) = path_separator, \'%\', CONCAT(path_separator, \'%\'))) ESCAPE \'|\' THEN SET v_path = REPLACE(v_path, @@global.innodb_data_home_dir, CONCAT(\'@@innodb_data_home_dir\', IF(SUBSTRING(@@global.innodb_data_home_dir, -1) = path_separator, path_separator, \'\'))); ELSEIF v_path LIKE CONCAT(@@global.innodb_log_group_home_dir, IF(SUBSTRING(@@global.innodb_log_group_home_dir, -1) = path_separator, \'%\', CONCAT(path_separator, \'%\'))) ESCAPE \'|\' THEN SET v_path = REPLACE(v_path, @@global.innodb_log_group_home_dir, CONCAT(\'@@innodb_log_group_home_dir\', IF(SUBSTRING(@@global.innodb_log_group_home_dir, -1) = path_separator, path_separator, \'\'))); ELSEIF v_path LIKE CONCAT(v_undo_dir, IF(SUBSTRING(v_undo_dir, -1) = path_separator, \'%\', CONCAT(path_separator, \'%\'))) ESCAPE \'|\' THEN SET v_path = REPLACE(v_path, v_undo_dir, CONCAT(\'@@innodb_undo_directory\', IF(SUBSTRING(v_undo_dir, -1) = path_separator, path_separator, \'\'))); ELSEIF v_path LIKE CONCAT(@@global.basedir, IF(SUBSTRING(@@global.basedir, -1) = path_separator, \'%\', CONCAT(path_separator, \'%\'))) ESCAPE \'|\' THEN SET v_path = REPLACE(v_path, @@global.basedir, CONCAT(\'@@basedir\', IF(SUBSTRING(@@global.basedir, -1) = path_separator, path_separator, \'\'))); END IF;  RETURN v_path; END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Takes a raw path value, and strips out the datadir or tmpdir
 replacing with @@datadir and @@tmpdir respectively. 
 
 Also normalizes the paths across operating systems, so backslashes
 on Windows are converted to forward slashes
 
 Parameters
 
 path (VARCHAR(512)):
 The raw file path value to format.
 
 Returns
 
 VARCHAR(512) CHARSET UTF8
 
 Example
 
 mysql> select @@datadir;
 +-----------------------------------------------+
 | @@datadir                                     |
 +-----------------------------------------------+
 | /Users/mark/sandboxes/SmallTree/AMaster/data/ |
 +-----------------------------------------------+
 1 row in set (0.06 sec)
 
 mysql> select format_path(\'/Users/mark/sandboxes/SmallTree/AMaster/data/mysql/proc.MYD\') AS path;
 +--------------------------+
 | path                     |
 +--------------------------+
 | @@datadir/mysql/proc.MYD |
 +--------------------------+
 1 row in set (0.03 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN DECLARE v_path VARCHAR(512); DECLARE v_undo_dir VARCHAR(1024);  DECLARE path_separator CHAR(1) DEFAULT \'/\';  IF @@global.version_compile_os LIKE \'win%\' THEN SET path_separator = \'\'; END IF;  IF in_path LIKE \'/private/%\' THEN SET v_path = REPLACE(in_path, \'/private\', \'\'); ELSE SET v_path = in_path; END IF;  SET v_undo_dir = IFNULL((SELECT VARIABLE_VALUE FROM performance_schema.global_variables WHERE VARIABLE_NAME = \'innodb_undo_directory\'), \'\');  IF v_path IS NULL THEN RETURN NULL; ELSEIF v_path LIKE CONCAT(@@global.datadir, IF(SUBSTRING(@@global.datadir, -1) = path_separator, \'%\', CONCAT(path_separator, \'%\'))) ESCAPE \'|\' THEN SET v_path = REPLACE(v_path, @@global.datadir, CONCAT(\'@@datadir\', IF(SUBSTRING(@@global.datadir, -1) = path_separator, path_separator, \'\'))); ELSEIF v_path LIKE CONCAT(@@global.tmpdir, IF(SUBSTRING(@@global.tmpdir, -1) = path_separator, \'%\', CONCAT(path_separator, \'%\'))) ESCAPE \'|\' THEN SET v_path = REPLACE(v_path, @@global.tmpdir, CONCAT(\'@@tmpdir\', IF(SUBSTRING(@@global.tmpdir, -1) = path_separator, path_separator, \'\'))); ELSEIF v_path LIKE CONCAT(@@global.slave_load_tmpdir, IF(SUBSTRING(@@global.slave_load_tmpdir, -1) = path_separator, \'%\', CONCAT(path_separator, \'%\'))) ESCAPE \'|\' THEN SET v_path = REPLACE(v_path, @@global.slave_load_tmpdir, CONCAT(\'@@slave_load_tmpdir\', IF(SUBSTRING(@@global.slave_load_tmpdir, -1) = path_separator, path_separator, \'\'))); ELSEIF v_path LIKE CONCAT(@@global.innodb_data_home_dir, IF(SUBSTRING(@@global.innodb_data_home_dir, -1) = path_separator, \'%\', CONCAT(path_separator, \'%\'))) ESCAPE \'|\' THEN SET v_path = REPLACE(v_path, @@global.innodb_data_home_dir, CONCAT(\'@@innodb_data_home_dir\', IF(SUBSTRING(@@global.innodb_data_home_dir, -1) = path_separator, path_separator, \'\'))); ELSEIF v_path LIKE CONCAT(@@global.innodb_log_group_home_dir, IF(SUBSTRING(@@global.innodb_log_group_home_dir, -1) = path_separator, \'%\', CONCAT(path_separator, \'%\'))) ESCAPE \'|\' THEN SET v_path = REPLACE(v_path, @@global.innodb_log_group_home_dir, CONCAT(\'@@innodb_log_group_home_dir\', IF(SUBSTRING(@@global.innodb_log_group_home_dir, -1) = path_separator, path_separator, \'\'))); ELSEIF v_path LIKE CONCAT(v_undo_dir, IF(SUBSTRING(v_undo_dir, -1) = path_separator, \'%\', CONCAT(path_separator, \'%\'))) ESCAPE \'|\' THEN SET v_path = REPLACE(v_path, v_undo_dir, CONCAT(\'@@innodb_undo_directory\', IF(SUBSTRING(v_undo_dir, -1) = path_separator, path_separator, \'\'))); ELSEIF v_path LIKE CONCAT(@@global.basedir, IF(SUBSTRING(@@global.basedir, -1) = path_separator, \'%\', CONCAT(path_separator, \'%\'))) ESCAPE \'|\' THEN SET v_path = REPLACE(v_path, @@global.basedir, CONCAT(\'@@basedir\', IF(SUBSTRING(@@global.basedir, -1) = path_separator, path_separator, \'\'))); END IF;  RETURN v_path; END'], 4 => ['db' => 'sys', 'name' => 'format_statement', 'type' => 'FUNCTION', 'specific_name' => 'format_statement', 'language' => 'SQL', 'sql_data_access' => 'NO_SQL', 'is_deterministic' => 'YES', 'security_type' => 'INVOKER', 'param_list' => ' statement LONGTEXT ', 'returns' => 'longtext CHARSET utf8', 'body' => 'BEGIN IF @sys.statement_truncate_len IS NULL THEN SET @sys.statement_truncate_len = sys_get_config(\'statement_truncate_len\', 64); END IF;  IF CHAR_LENGTH(statement) > @sys.statement_truncate_len THEN RETURN REPLACE(CONCAT(LEFT(statement, (@sys.statement_truncate_len/2)-2), \' ... \', RIGHT(statement, (@sys.statement_truncate_len/2)-2)), \'\n\', \' \'); ELSE  RETURN REPLACE(statement, \'\n\', \' \'); END IF; END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Formats a normalized statement, truncating it if it is > 64 characters long by default.
 
 To configure the length to truncate the statement to by default, update the `statement_truncate_len`
 variable with `sys_config` table to a different value. Alternatively, to change it just for just 
 your particular session, use `SET @sys.statement_truncate_len := <some new value>`.
 
 Useful for printing statement related data from Performance Schema from 
 the command line.
 
 Parameters
 
 statement (LONGTEXT): 
 The statement to format.
 
 Returns
 
 LONGTEXT
 
 Example
 
 mysql> SELECT sys.format_statement(digest_text)
 ->   FROM performance_schema.events_statements_summary_by_digest
 ->  ORDER by sum_timer_wait DESC limit 5;
 +-------------------------------------------------------------------+
 | sys.format_statement(digest_text)                                 |
 +-------------------------------------------------------------------+
 | CREATE SQL SECURITY INVOKER VI ... KE ? AND `variable_value` > ?  |
 | CREATE SQL SECURITY INVOKER VI ... ait` IS NOT NULL , `esc` . ... |
 | CREATE SQL SECURITY INVOKER VI ... ait` IS NOT NULL , `sys` . ... |
 | CREATE SQL SECURITY INVOKER VI ...  , `compressed_size` ) ) DESC  |
 | CREATE SQL SECURITY INVOKER VI ... LIKE ? ORDER BY `timer_start`  |
 +-------------------------------------------------------------------+
 5 rows in set (0.00 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN IF @sys.statement_truncate_len IS NULL THEN SET @sys.statement_truncate_len = sys_get_config(\'statement_truncate_len\', 64); END IF;  IF CHAR_LENGTH(statement) > @sys.statement_truncate_len THEN RETURN REPLACE(CONCAT(LEFT(statement, (@sys.statement_truncate_len/2)-2), \' ... \', RIGHT(statement, (@sys.statement_truncate_len/2)-2)), \'
\', \' \'); ELSE  RETURN REPLACE(statement, \'
\', \' \'); END IF; END'], 5 => ['db' => 'sys', 'name' => 'format_time', 'type' => 'FUNCTION', 'specific_name' => 'format_time', 'language' => 'SQL', 'sql_data_access' => 'NO_SQL', 'is_deterministic' => 'YES', 'security_type' => 'INVOKER', 'param_list' => ' picoseconds TEXT ', 'returns' => 'text CHARSET utf8', 'body' => 'BEGIN IF picoseconds IS NULL THEN RETURN NULL; ELSEIF picoseconds >= 604800000000000000 THEN RETURN CONCAT(ROUND(picoseconds / 604800000000000000, 2), \' w\'); ELSEIF picoseconds >= 86400000000000000 THEN RETURN CONCAT(ROUND(picoseconds / 86400000000000000, 2), \' d\'); ELSEIF picoseconds >= 3600000000000000 THEN RETURN CONCAT(ROUND(picoseconds / 3600000000000000, 2), \' h\'); ELSEIF picoseconds >= 60000000000000 THEN RETURN CONCAT(ROUND(picoseconds / 60000000000000, 2), \' m\'); ELSEIF picoseconds >= 1000000000000 THEN RETURN CONCAT(ROUND(picoseconds / 1000000000000, 2), \' s\'); ELSEIF picoseconds >= 1000000000 THEN RETURN CONCAT(ROUND(picoseconds / 1000000000, 2), \' ms\'); ELSEIF picoseconds >= 1000000 THEN RETURN CONCAT(ROUND(picoseconds / 1000000, 2), \' us\'); ELSEIF picoseconds >= 1000 THEN RETURN CONCAT(ROUND(picoseconds / 1000, 2), \' ns\'); ELSE RETURN CONCAT(picoseconds, \' ps\'); END IF; END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Takes a raw picoseconds value, and converts it to a human readable form.
 
 Picoseconds are the precision that all latency values are printed in 
 within Performance Schema, however are not user friendly when wanting
 to scan output from the command line.
 
 Parameters
 
 picoseconds (TEXT): 
 The raw picoseconds value to convert.
 
 Returns
 
 TEXT
 
 Example
 
 mysql> select format_time(342342342342345);
 +------------------------------+
 | format_time(342342342342345) |
 +------------------------------+
 | 00:05:42                     |
 +------------------------------+
 1 row in set (0.00 sec)
 
 mysql> select format_time(342342342);
 +------------------------+
 | format_time(342342342) |
 +------------------------+
 | 342.34 us              |
 +------------------------+
 1 row in set (0.00 sec)
 
 mysql> select format_time(34234);
 +--------------------+
 | format_time(34234) |
 +--------------------+
 | 34.23 ns           |
 +--------------------+
 1 row in set (0.00 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN IF picoseconds IS NULL THEN RETURN NULL; ELSEIF picoseconds >= 604800000000000000 THEN RETURN CONCAT(ROUND(picoseconds / 604800000000000000, 2), \' w\'); ELSEIF picoseconds >= 86400000000000000 THEN RETURN CONCAT(ROUND(picoseconds / 86400000000000000, 2), \' d\'); ELSEIF picoseconds >= 3600000000000000 THEN RETURN CONCAT(ROUND(picoseconds / 3600000000000000, 2), \' h\'); ELSEIF picoseconds >= 60000000000000 THEN RETURN CONCAT(ROUND(picoseconds / 60000000000000, 2), \' m\'); ELSEIF picoseconds >= 1000000000000 THEN RETURN CONCAT(ROUND(picoseconds / 1000000000000, 2), \' s\'); ELSEIF picoseconds >= 1000000000 THEN RETURN CONCAT(ROUND(picoseconds / 1000000000, 2), \' ms\'); ELSEIF picoseconds >= 1000000 THEN RETURN CONCAT(ROUND(picoseconds / 1000000, 2), \' us\'); ELSEIF picoseconds >= 1000 THEN RETURN CONCAT(ROUND(picoseconds / 1000, 2), \' ns\'); ELSE RETURN CONCAT(picoseconds, \' ps\'); END IF; END'], 6 => ['db' => 'sys', 'name' => 'list_add', 'type' => 'FUNCTION', 'specific_name' => 'list_add', 'language' => 'SQL', 'sql_data_access' => 'CONTAINS_SQL', 'is_deterministic' => 'YES', 'security_type' => 'INVOKER', 'param_list' => ' in_list TEXT, in_add_value TEXT ', 'returns' => 'text CHARSET utf8', 'body' => 'BEGIN  IF (in_add_value IS NULL) THEN SIGNAL SQLSTATE \'02200\' SET MESSAGE_TEXT = \'Function sys.list_add: in_add_value input variable should not be NULL\', MYSQL_ERRNO = 1138; END IF;  IF (in_list IS NULL OR LENGTH(in_list) = 0) THEN RETURN in_add_value; END IF;  RETURN (SELECT CONCAT(TRIM(BOTH \',\' FROM TRIM(in_list)), \',\', in_add_value));  END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Takes a list, and a value to add to the list, and returns the resulting list.
 
 Useful for altering certain session variables, like sql_mode or optimizer_switch for instance.
 
 Parameters
 
 in_list (TEXT):
 The comma separated list to add a value to
 
 in_add_value (TEXT):
 The value to add to the input list
 
 Returns
 
 TEXT
 
 Example
 
 mysql> select @@sql_mode;
 +-----------------------------------------------------------------------------------+
 | @@sql_mode                                                                        |
 +-----------------------------------------------------------------------------------+
 | ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION |
 +-----------------------------------------------------------------------------------+
 1 row in set (0.00 sec)
 
 mysql> set sql_mode = sys.list_add(@@sql_mode, \'ANSI_QUOTES\');
 Query OK, 0 rows affected (0.06 sec)
 
 mysql> select @@sql_mode;
 +-----------------------------------------------------------------------------------------------+
 | @@sql_mode                                                                                    |
 +-----------------------------------------------------------------------------------------------+
 | ANSI_QUOTES,ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION |
 +-----------------------------------------------------------------------------------------------+
 1 row in set (0.00 sec)
 
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN  IF (in_add_value IS NULL) THEN SIGNAL SQLSTATE \'02200\' SET MESSAGE_TEXT = \'Function sys.list_add: in_add_value input variable should not be NULL\', MYSQL_ERRNO = 1138; END IF;  IF (in_list IS NULL OR LENGTH(in_list) = 0) THEN RETURN in_add_value; END IF;  RETURN (SELECT CONCAT(TRIM(BOTH \',\' FROM TRIM(in_list)), \',\', in_add_value));  END'], 7 => ['db' => 'sys', 'name' => 'list_drop', 'type' => 'FUNCTION', 'specific_name' => 'list_drop', 'language' => 'SQL', 'sql_data_access' => 'CONTAINS_SQL', 'is_deterministic' => 'YES', 'security_type' => 'INVOKER', 'param_list' => ' in_list TEXT, in_drop_value TEXT ', 'returns' => 'text CHARSET utf8', 'body' => 'BEGIN  IF (in_drop_value IS NULL) THEN SIGNAL SQLSTATE \'02200\' SET MESSAGE_TEXT = \'Function sys.list_drop: in_drop_value input variable should not be NULL\', MYSQL_ERRNO = 1138; END IF;  IF (in_list IS NULL OR LENGTH(in_list) = 0) THEN RETURN in_list; END IF;  RETURN (SELECT TRIM(BOTH \',\' FROM REPLACE(REPLACE(CONCAT(\',\', in_list), CONCAT(\',\', in_drop_value), \'\'), CONCAT(\', \', in_drop_value), \'\')));  END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Takes a list, and a value to attempt to remove from the list, and returns the resulting list.
 
 Useful for altering certain session variables, like sql_mode or optimizer_switch for instance.
 
 Parameters
 
 in_list (TEXT):
 The comma separated list to drop a value from
 
 in_drop_value (TEXT):
 The value to drop from the input list
 
 Returns
 
 TEXT
 
 Example
 
 mysql> select @@sql_mode;
 +-----------------------------------------------------------------------------------------------+
 | @@sql_mode                                                                                    |
 +-----------------------------------------------------------------------------------------------+
 | ANSI_QUOTES,ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION |
 +-----------------------------------------------------------------------------------------------+
 1 row in set (0.00 sec)
 
 mysql> set sql_mode = sys.list_drop(@@sql_mode, \'ONLY_FULL_GROUP_BY\');
 Query OK, 0 rows affected (0.03 sec)
 
 mysql> select @@sql_mode;
 +----------------------------------------------------------------------------+
 | @@sql_mode                                                                 |
 +----------------------------------------------------------------------------+
 | ANSI_QUOTES,STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION |
 +----------------------------------------------------------------------------+
 1 row in set (0.00 sec)
 
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN  IF (in_drop_value IS NULL) THEN SIGNAL SQLSTATE \'02200\' SET MESSAGE_TEXT = \'Function sys.list_drop: in_drop_value input variable should not be NULL\', MYSQL_ERRNO = 1138; END IF;  IF (in_list IS NULL OR LENGTH(in_list) = 0) THEN RETURN in_list; END IF;  RETURN (SELECT TRIM(BOTH \',\' FROM REPLACE(REPLACE(CONCAT(\',\', in_list), CONCAT(\',\', in_drop_value), \'\'), CONCAT(\', \', in_drop_value), \'\')));  END'], 8 => ['db' => 'sys', 'name' => 'ps_is_account_enabled', 'type' => 'FUNCTION', 'specific_name' => 'ps_is_account_enabled', 'language' => 'SQL', 'sql_data_access' => 'READS_SQL_DATA', 'is_deterministic' => 'YES', 'security_type' => 'INVOKER', 'param_list' => ' in_host VARCHAR(60),  in_user VARCHAR(32) ', 'returns' => 'enum(\'YES\',\'NO\') CHARSET utf8', 'body' => 'BEGIN RETURN IF(EXISTS(SELECT 1 FROM performance_schema.setup_actors WHERE (`HOST` = \'%\' OR in_host LIKE `HOST`) AND (`USER` = \'%\' OR `USER` = in_user) AND (`ENABLED` = \'YES\') ), \'YES\', \'NO\' ); END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Determines whether instrumentation of an account is enabled 
 within Performance Schema.
 
 Parameters
 
 in_host VARCHAR(60): 
 The hostname of the account to check.
 in_user VARCHAR(32):
 The username of the account to check.
 
 Returns
 
 ENUM(\'YES\', \'NO\', \'PARTIAL\')
 
 Example
 
 mysql> SELECT sys.ps_is_account_enabled(\'localhost\', \'root\');
 +------------------------------------------------+
 | sys.ps_is_account_enabled(\'localhost\', \'root\') |
 +------------------------------------------------+
 | YES                                            |
 +------------------------------------------------+
 1 row in set (0.01 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN RETURN IF(EXISTS(SELECT 1 FROM performance_schema.setup_actors WHERE (`HOST` = \'%\' OR in_host LIKE `HOST`) AND (`USER` = \'%\' OR `USER` = in_user) AND (`ENABLED` = \'YES\') ), \'YES\', \'NO\' ); END'], 9 => ['db' => 'sys', 'name' => 'ps_is_consumer_enabled', 'type' => 'FUNCTION', 'specific_name' => 'ps_is_consumer_enabled', 'language' => 'SQL', 'sql_data_access' => 'READS_SQL_DATA', 'is_deterministic' => 'YES', 'security_type' => 'INVOKER', 'param_list' => ' in_consumer varchar(64) ', 'returns' => 'enum(\'YES\',\'NO\') CHARSET utf8', 'body' => 'BEGIN RETURN ( SELECT (CASE WHEN c.NAME = \'global_instrumentation\' THEN c.ENABLED WHEN c.NAME = \'thread_instrumentation\' THEN IF(cg.ENABLED = \'YES\' AND c.ENABLED = \'YES\', \'YES\', \'NO\') WHEN c.NAME LIKE \'%\_digest\'           THEN IF(cg.ENABLED = \'YES\' AND c.ENABLED = \'YES\', \'YES\', \'NO\') WHEN c.NAME LIKE \'%\_current\'          THEN IF(cg.ENABLED = \'YES\' AND ct.ENABLED = \'YES\' AND c.ENABLED = \'YES\', \'YES\', \'NO\') ELSE IF(cg.ENABLED = \'YES\' AND ct.ENABLED = \'YES\' AND c.ENABLED = \'YES\' AND ( SELECT cc.ENABLED FROM performance_schema.setup_consumers cc WHERE NAME = CONCAT(SUBSTRING_INDEX(c.NAME, \'_\', 2), \'_current\') ) = \'YES\', \'YES\', \'NO\') END) AS IsEnabled FROM performance_schema.setup_consumers c INNER JOIN performance_schema.setup_consumers cg INNER JOIN performance_schema.setup_consumers ct WHERE cg.NAME       = \'global_instrumentation\' AND ct.NAME   = \'thread_instrumentation\' AND c.NAME    = in_consumer ); END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Determines whether a consumer is enabled (taking the consumer hierarchy into consideration)
 within the Performance Schema.
 
 Parameters
 
 in_consumer VARCHAR(64): 
 The name of the consumer to check.
 
 Returns
 
 ENUM(\'YES\', \'NO\')
 
 Example
 
 mysql> SELECT sys.ps_is_consumer_enabled(\'events_stages_history\');
 +-----------------------------------------------------+
 | sys.ps_is_consumer_enabled(\'events_stages_history\') |
 +-----------------------------------------------------+
 | NO                                                  |
 +-----------------------------------------------------+
 1 row in set (0.00 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN RETURN ( SELECT (CASE WHEN c.NAME = \'global_instrumentation\' THEN c.ENABLED WHEN c.NAME = \'thread_instrumentation\' THEN IF(cg.ENABLED = \'YES\' AND c.ENABLED = \'YES\', \'YES\', \'NO\') WHEN c.NAME LIKE \'%\_digest\'           THEN IF(cg.ENABLED = \'YES\' AND c.ENABLED = \'YES\', \'YES\', \'NO\') WHEN c.NAME LIKE \'%\_current\'          THEN IF(cg.ENABLED = \'YES\' AND ct.ENABLED = \'YES\' AND c.ENABLED = \'YES\', \'YES\', \'NO\') ELSE IF(cg.ENABLED = \'YES\' AND ct.ENABLED = \'YES\' AND c.ENABLED = \'YES\' AND ( SELECT cc.ENABLED FROM performance_schema.setup_consumers cc WHERE NAME = CONCAT(SUBSTRING_INDEX(c.NAME, \'_\', 2), \'_current\') ) = \'YES\', \'YES\', \'NO\') END) AS IsEnabled FROM performance_schema.setup_consumers c INNER JOIN performance_schema.setup_consumers cg INNER JOIN performance_schema.setup_consumers ct WHERE cg.NAME       = \'global_instrumentation\' AND ct.NAME   = \'thread_instrumentation\' AND c.NAME    = in_consumer ); END'], 10 => ['db' => 'sys', 'name' => 'ps_is_instrument_default_enabled', 'type' => 'FUNCTION', 'specific_name' => 'ps_is_instrument_default_enabled', 'language' => 'SQL', 'sql_data_access' => 'READS_SQL_DATA', 'is_deterministic' => 'YES', 'security_type' => 'INVOKER', 'param_list' => ' in_instrument VARCHAR(128) ', 'returns' => 'enum(\'YES\',\'NO\') CHARSET utf8', 'body' => 'BEGIN DECLARE v_enabled ENUM(\'YES\', \'NO\');  SET v_enabled = IF(in_instrument LIKE \'wait/io/file/%\' OR in_instrument LIKE \'wait/io/table/%\' OR in_instrument LIKE \'statement/%\' OR in_instrument LIKE \'memory/performance_schema/%\' OR in_instrument IN (\'wait/lock/table/sql/handler\', \'idle\')  OR in_instrument LIKE \'stage/innodb/%\' OR in_instrument = \'stage/sql/copy to tmp table\'  , \'YES\', \'NO\' );  RETURN v_enabled; END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Returns whether an instrument is enabled by default in this version of MySQL.
 
 Parameters
 
 in_instrument VARCHAR(128): 
 The instrument to check.
 
 Returns
 
 ENUM(\'YES\', \'NO\')
 
 Example
 
 mysql> SELECT sys.ps_is_instrument_default_enabled(\'statement/sql/select\');
 +--------------------------------------------------------------+
 | sys.ps_is_instrument_default_enabled(\'statement/sql/select\') |
 +--------------------------------------------------------------+
 | YES                                                          |
 +--------------------------------------------------------------+
 1 row in set (0.00 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN DECLARE v_enabled ENUM(\'YES\', \'NO\');  SET v_enabled = IF(in_instrument LIKE \'wait/io/file/%\' OR in_instrument LIKE \'wait/io/table/%\' OR in_instrument LIKE \'statement/%\' OR in_instrument LIKE \'memory/performance_schema/%\' OR in_instrument IN (\'wait/lock/table/sql/handler\', \'idle\')  OR in_instrument LIKE \'stage/innodb/%\' OR in_instrument = \'stage/sql/copy to tmp table\'  , \'YES\', \'NO\' );  RETURN v_enabled; END'], 11 => ['db' => 'sys', 'name' => 'ps_is_instrument_default_timed', 'type' => 'FUNCTION', 'specific_name' => 'ps_is_instrument_default_timed', 'language' => 'SQL', 'sql_data_access' => 'READS_SQL_DATA', 'is_deterministic' => 'YES', 'security_type' => 'INVOKER', 'param_list' => ' in_instrument VARCHAR(128) ', 'returns' => 'enum(\'YES\',\'NO\') CHARSET utf8', 'body' => 'BEGIN DECLARE v_timed ENUM(\'YES\', \'NO\');  SET v_timed = IF(in_instrument LIKE \'wait/io/file/%\' OR in_instrument LIKE \'wait/io/table/%\' OR in_instrument LIKE \'statement/%\' OR in_instrument IN (\'wait/lock/table/sql/handler\', \'idle\')  OR in_instrument LIKE \'stage/innodb/%\' OR in_instrument = \'stage/sql/copy to tmp table\'  , \'YES\', \'NO\' );  RETURN v_timed; END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Returns whether an instrument is timed by default in this version of MySQL.
 
 Parameters
 
 in_instrument VARCHAR(128): 
 The instrument to check.
 
 Returns
 
 ENUM(\'YES\', \'NO\')
 
 Example
 
 mysql> SELECT sys.ps_is_instrument_default_timed(\'statement/sql/select\');
 +------------------------------------------------------------+
 | sys.ps_is_instrument_default_timed(\'statement/sql/select\') |
 +------------------------------------------------------------+
 | YES                                                        |
 +------------------------------------------------------------+
 1 row in set (0.00 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN DECLARE v_timed ENUM(\'YES\', \'NO\');  SET v_timed = IF(in_instrument LIKE \'wait/io/file/%\' OR in_instrument LIKE \'wait/io/table/%\' OR in_instrument LIKE \'statement/%\' OR in_instrument IN (\'wait/lock/table/sql/handler\', \'idle\')  OR in_instrument LIKE \'stage/innodb/%\' OR in_instrument = \'stage/sql/copy to tmp table\'  , \'YES\', \'NO\' );  RETURN v_timed; END'], 12 => ['db' => 'sys', 'name' => 'ps_is_thread_instrumented', 'type' => 'FUNCTION', 'specific_name' => 'ps_is_thread_instrumented', 'language' => 'SQL', 'sql_data_access' => 'READS_SQL_DATA', 'is_deterministic' => 'NO', 'security_type' => 'INVOKER', 'param_list' => ' in_connection_id BIGINT UNSIGNED ', 'returns' => 'enum(\'YES\',\'NO\',\'UNKNOWN\') CHARSET utf8', 'body' => 'BEGIN DECLARE v_enabled ENUM(\'YES\', \'NO\', \'UNKNOWN\');  IF (in_connection_id IS NULL) THEN RETURN NULL; END IF;  SELECT INSTRUMENTED INTO v_enabled FROM performance_schema.threads  WHERE PROCESSLIST_ID = in_connection_id;  IF (v_enabled IS NULL) THEN RETURN \'UNKNOWN\'; ELSE RETURN v_enabled; END IF; END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Checks whether the provided connection id is instrumented within Performance Schema.
 
 Parameters
 
 in_connection_id (BIGINT UNSIGNED):
 The id of the connection to check.
 
 Returns
 
 ENUM(\'YES\', \'NO\', \'UNKNOWN\')
 
 Example
 
 mysql> SELECT sys.ps_is_thread_instrumented(CONNECTION_ID());
 +------------------------------------------------+
 | sys.ps_is_thread_instrumented(CONNECTION_ID()) |
 +------------------------------------------------+
 | YES                                            |
 +------------------------------------------------+
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN DECLARE v_enabled ENUM(\'YES\', \'NO\', \'UNKNOWN\');  IF (in_connection_id IS NULL) THEN RETURN NULL; END IF;  SELECT INSTRUMENTED INTO v_enabled FROM performance_schema.threads  WHERE PROCESSLIST_ID = in_connection_id;  IF (v_enabled IS NULL) THEN RETURN \'UNKNOWN\'; ELSE RETURN v_enabled; END IF; END'], 13 => ['db' => 'sys', 'name' => 'ps_thread_id', 'type' => 'FUNCTION', 'specific_name' => 'ps_thread_id', 'language' => 'SQL', 'sql_data_access' => 'READS_SQL_DATA', 'is_deterministic' => 'NO', 'security_type' => 'INVOKER', 'param_list' => ' in_connection_id BIGINT UNSIGNED ', 'returns' => 'bigint(20) unsigned', 'body' => 'BEGIN RETURN (SELECT THREAD_ID FROM `performance_schema`.`threads` WHERE PROCESSLIST_ID = IFNULL(in_connection_id, CONNECTION_ID()) ); END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Return the Performance Schema THREAD_ID for the specified connection ID.
 
 Parameters
 
 in_connection_id (BIGINT UNSIGNED):
 The id of the connection to return the thread id for. If NULL, the current
 connection thread id is returned.
 
 Example
 
 mysql> SELECT sys.ps_thread_id(79);
 +----------------------+
 | sys.ps_thread_id(79) |
 +----------------------+
 |                   98 |
 +----------------------+
 1 row in set (0.00 sec)
 
 mysql> SELECT sys.ps_thread_id(CONNECTION_ID());
 +-----------------------------------+
 | sys.ps_thread_id(CONNECTION_ID()) |
 +-----------------------------------+
 |                                98 |
 +-----------------------------------+
 1 row in set (0.00 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN RETURN (SELECT THREAD_ID FROM `performance_schema`.`threads` WHERE PROCESSLIST_ID = IFNULL(in_connection_id, CONNECTION_ID()) ); END'], 14 => ['db' => 'sys', 'name' => 'ps_thread_account', 'type' => 'FUNCTION', 'specific_name' => 'ps_thread_account', 'language' => 'SQL', 'sql_data_access' => 'READS_SQL_DATA', 'is_deterministic' => 'NO', 'security_type' => 'INVOKER', 'param_list' => ' in_thread_id BIGINT UNSIGNED ', 'returns' => 'text CHARSET utf8', 'body' => 'BEGIN RETURN (SELECT IF( type = \'FOREGROUND\', CONCAT(processlist_user, \'@\', processlist_host), type ) AS account FROM `performance_schema`.`threads` WHERE thread_id = in_thread_id); END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Return the user@host account for the given Performance Schema thread id.
 
 Parameters
 
 in_thread_id (BIGINT UNSIGNED):
 The id of the thread to return the account for.
 
 Example
 
 mysql> select thread_id, processlist_user, processlist_host from performance_schema.threads where type = \'foreground\';
 +-----------+------------------+------------------+
 | thread_id | processlist_user | processlist_host |
 +-----------+------------------+------------------+
 |        23 | NULL             | NULL             |
 |        30 | root             | localhost        |
 |        31 | msandbox         | localhost        |
 |        32 | msandbox         | localhost        |
 +-----------+------------------+------------------+
 4 rows in set (0.00 sec)
 
 mysql> select sys.ps_thread_account(31);
 +---------------------------+
 | sys.ps_thread_account(31) |
 +---------------------------+
 | msandbox@localhost        |
 +---------------------------+
 1 row in set (0.00 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN RETURN (SELECT IF( type = \'FOREGROUND\', CONCAT(processlist_user, \'@\', processlist_host), type ) AS account FROM `performance_schema`.`threads` WHERE thread_id = in_thread_id); END'], 15 => ['db' => 'sys', 'name' => 'ps_thread_stack', 'type' => 'FUNCTION', 'specific_name' => 'ps_thread_stack', 'language' => 'SQL', 'sql_data_access' => 'READS_SQL_DATA', 'is_deterministic' => 'NO', 'security_type' => 'INVOKER', 'param_list' => ' thd_id BIGINT UNSIGNED, debug BOOLEAN ', 'returns' => 'longtext CHARSET latin1', 'body' => 'BEGIN  DECLARE json_objects LONGTEXT;   UPDATE performance_schema.threads SET instrumented = \'NO\' WHERE processlist_id = CONNECTION_ID();   SET SESSION group_concat_max_len=@@global.max_allowed_packet;  SELECT GROUP_CONCAT(CONCAT( \'{\' , CONCAT_WS( \', \' , CONCAT(\'"nesting_event_id": "\', IF(nesting_event_id IS NULL, \'0\', nesting_event_id), \'"\') , CONCAT(\'"event_id": "\', event_id, \'"\') , CONCAT( \'"timer_wait": \', ROUND(timer_wait/1000000, 2))   , CONCAT( \'"event_info": "\' , CASE WHEN event_name NOT LIKE \'wait/io%\' THEN REPLACE(SUBSTRING_INDEX(event_name, \'/\', -2), \'\\', \'\\\\') WHEN event_name NOT LIKE \'wait/io/file%\' OR event_name NOT LIKE \'wait/io/socket%\' THEN REPLACE(SUBSTRING_INDEX(event_name, \'/\', -4), \'\\', \'\\\\') ELSE event_name END , \'"\' ) , CONCAT( \'"wait_info": "\', IFNULL(wait_info, \'\'), \'"\') , CONCAT( \'"source": "\', IF(true AND event_name LIKE \'wait%\', IFNULL(wait_info, \'\'), \'\'), \'"\') , CASE  WHEN event_name LIKE \'wait/io/file%\'      THEN \'"event_type": "io/file"\' WHEN event_name LIKE \'wait/io/table%\'     THEN \'"event_type": "io/table"\' WHEN event_name LIKE \'wait/io/socket%\'    THEN \'"event_type": "io/socket"\' WHEN event_name LIKE \'wait/synch/mutex%\'  THEN \'"event_type": "synch/mutex"\' WHEN event_name LIKE \'wait/synch/cond%\'   THEN \'"event_type": "synch/cond"\' WHEN event_name LIKE \'wait/synch/rwlock%\' THEN \'"event_type": "synch/rwlock"\' WHEN event_name LIKE \'wait/lock%\'         THEN \'"event_type": "lock"\' WHEN event_name LIKE \'statement/%\'        THEN \'"event_type": "stmt"\' WHEN event_name LIKE \'stage/%\'            THEN \'"event_type": "stage"\' WHEN event_name LIKE \'%idle%\'             THEN \'"event_type": "idle"\' ELSE \'\'  END                    ) , \'}\' ) ORDER BY event_id ASC SEPARATOR \',\') event INTO json_objects FROM (  (SELECT thread_id, event_id, event_name, timer_wait, timer_start, nesting_event_id,  CONCAT(sql_text, \'\\n\', \'errors: \', errors, \'\\n\', \'warnings: \', warnings, \'\\n\', \'lock time: \', ROUND(lock_time/1000000, 2),\'us\\n\', \'rows affected: \', rows_affected, \'\\n\', \'rows sent: \', rows_sent, \'\\n\', \'rows examined: \', rows_examined, \'\\n\', \'tmp tables: \', created_tmp_tables, \'\\n\', \'tmp disk tables: \', created_tmp_disk_tables, \'\\n\', \'select scan: \', select_scan, \'\\n\', \'select full join: \', select_full_join, \'\\n\', \'select full range join: \', select_full_range_join, \'\\n\', \'select range: \', select_range, \'\\n\', \'select range check: \', select_range_check, \'\\n\',  \'sort merge passes: \', sort_merge_passes, \'\\n\', \'sort rows: \', sort_rows, \'\\n\', \'sort range: \', sort_range, \'\\n\', \'sort scan: \', sort_scan, \'\\n\', \'no index used: \', IF(no_index_used, \'TRUE\', \'FALSE\'), \'\\n\', \'no good index used: \', IF(no_good_index_used, \'TRUE\', \'FALSE\'), \'\\n\' ) AS wait_info FROM performance_schema.events_statements_history_long WHERE thread_id = thd_id) UNION  (SELECT thread_id, event_id, event_name, timer_wait, timer_start, nesting_event_id, null AS wait_info FROM performance_schema.events_stages_history_long WHERE thread_id = thd_id)  UNION  (SELECT thread_id, event_id,  CONCAT(event_name ,  IF(event_name NOT LIKE \'wait/synch/mutex%\', IFNULL(CONCAT(\' - \', operation), \'\'), \'\'),  IF(number_of_bytes IS NOT NULL, CONCAT(\' \', number_of_bytes, \' bytes\'), \'\'), IF(event_name LIKE \'wait/io/file%\', \'\\n\', \'\'), IF(object_schema IS NOT NULL, CONCAT(\'\\nObject: \', object_schema, \'.\'), \'\'),  IF(object_name IS NOT NULL,  IF (event_name LIKE \'wait/io/socket%\', CONCAT(IF (object_name LIKE \':0%\', @@socket, object_name)), object_name), \'\'),  IF(index_name IS NOT NULL, CONCAT(\' Index: \', index_name), \'\'), \'\\n\' ) AS event_name, timer_wait, timer_start, nesting_event_id, source AS wait_info FROM performance_schema.events_waits_history_long WHERE thread_id = thd_id)) events  ORDER BY event_id;  RETURN CONCAT(\'{\',  CONCAT_WS(\',\',  \'"rankdir": "LR"\', \'"nodesep": "0.10"\', CONCAT(\'"stack_created": "\', NOW(), \'"\'), CONCAT(\'"mysql_version": "\', VERSION(), \'"\'), CONCAT(\'"mysql_user": "\', CURRENT_USER(), \'"\'), CONCAT(\'"events": [\', IFNULL(json_objects,\'\'), \']\') ), \'}\');  END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Outputs a JSON formatted stack of all statements, stages and events
 within Performance Schema for the specified thread.
 
 Parameters
 
 thd_id (BIGINT UNSIGNED):
 The id of the thread to trace. This should match the thread_id
 column from the performance_schema.threads table.
 in_verbose (BOOLEAN):
 Include file:lineno information in the events.
 
 Example
 
 (line separation added for output)
 
 mysql> SELECT sys.ps_thread_stack(37, FALSE) AS thread_stack\G
 *************************** 1. row ***************************
 thread_stack: {"rankdir": "LR","nodesep": "0.10","stack_created": "2014-02-19 13:39:03",
 "mysql_version": "5.7.3-m13","mysql_user": "root@localhost","events": 
 [{"nesting_event_id": "0", "event_id": "10", "timer_wait": 256.35, "event_info": 
 "sql/select", "wait_info": "select @@version_comment limit 1\nerrors: 0\nwarnings: 0\nlock time:
 ...
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN  DECLARE json_objects LONGTEXT;   UPDATE performance_schema.threads SET instrumented = \'NO\' WHERE processlist_id = CONNECTION_ID();   SET SESSION group_concat_max_len=@@global.max_allowed_packet;  SELECT GROUP_CONCAT(CONCAT( \'{\' , CONCAT_WS( \', \' , CONCAT(\'"nesting_event_id": "\', IF(nesting_event_id IS NULL, \'0\', nesting_event_id), \'"\') , CONCAT(\'"event_id": "\', event_id, \'"\') , CONCAT( \'"timer_wait": \', ROUND(timer_wait/1000000, 2))   , CONCAT( \'"event_info": "\' , CASE WHEN event_name NOT LIKE \'wait/io%\' THEN REPLACE(SUBSTRING_INDEX(event_name, \'/\', -2), \'\', \'\\') WHEN event_name NOT LIKE \'wait/io/file%\' OR event_name NOT LIKE \'wait/io/socket%\' THEN REPLACE(SUBSTRING_INDEX(event_name, \'/\', -4), \'\', \'\\') ELSE event_name END , \'"\' ) , CONCAT( \'"wait_info": "\', IFNULL(wait_info, \'\'), \'"\') , CONCAT( \'"source": "\', IF(true AND event_name LIKE \'wait%\', IFNULL(wait_info, \'\'), \'\'), \'"\') , CASE  WHEN event_name LIKE \'wait/io/file%\'      THEN \'"event_type": "io/file"\' WHEN event_name LIKE \'wait/io/table%\'     THEN \'"event_type": "io/table"\' WHEN event_name LIKE \'wait/io/socket%\'    THEN \'"event_type": "io/socket"\' WHEN event_name LIKE \'wait/synch/mutex%\'  THEN \'"event_type": "synch/mutex"\' WHEN event_name LIKE \'wait/synch/cond%\'   THEN \'"event_type": "synch/cond"\' WHEN event_name LIKE \'wait/synch/rwlock%\' THEN \'"event_type": "synch/rwlock"\' WHEN event_name LIKE \'wait/lock%\'         THEN \'"event_type": "lock"\' WHEN event_name LIKE \'statement/%\'        THEN \'"event_type": "stmt"\' WHEN event_name LIKE \'stage/%\'            THEN \'"event_type": "stage"\' WHEN event_name LIKE \'%idle%\'             THEN \'"event_type": "idle"\' ELSE \'\'  END                    ) , \'}\' ) ORDER BY event_id ASC SEPARATOR \',\') event INTO json_objects FROM (  (SELECT thread_id, event_id, event_name, timer_wait, timer_start, nesting_event_id,  CONCAT(sql_text, \'\n\', \'errors: \', errors, \'\n\', \'warnings: \', warnings, \'\n\', \'lock time: \', ROUND(lock_time/1000000, 2),\'us\n\', \'rows affected: \', rows_affected, \'\n\', \'rows sent: \', rows_sent, \'\n\', \'rows examined: \', rows_examined, \'\n\', \'tmp tables: \', created_tmp_tables, \'\n\', \'tmp disk tables: \', created_tmp_disk_tables, \'\n\', \'select scan: \', select_scan, \'\n\', \'select full join: \', select_full_join, \'\n\', \'select full range join: \', select_full_range_join, \'\n\', \'select range: \', select_range, \'\n\', \'select range check: \', select_range_check, \'\n\',  \'sort merge passes: \', sort_merge_passes, \'\n\', \'sort rows: \', sort_rows, \'\n\', \'sort range: \', sort_range, \'\n\', \'sort scan: \', sort_scan, \'\n\', \'no index used: \', IF(no_index_used, \'TRUE\', \'FALSE\'), \'\n\', \'no good index used: \', IF(no_good_index_used, \'TRUE\', \'FALSE\'), \'\n\' ) AS wait_info FROM performance_schema.events_statements_history_long WHERE thread_id = thd_id) UNION  (SELECT thread_id, event_id, event_name, timer_wait, timer_start, nesting_event_id, null AS wait_info FROM performance_schema.events_stages_history_long WHERE thread_id = thd_id)  UNION  (SELECT thread_id, event_id,  CONCAT(event_name ,  IF(event_name NOT LIKE \'wait/synch/mutex%\', IFNULL(CONCAT(\' - \', operation), \'\'), \'\'),  IF(number_of_bytes IS NOT NULL, CONCAT(\' \', number_of_bytes, \' bytes\'), \'\'), IF(event_name LIKE \'wait/io/file%\', \'\n\', \'\'), IF(object_schema IS NOT NULL, CONCAT(\'\nObject: \', object_schema, \'.\'), \'\'),  IF(object_name IS NOT NULL,  IF (event_name LIKE \'wait/io/socket%\', CONCAT(IF (object_name LIKE \':0%\', @@socket, object_name)), object_name), \'\'),  IF(index_name IS NOT NULL, CONCAT(\' Index: \', index_name), \'\'), \'\n\' ) AS event_name, timer_wait, timer_start, nesting_event_id, source AS wait_info FROM performance_schema.events_waits_history_long WHERE thread_id = thd_id)) events  ORDER BY event_id;  RETURN CONCAT(\'{\',  CONCAT_WS(\',\',  \'"rankdir": "LR"\', \'"nodesep": "0.10"\', CONCAT(\'"stack_created": "\', NOW(), \'"\'), CONCAT(\'"mysql_version": "\', VERSION(), \'"\'), CONCAT(\'"mysql_user": "\', CURRENT_USER(), \'"\'), CONCAT(\'"events": [\', IFNULL(json_objects,\'\'), \']\') ), \'}\');  END'], 16 => ['db' => 'sys', 'name' => 'ps_thread_trx_info', 'type' => 'FUNCTION', 'specific_name' => 'ps_thread_trx_info', 'language' => 'SQL', 'sql_data_access' => 'READS_SQL_DATA', 'is_deterministic' => 'NO', 'security_type' => 'INVOKER', 'param_list' => ' in_thread_id BIGINT UNSIGNED ', 'returns' => 'longtext CHARSET utf8', 'body' => 'BEGIN DECLARE v_output LONGTEXT DEFAULT \'{}\'; DECLARE v_msg_text TEXT DEFAULT \'\'; DECLARE v_signal_msg TEXT DEFAULT \'\'; DECLARE v_mysql_errno INT; DECLARE v_max_output_len BIGINT; DECLARE EXIT HANDLER FOR SQLWARNING, SQLEXCEPTION BEGIN GET DIAGNOSTICS CONDITION 1 v_msg_text = MESSAGE_TEXT, v_mysql_errno = MYSQL_ERRNO;  IF v_mysql_errno = 1260 THEN SET v_signal_msg = CONCAT(\'{ "error": "Trx info truncated: \', v_msg_text, \'" }\'); ELSE SET v_signal_msg = CONCAT(\'{ "error": "\', v_msg_text, \'" }\'); END IF;  RETURN v_signal_msg; END;  IF (@sys.ps_thread_trx_info.max_length IS NULL) THEN SET @sys.ps_thread_trx_info.max_length = sys.sys_get_config(\'ps_thread_trx_info.max_length\', 65535); END IF;  IF (@sys.ps_thread_trx_info.max_length != @@session.group_concat_max_len) THEN SET @old_group_concat_max_len = @@session.group_concat_max_len; SET v_max_output_len = (@sys.ps_thread_trx_info.max_length - 5); SET SESSION group_concat_max_len = v_max_output_len; END IF;  SET v_output = ( SELECT CONCAT(\'[\', IFNULL(GROUP_CONCAT(trx_info ORDER BY event_id), \'\'), \'\n]\') AS trx_info FROM (SELECT trxi.thread_id,  trxi.event_id, GROUP_CONCAT( IFNULL( CONCAT(\'\n  {\n\', \'    "time": "\', IFNULL(sys.format_time(trxi.timer_wait), \'\'), \'",\n\', \'    "state": "\', IFNULL(trxi.state, \'\'), \'",\n\', \'    "mode": "\', IFNULL(trxi.access_mode, \'\'), \'",\n\', \'    "autocommitted": "\', IFNULL(trxi.autocommit, \'\'), \'",\n\', \'    "gtid": "\', IFNULL(trxi.gtid, \'\'), \'",\n\', \'    "isolation": "\', IFNULL(trxi.isolation_level, \'\'), \'",\n\', \'    "statements_executed": [\', IFNULL(s.stmts, \'\'), IF(s.stmts IS NULL, \' ]\n\', \'\n    ]\n\'), \'  }\' ),  \'\')  ORDER BY event_id) AS trx_info  FROM ( (SELECT thread_id, event_id, timer_wait, state,access_mode, autocommit, gtid, isolation_level FROM performance_schema.events_transactions_current WHERE thread_id = in_thread_id AND end_event_id IS NULL) UNION (SELECT thread_id, event_id, timer_wait, state,access_mode, autocommit, gtid, isolation_level FROM performance_schema.events_transactions_history WHERE thread_id = in_thread_id) ) AS trxi LEFT JOIN (SELECT thread_id, nesting_event_id, GROUP_CONCAT( IFNULL( CONCAT(\'\n      {\n\', \'        "sql_text": "\', IFNULL(sys.format_statement(REPLACE(sql_text, \'\\', \'\\\\')), \'\'), \'",\n\', \'        "time": "\', IFNULL(sys.format_time(timer_wait), \'\'), \'",\n\', \'        "schema": "\', IFNULL(current_schema, \'\'), \'",\n\', \'        "rows_examined": \', IFNULL(rows_examined, \'\'), \',\n\', \'        "rows_affected": \', IFNULL(rows_affected, \'\'), \',\n\', \'        "rows_sent": \', IFNULL(rows_sent, \'\'), \',\n\', \'        "tmp_tables": \', IFNULL(created_tmp_tables, \'\'), \',\n\', \'        "tmp_disk_tables": \', IFNULL(created_tmp_disk_tables, \'\'), \',\n\', \'        "sort_rows": \', IFNULL(sort_rows, \'\'), \',\n\', \'        "sort_merge_passes": \', IFNULL(sort_merge_passes, \'\'), \'\n\', \'      }\'), \'\') ORDER BY event_id) AS stmts FROM performance_schema.events_statements_history WHERE sql_text IS NOT NULL AND thread_id = in_thread_id GROUP BY thread_id, nesting_event_id ) AS s  ON trxi.thread_id = s.thread_id  AND trxi.event_id = s.nesting_event_id WHERE trxi.thread_id = in_thread_id GROUP BY trxi.thread_id, trxi.event_id ) trxs GROUP BY thread_id );  IF (@old_group_concat_max_len IS NOT NULL) THEN SET SESSION group_concat_max_len = @old_group_concat_max_len; END IF;  RETURN v_output; END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Returns a JSON object with info on the given threads current transaction, 
 and the statements it has already executed, derived from the
 performance_schema.events_transactions_current and
 performance_schema.events_statements_history tables (so the consumers 
 for these also have to be enabled within Performance Schema to get full
 data in the object).
 
 When the output exceeds the default truncation length (65535), a JSON error
 object is returned, such as:
 
 { "error": "Trx info truncated: Row 6 was cut by GROUP_CONCAT()" }
 
 Similar error objects are returned for other warnings/and exceptions raised
 when calling the function.
 
 The max length of the output of this function can be controlled with the
 ps_thread_trx_info.max_length variable set via sys_config, or the
 @sys.ps_thread_trx_info.max_length user variable, as appropriate.
 
 Parameters
 
 in_thread_id (BIGINT UNSIGNED):
 The id of the thread to return the transaction info for.
 
 Example
 
 SELECT sys.ps_thread_trx_info(48)\G
 *************************** 1. row ***************************
 sys.ps_thread_trx_info(48): [
 {
 "time": "790.70 us",
 "state": "COMMITTED",
 "mode": "READ WRITE",
 "autocommitted": "NO",
 "gtid": "AUTOMATIC",
 "isolation": "REPEATABLE READ",
 "statements_executed": [
 {
 "sql_text": "INSERT INTO info VALUES (1, \'foo\')",
 "time": "471.02 us",
 "schema": "trx",
 "rows_examined": 0,
 "rows_affected": 1,
 "rows_sent": 0,
 "tmp_tables": 0,
 "tmp_disk_tables": 0,
 "sort_rows": 0,
 "sort_merge_passes": 0
 },
 {
 "sql_text": "COMMIT",
 "time": "254.42 us",
 "schema": "trx",
 "rows_examined": 0,
 "rows_affected": 0,
 "rows_sent": 0,
 "tmp_tables": 0,
 "tmp_disk_tables": 0,
 "sort_rows": 0,
 "sort_merge_passes": 0
 }
 ]
 },
 {
 "time": "426.20 us",
 "state": "COMMITTED",
 "mode": "READ WRITE",
 "autocommitted": "NO",
 "gtid": "AUTOMATIC",
 "isolation": "REPEATABLE READ",
 "statements_executed": [
 {
 "sql_text": "INSERT INTO info VALUES (2, \'bar\')",
 "time": "107.33 us",
 "schema": "trx",
 "rows_examined": 0,
 "rows_affected": 1,
 "rows_sent": 0,
 "tmp_tables": 0,
 "tmp_disk_tables": 0,
 "sort_rows": 0,
 "sort_merge_passes": 0
 },
 {
 "sql_text": "COMMIT",
 "time": "213.23 us",
 "schema": "trx",
 "rows_examined": 0,
 "rows_affected": 0,
 "rows_sent": 0,
 "tmp_tables": 0,
 "tmp_disk_tables": 0,
 "sort_rows": 0,
 "sort_merge_passes": 0
 }
 ]
 }
 ]
 1 row in set (0.03 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN DECLARE v_output LONGTEXT DEFAULT \'{}\'; DECLARE v_msg_text TEXT DEFAULT \'\'; DECLARE v_signal_msg TEXT DEFAULT \'\'; DECLARE v_mysql_errno INT; DECLARE v_max_output_len BIGINT; DECLARE EXIT HANDLER FOR SQLWARNING, SQLEXCEPTION BEGIN GET DIAGNOSTICS CONDITION 1 v_msg_text = MESSAGE_TEXT, v_mysql_errno = MYSQL_ERRNO;  IF v_mysql_errno = 1260 THEN SET v_signal_msg = CONCAT(\'{ "error": "Trx info truncated: \', v_msg_text, \'" }\'); ELSE SET v_signal_msg = CONCAT(\'{ "error": "\', v_msg_text, \'" }\'); END IF;  RETURN v_signal_msg; END;  IF (@sys.ps_thread_trx_info.max_length IS NULL) THEN SET @sys.ps_thread_trx_info.max_length = sys.sys_get_config(\'ps_thread_trx_info.max_length\', 65535); END IF;  IF (@sys.ps_thread_trx_info.max_length != @@session.group_concat_max_len) THEN SET @old_group_concat_max_len = @@session.group_concat_max_len; SET v_max_output_len = (@sys.ps_thread_trx_info.max_length - 5); SET SESSION group_concat_max_len = v_max_output_len; END IF;  SET v_output = ( SELECT CONCAT(\'[\', IFNULL(GROUP_CONCAT(trx_info ORDER BY event_id), \'\'), \'
]\') AS trx_info FROM (SELECT trxi.thread_id,  trxi.event_id, GROUP_CONCAT( IFNULL( CONCAT(\'
  {
\', \'    "time": "\', IFNULL(sys.format_time(trxi.timer_wait), \'\'), \'",
\', \'    "state": "\', IFNULL(trxi.state, \'\'), \'",
\', \'    "mode": "\', IFNULL(trxi.access_mode, \'\'), \'",
\', \'    "autocommitted": "\', IFNULL(trxi.autocommit, \'\'), \'",
\', \'    "gtid": "\', IFNULL(trxi.gtid, \'\'), \'",
\', \'    "isolation": "\', IFNULL(trxi.isolation_level, \'\'), \'",
\', \'    "statements_executed": [\', IFNULL(s.stmts, \'\'), IF(s.stmts IS NULL, \' ]
\', \'
    ]
\'), \'  }\' ),  \'\')  ORDER BY event_id) AS trx_info  FROM ( (SELECT thread_id, event_id, timer_wait, state,access_mode, autocommit, gtid, isolation_level FROM performance_schema.events_transactions_current WHERE thread_id = in_thread_id AND end_event_id IS NULL) UNION (SELECT thread_id, event_id, timer_wait, state,access_mode, autocommit, gtid, isolation_level FROM performance_schema.events_transactions_history WHERE thread_id = in_thread_id) ) AS trxi LEFT JOIN (SELECT thread_id, nesting_event_id, GROUP_CONCAT( IFNULL( CONCAT(\'
      {
\', \'        "sql_text": "\', IFNULL(sys.format_statement(REPLACE(sql_text, \'\', \'\\')), \'\'), \'",
\', \'        "time": "\', IFNULL(sys.format_time(timer_wait), \'\'), \'",
\', \'        "schema": "\', IFNULL(current_schema, \'\'), \'",
\', \'        "rows_examined": \', IFNULL(rows_examined, \'\'), \',
\', \'        "rows_affected": \', IFNULL(rows_affected, \'\'), \',
\', \'        "rows_sent": \', IFNULL(rows_sent, \'\'), \',
\', \'        "tmp_tables": \', IFNULL(created_tmp_tables, \'\'), \',
\', \'        "tmp_disk_tables": \', IFNULL(created_tmp_disk_tables, \'\'), \',
\', \'        "sort_rows": \', IFNULL(sort_rows, \'\'), \',
\', \'        "sort_merge_passes": \', IFNULL(sort_merge_passes, \'\'), \'
\', \'      }\'), \'\') ORDER BY event_id) AS stmts FROM performance_schema.events_statements_history WHERE sql_text IS NOT NULL AND thread_id = in_thread_id GROUP BY thread_id, nesting_event_id ) AS s  ON trxi.thread_id = s.thread_id  AND trxi.event_id = s.nesting_event_id WHERE trxi.thread_id = in_thread_id GROUP BY trxi.thread_id, trxi.event_id ) trxs GROUP BY thread_id );  IF (@old_group_concat_max_len IS NOT NULL) THEN SET SESSION group_concat_max_len = @old_group_concat_max_len; END IF;  RETURN v_output; END'], 17 => ['db' => 'sys', 'name' => 'quote_identifier', 'type' => 'FUNCTION', 'specific_name' => 'quote_identifier', 'language' => 'SQL', 'sql_data_access' => 'NO_SQL', 'is_deterministic' => 'YES', 'security_type' => 'INVOKER', 'param_list' => 'in_identifier TEXT', 'returns' => 'text CHARSET utf8', 'body' => 'BEGIN RETURN CONCAT(\'`\', REPLACE(in_identifier, \'`\', \'``\'), \'`\'); END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Takes an unquoted identifier (schema name, table name, etc.) and
 returns the identifier quoted with backticks.
 
 Parameters
 
 in_identifier (TEXT):
 The identifier to quote.
 
 Returns
 
 TEXT
 
 Example
 
 mysql> SELECT sys.quote_identifier(\'my_identifier\') AS Identifier;
 +-----------------+
 | Identifier      |
 +-----------------+
 | `my_identifier` |
 +-----------------+
 1 row in set (0.00 sec)
 
 mysql> SELECT sys.quote_identifier(\'my`idenfier\') AS Identifier;
 +----------------+
 | Identifier     |
 +----------------+
 | `my``idenfier` |
 +----------------+
 1 row in set (0.00 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN RETURN CONCAT(\'`\', REPLACE(in_identifier, \'`\', \'``\'), \'`\'); END'], 18 => ['db' => 'sys', 'name' => 'sys_get_config', 'type' => 'FUNCTION', 'specific_name' => 'sys_get_config', 'language' => 'SQL', 'sql_data_access' => 'READS_SQL_DATA', 'is_deterministic' => 'YES', 'security_type' => 'INVOKER', 'param_list' => ' in_variable_name VARCHAR(128), in_default_value VARCHAR(128) ', 'returns' => 'varchar(128) CHARSET utf8', 'body' => 'BEGIN DECLARE v_value VARCHAR(128) DEFAULT NULL;  SET v_value = (SELECT value FROM sys.sys_config WHERE variable = in_variable_name);  IF (v_value IS NULL) THEN SET v_value = in_default_value; END IF;  RETURN v_value; END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Returns the value for the requested variable using the following logic:
 
 1. If the option exists in sys.sys_config return the value from there.
 2. Else fall back on the provided default value.
 
 Notes for using sys_get_config():
 
 * If the default value argument to sys_get_config() is NULL and case 2. is reached, NULL is returned.
 It is then expected that the caller is able to handle NULL for the given configuration option.
 * The convention is to name the user variables @sys.<name of variable>. It is <name of variable> that
 is stored in the sys_config table and is what is expected as the argument to sys_get_config().
 * If you want to check whether the configuration option has already been set and if not assign with
 the return value of sys_get_config() you can use IFNULL(...) (see example below). However this should
 not be done inside a loop (e.g. for each row in a result set) as for repeated calls where assignment
 is only needed in the first iteration using IFNULL(...) is expected to be significantly slower than
 using an IF (...) THEN ... END IF; block (see example below).
 
 Parameters
 
 in_variable_name (VARCHAR(128)):
 The name of the config option to return the value for.
 
 in_default_value (VARCHAR(128)):
 The default value to return if the variable does not exist in sys.sys_config.
 
 Returns
 
 VARCHAR(128)
 
 Example
 
 mysql> SELECT sys.sys_get_config(\'statement_truncate_len\', 128) AS Value;
 +-------+
 | Value |
 +-------+
 | 64    |
 +-------+
 1 row in set (0.00 sec)
 
 mysql> SET @sys.statement_truncate_len = IFNULL(@sys.statement_truncate_len, sys.sys_get_config(\'statement_truncate_len\', 64));
 Query OK, 0 rows affected (0.00 sec)
 
 IF (@sys.statement_truncate_len IS NULL) THEN
 SET @sys.statement_truncate_len = sys.sys_get_config(\'statement_truncate_len\', 64);
 END IF;
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN DECLARE v_value VARCHAR(128) DEFAULT NULL;  SET v_value = (SELECT value FROM sys.sys_config WHERE variable = in_variable_name);  IF (v_value IS NULL) THEN SET v_value = in_default_value; END IF;  RETURN v_value; END'], 19 => ['db' => 'sys', 'name' => 'version_major', 'type' => 'FUNCTION', 'specific_name' => 'version_major', 'language' => 'SQL', 'sql_data_access' => 'NO_SQL', 'is_deterministic' => 'NO', 'security_type' => 'INVOKER', 'param_list' => '', 'returns' => 'tinyint(3) unsigned', 'body' => 'BEGIN RETURN SUBSTRING_INDEX(SUBSTRING_INDEX(VERSION(), \'-\', 1), \'.\', 1); END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Returns the major version of MySQL Server.
 
 Returns
 
 TINYINT UNSIGNED
 
 Example
 
 mysql> SELECT VERSION(), sys.version_major();
 +--------------------------------------+---------------------+
 | VERSION()                            | sys.version_major() |
 +--------------------------------------+---------------------+
 | 5.7.9-enterprise-commercial-advanced | 5                   |
 +--------------------------------------+---------------------+
 1 row in set (0.00 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN RETURN SUBSTRING_INDEX(SUBSTRING_INDEX(VERSION(), \'-\', 1), \'.\', 1); END'], 20 => ['db' => 'sys', 'name' => 'version_minor', 'type' => 'FUNCTION', 'specific_name' => 'version_minor', 'language' => 'SQL', 'sql_data_access' => 'NO_SQL', 'is_deterministic' => 'NO', 'security_type' => 'INVOKER', 'param_list' => '', 'returns' => 'tinyint(3) unsigned', 'body' => 'BEGIN RETURN SUBSTRING_INDEX(SUBSTRING_INDEX(SUBSTRING_INDEX(VERSION(), \'-\', 1), \'.\', 2), \'.\', -1); END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Returns the minor (release series) version of MySQL Server.
 
 Returns
 
 TINYINT UNSIGNED
 
 Example
 
 mysql> SELECT VERSION(), sys.server_minor();
 +--------------------------------------+---------------------+
 | VERSION()                            | sys.version_minor() |
 +--------------------------------------+---------------------+
 | 5.7.9-enterprise-commercial-advanced | 7                   |
 +--------------------------------------+---------------------+
 1 row in set (0.00 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN RETURN SUBSTRING_INDEX(SUBSTRING_INDEX(SUBSTRING_INDEX(VERSION(), \'-\', 1), \'.\', 2), \'.\', -1); END'], 21 => ['db' => 'sys', 'name' => 'version_patch', 'type' => 'FUNCTION', 'specific_name' => 'version_patch', 'language' => 'SQL', 'sql_data_access' => 'NO_SQL', 'is_deterministic' => 'NO', 'security_type' => 'INVOKER', 'param_list' => '', 'returns' => 'tinyint(3) unsigned', 'body' => 'BEGIN RETURN SUBSTRING_INDEX(SUBSTRING_INDEX(VERSION(), \'-\', 1), \'.\', -1); END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Returns the patch release version of MySQL Server.
 
 Returns
 
 TINYINT UNSIGNED
 
 Example
 
 mysql> SELECT VERSION(), sys.version_patch();
 +--------------------------------------+---------------------+
 | VERSION()                            | sys.version_patch() |
 +--------------------------------------+---------------------+
 | 5.7.9-enterprise-commercial-advanced | 9                   |
 +--------------------------------------+---------------------+
 1 row in set (0.00 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN RETURN SUBSTRING_INDEX(SUBSTRING_INDEX(VERSION(), \'-\', 1), \'.\', -1); END'], 22 => ['db' => 'sys', 'name' => 'create_synonym_db', 'type' => 'PROCEDURE', 'specific_name' => 'create_synonym_db', 'language' => 'SQL', 'sql_data_access' => 'MODIFIES_SQL_DATA', 'is_deterministic' => 'NO', 'security_type' => 'INVOKER', 'param_list' => ' IN in_db_name VARCHAR(64),  IN in_synonym VARCHAR(64) ', 'returns' => '', 'body' => 'BEGIN DECLARE v_done bool DEFAULT FALSE; DECLARE v_db_name_check VARCHAR(64); DECLARE v_db_err_msg TEXT; DECLARE v_table VARCHAR(64); DECLARE v_views_created INT DEFAULT 0;  DECLARE db_doesnt_exist CONDITION FOR SQLSTATE \'42000\'; DECLARE db_name_exists CONDITION FOR SQLSTATE \'HY000\';  DECLARE c_table_names CURSOR FOR  SELECT TABLE_NAME  FROM INFORMATION_SCHEMA.TABLES  WHERE TABLE_SCHEMA = in_db_name;  DECLARE CONTINUE HANDLER FOR NOT FOUND SET v_done = TRUE;  SELECT SCHEMA_NAME INTO v_db_name_check FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = in_db_name;  IF v_db_name_check IS NULL THEN SET v_db_err_msg = CONCAT(\'Unknown database \', in_db_name); SIGNAL SQLSTATE \'HY000\' SET MESSAGE_TEXT = v_db_err_msg; END IF;  SELECT SCHEMA_NAME INTO v_db_name_check FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = in_synonym;  IF v_db_name_check = in_synonym THEN SET v_db_err_msg = CONCAT(\'Can\'t create database \', in_synonym, \'; database exists\'); SIGNAL SQLSTATE \'HY000\' SET MESSAGE_TEXT = v_db_err_msg; END IF;  SET @create_db_stmt := CONCAT(\'CREATE DATABASE \', sys.quote_identifier(in_synonym)); PREPARE create_db_stmt FROM @create_db_stmt; EXECUTE create_db_stmt; DEALLOCATE PREPARE create_db_stmt;  SET v_done = FALSE; OPEN c_table_names; c_table_names: LOOP FETCH c_table_names INTO v_table; IF v_done THEN LEAVE c_table_names; END IF;  SET @create_view_stmt = CONCAT( \'CREATE SQL SECURITY INVOKER VIEW \', sys.quote_identifier(in_synonym), \'.\', sys.quote_identifier(v_table), \' AS SELECT * FROM \', sys.quote_identifier(in_db_name), \'.\', sys.quote_identifier(v_table) ); PREPARE create_view_stmt FROM @create_view_stmt; EXECUTE create_view_stmt; DEALLOCATE PREPARE create_view_stmt;  SET v_views_created = v_views_created + 1; END LOOP; CLOSE c_table_names;  SELECT CONCAT( \'Created \', v_views_created, \' view\', IF(v_views_created != 1, \'s\', \'\'), \' in the \', sys.quote_identifier(in_synonym), \' database\' ) AS summary;  END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Takes a source database name and synonym name, and then creates the 
 synonym database with views that point to all of the tables within
 the source database.
 
 Useful for creating a "ps" synonym for "performance_schema",
 or "is" instead of "information_schema", for example.
 
 Parameters
 
 in_db_name (VARCHAR(64)):
 The database name that you would like to create a synonym for.
 in_synonym (VARCHAR(64)):
 The database synonym name.
 
 Example
 
 mysql> SHOW DATABASES;
 +--------------------+
 | Database           |
 +--------------------+
 | information_schema |
 | mysql              |
 | performance_schema |
 | sys                |
 | test               |
 +--------------------+
 5 rows in set (0.00 sec)
 
 mysql> CALL sys.create_synonym_db(\'performance_schema\', \'ps\');
 +---------------------------------------+
 | summary                               |
 +---------------------------------------+
 | Created 74 views in the `ps` database |
 +---------------------------------------+
 1 row in set (8.57 sec)
 
 Query OK, 0 rows affected (8.57 sec)
 
 mysql> SHOW DATABASES;
 +--------------------+
 | Database           |
 +--------------------+
 | information_schema |
 | mysql              |
 | performance_schema |
 | ps                 |
 | sys                |
 | test               |
 +--------------------+
 6 rows in set (0.00 sec)
 
 mysql> SHOW FULL TABLES FROM ps;
 +------------------------------------------------------+------------+
 | Tables_in_ps                                         | Table_type |
 +------------------------------------------------------+------------+
 | accounts                                             | VIEW       |
 | cond_instances                                       | VIEW       |
 | events_stages_current                                | VIEW       |
 | events_stages_history                                | VIEW       |
 ...
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN DECLARE v_done bool DEFAULT FALSE; DECLARE v_db_name_check VARCHAR(64); DECLARE v_db_err_msg TEXT; DECLARE v_table VARCHAR(64); DECLARE v_views_created INT DEFAULT 0;  DECLARE db_doesnt_exist CONDITION FOR SQLSTATE \'42000\'; DECLARE db_name_exists CONDITION FOR SQLSTATE \'HY000\';  DECLARE c_table_names CURSOR FOR  SELECT TABLE_NAME  FROM INFORMATION_SCHEMA.TABLES  WHERE TABLE_SCHEMA = in_db_name;  DECLARE CONTINUE HANDLER FOR NOT FOUND SET v_done = TRUE;  SELECT SCHEMA_NAME INTO v_db_name_check FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = in_db_name;  IF v_db_name_check IS NULL THEN SET v_db_err_msg = CONCAT(\'Unknown database \', in_db_name); SIGNAL SQLSTATE \'HY000\' SET MESSAGE_TEXT = v_db_err_msg; END IF;  SELECT SCHEMA_NAME INTO v_db_name_check FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = in_synonym;  IF v_db_name_check = in_synonym THEN SET v_db_err_msg = CONCAT(\'Can\'t create database \', in_synonym, \'; database exists\'); SIGNAL SQLSTATE \'HY000\' SET MESSAGE_TEXT = v_db_err_msg; END IF;  SET @create_db_stmt := CONCAT(\'CREATE DATABASE \', sys.quote_identifier(in_synonym)); PREPARE create_db_stmt FROM @create_db_stmt; EXECUTE create_db_stmt; DEALLOCATE PREPARE create_db_stmt;  SET v_done = FALSE; OPEN c_table_names; c_table_names: LOOP FETCH c_table_names INTO v_table; IF v_done THEN LEAVE c_table_names; END IF;  SET @create_view_stmt = CONCAT( \'CREATE SQL SECURITY INVOKER VIEW \', sys.quote_identifier(in_synonym), \'.\', sys.quote_identifier(v_table), \' AS SELECT * FROM \', sys.quote_identifier(in_db_name), \'.\', sys.quote_identifier(v_table) ); PREPARE create_view_stmt FROM @create_view_stmt; EXECUTE create_view_stmt; DEALLOCATE PREPARE create_view_stmt;  SET v_views_created = v_views_created + 1; END LOOP; CLOSE c_table_names;  SELECT CONCAT( \'Created \', v_views_created, \' view\', IF(v_views_created != 1, \'s\', \'\'), \' in the \', sys.quote_identifier(in_synonym), \' database\' ) AS summary;  END'], 23 => ['db' => 'sys', 'name' => 'execute_prepared_stmt', 'type' => 'PROCEDURE', 'specific_name' => 'execute_prepared_stmt', 'language' => 'SQL', 'sql_data_access' => 'READS_SQL_DATA', 'is_deterministic' => 'NO', 'security_type' => 'INVOKER', 'param_list' => ' IN in_query longtext CHARACTER SET UTF8 ', 'returns' => '', 'body' => 'BEGIN IF (@sys.debug IS NULL) THEN SET @sys.debug = sys.sys_get_config(\'debug\', \'OFF\'); END IF;  IF (in_query IS NULL OR LENGTH(in_query) < 4) THEN SIGNAL SQLSTATE \'45000\' SET MESSAGE_TEXT = "The @sys.execute_prepared_stmt.sql must contain a query"; END IF;  SET @sys.execute_prepared_stmt.sql = in_query;  IF (@sys.debug = \'ON\') THEN SELECT @sys.execute_prepared_stmt.sql AS \'Debug\'; END IF; PREPARE sys_execute_prepared_stmt FROM @sys.execute_prepared_stmt.sql; EXECUTE sys_execute_prepared_stmt; DEALLOCATE PREPARE sys_execute_prepared_stmt;  SET @sys.execute_prepared_stmt.sql = NULL; END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Takes the query in the argument and executes it using a prepared statement. The prepared statement is deallocated,
 so the procedure is mainly useful for executing one off dynamically created queries.
 
 The sys_execute_prepared_stmt prepared statement name is used for the query and is required not to exist.
 
 
 Parameters
 
 in_query (longtext CHARACTER SET UTF8):
 The query to execute.
 
 
 Configuration Options
 
 sys.debug
 Whether to provide debugging output.
 Default is \'OFF\'. Set to \'ON\' to include.
 
 
 Example
 
 mysql> CALL sys.execute_prepared_stmt(\'SELECT * FROM sys.sys_config\');
 +------------------------+-------+---------------------+--------+
 | variable               | value | set_time            | set_by |
 +------------------------+-------+---------------------+--------+
 | statement_truncate_len | 64    | 2015-06-30 13:06:00 | NULL   |
 +------------------------+-------+---------------------+--------+
 1 row in set (0.00 sec)
 
 Query OK, 0 rows affected (0.00 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN IF (@sys.debug IS NULL) THEN SET @sys.debug = sys.sys_get_config(\'debug\', \'OFF\'); END IF;  IF (in_query IS NULL OR LENGTH(in_query) < 4) THEN SIGNAL SQLSTATE \'45000\' SET MESSAGE_TEXT = "The @sys.execute_prepared_stmt.sql must contain a query"; END IF;  SET @sys.execute_prepared_stmt.sql = in_query;  IF (@sys.debug = \'ON\') THEN SELECT @sys.execute_prepared_stmt.sql AS \'Debug\'; END IF; PREPARE sys_execute_prepared_stmt FROM @sys.execute_prepared_stmt.sql; EXECUTE sys_execute_prepared_stmt; DEALLOCATE PREPARE sys_execute_prepared_stmt;  SET @sys.execute_prepared_stmt.sql = NULL; END'], 24 => ['db' => 'sys', 'name' => 'diagnostics', 'type' => 'PROCEDURE', 'specific_name' => 'diagnostics', 'language' => 'SQL', 'sql_data_access' => 'READS_SQL_DATA', 'is_deterministic' => 'NO', 'security_type' => 'INVOKER', 'param_list' => ' IN in_max_runtime int unsigned, IN in_interval int unsigned, IN in_auto_config enum (\'current\', \'medium\', \'full\') ', 'returns' => '', 'body' => 'BEGIN DECLARE v_start, v_runtime, v_iter_start, v_sleep DECIMAL(20,2) DEFAULT 0.0; DECLARE v_has_innodb, v_has_ndb, v_has_ps, v_has_replication, v_has_ps_replication VARCHAR(8) CHARSET utf8 DEFAULT \'NO\'; DECLARE v_this_thread_enabled, v_has_ps_vars, v_has_metrics ENUM(\'YES\', \'NO\'); DECLARE v_table_name, v_banner VARCHAR(64) CHARSET utf8; DECLARE v_sql_status_summary_select, v_sql_status_summary_delta, v_sql_status_summary_from, v_no_delta_names TEXT; DECLARE v_output_time, v_output_time_prev DECIMAL(20,3) UNSIGNED; DECLARE v_output_count, v_count, v_old_group_concat_max_len INT UNSIGNED DEFAULT 0; DECLARE v_status_summary_width TINYINT UNSIGNED DEFAULT 50; DECLARE v_done BOOLEAN DEFAULT FALSE; DECLARE c_ndbinfo CURSOR FOR SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_SCHEMA = \'ndbinfo\' AND TABLE_NAME NOT IN ( \'blocks\', \'config_params\', \'dict_obj_types\', \'disk_write_speed_base\', \'memory_per_fragment\', \'memoryusage\', \'operations_per_fragment\', \'threadblocks\' ); DECLARE c_sysviews_w_delta CURSOR FOR SELECT table_name FROM tmp_sys_views_delta ORDER BY table_name;  DECLARE CONTINUE HANDLER FOR NOT FOUND SET v_done = TRUE;  SELECT INSTRUMENTED INTO v_this_thread_enabled FROM performance_schema.threads WHERE PROCESSLIST_ID = CONNECTION_ID(); IF (v_this_thread_enabled = \'YES\') THEN CALL sys.ps_setup_disable_thread(CONNECTION_ID()); END IF;  IF (in_max_runtime < in_interval) THEN SIGNAL SQLSTATE \'45000\' SET MESSAGE_TEXT = \'in_max_runtime must be greater than or equal to in_interval\'; END IF; IF (in_max_runtime = 0) THEN SIGNAL SQLSTATE \'45000\' SET MESSAGE_TEXT = \'in_max_runtime must be greater than 0\'; END IF; IF (in_interval = 0) THEN SIGNAL SQLSTATE \'45000\' SET MESSAGE_TEXT = \'in_interval must be greater than 0\'; END IF;  IF (@sys.diagnostics.allow_i_s_tables IS NULL) THEN SET @sys.diagnostics.allow_i_s_tables = sys.sys_get_config(\'diagnostics.allow_i_s_tables\', \'OFF\'); END IF; IF (@sys.diagnostics.include_raw IS NULL) THEN SET @sys.diagnostics.include_raw      = sys.sys_get_config(\'diagnostics.include_raw\'     , \'OFF\'); END IF; IF (@sys.debug IS NULL) THEN SET @sys.debug                        = sys.sys_get_config(\'debug\'                       , \'OFF\'); END IF; IF (@sys.statement_truncate_len IS NULL) THEN SET @sys.statement_truncate_len       = sys.sys_get_config(\'statement_truncate_len\'      , \'64\' ); END IF;  SET @log_bin := @@sql_log_bin; IF (@log_bin = 1) THEN SET sql_log_bin = 0; END IF;  SET v_no_delta_names = CONCAT(\'s%{COUNT}.Variable_name NOT IN (\', \'\'\'innodb_buffer_pool_pages_total\'\', \', \'\'\'innodb_page_size\'\', \', \'\'\'last_query_cost\'\', \', \'\'\'last_query_partial_plans\'\', \', \'\'\'qcache_total_blocks\'\', \', \'\'\'slave_last_heartbeat\'\', \', \'\'\'ssl_ctx_verify_depth\'\', \', \'\'\'ssl_ctx_verify_mode\'\', \', \'\'\'ssl_session_cache_size\'\', \', \'\'\'ssl_verify_depth\'\', \', \'\'\'ssl_verify_mode\'\', \', \'\'\'ssl_version\'\', \', \'\'\'buffer_flush_lsn_avg_rate\'\', \', \'\'\'buffer_flush_pct_for_dirty\'\', \', \'\'\'buffer_flush_pct_for_lsn\'\', \', \'\'\'buffer_pool_pages_total\'\', \', \'\'\'lock_row_lock_time_avg\'\', \', \'\'\'lock_row_lock_time_max\'\', \', \'\'\'innodb_page_size\'\'\', \')\');  IF (in_auto_config <> \'current\') THEN IF (@sys.debug = \'ON\') THEN SELECT CONCAT(\'Updating Performance Schema configuration to \', in_auto_config) AS \'Debug\'; END IF; CALL sys.ps_setup_save(0);  IF (in_auto_config = \'medium\') THEN UPDATE performance_schema.setup_consumers SET ENABLED = \'YES\' WHERE NAME NOT LIKE \'%\_history%\';  UPDATE performance_schema.setup_instruments SET ENABLED = \'YES\', TIMED   = \'YES\' WHERE NAME NOT LIKE \'wait/synch/%\'; ELSEIF (in_auto_config = \'full\') THEN UPDATE performance_schema.setup_consumers SET ENABLED = \'YES\';  UPDATE performance_schema.setup_instruments SET ENABLED = \'YES\', TIMED   = \'YES\'; END IF;  UPDATE performance_schema.threads SET INSTRUMENTED = \'YES\' WHERE PROCESSLIST_ID <> CONNECTION_ID(); END IF;  SET v_start        = UNIX_TIMESTAMP(NOW(2)), in_interval    = IFNULL(in_interval, 30), in_max_runtime = IFNULL(in_max_runtime, 60);  SET v_banner = REPEAT( \'-\', LEAST( GREATEST( 36, CHAR_LENGTH(VERSION()), CHAR_LENGTH(@@global.version_comment), CHAR_LENGTH(@@global.version_compile_os), CHAR_LENGTH(@@global.version_compile_machine), CHAR_LENGTH(@@global.socket), CHAR_LENGTH(@@global.datadir) ), 64 ) ); SELECT \'Hostname\' AS \'Name\', @@global.hostname AS \'Value\' UNION ALL SELECT \'Port\' AS \'Name\', @@global.port AS \'Value\' UNION ALL SELECT \'Socket\' AS \'Name\', @@global.socket AS \'Value\' UNION ALL SELECT \'Datadir\' AS \'Name\', @@global.datadir AS \'Value\' UNION ALL SELECT \'Server UUID\' AS \'Name\', @@global.server_uuid AS \'Value\' UNION ALL SELECT REPEAT(\'-\', 23) AS \'Name\', v_banner AS \'Value\' UNION ALL SELECT \'MySQL Version\' AS \'Name\', VERSION() AS \'Value\' UNION ALL SELECT \'Sys Schema Version\' AS \'Name\', (SELECT sys_version FROM sys.version) AS \'Value\' UNION ALL SELECT \'Version Comment\' AS \'Name\', @@global.version_comment AS \'Value\' UNION ALL SELECT \'Version Compile OS\' AS \'Name\', @@global.version_compile_os AS \'Value\' UNION ALL SELECT \'Version Compile Machine\' AS \'Name\', @@global.version_compile_machine AS \'Value\' UNION ALL SELECT REPEAT(\'-\', 23) AS \'Name\', v_banner AS \'Value\' UNION ALL SELECT \'UTC Time\' AS \'Name\', UTC_TIMESTAMP() AS \'Value\' UNION ALL SELECT \'Local Time\' AS \'Name\', NOW() AS \'Value\' UNION ALL SELECT \'Time Zone\' AS \'Name\', @@global.time_zone AS \'Value\' UNION ALL SELECT \'System Time Zone\' AS \'Name\', @@global.system_time_zone AS \'Value\' UNION ALL SELECT \'Time Zone Offset\' AS \'Name\', TIMEDIFF(NOW(), UTC_TIMESTAMP()) AS \'Value\';  SET v_has_innodb         = IFNULL((SELECT SUPPORT FROM information_schema.ENGINES WHERE ENGINE = \'InnoDB\'), \'NO\'), v_has_ndb            = IFNULL((SELECT SUPPORT FROM information_schema.ENGINES WHERE ENGINE = \'NDBCluster\'), \'NO\'), v_has_ps             = IFNULL((SELECT SUPPORT FROM information_schema.ENGINES WHERE ENGINE = \'PERFORMANCE_SCHEMA\'), \'NO\'), v_has_ps_replication = IF(v_has_ps = \'YES\' AND EXISTS(SELECT 1 FROM information_schema.TABLES WHERE TABLE_SCHEMA = \'performance_schema\' AND TABLE_NAME = \'replication_applier_status\'), \'YES\', \'NO\' ), v_has_replication    =  IF(v_has_ps_replication = \'YES\', IF((SELECT COUNT(*) FROM performance_schema.replication_connection_status) > 0, \'YES\', \'NO\'), IF(@@master_info_repository = \'TABLE\', IF((SELECT COUNT(*) FROM mysql.slave_master_info) > 0, \'YES\', \'NO\'), IF(@@relay_log_info_repository = \'TABLE\', IF((SELECT COUNT(*) FROM mysql.slave_relay_log_info) > 0, \'YES\', \'NO\'), \'MAYBE\')) ) , v_has_metrics        = IF(v_has_ps = \'YES\' OR (sys.version_major() = 5 AND sys.version_minor() = 6), \'YES\', \'NO\'), v_has_ps_vars        = \'NO\';   SET v_has_ps_vars = IF(@@global.show_compatibility_56, \'NO\', \'YES\');  SET v_has_ps_vars = \'YES\';  IF (@sys.debug = \'ON\') THEN SELECT v_has_innodb AS \'Has_InnoDB\', v_has_ndb AS \'Has_NDBCluster\', v_has_ps AS \'Has_Performance_Schema\', v_has_ps_vars AS \'Has_P_S_SHOW_Variables\', v_has_metrics AS \'Has_metrics\', v_has_ps_replication \'AS Has_P_S_Replication\', v_has_replication AS \'Has_Replication\'; END IF;  IF (v_has_innodb IN (\'DEFAULT\', \'YES\')) THEN SET @sys.diagnostics.sql = \'SHOW ENGINE InnoDB STATUS\'; PREPARE stmt_innodb_status FROM @sys.diagnostics.sql; END IF;  IF (v_has_ps = \'YES\') THEN SET @sys.diagnostics.sql = \'SHOW ENGINE PERFORMANCE_SCHEMA STATUS\'; PREPARE stmt_ps_status FROM @sys.diagnostics.sql; END IF;  IF (v_has_ndb IN (\'DEFAULT\', \'YES\')) THEN SET @sys.diagnostics.sql = \'SHOW ENGINE NDBCLUSTER STATUS\'; PREPARE stmt_ndbcluster_status FROM @sys.diagnostics.sql; END IF;  SET @sys.diagnostics.sql_gen_query_template = \'SELECT CONCAT( \'\'SELECT \'\', GROUP_CONCAT( CASE WHEN (SUBSTRING(TABLE_NAME, 3), COLUMN_NAME) IN ( (\'\'io_global_by_file_by_bytes\'\', \'\'total\'\'), (\'\'io_global_by_wait_by_bytes\'\', \'\'total_requested\'\') ) THEN CONCAT(\'\'sys.format_bytes(\'\', COLUMN_NAME, \'\') AS \'\', COLUMN_NAME) WHEN SUBSTRING(COLUMN_NAME, -8) = \'\'_latency\'\' THEN CONCAT(\'\'sys.format_time(\'\', COLUMN_NAME, \'\') AS \'\', COLUMN_NAME) WHEN SUBSTRING(COLUMN_NAME, -7) = \'\'_memory\'\' OR SUBSTRING(COLUMN_NAME, -17) = \'\'_memory_allocated\'\' OR ((SUBSTRING(COLUMN_NAME, -5) = \'\'_read\'\' OR SUBSTRING(COLUMN_NAME, -8) = \'\'_written\'\' OR SUBSTRING(COLUMN_NAME, -6) = \'\'_write\'\') AND SUBSTRING(COLUMN_NAME, 1, 6) <> \'\'COUNT_\'\') THEN CONCAT(\'\'sys.format_bytes(\'\', COLUMN_NAME, \'\') AS \'\', COLUMN_NAME) ELSE COLUMN_NAME END ORDER BY ORDINAL_POSITION SEPARATOR \'\',\n       \'\' ), \'\'\n  FROM tmp_\'\', SUBSTRING(TABLE_NAME FROM 3), \'\'_%{OUTPUT}\'\' ) AS Query INTO @sys.diagnostics.sql_select FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = \'\'sys\'\' AND TABLE_NAME = ? GROUP BY TABLE_NAME\';  SET @sys.diagnostics.sql_gen_query_delta = \'SELECT CONCAT( \'\'SELECT \'\', GROUP_CONCAT( CASE WHEN FIND_IN_SET(COLUMN_NAME, diag.pk) THEN COLUMN_NAME WHEN diag.TABLE_NAME = \'\'io_global_by_file_by_bytes\'\' AND COLUMN_NAME = \'\'write_pct\'\' THEN CONCAT(\'\'IFNULL(ROUND(100-(((e.total_read-IFNULL(s.total_read, 0))\'\', \'\'/NULLIF(((e.total_read-IFNULL(s.total_read, 0))+(e.total_written-IFNULL(s.total_written, 0))), 0))*100), 2), 0.00) AS \'\', COLUMN_NAME) WHEN (diag.TABLE_NAME, COLUMN_NAME) IN ( (\'\'io_global_by_file_by_bytes\'\', \'\'total\'\'), (\'\'io_global_by_wait_by_bytes\'\', \'\'total_requested\'\') ) THEN CONCAT(\'\'sys.format_bytes(e.\'\', COLUMN_NAME, \'\'-IFNULL(s.\'\', COLUMN_NAME, \'\', 0)) AS \'\', COLUMN_NAME) WHEN SUBSTRING(COLUMN_NAME, 1, 4) IN (\'\'max_\'\', \'\'min_\'\') AND SUBSTRING(COLUMN_NAME, -8) = \'\'_latency\'\' THEN CONCAT(\'\'sys.format_time(e.\'\', COLUMN_NAME, \'\') AS \'\', COLUMN_NAME) WHEN COLUMN_NAME = \'\'avg_latency\'\' THEN CONCAT(\'\'sys.format_time((e.total_latency - IFNULL(s.total_latency, 0))\'\', \'\'/NULLIF(e.total - IFNULL(s.total, 0), 0)) AS \'\', COLUMN_NAME) WHEN SUBSTRING(COLUMN_NAME, -12) = \'\'_avg_latency\'\' THEN CONCAT(\'\'sys.format_time((e.\'\', SUBSTRING(COLUMN_NAME FROM 1 FOR CHAR_LENGTH(COLUMN_NAME)-12), \'\'_latency - IFNULL(s.\'\', SUBSTRING(COLUMN_NAME FROM 1 FOR CHAR_LENGTH(COLUMN_NAME)-12), \'\'_latency, 0))\'\', \'\'/NULLIF(e.\'\', SUBSTRING(COLUMN_NAME FROM 1 FOR CHAR_LENGTH(COLUMN_NAME)-12), \'\'s - IFNULL(s.\'\', SUBSTRING(COLUMN_NAME FROM 1 FOR CHAR_LENGTH(COLUMN_NAME)-12), \'\'s, 0), 0)) AS \'\', COLUMN_NAME) WHEN SUBSTRING(COLUMN_NAME, -8) = \'\'_latency\'\' THEN CONCAT(\'\'sys.format_time(e.\'\', COLUMN_NAME, \'\' - IFNULL(s.\'\', COLUMN_NAME, \'\', 0)) AS \'\', COLUMN_NAME) WHEN COLUMN_NAME IN (\'\'avg_read\'\', \'\'avg_write\'\', \'\'avg_written\'\') THEN CONCAT(\'\'sys.format_bytes(IFNULL((e.total_\'\', IF(COLUMN_NAME = \'\'avg_read\'\', \'\'read\'\', \'\'written\'\'), \'\'-IFNULL(s.total_\'\', IF(COLUMN_NAME = \'\'avg_read\'\', \'\'read\'\', \'\'written\'\'), \'\', 0))\'\', \'\'/NULLIF(e.count_\'\', IF(COLUMN_NAME = \'\'avg_read\'\', \'\'read\'\', \'\'write\'\'), \'\'-IFNULL(s.count_\'\', IF(COLUMN_NAME = \'\'avg_read\'\', \'\'read\'\', \'\'write\'\'), \'\', 0), 0), 0)) AS \'\', COLUMN_NAME) WHEN SUBSTRING(COLUMN_NAME, -7) = \'\'_memory\'\' OR SUBSTRING(COLUMN_NAME, -17) = \'\'_memory_allocated\'\' OR ((SUBSTRING(COLUMN_NAME, -5) = \'\'_read\'\' OR SUBSTRING(COLUMN_NAME, -8) = \'\'_written\'\' OR SUBSTRING(COLUMN_NAME, -6) = \'\'_write\'\') AND SUBSTRING(COLUMN_NAME, 1, 6) <> \'\'COUNT_\'\') THEN CONCAT(\'\'sys.format_bytes(e.\'\', COLUMN_NAME, \'\' - IFNULL(s.\'\', COLUMN_NAME, \'\', 0)) AS \'\', COLUMN_NAME) ELSE CONCAT(\'\'(e.\'\', COLUMN_NAME, \'\' - IFNULL(s.\'\', COLUMN_NAME, \'\', 0)) AS \'\', COLUMN_NAME) END ORDER BY ORDINAL_POSITION SEPARATOR \'\',\n       \'\' ), \'\'\n  FROM tmp_\'\', diag.TABLE_NAME, \'\'_end e LEFT OUTER JOIN tmp_\'\', diag.TABLE_NAME, \'\'_start s USING (\'\', diag.pk, \'\')\'\' ) AS Query INTO @sys.diagnostics.sql_select FROM tmp_sys_views_delta diag INNER JOIN information_schema.COLUMNS c ON c.TABLE_NAME = CONCAT(\'\'x$\'\', diag.TABLE_NAME) WHERE c.TABLE_SCHEMA = \'\'sys\'\' AND diag.TABLE_NAME = ? GROUP BY diag.TABLE_NAME\';  IF (v_has_ps = \'YES\') THEN DROP TEMPORARY TABLE IF EXISTS tmp_sys_views_delta; CREATE TEMPORARY TABLE tmp_sys_views_delta ( TABLE_NAME varchar(64) NOT NULL, order_by text COMMENT \'ORDER BY clause for the initial and overall views\', order_by_delta text COMMENT \'ORDER BY clause for the delta views\', where_delta text COMMENT \'WHERE clause to use for delta views to only include rows with a "count" > 0\', limit_rows int unsigned COMMENT \'The maximum number of rows to include for the view\', pk varchar(128) COMMENT \'Used with the FIND_IN_SET() function so use comma separated list without whitespace\', PRIMARY KEY (TABLE_NAME) );  IF (@sys.debug = \'ON\') THEN SELECT \'Populating tmp_sys_views_delta\' AS \'Debug\'; END IF; INSERT INTO tmp_sys_views_delta VALUES (\'host_summary\'                       , \'%{TABLE}.statement_latency DESC\', \'(e.statement_latency-IFNULL(s.statement_latency, 0)) DESC\', \'(e.statements - IFNULL(s.statements, 0)) > 0\', NULL, \'host\'), (\'host_summary_by_file_io\'            , \'%{TABLE}.io_latency DESC\', \'(e.io_latency-IFNULL(s.io_latency, 0)) DESC\', \'(e.ios - IFNULL(s.ios, 0)) > 0\', NULL, \'host\'), (\'host_summary_by_file_io_type\'       , \'%{TABLE}.host, %{TABLE}.total_latency DESC\', \'e.host, (e.total_latency-IFNULL(s.total_latency, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', NULL, \'host,event_name\'), (\'host_summary_by_stages\'             , \'%{TABLE}.host, %{TABLE}.total_latency DESC\', \'e.host, (e.total_latency-IFNULL(s.total_latency, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', NULL, \'host,event_name\'), (\'host_summary_by_statement_latency\'  , \'%{TABLE}.total_latency DESC\', \'(e.total_latency-IFNULL(s.total_latency, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', NULL, \'host\'), (\'host_summary_by_statement_type\'     , \'%{TABLE}.host, %{TABLE}.total_latency DESC\', \'e.host, (e.total_latency-IFNULL(s.total_latency, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', NULL, \'host,statement\'), (\'io_by_thread_by_latency\'            , \'%{TABLE}.total_latency DESC\', \'(e.total_latency-IFNULL(s.total_latency, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', NULL, \'user,thread_id,processlist_id\'), (\'io_global_by_file_by_bytes\'         , \'%{TABLE}.total DESC\', \'(e.total-IFNULL(s.total, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', 100, \'file\'), (\'io_global_by_file_by_latency\'       , \'%{TABLE}.total_latency DESC\', \'(e.total_latency-IFNULL(s.total_latency, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', 100, \'file\'), (\'io_global_by_wait_by_bytes\'         , \'%{TABLE}.total_requested DESC\', \'(e.total_requested-IFNULL(s.total_requested, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', NULL, \'event_name\'), (\'io_global_by_wait_by_latency\'       , \'%{TABLE}.total_latency DESC\', \'(e.total_latency-IFNULL(s.total_latency, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', NULL, \'event_name\'), (\'schema_index_statistics\'            , \'(%{TABLE}.select_latency+%{TABLE}.insert_latency+%{TABLE}.update_latency+%{TABLE}.delete_latency) DESC\', \'((e.select_latency+e.insert_latency+e.update_latency+e.delete_latency)-IFNULL(s.select_latency+s.insert_latency+s.update_latency+s.delete_latency, 0)) DESC\', \'((e.rows_selected+e.insert_latency+e.rows_updated+e.rows_deleted)-IFNULL(s.rows_selected+s.rows_inserted+s.rows_updated+s.rows_deleted, 0)) > 0\', 100, \'table_schema,table_name,index_name\'), (\'schema_table_statistics\'            , \'%{TABLE}.total_latency DESC\', \'(e.total_latency-IFNULL(s.total_latency, 0)) DESC\', \'(e.total_latency-IFNULL(s.total_latency, 0)) > 0\', 100, \'table_schema,table_name\'), (\'schema_tables_with_full_table_scans\', \'%{TABLE}.rows_full_scanned DESC\', \'(e.rows_full_scanned-IFNULL(s.rows_full_scanned, 0)) DESC\', \'(e.rows_full_scanned-IFNULL(s.rows_full_scanned, 0)) > 0\', 100, \'object_schema,object_name\'), (\'user_summary\'                       , \'%{TABLE}.statement_latency DESC\', \'(e.statement_latency-IFNULL(s.statement_latency, 0)) DESC\', \'(e.statements - IFNULL(s.statements, 0)) > 0\', NULL, \'user\'), (\'user_summary_by_file_io\'            , \'%{TABLE}.io_latency DESC\', \'(e.io_latency-IFNULL(s.io_latency, 0)) DESC\', \'(e.ios - IFNULL(s.ios, 0)) > 0\', NULL, \'user\'), (\'user_summary_by_file_io_type\'       , \'%{TABLE}.user, %{TABLE}.latency DESC\', \'e.user, (e.latency-IFNULL(s.latency, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', NULL, \'user,event_name\'), (\'user_summary_by_stages\'             , \'%{TABLE}.user, %{TABLE}.total_latency DESC\', \'e.user, (e.total_latency-IFNULL(s.total_latency, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', NULL, \'user,event_name\'), (\'user_summary_by_statement_latency\'  , \'%{TABLE}.total_latency DESC\', \'(e.total_latency-IFNULL(s.total_latency, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', NULL, \'user\'), (\'user_summary_by_statement_type\'     , \'%{TABLE}.user, %{TABLE}.total_latency DESC\', \'e.user, (e.total_latency-IFNULL(s.total_latency, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', NULL, \'user,statement\'), (\'wait_classes_global_by_avg_latency\' , \'IFNULL(%{TABLE}.total_latency / NULLIF(%{TABLE}.total, 0), 0) DESC\', \'IFNULL((e.total_latency-IFNULL(s.total_latency, 0)) / NULLIF((e.total - IFNULL(s.total, 0)), 0), 0) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', NULL, \'event_class\'), (\'wait_classes_global_by_latency\'     , \'%{TABLE}.total_latency DESC\', \'(e.total_latency-IFNULL(s.total_latency, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', NULL, \'event_class\'), (\'waits_by_host_by_latency\'           , \'%{TABLE}.host, %{TABLE}.total_latency DESC\', \'e.host, (e.total_latency-IFNULL(s.total_latency, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', NULL, \'host,event\'), (\'waits_by_user_by_latency\'           , \'%{TABLE}.user, %{TABLE}.total_latency DESC\', \'e.user, (e.total_latency-IFNULL(s.total_latency, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', NULL, \'user,event\'), (\'waits_global_by_latency\'            , \'%{TABLE}.total_latency DESC\', \'(e.total_latency-IFNULL(s.total_latency, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', NULL, \'events\') ; END IF;   SELECT \'  =======================  Configuration  =======================  \' AS \'\'; SELECT \'GLOBAL VARIABLES\' AS \'The following output is:\'; IF (v_has_ps_vars = \'YES\') THEN SELECT LOWER(VARIABLE_NAME) AS Variable_name, VARIABLE_VALUE AS Variable_value FROM performance_schema.global_variables ORDER BY VARIABLE_NAME; ELSE SELECT LOWER(VARIABLE_NAME) AS Variable_name, VARIABLE_VALUE AS Variable_value FROM information_schema.GLOBAL_VARIABLES ORDER BY VARIABLE_NAME; END IF;  IF (v_has_ps = \'YES\') THEN SELECT \'Performance Schema Setup - Actors\' AS \'The following output is:\'; SELECT * FROM performance_schema.setup_actors;  SELECT \'Performance Schema Setup - Consumers\' AS \'The following output is:\'; SELECT NAME AS Consumer, ENABLED, sys.ps_is_consumer_enabled(NAME) AS COLLECTS FROM performance_schema.setup_consumers;  SELECT \'Performance Schema Setup - Instruments\' AS \'The following output is:\'; SELECT SUBSTRING_INDEX(NAME, \'/\', 2) AS \'InstrumentClass\', ROUND(100*SUM(IF(ENABLED = \'YES\', 1, 0))/COUNT(*), 2) AS \'EnabledPct\', ROUND(100*SUM(IF(TIMED = \'YES\', 1, 0))/COUNT(*), 2) AS \'TimedPct\' FROM performance_schema.setup_instruments GROUP BY SUBSTRING_INDEX(NAME, \'/\', 2) ORDER BY SUBSTRING_INDEX(NAME, \'/\', 2);  SELECT \'Performance Schema Setup - Objects\' AS \'The following output is:\'; SELECT * FROM performance_schema.setup_objects;  SELECT \'Performance Schema Setup - Threads\' AS \'The following output is:\'; SELECT `TYPE` AS ThreadType, COUNT(*) AS \'Total\', ROUND(100*SUM(IF(INSTRUMENTED = \'YES\', 1, 0))/COUNT(*), 2) AS \'InstrumentedPct\' FROM performance_schema.threads GROUP BY TYPE; END IF;   IF (v_has_replication = \'NO\') THEN SELECT \'No Replication Configured\' AS \'Replication Status\'; ELSE SELECT CONCAT(\'Replication Configured: \', v_has_replication, \' - Performance Schema Replication Tables: \', v_has_ps_replication) AS \'Replication Status\';  IF (v_has_ps_replication = \'YES\') THEN SELECT \'Replication - Connection Configuration\' AS \'The following output is:\'; SELECT * FROM performance_schema.replication_connection_configuration ORDER BY CHANNEL_NAME ; END IF;  IF (v_has_ps_replication = \'YES\') THEN SELECT \'Replication - Applier Configuration\' AS \'The following output is:\'; SELECT * FROM performance_schema.replication_applier_configuration ORDER BY CHANNEL_NAME; END IF;  IF (@@master_info_repository = \'TABLE\') THEN SELECT \'Replication - Master Info Repository Configuration\' AS \'The following output is:\'; SELECT  Channel_name, Host, User_name, Port, Connect_retry, Enabled_ssl, Ssl_ca, Ssl_capath, Ssl_cert, Ssl_cipher, Ssl_key, Ssl_verify_server_cert, Heartbeat, Bind, Ignored_server_ids, Uuid, Retry_count, Ssl_crl, Ssl_crlpath, Tls_version, Enabled_auto_position FROM mysql.slave_master_info ORDER BY Channel_name ; END IF;  IF (@@relay_log_info_repository = \'TABLE\') THEN SELECT \'Replication - Relay Log Repository Configuration\' AS \'The following output is:\'; SELECT  Channel_name, Sql_delay, Number_of_workers, Id FROM mysql.slave_relay_log_info ORDER BY Channel_name ; END IF; END IF;   IF (v_has_ndb IN (\'DEFAULT\', \'YES\')) THEN SELECT \'Cluster Thread Blocks\' AS \'The following output is:\'; SELECT * FROM ndbinfo.threadblocks; END IF;  IF (v_has_ps = \'YES\') THEN IF (@sys.diagnostics.include_raw = \'ON\') THEN SELECT \'  ========================  Initial Status  ========================  \' AS \'\'; END IF;  DROP TEMPORARY TABLE IF EXISTS tmp_digests_start; CALL sys.statement_performance_analyzer(\'create_tmp\', \'tmp_digests_start\', NULL); CALL sys.statement_performance_analyzer(\'snapshot\', NULL, NULL); CALL sys.statement_performance_analyzer(\'save\', \'tmp_digests_start\', NULL);  IF (@sys.diagnostics.include_raw = \'ON\') THEN SET @sys.diagnostics.sql = REPLACE(@sys.diagnostics.sql_gen_query_template, \'%{OUTPUT}\', \'start\'); IF (@sys.debug = \'ON\') THEN SELECT \'The following query will be used to generate the query for each sys view\' AS \'Debug\'; SELECT @sys.diagnostics.sql AS \'Debug\'; END IF; PREPARE stmt_gen_query FROM @sys.diagnostics.sql; END IF; SET v_done = FALSE; OPEN c_sysviews_w_delta; c_sysviews_w_delta_loop: LOOP FETCH c_sysviews_w_delta INTO v_table_name; IF v_done THEN LEAVE c_sysviews_w_delta_loop; END IF;  IF (@sys.debug = \'ON\') THEN SELECT CONCAT(\'The following queries are for storing the initial content of \', v_table_name) AS \'Debug\'; END IF;  CALL sys.execute_prepared_stmt(CONCAT(\'DROP TEMPORARY TABLE IF EXISTS `tmp_\', v_table_name, \'_start`\')); CALL sys.execute_prepared_stmt(CONCAT(\'CREATE TEMPORARY TABLE `tmp_\', v_table_name, \'_start` SELECT * FROM `sys`.`x$\', v_table_name, \'`\'));  IF (@sys.diagnostics.include_raw = \'ON\') THEN SET @sys.diagnostics.table_name = CONCAT(\'x$\', v_table_name); EXECUTE stmt_gen_query USING @sys.diagnostics.table_name; SELECT CONCAT(@sys.diagnostics.sql_select, IF(order_by IS NOT NULL, CONCAT(\'\n ORDER BY \', REPLACE(order_by, \'%{TABLE}\', CONCAT(\'tmp_\', v_table_name, \'_start\'))), \'\'), IF(limit_rows IS NOT NULL, CONCAT(\'\n LIMIT \', limit_rows), \'\') ) INTO @sys.diagnostics.sql_select FROM tmp_sys_views_delta WHERE TABLE_NAME = v_table_name; SELECT CONCAT(\'Initial \', v_table_name) AS \'The following output is:\'; CALL sys.execute_prepared_stmt(@sys.diagnostics.sql_select); END IF; END LOOP; CLOSE c_sysviews_w_delta;  IF (@sys.diagnostics.include_raw = \'ON\') THEN DEALLOCATE PREPARE stmt_gen_query; END IF; END IF;  SET v_sql_status_summary_select = \'SELECT Variable_name\', v_sql_status_summary_delta  = \'\', v_sql_status_summary_from   = \'\';  REPEAT  SET v_output_count = v_output_count + 1; IF (v_output_count > 1) THEN SET v_sleep = in_interval-(UNIX_TIMESTAMP(NOW(2))-v_iter_start); SELECT NOW() AS \'Time\', CONCAT(\'Going to sleep for \', v_sleep, \' seconds. Please do not interrupt\') AS \'The following output is:\'; DO SLEEP(in_interval); END IF; SET v_iter_start = UNIX_TIMESTAMP(NOW(2));  SELECT NOW(), CONCAT(\'Iteration Number \', IFNULL(v_output_count, \'NULL\')) AS \'The following output is:\';  IF (@@log_bin = 1) THEN SELECT \'SHOW MASTER STATUS\' AS \'The following output is:\'; SHOW MASTER STATUS; END IF;  IF (v_has_replication <> \'NO\') THEN SELECT \'SHOW SLAVE STATUS\' AS \'The following output is:\'; SHOW SLAVE STATUS;  IF (v_has_ps_replication = \'YES\') THEN SELECT \'Replication Connection Status\' AS \'The following output is:\'; SELECT * FROM performance_schema.replication_connection_status;  SELECT \'Replication Applier Status\' AS \'The following output is:\'; SELECT * FROM performance_schema.replication_applier_status ORDER BY CHANNEL_NAME;  SELECT \'Replication Applier Status - Coordinator\' AS \'The following output is:\'; SELECT * FROM performance_schema.replication_applier_status_by_coordinator ORDER BY CHANNEL_NAME;  SELECT \'Replication Applier Status - Worker\' AS \'The following output is:\'; SELECT * FROM performance_schema.replication_applier_status_by_worker ORDER BY CHANNEL_NAME, WORKER_ID; END IF;  IF (@@master_info_repository = \'TABLE\') THEN SELECT \'Replication - Master Log Status\' AS \'The following output is:\'; SELECT Master_log_name, Master_log_pos FROM mysql.slave_master_info; END IF;  IF (@@relay_log_info_repository = \'TABLE\') THEN SELECT \'Replication - Relay Log Status\' AS \'The following output is:\'; SELECT sys.format_path(Relay_log_name) AS Relay_log_name, Relay_log_pos, Master_log_name, Master_log_pos FROM mysql.slave_relay_log_info;  SELECT \'Replication - Worker Status\' AS \'The following output is:\'; SELECT Id, sys.format_path(Relay_log_name) AS Relay_log_name, Relay_log_pos, Master_log_name, Master_log_pos, sys.format_path(Checkpoint_relay_log_name) AS Checkpoint_relay_log_name, Checkpoint_relay_log_pos, Checkpoint_master_log_name, Checkpoint_master_log_pos, Checkpoint_seqno, Checkpoint_group_size, HEX(Checkpoint_group_bitmap) AS Checkpoint_group_bitmap , Channel_name FROM mysql.slave_worker_info ORDER BY  Channel_name, Id; END IF; END IF;  SET v_table_name = CONCAT(\'tmp_metrics_\', v_output_count); CALL sys.execute_prepared_stmt(CONCAT(\'DROP TEMPORARY TABLE IF EXISTS \', v_table_name));  CALL sys.execute_prepared_stmt(CONCAT(\'CREATE TEMPORARY TABLE \', v_table_name, \' ( Variable_name VARCHAR(193) NOT NULL, Variable_value VARCHAR(1024), Type VARCHAR(225) NOT NULL, Enabled ENUM(\'\'YES\'\', \'\'NO\'\', \'\'PARTIAL\'\') NOT NULL, PRIMARY KEY (Type, Variable_name) ) ENGINE = InnoDB DEFAULT CHARSET=utf8\'));  IF (v_has_metrics) THEN SET @sys.diagnostics.sql = CONCAT( \'INSERT INTO \', v_table_name, \' SELECT Variable_name, REPLACE(Variable_value, \'\'\n\'\', \'\'\\\\n\'\') AS Variable_value, Type, Enabled FROM sys.metrics\' ); ELSE SET @sys.diagnostics.sql = CONCAT( \'INSERT INTO \', v_table_name, \'(SELECT LOWER(VARIABLE_NAME) AS Variable_name, REPLACE(VARIABLE_VALUE, \'\'\n\'\', \'\'\\\\n\'\') AS Variable_value, \'\'Global Status\'\' AS Type, \'\'YES\'\' AS Enabled FROM performance_schema.global_status ) UNION ALL ( SELECT NAME AS Variable_name, COUNT AS Variable_value, CONCAT(\'\'InnoDB Metrics - \'\', SUBSYSTEM) AS Type, IF(STATUS = \'\'enabled\'\', \'\'YES\'\', \'\'NO\'\') AS Enabled FROM information_schema.INNODB_METRICS WHERE NAME NOT IN ( \'\'lock_row_lock_time\'\', \'\'lock_row_lock_time_avg\'\', \'\'lock_row_lock_time_max\'\', \'\'lock_row_lock_waits\'\', \'\'buffer_pool_reads\'\', \'\'buffer_pool_read_requests\'\', \'\'buffer_pool_write_requests\'\', \'\'buffer_pool_wait_free\'\', \'\'buffer_pool_read_ahead\'\', \'\'buffer_pool_read_ahead_evicted\'\', \'\'buffer_pool_pages_total\'\', \'\'buffer_pool_pages_misc\'\', \'\'buffer_pool_pages_data\'\', \'\'buffer_pool_bytes_data\'\', \'\'buffer_pool_pages_dirty\'\', \'\'buffer_pool_bytes_dirty\'\', \'\'buffer_pool_pages_free\'\', \'\'buffer_pages_created\'\', \'\'buffer_pages_written\'\', \'\'buffer_pages_read\'\', \'\'buffer_data_reads\'\', \'\'buffer_data_written\'\', \'\'file_num_open_files\'\', \'\'os_log_bytes_written\'\', \'\'os_log_fsyncs\'\', \'\'os_log_pending_fsyncs\'\', \'\'os_log_pending_writes\'\', \'\'log_waits\'\', \'\'log_write_requests\'\', \'\'log_writes\'\', \'\'innodb_dblwr_writes\'\', \'\'innodb_dblwr_pages_written\'\', \'\'innodb_page_size\'\') ) UNION ALL ( SELECT \'\'NOW()\'\' AS Variable_name, NOW(3) AS Variable_value, \'\'System Time\'\' AS Type, \'\'YES\'\' AS Enabled ) UNION ALL ( SELECT \'\'UNIX_TIMESTAMP()\'\' AS Variable_name, ROUND(UNIX_TIMESTAMP(NOW(3)), 3) AS Variable_value, \'\'System Time\'\' AS Type, \'\'YES\'\' AS Enabled ) ORDER BY Type, Variable_name;\' ); END IF; CALL sys.execute_prepared_stmt(@sys.diagnostics.sql);  CALL sys.execute_prepared_stmt( CONCAT(\'(SELECT Variable_value INTO @sys.diagnostics.output_time FROM \', v_table_name, \' WHERE Type = \'\'System Time\'\' AND Variable_name = \'\'UNIX_TIMESTAMP()\'\')\') ); SET v_output_time = @sys.diagnostics.output_time;  SET v_sql_status_summary_select = CONCAT(v_sql_status_summary_select, \', CONCAT( LEFT(s\', v_output_count, \'.Variable_value, \', v_status_summary_width, \'), IF(\', REPLACE(v_no_delta_names, \'%{COUNT}\', v_output_count), \' AND s\', v_output_count, \'.Variable_value REGEXP \'\'^[0-9]+(\\\\.[0-9]+)?$\'\', CONCAT(\'\' (\'\', ROUND(s\', v_output_count, \'.Variable_value/\', v_output_time, \', 2), \'\'/sec)\'\'), \'\'\'\') ) AS \'\'Output \', v_output_count, \'\'\'\'), v_sql_status_summary_from   = CONCAT(v_sql_status_summary_from, \' \', IF(v_output_count = 1, \'  FROM \', \'       INNER JOIN \'), v_table_name, \' s\', v_output_count, IF (v_output_count = 1, \'\', \' USING (Type, Variable_name)\')); IF (v_output_count > 1) THEN SET v_sql_status_summary_delta  = CONCAT(v_sql_status_summary_delta, \', IF(\', REPLACE(v_no_delta_names, \'%{COUNT}\', v_output_count), \' AND s\', (v_output_count-1), \'.Variable_value REGEXP \'\'^[0-9]+(\\\\.[0-9]+)?$\'\' AND s\', v_output_count, \'.Variable_value REGEXP \'\'^[0-9]+(\\\\.[0-9]+)?$\'\', CONCAT(IF(s\', (v_output_count-1), \'.Variable_value REGEXP \'\'^[0-9]+\\\\.[0-9]+$\'\' OR s\', v_output_count, \'.Variable_value REGEXP \'\'^[0-9]+\\\\.[0-9]+$\'\', ROUND((s\', v_output_count, \'.Variable_value-s\', (v_output_count-1), \'.Variable_value), 2), (s\', v_output_count, \'.Variable_value-s\', (v_output_count-1), \'.Variable_value) ), \'\' (\'\', ROUND((s\', v_output_count, \'.Variable_value-s\', (v_output_count-1), \'.Variable_value)/(\', v_output_time, \'-\', v_output_time_prev, \'), 2), \'\'/sec)\'\' ), \'\'\'\' ) AS \'\'Delta (\', (v_output_count-1), \' -> \', v_output_count, \')\'\'\'); END IF;  SET v_output_time_prev = v_output_time;  IF (@sys.diagnostics.include_raw = \'ON\') THEN IF (v_has_metrics) THEN SELECT \'SELECT * FROM sys.metrics\' AS \'The following output is:\'; ELSE SELECT \'sys.metrics equivalent\' AS \'The following output is:\'; END IF; CALL sys.execute_prepared_stmt(CONCAT(\'SELECT Type, Variable_name, Enabled, Variable_value FROM \', v_table_name, \' ORDER BY Type, Variable_name\')); END IF;  IF (v_has_innodb IN (\'DEFAULT\', \'YES\')) THEN SELECT \'SHOW ENGINE INNODB STATUS\' AS \'The following output is:\'; EXECUTE stmt_innodb_status; SELECT \'InnoDB - Transactions\' AS \'The following output is:\'; SELECT * FROM information_schema.INNODB_TRX; END IF;  IF (v_has_ndb IN (\'DEFAULT\', \'YES\')) THEN SELECT \'SHOW ENGINE NDBCLUSTER STATUS\' AS \'The following output is:\'; EXECUTE stmt_ndbcluster_status;  SELECT \'ndbinfo.memoryusage\' AS \'The following output is:\'; SELECT node_id, memory_type, sys.format_bytes(used) AS used, used_pages, sys.format_bytes(total) AS total, total_pages, ROUND(100*(used/total), 2) AS \'Used %\' FROM ndbinfo.memoryusage;  SET v_done = FALSE; OPEN c_ndbinfo; c_ndbinfo_loop: LOOP FETCH c_ndbinfo INTO v_table_name; IF v_done THEN LEAVE c_ndbinfo_loop; END IF;  SELECT CONCAT(\'SELECT * FROM ndbinfo.\', v_table_name) AS \'The following output is:\'; CALL sys.execute_prepared_stmt(CONCAT(\'SELECT * FROM `ndbinfo`.`\', v_table_name, \'`\')); END LOOP; CLOSE c_ndbinfo;  SELECT * FROM information_schema.FILES; END IF;  SELECT \'SELECT * FROM sys.processlist\' AS \'The following output is:\'; SELECT processlist.* FROM sys.processlist;  IF (v_has_ps = \'YES\') THEN IF (sys.ps_is_consumer_enabled(\'events_waits_history_long\') = \'YES\') THEN SELECT \'SELECT * FROM sys.latest_file_io\' AS \'The following output is:\'; SELECT * FROM sys.latest_file_io; END IF;  IF (EXISTS(SELECT 1 FROM performance_schema.setup_instruments WHERE NAME LIKE \'memory/%\' AND ENABLED = \'YES\')) THEN SELECT \'SELECT * FROM sys.memory_by_host_by_current_bytes\' AS \'The following output is:\'; SELECT * FROM sys.memory_by_host_by_current_bytes;  SELECT \'SELECT * FROM sys.memory_by_thread_by_current_bytes\' AS \'The following output is:\'; SELECT * FROM sys.memory_by_thread_by_current_bytes;  SELECT \'SELECT * FROM sys.memory_by_user_by_current_bytes\' AS \'The following output is:\'; SELECT * FROM sys.memory_by_user_by_current_bytes;  SELECT \'SELECT * FROM sys.memory_global_by_current_bytes\' AS \'The following output is:\'; SELECT * FROM sys.memory_global_by_current_bytes; END IF; END IF;  SET v_runtime = (UNIX_TIMESTAMP(NOW(2)) - v_start); UNTIL (v_runtime + in_interval >= in_max_runtime) END REPEAT;  IF (v_has_ps = \'YES\') THEN SELECT \'SHOW ENGINE PERFORMANCE_SCHEMA STATUS\' AS \'The following output is:\'; EXECUTE stmt_ps_status; END IF;  IF (v_has_innodb IN (\'DEFAULT\', \'YES\')) THEN DEALLOCATE PREPARE stmt_innodb_status; END IF; IF (v_has_ps = \'YES\') THEN DEALLOCATE PREPARE stmt_ps_status; END IF; IF (v_has_ndb IN (\'DEFAULT\', \'YES\')) THEN DEALLOCATE PREPARE stmt_ndbcluster_status; END IF;   SELECT \'  ============================  Schema Information  ============================  \' AS \'\';  SELECT COUNT(*) AS \'Total Number of Tables\' FROM information_schema.TABLES;  IF (@sys.diagnostics.allow_i_s_tables = \'ON\') THEN SELECT \'Storage Engine Usage\' AS \'The following output is:\'; SELECT ENGINE, COUNT(*) AS NUM_TABLES, sys.format_bytes(SUM(DATA_LENGTH)) AS DATA_LENGTH, sys.format_bytes(SUM(INDEX_LENGTH)) AS INDEX_LENGTH, sys.format_bytes(SUM(DATA_LENGTH+INDEX_LENGTH)) AS TOTAL FROM information_schema.TABLES GROUP BY ENGINE;  SELECT \'Schema Object Overview\' AS \'The following output is:\'; SELECT * FROM sys.schema_object_overview;  SELECT \'Tables without a PRIMARY KEY\' AS \'The following output is:\'; SELECT TABLES.TABLE_SCHEMA, ENGINE, COUNT(*) AS NumTables FROM information_schema.TABLES LEFT OUTER JOIN information_schema.STATISTICS ON STATISTICS.TABLE_SCHEMA = TABLES.TABLE_SCHEMA AND STATISTICS.TABLE_NAME = TABLES.TABLE_NAME AND STATISTICS.INDEX_NAME = \'PRIMARY\' WHERE STATISTICS.TABLE_NAME IS NULL AND TABLES.TABLE_SCHEMA NOT IN (\'mysql\', \'information_schema\', \'performance_schema\', \'sys\') AND TABLES.TABLE_TYPE = \'BASE TABLE\' GROUP BY TABLES.TABLE_SCHEMA, ENGINE; END IF;  IF (v_has_ps = \'YES\') THEN SELECT \'Unused Indexes\' AS \'The following output is:\'; SELECT object_schema, COUNT(*) AS NumUnusedIndexes FROM performance_schema.table_io_waits_summary_by_index_usage  WHERE index_name IS NOT NULL AND count_star = 0 AND object_schema NOT IN (\'mysql\', \'sys\') AND index_name != \'PRIMARY\' GROUP BY object_schema; END IF;  IF (v_has_ps = \'YES\') THEN SELECT \'  =========================  Overall Status  =========================  \' AS \'\';  SELECT \'CALL sys.ps_statement_avg_latency_histogram()\' AS \'The following output is:\'; CALL sys.ps_statement_avg_latency_histogram();  CALL sys.statement_performance_analyzer(\'snapshot\', NULL, NULL); CALL sys.statement_performance_analyzer(\'overall\', NULL, \'with_runtimes_in_95th_percentile\');  SET @sys.diagnostics.sql = REPLACE(@sys.diagnostics.sql_gen_query_template, \'%{OUTPUT}\', \'end\'); IF (@sys.debug = \'ON\') THEN SELECT \'The following query will be used to generate the query for each sys view\' AS \'Debug\'; SELECT @sys.diagnostics.sql AS \'Debug\'; END IF; PREPARE stmt_gen_query FROM @sys.diagnostics.sql;  SET v_done = FALSE; OPEN c_sysviews_w_delta; c_sysviews_w_delta_loop: LOOP FETCH c_sysviews_w_delta INTO v_table_name; IF v_done THEN LEAVE c_sysviews_w_delta_loop; END IF;  IF (@sys.debug = \'ON\') THEN SELECT CONCAT(\'The following queries are for storing the final content of \', v_table_name) AS \'Debug\'; END IF;  CALL sys.execute_prepared_stmt(CONCAT(\'DROP TEMPORARY TABLE IF EXISTS `tmp_\', v_table_name, \'_end`\')); CALL sys.execute_prepared_stmt(CONCAT(\'CREATE TEMPORARY TABLE `tmp_\', v_table_name, \'_end` SELECT * FROM `sys`.`x$\', v_table_name, \'`\'));  IF (@sys.diagnostics.include_raw = \'ON\') THEN SET @sys.diagnostics.table_name = CONCAT(\'x$\', v_table_name); EXECUTE stmt_gen_query USING @sys.diagnostics.table_name; SELECT CONCAT(@sys.diagnostics.sql_select, IF(order_by IS NOT NULL, CONCAT(\'\n ORDER BY \', REPLACE(order_by, \'%{TABLE}\', CONCAT(\'tmp_\', v_table_name, \'_end\'))), \'\'), IF(limit_rows IS NOT NULL, CONCAT(\'\n LIMIT \', limit_rows), \'\') ) INTO @sys.diagnostics.sql_select FROM tmp_sys_views_delta WHERE TABLE_NAME = v_table_name; SELECT CONCAT(\'Overall \', v_table_name) AS \'The following output is:\'; CALL sys.execute_prepared_stmt(@sys.diagnostics.sql_select); END IF; END LOOP; CLOSE c_sysviews_w_delta;  DEALLOCATE PREPARE stmt_gen_query;   SELECT \'  ======================  Delta Status  ======================  \' AS \'\';  CALL sys.statement_performance_analyzer(\'delta\', \'tmp_digests_start\', \'with_runtimes_in_95th_percentile\'); CALL sys.statement_performance_analyzer(\'cleanup\', NULL, NULL);  DROP TEMPORARY TABLE tmp_digests_start;  IF (@sys.debug = \'ON\') THEN SELECT \'The following query will be used to generate the query for each sys view delta\' AS \'Debug\'; SELECT @sys.diagnostics.sql_gen_query_delta AS \'Debug\'; END IF; PREPARE stmt_gen_query_delta FROM @sys.diagnostics.sql_gen_query_delta;  SET v_old_group_concat_max_len = @@session.group_concat_max_len; SET @@session.group_concat_max_len = 2048; SET v_done = FALSE; OPEN c_sysviews_w_delta; c_sysviews_w_delta_loop: LOOP FETCH c_sysviews_w_delta INTO v_table_name; IF v_done THEN LEAVE c_sysviews_w_delta_loop; END IF;  SET @sys.diagnostics.table_name = v_table_name; EXECUTE stmt_gen_query_delta USING @sys.diagnostics.table_name; SELECT CONCAT(@sys.diagnostics.sql_select, IF(where_delta IS NOT NULL, CONCAT(\'\n WHERE \', where_delta), \'\'), IF(order_by_delta IS NOT NULL, CONCAT(\'\n ORDER BY \', order_by_delta), \'\'), IF(limit_rows IS NOT NULL, CONCAT(\'\n LIMIT \', limit_rows), \'\') ) INTO @sys.diagnostics.sql_select FROM tmp_sys_views_delta WHERE TABLE_NAME = v_table_name;  SELECT CONCAT(\'Delta \', v_table_name) AS \'The following output is:\'; CALL sys.execute_prepared_stmt(@sys.diagnostics.sql_select);  CALL sys.execute_prepared_stmt(CONCAT(\'DROP TEMPORARY TABLE `tmp_\', v_table_name, \'_end`\')); CALL sys.execute_prepared_stmt(CONCAT(\'DROP TEMPORARY TABLE `tmp_\', v_table_name, \'_start`\')); END LOOP; CLOSE c_sysviews_w_delta; SET @@session.group_concat_max_len = v_old_group_concat_max_len;  DEALLOCATE PREPARE stmt_gen_query_delta; DROP TEMPORARY TABLE tmp_sys_views_delta; END IF;  IF (v_has_metrics) THEN SELECT \'SELECT * FROM sys.metrics\' AS \'The following output is:\'; ELSE SELECT \'sys.metrics equivalent\' AS \'The following output is:\'; END IF; CALL sys.execute_prepared_stmt( CONCAT(v_sql_status_summary_select, v_sql_status_summary_delta, \', Type, s1.Enabled\', v_sql_status_summary_from, \' ORDER BY Type, Variable_name\' ) );  SET v_count = 0; WHILE (v_count < v_output_count) DO SET v_count = v_count + 1; SET v_table_name = CONCAT(\'tmp_metrics_\', v_count); CALL sys.execute_prepared_stmt(CONCAT(\'DROP TEMPORARY TABLE IF EXISTS \', v_table_name)); END WHILE;  IF (in_auto_config <> \'current\') THEN CALL sys.ps_setup_reload_saved(); SET sql_log_bin = @log_bin; END IF;  SET @sys.diagnostics.output_time            = NULL, @sys.diagnostics.sql                    = NULL, @sys.diagnostics.sql_gen_query_delta    = NULL, @sys.diagnostics.sql_gen_query_template = NULL, @sys.diagnostics.sql_select             = NULL, @sys.diagnostics.table_name             = NULL;  IF (v_this_thread_enabled = \'YES\') THEN CALL sys.ps_setup_enable_thread(CONNECTION_ID()); END IF;  IF (@log_bin = 1) THEN SET sql_log_bin = @log_bin; END IF; END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Create a report of the current status of the server for diagnostics purposes. Data collected includes (some items depends on versions and settings):
 
 * The GLOBAL VARIABLES
 * Several sys schema views including metrics or equivalent (depending on version and settings)
 * Queries in the 95th percentile
 * Several ndbinfo views for MySQL Cluster
 * Replication (both master and slave) information.
 
 Some of the sys schema views are calculated as initial (optional), overall, delta:
 
 * The initial view is the content of the view at the start of this procedure.
 This output will be the same as the the start values used for the delta view.
 The initial view is included if @sys.diagnostics.include_raw = \'ON\'.
 * The overall view is the content of the view at the end of this procedure.
 This output is the same as the end values used for the delta view.
 The overall view is always included.
 * The delta view is the difference from the beginning to the end. Note that for min and max values
 they are simply the min or max value from the end view respectively, so does not necessarily reflect
 the minimum/maximum value in the monitored period.
 Note: except for the metrics views the delta is only calculation between the first and last outputs.
 
 Requires the SUPER privilege for "SET sql_log_bin = 0;".
 
 Versions supported:
 * MySQL 5.6: 5.6.10 and later
 * MySQL 5.7: 5.7.9 and later
 
 Parameters
 
 in_max_runtime (INT UNSIGNED):
 The maximum time to keep collecting data.
 Use NULL to get the default which is 60 seconds, otherwise enter a value greater than 0.
 in_interval (INT UNSIGNED):
 How long to sleep between data collections.
 Use NULL to get the default which is 30 seconds, otherwise enter a value greater than 0.
 in_auto_config (ENUM(\'current\', \'medium\', \'full\'))
 Automatically enable Performance Schema instruments and consumers.
 NOTE: The more that are enabled, the more impact on the performance.
 Supported values are:
 * current - use the current settings.
 * medium - enable some settings.
 * full - enables all settings. This will have a big impact on the
 performance - be careful using this option.
 If another setting the \'current\' is chosen, the current settings
 are restored at the end of the procedure.
 
 
 Configuration Options
 
 sys.diagnostics.allow_i_s_tables
 Specifies whether it is allowed to do table scan queries on information_schema.TABLES. This can be expensive if there
 are many tables. Set to \'ON\' to allow, \'OFF\' to not allow.
 Default is \'OFF\'.
 
 sys.diagnostics.include_raw
 Set to \'ON\' to include the raw data (e.g. the original output of "SELECT * FROM sys.metrics").
 Use this to get the initial values of the various views.
 Default is \'OFF\'.
 
 sys.statement_truncate_len
 How much of queries in the process list output to include.
 Default is 64.
 
 sys.debug
 Whether to provide debugging output.
 Default is \'OFF\'. Set to \'ON\' to include.
 
 
 Example
 
 To create a report and append it to the file diag.out:
 
 mysql> TEE diag.out;
 mysql> CALL sys.diagnostics(120, 30, \'current\');
 ...
 mysql> NOTEE;
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN DECLARE v_start, v_runtime, v_iter_start, v_sleep DECIMAL(20,2) DEFAULT 0.0; DECLARE v_has_innodb, v_has_ndb, v_has_ps, v_has_replication, v_has_ps_replication VARCHAR(8) CHARSET utf8 DEFAULT \'NO\'; DECLARE v_this_thread_enabled, v_has_ps_vars, v_has_metrics ENUM(\'YES\', \'NO\'); DECLARE v_table_name, v_banner VARCHAR(64) CHARSET utf8; DECLARE v_sql_status_summary_select, v_sql_status_summary_delta, v_sql_status_summary_from, v_no_delta_names TEXT; DECLARE v_output_time, v_output_time_prev DECIMAL(20,3) UNSIGNED; DECLARE v_output_count, v_count, v_old_group_concat_max_len INT UNSIGNED DEFAULT 0; DECLARE v_status_summary_width TINYINT UNSIGNED DEFAULT 50; DECLARE v_done BOOLEAN DEFAULT FALSE; DECLARE c_ndbinfo CURSOR FOR SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_SCHEMA = \'ndbinfo\' AND TABLE_NAME NOT IN ( \'blocks\', \'config_params\', \'dict_obj_types\', \'disk_write_speed_base\', \'memory_per_fragment\', \'memoryusage\', \'operations_per_fragment\', \'threadblocks\' ); DECLARE c_sysviews_w_delta CURSOR FOR SELECT table_name FROM tmp_sys_views_delta ORDER BY table_name;  DECLARE CONTINUE HANDLER FOR NOT FOUND SET v_done = TRUE;  SELECT INSTRUMENTED INTO v_this_thread_enabled FROM performance_schema.threads WHERE PROCESSLIST_ID = CONNECTION_ID(); IF (v_this_thread_enabled = \'YES\') THEN CALL sys.ps_setup_disable_thread(CONNECTION_ID()); END IF;  IF (in_max_runtime < in_interval) THEN SIGNAL SQLSTATE \'45000\' SET MESSAGE_TEXT = \'in_max_runtime must be greater than or equal to in_interval\'; END IF; IF (in_max_runtime = 0) THEN SIGNAL SQLSTATE \'45000\' SET MESSAGE_TEXT = \'in_max_runtime must be greater than 0\'; END IF; IF (in_interval = 0) THEN SIGNAL SQLSTATE \'45000\' SET MESSAGE_TEXT = \'in_interval must be greater than 0\'; END IF;  IF (@sys.diagnostics.allow_i_s_tables IS NULL) THEN SET @sys.diagnostics.allow_i_s_tables = sys.sys_get_config(\'diagnostics.allow_i_s_tables\', \'OFF\'); END IF; IF (@sys.diagnostics.include_raw IS NULL) THEN SET @sys.diagnostics.include_raw      = sys.sys_get_config(\'diagnostics.include_raw\'     , \'OFF\'); END IF; IF (@sys.debug IS NULL) THEN SET @sys.debug                        = sys.sys_get_config(\'debug\'                       , \'OFF\'); END IF; IF (@sys.statement_truncate_len IS NULL) THEN SET @sys.statement_truncate_len       = sys.sys_get_config(\'statement_truncate_len\'      , \'64\' ); END IF;  SET @log_bin := @@sql_log_bin; IF (@log_bin = 1) THEN SET sql_log_bin = 0; END IF;  SET v_no_delta_names = CONCAT(\'s%{COUNT}.Variable_name NOT IN (\', \'\'innodb_buffer_pool_pages_total\', \', \'\'innodb_page_size\', \', \'\'last_query_cost\', \', \'\'last_query_partial_plans\', \', \'\'qcache_total_blocks\', \', \'\'slave_last_heartbeat\', \', \'\'ssl_ctx_verify_depth\', \', \'\'ssl_ctx_verify_mode\', \', \'\'ssl_session_cache_size\', \', \'\'ssl_verify_depth\', \', \'\'ssl_verify_mode\', \', \'\'ssl_version\', \', \'\'buffer_flush_lsn_avg_rate\', \', \'\'buffer_flush_pct_for_dirty\', \', \'\'buffer_flush_pct_for_lsn\', \', \'\'buffer_pool_pages_total\', \', \'\'lock_row_lock_time_avg\', \', \'\'lock_row_lock_time_max\', \', \'\'innodb_page_size\'\', \')\');  IF (in_auto_config <> \'current\') THEN IF (@sys.debug = \'ON\') THEN SELECT CONCAT(\'Updating Performance Schema configuration to \', in_auto_config) AS \'Debug\'; END IF; CALL sys.ps_setup_save(0);  IF (in_auto_config = \'medium\') THEN UPDATE performance_schema.setup_consumers SET ENABLED = \'YES\' WHERE NAME NOT LIKE \'%\_history%\';  UPDATE performance_schema.setup_instruments SET ENABLED = \'YES\', TIMED   = \'YES\' WHERE NAME NOT LIKE \'wait/synch/%\'; ELSEIF (in_auto_config = \'full\') THEN UPDATE performance_schema.setup_consumers SET ENABLED = \'YES\';  UPDATE performance_schema.setup_instruments SET ENABLED = \'YES\', TIMED   = \'YES\'; END IF;  UPDATE performance_schema.threads SET INSTRUMENTED = \'YES\' WHERE PROCESSLIST_ID <> CONNECTION_ID(); END IF;  SET v_start        = UNIX_TIMESTAMP(NOW(2)), in_interval    = IFNULL(in_interval, 30), in_max_runtime = IFNULL(in_max_runtime, 60);  SET v_banner = REPEAT( \'-\', LEAST( GREATEST( 36, CHAR_LENGTH(VERSION()), CHAR_LENGTH(@@global.version_comment), CHAR_LENGTH(@@global.version_compile_os), CHAR_LENGTH(@@global.version_compile_machine), CHAR_LENGTH(@@global.socket), CHAR_LENGTH(@@global.datadir) ), 64 ) ); SELECT \'Hostname\' AS \'Name\', @@global.hostname AS \'Value\' UNION ALL SELECT \'Port\' AS \'Name\', @@global.port AS \'Value\' UNION ALL SELECT \'Socket\' AS \'Name\', @@global.socket AS \'Value\' UNION ALL SELECT \'Datadir\' AS \'Name\', @@global.datadir AS \'Value\' UNION ALL SELECT \'Server UUID\' AS \'Name\', @@global.server_uuid AS \'Value\' UNION ALL SELECT REPEAT(\'-\', 23) AS \'Name\', v_banner AS \'Value\' UNION ALL SELECT \'MySQL Version\' AS \'Name\', VERSION() AS \'Value\' UNION ALL SELECT \'Sys Schema Version\' AS \'Name\', (SELECT sys_version FROM sys.version) AS \'Value\' UNION ALL SELECT \'Version Comment\' AS \'Name\', @@global.version_comment AS \'Value\' UNION ALL SELECT \'Version Compile OS\' AS \'Name\', @@global.version_compile_os AS \'Value\' UNION ALL SELECT \'Version Compile Machine\' AS \'Name\', @@global.version_compile_machine AS \'Value\' UNION ALL SELECT REPEAT(\'-\', 23) AS \'Name\', v_banner AS \'Value\' UNION ALL SELECT \'UTC Time\' AS \'Name\', UTC_TIMESTAMP() AS \'Value\' UNION ALL SELECT \'Local Time\' AS \'Name\', NOW() AS \'Value\' UNION ALL SELECT \'Time Zone\' AS \'Name\', @@global.time_zone AS \'Value\' UNION ALL SELECT \'System Time Zone\' AS \'Name\', @@global.system_time_zone AS \'Value\' UNION ALL SELECT \'Time Zone Offset\' AS \'Name\', TIMEDIFF(NOW(), UTC_TIMESTAMP()) AS \'Value\';  SET v_has_innodb         = IFNULL((SELECT SUPPORT FROM information_schema.ENGINES WHERE ENGINE = \'InnoDB\'), \'NO\'), v_has_ndb            = IFNULL((SELECT SUPPORT FROM information_schema.ENGINES WHERE ENGINE = \'NDBCluster\'), \'NO\'), v_has_ps             = IFNULL((SELECT SUPPORT FROM information_schema.ENGINES WHERE ENGINE = \'PERFORMANCE_SCHEMA\'), \'NO\'), v_has_ps_replication = IF(v_has_ps = \'YES\' AND EXISTS(SELECT 1 FROM information_schema.TABLES WHERE TABLE_SCHEMA = \'performance_schema\' AND TABLE_NAME = \'replication_applier_status\'), \'YES\', \'NO\' ), v_has_replication    =  IF(v_has_ps_replication = \'YES\', IF((SELECT COUNT(*) FROM performance_schema.replication_connection_status) > 0, \'YES\', \'NO\'), IF(@@master_info_repository = \'TABLE\', IF((SELECT COUNT(*) FROM mysql.slave_master_info) > 0, \'YES\', \'NO\'), IF(@@relay_log_info_repository = \'TABLE\', IF((SELECT COUNT(*) FROM mysql.slave_relay_log_info) > 0, \'YES\', \'NO\'), \'MAYBE\')) ) , v_has_metrics        = IF(v_has_ps = \'YES\' OR (sys.version_major() = 5 AND sys.version_minor() = 6), \'YES\', \'NO\'), v_has_ps_vars        = \'NO\';   SET v_has_ps_vars = IF(@@global.show_compatibility_56, \'NO\', \'YES\');  SET v_has_ps_vars = \'YES\';  IF (@sys.debug = \'ON\') THEN SELECT v_has_innodb AS \'Has_InnoDB\', v_has_ndb AS \'Has_NDBCluster\', v_has_ps AS \'Has_Performance_Schema\', v_has_ps_vars AS \'Has_P_S_SHOW_Variables\', v_has_metrics AS \'Has_metrics\', v_has_ps_replication \'AS Has_P_S_Replication\', v_has_replication AS \'Has_Replication\'; END IF;  IF (v_has_innodb IN (\'DEFAULT\', \'YES\')) THEN SET @sys.diagnostics.sql = \'SHOW ENGINE InnoDB STATUS\'; PREPARE stmt_innodb_status FROM @sys.diagnostics.sql; END IF;  IF (v_has_ps = \'YES\') THEN SET @sys.diagnostics.sql = \'SHOW ENGINE PERFORMANCE_SCHEMA STATUS\'; PREPARE stmt_ps_status FROM @sys.diagnostics.sql; END IF;  IF (v_has_ndb IN (\'DEFAULT\', \'YES\')) THEN SET @sys.diagnostics.sql = \'SHOW ENGINE NDBCLUSTER STATUS\'; PREPARE stmt_ndbcluster_status FROM @sys.diagnostics.sql; END IF;  SET @sys.diagnostics.sql_gen_query_template = \'SELECT CONCAT( \'SELECT \', GROUP_CONCAT( CASE WHEN (SUBSTRING(TABLE_NAME, 3), COLUMN_NAME) IN ( (\'io_global_by_file_by_bytes\', \'total\'), (\'io_global_by_wait_by_bytes\', \'total_requested\') ) THEN CONCAT(\'sys.format_bytes(\', COLUMN_NAME, \') AS \', COLUMN_NAME) WHEN SUBSTRING(COLUMN_NAME, -8) = \'_latency\' THEN CONCAT(\'sys.format_time(\', COLUMN_NAME, \') AS \', COLUMN_NAME) WHEN SUBSTRING(COLUMN_NAME, -7) = \'_memory\' OR SUBSTRING(COLUMN_NAME, -17) = \'_memory_allocated\' OR ((SUBSTRING(COLUMN_NAME, -5) = \'_read\' OR SUBSTRING(COLUMN_NAME, -8) = \'_written\' OR SUBSTRING(COLUMN_NAME, -6) = \'_write\') AND SUBSTRING(COLUMN_NAME, 1, 6) <> \'COUNT_\') THEN CONCAT(\'sys.format_bytes(\', COLUMN_NAME, \') AS \', COLUMN_NAME) ELSE COLUMN_NAME END ORDER BY ORDINAL_POSITION SEPARATOR \',
       \' ), \'
  FROM tmp_\', SUBSTRING(TABLE_NAME FROM 3), \'_%{OUTPUT}\' ) AS Query INTO @sys.diagnostics.sql_select FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = \'sys\' AND TABLE_NAME = ? GROUP BY TABLE_NAME\';  SET @sys.diagnostics.sql_gen_query_delta = \'SELECT CONCAT( \'SELECT \', GROUP_CONCAT( CASE WHEN FIND_IN_SET(COLUMN_NAME, diag.pk) THEN COLUMN_NAME WHEN diag.TABLE_NAME = \'io_global_by_file_by_bytes\' AND COLUMN_NAME = \'write_pct\' THEN CONCAT(\'IFNULL(ROUND(100-(((e.total_read-IFNULL(s.total_read, 0))\', \'/NULLIF(((e.total_read-IFNULL(s.total_read, 0))+(e.total_written-IFNULL(s.total_written, 0))), 0))*100), 2), 0.00) AS \', COLUMN_NAME) WHEN (diag.TABLE_NAME, COLUMN_NAME) IN ( (\'io_global_by_file_by_bytes\', \'total\'), (\'io_global_by_wait_by_bytes\', \'total_requested\') ) THEN CONCAT(\'sys.format_bytes(e.\', COLUMN_NAME, \'-IFNULL(s.\', COLUMN_NAME, \', 0)) AS \', COLUMN_NAME) WHEN SUBSTRING(COLUMN_NAME, 1, 4) IN (\'max_\', \'min_\') AND SUBSTRING(COLUMN_NAME, -8) = \'_latency\' THEN CONCAT(\'sys.format_time(e.\', COLUMN_NAME, \') AS \', COLUMN_NAME) WHEN COLUMN_NAME = \'avg_latency\' THEN CONCAT(\'sys.format_time((e.total_latency - IFNULL(s.total_latency, 0))\', \'/NULLIF(e.total - IFNULL(s.total, 0), 0)) AS \', COLUMN_NAME) WHEN SUBSTRING(COLUMN_NAME, -12) = \'_avg_latency\' THEN CONCAT(\'sys.format_time((e.\', SUBSTRING(COLUMN_NAME FROM 1 FOR CHAR_LENGTH(COLUMN_NAME)-12), \'_latency - IFNULL(s.\', SUBSTRING(COLUMN_NAME FROM 1 FOR CHAR_LENGTH(COLUMN_NAME)-12), \'_latency, 0))\', \'/NULLIF(e.\', SUBSTRING(COLUMN_NAME FROM 1 FOR CHAR_LENGTH(COLUMN_NAME)-12), \'s - IFNULL(s.\', SUBSTRING(COLUMN_NAME FROM 1 FOR CHAR_LENGTH(COLUMN_NAME)-12), \'s, 0), 0)) AS \', COLUMN_NAME) WHEN SUBSTRING(COLUMN_NAME, -8) = \'_latency\' THEN CONCAT(\'sys.format_time(e.\', COLUMN_NAME, \' - IFNULL(s.\', COLUMN_NAME, \', 0)) AS \', COLUMN_NAME) WHEN COLUMN_NAME IN (\'avg_read\', \'avg_write\', \'avg_written\') THEN CONCAT(\'sys.format_bytes(IFNULL((e.total_\', IF(COLUMN_NAME = \'avg_read\', \'read\', \'written\'), \'-IFNULL(s.total_\', IF(COLUMN_NAME = \'avg_read\', \'read\', \'written\'), \', 0))\', \'/NULLIF(e.count_\', IF(COLUMN_NAME = \'avg_read\', \'read\', \'write\'), \'-IFNULL(s.count_\', IF(COLUMN_NAME = \'avg_read\', \'read\', \'write\'), \', 0), 0), 0)) AS \', COLUMN_NAME) WHEN SUBSTRING(COLUMN_NAME, -7) = \'_memory\' OR SUBSTRING(COLUMN_NAME, -17) = \'_memory_allocated\' OR ((SUBSTRING(COLUMN_NAME, -5) = \'_read\' OR SUBSTRING(COLUMN_NAME, -8) = \'_written\' OR SUBSTRING(COLUMN_NAME, -6) = \'_write\') AND SUBSTRING(COLUMN_NAME, 1, 6) <> \'COUNT_\') THEN CONCAT(\'sys.format_bytes(e.\', COLUMN_NAME, \' - IFNULL(s.\', COLUMN_NAME, \', 0)) AS \', COLUMN_NAME) ELSE CONCAT(\'(e.\', COLUMN_NAME, \' - IFNULL(s.\', COLUMN_NAME, \', 0)) AS \', COLUMN_NAME) END ORDER BY ORDINAL_POSITION SEPARATOR \',
       \' ), \'
  FROM tmp_\', diag.TABLE_NAME, \'_end e LEFT OUTER JOIN tmp_\', diag.TABLE_NAME, \'_start s USING (\', diag.pk, \')\' ) AS Query INTO @sys.diagnostics.sql_select FROM tmp_sys_views_delta diag INNER JOIN information_schema.COLUMNS c ON c.TABLE_NAME = CONCAT(\'x$\', diag.TABLE_NAME) WHERE c.TABLE_SCHEMA = \'sys\' AND diag.TABLE_NAME = ? GROUP BY diag.TABLE_NAME\';  IF (v_has_ps = \'YES\') THEN DROP TEMPORARY TABLE IF EXISTS tmp_sys_views_delta; CREATE TEMPORARY TABLE tmp_sys_views_delta ( TABLE_NAME varchar(64) NOT NULL, order_by text COMMENT \'ORDER BY clause for the initial and overall views\', order_by_delta text COMMENT \'ORDER BY clause for the delta views\', where_delta text COMMENT \'WHERE clause to use for delta views to only include rows with a "count" > 0\', limit_rows int unsigned COMMENT \'The maximum number of rows to include for the view\', pk varchar(128) COMMENT \'Used with the FIND_IN_SET() function so use comma separated list without whitespace\', PRIMARY KEY (TABLE_NAME) );  IF (@sys.debug = \'ON\') THEN SELECT \'Populating tmp_sys_views_delta\' AS \'Debug\'; END IF; INSERT INTO tmp_sys_views_delta VALUES (\'host_summary\'                       , \'%{TABLE}.statement_latency DESC\', \'(e.statement_latency-IFNULL(s.statement_latency, 0)) DESC\', \'(e.statements - IFNULL(s.statements, 0)) > 0\', NULL, \'host\'), (\'host_summary_by_file_io\'            , \'%{TABLE}.io_latency DESC\', \'(e.io_latency-IFNULL(s.io_latency, 0)) DESC\', \'(e.ios - IFNULL(s.ios, 0)) > 0\', NULL, \'host\'), (\'host_summary_by_file_io_type\'       , \'%{TABLE}.host, %{TABLE}.total_latency DESC\', \'e.host, (e.total_latency-IFNULL(s.total_latency, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', NULL, \'host,event_name\'), (\'host_summary_by_stages\'             , \'%{TABLE}.host, %{TABLE}.total_latency DESC\', \'e.host, (e.total_latency-IFNULL(s.total_latency, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', NULL, \'host,event_name\'), (\'host_summary_by_statement_latency\'  , \'%{TABLE}.total_latency DESC\', \'(e.total_latency-IFNULL(s.total_latency, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', NULL, \'host\'), (\'host_summary_by_statement_type\'     , \'%{TABLE}.host, %{TABLE}.total_latency DESC\', \'e.host, (e.total_latency-IFNULL(s.total_latency, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', NULL, \'host,statement\'), (\'io_by_thread_by_latency\'            , \'%{TABLE}.total_latency DESC\', \'(e.total_latency-IFNULL(s.total_latency, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', NULL, \'user,thread_id,processlist_id\'), (\'io_global_by_file_by_bytes\'         , \'%{TABLE}.total DESC\', \'(e.total-IFNULL(s.total, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', 100, \'file\'), (\'io_global_by_file_by_latency\'       , \'%{TABLE}.total_latency DESC\', \'(e.total_latency-IFNULL(s.total_latency, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', 100, \'file\'), (\'io_global_by_wait_by_bytes\'         , \'%{TABLE}.total_requested DESC\', \'(e.total_requested-IFNULL(s.total_requested, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', NULL, \'event_name\'), (\'io_global_by_wait_by_latency\'       , \'%{TABLE}.total_latency DESC\', \'(e.total_latency-IFNULL(s.total_latency, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', NULL, \'event_name\'), (\'schema_index_statistics\'            , \'(%{TABLE}.select_latency+%{TABLE}.insert_latency+%{TABLE}.update_latency+%{TABLE}.delete_latency) DESC\', \'((e.select_latency+e.insert_latency+e.update_latency+e.delete_latency)-IFNULL(s.select_latency+s.insert_latency+s.update_latency+s.delete_latency, 0)) DESC\', \'((e.rows_selected+e.insert_latency+e.rows_updated+e.rows_deleted)-IFNULL(s.rows_selected+s.rows_inserted+s.rows_updated+s.rows_deleted, 0)) > 0\', 100, \'table_schema,table_name,index_name\'), (\'schema_table_statistics\'            , \'%{TABLE}.total_latency DESC\', \'(e.total_latency-IFNULL(s.total_latency, 0)) DESC\', \'(e.total_latency-IFNULL(s.total_latency, 0)) > 0\', 100, \'table_schema,table_name\'), (\'schema_tables_with_full_table_scans\', \'%{TABLE}.rows_full_scanned DESC\', \'(e.rows_full_scanned-IFNULL(s.rows_full_scanned, 0)) DESC\', \'(e.rows_full_scanned-IFNULL(s.rows_full_scanned, 0)) > 0\', 100, \'object_schema,object_name\'), (\'user_summary\'                       , \'%{TABLE}.statement_latency DESC\', \'(e.statement_latency-IFNULL(s.statement_latency, 0)) DESC\', \'(e.statements - IFNULL(s.statements, 0)) > 0\', NULL, \'user\'), (\'user_summary_by_file_io\'            , \'%{TABLE}.io_latency DESC\', \'(e.io_latency-IFNULL(s.io_latency, 0)) DESC\', \'(e.ios - IFNULL(s.ios, 0)) > 0\', NULL, \'user\'), (\'user_summary_by_file_io_type\'       , \'%{TABLE}.user, %{TABLE}.latency DESC\', \'e.user, (e.latency-IFNULL(s.latency, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', NULL, \'user,event_name\'), (\'user_summary_by_stages\'             , \'%{TABLE}.user, %{TABLE}.total_latency DESC\', \'e.user, (e.total_latency-IFNULL(s.total_latency, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', NULL, \'user,event_name\'), (\'user_summary_by_statement_latency\'  , \'%{TABLE}.total_latency DESC\', \'(e.total_latency-IFNULL(s.total_latency, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', NULL, \'user\'), (\'user_summary_by_statement_type\'     , \'%{TABLE}.user, %{TABLE}.total_latency DESC\', \'e.user, (e.total_latency-IFNULL(s.total_latency, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', NULL, \'user,statement\'), (\'wait_classes_global_by_avg_latency\' , \'IFNULL(%{TABLE}.total_latency / NULLIF(%{TABLE}.total, 0), 0) DESC\', \'IFNULL((e.total_latency-IFNULL(s.total_latency, 0)) / NULLIF((e.total - IFNULL(s.total, 0)), 0), 0) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', NULL, \'event_class\'), (\'wait_classes_global_by_latency\'     , \'%{TABLE}.total_latency DESC\', \'(e.total_latency-IFNULL(s.total_latency, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', NULL, \'event_class\'), (\'waits_by_host_by_latency\'           , \'%{TABLE}.host, %{TABLE}.total_latency DESC\', \'e.host, (e.total_latency-IFNULL(s.total_latency, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', NULL, \'host,event\'), (\'waits_by_user_by_latency\'           , \'%{TABLE}.user, %{TABLE}.total_latency DESC\', \'e.user, (e.total_latency-IFNULL(s.total_latency, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', NULL, \'user,event\'), (\'waits_global_by_latency\'            , \'%{TABLE}.total_latency DESC\', \'(e.total_latency-IFNULL(s.total_latency, 0)) DESC\', \'(e.total - IFNULL(s.total, 0)) > 0\', NULL, \'events\') ; END IF;   SELECT \'  =======================  Configuration  =======================  \' AS \'\'; SELECT \'GLOBAL VARIABLES\' AS \'The following output is:\'; IF (v_has_ps_vars = \'YES\') THEN SELECT LOWER(VARIABLE_NAME) AS Variable_name, VARIABLE_VALUE AS Variable_value FROM performance_schema.global_variables ORDER BY VARIABLE_NAME; ELSE SELECT LOWER(VARIABLE_NAME) AS Variable_name, VARIABLE_VALUE AS Variable_value FROM information_schema.GLOBAL_VARIABLES ORDER BY VARIABLE_NAME; END IF;  IF (v_has_ps = \'YES\') THEN SELECT \'Performance Schema Setup - Actors\' AS \'The following output is:\'; SELECT * FROM performance_schema.setup_actors;  SELECT \'Performance Schema Setup - Consumers\' AS \'The following output is:\'; SELECT NAME AS Consumer, ENABLED, sys.ps_is_consumer_enabled(NAME) AS COLLECTS FROM performance_schema.setup_consumers;  SELECT \'Performance Schema Setup - Instruments\' AS \'The following output is:\'; SELECT SUBSTRING_INDEX(NAME, \'/\', 2) AS \'InstrumentClass\', ROUND(100*SUM(IF(ENABLED = \'YES\', 1, 0))/COUNT(*), 2) AS \'EnabledPct\', ROUND(100*SUM(IF(TIMED = \'YES\', 1, 0))/COUNT(*), 2) AS \'TimedPct\' FROM performance_schema.setup_instruments GROUP BY SUBSTRING_INDEX(NAME, \'/\', 2) ORDER BY SUBSTRING_INDEX(NAME, \'/\', 2);  SELECT \'Performance Schema Setup - Objects\' AS \'The following output is:\'; SELECT * FROM performance_schema.setup_objects;  SELECT \'Performance Schema Setup - Threads\' AS \'The following output is:\'; SELECT `TYPE` AS ThreadType, COUNT(*) AS \'Total\', ROUND(100*SUM(IF(INSTRUMENTED = \'YES\', 1, 0))/COUNT(*), 2) AS \'InstrumentedPct\' FROM performance_schema.threads GROUP BY TYPE; END IF;   IF (v_has_replication = \'NO\') THEN SELECT \'No Replication Configured\' AS \'Replication Status\'; ELSE SELECT CONCAT(\'Replication Configured: \', v_has_replication, \' - Performance Schema Replication Tables: \', v_has_ps_replication) AS \'Replication Status\';  IF (v_has_ps_replication = \'YES\') THEN SELECT \'Replication - Connection Configuration\' AS \'The following output is:\'; SELECT * FROM performance_schema.replication_connection_configuration ORDER BY CHANNEL_NAME ; END IF;  IF (v_has_ps_replication = \'YES\') THEN SELECT \'Replication - Applier Configuration\' AS \'The following output is:\'; SELECT * FROM performance_schema.replication_applier_configuration ORDER BY CHANNEL_NAME; END IF;  IF (@@master_info_repository = \'TABLE\') THEN SELECT \'Replication - Master Info Repository Configuration\' AS \'The following output is:\'; SELECT  Channel_name, Host, User_name, Port, Connect_retry, Enabled_ssl, Ssl_ca, Ssl_capath, Ssl_cert, Ssl_cipher, Ssl_key, Ssl_verify_server_cert, Heartbeat, Bind, Ignored_server_ids, Uuid, Retry_count, Ssl_crl, Ssl_crlpath, Tls_version, Enabled_auto_position FROM mysql.slave_master_info ORDER BY Channel_name ; END IF;  IF (@@relay_log_info_repository = \'TABLE\') THEN SELECT \'Replication - Relay Log Repository Configuration\' AS \'The following output is:\'; SELECT  Channel_name, Sql_delay, Number_of_workers, Id FROM mysql.slave_relay_log_info ORDER BY Channel_name ; END IF; END IF;   IF (v_has_ndb IN (\'DEFAULT\', \'YES\')) THEN SELECT \'Cluster Thread Blocks\' AS \'The following output is:\'; SELECT * FROM ndbinfo.threadblocks; END IF;  IF (v_has_ps = \'YES\') THEN IF (@sys.diagnostics.include_raw = \'ON\') THEN SELECT \'  ========================  Initial Status  ========================  \' AS \'\'; END IF;  DROP TEMPORARY TABLE IF EXISTS tmp_digests_start; CALL sys.statement_performance_analyzer(\'create_tmp\', \'tmp_digests_start\', NULL); CALL sys.statement_performance_analyzer(\'snapshot\', NULL, NULL); CALL sys.statement_performance_analyzer(\'save\', \'tmp_digests_start\', NULL);  IF (@sys.diagnostics.include_raw = \'ON\') THEN SET @sys.diagnostics.sql = REPLACE(@sys.diagnostics.sql_gen_query_template, \'%{OUTPUT}\', \'start\'); IF (@sys.debug = \'ON\') THEN SELECT \'The following query will be used to generate the query for each sys view\' AS \'Debug\'; SELECT @sys.diagnostics.sql AS \'Debug\'; END IF; PREPARE stmt_gen_query FROM @sys.diagnostics.sql; END IF; SET v_done = FALSE; OPEN c_sysviews_w_delta; c_sysviews_w_delta_loop: LOOP FETCH c_sysviews_w_delta INTO v_table_name; IF v_done THEN LEAVE c_sysviews_w_delta_loop; END IF;  IF (@sys.debug = \'ON\') THEN SELECT CONCAT(\'The following queries are for storing the initial content of \', v_table_name) AS \'Debug\'; END IF;  CALL sys.execute_prepared_stmt(CONCAT(\'DROP TEMPORARY TABLE IF EXISTS `tmp_\', v_table_name, \'_start`\')); CALL sys.execute_prepared_stmt(CONCAT(\'CREATE TEMPORARY TABLE `tmp_\', v_table_name, \'_start` SELECT * FROM `sys`.`x$\', v_table_name, \'`\'));  IF (@sys.diagnostics.include_raw = \'ON\') THEN SET @sys.diagnostics.table_name = CONCAT(\'x$\', v_table_name); EXECUTE stmt_gen_query USING @sys.diagnostics.table_name; SELECT CONCAT(@sys.diagnostics.sql_select, IF(order_by IS NOT NULL, CONCAT(\'
 ORDER BY \', REPLACE(order_by, \'%{TABLE}\', CONCAT(\'tmp_\', v_table_name, \'_start\'))), \'\'), IF(limit_rows IS NOT NULL, CONCAT(\'
 LIMIT \', limit_rows), \'\') ) INTO @sys.diagnostics.sql_select FROM tmp_sys_views_delta WHERE TABLE_NAME = v_table_name; SELECT CONCAT(\'Initial \', v_table_name) AS \'The following output is:\'; CALL sys.execute_prepared_stmt(@sys.diagnostics.sql_select); END IF; END LOOP; CLOSE c_sysviews_w_delta;  IF (@sys.diagnostics.include_raw = \'ON\') THEN DEALLOCATE PREPARE stmt_gen_query; END IF; END IF;  SET v_sql_status_summary_select = \'SELECT Variable_name\', v_sql_status_summary_delta  = \'\', v_sql_status_summary_from   = \'\';  REPEAT  SET v_output_count = v_output_count + 1; IF (v_output_count > 1) THEN SET v_sleep = in_interval-(UNIX_TIMESTAMP(NOW(2))-v_iter_start); SELECT NOW() AS \'Time\', CONCAT(\'Going to sleep for \', v_sleep, \' seconds. Please do not interrupt\') AS \'The following output is:\'; DO SLEEP(in_interval); END IF; SET v_iter_start = UNIX_TIMESTAMP(NOW(2));  SELECT NOW(), CONCAT(\'Iteration Number \', IFNULL(v_output_count, \'NULL\')) AS \'The following output is:\';  IF (@@log_bin = 1) THEN SELECT \'SHOW MASTER STATUS\' AS \'The following output is:\'; SHOW MASTER STATUS; END IF;  IF (v_has_replication <> \'NO\') THEN SELECT \'SHOW SLAVE STATUS\' AS \'The following output is:\'; SHOW SLAVE STATUS;  IF (v_has_ps_replication = \'YES\') THEN SELECT \'Replication Connection Status\' AS \'The following output is:\'; SELECT * FROM performance_schema.replication_connection_status;  SELECT \'Replication Applier Status\' AS \'The following output is:\'; SELECT * FROM performance_schema.replication_applier_status ORDER BY CHANNEL_NAME;  SELECT \'Replication Applier Status - Coordinator\' AS \'The following output is:\'; SELECT * FROM performance_schema.replication_applier_status_by_coordinator ORDER BY CHANNEL_NAME;  SELECT \'Replication Applier Status - Worker\' AS \'The following output is:\'; SELECT * FROM performance_schema.replication_applier_status_by_worker ORDER BY CHANNEL_NAME, WORKER_ID; END IF;  IF (@@master_info_repository = \'TABLE\') THEN SELECT \'Replication - Master Log Status\' AS \'The following output is:\'; SELECT Master_log_name, Master_log_pos FROM mysql.slave_master_info; END IF;  IF (@@relay_log_info_repository = \'TABLE\') THEN SELECT \'Replication - Relay Log Status\' AS \'The following output is:\'; SELECT sys.format_path(Relay_log_name) AS Relay_log_name, Relay_log_pos, Master_log_name, Master_log_pos FROM mysql.slave_relay_log_info;  SELECT \'Replication - Worker Status\' AS \'The following output is:\'; SELECT Id, sys.format_path(Relay_log_name) AS Relay_log_name, Relay_log_pos, Master_log_name, Master_log_pos, sys.format_path(Checkpoint_relay_log_name) AS Checkpoint_relay_log_name, Checkpoint_relay_log_pos, Checkpoint_master_log_name, Checkpoint_master_log_pos, Checkpoint_seqno, Checkpoint_group_size, HEX(Checkpoint_group_bitmap) AS Checkpoint_group_bitmap , Channel_name FROM mysql.slave_worker_info ORDER BY  Channel_name, Id; END IF; END IF;  SET v_table_name = CONCAT(\'tmp_metrics_\', v_output_count); CALL sys.execute_prepared_stmt(CONCAT(\'DROP TEMPORARY TABLE IF EXISTS \', v_table_name));  CALL sys.execute_prepared_stmt(CONCAT(\'CREATE TEMPORARY TABLE \', v_table_name, \' ( Variable_name VARCHAR(193) NOT NULL, Variable_value VARCHAR(1024), Type VARCHAR(225) NOT NULL, Enabled ENUM(\'YES\', \'NO\', \'PARTIAL\') NOT NULL, PRIMARY KEY (Type, Variable_name) ) ENGINE = InnoDB DEFAULT CHARSET=utf8\'));  IF (v_has_metrics) THEN SET @sys.diagnostics.sql = CONCAT( \'INSERT INTO \', v_table_name, \' SELECT Variable_name, REPLACE(Variable_value, \'
\', \'\\n\') AS Variable_value, Type, Enabled FROM sys.metrics\' ); ELSE SET @sys.diagnostics.sql = CONCAT( \'INSERT INTO \', v_table_name, \'(SELECT LOWER(VARIABLE_NAME) AS Variable_name, REPLACE(VARIABLE_VALUE, \'
\', \'\\n\') AS Variable_value, \'Global Status\' AS Type, \'YES\' AS Enabled FROM performance_schema.global_status ) UNION ALL ( SELECT NAME AS Variable_name, COUNT AS Variable_value, CONCAT(\'InnoDB Metrics - \', SUBSYSTEM) AS Type, IF(STATUS = \'enabled\', \'YES\', \'NO\') AS Enabled FROM information_schema.INNODB_METRICS WHERE NAME NOT IN ( \'lock_row_lock_time\', \'lock_row_lock_time_avg\', \'lock_row_lock_time_max\', \'lock_row_lock_waits\', \'buffer_pool_reads\', \'buffer_pool_read_requests\', \'buffer_pool_write_requests\', \'buffer_pool_wait_free\', \'buffer_pool_read_ahead\', \'buffer_pool_read_ahead_evicted\', \'buffer_pool_pages_total\', \'buffer_pool_pages_misc\', \'buffer_pool_pages_data\', \'buffer_pool_bytes_data\', \'buffer_pool_pages_dirty\', \'buffer_pool_bytes_dirty\', \'buffer_pool_pages_free\', \'buffer_pages_created\', \'buffer_pages_written\', \'buffer_pages_read\', \'buffer_data_reads\', \'buffer_data_written\', \'file_num_open_files\', \'os_log_bytes_written\', \'os_log_fsyncs\', \'os_log_pending_fsyncs\', \'os_log_pending_writes\', \'log_waits\', \'log_write_requests\', \'log_writes\', \'innodb_dblwr_writes\', \'innodb_dblwr_pages_written\', \'innodb_page_size\') ) UNION ALL ( SELECT \'NOW()\' AS Variable_name, NOW(3) AS Variable_value, \'System Time\' AS Type, \'YES\' AS Enabled ) UNION ALL ( SELECT \'UNIX_TIMESTAMP()\' AS Variable_name, ROUND(UNIX_TIMESTAMP(NOW(3)), 3) AS Variable_value, \'System Time\' AS Type, \'YES\' AS Enabled ) ORDER BY Type, Variable_name;\' ); END IF; CALL sys.execute_prepared_stmt(@sys.diagnostics.sql);  CALL sys.execute_prepared_stmt( CONCAT(\'(SELECT Variable_value INTO @sys.diagnostics.output_time FROM \', v_table_name, \' WHERE Type = \'System Time\' AND Variable_name = \'UNIX_TIMESTAMP()\')\') ); SET v_output_time = @sys.diagnostics.output_time;  SET v_sql_status_summary_select = CONCAT(v_sql_status_summary_select, \', CONCAT( LEFT(s\', v_output_count, \'.Variable_value, \', v_status_summary_width, \'), IF(\', REPLACE(v_no_delta_names, \'%{COUNT}\', v_output_count), \' AND s\', v_output_count, \'.Variable_value REGEXP \'^[0-9]+(\\.[0-9]+)?$\', CONCAT(\' (\', ROUND(s\', v_output_count, \'.Variable_value/\', v_output_time, \', 2), \'/sec)\'), \'\') ) AS \'Output \', v_output_count, \'\'\'), v_sql_status_summary_from   = CONCAT(v_sql_status_summary_from, \' \', IF(v_output_count = 1, \'  FROM \', \'       INNER JOIN \'), v_table_name, \' s\', v_output_count, IF (v_output_count = 1, \'\', \' USING (Type, Variable_name)\')); IF (v_output_count > 1) THEN SET v_sql_status_summary_delta  = CONCAT(v_sql_status_summary_delta, \', IF(\', REPLACE(v_no_delta_names, \'%{COUNT}\', v_output_count), \' AND s\', (v_output_count-1), \'.Variable_value REGEXP \'^[0-9]+(\\.[0-9]+)?$\' AND s\', v_output_count, \'.Variable_value REGEXP \'^[0-9]+(\\.[0-9]+)?$\', CONCAT(IF(s\', (v_output_count-1), \'.Variable_value REGEXP \'^[0-9]+\\.[0-9]+$\' OR s\', v_output_count, \'.Variable_value REGEXP \'^[0-9]+\\.[0-9]+$\', ROUND((s\', v_output_count, \'.Variable_value-s\', (v_output_count-1), \'.Variable_value), 2), (s\', v_output_count, \'.Variable_value-s\', (v_output_count-1), \'.Variable_value) ), \' (\', ROUND((s\', v_output_count, \'.Variable_value-s\', (v_output_count-1), \'.Variable_value)/(\', v_output_time, \'-\', v_output_time_prev, \'), 2), \'/sec)\' ), \'\' ) AS \'Delta (\', (v_output_count-1), \' -> \', v_output_count, \')\'\'); END IF;  SET v_output_time_prev = v_output_time;  IF (@sys.diagnostics.include_raw = \'ON\') THEN IF (v_has_metrics) THEN SELECT \'SELECT * FROM sys.metrics\' AS \'The following output is:\'; ELSE SELECT \'sys.metrics equivalent\' AS \'The following output is:\'; END IF; CALL sys.execute_prepared_stmt(CONCAT(\'SELECT Type, Variable_name, Enabled, Variable_value FROM \', v_table_name, \' ORDER BY Type, Variable_name\')); END IF;  IF (v_has_innodb IN (\'DEFAULT\', \'YES\')) THEN SELECT \'SHOW ENGINE INNODB STATUS\' AS \'The following output is:\'; EXECUTE stmt_innodb_status; SELECT \'InnoDB - Transactions\' AS \'The following output is:\'; SELECT * FROM information_schema.INNODB_TRX; END IF;  IF (v_has_ndb IN (\'DEFAULT\', \'YES\')) THEN SELECT \'SHOW ENGINE NDBCLUSTER STATUS\' AS \'The following output is:\'; EXECUTE stmt_ndbcluster_status;  SELECT \'ndbinfo.memoryusage\' AS \'The following output is:\'; SELECT node_id, memory_type, sys.format_bytes(used) AS used, used_pages, sys.format_bytes(total) AS total, total_pages, ROUND(100*(used/total), 2) AS \'Used %\' FROM ndbinfo.memoryusage;  SET v_done = FALSE; OPEN c_ndbinfo; c_ndbinfo_loop: LOOP FETCH c_ndbinfo INTO v_table_name; IF v_done THEN LEAVE c_ndbinfo_loop; END IF;  SELECT CONCAT(\'SELECT * FROM ndbinfo.\', v_table_name) AS \'The following output is:\'; CALL sys.execute_prepared_stmt(CONCAT(\'SELECT * FROM `ndbinfo`.`\', v_table_name, \'`\')); END LOOP; CLOSE c_ndbinfo;  SELECT * FROM information_schema.FILES; END IF;  SELECT \'SELECT * FROM sys.processlist\' AS \'The following output is:\'; SELECT processlist.* FROM sys.processlist;  IF (v_has_ps = \'YES\') THEN IF (sys.ps_is_consumer_enabled(\'events_waits_history_long\') = \'YES\') THEN SELECT \'SELECT * FROM sys.latest_file_io\' AS \'The following output is:\'; SELECT * FROM sys.latest_file_io; END IF;  IF (EXISTS(SELECT 1 FROM performance_schema.setup_instruments WHERE NAME LIKE \'memory/%\' AND ENABLED = \'YES\')) THEN SELECT \'SELECT * FROM sys.memory_by_host_by_current_bytes\' AS \'The following output is:\'; SELECT * FROM sys.memory_by_host_by_current_bytes;  SELECT \'SELECT * FROM sys.memory_by_thread_by_current_bytes\' AS \'The following output is:\'; SELECT * FROM sys.memory_by_thread_by_current_bytes;  SELECT \'SELECT * FROM sys.memory_by_user_by_current_bytes\' AS \'The following output is:\'; SELECT * FROM sys.memory_by_user_by_current_bytes;  SELECT \'SELECT * FROM sys.memory_global_by_current_bytes\' AS \'The following output is:\'; SELECT * FROM sys.memory_global_by_current_bytes; END IF; END IF;  SET v_runtime = (UNIX_TIMESTAMP(NOW(2)) - v_start); UNTIL (v_runtime + in_interval >= in_max_runtime) END REPEAT;  IF (v_has_ps = \'YES\') THEN SELECT \'SHOW ENGINE PERFORMANCE_SCHEMA STATUS\' AS \'The following output is:\'; EXECUTE stmt_ps_status; END IF;  IF (v_has_innodb IN (\'DEFAULT\', \'YES\')) THEN DEALLOCATE PREPARE stmt_innodb_status; END IF; IF (v_has_ps = \'YES\') THEN DEALLOCATE PREPARE stmt_ps_status; END IF; IF (v_has_ndb IN (\'DEFAULT\', \'YES\')) THEN DEALLOCATE PREPARE stmt_ndbcluster_status; END IF;   SELECT \'  ============================  Schema Information  ============================  \' AS \'\';  SELECT COUNT(*) AS \'Total Number of Tables\' FROM information_schema.TABLES;  IF (@sys.diagnostics.allow_i_s_tables = \'ON\') THEN SELECT \'Storage Engine Usage\' AS \'The following output is:\'; SELECT ENGINE, COUNT(*) AS NUM_TABLES, sys.format_bytes(SUM(DATA_LENGTH)) AS DATA_LENGTH, sys.format_bytes(SUM(INDEX_LENGTH)) AS INDEX_LENGTH, sys.format_bytes(SUM(DATA_LENGTH+INDEX_LENGTH)) AS TOTAL FROM information_schema.TABLES GROUP BY ENGINE;  SELECT \'Schema Object Overview\' AS \'The following output is:\'; SELECT * FROM sys.schema_object_overview;  SELECT \'Tables without a PRIMARY KEY\' AS \'The following output is:\'; SELECT TABLES.TABLE_SCHEMA, ENGINE, COUNT(*) AS NumTables FROM information_schema.TABLES LEFT OUTER JOIN information_schema.STATISTICS ON STATISTICS.TABLE_SCHEMA = TABLES.TABLE_SCHEMA AND STATISTICS.TABLE_NAME = TABLES.TABLE_NAME AND STATISTICS.INDEX_NAME = \'PRIMARY\' WHERE STATISTICS.TABLE_NAME IS NULL AND TABLES.TABLE_SCHEMA NOT IN (\'mysql\', \'information_schema\', \'performance_schema\', \'sys\') AND TABLES.TABLE_TYPE = \'BASE TABLE\' GROUP BY TABLES.TABLE_SCHEMA, ENGINE; END IF;  IF (v_has_ps = \'YES\') THEN SELECT \'Unused Indexes\' AS \'The following output is:\'; SELECT object_schema, COUNT(*) AS NumUnusedIndexes FROM performance_schema.table_io_waits_summary_by_index_usage  WHERE index_name IS NOT NULL AND count_star = 0 AND object_schema NOT IN (\'mysql\', \'sys\') AND index_name != \'PRIMARY\' GROUP BY object_schema; END IF;  IF (v_has_ps = \'YES\') THEN SELECT \'  =========================  Overall Status  =========================  \' AS \'\';  SELECT \'CALL sys.ps_statement_avg_latency_histogram()\' AS \'The following output is:\'; CALL sys.ps_statement_avg_latency_histogram();  CALL sys.statement_performance_analyzer(\'snapshot\', NULL, NULL); CALL sys.statement_performance_analyzer(\'overall\', NULL, \'with_runtimes_in_95th_percentile\');  SET @sys.diagnostics.sql = REPLACE(@sys.diagnostics.sql_gen_query_template, \'%{OUTPUT}\', \'end\'); IF (@sys.debug = \'ON\') THEN SELECT \'The following query will be used to generate the query for each sys view\' AS \'Debug\'; SELECT @sys.diagnostics.sql AS \'Debug\'; END IF; PREPARE stmt_gen_query FROM @sys.diagnostics.sql;  SET v_done = FALSE; OPEN c_sysviews_w_delta; c_sysviews_w_delta_loop: LOOP FETCH c_sysviews_w_delta INTO v_table_name; IF v_done THEN LEAVE c_sysviews_w_delta_loop; END IF;  IF (@sys.debug = \'ON\') THEN SELECT CONCAT(\'The following queries are for storing the final content of \', v_table_name) AS \'Debug\'; END IF;  CALL sys.execute_prepared_stmt(CONCAT(\'DROP TEMPORARY TABLE IF EXISTS `tmp_\', v_table_name, \'_end`\')); CALL sys.execute_prepared_stmt(CONCAT(\'CREATE TEMPORARY TABLE `tmp_\', v_table_name, \'_end` SELECT * FROM `sys`.`x$\', v_table_name, \'`\'));  IF (@sys.diagnostics.include_raw = \'ON\') THEN SET @sys.diagnostics.table_name = CONCAT(\'x$\', v_table_name); EXECUTE stmt_gen_query USING @sys.diagnostics.table_name; SELECT CONCAT(@sys.diagnostics.sql_select, IF(order_by IS NOT NULL, CONCAT(\'
 ORDER BY \', REPLACE(order_by, \'%{TABLE}\', CONCAT(\'tmp_\', v_table_name, \'_end\'))), \'\'), IF(limit_rows IS NOT NULL, CONCAT(\'
 LIMIT \', limit_rows), \'\') ) INTO @sys.diagnostics.sql_select FROM tmp_sys_views_delta WHERE TABLE_NAME = v_table_name; SELECT CONCAT(\'Overall \', v_table_name) AS \'The following output is:\'; CALL sys.execute_prepared_stmt(@sys.diagnostics.sql_select); END IF; END LOOP; CLOSE c_sysviews_w_delta;  DEALLOCATE PREPARE stmt_gen_query;   SELECT \'  ======================  Delta Status  ======================  \' AS \'\';  CALL sys.statement_performance_analyzer(\'delta\', \'tmp_digests_start\', \'with_runtimes_in_95th_percentile\'); CALL sys.statement_performance_analyzer(\'cleanup\', NULL, NULL);  DROP TEMPORARY TABLE tmp_digests_start;  IF (@sys.debug = \'ON\') THEN SELECT \'The following query will be used to generate the query for each sys view delta\' AS \'Debug\'; SELECT @sys.diagnostics.sql_gen_query_delta AS \'Debug\'; END IF; PREPARE stmt_gen_query_delta FROM @sys.diagnostics.sql_gen_query_delta;  SET v_old_group_concat_max_len = @@session.group_concat_max_len; SET @@session.group_concat_max_len = 2048; SET v_done = FALSE; OPEN c_sysviews_w_delta; c_sysviews_w_delta_loop: LOOP FETCH c_sysviews_w_delta INTO v_table_name; IF v_done THEN LEAVE c_sysviews_w_delta_loop; END IF;  SET @sys.diagnostics.table_name = v_table_name; EXECUTE stmt_gen_query_delta USING @sys.diagnostics.table_name; SELECT CONCAT(@sys.diagnostics.sql_select, IF(where_delta IS NOT NULL, CONCAT(\'
 WHERE \', where_delta), \'\'), IF(order_by_delta IS NOT NULL, CONCAT(\'
 ORDER BY \', order_by_delta), \'\'), IF(limit_rows IS NOT NULL, CONCAT(\'
 LIMIT \', limit_rows), \'\') ) INTO @sys.diagnostics.sql_select FROM tmp_sys_views_delta WHERE TABLE_NAME = v_table_name;  SELECT CONCAT(\'Delta \', v_table_name) AS \'The following output is:\'; CALL sys.execute_prepared_stmt(@sys.diagnostics.sql_select);  CALL sys.execute_prepared_stmt(CONCAT(\'DROP TEMPORARY TABLE `tmp_\', v_table_name, \'_end`\')); CALL sys.execute_prepared_stmt(CONCAT(\'DROP TEMPORARY TABLE `tmp_\', v_table_name, \'_start`\')); END LOOP; CLOSE c_sysviews_w_delta; SET @@session.group_concat_max_len = v_old_group_concat_max_len;  DEALLOCATE PREPARE stmt_gen_query_delta; DROP TEMPORARY TABLE tmp_sys_views_delta; END IF;  IF (v_has_metrics) THEN SELECT \'SELECT * FROM sys.metrics\' AS \'The following output is:\'; ELSE SELECT \'sys.metrics equivalent\' AS \'The following output is:\'; END IF; CALL sys.execute_prepared_stmt( CONCAT(v_sql_status_summary_select, v_sql_status_summary_delta, \', Type, s1.Enabled\', v_sql_status_summary_from, \' ORDER BY Type, Variable_name\' ) );  SET v_count = 0; WHILE (v_count < v_output_count) DO SET v_count = v_count + 1; SET v_table_name = CONCAT(\'tmp_metrics_\', v_count); CALL sys.execute_prepared_stmt(CONCAT(\'DROP TEMPORARY TABLE IF EXISTS \', v_table_name)); END WHILE;  IF (in_auto_config <> \'current\') THEN CALL sys.ps_setup_reload_saved(); SET sql_log_bin = @log_bin; END IF;  SET @sys.diagnostics.output_time            = NULL, @sys.diagnostics.sql                    = NULL, @sys.diagnostics.sql_gen_query_delta    = NULL, @sys.diagnostics.sql_gen_query_template = NULL, @sys.diagnostics.sql_select             = NULL, @sys.diagnostics.table_name             = NULL;  IF (v_this_thread_enabled = \'YES\') THEN CALL sys.ps_setup_enable_thread(CONNECTION_ID()); END IF;  IF (@log_bin = 1) THEN SET sql_log_bin = @log_bin; END IF; END'], 25 => ['db' => 'sys', 'name' => 'ps_statement_avg_latency_histogram', 'type' => 'PROCEDURE', 'specific_name' => 'ps_statement_avg_latency_histogram', 'language' => 'SQL', 'sql_data_access' => 'READS_SQL_DATA', 'is_deterministic' => 'NO', 'security_type' => 'INVOKER', 'param_list' => '', 'returns' => '', 'body' => 'BEGIN SELECT CONCAT(\'\n\', \'\n  . = 1 unit\', \'\n  * = 2 units\', \'\n  # = 3 units\n\', @label := CONCAT(@label_inner := CONCAT(\'\n(0 - \', ROUND((@bucket_size := (SELECT ROUND((MAX(avg_us) - MIN(avg_us)) / (@buckets := 16)) AS size FROM sys.x$ps_digest_avg_latency_distribution)) / (@unit_div := 1000)), (@unit := \'ms\'), \')\'), REPEAT(\' \', (@max_label_size := ((1 + LENGTH(ROUND((@bucket_size * 15) / @unit_div)) + 3 + LENGTH(ROUND(@bucket_size * 16) / @unit_div)) + 1)) - LENGTH(@label_inner)), @count_in_bucket := IFNULL((SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution AS b1  WHERE b1.avg_us <= @bucket_size), 0)), REPEAT(\' \', (@max_label_len := (@max_label_size + LENGTH((@total_queries := (SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution)))) + 1) - LENGTH(@label)), \'| \', IFNULL(REPEAT(IF(@count_in_bucket < (@one_unit := 40), \'.\', IF(@count_in_bucket < (@two_unit := 80), \'*\', \'#\')),  	             IF(@count_in_bucket < @one_unit, @count_in_bucket, 	             	IF(@count_in_bucket < @two_unit, @count_in_bucket / 2, @count_in_bucket / 3))), \'\'),  @label := CONCAT(@label_inner := CONCAT(\'\n(\', ROUND(@bucket_size / @unit_div), \' - \', ROUND((@bucket_size * 2) / @unit_div), @unit, \')\'), REPEAT(\' \', @max_label_size - LENGTH(@label_inner)), @count_in_bucket := IFNULL((SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution AS b1  WHERE b1.avg_us > @bucket_size AND b1.avg_us <= @bucket_size * 2), 0)), REPEAT(\' \', @max_label_len - LENGTH(@label)), \'| \', IFNULL(REPEAT(IF(@count_in_bucket < @one_unit, \'.\', IF(@count_in_bucket < @two_unit, \'*\', \'#\')),  	             IF(@count_in_bucket < @one_unit, @count_in_bucket, 	             	IF(@count_in_bucket < @two_unit, @count_in_bucket / 2, @count_in_bucket / 3))), \'\'), @label := CONCAT(@label_inner := CONCAT(\'\n(\', ROUND((@bucket_size * 2) / @unit_div), \' - \', ROUND((@bucket_size * 3) / @unit_div), @unit, \')\'), REPEAT(\' \', @max_label_size - LENGTH(@label_inner)), @count_in_bucket := IFNULL((SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution AS b1  WHERE b1.avg_us > @bucket_size * 2 AND b1.avg_us <= @bucket_size * 3), 0)), REPEAT(\' \', @max_label_len - LENGTH(@label)), \'| \', IFNULL(REPEAT(IF(@count_in_bucket < @one_unit, \'.\', IF(@count_in_bucket < @two_unit, \'*\', \'#\')),  	             IF(@count_in_bucket < @one_unit, @count_in_bucket, 	             	IF(@count_in_bucket < @two_unit, @count_in_bucket / 2, @count_in_bucket / 3))), \'\'), @label := CONCAT(@label_inner := CONCAT(\'\n(\', ROUND((@bucket_size * 3) / @unit_div), \' - \', ROUND((@bucket_size * 4) / @unit_div), @unit, \')\'), REPEAT(\' \', @max_label_size - LENGTH(@label_inner)), @count_in_bucket := IFNULL((SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution AS b1  WHERE b1.avg_us > @bucket_size * 3 AND b1.avg_us <= @bucket_size * 4), 0)), REPEAT(\' \', @max_label_len - LENGTH(@label)), \'| \', IFNULL(REPEAT(IF(@count_in_bucket < @one_unit, \'.\', IF(@count_in_bucket < @two_unit, \'*\', \'#\')),  	             IF(@count_in_bucket < @one_unit, @count_in_bucket, 	             	IF(@count_in_bucket < @two_unit, @count_in_bucket / 2, @count_in_bucket / 3))), \'\'), @label := CONCAT(@label_inner := CONCAT(\'\n(\', ROUND((@bucket_size * 4) / @unit_div), \' - \', ROUND((@bucket_size * 5) / @unit_div), @unit, \')\'), REPEAT(\' \', @max_label_size - LENGTH(@label_inner)), @count_in_bucket := IFNULL((SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution AS b1  WHERE b1.avg_us > @bucket_size * 4 AND b1.avg_us <= @bucket_size * 5), 0)), REPEAT(\' \', @max_label_len - LENGTH(@label)), \'| \', IFNULL(REPEAT(IF(@count_in_bucket < @one_unit, \'.\', IF(@count_in_bucket < @two_unit, \'*\', \'#\')),  	             IF(@count_in_bucket < @one_unit, @count_in_bucket, 	             	IF(@count_in_bucket < @two_unit, @count_in_bucket / 2, @count_in_bucket / 3))), \'\'), @label := CONCAT(@label_inner := CONCAT(\'\n(\', ROUND((@bucket_size * 5) / @unit_div), \' - \', ROUND((@bucket_size * 6) / @unit_div), @unit, \')\'), REPEAT(\' \', @max_label_size - LENGTH(@label_inner)), @count_in_bucket := IFNULL((SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution AS b1  WHERE b1.avg_us > @bucket_size * 5 AND b1.avg_us <= @bucket_size * 6), 0)), REPEAT(\' \', @max_label_len - LENGTH(@label)), \'| \', IFNULL(REPEAT(IF(@count_in_bucket < @one_unit, \'.\', IF(@count_in_bucket < @two_unit, \'*\', \'#\')),  	             IF(@count_in_bucket < @one_unit, @count_in_bucket, 	             	IF(@count_in_bucket < @two_unit, @count_in_bucket / 2, @count_in_bucket / 3))), \'\'), @label := CONCAT(@label_inner := CONCAT(\'\n(\', ROUND((@bucket_size * 6) / @unit_div), \' - \', ROUND((@bucket_size * 7) / @unit_div), @unit, \')\'), REPEAT(\' \', @max_label_size - LENGTH(@label_inner)), @count_in_bucket := IFNULL((SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution AS b1  WHERE b1.avg_us > @bucket_size * 6 AND b1.avg_us <= @bucket_size * 7), 0)), REPEAT(\' \', @max_label_len - LENGTH(@label)), \'| \', IFNULL(REPEAT(IF(@count_in_bucket < @one_unit, \'.\', IF(@count_in_bucket < @two_unit, \'*\', \'#\')),  	             IF(@count_in_bucket < @one_unit, @count_in_bucket, 	             	IF(@count_in_bucket < @two_unit, @count_in_bucket / 2, @count_in_bucket / 3))), \'\'), @label := CONCAT(@label_inner := CONCAT(\'\n(\', ROUND((@bucket_size * 7) / @unit_div), \' - \', ROUND((@bucket_size * 8) / @unit_div), @unit, \')\'), REPEAT(\' \', @max_label_size - LENGTH(@label_inner)), @count_in_bucket := IFNULL((SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution AS b1  WHERE b1.avg_us > @bucket_size * 7 AND b1.avg_us <= @bucket_size * 8), 0)), REPEAT(\' \', @max_label_len - LENGTH(@label)), \'| \', IFNULL(REPEAT(IF(@count_in_bucket < @one_unit, \'.\', IF(@count_in_bucket < @two_unit, \'*\', \'#\')),  	             IF(@count_in_bucket < @one_unit, @count_in_bucket, 	             	IF(@count_in_bucket < @two_unit, @count_in_bucket / 2, @count_in_bucket / 3))), \'\'), @label := CONCAT(@label_inner := CONCAT(\'\n(\', ROUND((@bucket_size * 8) / @unit_div), \' - \', ROUND((@bucket_size * 9) / @unit_div), @unit, \')\'), REPEAT(\' \', @max_label_size - LENGTH(@label_inner)), @count_in_bucket := IFNULL((SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution AS b1  WHERE b1.avg_us > @bucket_size * 8 AND b1.avg_us <= @bucket_size * 9), 0)), REPEAT(\' \', @max_label_len - LENGTH(@label)), \'| \', IFNULL(REPEAT(IF(@count_in_bucket < @one_unit, \'.\', IF(@count_in_bucket < @two_unit, \'*\', \'#\')),  	             IF(@count_in_bucket < @one_unit, @count_in_bucket, 	             	IF(@count_in_bucket < @two_unit, @count_in_bucket / 2, @count_in_bucket / 3))), \'\'), @label := CONCAT(@label_inner := CONCAT(\'\n(\', ROUND((@bucket_size * 9) / @unit_div), \' - \', ROUND((@bucket_size * 10) / @unit_div), @unit, \')\'), REPEAT(\' \', @max_label_size - LENGTH(@label_inner)), @count_in_bucket := IFNULL((SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution AS b1  WHERE b1.avg_us > @bucket_size * 9 AND b1.avg_us <= @bucket_size * 10), 0)), REPEAT(\' \', @max_label_len - LENGTH(@label)), \'| \', IFNULL(REPEAT(IF(@count_in_bucket < @one_unit, \'.\', IF(@count_in_bucket < @two_unit, \'*\', \'#\')),  	             IF(@count_in_bucket < @one_unit, @count_in_bucket, 	             	IF(@count_in_bucket < @two_unit, @count_in_bucket / 2, @count_in_bucket / 3))), \'\'), @label := CONCAT(@label_inner := CONCAT(\'\n(\', ROUND((@bucket_size * 10) / @unit_div), \' - \', ROUND((@bucket_size * 11) / @unit_div), @unit, \')\'), REPEAT(\' \', @max_label_size - LENGTH(@label_inner)), @count_in_bucket := IFNULL((SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution AS b1  WHERE b1.avg_us > @bucket_size * 10 AND b1.avg_us <= @bucket_size * 11), 0)), REPEAT(\' \', @max_label_len - LENGTH(@label)), \'| \', IFNULL(REPEAT(IF(@count_in_bucket < @one_unit, \'.\', IF(@count_in_bucket < @two_unit, \'*\', \'#\')),  	             IF(@count_in_bucket < @one_unit, @count_in_bucket, 	             	IF(@count_in_bucket < @two_unit, @count_in_bucket / 2, @count_in_bucket / 3))), \'\'), @label := CONCAT(@label_inner := CONCAT(\'\n(\', ROUND((@bucket_size * 11) / @unit_div), \' - \', ROUND((@bucket_size * 12) / @unit_div), @unit, \')\'), REPEAT(\' \', @max_label_size - LENGTH(@label_inner)), @count_in_bucket := IFNULL((SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution AS b1  WHERE b1.avg_us > @bucket_size * 11 AND b1.avg_us <= @bucket_size * 12), 0)), REPEAT(\' \', @max_label_len - LENGTH(@label)), \'| \', IFNULL(REPEAT(IF(@count_in_bucket < @one_unit, \'.\', IF(@count_in_bucket < @two_unit, \'*\', \'#\')),  	             IF(@count_in_bucket < @one_unit, @count_in_bucket, 	             	IF(@count_in_bucket < @two_unit, @count_in_bucket / 2, @count_in_bucket / 3))), \'\'), @label := CONCAT(@label_inner := CONCAT(\'\n(\', ROUND((@bucket_size * 12) / @unit_div), \' - \', ROUND((@bucket_size * 13) / @unit_div), @unit, \')\'), REPEAT(\' \', @max_label_size - LENGTH(@label_inner)), @count_in_bucket := IFNULL((SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution AS b1  WHERE b1.avg_us > @bucket_size * 12 AND b1.avg_us <= @bucket_size * 13), 0)), REPEAT(\' \', @max_label_len - LENGTH(@label)), \'| \', IFNULL(REPEAT(IF(@count_in_bucket < @one_unit, \'.\', IF(@count_in_bucket < @two_unit, \'*\', \'#\')),  	             IF(@count_in_bucket < @one_unit, @count_in_bucket, 	             	IF(@count_in_bucket < @two_unit, @count_in_bucket / 2, @count_in_bucket / 3))), \'\'), @label := CONCAT(@label_inner := CONCAT(\'\n(\', ROUND((@bucket_size * 13) / @unit_div), \' - \', ROUND((@bucket_size * 14) / @unit_div), @unit, \')\'), REPEAT(\' \', @max_label_size - LENGTH(@label_inner)), @count_in_bucket := IFNULL((SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution AS b1  WHERE b1.avg_us > @bucket_size * 13 AND b1.avg_us <= @bucket_size * 14), 0)), REPEAT(\' \', @max_label_len - LENGTH(@label)), \'| \', IFNULL(REPEAT(IF(@count_in_bucket < @one_unit, \'.\', IF(@count_in_bucket < @two_unit, \'*\', \'#\')),  	             IF(@count_in_bucket < @one_unit, @count_in_bucket, 	             	IF(@count_in_bucket < @two_unit, @count_in_bucket / 2, @count_in_bucket / 3))), \'\'), @label := CONCAT(@label_inner := CONCAT(\'\n(\', ROUND((@bucket_size * 14) / @unit_div), \' - \', ROUND((@bucket_size * 15) / @unit_div), @unit, \')\'), REPEAT(\' \', @max_label_size - LENGTH(@label_inner)), @count_in_bucket := IFNULL((SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution AS b1  WHERE b1.avg_us > @bucket_size * 14 AND b1.avg_us <= @bucket_size * 15), 0)), REPEAT(\' \', @max_label_len - LENGTH(@label)), \'| \', IFNULL(REPEAT(IF(@count_in_bucket < @one_unit, \'.\', IF(@count_in_bucket < @two_unit, \'*\', \'#\')),  	             IF(@count_in_bucket < @one_unit, @count_in_bucket, 	             	IF(@count_in_bucket < @two_unit, @count_in_bucket / 2, @count_in_bucket / 3))), \'\'), @label := CONCAT(@label_inner := CONCAT(\'\n(\', ROUND((@bucket_size * 15) / @unit_div), \' - \', ROUND((@bucket_size * 16) / @unit_div), @unit, \')\'), REPEAT(\' \', @max_label_size - LENGTH(@label_inner)), @count_in_bucket := IFNULL((SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution AS b1  WHERE b1.avg_us > @bucket_size * 15 AND b1.avg_us <= @bucket_size * 16), 0)), REPEAT(\' \', @max_label_len - LENGTH(@label)), \'| \', IFNULL(REPEAT(IF(@count_in_bucket < @one_unit, \'.\', IF(@count_in_bucket < @two_unit, \'*\', \'#\')),  	             IF(@count_in_bucket < @one_unit, @count_in_bucket, 	             	IF(@count_in_bucket < @two_unit, @count_in_bucket / 2, @count_in_bucket / 3))), \'\'),  \'\n\n  Total Statements: \', @total_queries, \'; Buckets: \', @buckets , \'; Bucket Size: \', ROUND(@bucket_size / @unit_div) , \' \', @unit, \';\n\'  ) AS `Performance Schema Statement Digest Average Latency Histogram`;  END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Outputs a textual histogram graph of the average latency values
 across all normalized queries tracked within the Performance Schema
 events_statements_summary_by_digest table.
 
 Can be used to show a very high level picture of what kind of 
 latency distribution statements running within this instance have.
 
 Parameters
 
 None.
 
 Example
 
 mysql> CALL sys.ps_statement_avg_latency_histogram()\G
 *************************** 1. row ***************************
 Performance Schema Statement Digest Average Latency Histogram:
 
 . = 1 unit
 * = 2 units
 # = 3 units
 
 (0 - 38ms)     240 | ################################################################################
 (38 - 77ms)    38  | ......................................
 (77 - 115ms)   3   | ...
 (115 - 154ms)  62  | *******************************
 (154 - 192ms)  3   | ...
 (192 - 231ms)  0   |
 (231 - 269ms)  0   |
 (269 - 307ms)  0   |
 (307 - 346ms)  0   |
 (346 - 384ms)  1   | .
 (384 - 423ms)  1   | .
 (423 - 461ms)  0   |
 (461 - 499ms)  0   |
 (499 - 538ms)  0   |
 (538 - 576ms)  0   |
 (576 - 615ms)  1   | .
 
 Total Statements: 350; Buckets: 16; Bucket Size: 38 ms;
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN SELECT CONCAT(\'
\', \'
  . = 1 unit\', \'
  * = 2 units\', \'
  # = 3 units
\', @label := CONCAT(@label_inner := CONCAT(\'
(0 - \', ROUND((@bucket_size := (SELECT ROUND((MAX(avg_us) - MIN(avg_us)) / (@buckets := 16)) AS size FROM sys.x$ps_digest_avg_latency_distribution)) / (@unit_div := 1000)), (@unit := \'ms\'), \')\'), REPEAT(\' \', (@max_label_size := ((1 + LENGTH(ROUND((@bucket_size * 15) / @unit_div)) + 3 + LENGTH(ROUND(@bucket_size * 16) / @unit_div)) + 1)) - LENGTH(@label_inner)), @count_in_bucket := IFNULL((SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution AS b1  WHERE b1.avg_us <= @bucket_size), 0)), REPEAT(\' \', (@max_label_len := (@max_label_size + LENGTH((@total_queries := (SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution)))) + 1) - LENGTH(@label)), \'| \', IFNULL(REPEAT(IF(@count_in_bucket < (@one_unit := 40), \'.\', IF(@count_in_bucket < (@two_unit := 80), \'*\', \'#\')),  	             IF(@count_in_bucket < @one_unit, @count_in_bucket, 	             	IF(@count_in_bucket < @two_unit, @count_in_bucket / 2, @count_in_bucket / 3))), \'\'),  @label := CONCAT(@label_inner := CONCAT(\'
(\', ROUND(@bucket_size / @unit_div), \' - \', ROUND((@bucket_size * 2) / @unit_div), @unit, \')\'), REPEAT(\' \', @max_label_size - LENGTH(@label_inner)), @count_in_bucket := IFNULL((SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution AS b1  WHERE b1.avg_us > @bucket_size AND b1.avg_us <= @bucket_size * 2), 0)), REPEAT(\' \', @max_label_len - LENGTH(@label)), \'| \', IFNULL(REPEAT(IF(@count_in_bucket < @one_unit, \'.\', IF(@count_in_bucket < @two_unit, \'*\', \'#\')),  	             IF(@count_in_bucket < @one_unit, @count_in_bucket, 	             	IF(@count_in_bucket < @two_unit, @count_in_bucket / 2, @count_in_bucket / 3))), \'\'), @label := CONCAT(@label_inner := CONCAT(\'
(\', ROUND((@bucket_size * 2) / @unit_div), \' - \', ROUND((@bucket_size * 3) / @unit_div), @unit, \')\'), REPEAT(\' \', @max_label_size - LENGTH(@label_inner)), @count_in_bucket := IFNULL((SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution AS b1  WHERE b1.avg_us > @bucket_size * 2 AND b1.avg_us <= @bucket_size * 3), 0)), REPEAT(\' \', @max_label_len - LENGTH(@label)), \'| \', IFNULL(REPEAT(IF(@count_in_bucket < @one_unit, \'.\', IF(@count_in_bucket < @two_unit, \'*\', \'#\')),  	             IF(@count_in_bucket < @one_unit, @count_in_bucket, 	             	IF(@count_in_bucket < @two_unit, @count_in_bucket / 2, @count_in_bucket / 3))), \'\'), @label := CONCAT(@label_inner := CONCAT(\'
(\', ROUND((@bucket_size * 3) / @unit_div), \' - \', ROUND((@bucket_size * 4) / @unit_div), @unit, \')\'), REPEAT(\' \', @max_label_size - LENGTH(@label_inner)), @count_in_bucket := IFNULL((SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution AS b1  WHERE b1.avg_us > @bucket_size * 3 AND b1.avg_us <= @bucket_size * 4), 0)), REPEAT(\' \', @max_label_len - LENGTH(@label)), \'| \', IFNULL(REPEAT(IF(@count_in_bucket < @one_unit, \'.\', IF(@count_in_bucket < @two_unit, \'*\', \'#\')),  	             IF(@count_in_bucket < @one_unit, @count_in_bucket, 	             	IF(@count_in_bucket < @two_unit, @count_in_bucket / 2, @count_in_bucket / 3))), \'\'), @label := CONCAT(@label_inner := CONCAT(\'
(\', ROUND((@bucket_size * 4) / @unit_div), \' - \', ROUND((@bucket_size * 5) / @unit_div), @unit, \')\'), REPEAT(\' \', @max_label_size - LENGTH(@label_inner)), @count_in_bucket := IFNULL((SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution AS b1  WHERE b1.avg_us > @bucket_size * 4 AND b1.avg_us <= @bucket_size * 5), 0)), REPEAT(\' \', @max_label_len - LENGTH(@label)), \'| \', IFNULL(REPEAT(IF(@count_in_bucket < @one_unit, \'.\', IF(@count_in_bucket < @two_unit, \'*\', \'#\')),  	             IF(@count_in_bucket < @one_unit, @count_in_bucket, 	             	IF(@count_in_bucket < @two_unit, @count_in_bucket / 2, @count_in_bucket / 3))), \'\'), @label := CONCAT(@label_inner := CONCAT(\'
(\', ROUND((@bucket_size * 5) / @unit_div), \' - \', ROUND((@bucket_size * 6) / @unit_div), @unit, \')\'), REPEAT(\' \', @max_label_size - LENGTH(@label_inner)), @count_in_bucket := IFNULL((SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution AS b1  WHERE b1.avg_us > @bucket_size * 5 AND b1.avg_us <= @bucket_size * 6), 0)), REPEAT(\' \', @max_label_len - LENGTH(@label)), \'| \', IFNULL(REPEAT(IF(@count_in_bucket < @one_unit, \'.\', IF(@count_in_bucket < @two_unit, \'*\', \'#\')),  	             IF(@count_in_bucket < @one_unit, @count_in_bucket, 	             	IF(@count_in_bucket < @two_unit, @count_in_bucket / 2, @count_in_bucket / 3))), \'\'), @label := CONCAT(@label_inner := CONCAT(\'
(\', ROUND((@bucket_size * 6) / @unit_div), \' - \', ROUND((@bucket_size * 7) / @unit_div), @unit, \')\'), REPEAT(\' \', @max_label_size - LENGTH(@label_inner)), @count_in_bucket := IFNULL((SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution AS b1  WHERE b1.avg_us > @bucket_size * 6 AND b1.avg_us <= @bucket_size * 7), 0)), REPEAT(\' \', @max_label_len - LENGTH(@label)), \'| \', IFNULL(REPEAT(IF(@count_in_bucket < @one_unit, \'.\', IF(@count_in_bucket < @two_unit, \'*\', \'#\')),  	             IF(@count_in_bucket < @one_unit, @count_in_bucket, 	             	IF(@count_in_bucket < @two_unit, @count_in_bucket / 2, @count_in_bucket / 3))), \'\'), @label := CONCAT(@label_inner := CONCAT(\'
(\', ROUND((@bucket_size * 7) / @unit_div), \' - \', ROUND((@bucket_size * 8) / @unit_div), @unit, \')\'), REPEAT(\' \', @max_label_size - LENGTH(@label_inner)), @count_in_bucket := IFNULL((SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution AS b1  WHERE b1.avg_us > @bucket_size * 7 AND b1.avg_us <= @bucket_size * 8), 0)), REPEAT(\' \', @max_label_len - LENGTH(@label)), \'| \', IFNULL(REPEAT(IF(@count_in_bucket < @one_unit, \'.\', IF(@count_in_bucket < @two_unit, \'*\', \'#\')),  	             IF(@count_in_bucket < @one_unit, @count_in_bucket, 	             	IF(@count_in_bucket < @two_unit, @count_in_bucket / 2, @count_in_bucket / 3))), \'\'), @label := CONCAT(@label_inner := CONCAT(\'
(\', ROUND((@bucket_size * 8) / @unit_div), \' - \', ROUND((@bucket_size * 9) / @unit_div), @unit, \')\'), REPEAT(\' \', @max_label_size - LENGTH(@label_inner)), @count_in_bucket := IFNULL((SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution AS b1  WHERE b1.avg_us > @bucket_size * 8 AND b1.avg_us <= @bucket_size * 9), 0)), REPEAT(\' \', @max_label_len - LENGTH(@label)), \'| \', IFNULL(REPEAT(IF(@count_in_bucket < @one_unit, \'.\', IF(@count_in_bucket < @two_unit, \'*\', \'#\')),  	             IF(@count_in_bucket < @one_unit, @count_in_bucket, 	             	IF(@count_in_bucket < @two_unit, @count_in_bucket / 2, @count_in_bucket / 3))), \'\'), @label := CONCAT(@label_inner := CONCAT(\'
(\', ROUND((@bucket_size * 9) / @unit_div), \' - \', ROUND((@bucket_size * 10) / @unit_div), @unit, \')\'), REPEAT(\' \', @max_label_size - LENGTH(@label_inner)), @count_in_bucket := IFNULL((SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution AS b1  WHERE b1.avg_us > @bucket_size * 9 AND b1.avg_us <= @bucket_size * 10), 0)), REPEAT(\' \', @max_label_len - LENGTH(@label)), \'| \', IFNULL(REPEAT(IF(@count_in_bucket < @one_unit, \'.\', IF(@count_in_bucket < @two_unit, \'*\', \'#\')),  	             IF(@count_in_bucket < @one_unit, @count_in_bucket, 	             	IF(@count_in_bucket < @two_unit, @count_in_bucket / 2, @count_in_bucket / 3))), \'\'), @label := CONCAT(@label_inner := CONCAT(\'
(\', ROUND((@bucket_size * 10) / @unit_div), \' - \', ROUND((@bucket_size * 11) / @unit_div), @unit, \')\'), REPEAT(\' \', @max_label_size - LENGTH(@label_inner)), @count_in_bucket := IFNULL((SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution AS b1  WHERE b1.avg_us > @bucket_size * 10 AND b1.avg_us <= @bucket_size * 11), 0)), REPEAT(\' \', @max_label_len - LENGTH(@label)), \'| \', IFNULL(REPEAT(IF(@count_in_bucket < @one_unit, \'.\', IF(@count_in_bucket < @two_unit, \'*\', \'#\')),  	             IF(@count_in_bucket < @one_unit, @count_in_bucket, 	             	IF(@count_in_bucket < @two_unit, @count_in_bucket / 2, @count_in_bucket / 3))), \'\'), @label := CONCAT(@label_inner := CONCAT(\'
(\', ROUND((@bucket_size * 11) / @unit_div), \' - \', ROUND((@bucket_size * 12) / @unit_div), @unit, \')\'), REPEAT(\' \', @max_label_size - LENGTH(@label_inner)), @count_in_bucket := IFNULL((SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution AS b1  WHERE b1.avg_us > @bucket_size * 11 AND b1.avg_us <= @bucket_size * 12), 0)), REPEAT(\' \', @max_label_len - LENGTH(@label)), \'| \', IFNULL(REPEAT(IF(@count_in_bucket < @one_unit, \'.\', IF(@count_in_bucket < @two_unit, \'*\', \'#\')),  	             IF(@count_in_bucket < @one_unit, @count_in_bucket, 	             	IF(@count_in_bucket < @two_unit, @count_in_bucket / 2, @count_in_bucket / 3))), \'\'), @label := CONCAT(@label_inner := CONCAT(\'
(\', ROUND((@bucket_size * 12) / @unit_div), \' - \', ROUND((@bucket_size * 13) / @unit_div), @unit, \')\'), REPEAT(\' \', @max_label_size - LENGTH(@label_inner)), @count_in_bucket := IFNULL((SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution AS b1  WHERE b1.avg_us > @bucket_size * 12 AND b1.avg_us <= @bucket_size * 13), 0)), REPEAT(\' \', @max_label_len - LENGTH(@label)), \'| \', IFNULL(REPEAT(IF(@count_in_bucket < @one_unit, \'.\', IF(@count_in_bucket < @two_unit, \'*\', \'#\')),  	             IF(@count_in_bucket < @one_unit, @count_in_bucket, 	             	IF(@count_in_bucket < @two_unit, @count_in_bucket / 2, @count_in_bucket / 3))), \'\'), @label := CONCAT(@label_inner := CONCAT(\'
(\', ROUND((@bucket_size * 13) / @unit_div), \' - \', ROUND((@bucket_size * 14) / @unit_div), @unit, \')\'), REPEAT(\' \', @max_label_size - LENGTH(@label_inner)), @count_in_bucket := IFNULL((SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution AS b1  WHERE b1.avg_us > @bucket_size * 13 AND b1.avg_us <= @bucket_size * 14), 0)), REPEAT(\' \', @max_label_len - LENGTH(@label)), \'| \', IFNULL(REPEAT(IF(@count_in_bucket < @one_unit, \'.\', IF(@count_in_bucket < @two_unit, \'*\', \'#\')),  	             IF(@count_in_bucket < @one_unit, @count_in_bucket, 	             	IF(@count_in_bucket < @two_unit, @count_in_bucket / 2, @count_in_bucket / 3))), \'\'), @label := CONCAT(@label_inner := CONCAT(\'
(\', ROUND((@bucket_size * 14) / @unit_div), \' - \', ROUND((@bucket_size * 15) / @unit_div), @unit, \')\'), REPEAT(\' \', @max_label_size - LENGTH(@label_inner)), @count_in_bucket := IFNULL((SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution AS b1  WHERE b1.avg_us > @bucket_size * 14 AND b1.avg_us <= @bucket_size * 15), 0)), REPEAT(\' \', @max_label_len - LENGTH(@label)), \'| \', IFNULL(REPEAT(IF(@count_in_bucket < @one_unit, \'.\', IF(@count_in_bucket < @two_unit, \'*\', \'#\')),  	             IF(@count_in_bucket < @one_unit, @count_in_bucket, 	             	IF(@count_in_bucket < @two_unit, @count_in_bucket / 2, @count_in_bucket / 3))), \'\'), @label := CONCAT(@label_inner := CONCAT(\'
(\', ROUND((@bucket_size * 15) / @unit_div), \' - \', ROUND((@bucket_size * 16) / @unit_div), @unit, \')\'), REPEAT(\' \', @max_label_size - LENGTH(@label_inner)), @count_in_bucket := IFNULL((SELECT SUM(cnt) FROM sys.x$ps_digest_avg_latency_distribution AS b1  WHERE b1.avg_us > @bucket_size * 15 AND b1.avg_us <= @bucket_size * 16), 0)), REPEAT(\' \', @max_label_len - LENGTH(@label)), \'| \', IFNULL(REPEAT(IF(@count_in_bucket < @one_unit, \'.\', IF(@count_in_bucket < @two_unit, \'*\', \'#\')),  	             IF(@count_in_bucket < @one_unit, @count_in_bucket, 	             	IF(@count_in_bucket < @two_unit, @count_in_bucket / 2, @count_in_bucket / 3))), \'\'),  \'

  Total Statements: \', @total_queries, \'; Buckets: \', @buckets , \'; Bucket Size: \', ROUND(@bucket_size / @unit_div) , \' \', @unit, \';
\'  ) AS `Performance Schema Statement Digest Average Latency Histogram`;  END'], 26 => ['db' => 'sys', 'name' => 'ps_trace_statement_digest', 'type' => 'PROCEDURE', 'specific_name' => 'ps_trace_statement_digest', 'language' => 'SQL', 'sql_data_access' => 'MODIFIES_SQL_DATA', 'is_deterministic' => 'NO', 'security_type' => 'INVOKER', 'param_list' => ' IN in_digest VARCHAR(32), IN in_runtime INT,  IN in_interval DECIMAL(2,2), IN in_start_fresh BOOLEAN, IN in_auto_enable BOOLEAN ', 'returns' => '', 'body' => 'BEGIN  DECLARE v_start_fresh BOOLEAN DEFAULT false; DECLARE v_auto_enable BOOLEAN DEFAULT false; DECLARE v_explain     BOOLEAN DEFAULT true; DECLARE v_this_thread_enabed ENUM(\'YES\', \'NO\'); DECLARE v_runtime INT DEFAULT 0; DECLARE v_start INT DEFAULT 0; DECLARE v_found_stmts INT;  SET @log_bin := @@sql_log_bin; SET sql_log_bin = 0;  SELECT INSTRUMENTED INTO v_this_thread_enabed FROM performance_schema.threads WHERE PROCESSLIST_ID = CONNECTION_ID(); CALL sys.ps_setup_disable_thread(CONNECTION_ID());  DROP TEMPORARY TABLE IF EXISTS stmt_trace; CREATE TEMPORARY TABLE stmt_trace ( thread_id BIGINT UNSIGNED, timer_start BIGINT UNSIGNED, event_id BIGINT UNSIGNED, sql_text longtext, timer_wait BIGINT UNSIGNED, lock_time BIGINT UNSIGNED, errors BIGINT UNSIGNED, mysql_errno INT, rows_sent BIGINT UNSIGNED, rows_affected BIGINT UNSIGNED, rows_examined BIGINT UNSIGNED, created_tmp_tables BIGINT UNSIGNED, created_tmp_disk_tables BIGINT UNSIGNED, no_index_used BIGINT UNSIGNED, PRIMARY KEY (thread_id, timer_start) );  DROP TEMPORARY TABLE IF EXISTS stmt_stages; CREATE TEMPORARY TABLE stmt_stages ( event_id BIGINT UNSIGNED, stmt_id BIGINT UNSIGNED, event_name VARCHAR(128), timer_wait BIGINT UNSIGNED, PRIMARY KEY (event_id) );  SET v_start_fresh = in_start_fresh; IF v_start_fresh THEN TRUNCATE TABLE performance_schema.events_statements_history_long; TRUNCATE TABLE performance_schema.events_stages_history_long; END IF;  SET v_auto_enable = in_auto_enable; IF v_auto_enable THEN CALL sys.ps_setup_save(0);  UPDATE performance_schema.threads SET INSTRUMENTED = IF(PROCESSLIST_ID IS NOT NULL, \'YES\', \'NO\');  UPDATE performance_schema.setup_consumers SET ENABLED = \'YES\' WHERE NAME NOT LIKE \'%\_history\' AND NAME NOT LIKE \'events_wait%\' AND NAME NOT LIKE \'events_transactions%\' AND NAME <> \'statements_digest\';  UPDATE performance_schema.setup_instruments SET ENABLED = \'YES\', TIMED   = \'YES\' WHERE NAME LIKE \'statement/%\' OR NAME LIKE \'stage/%\'; END IF;  WHILE v_runtime < in_runtime DO SELECT UNIX_TIMESTAMP() INTO v_start;  INSERT IGNORE INTO stmt_trace SELECT thread_id, timer_start, event_id, sql_text, timer_wait, lock_time, errors, mysql_errno,  rows_sent, rows_affected, rows_examined, created_tmp_tables, created_tmp_disk_tables, no_index_used FROM performance_schema.events_statements_history_long WHERE digest = in_digest;  INSERT IGNORE INTO stmt_stages SELECT stages.event_id, stmt_trace.event_id, stages.event_name, stages.timer_wait FROM performance_schema.events_stages_history_long AS stages JOIN stmt_trace ON stages.nesting_event_id = stmt_trace.event_id;  SELECT SLEEP(in_interval) INTO @sleep; SET v_runtime = v_runtime + (UNIX_TIMESTAMP() - v_start); END WHILE;  SELECT "SUMMARY STATISTICS";  SELECT COUNT(*) executions, sys.format_time(SUM(timer_wait)) AS exec_time, sys.format_time(SUM(lock_time)) AS lock_time, SUM(rows_sent) AS rows_sent, SUM(rows_affected) AS rows_affected, SUM(rows_examined) AS rows_examined, SUM(created_tmp_tables) AS tmp_tables, SUM(no_index_used) AS full_scans FROM stmt_trace;  SELECT event_name, COUNT(*) as count, sys.format_time(SUM(timer_wait)) as latency FROM stmt_stages GROUP BY event_name ORDER BY SUM(timer_wait) DESC;  SELECT "LONGEST RUNNING STATEMENT";  SELECT thread_id, sys.format_time(timer_wait) AS exec_time, sys.format_time(lock_time) AS lock_time, rows_sent, rows_affected, rows_examined, created_tmp_tables AS tmp_tables, no_index_used AS full_scan FROM stmt_trace ORDER BY timer_wait DESC LIMIT 1;  SELECT sql_text FROM stmt_trace ORDER BY timer_wait DESC LIMIT 1;  SELECT sql_text, event_id INTO @sql, @sql_id FROM stmt_trace ORDER BY timer_wait DESC LIMIT 1;  IF (@sql_id IS NOT NULL) THEN SELECT event_name, sys.format_time(timer_wait) as latency FROM stmt_stages WHERE stmt_id = @sql_id ORDER BY event_id; END IF;  DROP TEMPORARY TABLE stmt_trace; DROP TEMPORARY TABLE stmt_stages;  IF (@sql IS NOT NULL) THEN SET @stmt := CONCAT("EXPLAIN FORMAT=JSON ", @sql); BEGIN DECLARE CONTINUE HANDLER FOR 1064, 1146 SET v_explain = false;  PREPARE explain_stmt FROM @stmt; END;  IF (v_explain) THEN EXECUTE explain_stmt; DEALLOCATE PREPARE explain_stmt; END IF; END IF;  IF v_auto_enable THEN CALL sys.ps_setup_reload_saved(); END IF; IF (v_this_thread_enabed = \'YES\') THEN CALL sys.ps_setup_enable_thread(CONNECTION_ID()); END IF;  SET sql_log_bin = @log_bin; END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Traces all instrumentation within Performance Schema for a specific
 Statement Digest. 
 
 When finding a statement of interest within the 
 performance_schema.events_statements_summary_by_digest table, feed
 the DIGEST MD5 value in to this procedure, set how long to poll for, 
 and at what interval to poll, and it will generate a report of all 
 statistics tracked within Performance Schema for that digest for the
 interval.
 
 It will also attempt to generate an EXPLAIN for the longest running 
 example of the digest during the interval. Note this may fail, as:
 
 * Performance Schema truncates long SQL_TEXT values (and hence the 
 EXPLAIN will fail due to parse errors)
 * the default schema is sys (so tables that are not fully qualified
 in the query may not be found)
 * some queries such as SHOW are not supported in EXPLAIN.
 
 When the EXPLAIN fails, the error will be ignored and no EXPLAIN
 output generated.
 
 Requires the SUPER privilege for "SET sql_log_bin = 0;".
 
 Parameters
 
 in_digest (VARCHAR(32)):
 The statement digest identifier you would like to analyze
 in_runtime (INT):
 The number of seconds to run analysis for
 in_interval (DECIMAL(2,2)):
 The interval (in seconds, may be fractional) at which to try
 and take snapshots
 in_start_fresh (BOOLEAN):
 Whether to TRUNCATE the events_statements_history_long and
 events_stages_history_long tables before starting
 in_auto_enable (BOOLEAN):
 Whether to automatically turn on required consumers
 
 Example
 
 mysql> call ps_trace_statement_digest(\'891ec6860f98ba46d89dd20b0c03652c\', 10, 0.1, true, true);
 +--------------------+
 | SUMMARY STATISTICS |
 +--------------------+
 | SUMMARY STATISTICS |
 +--------------------+
 1 row in set (9.11 sec)
 
 +------------+-----------+-----------+-----------+---------------+------------+------------+
 | executions | exec_time | lock_time | rows_sent | rows_examined | tmp_tables | full_scans |
 +------------+-----------+-----------+-----------+---------------+------------+------------+
 |         21 | 4.11 ms   | 2.00 ms   |         0 |            21 |          0 |          0 |
 +------------+-----------+-----------+-----------+---------------+------------+------------+
 1 row in set (9.11 sec)
 
 +------------------------------------------+-------+-----------+
 | event_name                               | count | latency   |
 +------------------------------------------+-------+-----------+
 | stage/sql/checking query cache for query |    16 | 724.37 us |
 | stage/sql/statistics                     |    16 | 546.92 us |
 | stage/sql/freeing items                  |    18 | 520.11 us |
 | stage/sql/init                           |    51 | 466.80 us |
 ...
 | stage/sql/cleaning up                    |    18 | 11.92 us  |
 | stage/sql/executing                      |    16 | 6.95 us   |
 +------------------------------------------+-------+-----------+
 17 rows in set (9.12 sec)
 
 +---------------------------+
 | LONGEST RUNNING STATEMENT |
 +---------------------------+
 | LONGEST RUNNING STATEMENT |
 +---------------------------+
 1 row in set (9.16 sec)
 
 +-----------+-----------+-----------+-----------+---------------+------------+-----------+
 | thread_id | exec_time | lock_time | rows_sent | rows_examined | tmp_tables | full_scan |
 +-----------+-----------+-----------+-----------+---------------+------------+-----------+
 |    166646 | 618.43 us | 1.00 ms   |         0 |             1 |          0 |         0 |
 +-----------+-----------+-----------+-----------+---------------+------------+-----------+
 1 row in set (9.16 sec)
 
 // Truncated for clarity...
 +-----------------------------------------------------------------+
 | sql_text                                                        |
 +-----------------------------------------------------------------+
 | select hibeventhe0_.id as id1382_, hibeventhe0_.createdTime ... |
 +-----------------------------------------------------------------+
 1 row in set (9.17 sec)
 
 +------------------------------------------+-----------+
 | event_name                               | latency   |
 +------------------------------------------+-----------+
 | stage/sql/init                           | 8.61 us   |
 | stage/sql/Waiting for query cache lock   | 453.23 us |
 | stage/sql/init                           | 331.07 ns |
 | stage/sql/checking query cache for query | 43.04 us  |
 ...
 | stage/sql/freeing items                  | 30.46 us  |
 | stage/sql/cleaning up                    | 662.13 ns |
 +------------------------------------------+-----------+
 18 rows in set (9.23 sec)
 
 +----+-------------+--------------+-------+---------------+-----------+---------+-------------+------+-------+
 | id | select_type | table        | type  | possible_keys | key       | key_len | ref         | rows | Extra |
 +----+-------------+--------------+-------+---------------+-----------+---------+-------------+------+-------+
 |  1 | SIMPLE      | hibeventhe0_ | const | fixedTime     | fixedTime | 775     | const,const |    1 | NULL  |
 +----+-------------+--------------+-------+---------------+-----------+---------+-------------+------+-------+
 1 row in set (9.27 sec)
 
 Query OK, 0 rows affected (9.28 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN  DECLARE v_start_fresh BOOLEAN DEFAULT false; DECLARE v_auto_enable BOOLEAN DEFAULT false; DECLARE v_explain     BOOLEAN DEFAULT true; DECLARE v_this_thread_enabed ENUM(\'YES\', \'NO\'); DECLARE v_runtime INT DEFAULT 0; DECLARE v_start INT DEFAULT 0; DECLARE v_found_stmts INT;  SET @log_bin := @@sql_log_bin; SET sql_log_bin = 0;  SELECT INSTRUMENTED INTO v_this_thread_enabed FROM performance_schema.threads WHERE PROCESSLIST_ID = CONNECTION_ID(); CALL sys.ps_setup_disable_thread(CONNECTION_ID());  DROP TEMPORARY TABLE IF EXISTS stmt_trace; CREATE TEMPORARY TABLE stmt_trace ( thread_id BIGINT UNSIGNED, timer_start BIGINT UNSIGNED, event_id BIGINT UNSIGNED, sql_text longtext, timer_wait BIGINT UNSIGNED, lock_time BIGINT UNSIGNED, errors BIGINT UNSIGNED, mysql_errno INT, rows_sent BIGINT UNSIGNED, rows_affected BIGINT UNSIGNED, rows_examined BIGINT UNSIGNED, created_tmp_tables BIGINT UNSIGNED, created_tmp_disk_tables BIGINT UNSIGNED, no_index_used BIGINT UNSIGNED, PRIMARY KEY (thread_id, timer_start) );  DROP TEMPORARY TABLE IF EXISTS stmt_stages; CREATE TEMPORARY TABLE stmt_stages ( event_id BIGINT UNSIGNED, stmt_id BIGINT UNSIGNED, event_name VARCHAR(128), timer_wait BIGINT UNSIGNED, PRIMARY KEY (event_id) );  SET v_start_fresh = in_start_fresh; IF v_start_fresh THEN TRUNCATE TABLE performance_schema.events_statements_history_long; TRUNCATE TABLE performance_schema.events_stages_history_long; END IF;  SET v_auto_enable = in_auto_enable; IF v_auto_enable THEN CALL sys.ps_setup_save(0);  UPDATE performance_schema.threads SET INSTRUMENTED = IF(PROCESSLIST_ID IS NOT NULL, \'YES\', \'NO\');  UPDATE performance_schema.setup_consumers SET ENABLED = \'YES\' WHERE NAME NOT LIKE \'%\_history\' AND NAME NOT LIKE \'events_wait%\' AND NAME NOT LIKE \'events_transactions%\' AND NAME <> \'statements_digest\';  UPDATE performance_schema.setup_instruments SET ENABLED = \'YES\', TIMED   = \'YES\' WHERE NAME LIKE \'statement/%\' OR NAME LIKE \'stage/%\'; END IF;  WHILE v_runtime < in_runtime DO SELECT UNIX_TIMESTAMP() INTO v_start;  INSERT IGNORE INTO stmt_trace SELECT thread_id, timer_start, event_id, sql_text, timer_wait, lock_time, errors, mysql_errno,  rows_sent, rows_affected, rows_examined, created_tmp_tables, created_tmp_disk_tables, no_index_used FROM performance_schema.events_statements_history_long WHERE digest = in_digest;  INSERT IGNORE INTO stmt_stages SELECT stages.event_id, stmt_trace.event_id, stages.event_name, stages.timer_wait FROM performance_schema.events_stages_history_long AS stages JOIN stmt_trace ON stages.nesting_event_id = stmt_trace.event_id;  SELECT SLEEP(in_interval) INTO @sleep; SET v_runtime = v_runtime + (UNIX_TIMESTAMP() - v_start); END WHILE;  SELECT "SUMMARY STATISTICS";  SELECT COUNT(*) executions, sys.format_time(SUM(timer_wait)) AS exec_time, sys.format_time(SUM(lock_time)) AS lock_time, SUM(rows_sent) AS rows_sent, SUM(rows_affected) AS rows_affected, SUM(rows_examined) AS rows_examined, SUM(created_tmp_tables) AS tmp_tables, SUM(no_index_used) AS full_scans FROM stmt_trace;  SELECT event_name, COUNT(*) as count, sys.format_time(SUM(timer_wait)) as latency FROM stmt_stages GROUP BY event_name ORDER BY SUM(timer_wait) DESC;  SELECT "LONGEST RUNNING STATEMENT";  SELECT thread_id, sys.format_time(timer_wait) AS exec_time, sys.format_time(lock_time) AS lock_time, rows_sent, rows_affected, rows_examined, created_tmp_tables AS tmp_tables, no_index_used AS full_scan FROM stmt_trace ORDER BY timer_wait DESC LIMIT 1;  SELECT sql_text FROM stmt_trace ORDER BY timer_wait DESC LIMIT 1;  SELECT sql_text, event_id INTO @sql, @sql_id FROM stmt_trace ORDER BY timer_wait DESC LIMIT 1;  IF (@sql_id IS NOT NULL) THEN SELECT event_name, sys.format_time(timer_wait) as latency FROM stmt_stages WHERE stmt_id = @sql_id ORDER BY event_id; END IF;  DROP TEMPORARY TABLE stmt_trace; DROP TEMPORARY TABLE stmt_stages;  IF (@sql IS NOT NULL) THEN SET @stmt := CONCAT("EXPLAIN FORMAT=JSON ", @sql); BEGIN DECLARE CONTINUE HANDLER FOR 1064, 1146 SET v_explain = false;  PREPARE explain_stmt FROM @stmt; END;  IF (v_explain) THEN EXECUTE explain_stmt; DEALLOCATE PREPARE explain_stmt; END IF; END IF;  IF v_auto_enable THEN CALL sys.ps_setup_reload_saved(); END IF; IF (v_this_thread_enabed = \'YES\') THEN CALL sys.ps_setup_enable_thread(CONNECTION_ID()); END IF;  SET sql_log_bin = @log_bin; END'], 27 => ['db' => 'sys', 'name' => 'ps_trace_thread', 'type' => 'PROCEDURE', 'specific_name' => 'ps_trace_thread', 'language' => 'SQL', 'sql_data_access' => 'MODIFIES_SQL_DATA', 'is_deterministic' => 'NO', 'security_type' => 'INVOKER', 'param_list' => ' IN in_thread_id BIGINT UNSIGNED, IN in_outfile VARCHAR(255), IN in_max_runtime DECIMAL(20,2), IN in_interval DECIMAL(20,2), IN in_start_fresh BOOLEAN, IN in_auto_setup BOOLEAN, IN in_debug BOOLEAN ', 'returns' => '', 'body' => 'BEGIN DECLARE v_done bool DEFAULT FALSE; DECLARE v_start, v_runtime DECIMAL(20,2) DEFAULT 0.0; DECLARE v_min_event_id bigint unsigned DEFAULT 0; DECLARE v_this_thread_enabed ENUM(\'YES\', \'NO\'); DECLARE v_event longtext; DECLARE c_stack CURSOR FOR SELECT CONCAT(IF(nesting_event_id IS NOT NULL, CONCAT(nesting_event_id, \' -> \'), \'\'),  event_id, \'; \', event_id, \' [label="\', \'(\', sys.format_time(timer_wait), \') \', IF (event_name NOT LIKE \'wait/io%\',  SUBSTRING_INDEX(event_name, \'/\', -2),  IF (event_name NOT LIKE \'wait/io/file%\' OR event_name NOT LIKE \'wait/io/socket%\', SUBSTRING_INDEX(event_name, \'/\', -4), event_name) ), IF (event_name LIKE \'transaction\', IFNULL(CONCAT(\'\\n\', wait_info), \'\'), \'\'), IF (event_name LIKE \'statement/%\', IFNULL(CONCAT(\'\\n\', wait_info), \'\'), \'\'), IF (in_debug AND event_name LIKE \'wait%\', wait_info, \'\'), \'", \',  CASE WHEN event_name LIKE \'wait/io/file%\' THEN  \'shape=box, style=filled, color=red\' WHEN event_name LIKE \'wait/io/table%\' THEN  \'shape=box, style=filled, color=green\' WHEN event_name LIKE \'wait/io/socket%\' THEN \'shape=box, style=filled, color=yellow\' WHEN event_name LIKE \'wait/synch/mutex%\' THEN \'style=filled, color=lightskyblue\' WHEN event_name LIKE \'wait/synch/cond%\' THEN \'style=filled, color=darkseagreen3\' WHEN event_name LIKE \'wait/synch/rwlock%\' THEN \'style=filled, color=orchid\' WHEN event_name LIKE \'wait/synch/sxlock%\' THEN \'style=filled, color=palevioletred\'  WHEN event_name LIKE \'wait/lock%\' THEN \'shape=box, style=filled, color=tan\' WHEN event_name LIKE \'statement/%\' THEN CONCAT(\'shape=box, style=bold\', CASE WHEN event_name LIKE \'statement/com/%\' THEN \' style=filled, color=darkseagreen\' ELSE IF((timer_wait/1000000000000) > @@long_query_time,  \' style=filled, color=red\',  \' style=filled, color=lightblue\') END ) WHEN event_name LIKE \'transaction\' THEN \'shape=box, style=filled, color=lightblue3\' WHEN event_name LIKE \'stage/%\' THEN \'style=filled, color=slategray3\' WHEN event_name LIKE \'%idle%\' THEN \'shape=box, style=filled, color=firebrick3\' ELSE \'\' END, \'];\n\' ) event, event_id FROM ( (SELECT thread_id, event_id, event_name, timer_wait, timer_start, nesting_event_id, CONCAT(\'trx_id: \',  IFNULL(trx_id, \'\'), \'\\n\', \'gtid: \', IFNULL(gtid, \'\'), \'\\n\', \'state: \', state, \'\\n\', \'mode: \', access_mode, \'\\n\', \'isolation: \', isolation_level, \'\\n\', \'autocommit: \', autocommit, \'\\n\', \'savepoints: \', number_of_savepoints, \'\\n\' ) AS wait_info FROM performance_schema.events_transactions_history_long WHERE thread_id = in_thread_id AND event_id > v_min_event_id) UNION (SELECT thread_id, event_id, event_name, timer_wait, timer_start, nesting_event_id,  CONCAT(\'statement: \', sql_text, \'\\n\', \'errors: \', errors, \'\\n\', \'warnings: \', warnings, \'\\n\', \'lock time: \', sys.format_time(lock_time),\'\\n\', \'rows affected: \', rows_affected, \'\\n\', \'rows sent: \', rows_sent, \'\\n\', \'rows examined: \', rows_examined, \'\\n\', \'tmp tables: \', created_tmp_tables, \'\\n\', \'tmp disk tables: \', created_tmp_disk_tables, \'\\n\' \'select scan: \', select_scan, \'\\n\', \'select full join: \', select_full_join, \'\\n\', \'select full range join: \', select_full_range_join, \'\\n\', \'select range: \', select_range, \'\\n\', \'select range check: \', select_range_check, \'\\n\',  \'sort merge passes: \', sort_merge_passes, \'\\n\', \'sort rows: \', sort_rows, \'\\n\', \'sort range: \', sort_range, \'\\n\', \'sort scan: \', sort_scan, \'\\n\', \'no index used: \', IF(no_index_used, \'TRUE\', \'FALSE\'), \'\\n\', \'no good index used: \', IF(no_good_index_used, \'TRUE\', \'FALSE\'), \'\\n\' ) AS wait_info FROM performance_schema.events_statements_history_long WHERE thread_id = in_thread_id AND event_id > v_min_event_id) UNION (SELECT thread_id, event_id, event_name, timer_wait, timer_start, nesting_event_id, null AS wait_info FROM performance_schema.events_stages_history_long  WHERE thread_id = in_thread_id AND event_id > v_min_event_id) UNION  (SELECT thread_id, event_id,  CONCAT(event_name,  IF(event_name NOT LIKE \'wait/synch/mutex%\', IFNULL(CONCAT(\' - \', operation), \'\'), \'\'),  IF(number_of_bytes IS NOT NULL, CONCAT(\' \', number_of_bytes, \' bytes\'), \'\'), IF(event_name LIKE \'wait/io/file%\', \'\\n\', \'\'), IF(object_schema IS NOT NULL, CONCAT(\'\\nObject: \', object_schema, \'.\'), \'\'),  IF(object_name IS NOT NULL,  IF (event_name LIKE \'wait/io/socket%\', CONCAT(\'\\n\', IF (object_name LIKE \':0%\', @@socket, object_name)), object_name), \'\' ), IF(index_name IS NOT NULL, CONCAT(\' Index: \', index_name), \'\'), \'\\n\' ) AS event_name, timer_wait, timer_start, nesting_event_id, source AS wait_info FROM performance_schema.events_waits_history_long WHERE thread_id = in_thread_id AND event_id > v_min_event_id) ) events  ORDER BY event_id; DECLARE CONTINUE HANDLER FOR NOT FOUND SET v_done = TRUE;  SET @log_bin := @@sql_log_bin; SET sql_log_bin = 0;  SELECT INSTRUMENTED INTO v_this_thread_enabed FROM performance_schema.threads WHERE PROCESSLIST_ID = CONNECTION_ID(); CALL sys.ps_setup_disable_thread(CONNECTION_ID());  IF (in_auto_setup) THEN CALL sys.ps_setup_save(0);  DELETE FROM performance_schema.setup_actors;  UPDATE performance_schema.threads SET INSTRUMENTED = IF(THREAD_ID = in_thread_id, \'YES\', \'NO\');  UPDATE performance_schema.setup_consumers SET ENABLED = \'YES\' WHERE NAME NOT LIKE \'%\_history\';  UPDATE performance_schema.setup_instruments SET ENABLED = \'YES\', TIMED   = \'YES\'; END IF;  IF (in_start_fresh) THEN TRUNCATE performance_schema.events_transactions_history_long; TRUNCATE performance_schema.events_statements_history_long; TRUNCATE performance_schema.events_stages_history_long; TRUNCATE performance_schema.events_waits_history_long; END IF;  DROP TEMPORARY TABLE IF EXISTS tmp_events; CREATE TEMPORARY TABLE tmp_events ( event_id bigint unsigned NOT NULL, event longblob, PRIMARY KEY (event_id) );  INSERT INTO tmp_events VALUES (0, CONCAT(\'digraph events { rankdir=LR; nodesep=0.10;\n\', \'// Stack created .....: \', NOW(), \'\n\', \'// MySQL version .....: \', VERSION(), \'\n\', \'// MySQL hostname ....: \', @@hostname, \'\n\', \'// MySQL port ........: \', @@port, \'\n\', \'// MySQL socket ......: \', @@socket, \'\n\', \'// MySQL user ........: \', CURRENT_USER(), \'\n\'));  SELECT CONCAT(\'Data collection starting for THREAD_ID = \', in_thread_id) AS \'Info\';  SET v_min_event_id = 0, v_start        = UNIX_TIMESTAMP(), in_interval    = IFNULL(in_interval, 1.00), in_max_runtime = IFNULL(in_max_runtime, 60.00);  WHILE (v_runtime < in_max_runtime AND (SELECT INSTRUMENTED FROM performance_schema.threads WHERE THREAD_ID = in_thread_id) = \'YES\') DO SET v_done = FALSE; OPEN c_stack; c_stack_loop: LOOP FETCH c_stack INTO v_event, v_min_event_id; IF v_done THEN LEAVE c_stack_loop; END IF;  IF (LENGTH(v_event) > 0) THEN INSERT INTO tmp_events VALUES (v_min_event_id, v_event); END IF; END LOOP; CLOSE c_stack;  SELECT SLEEP(in_interval) INTO @sleep; SET v_runtime = (UNIX_TIMESTAMP() - v_start); END WHILE;  INSERT INTO tmp_events VALUES (v_min_event_id+1, \'}\');  SET @query = CONCAT(\'SELECT event FROM tmp_events ORDER BY event_id INTO OUTFILE \'\'\', in_outfile, \'\'\' FIELDS ESCAPED BY \'\'\'\' LINES TERMINATED BY \'\'\'\'\'); PREPARE stmt_output FROM @query; EXECUTE stmt_output; DEALLOCATE PREPARE stmt_output;  SELECT CONCAT(\'Stack trace written to \', in_outfile) AS \'Info\'; SELECT CONCAT(\'dot -Tpdf -o /tmp/stack_\', in_thread_id, \'.pdf \', in_outfile) AS \'Convert to PDF\'; SELECT CONCAT(\'dot -Tpng -o /tmp/stack_\', in_thread_id, \'.png \', in_outfile) AS \'Convert to PNG\'; DROP TEMPORARY TABLE tmp_events;  IF (in_auto_setup) THEN CALL sys.ps_setup_reload_saved(); END IF; IF (v_this_thread_enabed = \'YES\') THEN CALL sys.ps_setup_enable_thread(CONNECTION_ID()); END IF;  SET sql_log_bin = @log_bin; END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Dumps all data within Performance Schema for an instrumented thread,
 to create a DOT formatted graph file. 
 
 Each resultset returned from the procedure should be used for a complete graph
 
 Requires the SUPER privilege for "SET sql_log_bin = 0;".
 
 Parameters
 
 in_thread_id (BIGINT UNSIGNED):
 The thread that you would like a stack trace for
 in_outfile  (VARCHAR(255)):
 The filename the dot file will be written to
 in_max_runtime (DECIMAL(20,2)):
 The maximum time to keep collecting data.
 Use NULL to get the default which is 60 seconds.
 in_interval (DECIMAL(20,2)): 
 How long to sleep between data collections. 
 Use NULL to get the default which is 1 second.
 in_start_fresh (BOOLEAN):
 Whether to reset all Performance Schema data before tracing.
 in_auto_setup (BOOLEAN):
 Whether to disable all other threads and enable all consumers/instruments. 
 This will also reset the settings at the end of the run.
 in_debug (BOOLEAN):
 Whether you would like to include file:lineno in the graph
 
 Example
 
 mysql> CALL sys.ps_trace_thread(25, CONCAT(\'/tmp/stack-\', REPLACE(NOW(), \' \', \'-\'), \'.dot\'), NULL, NULL, TRUE, TRUE, TRUE);
 +-------------------+
 | summary           |
 +-------------------+
 | Disabled 1 thread |
 +-------------------+
 1 row in set (0.00 sec)
 
 +---------------------------------------------+
 | Info                                        |
 +---------------------------------------------+
 | Data collection starting for THREAD_ID = 25 |
 +---------------------------------------------+
 1 row in set (0.03 sec)
 
 +-----------------------------------------------------------+
 | Info                                                      |
 +-----------------------------------------------------------+
 | Stack trace written to /tmp/stack-2014-02-16-21:18:41.dot |
 +-----------------------------------------------------------+
 1 row in set (60.07 sec)
 
 +-------------------------------------------------------------------+
 | Convert to PDF                                                    |
 +-------------------------------------------------------------------+
 | dot -Tpdf -o /tmp/stack_25.pdf /tmp/stack-2014-02-16-21:18:41.dot |
 +-------------------------------------------------------------------+
 1 row in set (60.07 sec)
 
 +-------------------------------------------------------------------+
 | Convert to PNG                                                    |
 +-------------------------------------------------------------------+
 | dot -Tpng -o /tmp/stack_25.png /tmp/stack-2014-02-16-21:18:41.dot |
 +-------------------------------------------------------------------+
 1 row in set (60.07 sec)
 
 +------------------+
 | summary          |
 +------------------+
 | Enabled 1 thread |
 +------------------+
 1 row in set (60.32 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN DECLARE v_done bool DEFAULT FALSE; DECLARE v_start, v_runtime DECIMAL(20,2) DEFAULT 0.0; DECLARE v_min_event_id bigint unsigned DEFAULT 0; DECLARE v_this_thread_enabed ENUM(\'YES\', \'NO\'); DECLARE v_event longtext; DECLARE c_stack CURSOR FOR SELECT CONCAT(IF(nesting_event_id IS NOT NULL, CONCAT(nesting_event_id, \' -> \'), \'\'),  event_id, \'; \', event_id, \' [label="\', \'(\', sys.format_time(timer_wait), \') \', IF (event_name NOT LIKE \'wait/io%\',  SUBSTRING_INDEX(event_name, \'/\', -2),  IF (event_name NOT LIKE \'wait/io/file%\' OR event_name NOT LIKE \'wait/io/socket%\', SUBSTRING_INDEX(event_name, \'/\', -4), event_name) ), IF (event_name LIKE \'transaction\', IFNULL(CONCAT(\'\n\', wait_info), \'\'), \'\'), IF (event_name LIKE \'statement/%\', IFNULL(CONCAT(\'\n\', wait_info), \'\'), \'\'), IF (in_debug AND event_name LIKE \'wait%\', wait_info, \'\'), \'", \',  CASE WHEN event_name LIKE \'wait/io/file%\' THEN  \'shape=box, style=filled, color=red\' WHEN event_name LIKE \'wait/io/table%\' THEN  \'shape=box, style=filled, color=green\' WHEN event_name LIKE \'wait/io/socket%\' THEN \'shape=box, style=filled, color=yellow\' WHEN event_name LIKE \'wait/synch/mutex%\' THEN \'style=filled, color=lightskyblue\' WHEN event_name LIKE \'wait/synch/cond%\' THEN \'style=filled, color=darkseagreen3\' WHEN event_name LIKE \'wait/synch/rwlock%\' THEN \'style=filled, color=orchid\' WHEN event_name LIKE \'wait/synch/sxlock%\' THEN \'style=filled, color=palevioletred\'  WHEN event_name LIKE \'wait/lock%\' THEN \'shape=box, style=filled, color=tan\' WHEN event_name LIKE \'statement/%\' THEN CONCAT(\'shape=box, style=bold\', CASE WHEN event_name LIKE \'statement/com/%\' THEN \' style=filled, color=darkseagreen\' ELSE IF((timer_wait/1000000000000) > @@long_query_time,  \' style=filled, color=red\',  \' style=filled, color=lightblue\') END ) WHEN event_name LIKE \'transaction\' THEN \'shape=box, style=filled, color=lightblue3\' WHEN event_name LIKE \'stage/%\' THEN \'style=filled, color=slategray3\' WHEN event_name LIKE \'%idle%\' THEN \'shape=box, style=filled, color=firebrick3\' ELSE \'\' END, \'];
\' ) event, event_id FROM ( (SELECT thread_id, event_id, event_name, timer_wait, timer_start, nesting_event_id, CONCAT(\'trx_id: \',  IFNULL(trx_id, \'\'), \'\n\', \'gtid: \', IFNULL(gtid, \'\'), \'\n\', \'state: \', state, \'\n\', \'mode: \', access_mode, \'\n\', \'isolation: \', isolation_level, \'\n\', \'autocommit: \', autocommit, \'\n\', \'savepoints: \', number_of_savepoints, \'\n\' ) AS wait_info FROM performance_schema.events_transactions_history_long WHERE thread_id = in_thread_id AND event_id > v_min_event_id) UNION (SELECT thread_id, event_id, event_name, timer_wait, timer_start, nesting_event_id,  CONCAT(\'statement: \', sql_text, \'\n\', \'errors: \', errors, \'\n\', \'warnings: \', warnings, \'\n\', \'lock time: \', sys.format_time(lock_time),\'\n\', \'rows affected: \', rows_affected, \'\n\', \'rows sent: \', rows_sent, \'\n\', \'rows examined: \', rows_examined, \'\n\', \'tmp tables: \', created_tmp_tables, \'\n\', \'tmp disk tables: \', created_tmp_disk_tables, \'\n\' \'select scan: \', select_scan, \'\n\', \'select full join: \', select_full_join, \'\n\', \'select full range join: \', select_full_range_join, \'\n\', \'select range: \', select_range, \'\n\', \'select range check: \', select_range_check, \'\n\',  \'sort merge passes: \', sort_merge_passes, \'\n\', \'sort rows: \', sort_rows, \'\n\', \'sort range: \', sort_range, \'\n\', \'sort scan: \', sort_scan, \'\n\', \'no index used: \', IF(no_index_used, \'TRUE\', \'FALSE\'), \'\n\', \'no good index used: \', IF(no_good_index_used, \'TRUE\', \'FALSE\'), \'\n\' ) AS wait_info FROM performance_schema.events_statements_history_long WHERE thread_id = in_thread_id AND event_id > v_min_event_id) UNION (SELECT thread_id, event_id, event_name, timer_wait, timer_start, nesting_event_id, null AS wait_info FROM performance_schema.events_stages_history_long  WHERE thread_id = in_thread_id AND event_id > v_min_event_id) UNION  (SELECT thread_id, event_id,  CONCAT(event_name,  IF(event_name NOT LIKE \'wait/synch/mutex%\', IFNULL(CONCAT(\' - \', operation), \'\'), \'\'),  IF(number_of_bytes IS NOT NULL, CONCAT(\' \', number_of_bytes, \' bytes\'), \'\'), IF(event_name LIKE \'wait/io/file%\', \'\n\', \'\'), IF(object_schema IS NOT NULL, CONCAT(\'\nObject: \', object_schema, \'.\'), \'\'),  IF(object_name IS NOT NULL,  IF (event_name LIKE \'wait/io/socket%\', CONCAT(\'\n\', IF (object_name LIKE \':0%\', @@socket, object_name)), object_name), \'\' ), IF(index_name IS NOT NULL, CONCAT(\' Index: \', index_name), \'\'), \'\n\' ) AS event_name, timer_wait, timer_start, nesting_event_id, source AS wait_info FROM performance_schema.events_waits_history_long WHERE thread_id = in_thread_id AND event_id > v_min_event_id) ) events  ORDER BY event_id; DECLARE CONTINUE HANDLER FOR NOT FOUND SET v_done = TRUE;  SET @log_bin := @@sql_log_bin; SET sql_log_bin = 0;  SELECT INSTRUMENTED INTO v_this_thread_enabed FROM performance_schema.threads WHERE PROCESSLIST_ID = CONNECTION_ID(); CALL sys.ps_setup_disable_thread(CONNECTION_ID());  IF (in_auto_setup) THEN CALL sys.ps_setup_save(0);  DELETE FROM performance_schema.setup_actors;  UPDATE performance_schema.threads SET INSTRUMENTED = IF(THREAD_ID = in_thread_id, \'YES\', \'NO\');  UPDATE performance_schema.setup_consumers SET ENABLED = \'YES\' WHERE NAME NOT LIKE \'%\_history\';  UPDATE performance_schema.setup_instruments SET ENABLED = \'YES\', TIMED   = \'YES\'; END IF;  IF (in_start_fresh) THEN TRUNCATE performance_schema.events_transactions_history_long; TRUNCATE performance_schema.events_statements_history_long; TRUNCATE performance_schema.events_stages_history_long; TRUNCATE performance_schema.events_waits_history_long; END IF;  DROP TEMPORARY TABLE IF EXISTS tmp_events; CREATE TEMPORARY TABLE tmp_events ( event_id bigint unsigned NOT NULL, event longblob, PRIMARY KEY (event_id) );  INSERT INTO tmp_events VALUES (0, CONCAT(\'digraph events { rankdir=LR; nodesep=0.10;
\', \'// Stack created .....: \', NOW(), \'
\', \'// MySQL version .....: \', VERSION(), \'
\', \'// MySQL hostname ....: \', @@hostname, \'
\', \'// MySQL port ........: \', @@port, \'
\', \'// MySQL socket ......: \', @@socket, \'
\', \'// MySQL user ........: \', CURRENT_USER(), \'
\'));  SELECT CONCAT(\'Data collection starting for THREAD_ID = \', in_thread_id) AS \'Info\';  SET v_min_event_id = 0, v_start        = UNIX_TIMESTAMP(), in_interval    = IFNULL(in_interval, 1.00), in_max_runtime = IFNULL(in_max_runtime, 60.00);  WHILE (v_runtime < in_max_runtime AND (SELECT INSTRUMENTED FROM performance_schema.threads WHERE THREAD_ID = in_thread_id) = \'YES\') DO SET v_done = FALSE; OPEN c_stack; c_stack_loop: LOOP FETCH c_stack INTO v_event, v_min_event_id; IF v_done THEN LEAVE c_stack_loop; END IF;  IF (LENGTH(v_event) > 0) THEN INSERT INTO tmp_events VALUES (v_min_event_id, v_event); END IF; END LOOP; CLOSE c_stack;  SELECT SLEEP(in_interval) INTO @sleep; SET v_runtime = (UNIX_TIMESTAMP() - v_start); END WHILE;  INSERT INTO tmp_events VALUES (v_min_event_id+1, \'}\');  SET @query = CONCAT(\'SELECT event FROM tmp_events ORDER BY event_id INTO OUTFILE \'\', in_outfile, \'\' FIELDS ESCAPED BY \'\' LINES TERMINATED BY \'\'\'); PREPARE stmt_output FROM @query; EXECUTE stmt_output; DEALLOCATE PREPARE stmt_output;  SELECT CONCAT(\'Stack trace written to \', in_outfile) AS \'Info\'; SELECT CONCAT(\'dot -Tpdf -o /tmp/stack_\', in_thread_id, \'.pdf \', in_outfile) AS \'Convert to PDF\'; SELECT CONCAT(\'dot -Tpng -o /tmp/stack_\', in_thread_id, \'.png \', in_outfile) AS \'Convert to PNG\'; DROP TEMPORARY TABLE tmp_events;  IF (in_auto_setup) THEN CALL sys.ps_setup_reload_saved(); END IF; IF (v_this_thread_enabed = \'YES\') THEN CALL sys.ps_setup_enable_thread(CONNECTION_ID()); END IF;  SET sql_log_bin = @log_bin; END'], 28 => ['db' => 'sys', 'name' => 'ps_setup_disable_background_threads', 'type' => 'PROCEDURE', 'specific_name' => 'ps_setup_disable_background_threads', 'language' => 'SQL', 'sql_data_access' => 'MODIFIES_SQL_DATA', 'is_deterministic' => 'NO', 'security_type' => 'INVOKER', 'param_list' => '', 'returns' => '', 'body' => 'BEGIN UPDATE performance_schema.threads SET instrumented = \'NO\' WHERE type = \'BACKGROUND\';  SELECT CONCAT(\'Disabled \', @rows := ROW_COUNT(), \' background thread\', IF(@rows != 1, \'s\', \'\')) AS summary; END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Disable all background thread instrumentation within Performance Schema.
 
 Parameters
 
 None.
 
 Example
 
 mysql> CALL sys.ps_setup_disable_background_threads();
 +--------------------------------+
 | summary                        |
 +--------------------------------+
 | Disabled 18 background threads |
 +--------------------------------+
 1 row in set (0.00 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN UPDATE performance_schema.threads SET instrumented = \'NO\' WHERE type = \'BACKGROUND\';  SELECT CONCAT(\'Disabled \', @rows := ROW_COUNT(), \' background thread\', IF(@rows != 1, \'s\', \'\')) AS summary; END'], 29 => ['db' => 'sys', 'name' => 'ps_setup_disable_consumer', 'type' => 'PROCEDURE', 'specific_name' => 'ps_setup_disable_consumer', 'language' => 'SQL', 'sql_data_access' => 'MODIFIES_SQL_DATA', 'is_deterministic' => 'NO', 'security_type' => 'INVOKER', 'param_list' => ' IN consumer VARCHAR(128) ', 'returns' => '', 'body' => 'BEGIN UPDATE performance_schema.setup_consumers SET enabled = \'NO\' WHERE name LIKE CONCAT(\'%\', consumer, \'%\');  SELECT CONCAT(\'Disabled \', @rows := ROW_COUNT(), \' consumer\', IF(@rows != 1, \'s\', \'\')) AS summary; END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Disables consumers within Performance Schema 
 matching the input pattern.
 
 Parameters
 
 consumer (VARCHAR(128)):
 A LIKE pattern match (using "%consumer%") of consumers to disable
 
 Example
 
 To disable all consumers:
 
 mysql> CALL sys.ps_setup_disable_consumer(\'\');
 +--------------------------+
 | summary                  |
 +--------------------------+
 | Disabled 15 consumers    |
 +--------------------------+
 1 row in set (0.02 sec)
 
 To disable just the event_stage consumers:
 
 mysql> CALL sys.ps_setup_disable_comsumers(\'stage\');
 +------------------------+
 | summary                |
 +------------------------+
 | Disabled 3 consumers   |
 +------------------------+
 1 row in set (0.00 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN UPDATE performance_schema.setup_consumers SET enabled = \'NO\' WHERE name LIKE CONCAT(\'%\', consumer, \'%\');  SELECT CONCAT(\'Disabled \', @rows := ROW_COUNT(), \' consumer\', IF(@rows != 1, \'s\', \'\')) AS summary; END'], 30 => ['db' => 'sys', 'name' => 'ps_setup_disable_instrument', 'type' => 'PROCEDURE', 'specific_name' => 'ps_setup_disable_instrument', 'language' => 'SQL', 'sql_data_access' => 'MODIFIES_SQL_DATA', 'is_deterministic' => 'NO', 'security_type' => 'INVOKER', 'param_list' => ' IN in_pattern VARCHAR(128) ', 'returns' => '', 'body' => 'BEGIN UPDATE performance_schema.setup_instruments SET enabled = \'NO\', timed = \'NO\' WHERE name LIKE CONCAT(\'%\', in_pattern, \'%\');  SELECT CONCAT(\'Disabled \', @rows := ROW_COUNT(), \' instrument\', IF(@rows != 1, \'s\', \'\')) AS summary; END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Disables instruments within Performance Schema 
 matching the input pattern.
 
 Parameters
 
 in_pattern (VARCHAR(128)):
 A LIKE pattern match (using "%in_pattern%") of events to disable
 
 Example
 
 To disable all mutex instruments:
 
 mysql> CALL sys.ps_setup_disable_instrument(\'wait/synch/mutex\');
 +--------------------------+
 | summary                  |
 +--------------------------+
 | Disabled 155 instruments |
 +--------------------------+
 1 row in set (0.02 sec)
 
 To disable just a specific TCP/IP based network IO instrument:
 
 mysql> CALL sys.ps_setup_disable_instrument(\'wait/io/socket/sql/server_tcpip_socket\');
 +------------------------+
 | summary                |
 +------------------------+
 | Disabled 1 instruments |
 +------------------------+
 1 row in set (0.00 sec)
 
 To disable all instruments:
 
 mysql> CALL sys.ps_setup_disable_instrument(\'\');
 +--------------------------+
 | summary                  |
 +--------------------------+
 | Disabled 547 instruments |
 +--------------------------+
 1 row in set (0.01 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN UPDATE performance_schema.setup_instruments SET enabled = \'NO\', timed = \'NO\' WHERE name LIKE CONCAT(\'%\', in_pattern, \'%\');  SELECT CONCAT(\'Disabled \', @rows := ROW_COUNT(), \' instrument\', IF(@rows != 1, \'s\', \'\')) AS summary; END'], 31 => ['db' => 'sys', 'name' => 'ps_setup_disable_thread', 'type' => 'PROCEDURE', 'specific_name' => 'ps_setup_disable_thread', 'language' => 'SQL', 'sql_data_access' => 'MODIFIES_SQL_DATA', 'is_deterministic' => 'NO', 'security_type' => 'INVOKER', 'param_list' => ' IN in_connection_id BIGINT ', 'returns' => '', 'body' => 'BEGIN UPDATE performance_schema.threads SET instrumented = \'NO\' WHERE processlist_id = in_connection_id;  SELECT CONCAT(\'Disabled \', @rows := ROW_COUNT(), \' thread\', IF(@rows != 1, \'s\', \'\')) AS summary; END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Disable the given connection/thread in Performance Schema.
 
 Parameters
 
 in_connection_id (BIGINT):
 The connection ID (PROCESSLIST_ID from performance_schema.threads
 or the ID shown within SHOW PROCESSLIST)
 
 Example
 
 mysql> CALL sys.ps_setup_disable_thread(3);
 +-------------------+
 | summary           |
 +-------------------+
 | Disabled 1 thread |
 +-------------------+
 1 row in set (0.01 sec)
 
 To disable the current connection:
 
 mysql> CALL sys.ps_setup_disable_thread(CONNECTION_ID());
 +-------------------+
 | summary           |
 +-------------------+
 | Disabled 1 thread |
 +-------------------+
 1 row in set (0.00 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN UPDATE performance_schema.threads SET instrumented = \'NO\' WHERE processlist_id = in_connection_id;  SELECT CONCAT(\'Disabled \', @rows := ROW_COUNT(), \' thread\', IF(@rows != 1, \'s\', \'\')) AS summary; END'], 32 => ['db' => 'sys', 'name' => 'ps_setup_enable_background_threads', 'type' => 'PROCEDURE', 'specific_name' => 'ps_setup_enable_background_threads', 'language' => 'SQL', 'sql_data_access' => 'MODIFIES_SQL_DATA', 'is_deterministic' => 'NO', 'security_type' => 'INVOKER', 'param_list' => '', 'returns' => '', 'body' => 'BEGIN UPDATE performance_schema.threads SET instrumented = \'YES\' WHERE type = \'BACKGROUND\';  SELECT CONCAT(\'Enabled \', @rows := ROW_COUNT(), \' background thread\', IF(@rows != 1, \'s\', \'\')) AS summary; END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Enable all background thread instrumentation within Performance Schema.
 
 Parameters
 
 None.
 
 Example
 
 mysql> CALL sys.ps_setup_enable_background_threads();
 +-------------------------------+
 | summary                       |
 +-------------------------------+
 | Enabled 18 background threads |
 +-------------------------------+
 1 row in set (0.00 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN UPDATE performance_schema.threads SET instrumented = \'YES\' WHERE type = \'BACKGROUND\';  SELECT CONCAT(\'Enabled \', @rows := ROW_COUNT(), \' background thread\', IF(@rows != 1, \'s\', \'\')) AS summary; END'], 33 => ['db' => 'sys', 'name' => 'ps_setup_enable_consumer', 'type' => 'PROCEDURE', 'specific_name' => 'ps_setup_enable_consumer', 'language' => 'SQL', 'sql_data_access' => 'MODIFIES_SQL_DATA', 'is_deterministic' => 'NO', 'security_type' => 'INVOKER', 'param_list' => ' IN consumer VARCHAR(128) ', 'returns' => '', 'body' => 'BEGIN UPDATE performance_schema.setup_consumers SET enabled = \'YES\' WHERE name LIKE CONCAT(\'%\', consumer, \'%\');  SELECT CONCAT(\'Enabled \', @rows := ROW_COUNT(), \' consumer\', IF(@rows != 1, \'s\', \'\')) AS summary; END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Enables consumers within Performance Schema 
 matching the input pattern.
 
 Parameters
 
 consumer (VARCHAR(128)):
 A LIKE pattern match (using "%consumer%") of consumers to enable
 
 Example
 
 To enable all consumers:
 
 mysql> CALL sys.ps_setup_enable_consumer(\'\');
 +-------------------------+
 | summary                 |
 +-------------------------+
 | Enabled 10 consumers    |
 +-------------------------+
 1 row in set (0.02 sec)
 
 Query OK, 0 rows affected (0.02 sec)
 
 To enable just "waits" consumers:
 
 mysql> CALL sys.ps_setup_enable_consumer(\'waits\');
 +-----------------------+
 | summary               |
 +-----------------------+
 | Enabled 3 consumers   |
 +-----------------------+
 1 row in set (0.00 sec)
 
 Query OK, 0 rows affected (0.00 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN UPDATE performance_schema.setup_consumers SET enabled = \'YES\' WHERE name LIKE CONCAT(\'%\', consumer, \'%\');  SELECT CONCAT(\'Enabled \', @rows := ROW_COUNT(), \' consumer\', IF(@rows != 1, \'s\', \'\')) AS summary; END'], 34 => ['db' => 'sys', 'name' => 'ps_setup_enable_instrument', 'type' => 'PROCEDURE', 'specific_name' => 'ps_setup_enable_instrument', 'language' => 'SQL', 'sql_data_access' => 'MODIFIES_SQL_DATA', 'is_deterministic' => 'NO', 'security_type' => 'INVOKER', 'param_list' => ' IN in_pattern VARCHAR(128) ', 'returns' => '', 'body' => 'BEGIN UPDATE performance_schema.setup_instruments SET enabled = \'YES\', timed = \'YES\' WHERE name LIKE CONCAT(\'%\', in_pattern, \'%\');  SELECT CONCAT(\'Enabled \', @rows := ROW_COUNT(), \' instrument\', IF(@rows != 1, \'s\', \'\')) AS summary; END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Enables instruments within Performance Schema 
 matching the input pattern.
 
 Parameters
 
 in_pattern (VARCHAR(128)):
 A LIKE pattern match (using "%in_pattern%") of events to enable
 
 Example
 
 To enable all mutex instruments:
 
 mysql> CALL sys.ps_setup_enable_instrument(\'wait/synch/mutex\');
 +-------------------------+
 | summary                 |
 +-------------------------+
 | Enabled 155 instruments |
 +-------------------------+
 1 row in set (0.02 sec)
 
 Query OK, 0 rows affected (0.02 sec)
 
 To enable just a specific TCP/IP based network IO instrument:
 
 mysql> CALL sys.ps_setup_enable_instrument(\'wait/io/socket/sql/server_tcpip_socket\');
 +-----------------------+
 | summary               |
 +-----------------------+
 | Enabled 1 instruments |
 +-----------------------+
 1 row in set (0.00 sec)
 
 Query OK, 0 rows affected (0.00 sec)
 
 To enable all instruments:
 
 mysql> CALL sys.ps_setup_enable_instrument(\'\');
 +-------------------------+
 | summary                 |
 +-------------------------+
 | Enabled 547 instruments |
 +-------------------------+
 1 row in set (0.01 sec)
 
 Query OK, 0 rows affected (0.01 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN UPDATE performance_schema.setup_instruments SET enabled = \'YES\', timed = \'YES\' WHERE name LIKE CONCAT(\'%\', in_pattern, \'%\');  SELECT CONCAT(\'Enabled \', @rows := ROW_COUNT(), \' instrument\', IF(@rows != 1, \'s\', \'\')) AS summary; END'], 35 => ['db' => 'sys', 'name' => 'ps_setup_enable_thread', 'type' => 'PROCEDURE', 'specific_name' => 'ps_setup_enable_thread', 'language' => 'SQL', 'sql_data_access' => 'MODIFIES_SQL_DATA', 'is_deterministic' => 'NO', 'security_type' => 'INVOKER', 'param_list' => ' IN in_connection_id BIGINT ', 'returns' => '', 'body' => 'BEGIN UPDATE performance_schema.threads SET instrumented = \'YES\' WHERE processlist_id = in_connection_id;  SELECT CONCAT(\'Enabled \', @rows := ROW_COUNT(), \' thread\', IF(@rows != 1, \'s\', \'\')) AS summary; END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Enable the given connection/thread in Performance Schema.
 
 Parameters
 
 in_connection_id (BIGINT):
 The connection ID (PROCESSLIST_ID from performance_schema.threads
 or the ID shown within SHOW PROCESSLIST)
 
 Example
 
 mysql> CALL sys.ps_setup_enable_thread(3);
 +------------------+
 | summary          |
 +------------------+
 | Enabled 1 thread |
 +------------------+
 1 row in set (0.01 sec)
 
 To enable the current connection:
 
 mysql> CALL sys.ps_setup_enable_thread(CONNECTION_ID());
 +------------------+
 | summary          |
 +------------------+
 | Enabled 1 thread |
 +------------------+
 1 row in set (0.00 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN UPDATE performance_schema.threads SET instrumented = \'YES\' WHERE processlist_id = in_connection_id;  SELECT CONCAT(\'Enabled \', @rows := ROW_COUNT(), \' thread\', IF(@rows != 1, \'s\', \'\')) AS summary; END'], 36 => ['db' => 'sys', 'name' => 'ps_setup_reload_saved', 'type' => 'PROCEDURE', 'specific_name' => 'ps_setup_reload_saved', 'language' => 'SQL', 'sql_data_access' => 'MODIFIES_SQL_DATA', 'is_deterministic' => 'NO', 'security_type' => 'INVOKER', 'param_list' => '', 'returns' => '', 'body' => 'BEGIN DECLARE v_done bool DEFAULT FALSE; DECLARE v_lock_result INT; DECLARE v_lock_used_by BIGINT; DECLARE v_signal_message TEXT; DECLARE EXIT HANDLER FOR SQLEXCEPTION BEGIN SIGNAL SQLSTATE VALUE \'90001\' SET MESSAGE_TEXT = \'An error occurred, was sys.ps_setup_save() run before this procedure?\'; END;  SET @log_bin := @@sql_log_bin; SET sql_log_bin = 0;  SELECT IS_USED_LOCK(\'sys.ps_setup_save\') INTO v_lock_used_by;  IF (v_lock_used_by != CONNECTION_ID()) THEN SET v_signal_message = CONCAT(\'The sys.ps_setup_save lock is currently owned by \', v_lock_used_by); SIGNAL SQLSTATE VALUE \'90002\' SET MESSAGE_TEXT = v_signal_message; END IF;  DELETE FROM performance_schema.setup_actors; INSERT INTO performance_schema.setup_actors SELECT * FROM tmp_setup_actors;  BEGIN DECLARE v_name varchar(64); DECLARE v_enabled enum(\'YES\', \'NO\'); DECLARE c_consumers CURSOR FOR SELECT NAME, ENABLED FROM tmp_setup_consumers; DECLARE CONTINUE HANDLER FOR NOT FOUND SET v_done = TRUE;  SET v_done = FALSE; OPEN c_consumers; c_consumers_loop: LOOP FETCH c_consumers INTO v_name, v_enabled; IF v_done THEN LEAVE c_consumers_loop; END IF;  UPDATE performance_schema.setup_consumers SET ENABLED = v_enabled WHERE NAME = v_name; END LOOP; CLOSE c_consumers; END;  UPDATE performance_schema.setup_instruments INNER JOIN tmp_setup_instruments USING (NAME) SET performance_schema.setup_instruments.ENABLED = tmp_setup_instruments.ENABLED, performance_schema.setup_instruments.TIMED   = tmp_setup_instruments.TIMED; BEGIN DECLARE v_thread_id bigint unsigned; DECLARE v_instrumented enum(\'YES\', \'NO\'); DECLARE c_threads CURSOR FOR SELECT THREAD_ID, INSTRUMENTED FROM tmp_threads; DECLARE CONTINUE HANDLER FOR NOT FOUND SET v_done = TRUE;  SET v_done = FALSE; OPEN c_threads; c_threads_loop: LOOP FETCH c_threads INTO v_thread_id, v_instrumented; IF v_done THEN LEAVE c_threads_loop; END IF;  UPDATE performance_schema.threads SET INSTRUMENTED = v_instrumented WHERE THREAD_ID = v_thread_id; END LOOP; CLOSE c_threads; END;  UPDATE performance_schema.threads SET INSTRUMENTED = IF(PROCESSLIST_USER IS NOT NULL, sys.ps_is_account_enabled(PROCESSLIST_HOST, PROCESSLIST_USER), \'YES\') WHERE THREAD_ID NOT IN (SELECT THREAD_ID FROM tmp_threads);  DROP TEMPORARY TABLE tmp_setup_actors; DROP TEMPORARY TABLE tmp_setup_consumers; DROP TEMPORARY TABLE tmp_setup_instruments; DROP TEMPORARY TABLE tmp_threads;  SELECT RELEASE_LOCK(\'sys.ps_setup_save\') INTO v_lock_result;  SET sql_log_bin = @log_bin;  END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Reloads a saved Performance Schema configuration,
 so that you can alter the setup for debugging purposes, 
 but restore it to a previous state.
 
 Use the companion procedure - ps_setup_save(), to 
 save a configuration.
 
 Requires the SUPER privilege for "SET sql_log_bin = 0;".
 
 Parameters
 
 None.
 
 Example
 
 mysql> CALL sys.ps_setup_save();
 Query OK, 0 rows affected (0.08 sec)
 
 mysql> UPDATE performance_schema.setup_instruments SET enabled = \'YES\', timed = \'YES\';
 Query OK, 547 rows affected (0.40 sec)
 Rows matched: 784  Changed: 547  Warnings: 0
 
 /* Run some tests that need more detailed instrumentation here */
 
 mysql> CALL sys.ps_setup_reload_saved();
 Query OK, 0 rows affected (0.32 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN DECLARE v_done bool DEFAULT FALSE; DECLARE v_lock_result INT; DECLARE v_lock_used_by BIGINT; DECLARE v_signal_message TEXT; DECLARE EXIT HANDLER FOR SQLEXCEPTION BEGIN SIGNAL SQLSTATE VALUE \'90001\' SET MESSAGE_TEXT = \'An error occurred, was sys.ps_setup_save() run before this procedure?\'; END;  SET @log_bin := @@sql_log_bin; SET sql_log_bin = 0;  SELECT IS_USED_LOCK(\'sys.ps_setup_save\') INTO v_lock_used_by;  IF (v_lock_used_by != CONNECTION_ID()) THEN SET v_signal_message = CONCAT(\'The sys.ps_setup_save lock is currently owned by \', v_lock_used_by); SIGNAL SQLSTATE VALUE \'90002\' SET MESSAGE_TEXT = v_signal_message; END IF;  DELETE FROM performance_schema.setup_actors; INSERT INTO performance_schema.setup_actors SELECT * FROM tmp_setup_actors;  BEGIN DECLARE v_name varchar(64); DECLARE v_enabled enum(\'YES\', \'NO\'); DECLARE c_consumers CURSOR FOR SELECT NAME, ENABLED FROM tmp_setup_consumers; DECLARE CONTINUE HANDLER FOR NOT FOUND SET v_done = TRUE;  SET v_done = FALSE; OPEN c_consumers; c_consumers_loop: LOOP FETCH c_consumers INTO v_name, v_enabled; IF v_done THEN LEAVE c_consumers_loop; END IF;  UPDATE performance_schema.setup_consumers SET ENABLED = v_enabled WHERE NAME = v_name; END LOOP; CLOSE c_consumers; END;  UPDATE performance_schema.setup_instruments INNER JOIN tmp_setup_instruments USING (NAME) SET performance_schema.setup_instruments.ENABLED = tmp_setup_instruments.ENABLED, performance_schema.setup_instruments.TIMED   = tmp_setup_instruments.TIMED; BEGIN DECLARE v_thread_id bigint unsigned; DECLARE v_instrumented enum(\'YES\', \'NO\'); DECLARE c_threads CURSOR FOR SELECT THREAD_ID, INSTRUMENTED FROM tmp_threads; DECLARE CONTINUE HANDLER FOR NOT FOUND SET v_done = TRUE;  SET v_done = FALSE; OPEN c_threads; c_threads_loop: LOOP FETCH c_threads INTO v_thread_id, v_instrumented; IF v_done THEN LEAVE c_threads_loop; END IF;  UPDATE performance_schema.threads SET INSTRUMENTED = v_instrumented WHERE THREAD_ID = v_thread_id; END LOOP; CLOSE c_threads; END;  UPDATE performance_schema.threads SET INSTRUMENTED = IF(PROCESSLIST_USER IS NOT NULL, sys.ps_is_account_enabled(PROCESSLIST_HOST, PROCESSLIST_USER), \'YES\') WHERE THREAD_ID NOT IN (SELECT THREAD_ID FROM tmp_threads);  DROP TEMPORARY TABLE tmp_setup_actors; DROP TEMPORARY TABLE tmp_setup_consumers; DROP TEMPORARY TABLE tmp_setup_instruments; DROP TEMPORARY TABLE tmp_threads;  SELECT RELEASE_LOCK(\'sys.ps_setup_save\') INTO v_lock_result;  SET sql_log_bin = @log_bin;  END'], 37 => ['db' => 'sys', 'name' => 'ps_setup_reset_to_default', 'type' => 'PROCEDURE', 'specific_name' => 'ps_setup_reset_to_default', 'language' => 'SQL', 'sql_data_access' => 'MODIFIES_SQL_DATA', 'is_deterministic' => 'NO', 'security_type' => 'INVOKER', 'param_list' => ' IN in_verbose BOOLEAN ', 'returns' => '', 'body' => 'BEGIN SET @query = \'DELETE FROM performance_schema.setup_actors WHERE NOT (HOST = \'\'%\'\' AND USER = \'\'%\'\' AND ROLE = \'\'%\'\')\';  IF (in_verbose) THEN SELECT CONCAT(\'Resetting: setup_actors\n\', REPLACE(@query, \'  \', \'\')) AS status; END IF;  PREPARE reset_stmt FROM @query; EXECUTE reset_stmt; DEALLOCATE PREPARE reset_stmt;  SET @query = \'INSERT IGNORE INTO performance_schema.setup_actors VALUES (\'\'%\'\', \'\'%\'\', \'\'%\'\', \'\'YES\'\', \'\'YES\'\')\';  IF (in_verbose) THEN SELECT CONCAT(\'Resetting: setup_actors\n\', REPLACE(@query, \'  \', \'\')) AS status; END IF;  PREPARE reset_stmt FROM @query; EXECUTE reset_stmt; DEALLOCATE PREPARE reset_stmt;  SET @query = \'UPDATE performance_schema.setup_instruments SET ENABLED = sys.ps_is_instrument_default_enabled(NAME), TIMED   = sys.ps_is_instrument_default_timed(NAME)\';  IF (in_verbose) THEN SELECT CONCAT(\'Resetting: setup_instruments\n\', REPLACE(@query, \'  \', \'\')) AS status; END IF;  PREPARE reset_stmt FROM @query; EXECUTE reset_stmt; DEALLOCATE PREPARE reset_stmt;  SET @query = \'UPDATE performance_schema.setup_consumers SET ENABLED = IF(NAME IN (\'\'events_statements_current\'\', \'\'events_transactions_current\'\', \'\'global_instrumentation\'\', \'\'thread_instrumentation\'\', \'\'statements_digest\'\'), \'\'YES\'\', \'\'NO\'\')\';  IF (in_verbose) THEN SELECT CONCAT(\'Resetting: setup_consumers\n\', REPLACE(@query, \'  \', \'\')) AS status; END IF;  PREPARE reset_stmt FROM @query; EXECUTE reset_stmt; DEALLOCATE PREPARE reset_stmt;  SET @query = \'DELETE FROM performance_schema.setup_objects WHERE NOT (OBJECT_TYPE IN (\'\'EVENT\'\', \'\'FUNCTION\'\', \'\'PROCEDURE\'\', \'\'TABLE\'\', \'\'TRIGGER\'\') AND OBJECT_NAME = \'\'%\'\'  AND (OBJECT_SCHEMA = \'\'mysql\'\'              AND ENABLED = \'\'NO\'\'  AND TIMED = \'\'NO\'\' ) OR (OBJECT_SCHEMA = \'\'performance_schema\'\' AND ENABLED = \'\'NO\'\'  AND TIMED = \'\'NO\'\' ) OR (OBJECT_SCHEMA = \'\'information_schema\'\' AND ENABLED = \'\'NO\'\'  AND TIMED = \'\'NO\'\' ) OR (OBJECT_SCHEMA = \'\'%\'\'                  AND ENABLED = \'\'YES\'\' AND TIMED = \'\'YES\'\'))\';  IF (in_verbose) THEN SELECT CONCAT(\'Resetting: setup_objects\n\', REPLACE(@query, \'  \', \'\')) AS status; END IF;  PREPARE reset_stmt FROM @query; EXECUTE reset_stmt; DEALLOCATE PREPARE reset_stmt;  SET @query = \'INSERT IGNORE INTO performance_schema.setup_objects VALUES (\'\'EVENT\'\'    , \'\'mysql\'\'             , \'\'%\'\', \'\'NO\'\' , \'\'NO\'\' ), (\'\'EVENT\'\'    , \'\'performance_schema\'\', \'\'%\'\', \'\'NO\'\' , \'\'NO\'\' ), (\'\'EVENT\'\'    , \'\'information_schema\'\', \'\'%\'\', \'\'NO\'\' , \'\'NO\'\' ), (\'\'EVENT\'\'    , \'\'%\'\'                 , \'\'%\'\', \'\'YES\'\', \'\'YES\'\'), (\'\'FUNCTION\'\' , \'\'mysql\'\'             , \'\'%\'\', \'\'NO\'\' , \'\'NO\'\' ), (\'\'FUNCTION\'\' , \'\'performance_schema\'\', \'\'%\'\', \'\'NO\'\' , \'\'NO\'\' ), (\'\'FUNCTION\'\' , \'\'information_schema\'\', \'\'%\'\', \'\'NO\'\' , \'\'NO\'\' ), (\'\'FUNCTION\'\' , \'\'%\'\'                 , \'\'%\'\', \'\'YES\'\', \'\'YES\'\'), (\'\'PROCEDURE\'\', \'\'mysql\'\'             , \'\'%\'\', \'\'NO\'\' , \'\'NO\'\' ), (\'\'PROCEDURE\'\', \'\'performance_schema\'\', \'\'%\'\', \'\'NO\'\' , \'\'NO\'\' ), (\'\'PROCEDURE\'\', \'\'information_schema\'\', \'\'%\'\', \'\'NO\'\' , \'\'NO\'\' ), (\'\'PROCEDURE\'\', \'\'%\'\'                 , \'\'%\'\', \'\'YES\'\', \'\'YES\'\'), (\'\'TABLE\'\'    , \'\'mysql\'\'             , \'\'%\'\', \'\'NO\'\' , \'\'NO\'\' ), (\'\'TABLE\'\'    , \'\'performance_schema\'\', \'\'%\'\', \'\'NO\'\' , \'\'NO\'\' ), (\'\'TABLE\'\'    , \'\'information_schema\'\', \'\'%\'\', \'\'NO\'\' , \'\'NO\'\' ), (\'\'TABLE\'\'    , \'\'%\'\'                 , \'\'%\'\', \'\'YES\'\', \'\'YES\'\'), (\'\'TRIGGER\'\'  , \'\'mysql\'\'             , \'\'%\'\', \'\'NO\'\' , \'\'NO\'\' ), (\'\'TRIGGER\'\'  , \'\'performance_schema\'\', \'\'%\'\', \'\'NO\'\' , \'\'NO\'\' ), (\'\'TRIGGER\'\'  , \'\'information_schema\'\', \'\'%\'\', \'\'NO\'\' , \'\'NO\'\' ), (\'\'TRIGGER\'\'  , \'\'%\'\'                 , \'\'%\'\', \'\'YES\'\', \'\'YES\'\')\';  IF (in_verbose) THEN SELECT CONCAT(\'Resetting: setup_objects\n\', REPLACE(@query, \'  \', \'\')) AS status; END IF;  PREPARE reset_stmt FROM @query; EXECUTE reset_stmt; DEALLOCATE PREPARE reset_stmt;  SET @query = \'UPDATE performance_schema.threads SET INSTRUMENTED = \'\'YES\'\'\';  IF (in_verbose) THEN SELECT CONCAT(\'Resetting: threads\n\', REPLACE(@query, \'  \', \'\')) AS status; END IF;  PREPARE reset_stmt FROM @query; EXECUTE reset_stmt; DEALLOCATE PREPARE reset_stmt; END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Resets the Performance Schema setup to the default settings.
 
 Parameters
 
 in_verbose (BOOLEAN):
 Whether to print each setup stage (including the SQL) whilst running.
 
 Example
 
 mysql> CALL sys.ps_setup_reset_to_default(true)\G
 *************************** 1. row ***************************
 status: Resetting: setup_actors
 DELETE
 FROM performance_schema.setup_actors
 WHERE NOT (HOST = \'%\' AND USER = \'%\' AND ROLE = \'%\')
 1 row in set (0.00 sec)
 
 *************************** 1. row ***************************
 status: Resetting: setup_actors
 INSERT IGNORE INTO performance_schema.setup_actors
 VALUES (\'%\', \'%\', \'%\')
 1 row in set (0.00 sec)
 ...
 
 mysql> CALL sys.ps_setup_reset_to_default(false)\G
 Query OK, 0 rows affected (0.00 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN SET @query = \'DELETE FROM performance_schema.setup_actors WHERE NOT (HOST = \'%\' AND USER = \'%\' AND ROLE = \'%\')\';  IF (in_verbose) THEN SELECT CONCAT(\'Resetting: setup_actors
\', REPLACE(@query, \'  \', \'\')) AS status; END IF;  PREPARE reset_stmt FROM @query; EXECUTE reset_stmt; DEALLOCATE PREPARE reset_stmt;  SET @query = \'INSERT IGNORE INTO performance_schema.setup_actors VALUES (\'%\', \'%\', \'%\', \'YES\', \'YES\')\';  IF (in_verbose) THEN SELECT CONCAT(\'Resetting: setup_actors
\', REPLACE(@query, \'  \', \'\')) AS status; END IF;  PREPARE reset_stmt FROM @query; EXECUTE reset_stmt; DEALLOCATE PREPARE reset_stmt;  SET @query = \'UPDATE performance_schema.setup_instruments SET ENABLED = sys.ps_is_instrument_default_enabled(NAME), TIMED   = sys.ps_is_instrument_default_timed(NAME)\';  IF (in_verbose) THEN SELECT CONCAT(\'Resetting: setup_instruments
\', REPLACE(@query, \'  \', \'\')) AS status; END IF;  PREPARE reset_stmt FROM @query; EXECUTE reset_stmt; DEALLOCATE PREPARE reset_stmt;  SET @query = \'UPDATE performance_schema.setup_consumers SET ENABLED = IF(NAME IN (\'events_statements_current\', \'events_transactions_current\', \'global_instrumentation\', \'thread_instrumentation\', \'statements_digest\'), \'YES\', \'NO\')\';  IF (in_verbose) THEN SELECT CONCAT(\'Resetting: setup_consumers
\', REPLACE(@query, \'  \', \'\')) AS status; END IF;  PREPARE reset_stmt FROM @query; EXECUTE reset_stmt; DEALLOCATE PREPARE reset_stmt;  SET @query = \'DELETE FROM performance_schema.setup_objects WHERE NOT (OBJECT_TYPE IN (\'EVENT\', \'FUNCTION\', \'PROCEDURE\', \'TABLE\', \'TRIGGER\') AND OBJECT_NAME = \'%\'  AND (OBJECT_SCHEMA = \'mysql\'              AND ENABLED = \'NO\'  AND TIMED = \'NO\' ) OR (OBJECT_SCHEMA = \'performance_schema\' AND ENABLED = \'NO\'  AND TIMED = \'NO\' ) OR (OBJECT_SCHEMA = \'information_schema\' AND ENABLED = \'NO\'  AND TIMED = \'NO\' ) OR (OBJECT_SCHEMA = \'%\'                  AND ENABLED = \'YES\' AND TIMED = \'YES\'))\';  IF (in_verbose) THEN SELECT CONCAT(\'Resetting: setup_objects
\', REPLACE(@query, \'  \', \'\')) AS status; END IF;  PREPARE reset_stmt FROM @query; EXECUTE reset_stmt; DEALLOCATE PREPARE reset_stmt;  SET @query = \'INSERT IGNORE INTO performance_schema.setup_objects VALUES (\'EVENT\'    , \'mysql\'             , \'%\', \'NO\' , \'NO\' ), (\'EVENT\'    , \'performance_schema\', \'%\', \'NO\' , \'NO\' ), (\'EVENT\'    , \'information_schema\', \'%\', \'NO\' , \'NO\' ), (\'EVENT\'    , \'%\'                 , \'%\', \'YES\', \'YES\'), (\'FUNCTION\' , \'mysql\'             , \'%\', \'NO\' , \'NO\' ), (\'FUNCTION\' , \'performance_schema\', \'%\', \'NO\' , \'NO\' ), (\'FUNCTION\' , \'information_schema\', \'%\', \'NO\' , \'NO\' ), (\'FUNCTION\' , \'%\'                 , \'%\', \'YES\', \'YES\'), (\'PROCEDURE\', \'mysql\'             , \'%\', \'NO\' , \'NO\' ), (\'PROCEDURE\', \'performance_schema\', \'%\', \'NO\' , \'NO\' ), (\'PROCEDURE\', \'information_schema\', \'%\', \'NO\' , \'NO\' ), (\'PROCEDURE\', \'%\'                 , \'%\', \'YES\', \'YES\'), (\'TABLE\'    , \'mysql\'             , \'%\', \'NO\' , \'NO\' ), (\'TABLE\'    , \'performance_schema\', \'%\', \'NO\' , \'NO\' ), (\'TABLE\'    , \'information_schema\', \'%\', \'NO\' , \'NO\' ), (\'TABLE\'    , \'%\'                 , \'%\', \'YES\', \'YES\'), (\'TRIGGER\'  , \'mysql\'             , \'%\', \'NO\' , \'NO\' ), (\'TRIGGER\'  , \'performance_schema\', \'%\', \'NO\' , \'NO\' ), (\'TRIGGER\'  , \'information_schema\', \'%\', \'NO\' , \'NO\' ), (\'TRIGGER\'  , \'%\'                 , \'%\', \'YES\', \'YES\')\';  IF (in_verbose) THEN SELECT CONCAT(\'Resetting: setup_objects
\', REPLACE(@query, \'  \', \'\')) AS status; END IF;  PREPARE reset_stmt FROM @query; EXECUTE reset_stmt; DEALLOCATE PREPARE reset_stmt;  SET @query = \'UPDATE performance_schema.threads SET INSTRUMENTED = \'YES\'\';  IF (in_verbose) THEN SELECT CONCAT(\'Resetting: threads
\', REPLACE(@query, \'  \', \'\')) AS status; END IF;  PREPARE reset_stmt FROM @query; EXECUTE reset_stmt; DEALLOCATE PREPARE reset_stmt; END'], 38 => ['db' => 'sys', 'name' => 'ps_setup_save', 'type' => 'PROCEDURE', 'specific_name' => 'ps_setup_save', 'language' => 'SQL', 'sql_data_access' => 'MODIFIES_SQL_DATA', 'is_deterministic' => 'NO', 'security_type' => 'INVOKER', 'param_list' => ' IN in_timeout INT ', 'returns' => '', 'body' => 'BEGIN DECLARE v_lock_result INT;  SET @log_bin := @@sql_log_bin; SET sql_log_bin = 0;  SELECT GET_LOCK(\'sys.ps_setup_save\', in_timeout) INTO v_lock_result;  IF v_lock_result THEN DROP TEMPORARY TABLE IF EXISTS tmp_setup_actors; DROP TEMPORARY TABLE IF EXISTS tmp_setup_consumers; DROP TEMPORARY TABLE IF EXISTS tmp_setup_instruments; DROP TEMPORARY TABLE IF EXISTS tmp_threads;  CREATE TEMPORARY TABLE tmp_setup_actors LIKE performance_schema.setup_actors; CREATE TEMPORARY TABLE tmp_setup_consumers LIKE performance_schema.setup_consumers; CREATE TEMPORARY TABLE tmp_setup_instruments LIKE performance_schema.setup_instruments; CREATE TEMPORARY TABLE tmp_threads (THREAD_ID bigint unsigned NOT NULL PRIMARY KEY, INSTRUMENTED enum(\'YES\',\'NO\') NOT NULL);  INSERT INTO tmp_setup_actors SELECT * FROM performance_schema.setup_actors; INSERT INTO tmp_setup_consumers SELECT * FROM performance_schema.setup_consumers; INSERT INTO tmp_setup_instruments SELECT * FROM performance_schema.setup_instruments; INSERT INTO tmp_threads SELECT THREAD_ID, INSTRUMENTED FROM performance_schema.threads; ELSE SIGNAL SQLSTATE VALUE \'90000\' SET MESSAGE_TEXT = \'Could not lock the sys.ps_setup_save user lock, another thread has a saved configuration\'; END IF;  SET sql_log_bin = @log_bin; END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Saves the current configuration of Performance Schema, 
 so that you can alter the setup for debugging purposes, 
 but restore it to a previous state.
 
 Use the companion procedure - ps_setup_reload_saved(), to 
 restore the saved config.
 
 The named lock "sys.ps_setup_save" is taken before the
 current configuration is saved. If the attempt to get the named
 lock times out, an error occurs.
 
 The lock is released after the settings have been restored by
 calling ps_setup_reload_saved().
 
 Requires the SUPER privilege for "SET sql_log_bin = 0;".
 
 Parameters
 
 in_timeout INT
 The timeout in seconds used when trying to obtain the lock.
 A negative timeout means infinite timeout.
 
 Example
 
 mysql> CALL sys.ps_setup_save(-1);
 Query OK, 0 rows affected (0.08 sec)
 
 mysql> UPDATE performance_schema.setup_instruments 
 ->    SET enabled = \'YES\', timed = \'YES\';
 Query OK, 547 rows affected (0.40 sec)
 Rows matched: 784  Changed: 547  Warnings: 0
 
 /* Run some tests that need more detailed instrumentation here */
 
 mysql> CALL sys.ps_setup_reload_saved();
 Query OK, 0 rows affected (0.32 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN DECLARE v_lock_result INT;  SET @log_bin := @@sql_log_bin; SET sql_log_bin = 0;  SELECT GET_LOCK(\'sys.ps_setup_save\', in_timeout) INTO v_lock_result;  IF v_lock_result THEN DROP TEMPORARY TABLE IF EXISTS tmp_setup_actors; DROP TEMPORARY TABLE IF EXISTS tmp_setup_consumers; DROP TEMPORARY TABLE IF EXISTS tmp_setup_instruments; DROP TEMPORARY TABLE IF EXISTS tmp_threads;  CREATE TEMPORARY TABLE tmp_setup_actors LIKE performance_schema.setup_actors; CREATE TEMPORARY TABLE tmp_setup_consumers LIKE performance_schema.setup_consumers; CREATE TEMPORARY TABLE tmp_setup_instruments LIKE performance_schema.setup_instruments; CREATE TEMPORARY TABLE tmp_threads (THREAD_ID bigint unsigned NOT NULL PRIMARY KEY, INSTRUMENTED enum(\'YES\',\'NO\') NOT NULL);  INSERT INTO tmp_setup_actors SELECT * FROM performance_schema.setup_actors; INSERT INTO tmp_setup_consumers SELECT * FROM performance_schema.setup_consumers; INSERT INTO tmp_setup_instruments SELECT * FROM performance_schema.setup_instruments; INSERT INTO tmp_threads SELECT THREAD_ID, INSTRUMENTED FROM performance_schema.threads; ELSE SIGNAL SQLSTATE VALUE \'90000\' SET MESSAGE_TEXT = \'Could not lock the sys.ps_setup_save user lock, another thread has a saved configuration\'; END IF;  SET sql_log_bin = @log_bin; END'], 39 => ['db' => 'sys', 'name' => 'ps_setup_show_disabled', 'type' => 'PROCEDURE', 'specific_name' => 'ps_setup_show_disabled', 'language' => 'SQL', 'sql_data_access' => 'READS_SQL_DATA', 'is_deterministic' => 'NO', 'security_type' => 'INVOKER', 'param_list' => ' IN in_show_instruments BOOLEAN, IN in_show_threads BOOLEAN ', 'returns' => '', 'body' => 'BEGIN SELECT @@performance_schema AS performance_schema_enabled;   SELECT CONCAT(\'\'\', user, \'\'@\'\', host, \'\'\') AS disabled_users FROM performance_schema.setup_actors WHERE enabled = \'NO\' ORDER BY disabled_users;   SELECT object_type, CONCAT(object_schema, \'.\', object_name) AS objects, enabled, timed FROM performance_schema.setup_objects WHERE enabled = \'NO\' ORDER BY object_type, objects;  SELECT name AS disabled_consumers FROM performance_schema.setup_consumers WHERE enabled = \'NO\' ORDER BY disabled_consumers;  IF (in_show_threads) THEN SELECT IF(name = \'thread/sql/one_connection\',  CONCAT(processlist_user, \'@\', processlist_host),  REPLACE(name, \'thread/\', \'\')) AS disabled_threads, TYPE AS thread_type FROM performance_schema.threads WHERE INSTRUMENTED = \'NO\' ORDER BY disabled_threads; END IF;  IF (in_show_instruments) THEN SELECT name AS disabled_instruments, timed FROM performance_schema.setup_instruments WHERE enabled = \'NO\' ORDER BY disabled_instruments; END IF; END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Shows all currently disable Performance Schema configuration.
 
 Disabled users is only available for MySQL 5.7.6 and later.
 In earlier versions it was only possible to enable users.
 
 Parameters
 
 in_show_instruments (BOOLEAN):
 Whether to print disabled instruments (can print many items)
 
 in_show_threads (BOOLEAN):
 Whether to print disabled threads
 
 Example
 
 mysql> CALL sys.ps_setup_show_disabled(TRUE, TRUE);
 +----------------------------+
 | performance_schema_enabled |
 +----------------------------+
 |                          1 |
 +----------------------------+
 1 row in set (0.00 sec)
 
 +--------------------+
 | disabled_users     |
 +--------------------+
 | \'mark\'@\'localhost\' |
 +--------------------+
 1 row in set (0.00 sec)
 
 +-------------+----------------------+---------+-------+
 | object_type | objects              | enabled | timed |
 +-------------+----------------------+---------+-------+
 | EVENT       | mysql.%              | NO      | NO    |
 | EVENT       | performance_schema.% | NO      | NO    |
 | EVENT       | information_schema.% | NO      | NO    |
 | FUNCTION    | mysql.%              | NO      | NO    |
 | FUNCTION    | performance_schema.% | NO      | NO    |
 | FUNCTION    | information_schema.% | NO      | NO    |
 | PROCEDURE   | mysql.%              | NO      | NO    |
 | PROCEDURE   | performance_schema.% | NO      | NO    |
 | PROCEDURE   | information_schema.% | NO      | NO    |
 | TABLE       | mysql.%              | NO      | NO    |
 | TABLE       | performance_schema.% | NO      | NO    |
 | TABLE       | information_schema.% | NO      | NO    |
 | TRIGGER     | mysql.%              | NO      | NO    |
 | TRIGGER     | performance_schema.% | NO      | NO    |
 | TRIGGER     | information_schema.% | NO      | NO    |
 +-------------+----------------------+---------+-------+
 15 rows in set (0.00 sec)
 
 +----------------------------------+
 | disabled_consumers               |
 +----------------------------------+
 | events_stages_current            |
 | events_stages_history            |
 | events_stages_history_long       |
 | events_statements_history        |
 | events_statements_history_long   |
 | events_transactions_history      |
 | events_transactions_history_long |
 | events_waits_current             |
 | events_waits_history             |
 | events_waits_history_long        |
 +----------------------------------+
 10 rows in set (0.00 sec)
 
 Empty set (0.00 sec)
 
 +---------------------------------------------------------------------------------------+-------+
 | disabled_instruments                                                                  | timed |
 +---------------------------------------------------------------------------------------+-------+
 | wait/synch/mutex/sql/TC_LOG_MMAP::LOCK_tc                                             | NO    |
 | wait/synch/mutex/sql/LOCK_des_key_file                                                | NO    |
 | wait/synch/mutex/sql/MYSQL_BIN_LOG::LOCK_commit                                       | NO    |
 ...
 | memory/sql/servers_cache                                                              | NO    |
 | memory/sql/udf_mem                                                                    | NO    |
 | wait/lock/metadata/sql/mdl                                                            | NO    |
 +---------------------------------------------------------------------------------------+-------+
 547 rows in set (0.00 sec)
 
 Query OK, 0 rows affected (0.01 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN SELECT @@performance_schema AS performance_schema_enabled;   SELECT CONCAT(\'\'\', user, \'\'@\'\', host, \'\'\') AS disabled_users FROM performance_schema.setup_actors WHERE enabled = \'NO\' ORDER BY disabled_users;   SELECT object_type, CONCAT(object_schema, \'.\', object_name) AS objects, enabled, timed FROM performance_schema.setup_objects WHERE enabled = \'NO\' ORDER BY object_type, objects;  SELECT name AS disabled_consumers FROM performance_schema.setup_consumers WHERE enabled = \'NO\' ORDER BY disabled_consumers;  IF (in_show_threads) THEN SELECT IF(name = \'thread/sql/one_connection\',  CONCAT(processlist_user, \'@\', processlist_host),  REPLACE(name, \'thread/\', \'\')) AS disabled_threads, TYPE AS thread_type FROM performance_schema.threads WHERE INSTRUMENTED = \'NO\' ORDER BY disabled_threads; END IF;  IF (in_show_instruments) THEN SELECT name AS disabled_instruments, timed FROM performance_schema.setup_instruments WHERE enabled = \'NO\' ORDER BY disabled_instruments; END IF; END'], 40 => ['db' => 'sys', 'name' => 'ps_setup_show_disabled_consumers', 'type' => 'PROCEDURE', 'specific_name' => 'ps_setup_show_disabled_consumers', 'language' => 'SQL', 'sql_data_access' => 'READS_SQL_DATA', 'is_deterministic' => 'YES', 'security_type' => 'INVOKER', 'param_list' => '', 'returns' => '', 'body' => 'BEGIN SELECT name AS disabled_consumers FROM performance_schema.setup_consumers WHERE enabled = \'NO\' ORDER BY disabled_consumers; END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Shows all currently disabled consumers.
 
 Parameters
 
 None
 
 Example
 
 mysql> CALL sys.ps_setup_show_disabled_consumers();
 
 +---------------------------+
 | disabled_consumers        |
 +---------------------------+
 | events_statements_current |
 | global_instrumentation    |
 | thread_instrumentation    |
 | statements_digest         |
 +---------------------------+
 4 rows in set (0.05 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN SELECT name AS disabled_consumers FROM performance_schema.setup_consumers WHERE enabled = \'NO\' ORDER BY disabled_consumers; END'], 41 => ['db' => 'sys', 'name' => 'ps_setup_show_disabled_instruments', 'type' => 'PROCEDURE', 'specific_name' => 'ps_setup_show_disabled_instruments', 'language' => 'SQL', 'sql_data_access' => 'READS_SQL_DATA', 'is_deterministic' => 'YES', 'security_type' => 'INVOKER', 'param_list' => '', 'returns' => '', 'body' => 'BEGIN SELECT name AS disabled_instruments, timed FROM performance_schema.setup_instruments WHERE enabled = \'NO\' ORDER BY disabled_instruments; END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Shows all currently disabled instruments.
 
 Parameters
 
 None
 
 Example
 
 mysql> CALL sys.ps_setup_show_disabled_instruments();
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN SELECT name AS disabled_instruments, timed FROM performance_schema.setup_instruments WHERE enabled = \'NO\' ORDER BY disabled_instruments; END'], 42 => ['db' => 'sys', 'name' => 'ps_setup_show_enabled', 'type' => 'PROCEDURE', 'specific_name' => 'ps_setup_show_enabled', 'language' => 'SQL', 'sql_data_access' => 'READS_SQL_DATA', 'is_deterministic' => 'YES', 'security_type' => 'INVOKER', 'param_list' => ' IN in_show_instruments BOOLEAN, IN in_show_threads BOOLEAN ', 'returns' => '', 'body' => 'BEGIN SELECT @@performance_schema AS performance_schema_enabled;  SELECT CONCAT(\'\'\', user, \'\'@\'\', host, \'\'\') AS enabled_users FROM performance_schema.setup_actors  WHERE enabled = \'YES\'  ORDER BY enabled_users;  SELECT object_type, CONCAT(object_schema, \'.\', object_name) AS objects, enabled, timed FROM performance_schema.setup_objects WHERE enabled = \'YES\' ORDER BY object_type, objects;  SELECT name AS enabled_consumers FROM performance_schema.setup_consumers WHERE enabled = \'YES\' ORDER BY enabled_consumers;  IF (in_show_threads) THEN SELECT IF(name = \'thread/sql/one_connection\',  CONCAT(processlist_user, \'@\', processlist_host),  REPLACE(name, \'thread/\', \'\')) AS enabled_threads, TYPE AS thread_type FROM performance_schema.threads WHERE INSTRUMENTED = \'YES\' ORDER BY enabled_threads; END IF;  IF (in_show_instruments) THEN SELECT name AS enabled_instruments, timed FROM performance_schema.setup_instruments WHERE enabled = \'YES\' ORDER BY enabled_instruments; END IF; END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Shows all currently enabled Performance Schema configuration.
 
 Parameters
 
 in_show_instruments (BOOLEAN):
 Whether to print enabled instruments (can print many items)
 
 in_show_threads (BOOLEAN):
 Whether to print enabled threads
 
 Example
 
 mysql> CALL sys.ps_setup_show_enabled(TRUE, TRUE);
 +----------------------------+
 | performance_schema_enabled |
 +----------------------------+
 |                          1 |
 +----------------------------+
 1 row in set (0.00 sec)
 
 +---------------+
 | enabled_users |
 +---------------+
 | \'%\'@\'%\'       |
 +---------------+
 1 row in set (0.01 sec)
 
 +-------------+---------+---------+-------+
 | object_type | objects | enabled | timed |
 +-------------+---------+---------+-------+
 | EVENT       | %.%     | YES     | YES   |
 | FUNCTION    | %.%     | YES     | YES   |
 | PROCEDURE   | %.%     | YES     | YES   |
 | TABLE       | %.%     | YES     | YES   |
 | TRIGGER     | %.%     | YES     | YES   |
 +-------------+---------+---------+-------+
 5 rows in set (0.01 sec)
 
 +---------------------------+
 | enabled_consumers         |
 +---------------------------+
 | events_statements_current |
 | global_instrumentation    |
 | thread_instrumentation    |
 | statements_digest         |
 +---------------------------+
 4 rows in set (0.05 sec)
 
 +---------------------------------+-------------+
 | enabled_threads                 | thread_type |
 +---------------------------------+-------------+
 | sql/main                        | BACKGROUND  |
 | sql/thread_timer_notifier       | BACKGROUND  |
 | innodb/io_ibuf_thread           | BACKGROUND  |
 | innodb/io_log_thread            | BACKGROUND  |
 | innodb/io_read_thread           | BACKGROUND  |
 | innodb/io_read_thread           | BACKGROUND  |
 | innodb/io_write_thread          | BACKGROUND  |
 | innodb/io_write_thread          | BACKGROUND  |
 | innodb/page_cleaner_thread      | BACKGROUND  |
 | innodb/srv_lock_timeout_thread  | BACKGROUND  |
 | innodb/srv_error_monitor_thread | BACKGROUND  |
 | innodb/srv_monitor_thread       | BACKGROUND  |
 | innodb/srv_master_thread        | BACKGROUND  |
 | innodb/srv_purge_thread         | BACKGROUND  |
 | innodb/srv_worker_thread        | BACKGROUND  |
 | innodb/srv_worker_thread        | BACKGROUND  |
 | innodb/srv_worker_thread        | BACKGROUND  |
 | innodb/buf_dump_thread          | BACKGROUND  |
 | innodb/dict_stats_thread        | BACKGROUND  |
 | sql/signal_handler              | BACKGROUND  |
 | sql/compress_gtid_table         | FOREGROUND  |
 | root@localhost                  | FOREGROUND  |
 +---------------------------------+-------------+
 22 rows in set (0.01 sec)
 
 +-------------------------------------+-------+
 | enabled_instruments                 | timed |
 +-------------------------------------+-------+
 | wait/io/file/sql/map                | YES   |
 | wait/io/file/sql/binlog             | YES   |
 ...
 | statement/com/Error                 | YES   |
 | statement/com/                      | YES   |
 | idle                                | YES   |
 +-------------------------------------+-------+
 210 rows in set (0.08 sec)
 
 Query OK, 0 rows affected (0.89 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN SELECT @@performance_schema AS performance_schema_enabled;  SELECT CONCAT(\'\'\', user, \'\'@\'\', host, \'\'\') AS enabled_users FROM performance_schema.setup_actors  WHERE enabled = \'YES\'  ORDER BY enabled_users;  SELECT object_type, CONCAT(object_schema, \'.\', object_name) AS objects, enabled, timed FROM performance_schema.setup_objects WHERE enabled = \'YES\' ORDER BY object_type, objects;  SELECT name AS enabled_consumers FROM performance_schema.setup_consumers WHERE enabled = \'YES\' ORDER BY enabled_consumers;  IF (in_show_threads) THEN SELECT IF(name = \'thread/sql/one_connection\',  CONCAT(processlist_user, \'@\', processlist_host),  REPLACE(name, \'thread/\', \'\')) AS enabled_threads, TYPE AS thread_type FROM performance_schema.threads WHERE INSTRUMENTED = \'YES\' ORDER BY enabled_threads; END IF;  IF (in_show_instruments) THEN SELECT name AS enabled_instruments, timed FROM performance_schema.setup_instruments WHERE enabled = \'YES\' ORDER BY enabled_instruments; END IF; END'], 43 => ['db' => 'sys', 'name' => 'ps_setup_show_enabled_consumers', 'type' => 'PROCEDURE', 'specific_name' => 'ps_setup_show_enabled_consumers', 'language' => 'SQL', 'sql_data_access' => 'READS_SQL_DATA', 'is_deterministic' => 'YES', 'security_type' => 'INVOKER', 'param_list' => '', 'returns' => '', 'body' => 'BEGIN SELECT name AS enabled_consumers FROM performance_schema.setup_consumers WHERE enabled = \'YES\' ORDER BY enabled_consumers; END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Shows all currently enabled consumers.
 
 Parameters
 
 None
 
 Example
 
 mysql> CALL sys.ps_setup_show_enabled_consumers();
 
 +---------------------------+
 | enabled_consumers         |
 +---------------------------+
 | events_statements_current |
 | global_instrumentation    |
 | thread_instrumentation    |
 | statements_digest         |
 +---------------------------+
 4 rows in set (0.05 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN SELECT name AS enabled_consumers FROM performance_schema.setup_consumers WHERE enabled = \'YES\' ORDER BY enabled_consumers; END'], 44 => ['db' => 'sys', 'name' => 'ps_setup_show_enabled_instruments', 'type' => 'PROCEDURE', 'specific_name' => 'ps_setup_show_enabled_instruments', 'language' => 'SQL', 'sql_data_access' => 'READS_SQL_DATA', 'is_deterministic' => 'YES', 'security_type' => 'INVOKER', 'param_list' => '', 'returns' => '', 'body' => 'BEGIN SELECT name AS enabled_instruments, timed FROM performance_schema.setup_instruments WHERE enabled = \'YES\' ORDER BY enabled_instruments; END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Shows all currently enabled instruments.
 
 Parameters
 
 None
 
 Example
 
 mysql> CALL sys.ps_setup_show_enabled_instruments();
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN SELECT name AS enabled_instruments, timed FROM performance_schema.setup_instruments WHERE enabled = \'YES\' ORDER BY enabled_instruments; END'], 45 => ['db' => 'sys', 'name' => 'ps_truncate_all_tables', 'type' => 'PROCEDURE', 'specific_name' => 'ps_truncate_all_tables', 'language' => 'SQL', 'sql_data_access' => 'MODIFIES_SQL_DATA', 'is_deterministic' => 'YES', 'security_type' => 'INVOKER', 'param_list' => ' IN in_verbose BOOLEAN ', 'returns' => '', 'body' => 'BEGIN DECLARE v_done INT DEFAULT FALSE; DECLARE v_total_tables INT DEFAULT 0; DECLARE v_ps_table VARCHAR(64); DECLARE ps_tables CURSOR FOR SELECT table_name  FROM INFORMATION_SCHEMA.TABLES  WHERE table_schema = \'performance_schema\'  AND (table_name LIKE \'%summary%\'  OR table_name LIKE \'%history%\'); DECLARE CONTINUE HANDLER FOR NOT FOUND SET v_done = TRUE;  OPEN ps_tables;  ps_tables_loop: LOOP FETCH ps_tables INTO v_ps_table; IF v_done THEN LEAVE ps_tables_loop; END IF;  SET @truncate_stmt := CONCAT(\'TRUNCATE TABLE performance_schema.\', v_ps_table); IF in_verbose THEN SELECT CONCAT(\'Running: \', @truncate_stmt) AS status; END IF;  PREPARE truncate_stmt FROM @truncate_stmt; EXECUTE truncate_stmt; DEALLOCATE PREPARE truncate_stmt;  SET v_total_tables = v_total_tables + 1; END LOOP;  CLOSE ps_tables;  SELECT CONCAT(\'Truncated \', v_total_tables, \' tables\') AS summary;  END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Truncates all summary tables within Performance Schema, 
 resetting all aggregated instrumentation as a snapshot.
 
 Parameters
 
 in_verbose (BOOLEAN):
 Whether to print each TRUNCATE statement before running
 
 Example
 
 mysql> CALL sys.ps_truncate_all_tables(false);
 +---------------------+
 | summary             |
 +---------------------+
 | Truncated 44 tables |
 +---------------------+
 1 row in set (0.10 sec)
 
 Query OK, 0 rows affected (0.10 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN DECLARE v_done INT DEFAULT FALSE; DECLARE v_total_tables INT DEFAULT 0; DECLARE v_ps_table VARCHAR(64); DECLARE ps_tables CURSOR FOR SELECT table_name  FROM INFORMATION_SCHEMA.TABLES  WHERE table_schema = \'performance_schema\'  AND (table_name LIKE \'%summary%\'  OR table_name LIKE \'%history%\'); DECLARE CONTINUE HANDLER FOR NOT FOUND SET v_done = TRUE;  OPEN ps_tables;  ps_tables_loop: LOOP FETCH ps_tables INTO v_ps_table; IF v_done THEN LEAVE ps_tables_loop; END IF;  SET @truncate_stmt := CONCAT(\'TRUNCATE TABLE performance_schema.\', v_ps_table); IF in_verbose THEN SELECT CONCAT(\'Running: \', @truncate_stmt) AS status; END IF;  PREPARE truncate_stmt FROM @truncate_stmt; EXECUTE truncate_stmt; DEALLOCATE PREPARE truncate_stmt;  SET v_total_tables = v_total_tables + 1; END LOOP;  CLOSE ps_tables;  SELECT CONCAT(\'Truncated \', v_total_tables, \' tables\') AS summary;  END'], 46 => ['db' => 'sys', 'name' => 'statement_performance_analyzer', 'type' => 'PROCEDURE', 'specific_name' => 'statement_performance_analyzer', 'language' => 'SQL', 'sql_data_access' => 'CONTAINS_SQL', 'is_deterministic' => 'NO', 'security_type' => 'INVOKER', 'param_list' => ' IN in_action ENUM(\'snapshot\', \'overall\', \'delta\', \'create_table\', \'create_tmp\', \'save\', \'cleanup\'), IN in_table VARCHAR(129), IN in_views SET (\'with_runtimes_in_95th_percentile\', \'analysis\', \'with_errors_or_warnings\', \'with_full_table_scans\', \'with_sorting\', \'with_temp_tables\', \'custom\') ', 'returns' => '', 'body' => 'BEGIN DECLARE v_table_exists, v_tmp_digests_table_exists, v_custom_view_exists ENUM(\'\', \'BASE TABLE\', \'VIEW\', \'TEMPORARY\') DEFAULT \'\'; DECLARE v_this_thread_enabled ENUM(\'YES\', \'NO\'); DECLARE v_force_new_snapshot BOOLEAN DEFAULT FALSE; DECLARE v_digests_table VARCHAR(133); DECLARE v_quoted_table, v_quoted_custom_view VARCHAR(133) DEFAULT \'\'; DECLARE v_table_db, v_table_name, v_custom_db, v_custom_name VARCHAR(64); DECLARE v_digest_table_template, v_checksum_ref, v_checksum_table text; DECLARE v_sql longtext; DECLARE v_error_msg VARCHAR(128);   SELECT INSTRUMENTED INTO v_this_thread_enabled FROM performance_schema.threads WHERE PROCESSLIST_ID = CONNECTION_ID(); IF (v_this_thread_enabled = \'YES\') THEN CALL sys.ps_setup_disable_thread(CONNECTION_ID()); END IF;  SET @log_bin := @@sql_log_bin; IF (@log_bin = 1) THEN SET sql_log_bin = 0; END IF;   IF (@sys.statement_performance_analyzer.limit IS NULL) THEN SET @sys.statement_performance_analyzer.limit = sys.sys_get_config(\'statement_performance_analyzer.limit\', \'100\'); END IF; IF (@sys.debug IS NULL) THEN SET @sys.debug                                = sys.sys_get_config(\'debug\'                               , \'OFF\'); END IF;   IF (in_table = \'NOW()\') THEN SET v_force_new_snapshot = TRUE, in_table             = NULL; ELSEIF (in_table IS NOT NULL) THEN IF (NOT INSTR(in_table, \'.\')) THEN SET v_table_db   = DATABASE(), v_table_name = in_table; ELSE SET v_table_db   = SUBSTRING_INDEX(in_table, \'.\', 1); SET v_table_name = SUBSTRING(in_table, CHAR_LENGTH(v_table_db)+2); END IF;  SET v_quoted_table = CONCAT(\'`\', v_table_db, \'`.`\', v_table_name, \'`\');  IF (@sys.debug = \'ON\') THEN SELECT CONCAT(\'in_table is: db = \'\'\', v_table_db, \'\'\', table = \'\'\', v_table_name, \'\'\'\') AS \'Debug\'; END IF;  IF (v_table_db = DATABASE() AND (v_table_name = \'tmp_digests\' OR v_table_name = \'tmp_digests_delta\')) THEN SET v_error_msg = CONCAT(\'Invalid value for in_table: \', v_quoted_table, \' is reserved table name.\'); SIGNAL SQLSTATE \'45000\' SET MESSAGE_TEXT = v_error_msg; END IF;  CALL sys.table_exists(v_table_db, v_table_name, v_table_exists); IF (@sys.debug = \'ON\') THEN SELECT CONCAT(\'v_table_exists = \', v_table_exists) AS \'Debug\'; END IF;  IF (v_table_exists = \'BASE TABLE\') THEN SET v_checksum_ref = ( SELECT GROUP_CONCAT(CONCAT(COLUMN_NAME, COLUMN_TYPE) ORDER BY ORDINAL_POSITION) AS Checksum FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = \'performance_schema\' AND TABLE_NAME = \'events_statements_summary_by_digest\' ), v_checksum_table = ( SELECT GROUP_CONCAT(CONCAT(COLUMN_NAME, COLUMN_TYPE) ORDER BY ORDINAL_POSITION) AS Checksum FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = v_table_db AND TABLE_NAME = v_table_name );  IF (v_checksum_ref <> v_checksum_table) THEN SET v_error_msg = CONCAT(\'The table \', IF(CHAR_LENGTH(v_quoted_table) > 93, CONCAT(\'...\', SUBSTRING(v_quoted_table, -90)), v_quoted_table), \' has the wrong definition.\'); SIGNAL SQLSTATE \'45000\' SET MESSAGE_TEXT = v_error_msg; END IF; END IF; END IF;   IF (in_views IS NULL OR in_views = \'\') THEN SET in_views = \'with_runtimes_in_95th_percentile,analysis,with_errors_or_warnings,with_full_table_scans,with_sorting,with_temp_tables\'; END IF;   CALL sys.table_exists(DATABASE(), \'tmp_digests\', v_tmp_digests_table_exists); IF (@sys.debug = \'ON\') THEN SELECT CONCAT(\'v_tmp_digests_table_exists = \', v_tmp_digests_table_exists) AS \'Debug\'; END IF;  CASE WHEN in_action IN (\'snapshot\', \'overall\') THEN IF (in_table IS NOT NULL) THEN IF (NOT v_table_exists IN (\'TEMPORARY\', \'BASE TABLE\')) THEN SET v_error_msg = CONCAT(\'The \', in_action, \' action requires in_table to be NULL, NOW() or specify an existing table.\', \' The table \', IF(CHAR_LENGTH(v_quoted_table) > 16, CONCAT(\'...\', SUBSTRING(v_quoted_table, -13)), v_quoted_table), \' does not exist.\'); SIGNAL SQLSTATE \'45000\' SET MESSAGE_TEXT = v_error_msg; END IF; END IF;  WHEN in_action IN (\'delta\', \'save\') THEN IF (v_table_exists NOT IN (\'TEMPORARY\', \'BASE TABLE\')) THEN SET v_error_msg = CONCAT(\'The \', in_action, \' action requires in_table to be an existing table.\', IF(in_table IS NOT NULL, CONCAT(\' The table \', IF(CHAR_LENGTH(v_quoted_table) > 39, CONCAT(\'...\', SUBSTRING(v_quoted_table, -36)), v_quoted_table), \' does not exist.\'), \'\')); SIGNAL SQLSTATE \'45000\' SET MESSAGE_TEXT = v_error_msg; END IF;  IF (in_action = \'delta\' AND v_tmp_digests_table_exists <> \'TEMPORARY\') THEN SIGNAL SQLSTATE \'45000\' SET MESSAGE_TEXT = \'An existing snapshot generated with the statement_performance_analyzer() must exist.\'; END IF; WHEN in_action = \'create_tmp\' THEN IF (v_table_exists = \'TEMPORARY\') THEN SET v_error_msg = CONCAT(\'Cannot create the table \', IF(CHAR_LENGTH(v_quoted_table) > 72, CONCAT(\'...\', SUBSTRING(v_quoted_table, -69)), v_quoted_table), \' as it already exists.\'); SIGNAL SQLSTATE \'45000\' SET MESSAGE_TEXT = v_error_msg; END IF;  WHEN in_action = \'create_table\' THEN IF (v_table_exists <> \'\') THEN SET v_error_msg = CONCAT(\'Cannot create the table \', IF(CHAR_LENGTH(v_quoted_table) > 52, CONCAT(\'...\', SUBSTRING(v_quoted_table, -49)), v_quoted_table), \' as it already exists\', IF(v_table_exists = \'TEMPORARY\', \' as a temporary table.\', \'.\')); SIGNAL SQLSTATE \'45000\' SET MESSAGE_TEXT = v_error_msg; END IF;  WHEN in_action = \'cleanup\' THEN DO (SELECT 1); ELSE SIGNAL SQLSTATE \'45000\' SET MESSAGE_TEXT = \'Unknown action. Supported actions are: cleanup, create_table, create_tmp, delta, overall, save, snapshot\'; END CASE;  SET v_digest_table_template = \'CREATE %{TEMPORARY}TABLE %{TABLE_NAME} ( `SCHEMA_NAME` varchar(64) DEFAULT NULL, `DIGEST` varchar(32) DEFAULT NULL, `DIGEST_TEXT` longtext, `COUNT_STAR` bigint(20) unsigned NOT NULL, `SUM_TIMER_WAIT` bigint(20) unsigned NOT NULL, `MIN_TIMER_WAIT` bigint(20) unsigned NOT NULL, `AVG_TIMER_WAIT` bigint(20) unsigned NOT NULL, `MAX_TIMER_WAIT` bigint(20) unsigned NOT NULL, `SUM_LOCK_TIME` bigint(20) unsigned NOT NULL, `SUM_ERRORS` bigint(20) unsigned NOT NULL, `SUM_WARNINGS` bigint(20) unsigned NOT NULL, `SUM_ROWS_AFFECTED` bigint(20) unsigned NOT NULL, `SUM_ROWS_SENT` bigint(20) unsigned NOT NULL, `SUM_ROWS_EXAMINED` bigint(20) unsigned NOT NULL, `SUM_CREATED_TMP_DISK_TABLES` bigint(20) unsigned NOT NULL, `SUM_CREATED_TMP_TABLES` bigint(20) unsigned NOT NULL, `SUM_SELECT_FULL_JOIN` bigint(20) unsigned NOT NULL, `SUM_SELECT_FULL_RANGE_JOIN` bigint(20) unsigned NOT NULL, `SUM_SELECT_RANGE` bigint(20) unsigned NOT NULL, `SUM_SELECT_RANGE_CHECK` bigint(20) unsigned NOT NULL, `SUM_SELECT_SCAN` bigint(20) unsigned NOT NULL, `SUM_SORT_MERGE_PASSES` bigint(20) unsigned NOT NULL, `SUM_SORT_RANGE` bigint(20) unsigned NOT NULL, `SUM_SORT_ROWS` bigint(20) unsigned NOT NULL, `SUM_SORT_SCAN` bigint(20) unsigned NOT NULL, `SUM_NO_INDEX_USED` bigint(20) unsigned NOT NULL, `SUM_NO_GOOD_INDEX_USED` bigint(20) unsigned NOT NULL, `FIRST_SEEN` timestamp NULL DEFAULT NULL, `LAST_SEEN` timestamp NULL DEFAULT NULL, INDEX (SCHEMA_NAME, DIGEST) ) DEFAULT CHARSET=utf8\';  IF (v_force_new_snapshot OR in_action = \'snapshot\' OR (in_action = \'overall\' AND in_table IS NULL) OR (in_action = \'save\' AND v_tmp_digests_table_exists <> \'TEMPORARY\') ) THEN IF (v_tmp_digests_table_exists = \'TEMPORARY\') THEN IF (@sys.debug = \'ON\') THEN SELECT \'DROP TEMPORARY TABLE IF EXISTS tmp_digests\' AS \'Debug\'; END IF; DROP TEMPORARY TABLE IF EXISTS tmp_digests; END IF; CALL sys.execute_prepared_stmt(REPLACE(REPLACE(v_digest_table_template, \'%{TEMPORARY}\', \'TEMPORARY \'), \'%{TABLE_NAME}\', \'tmp_digests\'));  SET v_sql = CONCAT(\'INSERT INTO tmp_digests SELECT * FROM \', IF(in_table IS NULL OR in_action = \'save\', \'performance_schema.events_statements_summary_by_digest\', v_quoted_table)); CALL sys.execute_prepared_stmt(v_sql); END IF;  IF (in_action IN (\'create_table\', \'create_tmp\')) THEN IF (in_action = \'create_table\') THEN CALL sys.execute_prepared_stmt(REPLACE(REPLACE(v_digest_table_template, \'%{TEMPORARY}\', \'\'), \'%{TABLE_NAME}\', v_quoted_table)); ELSE CALL sys.execute_prepared_stmt(REPLACE(REPLACE(v_digest_table_template, \'%{TEMPORARY}\', \'TEMPORARY \'), \'%{TABLE_NAME}\', v_quoted_table)); END IF; ELSEIF (in_action = \'save\') THEN CALL sys.execute_prepared_stmt(CONCAT(\'DELETE FROM \', v_quoted_table)); CALL sys.execute_prepared_stmt(CONCAT(\'INSERT INTO \', v_quoted_table, \' SELECT * FROM tmp_digests\')); ELSEIF (in_action = \'cleanup\') THEN DROP TEMPORARY TABLE IF EXISTS sys.tmp_digests; DROP TEMPORARY TABLE IF EXISTS sys.tmp_digests_delta; ELSEIF (in_action IN (\'overall\', \'delta\')) THEN IF (in_action = \'overall\') THEN IF (in_table IS NULL) THEN SET v_digests_table = \'tmp_digests\'; ELSE SET v_digests_table = v_quoted_table; END IF; ELSE SET v_digests_table = \'tmp_digests_delta\'; DROP TEMPORARY TABLE IF EXISTS tmp_digests_delta; CREATE TEMPORARY TABLE tmp_digests_delta LIKE tmp_digests; SET v_sql = CONCAT(\'INSERT INTO tmp_digests_delta SELECT `d_end`.`SCHEMA_NAME`, `d_end`.`DIGEST`, `d_end`.`DIGEST_TEXT`, `d_end`.`COUNT_STAR`-IFNULL(`d_start`.`COUNT_STAR`, 0) AS \'\'COUNT_STAR\'\', `d_end`.`SUM_TIMER_WAIT`-IFNULL(`d_start`.`SUM_TIMER_WAIT`, 0) AS \'\'SUM_TIMER_WAIT\'\', `d_end`.`MIN_TIMER_WAIT` AS \'\'MIN_TIMER_WAIT\'\', IFNULL((`d_end`.`SUM_TIMER_WAIT`-IFNULL(`d_start`.`SUM_TIMER_WAIT`, 0))/NULLIF(`d_end`.`COUNT_STAR`-IFNULL(`d_start`.`COUNT_STAR`, 0), 0), 0) AS \'\'AVG_TIMER_WAIT\'\', `d_end`.`MAX_TIMER_WAIT` AS \'\'MAX_TIMER_WAIT\'\', `d_end`.`SUM_LOCK_TIME`-IFNULL(`d_start`.`SUM_LOCK_TIME`, 0) AS \'\'SUM_LOCK_TIME\'\', `d_end`.`SUM_ERRORS`-IFNULL(`d_start`.`SUM_ERRORS`, 0) AS \'\'SUM_ERRORS\'\', `d_end`.`SUM_WARNINGS`-IFNULL(`d_start`.`SUM_WARNINGS`, 0) AS \'\'SUM_WARNINGS\'\', `d_end`.`SUM_ROWS_AFFECTED`-IFNULL(`d_start`.`SUM_ROWS_AFFECTED`, 0) AS \'\'SUM_ROWS_AFFECTED\'\', `d_end`.`SUM_ROWS_SENT`-IFNULL(`d_start`.`SUM_ROWS_SENT`, 0) AS \'\'SUM_ROWS_SENT\'\', `d_end`.`SUM_ROWS_EXAMINED`-IFNULL(`d_start`.`SUM_ROWS_EXAMINED`, 0) AS \'\'SUM_ROWS_EXAMINED\'\', `d_end`.`SUM_CREATED_TMP_DISK_TABLES`-IFNULL(`d_start`.`SUM_CREATED_TMP_DISK_TABLES`, 0) AS \'\'SUM_CREATED_TMP_DISK_TABLES\'\', `d_end`.`SUM_CREATED_TMP_TABLES`-IFNULL(`d_start`.`SUM_CREATED_TMP_TABLES`, 0) AS \'\'SUM_CREATED_TMP_TABLES\'\', `d_end`.`SUM_SELECT_FULL_JOIN`-IFNULL(`d_start`.`SUM_SELECT_FULL_JOIN`, 0) AS \'\'SUM_SELECT_FULL_JOIN\'\', `d_end`.`SUM_SELECT_FULL_RANGE_JOIN`-IFNULL(`d_start`.`SUM_SELECT_FULL_RANGE_JOIN`, 0) AS \'\'SUM_SELECT_FULL_RANGE_JOIN\'\', `d_end`.`SUM_SELECT_RANGE`-IFNULL(`d_start`.`SUM_SELECT_RANGE`, 0) AS \'\'SUM_SELECT_RANGE\'\', `d_end`.`SUM_SELECT_RANGE_CHECK`-IFNULL(`d_start`.`SUM_SELECT_RANGE_CHECK`, 0) AS \'\'SUM_SELECT_RANGE_CHECK\'\', `d_end`.`SUM_SELECT_SCAN`-IFNULL(`d_start`.`SUM_SELECT_SCAN`, 0) AS \'\'SUM_SELECT_SCAN\'\', `d_end`.`SUM_SORT_MERGE_PASSES`-IFNULL(`d_start`.`SUM_SORT_MERGE_PASSES`, 0) AS \'\'SUM_SORT_MERGE_PASSES\'\', `d_end`.`SUM_SORT_RANGE`-IFNULL(`d_start`.`SUM_SORT_RANGE`, 0) AS \'\'SUM_SORT_RANGE\'\', `d_end`.`SUM_SORT_ROWS`-IFNULL(`d_start`.`SUM_SORT_ROWS`, 0) AS \'\'SUM_SORT_ROWS\'\', `d_end`.`SUM_SORT_SCAN`-IFNULL(`d_start`.`SUM_SORT_SCAN`, 0) AS \'\'SUM_SORT_SCAN\'\', `d_end`.`SUM_NO_INDEX_USED`-IFNULL(`d_start`.`SUM_NO_INDEX_USED`, 0) AS \'\'SUM_NO_INDEX_USED\'\', `d_end`.`SUM_NO_GOOD_INDEX_USED`-IFNULL(`d_start`.`SUM_NO_GOOD_INDEX_USED`, 0) AS \'\'SUM_NO_GOOD_INDEX_USED\'\', `d_end`.`FIRST_SEEN`, `d_end`.`LAST_SEEN` FROM tmp_digests d_end LEFT OUTER JOIN \', v_quoted_table, \' d_start ON `d_start`.`DIGEST` = `d_end`.`DIGEST` AND (`d_start`.`SCHEMA_NAME` = `d_end`.`SCHEMA_NAME` OR (`d_start`.`SCHEMA_NAME` IS NULL AND `d_end`.`SCHEMA_NAME` IS NULL) ) WHERE `d_end`.`COUNT_STAR`-IFNULL(`d_start`.`COUNT_STAR`, 0) > 0\'); CALL sys.execute_prepared_stmt(v_sql); END IF;  IF (FIND_IN_SET(\'with_runtimes_in_95th_percentile\', in_views)) THEN SELECT \'Queries with Runtime in 95th Percentile\' AS \'Next Output\';  DROP TEMPORARY TABLE IF EXISTS tmp_digest_avg_latency_distribution1; DROP TEMPORARY TABLE IF EXISTS tmp_digest_avg_latency_distribution2; DROP TEMPORARY TABLE IF EXISTS tmp_digest_95th_percentile_by_avg_us;  CREATE TEMPORARY TABLE tmp_digest_avg_latency_distribution1 ( cnt bigint unsigned NOT NULL, avg_us decimal(21,0) NOT NULL, PRIMARY KEY (avg_us) ) ENGINE=InnoDB;  SET v_sql = CONCAT(\'INSERT INTO tmp_digest_avg_latency_distribution1 SELECT COUNT(*) cnt,  ROUND(avg_timer_wait/1000000) AS avg_us FROM \', v_digests_table, \' GROUP BY avg_us\'); CALL sys.execute_prepared_stmt(v_sql);  CREATE TEMPORARY TABLE tmp_digest_avg_latency_distribution2 LIKE tmp_digest_avg_latency_distribution1; INSERT INTO tmp_digest_avg_latency_distribution2 SELECT * FROM tmp_digest_avg_latency_distribution1;  CREATE TEMPORARY TABLE tmp_digest_95th_percentile_by_avg_us ( avg_us decimal(21,0) NOT NULL, percentile decimal(46,4) NOT NULL, PRIMARY KEY (avg_us) ) ENGINE=InnoDB;  SET v_sql = CONCAT(\'INSERT INTO tmp_digest_95th_percentile_by_avg_us SELECT s2.avg_us avg_us, IFNULL(SUM(s1.cnt)/NULLIF((SELECT COUNT(*) FROM \', v_digests_table, \'), 0), 0) percentile FROM tmp_digest_avg_latency_distribution1 AS s1 JOIN tmp_digest_avg_latency_distribution2 AS s2 ON s1.avg_us <= s2.avg_us GROUP BY s2.avg_us HAVING percentile > 0.95 ORDER BY percentile LIMIT 1\'); CALL sys.execute_prepared_stmt(v_sql);  SET v_sql = REPLACE( REPLACE( (SELECT VIEW_DEFINITION FROM information_schema.VIEWS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = \'statements_with_runtimes_in_95th_percentile\' ), \'`performance_schema`.`events_statements_summary_by_digest`\', v_digests_table ), \'sys.x$ps_digest_95th_percentile_by_avg_us\', \'`sys`.`x$ps_digest_95th_percentile_by_avg_us`\' ); CALL sys.execute_prepared_stmt(v_sql);  DROP TEMPORARY TABLE tmp_digest_avg_latency_distribution1; DROP TEMPORARY TABLE tmp_digest_avg_latency_distribution2; DROP TEMPORARY TABLE tmp_digest_95th_percentile_by_avg_us; END IF;  IF (FIND_IN_SET(\'analysis\', in_views)) THEN SELECT CONCAT(\'Top \', @sys.statement_performance_analyzer.limit, \' Queries Ordered by Total Latency\') AS \'Next Output\'; SET v_sql = REPLACE( (SELECT VIEW_DEFINITION FROM information_schema.VIEWS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = \'statement_analysis\' ), \'`performance_schema`.`events_statements_summary_by_digest`\', v_digests_table ); IF (@sys.statement_performance_analyzer.limit > 0) THEN SET v_sql = CONCAT(v_sql, \' LIMIT \', @sys.statement_performance_analyzer.limit); END IF; CALL sys.execute_prepared_stmt(v_sql); END IF;  IF (FIND_IN_SET(\'with_errors_or_warnings\', in_views)) THEN SELECT CONCAT(\'Top \', @sys.statement_performance_analyzer.limit, \' Queries with Errors\') AS \'Next Output\'; SET v_sql = REPLACE( (SELECT VIEW_DEFINITION FROM information_schema.VIEWS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = \'statements_with_errors_or_warnings\' ), \'`performance_schema`.`events_statements_summary_by_digest`\', v_digests_table ); IF (@sys.statement_performance_analyzer.limit > 0) THEN SET v_sql = CONCAT(v_sql, \' LIMIT \', @sys.statement_performance_analyzer.limit); END IF; CALL sys.execute_prepared_stmt(v_sql); END IF;  IF (FIND_IN_SET(\'with_full_table_scans\', in_views)) THEN SELECT CONCAT(\'Top \', @sys.statement_performance_analyzer.limit, \' Queries with Full Table Scan\') AS \'Next Output\'; SET v_sql = REPLACE( (SELECT VIEW_DEFINITION FROM information_schema.VIEWS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = \'statements_with_full_table_scans\' ), \'`performance_schema`.`events_statements_summary_by_digest`\', v_digests_table ); IF (@sys.statement_performance_analyzer.limit > 0) THEN SET v_sql = CONCAT(v_sql, \' LIMIT \', @sys.statement_performance_analyzer.limit); END IF; CALL sys.execute_prepared_stmt(v_sql); END IF;  IF (FIND_IN_SET(\'with_sorting\', in_views)) THEN SELECT CONCAT(\'Top \', @sys.statement_performance_analyzer.limit, \' Queries with Sorting\') AS \'Next Output\'; SET v_sql = REPLACE( (SELECT VIEW_DEFINITION FROM information_schema.VIEWS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = \'statements_with_sorting\' ), \'`performance_schema`.`events_statements_summary_by_digest`\', v_digests_table ); IF (@sys.statement_performance_analyzer.limit > 0) THEN SET v_sql = CONCAT(v_sql, \' LIMIT \', @sys.statement_performance_analyzer.limit); END IF; CALL sys.execute_prepared_stmt(v_sql); END IF;  IF (FIND_IN_SET(\'with_temp_tables\', in_views)) THEN SELECT CONCAT(\'Top \', @sys.statement_performance_analyzer.limit, \' Queries with Internal Temporary Tables\') AS \'Next Output\'; SET v_sql = REPLACE( (SELECT VIEW_DEFINITION FROM information_schema.VIEWS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = \'statements_with_temp_tables\' ), \'`performance_schema`.`events_statements_summary_by_digest`\', v_digests_table ); IF (@sys.statement_performance_analyzer.limit > 0) THEN SET v_sql = CONCAT(v_sql, \' LIMIT \', @sys.statement_performance_analyzer.limit); END IF; CALL sys.execute_prepared_stmt(v_sql); END IF;  IF (FIND_IN_SET(\'custom\', in_views)) THEN SELECT CONCAT(\'Top \', @sys.statement_performance_analyzer.limit, \' Queries Using Custom View\') AS \'Next Output\';  IF (@sys.statement_performance_analyzer.view IS NULL) THEN SET @sys.statement_performance_analyzer.view = sys.sys_get_config(\'statement_performance_analyzer.view\', NULL); END IF; IF (@sys.statement_performance_analyzer.view IS NULL) THEN SIGNAL SQLSTATE \'45000\' SET MESSAGE_TEXT = \'The @sys.statement_performance_analyzer.view user variable must be set with the view or query to use.\'; END IF;  IF (NOT INSTR(@sys.statement_performance_analyzer.view, \' \')) THEN IF (NOT INSTR(@sys.statement_performance_analyzer.view, \'.\')) THEN SET v_custom_db   = DATABASE(), v_custom_name = @sys.statement_performance_analyzer.view; ELSE SET v_custom_db   = SUBSTRING_INDEX(@sys.statement_performance_analyzer.view, \'.\', 1); SET v_custom_name = SUBSTRING(@sys.statement_performance_analyzer.view, CHAR_LENGTH(v_custom_db)+2); END IF;  CALL sys.table_exists(v_custom_db, v_custom_name, v_custom_view_exists); IF (v_custom_view_exists <> \'VIEW\') THEN SIGNAL SQLSTATE \'45000\' SET MESSAGE_TEXT = \'The @sys.statement_performance_analyzer.view user variable is set but specified neither an existing view nor a query.\'; END IF;  SET v_sql = REPLACE( (SELECT VIEW_DEFINITION FROM information_schema.VIEWS WHERE TABLE_SCHEMA = v_custom_db AND TABLE_NAME = v_custom_name ), \'`performance_schema`.`events_statements_summary_by_digest`\', v_digests_table ); ELSE SET v_sql = REPLACE(@sys.statement_performance_analyzer.view, \'`performance_schema`.`events_statements_summary_by_digest`\', v_digests_table); END IF;  IF (@sys.statement_performance_analyzer.limit > 0) THEN SET v_sql = CONCAT(v_sql, \' LIMIT \', @sys.statement_performance_analyzer.limit); END IF;  CALL sys.execute_prepared_stmt(v_sql); END IF; END IF;  IF (v_this_thread_enabled = \'YES\') THEN CALL sys.ps_setup_enable_thread(CONNECTION_ID()); END IF;  IF (@log_bin = 1) THEN SET sql_log_bin = @log_bin; END IF; END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Create a report of the statements running on the server.
 
 The views are calculated based on the overall and/or delta activity.
 
 Requires the SUPER privilege for "SET sql_log_bin = 0;".
 
 Parameters
 
 in_action (ENUM(\'snapshot\', \'overall\', \'delta\', \'create_tmp\', \'create_table\', \'save\', \'cleanup\')):
 The action to take. Supported actions are:
 * snapshot      Store a snapshot. The default is to make a snapshot of the current content of
 performance_schema.events_statements_summary_by_digest, but by setting in_table
 this can be overwritten to copy the content of the specified table.
 The snapshot is stored in the sys.tmp_digests temporary table.
 * overall       Generate analyzis based on the content specified by in_table. For the overall analyzis,
 in_table can be NOW() to use a fresh snapshot. This will overwrite an existing snapshot.
 Use NULL for in_table to use the existing snapshot. If in_table IS NULL and no snapshot
 exists, a new will be created.
 See also in_views and @sys.statement_performance_analyzer.limit.
 * delta         Generate a delta analysis. The delta will be calculated between the reference table in
 in_table and the snapshot. An existing snapshot must exist.
 The action uses the sys.tmp_digests_delta temporary table.
 See also in_views and @sys.statement_performance_analyzer.limit.
 * create_table  Create a regular table suitable for storing the snapshot for later use, e.g. for
 calculating deltas.
 * create_tmp    Create a temporary table suitable for storing the snapshot for later use, e.g. for
 calculating deltas.
 * save          Save the snapshot in the table specified by in_table. The table must exists and have
 the correct structure.
 If no snapshot exists, a new is created.
 * cleanup       Remove the temporary tables used for the snapshot and delta.
 
 in_table (VARCHAR(129)):
 The table argument used for some actions. Use the format \'db1.t1\' or \'t1\' without using any backticks (`)
 for quoting. Periods (.) are not supported in the database and table names.
 
 The meaning of the table for each action supporting the argument is:
 
 * snapshot      The snapshot is created based on the specified table. Set to NULL or NOW() to use
 the current content of performance_schema.events_statements_summary_by_digest.
 * overall       The table with the content to create the overall analyzis for. The following values
 can be used:
 - A table name - use the content of that table.
 - NOW()        - create a fresh snapshot and overwrite the existing snapshot.
 - NULL         - use the last stored snapshot.
 * delta         The table name is mandatory and specified the reference view to compare the currently
 stored snapshot against. If no snapshot exists, a new will be created.
 * create_table  The name of the regular table to create.
 * create_tmp    The name of the temporary table to create.
 * save          The name of the table to save the currently stored snapshot into.
 
 in_views (SET (\'with_runtimes_in_95th_percentile\', \'analysis\', \'with_errors_or_warnings\',
 \'with_full_table_scans\', \'with_sorting\', \'with_temp_tables\', \'custom\'))
 Which views to include:  * with_runtimes_in_95th_percentile  Based on the sys.statements_with_runtimes_in_95th_percentile view * analysis                          Based on the sys.statement_analysis view * with_errors_or_warnings           Based on the sys.statements_with_errors_or_warnings view * with_full_table_scans             Based on the sys.statements_with_full_table_scans view * with_sorting                      Based on the sys.statements_with_sorting view * with_temp_tables                  Based on the sys.statements_with_temp_tables view * custom                            Use a custom view. This view must be specified in @sys.statement_performance_analyzer.view to an existing view or a query  Default is to include all except \'custom\'.   Configuration Options  sys.statement_performance_analyzer.limit The maximum number of rows to include for the views that does not have a built-in limit (e.g. the 95th percentile view). If not set the limit is 100.  sys.statement_performance_analyzer.view Used together with the \'custom\' view. If the value contains a space, it is considered a query, otherwise it must be an existing view querying the performance_schema.events_statements_summary_by_digest table. There cannot be any limit clause including in the query or view definition if @sys.statement_performance_analyzer.limit > 0. If specifying a view, use the same format as for in_table.  sys.debug Whether to provide debugging output. Default is \'OFF\'. Set to \'ON\' to include.   Example  To create a report with the queries in the 95th percentile since last truncate of performance_schema.events_statements_summary_by_digest and the delta for a 1 minute period:  1. Create a temporary table to store the initial snapshot. 2. Create the initial snapshot. 3. Save the initial snapshot in the temporary table. 4. Wait one minute. 5. Create a new snapshot. 6. Perform analyzis based on the new snapshot. 7. Perform analyzis based on the delta between the initial and new snapshots.  mysql> CALL sys.statement_performance_analyzer(\'create_tmp\', \'mydb.tmp_digests_ini\', NULL); Query OK, 0 rows affected (0.08 sec)  mysql> CALL sys.statement_performance_analyzer(\'snapshot\', NULL, NULL); Query OK, 0 rows affected (0.02 sec)  mysql> CALL sys.statement_performance_analyzer(\'save\', \'mydb.tmp_digests_ini\', NULL); Query OK, 0 rows affected (0.00 sec)  mysql> DO SLEEP(60); Query OK, 0 rows affected (1 min 0.00 sec)  mysql> CALL sys.statement_performance_analyzer(\'snapshot\', NULL, NULL); Query OK, 0 rows affected (0.02 sec)  mysql> CALL sys.statement_performance_analyzer(\'overall\', NULL, \'with_runtimes_in_95th_percentile\'); +-----------------------------------------+ | Next Output                             | +-----------------------------------------+ | Queries with Runtime in 95th Percentile | +-----------------------------------------+ 1 row in set (0.05 sec)  ...  mysql> CALL sys.statement_performance_analyzer(\'delta\', \'mydb.tmp_digests_ini\', \'with_runtimes_in_95th_percentile\'); +-----------------------------------------+ | Next Output                             | +-----------------------------------------+ | Queries with Runtime in 95th Percentile | +-----------------------------------------+ 1 row in set (0.03 sec)  ...   To create an overall report of the 95th percentile queries and the top 10 queries with full table scans:  mysql> CALL sys.statement_performance_analyzer(\'snapshot\', NULL, NULL); Query OK, 0 rows affected (0.01 sec)                                     mysql> SET @sys.statement_performance_analyzer.limit = 10; Query OK, 0 rows affected (0.00 sec)            mysql> CALL sys.statement_performance_analyzer(\'overall\', NULL, \'with_runtimes_in_95th_percentile,with_full_table_scans\'); +-----------------------------------------+ | Next Output                             | +-----------------------------------------+ | Queries with Runtime in 95th Percentile | +-----------------------------------------+ 1 row in set (0.01 sec)  ...  +-------------------------------------+ | Next Output                         | +-------------------------------------+ | Top 10 Queries with Full Table Scan | +-------------------------------------+ 1 row in set (0.09 sec)  ...   Use a custom view showing the top 10 query sorted by total execution time refreshing the view every minute using the watch command in Linux.  mysql> CREATE OR REPLACE VIEW mydb.my_statements AS -> SELECT sys.format_statement(DIGEST_TEXT) AS query, ->        SCHEMA_NAME AS db, ->        COUNT_STAR AS exec_count, ->        sys.format_time(SUM_TIMER_WAIT) AS total_latency, ->        sys.format_time(AVG_TIMER_WAIT) AS avg_latency, ->        ROUND(IFNULL(SUM_ROWS_SENT / NULLIF(COUNT_STAR, 0), 0)) AS rows_sent_avg, ->        ROUND(IFNULL(SUM_ROWS_EXAMINED / NULLIF(COUNT_STAR, 0), 0)) AS rows_examined_avg, ->        ROUND(IFNULL(SUM_ROWS_AFFECTED / NULLIF(COUNT_STAR, 0), 0)) AS rows_affected_avg, ->        DIGEST AS digest ->   FROM performance_schema.events_statements_summary_by_digest -> ORDER BY SUM_TIMER_WAIT DESC; Query OK, 0 rows affected (0.01 sec)  mysql> CALL sys.statement_performance_analyzer(\'create_table\', \'mydb.digests_prev\', NULL); Query OK, 0 rows affected (0.10 sec)  shell$ watch -n 60 "mysql sys --table -e " > SET @sys.statement_performance_analyzer.view = \'mydb.my_statements\'; > SET @sys.statement_performance_analyzer.limit = 10; > CALL statement_performance_analyzer(\'snapshot\', NULL, NULL); > CALL statement_performance_analyzer(\'delta\', \'mydb.digests_prev\', \'custom\'); > CALL statement_performance_analyzer(\'save\', \'mydb.digests_prev\', NULL); > ""  Every 60.0s: mysql sys --table -e "                                                                                                   ...  Mon Dec 22 10:58:51 2014  +----------------------------------+ | Next Output                      | +----------------------------------+ | Top 10 Queries Using Custom View | +----------------------------------+ +-------------------+-------+------------+---------------+-------------+---------------+-------------------+-------------------+----------------------------------+ | query             | db    | exec_count | total_latency | avg_latency | rows_sent_avg | rows_examined_avg | rows_affected_avg | digest                           | +-------------------+-------+------------+---------------+-------------+---------------+-------------------+-------------------+----------------------------------+ ... ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN DECLARE v_table_exists, v_tmp_digests_table_exists, v_custom_view_exists ENUM(\'\', \'BASE TABLE\', \'VIEW\', \'TEMPORARY\') DEFAULT \'\'; DECLARE v_this_thread_enabled ENUM(\'YES\', \'NO\'); DECLARE v_force_new_snapshot BOOLEAN DEFAULT FALSE; DECLARE v_digests_table VARCHAR(133); DECLARE v_quoted_table, v_quoted_custom_view VARCHAR(133) DEFAULT \'\'; DECLARE v_table_db, v_table_name, v_custom_db, v_custom_name VARCHAR(64); DECLARE v_digest_table_template, v_checksum_ref, v_checksum_table text; DECLARE v_sql longtext; DECLARE v_error_msg VARCHAR(128);   SELECT INSTRUMENTED INTO v_this_thread_enabled FROM performance_schema.threads WHERE PROCESSLIST_ID = CONNECTION_ID(); IF (v_this_thread_enabled = \'YES\') THEN CALL sys.ps_setup_disable_thread(CONNECTION_ID()); END IF;  SET @log_bin := @@sql_log_bin; IF (@log_bin = 1) THEN SET sql_log_bin = 0; END IF;   IF (@sys.statement_performance_analyzer.limit IS NULL) THEN SET @sys.statement_performance_analyzer.limit = sys.sys_get_config(\'statement_performance_analyzer.limit\', \'100\'); END IF; IF (@sys.debug IS NULL) THEN SET @sys.debug                                = sys.sys_get_config(\'debug\'                               , \'OFF\'); END IF;   IF (in_table = \'NOW()\') THEN SET v_force_new_snapshot = TRUE, in_table             = NULL; ELSEIF (in_table IS NOT NULL) THEN IF (NOT INSTR(in_table, \'.\')) THEN SET v_table_db   = DATABASE(), v_table_name = in_table; ELSE SET v_table_db   = SUBSTRING_INDEX(in_table, \'.\', 1); SET v_table_name = SUBSTRING(in_table, CHAR_LENGTH(v_table_db)+2); END IF;  SET v_quoted_table = CONCAT(\'`\', v_table_db, \'`.`\', v_table_name, \'`\');  IF (@sys.debug = \'ON\') THEN SELECT CONCAT(\'in_table is: db = \'\', v_table_db, \'\', table = \'\', v_table_name, \'\'\') AS \'Debug\'; END IF;  IF (v_table_db = DATABASE() AND (v_table_name = \'tmp_digests\' OR v_table_name = \'tmp_digests_delta\')) THEN SET v_error_msg = CONCAT(\'Invalid value for in_table: \', v_quoted_table, \' is reserved table name.\'); SIGNAL SQLSTATE \'45000\' SET MESSAGE_TEXT = v_error_msg; END IF;  CALL sys.table_exists(v_table_db, v_table_name, v_table_exists); IF (@sys.debug = \'ON\') THEN SELECT CONCAT(\'v_table_exists = \', v_table_exists) AS \'Debug\'; END IF;  IF (v_table_exists = \'BASE TABLE\') THEN SET v_checksum_ref = ( SELECT GROUP_CONCAT(CONCAT(COLUMN_NAME, COLUMN_TYPE) ORDER BY ORDINAL_POSITION) AS Checksum FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = \'performance_schema\' AND TABLE_NAME = \'events_statements_summary_by_digest\' ), v_checksum_table = ( SELECT GROUP_CONCAT(CONCAT(COLUMN_NAME, COLUMN_TYPE) ORDER BY ORDINAL_POSITION) AS Checksum FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = v_table_db AND TABLE_NAME = v_table_name );  IF (v_checksum_ref <> v_checksum_table) THEN SET v_error_msg = CONCAT(\'The table \', IF(CHAR_LENGTH(v_quoted_table) > 93, CONCAT(\'...\', SUBSTRING(v_quoted_table, -90)), v_quoted_table), \' has the wrong definition.\'); SIGNAL SQLSTATE \'45000\' SET MESSAGE_TEXT = v_error_msg; END IF; END IF; END IF;   IF (in_views IS NULL OR in_views = \'\') THEN SET in_views = \'with_runtimes_in_95th_percentile,analysis,with_errors_or_warnings,with_full_table_scans,with_sorting,with_temp_tables\'; END IF;   CALL sys.table_exists(DATABASE(), \'tmp_digests\', v_tmp_digests_table_exists); IF (@sys.debug = \'ON\') THEN SELECT CONCAT(\'v_tmp_digests_table_exists = \', v_tmp_digests_table_exists) AS \'Debug\'; END IF;  CASE WHEN in_action IN (\'snapshot\', \'overall\') THEN IF (in_table IS NOT NULL) THEN IF (NOT v_table_exists IN (\'TEMPORARY\', \'BASE TABLE\')) THEN SET v_error_msg = CONCAT(\'The \', in_action, \' action requires in_table to be NULL, NOW() or specify an existing table.\', \' The table \', IF(CHAR_LENGTH(v_quoted_table) > 16, CONCAT(\'...\', SUBSTRING(v_quoted_table, -13)), v_quoted_table), \' does not exist.\'); SIGNAL SQLSTATE \'45000\' SET MESSAGE_TEXT = v_error_msg; END IF; END IF;  WHEN in_action IN (\'delta\', \'save\') THEN IF (v_table_exists NOT IN (\'TEMPORARY\', \'BASE TABLE\')) THEN SET v_error_msg = CONCAT(\'The \', in_action, \' action requires in_table to be an existing table.\', IF(in_table IS NOT NULL, CONCAT(\' The table \', IF(CHAR_LENGTH(v_quoted_table) > 39, CONCAT(\'...\', SUBSTRING(v_quoted_table, -36)), v_quoted_table), \' does not exist.\'), \'\')); SIGNAL SQLSTATE \'45000\' SET MESSAGE_TEXT = v_error_msg; END IF;  IF (in_action = \'delta\' AND v_tmp_digests_table_exists <> \'TEMPORARY\') THEN SIGNAL SQLSTATE \'45000\' SET MESSAGE_TEXT = \'An existing snapshot generated with the statement_performance_analyzer() must exist.\'; END IF; WHEN in_action = \'create_tmp\' THEN IF (v_table_exists = \'TEMPORARY\') THEN SET v_error_msg = CONCAT(\'Cannot create the table \', IF(CHAR_LENGTH(v_quoted_table) > 72, CONCAT(\'...\', SUBSTRING(v_quoted_table, -69)), v_quoted_table), \' as it already exists.\'); SIGNAL SQLSTATE \'45000\' SET MESSAGE_TEXT = v_error_msg; END IF;  WHEN in_action = \'create_table\' THEN IF (v_table_exists <> \'\') THEN SET v_error_msg = CONCAT(\'Cannot create the table \', IF(CHAR_LENGTH(v_quoted_table) > 52, CONCAT(\'...\', SUBSTRING(v_quoted_table, -49)), v_quoted_table), \' as it already exists\', IF(v_table_exists = \'TEMPORARY\', \' as a temporary table.\', \'.\')); SIGNAL SQLSTATE \'45000\' SET MESSAGE_TEXT = v_error_msg; END IF;  WHEN in_action = \'cleanup\' THEN DO (SELECT 1); ELSE SIGNAL SQLSTATE \'45000\' SET MESSAGE_TEXT = \'Unknown action. Supported actions are: cleanup, create_table, create_tmp, delta, overall, save, snapshot\'; END CASE;  SET v_digest_table_template = \'CREATE %{TEMPORARY}TABLE %{TABLE_NAME} ( `SCHEMA_NAME` varchar(64) DEFAULT NULL, `DIGEST` varchar(32) DEFAULT NULL, `DIGEST_TEXT` longtext, `COUNT_STAR` bigint(20) unsigned NOT NULL, `SUM_TIMER_WAIT` bigint(20) unsigned NOT NULL, `MIN_TIMER_WAIT` bigint(20) unsigned NOT NULL, `AVG_TIMER_WAIT` bigint(20) unsigned NOT NULL, `MAX_TIMER_WAIT` bigint(20) unsigned NOT NULL, `SUM_LOCK_TIME` bigint(20) unsigned NOT NULL, `SUM_ERRORS` bigint(20) unsigned NOT NULL, `SUM_WARNINGS` bigint(20) unsigned NOT NULL, `SUM_ROWS_AFFECTED` bigint(20) unsigned NOT NULL, `SUM_ROWS_SENT` bigint(20) unsigned NOT NULL, `SUM_ROWS_EXAMINED` bigint(20) unsigned NOT NULL, `SUM_CREATED_TMP_DISK_TABLES` bigint(20) unsigned NOT NULL, `SUM_CREATED_TMP_TABLES` bigint(20) unsigned NOT NULL, `SUM_SELECT_FULL_JOIN` bigint(20) unsigned NOT NULL, `SUM_SELECT_FULL_RANGE_JOIN` bigint(20) unsigned NOT NULL, `SUM_SELECT_RANGE` bigint(20) unsigned NOT NULL, `SUM_SELECT_RANGE_CHECK` bigint(20) unsigned NOT NULL, `SUM_SELECT_SCAN` bigint(20) unsigned NOT NULL, `SUM_SORT_MERGE_PASSES` bigint(20) unsigned NOT NULL, `SUM_SORT_RANGE` bigint(20) unsigned NOT NULL, `SUM_SORT_ROWS` bigint(20) unsigned NOT NULL, `SUM_SORT_SCAN` bigint(20) unsigned NOT NULL, `SUM_NO_INDEX_USED` bigint(20) unsigned NOT NULL, `SUM_NO_GOOD_INDEX_USED` bigint(20) unsigned NOT NULL, `FIRST_SEEN` timestamp NULL DEFAULT NULL, `LAST_SEEN` timestamp NULL DEFAULT NULL, INDEX (SCHEMA_NAME, DIGEST) ) DEFAULT CHARSET=utf8\';  IF (v_force_new_snapshot OR in_action = \'snapshot\' OR (in_action = \'overall\' AND in_table IS NULL) OR (in_action = \'save\' AND v_tmp_digests_table_exists <> \'TEMPORARY\') ) THEN IF (v_tmp_digests_table_exists = \'TEMPORARY\') THEN IF (@sys.debug = \'ON\') THEN SELECT \'DROP TEMPORARY TABLE IF EXISTS tmp_digests\' AS \'Debug\'; END IF; DROP TEMPORARY TABLE IF EXISTS tmp_digests; END IF; CALL sys.execute_prepared_stmt(REPLACE(REPLACE(v_digest_table_template, \'%{TEMPORARY}\', \'TEMPORARY \'), \'%{TABLE_NAME}\', \'tmp_digests\'));  SET v_sql = CONCAT(\'INSERT INTO tmp_digests SELECT * FROM \', IF(in_table IS NULL OR in_action = \'save\', \'performance_schema.events_statements_summary_by_digest\', v_quoted_table)); CALL sys.execute_prepared_stmt(v_sql); END IF;  IF (in_action IN (\'create_table\', \'create_tmp\')) THEN IF (in_action = \'create_table\') THEN CALL sys.execute_prepared_stmt(REPLACE(REPLACE(v_digest_table_template, \'%{TEMPORARY}\', \'\'), \'%{TABLE_NAME}\', v_quoted_table)); ELSE CALL sys.execute_prepared_stmt(REPLACE(REPLACE(v_digest_table_template, \'%{TEMPORARY}\', \'TEMPORARY \'), \'%{TABLE_NAME}\', v_quoted_table)); END IF; ELSEIF (in_action = \'save\') THEN CALL sys.execute_prepared_stmt(CONCAT(\'DELETE FROM \', v_quoted_table)); CALL sys.execute_prepared_stmt(CONCAT(\'INSERT INTO \', v_quoted_table, \' SELECT * FROM tmp_digests\')); ELSEIF (in_action = \'cleanup\') THEN DROP TEMPORARY TABLE IF EXISTS sys.tmp_digests; DROP TEMPORARY TABLE IF EXISTS sys.tmp_digests_delta; ELSEIF (in_action IN (\'overall\', \'delta\')) THEN IF (in_action = \'overall\') THEN IF (in_table IS NULL) THEN SET v_digests_table = \'tmp_digests\'; ELSE SET v_digests_table = v_quoted_table; END IF; ELSE SET v_digests_table = \'tmp_digests_delta\'; DROP TEMPORARY TABLE IF EXISTS tmp_digests_delta; CREATE TEMPORARY TABLE tmp_digests_delta LIKE tmp_digests; SET v_sql = CONCAT(\'INSERT INTO tmp_digests_delta SELECT `d_end`.`SCHEMA_NAME`, `d_end`.`DIGEST`, `d_end`.`DIGEST_TEXT`, `d_end`.`COUNT_STAR`-IFNULL(`d_start`.`COUNT_STAR`, 0) AS \'COUNT_STAR\', `d_end`.`SUM_TIMER_WAIT`-IFNULL(`d_start`.`SUM_TIMER_WAIT`, 0) AS \'SUM_TIMER_WAIT\', `d_end`.`MIN_TIMER_WAIT` AS \'MIN_TIMER_WAIT\', IFNULL((`d_end`.`SUM_TIMER_WAIT`-IFNULL(`d_start`.`SUM_TIMER_WAIT`, 0))/NULLIF(`d_end`.`COUNT_STAR`-IFNULL(`d_start`.`COUNT_STAR`, 0), 0), 0) AS \'AVG_TIMER_WAIT\', `d_end`.`MAX_TIMER_WAIT` AS \'MAX_TIMER_WAIT\', `d_end`.`SUM_LOCK_TIME`-IFNULL(`d_start`.`SUM_LOCK_TIME`, 0) AS \'SUM_LOCK_TIME\', `d_end`.`SUM_ERRORS`-IFNULL(`d_start`.`SUM_ERRORS`, 0) AS \'SUM_ERRORS\', `d_end`.`SUM_WARNINGS`-IFNULL(`d_start`.`SUM_WARNINGS`, 0) AS \'SUM_WARNINGS\', `d_end`.`SUM_ROWS_AFFECTED`-IFNULL(`d_start`.`SUM_ROWS_AFFECTED`, 0) AS \'SUM_ROWS_AFFECTED\', `d_end`.`SUM_ROWS_SENT`-IFNULL(`d_start`.`SUM_ROWS_SENT`, 0) AS \'SUM_ROWS_SENT\', `d_end`.`SUM_ROWS_EXAMINED`-IFNULL(`d_start`.`SUM_ROWS_EXAMINED`, 0) AS \'SUM_ROWS_EXAMINED\', `d_end`.`SUM_CREATED_TMP_DISK_TABLES`-IFNULL(`d_start`.`SUM_CREATED_TMP_DISK_TABLES`, 0) AS \'SUM_CREATED_TMP_DISK_TABLES\', `d_end`.`SUM_CREATED_TMP_TABLES`-IFNULL(`d_start`.`SUM_CREATED_TMP_TABLES`, 0) AS \'SUM_CREATED_TMP_TABLES\', `d_end`.`SUM_SELECT_FULL_JOIN`-IFNULL(`d_start`.`SUM_SELECT_FULL_JOIN`, 0) AS \'SUM_SELECT_FULL_JOIN\', `d_end`.`SUM_SELECT_FULL_RANGE_JOIN`-IFNULL(`d_start`.`SUM_SELECT_FULL_RANGE_JOIN`, 0) AS \'SUM_SELECT_FULL_RANGE_JOIN\', `d_end`.`SUM_SELECT_RANGE`-IFNULL(`d_start`.`SUM_SELECT_RANGE`, 0) AS \'SUM_SELECT_RANGE\', `d_end`.`SUM_SELECT_RANGE_CHECK`-IFNULL(`d_start`.`SUM_SELECT_RANGE_CHECK`, 0) AS \'SUM_SELECT_RANGE_CHECK\', `d_end`.`SUM_SELECT_SCAN`-IFNULL(`d_start`.`SUM_SELECT_SCAN`, 0) AS \'SUM_SELECT_SCAN\', `d_end`.`SUM_SORT_MERGE_PASSES`-IFNULL(`d_start`.`SUM_SORT_MERGE_PASSES`, 0) AS \'SUM_SORT_MERGE_PASSES\', `d_end`.`SUM_SORT_RANGE`-IFNULL(`d_start`.`SUM_SORT_RANGE`, 0) AS \'SUM_SORT_RANGE\', `d_end`.`SUM_SORT_ROWS`-IFNULL(`d_start`.`SUM_SORT_ROWS`, 0) AS \'SUM_SORT_ROWS\', `d_end`.`SUM_SORT_SCAN`-IFNULL(`d_start`.`SUM_SORT_SCAN`, 0) AS \'SUM_SORT_SCAN\', `d_end`.`SUM_NO_INDEX_USED`-IFNULL(`d_start`.`SUM_NO_INDEX_USED`, 0) AS \'SUM_NO_INDEX_USED\', `d_end`.`SUM_NO_GOOD_INDEX_USED`-IFNULL(`d_start`.`SUM_NO_GOOD_INDEX_USED`, 0) AS \'SUM_NO_GOOD_INDEX_USED\', `d_end`.`FIRST_SEEN`, `d_end`.`LAST_SEEN` FROM tmp_digests d_end LEFT OUTER JOIN \', v_quoted_table, \' d_start ON `d_start`.`DIGEST` = `d_end`.`DIGEST` AND (`d_start`.`SCHEMA_NAME` = `d_end`.`SCHEMA_NAME` OR (`d_start`.`SCHEMA_NAME` IS NULL AND `d_end`.`SCHEMA_NAME` IS NULL) ) WHERE `d_end`.`COUNT_STAR`-IFNULL(`d_start`.`COUNT_STAR`, 0) > 0\'); CALL sys.execute_prepared_stmt(v_sql); END IF;  IF (FIND_IN_SET(\'with_runtimes_in_95th_percentile\', in_views)) THEN SELECT \'Queries with Runtime in 95th Percentile\' AS \'Next Output\';  DROP TEMPORARY TABLE IF EXISTS tmp_digest_avg_latency_distribution1; DROP TEMPORARY TABLE IF EXISTS tmp_digest_avg_latency_distribution2; DROP TEMPORARY TABLE IF EXISTS tmp_digest_95th_percentile_by_avg_us;  CREATE TEMPORARY TABLE tmp_digest_avg_latency_distribution1 ( cnt bigint unsigned NOT NULL, avg_us decimal(21,0) NOT NULL, PRIMARY KEY (avg_us) ) ENGINE=InnoDB;  SET v_sql = CONCAT(\'INSERT INTO tmp_digest_avg_latency_distribution1 SELECT COUNT(*) cnt,  ROUND(avg_timer_wait/1000000) AS avg_us FROM \', v_digests_table, \' GROUP BY avg_us\'); CALL sys.execute_prepared_stmt(v_sql);  CREATE TEMPORARY TABLE tmp_digest_avg_latency_distribution2 LIKE tmp_digest_avg_latency_distribution1; INSERT INTO tmp_digest_avg_latency_distribution2 SELECT * FROM tmp_digest_avg_latency_distribution1;  CREATE TEMPORARY TABLE tmp_digest_95th_percentile_by_avg_us ( avg_us decimal(21,0) NOT NULL, percentile decimal(46,4) NOT NULL, PRIMARY KEY (avg_us) ) ENGINE=InnoDB;  SET v_sql = CONCAT(\'INSERT INTO tmp_digest_95th_percentile_by_avg_us SELECT s2.avg_us avg_us, IFNULL(SUM(s1.cnt)/NULLIF((SELECT COUNT(*) FROM \', v_digests_table, \'), 0), 0) percentile FROM tmp_digest_avg_latency_distribution1 AS s1 JOIN tmp_digest_avg_latency_distribution2 AS s2 ON s1.avg_us <= s2.avg_us GROUP BY s2.avg_us HAVING percentile > 0.95 ORDER BY percentile LIMIT 1\'); CALL sys.execute_prepared_stmt(v_sql);  SET v_sql = REPLACE( REPLACE( (SELECT VIEW_DEFINITION FROM information_schema.VIEWS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = \'statements_with_runtimes_in_95th_percentile\' ), \'`performance_schema`.`events_statements_summary_by_digest`\', v_digests_table ), \'sys.x$ps_digest_95th_percentile_by_avg_us\', \'`sys`.`x$ps_digest_95th_percentile_by_avg_us`\' ); CALL sys.execute_prepared_stmt(v_sql);  DROP TEMPORARY TABLE tmp_digest_avg_latency_distribution1; DROP TEMPORARY TABLE tmp_digest_avg_latency_distribution2; DROP TEMPORARY TABLE tmp_digest_95th_percentile_by_avg_us; END IF;  IF (FIND_IN_SET(\'analysis\', in_views)) THEN SELECT CONCAT(\'Top \', @sys.statement_performance_analyzer.limit, \' Queries Ordered by Total Latency\') AS \'Next Output\'; SET v_sql = REPLACE( (SELECT VIEW_DEFINITION FROM information_schema.VIEWS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = \'statement_analysis\' ), \'`performance_schema`.`events_statements_summary_by_digest`\', v_digests_table ); IF (@sys.statement_performance_analyzer.limit > 0) THEN SET v_sql = CONCAT(v_sql, \' LIMIT \', @sys.statement_performance_analyzer.limit); END IF; CALL sys.execute_prepared_stmt(v_sql); END IF;  IF (FIND_IN_SET(\'with_errors_or_warnings\', in_views)) THEN SELECT CONCAT(\'Top \', @sys.statement_performance_analyzer.limit, \' Queries with Errors\') AS \'Next Output\'; SET v_sql = REPLACE( (SELECT VIEW_DEFINITION FROM information_schema.VIEWS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = \'statements_with_errors_or_warnings\' ), \'`performance_schema`.`events_statements_summary_by_digest`\', v_digests_table ); IF (@sys.statement_performance_analyzer.limit > 0) THEN SET v_sql = CONCAT(v_sql, \' LIMIT \', @sys.statement_performance_analyzer.limit); END IF; CALL sys.execute_prepared_stmt(v_sql); END IF;  IF (FIND_IN_SET(\'with_full_table_scans\', in_views)) THEN SELECT CONCAT(\'Top \', @sys.statement_performance_analyzer.limit, \' Queries with Full Table Scan\') AS \'Next Output\'; SET v_sql = REPLACE( (SELECT VIEW_DEFINITION FROM information_schema.VIEWS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = \'statements_with_full_table_scans\' ), \'`performance_schema`.`events_statements_summary_by_digest`\', v_digests_table ); IF (@sys.statement_performance_analyzer.limit > 0) THEN SET v_sql = CONCAT(v_sql, \' LIMIT \', @sys.statement_performance_analyzer.limit); END IF; CALL sys.execute_prepared_stmt(v_sql); END IF;  IF (FIND_IN_SET(\'with_sorting\', in_views)) THEN SELECT CONCAT(\'Top \', @sys.statement_performance_analyzer.limit, \' Queries with Sorting\') AS \'Next Output\'; SET v_sql = REPLACE( (SELECT VIEW_DEFINITION FROM information_schema.VIEWS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = \'statements_with_sorting\' ), \'`performance_schema`.`events_statements_summary_by_digest`\', v_digests_table ); IF (@sys.statement_performance_analyzer.limit > 0) THEN SET v_sql = CONCAT(v_sql, \' LIMIT \', @sys.statement_performance_analyzer.limit); END IF; CALL sys.execute_prepared_stmt(v_sql); END IF;  IF (FIND_IN_SET(\'with_temp_tables\', in_views)) THEN SELECT CONCAT(\'Top \', @sys.statement_performance_analyzer.limit, \' Queries with Internal Temporary Tables\') AS \'Next Output\'; SET v_sql = REPLACE( (SELECT VIEW_DEFINITION FROM information_schema.VIEWS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = \'statements_with_temp_tables\' ), \'`performance_schema`.`events_statements_summary_by_digest`\', v_digests_table ); IF (@sys.statement_performance_analyzer.limit > 0) THEN SET v_sql = CONCAT(v_sql, \' LIMIT \', @sys.statement_performance_analyzer.limit); END IF; CALL sys.execute_prepared_stmt(v_sql); END IF;  IF (FIND_IN_SET(\'custom\', in_views)) THEN SELECT CONCAT(\'Top \', @sys.statement_performance_analyzer.limit, \' Queries Using Custom View\') AS \'Next Output\';  IF (@sys.statement_performance_analyzer.view IS NULL) THEN SET @sys.statement_performance_analyzer.view = sys.sys_get_config(\'statement_performance_analyzer.view\', NULL); END IF; IF (@sys.statement_performance_analyzer.view IS NULL) THEN SIGNAL SQLSTATE \'45000\' SET MESSAGE_TEXT = \'The @sys.statement_performance_analyzer.view user variable must be set with the view or query to use.\'; END IF;  IF (NOT INSTR(@sys.statement_performance_analyzer.view, \' \')) THEN IF (NOT INSTR(@sys.statement_performance_analyzer.view, \'.\')) THEN SET v_custom_db   = DATABASE(), v_custom_name = @sys.statement_performance_analyzer.view; ELSE SET v_custom_db   = SUBSTRING_INDEX(@sys.statement_performance_analyzer.view, \'.\', 1); SET v_custom_name = SUBSTRING(@sys.statement_performance_analyzer.view, CHAR_LENGTH(v_custom_db)+2); END IF;  CALL sys.table_exists(v_custom_db, v_custom_name, v_custom_view_exists); IF (v_custom_view_exists <> \'VIEW\') THEN SIGNAL SQLSTATE \'45000\' SET MESSAGE_TEXT = \'The @sys.statement_performance_analyzer.view user variable is set but specified neither an existing view nor a query.\'; END IF;  SET v_sql = REPLACE( (SELECT VIEW_DEFINITION FROM information_schema.VIEWS WHERE TABLE_SCHEMA = v_custom_db AND TABLE_NAME = v_custom_name ), \'`performance_schema`.`events_statements_summary_by_digest`\', v_digests_table ); ELSE SET v_sql = REPLACE(@sys.statement_performance_analyzer.view, \'`performance_schema`.`events_statements_summary_by_digest`\', v_digests_table); END IF;  IF (@sys.statement_performance_analyzer.limit > 0) THEN SET v_sql = CONCAT(v_sql, \' LIMIT \', @sys.statement_performance_analyzer.limit); END IF;  CALL sys.execute_prepared_stmt(v_sql); END IF; END IF;  IF (v_this_thread_enabled = \'YES\') THEN CALL sys.ps_setup_enable_thread(CONNECTION_ID()); END IF;  IF (@log_bin = 1) THEN SET sql_log_bin = @log_bin; END IF; END'], 47 => ['db' => 'sys', 'name' => 'table_exists', 'type' => 'PROCEDURE', 'specific_name' => 'table_exists', 'language' => 'SQL', 'sql_data_access' => 'CONTAINS_SQL', 'is_deterministic' => 'NO', 'security_type' => 'INVOKER', 'param_list' => ' IN in_db VARCHAR(64), IN in_table VARCHAR(64), OUT out_exists ENUM(\'\', \'BASE TABLE\', \'VIEW\', \'TEMPORARY\') ', 'returns' => '', 'body' => 'BEGIN DECLARE v_error BOOLEAN DEFAULT FALSE; DECLARE CONTINUE HANDLER FOR 1050 SET v_error = TRUE; DECLARE CONTINUE HANDLER FOR 1146 SET v_error = TRUE;  SET out_exists = \'\';  IF (EXISTS(SELECT 1 FROM information_schema.TABLES WHERE TABLE_SCHEMA = in_db AND TABLE_NAME = in_table)) THEN SET @sys.tmp.table_exists.SQL = CONCAT(\'CREATE TEMPORARY TABLE `\', in_db, \'`.`\', in_table, \'` (id INT PRIMARY KEY)\'); PREPARE stmt_create_table FROM @sys.tmp.table_exists.SQL; EXECUTE stmt_create_table; DEALLOCATE PREPARE stmt_create_table; IF (v_error) THEN SET out_exists = \'TEMPORARY\'; ELSE SET @sys.tmp.table_exists.SQL = CONCAT(\'DROP TEMPORARY TABLE `\', in_db, \'`.`\', in_table, \'`\'); PREPARE stmt_drop_table FROM @sys.tmp.table_exists.SQL; EXECUTE stmt_drop_table; DEALLOCATE PREPARE stmt_drop_table; SET out_exists = (SELECT TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = in_db AND TABLE_NAME = in_table); END IF; ELSE SET @sys.tmp.table_exists.SQL = CONCAT(\'SELECT COUNT(*) FROM `\', in_db, \'`.`\', in_table, \'`\'); PREPARE stmt_select FROM @sys.tmp.table_exists.SQL; IF (NOT v_error) THEN DEALLOCATE PREPARE stmt_select; SET out_exists = \'TEMPORARY\'; END IF; END IF; END', 'definer' => 'mysql.sys@localhost', 'created' => '2018-02-13 21:59:50', 'modified' => '2018-02-13 21:59:50', 'sql_mode' => '', 'comment' => '
 Description
 
 Tests whether the table specified in in_db and in_table exists either as a regular
 table, or as a temporary table. The returned value corresponds to the table that
 will be used, so if there\'s both a temporary and a permanent table with the given
 name, then \'TEMPORARY\' will be returned.
 
 Parameters
 
 in_db (VARCHAR(64)):
 The database name to check for the existance of the table in.
 
 in_table (VARCHAR(64)):
 The name of the table to check the existance of.
 
 out_exists ENUM(\'\', \'BASE TABLE\', \'VIEW\', \'TEMPORARY\'):
 The return value: whether the table exists. The value is one of:
 * \'\'           - the table does not exist neither as a base table, view, nor temporary table.
 * \'BASE TABLE\' - the table name exists as a permanent base table table.
 * \'VIEW\'       - the table name exists as a view.
 * \'TEMPORARY\'  - the table name exists as a temporary table.
 
 Example
 
 mysql> CREATE DATABASE db1;
 Query OK, 1 row affected (0.07 sec)
 
 mysql> use db1;
 Database changed
 mysql> CREATE TABLE t1 (id INT PRIMARY KEY);
 Query OK, 0 rows affected (0.08 sec)
 
 mysql> CREATE TABLE t2 (id INT PRIMARY KEY);
 Query OK, 0 rows affected (0.08 sec)
 
 mysql> CREATE view v_t1 AS SELECT * FROM t1;
 Query OK, 0 rows affected (0.00 sec)
 
 mysql> CREATE TEMPORARY TABLE t1 (id INT PRIMARY KEY);
 Query OK, 0 rows affected (0.00 sec)
 
 mysql> CALL sys.table_exists(\'db1\', \'t1\', @exists); SELECT @exists;
 Query OK, 0 rows affected (0.00 sec)
 
 +------------+
 | @exists    |
 +------------+
 | TEMPORARY  |
 +------------+
 1 row in set (0.00 sec)
 
 mysql> CALL sys.table_exists(\'db1\', \'t2\', @exists); SELECT @exists;
 Query OK, 0 rows affected (0.00 sec)
 
 +------------+
 | @exists    |
 +------------+
 | BASE TABLE |
 +------------+
 1 row in set (0.01 sec)
 
 mysql> CALL sys.table_exists(\'db1\', \'v_t1\', @exists); SELECT @exists;
 Query OK, 0 rows affected (0.00 sec)
 
 +---------+
 | @exists |
 +---------+
 | VIEW    |
 +---------+
 1 row in set (0.00 sec)
 
 mysql> CALL sys.table_exists(\'db1\', \'t3\', @exists); SELECT @exists;
 Query OK, 0 rows affected (0.01 sec)
 
 +---------+
 | @exists |
 +---------+
 |         |
 +---------+
 1 row in set (0.00 sec)
 ', 'character_set_client' => 'utf8', 'collation_connection' => 'utf8_general_ci', 'db_collation' => 'utf8_general_ci', 'body_utf8' => 'BEGIN DECLARE v_error BOOLEAN DEFAULT FALSE; DECLARE CONTINUE HANDLER FOR 1050 SET v_error = TRUE; DECLARE CONTINUE HANDLER FOR 1146 SET v_error = TRUE;  SET out_exists = \'\';  IF (EXISTS(SELECT 1 FROM information_schema.TABLES WHERE TABLE_SCHEMA = in_db AND TABLE_NAME = in_table)) THEN SET @sys.tmp.table_exists.SQL = CONCAT(\'CREATE TEMPORARY TABLE `\', in_db, \'`.`\', in_table, \'` (id INT PRIMARY KEY)\'); PREPARE stmt_create_table FROM @sys.tmp.table_exists.SQL; EXECUTE stmt_create_table; DEALLOCATE PREPARE stmt_create_table; IF (v_error) THEN SET out_exists = \'TEMPORARY\'; ELSE SET @sys.tmp.table_exists.SQL = CONCAT(\'DROP TEMPORARY TABLE `\', in_db, \'`.`\', in_table, \'`\'); PREPARE stmt_drop_table FROM @sys.tmp.table_exists.SQL; EXECUTE stmt_drop_table; DEALLOCATE PREPARE stmt_drop_table; SET out_exists = (SELECT TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = in_db AND TABLE_NAME = in_table); END IF; ELSE SET @sys.tmp.table_exists.SQL = CONCAT(\'SELECT COUNT(*) FROM `\', in_db, \'`.`\', in_table, \'`\'); PREPARE stmt_select FROM @sys.tmp.table_exists.SQL; IF (NOT v_error) THEN DEALLOCATE PREPARE stmt_select; SET out_exists = \'TEMPORARY\'; END IF; END IF; END']]];