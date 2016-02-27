<?php

$wpLoader = $_SERVER['DOCUMENT_ROOT'] . "/wp-load.php";
 
    if ( file_exists($wpLoader) ) {
        require_once( $wpLoader );
    } else {
        die("File not found");
    }

    if ( ! wp_verify_nonce( $_REQUEST['_wpnonce'], 'review-item' ) ) {

        die( 'Security check' ); 

    } else {

        $reviewer_name    = $_REQUEST["_reviewer-name"];
        $reviewer_email   = $_REQUEST["_reviewer-email"];
        $reviewer_comment = $_REQUEST["_reviewer-comment"];
        $reviewer_rating  = $_REQUEST["_reviewer-rating"];
        $reviewer_postid  = $_REQUEST["_reviewer-postid"];
        $reviewer_date    = date('Y-m-d H:i:s');

        $ratefy_table = $wpdb->prefix . 'ratefy_data';

        $wpdb->insert( 
            $ratefy_table, 
            array( 
                'reviewer_name'    => $reviewer_name, 
                'reviewer_email'   => $reviewer_email, 
                'reviewer_comment' => $reviewer_comment, 
                'reviewer_rating'  => $reviewer_rating, 
                'reviewer_postid'  => $reviewer_postid, 
                'reviewer_date'    => $reviewer_date
            ) 
        );

        header("Location: ".get_home_url().$_REQUEST["_wp_http_referer"]);
        die();

    }

?>