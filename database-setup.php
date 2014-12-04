<?php

global $allbright_portfolio_db_version;
$allbright_portfolio_db_version = '1.0';

function setup_allbright_portfolio_db(){
  global $wpdb;
  global $allbright_portfolio_db_version;
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  $charset_collate = $wpdb->get_charset_collate();
  /*
  The goal with this plugin is to marry blog posts describing my portfolio pieces with images and technologies used in each of the portfolio projects.  I'll need to tap into wordpress posts table to retrieve uploaded images (post_type = attachment), add a table to store portfolio pieces (id, title, description, primary image id (post id FK)(one to one relationship)), add a table to store technologies (id, name), a table to store programming languages (id, name), a pivot table to marry technologies with languages (e.g. laravel = PHP & MySQL), and a pivot table to marry technologies to portfolio pieces
  */
  $portfolio_tbl_name  = $wpdb->prefix . "aa_" . "portfolio_pieces";
  $portfolio_tbl_sql   = "CREATE TABLE $portfolio_tbl_name (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    UNIQUE KEY id (id)
  )$charset_collate;";

  $technology_tbl_name = $wpdb->prefix . "aa_" . "technologies";
  $technology_tbl_sql  = "CREATE TABLE $technology_tbl_name (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    UNIQUE KEY id (id)
  ) $charset_collate;";

  $prg_lang_tbl_name  = $wpdb->prefix . "aa_" . "programming_languages";
  $prg_lang_tbl_sql   = "CREATE TABLE $prg_lang_tbl_name (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    UNIQUE KEY id (id)
  ) $charset_collate;";

  $technology_prg_lang_pvt_tbl_name = $wpdb->prefix . "aa_" . "technology_programming_language";
  $technology_prg_lang_pvt_tbl_sql  = "CREATE TABLE $technology_prg_lang_pvt_tbl_name (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    UNIQUE KEY id (id)
  ) $charset_collate;";

  $technology_portfolio_pvt_tbl_name = $wpdb->prefix . "aa_" . "technology_portfolio_piece";
  $technology_portfolio_pvt_tbl_sql  = "CREATE TABLE $technology_portfolio_pvt_tbl_name (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    UNIQUE KEY id (id)
  ) $charset_collate;";
  
  dbDelta( $portfolio_tbl_sql  );
  dbDelta( $technology_tbl_sql );
  dbDelta( $prg_lang_tbl_sql   );
  dbDelta( $technology_prg_lang_pvt_tbl_sql  );
  dbDelta( $technology_portfolio_pvt_tbl_sql );
}
?>