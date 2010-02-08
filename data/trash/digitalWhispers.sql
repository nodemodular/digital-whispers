-- phpMyAdmin SQL Dump
-- version 2.8.2.4
-- http://www.phpmyadmin.net
-- 
-- Host: localhost:3306
-- Erstellungszeit: 08. Februar 2010 um 15:48
-- Server Version: 5.0.67
-- PHP-Version: 5.2.6
-- 
-- Datenbank: `digitalWhispers`
-- 

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `data`
-- 

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time_upload` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `time_edit` time NOT NULL,
  `filename` text NOT NULL,
  `filetype` text NOT NULL,
  `prio` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Daten für Tabelle `data`
-- 


-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `user`
-- 

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `email` text NOT NULL,
  `name` text NOT NULL,
  `pw` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Daten für Tabelle `user`
-- 

