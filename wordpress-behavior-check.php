

<?php
/** [wp-config.php]  Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) { 
   define( 'ABSPATH', __DIR__ . '/' );
}
// ABSPATHの値を確認し、出力する
echo "ABSPATH is defined as: " . ABSPATH;



