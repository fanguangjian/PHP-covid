-- terminal
-- mysql -uroot -proot

--创建数据库
-- create database mydatabase;
create database mydatabase2 charset GBK;

•/* 	创建数据库
基础语法: create database 数据库名称 [库选项]
Create database mydatabase;
库选项, 相关数据库的属性
字符集: charset 字符集, 不指定的话, 默认DBMS
校对值: collate 校对集

•	安装的时候，出现 bash - command not found
出现问题的原因是在系统目录下执行mysql 默认会执行到/usr/local/mysql 而设备的该目录下并没有mysql的可执行文件。

解决方案：
本人设备的路路径是在这里：/Applications/MAMP/Library/bin/mysql

创建软连接，操作是：Mysql文件行根目录执行以下命令

vim ~/.bash_profile
打开文件之后，输入字母 i 进入编辑模式

将以下一行代码粘贴到空白处

alias mysql='/Applications/MAMP/Library/bin/mysql'
按esc退出编辑模式，输入 ：wq 保存并且退出文件， 
再执行下一步的代码
source ~/.bash_profile

数据库查看, show databases; 
注意: 英文; 符号 */
 

•	Show create database mydatabase;

 

-- •	修改数据库字符集
Alter database mydatabase charset gbk;
Alter database mydatabase charset utf8;



-- 查看所有字符集
Show character set;

-- 创建数据表
-- 1.	将数据表挂在数据库
Create table mydatabase1.class(
name varchar(10)
)
 
-- 2.	进入数据库, 创建数据表
Use mydatabase1;
Create table teacher(
Name varchar(10)
);

-- 3 .使用表选项
Create table student(
Name varchar(10)
)charset utf8;

-- 3.	复制已有表结构
-- 在test 数据库创建一个与teacher一样的表
Create table teacher like mydatabase1.teacher;

-- 4 查看所有表
show tables;
