<?php
/*
 * @Author: your name
 * @Date: 2020-04-12 16:58:11
 * @LastEditTime: 2020-04-12 20:28:46
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /htdocs/object/sql.php
 */

 class Sql {
     //设置属性
     private $host;
     private $port;
     private $user;
     private $pass;
     private $dbname;
     private $charset;
      # 构造方法初始化数据：数据较多，应该使用数组来传递数据，关联数组，而且绝大部分的开发者本意是用来测试，所以基本都是本地，因此可以给默认数据
    /*
    	$info = array(
    		'host' => 'localhost',
    		'port' => '3306',
    		'user' => 'root',
    		'pass' => 'root',
    		'dbname' => 'blog',
    		'charset' => 'utf8'
    	)
    */
    //初始化, 构造方法
    public function __construct( array $info = array())
    {
        $this->host = $info['host'] ?? '127.0.0.1';
        $this->port = $info['port'] ?? '3307';
        $this->user = $info['user'] ?? 'root';
        $this->pass = $info['pass'] ?? 'root';
        $this->dbname = $info['dbname'] ?? 'Covid_19';
        $this->charset = $info['charset'] ?? 'utf8';
        //调用连接认证方法
        $this->sql_connect();
//        $this->sql_charset();
    }
     //数据库连接认证
     //增加一个属性, 保存mysqli的连接, 需要跨方法使用
     private $link;
     private function sql_connect(){
         //mysqli初始化
         $this->link = @new Mysqli($this->host,$this->user,$this->pass,$this->dbname,$this->port);
        //验证是否连接成功
        if ($this->link->connect_error){
            die('Connect Error(' . $this->link->connect_errno . ')' . $this->link ->connect_error);
        }
    }
    //设定字符集
     private function sql_charset(){
         //组织sql
         $sql = 'set names {$this->charset}';
         //mysqli::query()
         $res = $this->link->query($sql);
         //错误判定
         if (!$res){
             die('Charset Error(' . $this->link->errno . ')' . $this->link->error);
         }
     }
     //写操作
     //保留上次写操作受影响行数
     public $affected_rows;
     public function sql_exec($sql){
         $res = $this->link->query($sql);
         //错误判定
         if (!$res){
             die('Sql Error(' . $this->link->errno . ')' . $this->link->error);
         }
         //记录当前操作受影响行数
         $this->affected_rows = $this->link->affected_rows;
         return $res;
     }

     //获取自增长ID
     public function sql_last_id(){
         return $this->link->insert_id;
     }
     //读方法
     // 记录当前查询的行数
     public $num_rows;
     public function sql_query($sql, $all = false){
         $res = $this->link->query($sql);
         if (!$res){
             die('Sql Error(' . $this->link->errno . ')' . $this->link->error);
         }
         //操作成功, 记录行数
         $this->num_rows = $res->num_rows;
         //没错, 查到数据
         if ($all){
             //获取所有数据
             return $res->fetch_all(MYSQLI_ASSOC);
         }else{
              //获取一条数据
             return $res->fetch_assoc();
         }
     }
 }

 $s = new Sql();
//$s = new Sql(array('charset' => 'utf8'));

//查询测试
//$sql = 'select * from Covid_Data limit 1';
//$res = $s->sql_query($sql);
//$sql = 'select * from Covid_Data';
//$res = $s->sql_query($sql,true);
//echo '<pre>';
//var_dump($res);




 