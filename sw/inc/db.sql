drop database if exists `cnss`;

CREATE DATABASE `cnss`;

CREATE USER 'cnss'@'localhost' IDENTIFIED BY 'cnss@lc4t';

GRANT ALL ON cnss.* TO 'cnss'@'localhost';

CREATE USER 'cnss'@'127.0.0.1' IDENTIFIED BY 'cnss@lc4t';

GRANT ALL ON cnss.* TO 'cnss'@'127.0.0.1';



CREATE TABLE sqli1_users (
    `id` int(10) not null primary key auto_increment,
    `username` varchar(32) not null,
    `password` varchar(32) not null,
    `is_admin` int(2) not null
)engine=innodb default charset=utf8;

INSERT INTO sqli1_users (`username`, `password`, `is_admin`) VALUES ('sa', 'e80b5017098950fc58aad83c8c14978e', 0);
INSERT INTO sqli1_users (`username`, `password`, `is_admin`) VALUES ('root', MD5('sb250x'), 1);
INSERT INTO sqli1_users (`username`, `password`, `is_admin`) VALUES ('admin', MD5('666666'), 0);
INSERT INTO sqli1_users (`username`, `password`, `is_admin`) VALUES ('guest', MD5('123456'), 0);

CREATE TABLE sqli1_articles (
    `id` int(10) not null primary key auto_increment,
    `title` text not null,
    `content` text
)engine=innodb default charset=utf8;

INSERT INTO sqli1_articles (`title`, `content`) VALUES ('谁在写西加加', '又溢出啦。<br />谁在改大框架，又报错啦；<br />谁在编新算法，死循环啦<br />兼容性是渣渣');
INSERT INTO sqli1_articles (`title`, `content`) VALUES ('Python大法好', '用Python大法，一天写一千八<br />用卢比大法，一天写两千八；<br />西加加大法，一天写八十八<br />大括号好啊');
INSERT INTO sqli1_articles (`title`, `content`) VALUES ('算法马上要挂', '我练功发自真心！！！');
