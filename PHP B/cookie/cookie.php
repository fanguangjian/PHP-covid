<?php
//使用cookie
//设置cookie
setcookie('age',1);
setcookie('name','grant');

//设定普通cookie
setcookie('son', 'son');

//设定全局cookie
setcookie('global_son','global_son',0 , '/');

// setcookie(name, value, expire, path, domain); // 5个参数