<?php

/**
 * Utility function to check if a gravatar exists for a given email or id
 * via https://gist.github.com/justinph/5197810
 * @param int|string|object $id_or_email A user ID,  email address, or comment object
 * @return bool if the gravatar exists or not
 *
 * @since Planet3.0 3.0
 */

function validate_gravatar($id_or_email) {
  //id or email code borrowed from wp-includes/pluggable.php
    $email = '';
    if ( is_numeric($id_or_email) ) {
        $id = (int) $id_or_email;
        $user = get_userdata($id);
        if ( $user )
            $email = $user->user_email;
    } elseif ( is_object($id_or_email) ) {
        // No avatar for pingbacks or trackbacks
        $allowed_comment_types = apply_filters( 'get_avatar_comment_types', array( 'comment' ) );
        if ( ! empty( $id_or_email->comment_type ) && ! in_array( $id_or_email->comment_type, (array) $allowed_comment_types ) )
            return false;

        if ( !empty($id_or_email->user_id) ) {
            $id = (int) $id_or_email->user_id;
            $user = get_userdata($id);
            if ( $user)
                $email = $user->user_email;
        } elseif ( !empty($id_or_email->comment_author_email) ) {
            $email = $id_or_email->comment_author_email;
        }
    } else {
        $email = $id_or_email;
    }

    $hashkey = md5(strtolower(trim($email)));
    $uri = 'http://www.gravatar.com/avatar/' . $hashkey . '?d=404';

    $data = wp_cache_get($hashkey);
    if (false === $data) {
        $response = wp_remote_head($uri);
        if( is_wp_error($response) ) {
            $data = 'not200';
        } else {
            $data = $response['response']['code'];
        }
        wp_cache_set($hashkey, $data, $group = '', $expire = 60*5);

    }       
    if ($data == '200'){
        return true;
    } else {
        return false;
    }
}

/**
 * Utility function to retreive just a gravatar URL instead of an functioning img tag for a given email or id
 * via https://gist.github.com/justinph/5197810
 * @param int|string|object $id_or_email A user ID,  email address, or comment object
 * @return bool if the gravatar exists or not
 *
 * @since Planet3.0 3.0
 */

function p3_get_avatar_url($get_avatar){
    preg_match("/src='(.*?)'/i", $get_avatar, $matches);
    return $matches[1];
}