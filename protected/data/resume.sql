//简历表的建立
CREATE TABLE `resumes` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '‘id',
  `loginname` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `domain` varchar(30) NOT NULL DEFAULT '',
	`resume_id` BIGINT(20) not null DEFAULT 0,

  `basic` varchar(2000) NOT NULL DEFAULT '基础信息',
	`work`	VARCHAR(2000) not null DEFAULT '' comment '工作经历',
	`schoolaward`	VARCHAR(2000) not null DEFAULT '' comment '校内奖励',
	`schooljob`	VARCHAR(2000) not null DEFAULT '' comment '校内职务',
	`project`	VARCHAR(2000) not null DEFAULT '' comment '项目经历' ,
	`education`	VARCHAR(2000) not null DEFAULT '' comment '教育经历',
	`skilllanguage`	VARCHAR(2000) not null DEFAULT '' comment '语言',
	`skillcertification`	VARCHAR(2000) not null DEFAULT '' comment '证书',
	`skilltrain`	VARCHAR(2000) not null DEFAULT '' comment '培训',

  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 comment '简历表'


CREATE TABLE `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '‘id',
  `loginname` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `type` int(4) NOT NULL DEFAULT 0,

  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 comment '账号表'
