create DATABASE News charset utf8;

CREATE table n_news(
    id int primary key auto_increment,
    title varchar(50) NOT NULL comment ' 新闻标题',
    isTop tinyint not null comment '是否置顶',
    content text comment '内容',
    publisher VARCHAR(20) not null comment  '发布人',
    pub_time int not null comment '发布时间'
  )charset utf8;


-- Covid_19
mysql -uroot -proot
create DATABASE Covid_19 charset utf8;
