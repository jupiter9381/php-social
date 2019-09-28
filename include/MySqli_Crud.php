<?php

class DB
{

    protected static $connection;

    public static function initialize($host, $username, $password, $name)
    {
        if (!static::$connection) {
            static::$connection = new mysqli($host, $username, $password, $name);
        }
    }

    public static function connection()
    {
        return static::$connection;
    }

    public static function beginTransaction($flag = null)
    {
        if (!$flag) {
            $flag = MYSQLI_TRANS_START_READ_WRITE;
        }

        return static::connection()->begin_transaction($flag);
    }

    public static function commit()
    {
        return static::connection()->commit();
    }

    public static function rollback()
    {
        return static::connection()->rollback();
    }

    public static function runQuery($query_string)
    {
        $query = static::connection()->query($query_string);

        if (!$query) {
            throw new \RuntimeException("Query Error!! '{$query_string}'." . static::connection()->error, 1);
        }

        return $query;
    }

    public static function selectOne($query_select)
    {
        $query_select = trim($query_select);
        if (!preg_match("/^select/i", $query_select)) {
            throw new \Exception("Query string is not select query.");
        }

        return static::runQuery($query_select)->fetch_assoc();
    }

    public static function select($query_select)
    {
        $query_select = trim($query_select);
        if (!preg_match("/^select/i", $query_select)) {
            throw new \Exception("Query string is not select query.");
        }

        $results = static::runQuery($query_select);
        $rows    = [];
        while ($row = $results->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }

    public static function findOne($table, $where = null, array $options = array())
    {
        $query = static::querySelect($table, $where, $options);
        return static::selectOne($query);
    }

    public static function findAll($table, $where = null, array $options = array())
    {
        $query = static::querySelect($table, $where, $options);
        return static::select($query);
    }

    public static function getCount($table, $where = null, array $options = array())
    {
        $queryWhere = static::queryWhere($where);
        $query      = "select count(*) as count from {$table} $queryWhere";

        return static::runQuery($query)->fetch_object()->count;
    }

    public static function insert($table, array $data)
    {
        $keys = $values = [];
        foreach ($data as $key => $value) {
            $keys[]   = $key;
            if (!is_numeric($value)) {
                $value = "'".static::connection()->real_escape_string($value)."'";
            }

            $values[] = $value;
        }

        $keys   = implode(', ', $keys);
        $values = implode(', ', $values);
        $query  = "insert into {$table} ({$keys}) values({$values})";
        $result = static::runQuery($query);

        return static::connection()->insert_id ?: static::connection()->affected_rows;
    }

    public static function inserts($table, array $datas)
    {
        $values = [];
        $keys   = implode(', ', array_keys($datas[0]));

        foreach ($datas as $data) {
            $value = [];
            foreach ($data as $key => $val) {
                if (!is_numeric($value)) {
                    $val = "'".static::connection()->real_escape_string($value)."'";
                }
                $value[] = $val;
            }

            $values[] = "(" . implode(', ', $value) . ")";
        }

        $values = implode(", ", $values);

        echo $query = "insert into {$table} ({$keys}) values {$values}";
        exit;
        $result = static::runQuery($query);

        return static::connection()->affected_rows;
    }

    public static function update($table, array $data, $where = null)
    {
        $queryWhere = static::queryWhere($where);
        $sets       = [];
        foreach ($data as $key => $value) {
            if (!is_numeric($value)) {
                $value = "'".static::connection()->real_escape_string($value)."'";
            }
            
            $sets[] = "{$key} = {$value}";
        }

        $sets  = implode(', ', $sets);
        $query = "update {$table} set {$sets} $queryWhere";

        static::runQuery($query);

        return static::connection()->affected_rows;
    }

    public static function delete($table, $where = null)
    {
        $queryWhere = static::queryWhere($where);
        $query      = "delete from {$table} {$queryWhere}";

        static::runQuery($query);

        return static::connection()->affected_rows;
    }

    protected static function querySelect($table, $where = null, array $options = array())
    {
        $options    = array_merge(static::getDefaultSelectOptions(), $options);
        $columns    = implode(', ', $options['columns']);
        $queryJoin = static::queryJoin($options['join']);
        $queryWhere = static::queryWhere($where);
        $queryOrder = static::queryOrder($options['order_col'], $options['order_asc']);
        $queryLimit = static::queryLimit($options['limit'], $options['offset']);
        $queryGroup = static::queryGroup($options['group_by']);

        $query = trim("SELECT {$columns} FROM {$table}{$queryJoin}{$queryWhere}{$queryGroup}{$queryOrder}{$queryLimit}");

        $_SESSION['mysql_last_query'] = $query;
        return $query;
    }

    public function lk() {
        if (isset($_SESSION['mysql_last_query'])) {
            echo $_SESSION['mysql_last_query'];
        }
    }

    protected static function queryWhere($where)
    {
        // jika value bukan berupa array, kembalikan value apa adanya...
        if (!is_array($where)) {
            return trim($where) ? " where {$where}" : "";
        }

        // jika berupa array, build query where
        $conditions = [];
        $logics = [];
        foreach ($where as $key => $value) {
            $expl = explode(":", $key);
            if (count($expl) > 1) {
                list($logic, $key) = $expl;
            } else {
                $logic = "and";
            }

            $logics[] = $logic;

            $operator = '=';
            // jika value berupa array, value[0] = operator, value[1] = value
            if (is_array($value)) {
                $arr_val                = $value;
                list($operator, $value) = $arr_val;
            }

            // jika nilai berupa string, escape string untuk mencegah SQL Injection
            if (is_string($value) and strtolower($operator) != 'between') {
                $value = "'" . static::connection()->real_escape_string($value) . "'";
            } else {
                $value = $value;
            }

            if (is_array($value) and strtolower($operator) == 'in') {
                $list_in = [];
                foreach ($value as $v) {
                    if (is_string($v)) {
                        $v = "'" . static::connection()->real_escape_string($v) . "'";
                    }

                    $list_in[] = $v;
                }

                $value = "(" . implode(',', $list_in) . ")";
            }

            $conditions[] = "{$key} {$operator} {$value}";
        }

        $queryWhere = "";
        foreach ($conditions as $i => $query) {
            if ($i > 0) {
                $queryWhere .= " ".$logics[$i]." ";
            }

            $queryWhere .= $query;
        }

        return !empty($conditions) ? "\nWHERE " . $queryWhere : "";
    }

    public static function queryOrder($col, $asc)
    {
        if ($col) {
            $query = "ORDER BY " . $col;
            if (in_array(strtoupper($asc), ['ASC', 'DESC'])) {
                $query .= " " . strtoupper($asc);
            }
            return "\n" . $query;
        } else {
            return "";
        }
    }

    public static function queryLimit($limit, $offset)
    {
        $q_limit  = $limit ? "LIMIT $limit" : "";
        $q_offset = $offset ? "OFFSET $offset" : "";

        return ($q_limit OR $q_offset) ? "\n" . $q_limit . ' ' . $q_offset : "";
    }

    public static function queryGroup($group_by)
    {
        return $group_by ? "\nGROUP BY {$group_by}" : "";
    }

    public static function queryJoin($join)
    {
        return $join ? "\n{$join}" : "";
    }

    protected static function getDefaultSelectOptions()
    {
        return [
            'columns'   => ['*'],
            'order_col' => null,
            'order_asc' => 'asc',
            'group_by'  => null,
            'limit'     => null,
            'offset'    => null,
            'join'    => null,
        ];
    }

}
