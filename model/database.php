<?php 

$db = new PDO('sqlite:chat_app.db', '', '', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
));

// chat kullanıcı tablosu
$users =<<<EOF
      CREATE TABLE USERS
      (USER_ID INT PRIMARY KEY    NOT NULL,
      USERNAME       TEXT    NOT NULL,
      ABOUT  TEXT    NOT NULL,
      PHONE          CHAR(50));
EOF;
$ret = $db->exec($users);

// kullanıcılara ait mesaj tablosu
$user_messages =<<<EOF
      CREATE TABLE USER_MESSAGES
      (USER_MESSAGES_ID INT PRIMARY KEY    NOT NULL,
      USER_ID        INT    NOT NULL,
      MESSAGE  TEXT    NOT NULL);
EOF;
$ret = $db->exec($user_messages);

// kullanıcılara ait online/son görülme tarihi tablosu
$user_online_status =<<<EOF
      CREATE TABLE USER_ONLINE_STATUS
      (ID INT PRIMARY KEY    NOT NULL,
      USER_ID       TEXT    NOT NULL,
      .
      .
      .);
EOF;
$ret = $db->exec($user_messages);

// chat grup tablosu
$groups =<<<EOF
      CREATE TABLE GROUPS
      (ID INT PRIMARY KEY    NOT NULL,
      .,
      .,
      .,
      .);
EOF;
$ret = $db->exec($groups);

// chat gruptaki kullanıcı tablosu
$group_users =<<<EOF
      CREATE TABLE GROUP_USERS
      (ID INT PRIMARY KEY    NOT NULL,
      .,
      .,
      .,
      .);
EOF;
$ret = $db->exec($group_users);

// chat gruptaki mesaj tablosu
$group_messages =<<<EOF
      CREATE TABLE GROUP_MESSAGES
      (ID INT PRIMARY KEY    NOT NULL,
      .,
      .,
      .,
      .);
EOF;
$ret = $db->exec($group_messages);

// chat kullanıcı dosya tablosu
$user_files =<<<EOF
      CREATE TABLE USER_FILES
      (ID INT PRIMARY KEY    NOT NULL,
      .,
      .,
      .,
      .);
EOF;
$ret = $db->exec($user_files);

// chat gruptaki dosya tablosu
$group_files =<<<EOF
      CREATE TABLE GROUP_FILES
      (ID INT PRIMARY KEY    NOT NULL,
      .,
      .,
      .,
      .);
EOF;
$ret = $db->exec($group_files);

// chat gruptaki dosya tablosu
$group_files =<<<EOF
      CREATE TABLE GROUP_FILES
      (ID INT PRIMARY KEY    NOT NULL,
      .,
      .,
      .,
      .);
EOF;
$ret = $db->exec($group_files);

// chat kullanıcı hakkındaki ayarlar bilgisi tablosu
$user_settings =<<<EOF
      CREATE TABLE USER_SETTINGS
      (ID INT PRIMARY KEY    NOT NULL,
      .,
      .,
      .,
      .);
EOF;
$ret = $db->exec($user_settings);