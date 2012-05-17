create table if not exists dictionaries (
	id integer not null primary key auto_increment,
	name varchar(255) not null,
	licenser varchar(255),
	created_at timestamp not null,
	updated_at timestamp not null,
	dictionary_records_count integer not null default '0',
	created_by varchar(12),
	updated_by varchar(12),
	delete_flag tinyint default '0' not null,
	user_read tinyint default '1' not null,
	user_write tinyint default '1' not null,
	any_read tinyint default '1' not null,
	any_write tinyint default '1' not null
) ENGINE=InnoDB;

create table if not exists dictionary_records (
	id integer not null primary key auto_increment,
	dictionary_id integer not null
) ENGINE=InnoDB;

create table if not exists dictionary_contents (
	id integer not null primary key auto_increment,
	dictionary_record_id integer not null,
	language varchar(25) not null,
	text text,
	created_at timestamp not null,
	updated_at timestamp not null,
	created_by varchar(12),
	updated_by varchar(12),
	unique(dictionary_record_id, language)
) default charset utf8 collate utf8_unicode_ci ENGINE=InnoDB;

create table if not exists dictionary_languages (
	id integer not null primary key auto_increment,
	dictionary_id integer not null,
	language varchar(25) not null,
	unique(dictionary_id, language)
) ENGINE=InnoDB;

create table if not exists dictionary_deployments (
	id integer not null primary key auto_increment,
	dictionary_id integer not null,
	created_at timestamp,
	created_by varchar(12)
) ENGINE=InnoDB;

create table if not exists dictionaries_tags (
	dictionary_id integer not null,
	tag_id integer not null
) ENGINE=InnoDB;

create table if not exists tags (
	id integer not null primary key auto_increment,
	value varchar(24) not null unique
) default charset utf8 collate utf8_unicode_ci ENGINE=InnoDB;

create table if not exists parallel_texts (
	id integer not null primary key auto_increment,
	name varchar(255) not null,
	licenser varchar(255),
	created_at timestamp not null,
	updated_at timestamp not null,
	parallel_text_records_count integer not null default '0',
	created_by varchar(12),
	updated_by varchar(12),
	delete_flag tinyint default '0' not null,
	user_read tinyint default '1' not null,
	user_write tinyint default '1' not null,
	any_read tinyint default '1' not null,
	any_write tinyint default '1' not null
) ENGINE=InnoDB;

create table if not exists parallel_text_records (
	id integer not null primary key auto_increment,
	parallel_text_id integer not null
) ENGINE=InnoDB;

create table if not exists parallel_text_contents (
	id integer not null primary key auto_increment,
	parallel_text_record_id integer not null,
	language varchar(25) not null,
	text text,
	created_at timestamp not null,
	updated_at timestamp not null,
	created_by varchar(12),
	updated_by varchar(12),
	unique(parallel_text_record_id, language)
) default charset utf8 collate utf8_unicode_ci ENGINE=InnoDB;

create table if not exists parallel_text_languages (
	id integer not null primary key auto_increment,
	parallel_text_id integer not null,
	language varchar(25) not null,
	unique(parallel_text_id, language)
) ENGINE=InnoDB;

create table if not exists parallel_text_deployments (
	id integer not null primary key auto_increment,
	parallel_text_id integer not null,
	created_at timestamp,
	created_by varchar(12)
) ENGINE=InnoDB;

create table if not exists parallel_texts_tags (
	parallel_text_id integer not null,
	tag_id integer not null
) ENGINE=InnoDB;
